<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\categoryRequest;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorys = category::all();
        return view('admin.category.index', [
            'categorys' => $categorys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new category();
        return view('admin.category.formCategory', [
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryRequest $request)
    {
        category::create($request->validated());
        return redirect()->route('admin.category.index')->with('success', 'La catégorie a été créée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.category.formCategory', [
            'category' => $category
        ])->with([
            'route' => 'category.edit',
            'title' => 'Modifier la catégorie',
            'subtitle' => 'Modifier les détails de la catégorie'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryRequest $request, category $category)
    {
        $category->update($request->validated());
        return redirect()->route('admin.category.index')->with('success', 'La catégorie a été mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'La catégorie a été supprimée avec succès.');
    }
}
