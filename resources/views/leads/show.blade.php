<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <x-icon name="leads" class="mr-3 text-gray-600 w-5 h-5" />
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $lead->name }}
                    </h2>
                    <p class="text-sm text-gray-500">Lead #{{ $lead->id }}</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <x-ui.button-link href="{{ route('leads.edit', $lead) }}" variant="secondary">
                    <x-slot name="icon">
                        <x-icon name="edit" class="w-4 h-4" />
                    </x-slot>
                    Edit Lead
                </x-ui.button-link>
                <x-ui.button-link href="{{ route('leads.index') }}" variant="secondary">
                    Kembali ke Daftar
                </x-ui.button-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Lead Information -->
                <div class="lg:col-span-2">
                    <x-ui.card title="Informasi Lead">
                        <x-slot name="icon">
                            <x-icon name="leads" />
                        </x-slot>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <x-icon name="users" class="w-5 h-5 text-gray-400 mr-3" />
                                    <span class="text-gray-900">{{ $lead->name }}</span>
                                </div>
                            </div>

                            @if($lead->email)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                        <x-icon name="email" class="w-5 h-5 text-gray-400 mr-3" />
                                        <a href="mailto:{{ $lead->email }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $lead->email }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($lead->phone)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
                                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                        <x-icon name="phone" class="w-5 h-5 text-gray-400 mr-3" />
                                        <a href="tel:{{ $lead->phone }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $lead->phone }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    @php
                                        $statusColors = [
                                            'hot' => 'bg-red-100 text-red-800',
                                            'warm' => 'bg-yellow-100 text-yellow-800',
                                            'cold' => 'bg-blue-100 text-blue-800'
                                        ];
                                    @endphp
                                    <span
                                        class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $statusColors[$lead->status] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst($lead->status ?? 'new') }}
                                    </span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Dibuat</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <x-icon name="calendar" class="w-5 h-5 text-gray-400 mr-3" />
                                    <span class="text-gray-900">{{ $lead->created_at->format('d M Y, H:i') }}</span>
                                </div>
                            </div>

                            @if($lead->description)
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                                    <div class="p-3 bg-gray-50 rounded-lg">
                                        <p class="text-gray-900">{{ $lead->description }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-ui.card>
                </div>

                <!-- Quick Actions & Status -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <x-ui.card title="Quick Actions">
                        <x-slot name="icon">
                            <x-icon name="plus" />
                        </x-slot>

                        <div class="space-y-3">
                            <x-ui.button-link href="{{ route('projects.create', ['lead_id' => $lead->id]) }}"
                                variant="success" class="w-full justify-center">
                                <x-slot name="icon">
                                    <x-icon name="projects" class="w-4 h-4" />
                                </x-slot>
                                Convert to Project
                            </x-ui.button-link>

                            <x-ui.button-link href="{{ route('leads.edit', $lead) }}" variant="secondary"
                                class="w-full justify-center">
                                <x-slot name="icon">
                                    <x-icon name="edit" class="w-4 h-4" />
                                </x-slot>
                                Edit Lead
                            </x-ui.button-link>

                            @if($lead->email)
                                <a href="mailto:{{ $lead->email }}"
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                                    <x-icon name="email" class="w-4 h-4 mr-2" />
                                    Send Email
                                </a>
                            @endif

                            @if($lead->phone)
                                <a href="tel:{{ $lead->phone }}"
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 transition">
                                    <x-icon name="phone" class="w-4 h-4 mr-2" />
                                    Call Now
                                </a>
                            @endif
                        </div>
                    </x-ui.card>

                    <!-- Lead Timeline -->
                    <x-ui.card title="Timeline">
                        <x-slot name="icon">
                            <x-icon name="calendar" />
                        </x-slot>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Lead Created</p>
                                    <p class="text-xs text-gray-500">{{ $lead->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            @if($lead->updated_at != $lead->created_at)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Last Updated</p>
                                        <p class="text-xs text-gray-500">{{ $lead->updated_at->format('d M Y, H:i') }}</p>
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