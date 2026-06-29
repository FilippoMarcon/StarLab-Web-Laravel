<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Project;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('project')->orderBy('sort_order')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('admin.testimonials.form', ['testimonial' => null, 'projects' => $projects]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string|max:2000',
            'rating' => 'required|integer|min:1|max:5',
            'project_id' => 'nullable|exists:projects,id',
            'active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $data['active'] = $request->boolean('active');

        Testimonial::create($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonianza creata.');
    }

    public function edit(Testimonial $testimonial)
    {
        $projects = Project::all();
        return view('admin.testimonials.form', compact('testimonial', 'projects'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'text' => 'required|string|max:2000',
            'rating' => 'required|integer|min:1|max:5',
            'project_id' => 'nullable|exists:projects,id',
            'active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $data['active'] = $request->boolean('active');

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonianza aggiornata.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonianza eliminata.');
    }
}
