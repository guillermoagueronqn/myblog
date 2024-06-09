<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Retorna la vista donde se muestran las categorias para ser editadas.
     */
    public function index() {
        $categories = Category::get();
        return view('categories\index', ['categories' => $categories]);
    }

    /** 
     * Retorna la vista donde se encuenta el formulario para crear una nueva categoría.
     */
    public function create() {
        return view('categories\create');
    }

    /**
     * Crea una categoría en la base de datos a partir del formulario enviado por el usuario.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'url_imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('url_imagen')) {
            $file = $request->file('url_imagen');
            $filename = $request->nombre . '.' . $file->getClientOriginalExtension();
            // Mueve la imagen a la carpeta resources/img
            $file->move(resource_path('img'), $filename);
            // Guarda la URL de la imagen en la base de datos
            $validated['url_imagen'] = $filename;
        }
        Category::create($validated);
        return redirect(route('indexCategory'));
    }

    /**
     * Retorna la vista donde se encuentra el formulario para editar una categoría.
     */
    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('categories\edit', compact('category'));
    }

    /**
     * Actualiza la categoría pasada por parámetro y luego redirige al usuario a la página donde se encuentran todas 
     * las categorías.
     */
    public function update(Request $request, Category $category) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'url_imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('url_imagen')) {
            // Borra la imagen anterior si existe
            if ($category->url_imagen && file_exists(resource_path('img/' . $category->url_imagen))) {
                unlink(resource_path('img/' . $category->url_imagen));
            }
            // Guarda la nueva imagen
            $file = $request->file('url_imagen');
            $filename = $request->nombre . '.' . $file->getClientOriginalExtension();
            $file->move(resource_path('img'), $filename);
    
            // Actualiza el nombre de la imagen en los datos validados
            $validated['url_imagen'] = $filename;
        } else {
            // Si no se subió una nueva imagen, mantener la URL de la imagen anterior
            $validated['url_imagen'] = $category->url_imagen;
        }
        $category->update($validated);
        return redirect(route('indexCategory'));
    }
}