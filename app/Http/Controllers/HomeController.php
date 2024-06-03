<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome(){
        $categories = Category::all();
        return view('home', compact('categories'));
    }
}
