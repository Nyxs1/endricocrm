<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-icon name="projects" class="mr-3 text-gray-600 w-5 h-5" />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Buat Project Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('projects.store') }}" class="space-y-6">
                @csrf

                <!-- Project Information -->
                <x-ui.card title="Informasi Project">
                    <x-slot name="icon">
                        <x-icon name="projects" />
                    </x-slot>

                    <div class="space-y-6">
                        <!-- Lead Selection -->
                        <div>
                            <x-input-label for="lead_id" :value="__('Pilih Lead')" />
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-icon name="leads" class="h-5 w-5 text-gray-400" />
                                </div>
                                <select id="lead_id" name="lead_id" required
                                    class="block w-full pl-10 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">-- Pilih Lead --</option>
                                    @foreach ($leads as $lead)
                                        <option value="{{ $lead->id }}" {{ (string) $selectedLeadId === (string) $lead->id ? 'selected' : '' }}>
                                            {{ $lead->name }}
                                            @if($lead->email)
                                                ({{ $lead->email }})
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('lead_id')" class="mt-2" />
                        </div>

                        <!-- Project Description -->
                        <div>
                            <x-input-label for="description" :value="__('Deskripsi Project')" />
                            <textarea id="description" name="description" rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                placeholder="Deskripsi singkat tentang project ini">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>
                </x-ui.card>

                <!-- Services Selection -->
                <x-ui.card title="Pilih Layanan">
                    <x-slot name="icon">
                        <x-icon name="services" />
                    </x-slot>

                    @if($services->count() > 0)
                        <div class="space-y-4">
                            <p class="text-sm text-gray-600 mb-4">Pilih satu atau lebih layanan untuk project ini:</p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach ($services as $service)
                                    <div class="relative">
                                        <label
                                            class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                                            <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">

                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <div>
                                                        <h4 class="text-sm font-medium text-gray-900">{{ $service->name }}</h4>
                                                        <p class="text-sm text-gray-500">Speed: {{ $service->speed }}</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <div class="flex items-center text-green-600">
                                                            <x-icon name="money" class="w-4 h-4 mr-1" />
                                                            <span class="font-semibold">Rp
                                                                {{ number_format($service->price, 0, ',', '.') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($service->description)
                                                    <p class="text-xs text-gray-400 mt-1">{{ $service->description }}</p>
                                                @endif
                                            </div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <x-input-error :messages="$errors->get('services')" class="mt-2" />
                        </div>
                    @else
                        <div class="text-center py-8">
                            <x-icon name="services" class="mx-auto h-12 w-12 text-gray-400" />
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada layanan</h3>
                            <p class="mt-1 text-sm text-gray-500">Tambahkan layanan terlebih dahulu sebelum membuat project.
                            </p>
                            <div class="mt-6">
                                <x-ui.button-link href="{{ route('services.create') }}" variant="primary">
                                    <x-slot name="icon">
                                        <x-icon name="plus" class="w-4 h-4" />
                                    </x-slot>
                                    Tambah Layanan
                                </x-ui.button-link>
                            </div>
                        </div>
                    @endif
                </x-ui.card>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end space-x-4 pt-6">
                    <x-ui.button-link href="{{ route('projects.index') }}" variant="secondary">
                        Batal
                    </x-ui.button-link>

                    <x-primary-button>
                        <x-icon name="plus" class="w-4 h-4 mr-2" />
                        {{ __('Buat Project') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>