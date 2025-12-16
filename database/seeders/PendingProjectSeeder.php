<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class PendingProjectSeeder extends Seeder
{
    public function run(): void
    {
        // Update first project to pending status
        $project = Project::first();
        if ($project) {
            $project->update([
                'status' => 'pending',
                'submitted_at' => now(),
            ]);

            echo "Project #{$project->id} set to pending status\n";
        }
    }
}