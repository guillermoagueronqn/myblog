<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();
        return view('categories\index', ['categories' => $categories]);
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    /**public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'url_imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Category::create($validated);

        return redirect(route('indexCategory'));
    }*/


    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'url_imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('url_imagen')) {
            $file = $request->file('url_imagen');
            $filename = $request->nombre . '.' . $file->getClientOriginalExtension();
            //$filePath = 'img/' . $filename;

            // Mueve la imagen a la carpeta resources/img
            $file->move(resource_path('img'), $filename);

            // Guarda la URL de la imagen en la base de datos
            $validated['url_imagen'] = $filename;
        }
        //dd($validated);
        Category::create($validated);

        return redirect(route('indexCategory'));
    }

    /**
     * Display the specified resource.
     */
    /**public function show(Category $category)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories\edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
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

    /**
     * Remove the specified resource from storage.
     */
    /**public function destroy(Category $category)
    {
        //
    }*/
}
