<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(): View
    // {
    //     return view('posts\index', [
    //         'posts' => Post::with('user')->latest()->get(),
    //     ]);
    // }

    public function index(Request $request): View
    {
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts\create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'habilitated' => 'boolean',
            'category_id' => 'required',
        ]);
        
        $request->user()->posts()->create($validated);

        return redirect(route('index', ['category_id' => $request->input('category_id')]));
    }

    public function show($id)
    { 
        // return view('posts\show', ['post' => Post::findOrFail($post)]);
        $post = Post::findOrFail($id);
        return view('posts\show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('update', $post);
        $categories = Category::all();
        return view('posts\edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
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
     * Remove the specified resource from storage.
     */
    // public function destroy(Post $post): RedirectResponse
    // {
    //     Gate::authorize('delete', $post);

    //     $post->delete();

    //     return redirect(route('index'));
    // }

    // esta es la funcion para deshabilitar, no se muy bien como hacer el metodo a parte
    // y que queden ambos, eliminar y deshabilitar, pero la logica está :)
    public function destroy(Post $post): RedirectResponse
    {
        Gate::authorize('delete', $post);

        $post->update(['habilitated' => 0]);

        return redirect(route('index'));
    }
}

