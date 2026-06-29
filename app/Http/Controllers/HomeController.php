<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::where('featured', true)->with('images')->latest()->take(6)->get();
        $services = Service::where('active', true)->orderBy('sort_order')->take(4)->get();
        $testimonials = Testimonial::where('active', true)->with('project')->orderBy('sort_order')->get();
        $projectCount = Project::count();
        $serviceCount = Service::where('active', true)->count();

        return view('pages.home', compact(
            'projects', 'services', 'testimonials',
            'projectCount', 'serviceCount'
        ));
    }
}
