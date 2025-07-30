<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class homeController extends Controller
{
    public function index(){
        $properties = Property::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        return view('user.home.index', [
            'properties' => $properties
        ]);
    }
}
