<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $categories = Project::select('category')->distinct()->pluck('category');
        $projects = Project::with('images')->latest()->get();
        return view('pages.portfolio-index', compact('projects', 'categories'));
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->with('images', 'testimonial')->firstOrFail();
        $related = Project::where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();
        return view('pages.portfolio-show', compact('project', 'related'));
    }
}
