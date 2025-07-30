<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\optionRequest;
use App\Models\option;
use Illuminate\Http\Request;

class optionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = option::all();
        return view('admin.option.index', [
            'options' => $options
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.option.formOption', [
            'option' => new option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(optionRequest $request)
    {
        $option = Option::create($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'L\'option des chambre a ete Cree.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(option $option)
    {
        return view('admin.option.formOption', [
            'option' => $option
        ])->with([
            'route' => 'option.edit',
            'title' => 'Modifier l\'option',
            'subtitle' => 'Modifier les options de la chambre'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(optionRequest $request, option $option)
    {
        $option->update($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'L\'option a été mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(option $option)
    {
        $option->delete();
        return redirect()->route('admin.option.index')->with('success', 'L\'option a été supprimée avec succès.');
    }
}
