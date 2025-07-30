<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Category;
use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\propertyRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class propertyController extends Controller
{
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::paginate(10)
        ]);
    }

    public function create()
    {
        $property = new Property();
        $property->fill([
            'name' => 'Chambre 1',
            'price' => 25000,
            'zone' => 'pk17',
            'surface' => 100,
            'rooms' => 1,
            'number_of_pieces' => 1,
            'status' => 'Disponible',
            'description' => 'Chambre au bord de la route',
            'category_id' => 3,
            'name_city'=>'students',
            'contact'=>'852.369.741',
            'modalite'=>'10mois+2causion+20000entretien',
            'bailleur'=>'auriol job',
        ]);
        return view('admin.properties.formProperty', [
            'property' => $property,
            'categories' => Category::pluck('name','id'),
            'options' => Option::pluck('name','id')
        ]);
    }

    public function store(propertyRequest $request)
    {
        try {
            Log::info('Store method called', [
                'request_data' => $request->all(),
                'files' => $request->hasFile('images') ? 'Has files' : 'No files'
            ]);

            $images = $this->handleImageUploads($request);
            $data = $request->validated();
            unset($data['images']); // on laisse Eloquent gérer

            Log::info('Validated data', $data);

            $property = new Property($data);
            $property->images = $images;
            $property->save();

            Log::info('Property created', ['property_id' => $property->id]);

            if ($request->has('options')) {
                $property->options()->sync($request->validated('options', []));
                Log::info('Options synced');
            }

            return redirect()->route('admin.properties.index')->with('success', 'Chambre créée avec succès');
        } catch (\Exception $e) {
            Log::error('Error in store method', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withInput()->withErrors(['error' => 'Erreur lors de la création: ' . $e->getMessage()]);
        }
    }

    public function edit(Property $property)
    {
        return view('admin.properties.formProperty', [
            'property' => $property,
            'categories' => Category::pluck('name','id'),
            'options' => Option::pluck('name','id')
        ]);
    }

    public function update(propertyRequest $request, Property $property)
    {
        try {
            $images = $property->images ?? [];
            // Suppression des images cochées
            if ($request->has('delete_images')) {
                foreach ($request->input('delete_images') as $index) {
                    if (isset($images[$index])) {
                        // Supprimer le fichier du disque
                        Storage::disk('uploads')->delete($images[$index]);
                        // Supprimer du tableau
                        unset($images[$index]);
                    }
                }
                // Réindexer le tableau pour éviter les trous
                $images = array_values($images);
            }
            if ($request->hasFile('images')) {
                $newImages = $this->handleImageUploads($request);
                $images = array_merge($images, $newImages);
            }
            $data = $request->validated();
            unset($data['images']); // on laisse Eloquent gérer
            $property->fill($data);
            $property->images = $images;
            $property->save();
            if ($request->has('options')) {
                $property->options()->sync($request->validated('options', []));
            }
            return redirect()->route('admin.properties.index')->with('success', 'Chambre modifiée avec succès');
        } catch (\Exception $e) {
            $this->cleanupTempFiles();
            return back()->withInput()->withErrors(['error' => 'Erreur lors de la modification: ' . $e->getMessage()]);
        }
    }

    public function destroy(Property $property)
    {
        try {
            // Supprimer les images associées
            if ($property->images) {
                foreach ($property->images as $image) {
                    if (Storage::disk('uploads')->exists($image)) {
                        Storage::disk('uploads')->delete($image);
                    }
                }
            }

            $property->delete();
            return redirect()->route('admin.properties.index')->with('success', 'Chambre supprimée avec succès');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erreur lors de la suppression: ' . $e->getMessage()]);
        }
    }

    /**
     * Gère l'upload des images
     */
    private function handleImageUploads($request)
    {
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    // Utiliser Storage pour une meilleure gestion
                    $path = $file->storeAs('uploads', $filename, 'uploads');
                    $images[] = $filename;
                }
            }
        }
        return $images;
    }

    /**
     * Nettoie les fichiers temporaires
     */
    private function cleanupTempFiles()
    {
        // Nettoyer les fichiers temporaires PHP
        $tempDir = sys_get_temp_dir();
        $files = glob($tempDir . '/php*');
        foreach ($files as $file) {
            if (is_file($file) && filemtime($file) < time() - 3600) { // Plus d'1 heure
                @unlink($file);
            }
        }
    }
}
