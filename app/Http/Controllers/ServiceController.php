<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('active', true)->orderBy('sort_order')->get();
        return view('pages.servizi-index', compact('services'));
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->where('active', true)->firstOrFail();
        return view('pages.servizi-show', compact('service'));
    }
}
