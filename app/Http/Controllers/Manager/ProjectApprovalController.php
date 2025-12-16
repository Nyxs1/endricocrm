<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectApprovalController extends Controller
{
    public function index()
    {
        $projects = Project::with('lead')
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('manager.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load(['lead', 'services']);
        return view('manager.projects.show', compact('project'));
    }

    public function approve(Request $request, Project $project)
    {
        if ($project->status !== 'pending') {
            return back()->with('error', 'Project bukan status pending');
        }

        // approved
        $project->update([
            'status' => 'approved',
            'reviewed_by' => $request->user()->id,
            'approved_at' => now(),
        ]);

        // convert lead -> customer (kalau belum ada)
        $customer = Customer::firstOrCreate(
            ['lead_id' => $project->lead_id],
            [
                'customer_code' => 'CUST-' . strtoupper(Str::random(6)),
                'name' => $project->lead->name,
                'phone' => $project->lead->phone,
                'email' => $project->lead->email,
                'address' => $project->lead->address,
                'subscribed_at' => now(),
            ]
        );

        // subscriptions dari layanan project
        foreach ($project->services as $service) {
            Subscription::firstOrCreate(
                [
                    'customer_id' => $customer->id,
                    'service_id' => $service->id,
                ],
                [
                    'start_date' => now()->toDateString(),
                    'status' => 'active',
                ]
            );
        }

        // final state
        $project->update(['status' => 'converted']);

        return redirect()->route('manager.projects.index')->with('success', 'Approved & converted');
    }

    public function reject(Request $request, Project $project)
    {
        $data = $request->validate([
            'manager_note' => 'required|string',
        ]);

        if ($project->status !== 'pending') {
            return back()->with('error', 'Project bukan status pending');
        }

        $project->update([
            'status' => 'rejected',
            'reviewed_by' => $request->user()->id,
            'manager_note' => $data['manager_note'],
        ]);

        return redirect()->route('manager.projects.index')->with('success', 'Project rejected');
    }
}
