<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['lead', 'creator'])->latest()->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $leads = Lead::latest()->get();
        $services = Service::where('is_active', true)->orderBy('name')->get();
        $selectedLeadId = $request->get('lead_id');

        return view('projects.create', compact('leads', 'services', 'selectedLeadId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'lead_id' => 'required|exists:leads,id',
            'services' => 'required|array|min:1',
            'services.*' => 'exists:services,id',
        ]);

        $project = Project::create([
            'lead_id' => $data['lead_id'],
            'created_by' => Auth::id(),
            'status' => 'draft',
        ]);

        $services = Service::whereIn('id', $data['services'])->get()->keyBy('id');

        foreach ($data['services'] as $serviceId) {
            $service = $services[$serviceId];
            $project->services()->attach($serviceId, [
                'qty' => 1,
                'price_snapshot' => $service->price,
            ]);
        }
        Lead::where('id', $data['lead_id'])->update(['status' => 'in_project']);

        return redirect()->route('projects.show', $project)->with('success', 'Project dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['lead', 'creator', 'services']);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project dihapus');
    }

    public function submit(Project $project)
    {
        if ($project->status !== 'draft') {
            return back()->with('error', 'Project tidak bisa disubmit (status bukan draft).');
        }

        $project->update([
            'status' => 'pending',
            'submitted_at' => now(),
        ]);

        return redirect()->route('projects.index')->with('success', 'Project berhasil disubmit untuk approval.');
    }
}
