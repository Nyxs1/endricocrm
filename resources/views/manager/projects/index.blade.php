<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-icon name="projects" class="mr-3 text-gray-600 w-5 h-5" />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manager - Pending Projects') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-ui.card>
                @if($projects->count() > 0)
                    <x-ui.table :headers="['Project', 'Lead/Customer', 'Services', 'Total Value', 'Submitted', 'Aksi']">
                        @foreach ($projects as $project)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                                <x-icon name="projects" class="w-5 h-5 text-yellow-600" />
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Project #{{ $project->id }}</div>
                                            <div class="text-sm text-gray-500">{{ $project->description ?? 'No description' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $project->lead->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $project->lead->email ?? 'No email' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $project->services->count() }} Services
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    @php
                                        $total = $project->services->sum(function ($service) {
                                            return $service->pivot->price_snapshot ?? $service->price;
                                        });
                                    @endphp
                                    <div class="flex items-center text-green-600">
                                        <x-icon name="money" class="w-4 h-4 mr-1" />
                                        Rp {{ number_format($total, 0, ',', '.') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $project->submitted_at ? $project->submitted_at->format('d M Y') : 'Not submitted' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <x-ui.button-link href="{{ route('manager.projects.show', $project) }}" variant="primary">
                                        <x-slot name="icon">
                                            <x-icon name="eye" class="w-4 h-4" />
                                        </x-slot>
                                        Review
                                    </x-ui.button-link>
                                </td>
                            </tr>
                        @endforeach
                    </x-ui.table>
                @else
                    <div class="text-center py-12">
                        <x-icon name="projects" class="mx-auto h-12 w-12 text-gray-400" />
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada project pending</h3>
                        <p class="mt-1 text-sm text-gray-500">Semua project sudah direview atau belum ada yang disubmit.</p>
                    </div>
                @endif
            </x-ui.card>
        </div>
    </div>
</x-app-layout>