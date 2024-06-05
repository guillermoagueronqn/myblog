<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Retorna la vista donde se muestran los posts, y en caso de que haya algo en el request pasado por parametro,
     * solo se mostrarán los posts de la categoria correspondiente al request.
     */
    public function index(Request $request) {
        if ($request->has('category_id')) {
            // La variable 'category_id' existe en la URL
            $categoryId = $request->input('category_id');
            $category = Category::findOrFail($categoryId);
        } else {
            // Si la variable 'category_id' no existe en la URL
            $category = null;
        }

        $allCategories = Category::all();
        return view('posts\index', [
            'posts' => Post::with('user')->latest()->get(),
            'category' => $category,
            'allCategories' => $allCategories,
        ]);
    }

    /**
     * Retorna la vista donde estará el formulario para crear un nuevo post.
     */
    public function create() {
        $categories = Category::all();
        return view('posts\create', ['categories' => $categories]);
    }

    /**
     * Inserta un nuevo registro en la base de datos a partir del request pasado por parametro y luego redirige a la
     * pagina '/posts'.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'habilitated' => 'boolean',
            'category_id' => 'required',
        ]);
        
        $request->user()->posts()->create($validated);

        return redirect(route('index', ['category_id' => $request->input('category_id')]));
    }

    /**
     * Retorna la vista show, obteniendo el post a partir del id pasado por parametro.
     */
    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts\show', compact('post'));
    }

    /**
     * Retorna la vista para editar posts, con las categorias para mostrar las opciones y el post a editar.
     */
    public function edit($id) {
        $post = Post::findOrFail($id);
        Gate::authorize('update', $post);
        $categories = Category::all();
        return view('posts\edit', compact('post', 'categories'));
    }

    /**
     * Actualiza el post pasado por parametro a partir del request obtenido de un formulario.
     */
    public function update(Request $request, Post $post) {
        Gate::authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'habilitated' => 'boolean',
            'category_id' => 'required',
        ]);

        $post->update($validated);

        return redirect(route('index', ['category_id' => $request->input('category_id')]));
    }

    /**
     * Deshabilita o Habilita el post pasado por parametro y redirige a la pagina 'posts'.
     */
    public function destroy(Post $post) {
        if ($post->habilitated == 0){
            $post->update(['habilitated' => 1]);    
        } elseif ($post->habilitated == 1) {
            $post->update(['habilitated' => 0]);
        }
        return back();
    }

    /**
     * Retorna a la vista papelera, pasando el arreglo de posts para luego mostrarlos
     */
    public function getPapelera() {
        $posts = Post::latest()->get();
        return view('posts\papelera', ['posts' => $posts]);
    }

    /**
     * Elimina definitivamente el post pasado por parametro y redirige a la pagina 'papelera'
     */
    public function delete(Post $post) {
        $post->delete();
        return redirect(route('papelera'));
    }
}