<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'price_from' => 'nullable|numeric|min:0',
            'icon' => 'nullable|string|max:50',
            'features' => 'nullable|string',
            'delivery_time' => 'nullable|string|max:255',
            'revisions' => 'nullable|string|max:255',
            'file_formats' => 'nullable|string|max:255',
            'active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['active'] = $request->boolean('active');
        $data['features'] = $data['features'] ? array_filter(explode("\n", str_replace("\r", "", $data['features']))) : null;

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Servizio creato.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'price_from' => 'nullable|numeric|min:0',
            'icon' => 'nullable|string|max:50',
            'features' => 'nullable|string',
            'delivery_time' => 'nullable|string|max:255',
            'revisions' => 'nullable|string|max:255',
            'file_formats' => 'nullable|string|max:255',
            'active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['active'] = $request->boolean('active');
        $data['features'] = $data['features'] ? array_filter(explode("\n", str_replace("\r", "", $data['features']))) : null;

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Servizio aggiornato.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Servizio eliminato.');
    }
}
