<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lead;
use App\Models\Service;
use App\Models\Project;
use App\Models\Customer;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Internet Fiber 100Mbps',
                'speed' => '100Mbps',
                'price' => 500000,
                'description' => 'Paket internet fiber optic dengan kecepatan 100Mbps untuk kebutuhan rumah dan kantor kecil',
                'is_active' => true
            ],
            [
                'name' => 'Internet Fiber 500Mbps',
                'speed' => '500Mbps',
                'price' => 1200000,
                'description' => 'Paket internet fiber optic dengan kecepatan 500Mbps untuk kebutuhan bisnis menengah',
                'is_active' => true
            ],
            [
                'name' => 'Internet Dedicated 1Gbps',
                'speed' => '1Gbps',
                'price' => 3000000,
                'description' => 'Paket internet dedicated dengan kecepatan 1Gbps untuk kebutuhan enterprise',
                'is_active' => true
            ],
            [
                'name' => 'WiFi Hotspot Management',
                'speed' => 'Various',
                'price' => 800000,
                'description' => 'Layanan manajemen WiFi hotspot untuk hotel, cafe, dan area publik',
                'is_active' => true
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        $leads = [
            [
                'name' => 'PT. Teknologi Maju',
                'email' => 'info@teknologimaju.com',
                'phone' => '021-12345678',
                'address' => 'Jl. Sudirman No. 123, Jakarta Pusat',
                'status' => 'hot',
                'description' => 'Perusahaan teknologi yang membutuhkan internet dedicated untuk kantor pusat'
            ],
            [
                'name' => 'CV. Digital Solutions',
                'email' => 'contact@digitalsolutions.id',
                'phone' => '021-87654321',
                'address' => 'Jl. Gatot Subroto No. 456, Jakarta Selatan',
                'status' => 'warm',
                'description' => 'Startup digital yang memerlukan koneksi internet stabil untuk development'
            ],
            [
                'name' => 'Hotel Bintang Lima',
                'email' => 'manager@hotelbintanglima.com',
                'phone' => '021-11223344',
                'address' => 'Jl. Thamrin No. 789, Jakarta Pusat',
                'status' => 'warm',
                'description' => 'Hotel yang ingin upgrade sistem WiFi untuk tamu'
            ],
            [
                'name' => 'Cafe Modern',
                'email' => 'owner@cafemodern.com',
                'phone' => '021-55667788',
                'address' => 'Jl. Kemang Raya No. 321, Jakarta Selatan',
                'status' => 'cold',
                'description' => 'Cafe yang membutuhkan WiFi hotspot untuk pelanggan'
            ],
            [
                'name' => 'Sekolah Internasional',
                'email' => 'admin@sekolahinternasional.edu',
                'phone' => '021-99887766',
                'address' => 'Jl. Pondok Indah No. 654, Jakarta Selatan',
                'status' => 'hot',
                'description' => 'Sekolah yang memerlukan internet untuk e-learning dan administrasi'
            ]
        ];

        foreach ($leads as $lead) {
            Lead::create($lead);
        }

        $projectData = [
            [
                'lead_id' => 1,
                'status' => 'in_progress',
                'description' => 'Instalasi internet dedicated 1Gbps untuk PT. Teknologi Maju'
            ],
            [
                'lead_id' => 2,
                'status' => 'pending',
                'description' => 'Setup internet fiber 500Mbps untuk CV. Digital Solutions'
            ],
            [
                'lead_id' => 5,
                'status' => 'completed',
                'description' => 'Instalasi internet fiber 100Mbps untuk Sekolah Internasional'
            ]
        ];

        // Create a dummy user first for projects
        $user = \App\Models\User::firstOrCreate([
            'email' => 'admin@endrico.com'
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password'),
            'role' => 'sales'
        ]);

        foreach ($projectData as $data) {
            $data['created_by'] = $user->id;
            $project = Project::create($data);

            // Attach services to projects
            if ($data['lead_id'] == 1) {
                $project->services()->attach([3]); // 1Gbps service
            } elseif ($data['lead_id'] == 2) {
                $project->services()->attach([2]); // 500Mbps service
            } elseif ($data['lead_id'] == 5) {
                $project->services()->attach([1]); // 100Mbps service
            }
        }
        $completedProjects = Project::where('status', 'completed')->get();

        foreach ($completedProjects as $project) {
            $lead = $project->lead;
            $customerCode = 'CUST-' . str_pad($project->id, 4, '0', STR_PAD_LEFT);

            $customer = Customer::create([
                'customer_code' => $customerCode,
                'name' => $lead->name,
                'email' => $lead->email,
                'phone' => $lead->phone,
                'address' => $lead->address,
                'lead_id' => $lead->id,
                'subscribed_at' => now()
            ]);
            // Create active subscriptions for customer
            foreach ($project->services as $service) {
                \App\Models\Subscription::create([
                    'customer_id' => $customer->id,
                    'service_id' => $service->id,
                    'start_date' => now()->subDays(30),
                    'status' => 'active'
                ]);
            }
        }
    }
}