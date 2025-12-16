<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'speed' => 'nullable|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'is_active' => 'nullable',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        Service::create($data);

        return redirect()->route('services.index')->with('success', 'Service ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'speed' => 'nullable|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $service->update($data);

        return redirect()->route('services.index')->with('success', 'Service diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service dihapus');
    }
}
