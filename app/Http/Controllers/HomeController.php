<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Retorna la vista 'home' donde se muestran las categorías disponibles.
     */
    public function getHome(){
        $categories = Category::all();
        return view('home', compact('categories'));
    }
}