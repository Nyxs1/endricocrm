<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <x-icon name="services" class="mr-3 text-gray-600 w-5 h-5" />
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $service->name }}
                    </h2>
                    <p class="text-sm text-gray-500">Service Details</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <x-ui.button-link href="{{ route('services.edit', $service) }}" variant="secondary">
                    <x-slot name="icon">
                        <x-icon name="edit" class="w-4 h-4" />
                    </x-slot>
                    Edit Service
                </x-ui.button-link>
                <x-ui.button-link href="{{ route('services.index') }}" variant="secondary">
                    Kembali ke Daftar
                </x-ui.button-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Service Information -->
                <div class="lg:col-span-2">
                    <x-ui.card title="Informasi Service">
                        <x-slot name="icon">
                            <x-icon name="services" />
                        </x-slot>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Service</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <x-icon name="services" class="w-5 h-5 text-gray-400 mr-3" />
                                    <span class="text-gray-900 font-medium">{{ $service->name }}</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kecepatan</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <span
                                        class="inline-flex px-3 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded-full">
                                        {{ $service->speed }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Harga</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <x-icon name="money" class="w-5 h-5 text-gray-400 mr-3" />
                                    <span class="text-gray-900 font-bold text-lg">Rp
                                        {{ number_format($service->price, 0, ',', '.') }}</span>
                                    <span class="text-gray-500 text-sm ml-2">/bulan</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <span
                                        class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $service->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>
                            </div>

                            @if($service->description)
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                                    <div class="p-3 bg-gray-50 rounded-lg">
                                        <p class="text-gray-900">{{ $service->description }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($service->features)
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Fitur-fitur</label>
                                    <div class="p-3 bg-gray-50 rounded-lg">
                                        <p class="text-gray-900">{{ $service->features }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-ui.card>
                </div>

                <!-- Service Stats & Actions -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <x-ui.card title="Quick Actions">
                        <x-slot name="icon">
                            <x-icon name="plus" />
                        </x-slot>

                        <div class="space-y-3">
                            <x-ui.button-link href="{{ route('services.edit', $service) }}" variant="secondary"
                                class="w-full justify-center">
                                <x-slot name="icon">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </x-slot>
                                Edit Service
                            </x-ui.button-link>

                            <x-ui.button-link href="{{ route('projects.create') }}" variant="primary"
                                class="w-full justify-center">
                                <x-slot name="icon">
                                    <x-icon name="projects" class="w-4 h-4" />
                                </x-slot>
                                Buat Project
                            </x-ui.button-link>

                            <x-ui.button-link href="{{ route('services.create') }}" variant="success"
                                class="w-full justify-center">
                                <x-slot name="icon">
                                    <x-icon name="plus" class="w-4 h-4" />
                                </x-slot>
                                Tambah Service Baru
                            </x-ui.button-link>
                        </div>
                    </x-ui.card>

                    <!-- Service Info -->
                    <x-ui.card title="Informasi Tambahan">
                        <x-slot name="icon">
                            <x-icon name="calendar" />
                        </x-slot>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Service Created</p>
                                    <p class="text-xs text-gray-500">{{ $service->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>
                            </div>

                            @if($service->updated_at != $service->created_at)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Last Updated</p>
                                        <p class="text-xs text-gray-500">{{ $service->updated_at->format('d M Y, H:i') }}
                                        </p>
                                    </div>
                                </div>
                            @endif

                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Status</p>
                                    <p class="text-xs text-gray-500">
                                        {{ $service->is_active ? 'Service Aktif' : 'Service Nonaktif' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </x-ui.card>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>