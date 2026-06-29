<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.form', ['post' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:10240',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'published_at' => 'nullable|date',
            'active' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['active'] = $request->boolean('active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts/' . $data['slug'], 'cloudinary');
        }

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Articolo creato.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.form', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:10240',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'published_at' => 'nullable|date',
            'active' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['active'] = $request->boolean('active');

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('cloudinary')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts/' . $data['slug'], 'cloudinary');
        }

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Articolo aggiornato.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('cloudinary')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Articolo eliminato.');
    }
}
