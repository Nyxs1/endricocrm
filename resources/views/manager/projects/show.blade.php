<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-icon name="projects" class="mr-3 text-gray-600 w-5 h-5" />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Review Project #') . $project->id }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Project Information -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Project Details -->
                    <x-ui.card title="Project Information">
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
                                <label class="block text-sm font-medium text-gray-700 mb-2">Submitted At</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <x-icon name="calendar" class="w-5 h-5 text-gray-400 mr-3" />
                                    <span
                                        class="text-gray-900">{{ $project->submitted_at ? $project->submitted_at->format('d M Y, H:i') : 'Not submitted' }}</span>
                                </div>
                            </div>

                            @if($project->description)
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                    <div class="p-3 bg-gray-50 rounded-lg">
                                        <p class="text-gray-900">{{ $project->description }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-ui.card>

                    <!-- Services -->
                    <x-ui.card title="Services to be Provided">
                        <x-slot name="icon">
                            <x-icon name="services" />
                        </x-slot>

                        @if($project->services->count() > 0)
                            <div class="space-y-4">
                                @php $totalPrice = 0; @endphp
                                @foreach ($project->services as $service)
                                    @php $totalPrice += $service->pivot->price_snapshot ?? $service->price; @endphp
                                    <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
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
                                                @if($service->description)
                                                    <p class="text-xs text-gray-400 mt-1">{{ $service->description }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="flex items-center text-green-600">
                                                <x-icon name="money" class="w-4 h-4 mr-1" />
                                                <span class="font-semibold">Rp
                                                    {{ number_format($service->pivot->price_snapshot ?? $service->price, 0, ',', '.') }}</span>
                                            </div>
                                            <p class="text-xs text-gray-400">/month</p>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Total -->
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-medium text-gray-900">Total Monthly Revenue</span>
                                        <div class="flex items-center text-green-600">
                                            <x-icon name="money" class="w-5 h-5 mr-2" />
                                            <span class="text-xl font-bold">Rp
                                                {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <x-icon name="services" class="mx-auto h-12 w-12 text-gray-400" />
                                <h3 class="mt-2 text-sm font-medium text-gray-900">No services</h3>
                                <p class="mt-1 text-sm text-gray-500">This project has no services attached.</p>
                            </div>
                        @endif
                    </x-ui.card>
                </div>

                <!-- Manager Actions -->
                <div class="space-y-6">
                    <!-- Approval Actions -->
                    <x-ui.card title="Manager Actions">
                        <x-slot name="icon">
                            <x-icon name="check" />
                        </x-slot>

                        @if($project->status === 'pending')
                            <div class="space-y-4">
                                <!-- Approve Button -->
                                <form method="POST" action="{{ route('manager.projects.approve', $project) }}"
                                    class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="w-full inline-flex items-center justify-center px-4 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        <x-icon name="check" class="w-5 h-5 mr-2" />
                                        Approve Project
                                    </button>
                                </form>

                                <!-- Reject Form -->
                                <div class="border-t border-gray-200 pt-4">
                                    <form method="POST" action="{{ route('manager.projects.reject', $project) }}"
                                        class="space-y-3">
                                        @csrf
                                        <div>
                                            <x-input-label for="manager_note" :value="__('Rejection Reason')" />
                                            <textarea id="manager_note" name="manager_note" rows="3"
                                                class="mt-1 block w-full border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm"
                                                placeholder="Explain why this project is being rejected..."
                                                required></textarea>
                                            <x-input-error :messages="$errors->get('manager_note')" class="mt-2" />
                                        </div>

                                        <button type="submit"
                                            class="w-full inline-flex items-center justify-center px-4 py-3 bg-red-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            <x-icon name="x" class="w-5 h-5 mr-2" />
                                            Reject Project
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <p class="text-gray-500">This project has already been {{ $project->status }}.</p>
                                @if($project->manager_note)
                                    <div class="mt-3 p-3 bg-gray-50 rounded-lg">
                                        <p class="text-sm text-gray-700"><strong>Manager Note:</strong>
                                            {{ $project->manager_note }}</p>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </x-ui.card>

                    <!-- Project Summary -->
                    <x-ui.card title="Project Summary">
                        <x-slot name="icon">
                            <x-icon name="dashboard" />
                        </x-slot>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Total Services</span>
                                <span
                                    class="text-lg font-semibold text-gray-900">{{ $project->services->count() }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Monthly Revenue</span>
                                <span class="text-lg font-semibold text-green-600">
                                    Rp
                                    {{ number_format($project->services->sum(function ($s) {
    return $s->pivot->price_snapshot ?? $s->price; }), 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Annual Revenue</span>
                                <span class="text-lg font-semibold text-green-600">
                                    Rp
                                    {{ number_format($project->services->sum(function ($s) {
    return $s->pivot->price_snapshot ?? $s->price; }) * 12, 0, ',', '.') }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Submitted</span>
                                <span
                                    class="text-sm text-gray-900">{{ $project->submitted_at ? $project->submitted_at->diffForHumans() : 'Not submitted' }}</span>
                            </div>
                        </div>
                    </x-ui.card>

                    <!-- Back to List -->
                    <x-ui.button-link href="{{ route('manager.projects.index') }}" variant="secondary"
                        class="w-full justify-center">
                        Back to Pending Projects
                    </x-ui.button-link>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>