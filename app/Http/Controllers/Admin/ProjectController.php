<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::withCount('images')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'concept' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|max:10240',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
            'gallery_images.*' => 'nullable|image|max:10240',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['featured'] = $request->boolean('featured');

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects/' . $data['slug'], 'cloudinary');
        }

        $project = Project::create($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $i => $file) {
                $path = $file->store('projects/' . $data['slug'] . '/gallery', 'cloudinary');
                if ($path) {
                    $project->images()->create([
                        'image_path' => $path,
                        'alt_text' => $data['title'] . ' - ' . ($i + 1),
                        'sort_order' => $i,
                    ]);
                }
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato.');
    }

    public function edit(Project $project)
    {
        $project->load('images');
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'problem' => 'nullable|string',
            'solution' => 'nullable|string',
            'concept' => 'nullable|string',
            'client_name' => 'nullable|string|max:255',
            'cover_image' => 'nullable|image|max:10240',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
            'gallery_images.*' => 'nullable|image|max:10240',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['featured'] = $request->boolean('featured');

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::disk('cloudinary')->delete($project->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('projects/' . $data['slug'], 'cloudinary');
        }

        $project->update($data);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $i => $file) {
                $path = $file->store('projects/' . $data['slug'] . '/gallery', 'cloudinary');
                if ($path) {
                    $project->images()->create([
                        'image_path' => $path,
                        'alt_text' => $data['title'] . ' - ' . ($i + 1),
                        'sort_order' => $project->images()->count() + $i,
                    ]);
                }
            }
        }

        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato.');
    }

    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::disk('cloudinary')->delete($project->cover_image);
        }
        foreach ($project->images as $img) {
            Storage::disk('cloudinary')->delete($img->image_path);
        }
        $project->images()->delete();
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato.');
    }

    public function destroyImage(ProjectImage $image)
    {
        Storage::disk('cloudinary')->delete($image->image_path);
        $image->delete();
        return back()->with('success', 'Immagine eliminata.');
    }
}
