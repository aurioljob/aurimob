<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\seachRequest;
use App\Models\Category;
use App\Models\Property;

use Illuminate\Http\Request;

class roomController extends Controller
{
    public function index(seachRequest $request){
        $query = Property::query()->orderBy('created_at', 'desc');
        if ($price = $request->validated('price')) {
           $query = $query->where('price', '<=', $price);
        }
        if ($surface=$request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($title = $request->validated('zone')) {
            $query = $query->where('zone', 'like', '%' . $title . '%');
        }
        return view('user.rooms.index', [
            'properties' => $query->paginate(7),
            'input' => $request->validated()
        ]);
    }
    public function show(string $slug,Property $property)
    {
        $property->load('category');
        return view('user.rooms.show', [
            'property' => $property
        ]);
    }
}

