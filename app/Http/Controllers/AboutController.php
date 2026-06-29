<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $projectCount = Project::count();
        $testimonials = Testimonial::where('active', true)->orderBy('sort_order')->get();

        return view('pages.about', compact('projectCount', 'testimonials'));
    }
}
