<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'cover_image' => 'nullable|url|max:1024',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['featured'] = $request->boolean('featured');

        Project::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto creato.');
    }

    public function edit(Project $project)
    {
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
            'cover_image' => 'nullable|url|max:1024',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['featured'] = $request->boolean('featured');

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Progetto aggiornato.');
    }

    public function destroy(Project $project)
    {
        $project->images()->delete();
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato.');
    }
}
