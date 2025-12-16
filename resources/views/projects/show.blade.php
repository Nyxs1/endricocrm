<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <x-icon name="projects" class="mr-3 text-gray-600 w-5 h-5" />
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Project #{{ $project->id }}
                    </h2>
                    <p class="text-sm text-gray-500">{{ $project->lead->name }}</p>
                </div>
            </div>
            <div class="flex space-x-3">
                @if ($project->status === 'draft')
                    <form method="POST" action="{{ route('projects.submit', $project) }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 transition">
                            <x-icon name="plus" class="w-4 h-4 mr-2" />
                            Submit untuk Approval
                        </button>
                    </form>
                @endif
                <x-ui.button-link href="{{ route('projects.index') }}" variant="secondary">
                    Kembali ke Daftar
                </x-ui.button-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Project Information -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Project Details -->
                    <x-ui.card title="Informasi Project">
                        <x-slot name="icon">
                            <x-icon name="projects" />
                        </x-slot>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Project ID</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-mono bg-gray-100 text-gray-800 rounded">
                                        #{{ $project->id }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    @php
                                        $statusColors = [
                                            'draft' => 'bg-gray-100 text-gray-800',
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'in_progress' => 'bg-blue-100 text-blue-800',
                                            'completed' => 'bg-green-100 text-green-800',
                                            'cancelled' => 'bg-red-100 text-red-800'
                                        ];
                                    @endphp
                                    <span
                                        class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $statusColors[$project->status] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Lead/Customer</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <x-icon name="users" class="w-5 h-5 text-gray-400 mr-3" />
                                    <div>
                                        <span class="text-gray-900 font-medium">{{ $project->lead->name }}</span>
                                        @if($project->lead->email)
                                            <p class="text-sm text-gray-500">{{ $project->lead->email }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Dibuat</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <x-icon name="calendar" class="w-5 h-5 text-gray-400 mr-3" />
                                    <span class="text-gray-900">{{ $project->created_at->format('d M Y, H:i') }}</span>
                                </div>
                            </div>

                            @if($project->description)
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Project</label>
                                    <div class="p-3 bg-gray-50 rounded-lg">
                                        <p class="text-gray-900">{{ $project->description }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-ui.card>

                    <!-- Services -->
                    <x-ui.card title="Layanan yang Dipilih">
                        <x-slot name="icon">
                            <x-icon name="services" />
                        </x-slot>

                        @if($project->services->count() > 0)
                            <div class="space-y-4">
                                @php $totalPrice = 0; @endphp
                                @foreach ($project->services as $service)
                                    @php $totalPrice += $service->pivot->price_snapshot ?? $service->price; @endphp
                                    <div
                                        class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                    <x-icon name="services" class="w-5 h-5 text-indigo-600" />
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="text-sm font-medium text-gray-900">{{ $service->name }}</h4>
                                                <p class="text-sm text-gray-500">Speed: {{ $service->speed }}</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="flex items-center text-green-600">
                                                <x-icon name="money" class="w-4 h-4 mr-1" />
                                                <span class="font-semibold">Rp
                                                    {{ number_format($service->pivot->price_snapshot ?? $service->price, 0, ',', '.') }}</span>
                                            </div>
                                            <p class="text-xs text-gray-400">/bulan</p>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Total -->
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-medium text-gray-900">Total Harga</span>
                                        <div class="flex items-center text-green-600">
                                            <x-icon name="money" class="w-5 h-5 mr-2" />
                                            <span class="text-xl font-bold">Rp
                                                {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                            <span class="text-sm text-gray-500 ml-1">/bulan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <x-icon name="services" class="mx-auto h-12 w-12 text-gray-400" />
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada layanan</h3>
                                <p class="mt-1 text-sm text-gray-500">Tambahkan layanan untuk project ini.</p>
                            </div>
                        @endif
                    </x-ui.card>
                </div>

                <!-- Project Actions & Timeline -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <x-ui.card title="Actions">
                        <x-slot name="icon">
                            <x-icon name="plus" />
                        </x-slot>

                        <div class="space-y-3">
                            @if ($project->status === 'draft')
                                <form method="POST" action="{{ route('projects.submit', $project) }}" class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 transition">
                                        <x-icon name="plus" class="w-4 h-4 mr-2" />
                                        Submit untuk Approval
                                    </button>
                                </form>
                            @endif

                            <x-ui.button-link href="{{ route('leads.show', $project->lead) }}" variant="secondary"
                                class="w-full justify-center">
                                <x-slot name="icon">
                                    <x-icon name="eye" class="w-4 h-4" />
                                </x-slot>
                                Lihat Lead
                            </x-ui.button-link>

                            <x-ui.button-link href="{{ route('projects.create') }}" variant="primary"
                                class="w-full justify-center">
                                <x-slot name="icon">
                                    <x-icon name="plus" class="w-4 h-4" />
                                </x-slot>
                                Buat Project Baru
                            </x-ui.button-link>
                        </div>
                    </x-ui.card>

                    <!-- Project Timeline -->
                    <x-ui.card title="Timeline">
                        <x-slot name="icon">
                            <x-icon name="calendar" />
                        </x-slot>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Project Created</p>
                                    <p class="text-xs text-gray-500">{{ $project->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>
                            </div>

                            @if($project->submitted_at)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Submitted for Approval</p>
                                        <p class="text-xs text-gray-500">{{ $project->submitted_at->format('d M Y, H:i') }}
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if($project->approved_at)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Project Approved</p>
                                        <p class="text-xs text-gray-500">{{ $project->approved_at->format('d M Y, H:i') }}
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if($project->updated_at != $project->created_at)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-2 h-2 bg-gray-500 rounded-full mt-2"></div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Last Updated</p>
                                        <p class="text-xs text-gray-500">{{ $project->updated_at->format('d M Y, H:i') }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-ui.card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>