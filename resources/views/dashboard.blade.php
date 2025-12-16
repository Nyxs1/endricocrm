<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-icon name="dashboard" class="mr-3 text-gray-600 w-5 h-5" />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <div class="text-center py-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                Selamat Datang, {{ Auth::user()->name }}!
                            </h3>
                            <p class="text-gray-600">
                                Kelola CRM Anda dengan mudah dan efisien
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white">
                                    <x-icon name="leads" class="w-5 h-5 text-white" />
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">Total Leads</div>
                                <div class="text-2xl font-bold text-gray-900">{{ \App\Models\Lead::count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center h-12 w-12 rounded-md bg-green-500 text-white">
                                    <x-icon name="users" class="w-5 h-5 text-white" />
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">Active Customers</div>
                                <div class="text-2xl font-bold text-gray-900">{{ \App\Models\Customer::count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center h-12 w-12 rounded-md bg-purple-500 text-white">
                                    <x-icon name="projects" class="w-5 h-5 text-white" />
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">Active Projects</div>
                                <div class="text-2xl font-bold text-gray-900">
                                    {{ \App\Models\Project::where('status', '!=', 'completed')->count() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                    <x-icon name="services" class="w-5 h-5 text-white" />
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-500">Total Services</div>
                                <div class="text-2xl font-bold text-gray-900">{{ \App\Models\Service::count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <div class="flex items-center">
                            <div class="mr-3 text-gray-600">
                                <x-icon name="plus" class="w-5 h-5" />
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <a href="{{ route('leads.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 w-full justify-center">
                                <x-icon name="leads" class="w-4 h-4 mr-2" />
                                Tambah Lead Baru
                            </a>

                            <a href="{{ route('projects.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 w-full justify-center">
                                <x-icon name="projects" class="w-4 h-4 mr-2" />
                                Buat Project Baru
                            </a>

                            <a href="{{ route('services.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 w-full justify-center">
                                <x-icon name="services" class="w-4 h-4 mr-2" />
                                Tambah Service
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                        <div class="flex items-center">
                            <div class="mr-3 text-gray-600">
                                <x-icon name="eye" class="w-5 h-5" />
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            @php
                                $recentLeads = \App\Models\Lead::latest()->take(3)->get();
                            @endphp

                            @forelse($recentLeads as $lead)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <x-icon name="leads" class="w-4 h-4 text-blue-500 mr-2" />
                                        <span class="text-sm font-medium">{{ $lead->name }}</span>
                                    </div>
                                    <span class="text-xs text-gray-500">{{ $lead->created_at->diffForHumans() }}</span>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">Belum ada aktivitas terbaru</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>