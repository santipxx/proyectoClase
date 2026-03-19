<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(){
        $productos = \App\Models\Product::latest()->limit(6)->get();
        return view('landing', compact('productos'));
    }
}
