<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <x-icon name="projects" class="mr-3 text-gray-600 w-5 h-5" />
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Projects Management') }}
                </h2>
            </div>
            <x-ui.button-link href="{{ route('projects.create') }}" variant="primary">
                <x-slot name="icon">
                    <x-icon name="plus" class="w-4 h-4" />
                </x-slot>
                Buat Project
            </x-ui.button-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-ui.card>
                @if($projects->count() > 0)
                    <x-ui.table :headers="['Project', 'Lead/Customer', 'Status', 'Tanggal Dibuat', 'Aksi']">
                        @foreach ($projects as $project)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                                <x-icon name="projects" class="w-5 h-5 text-purple-600" />
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
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusColors = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'in_progress' => 'bg-blue-100 text-blue-800',
                                            'completed' => 'bg-green-100 text-green-800',
                                            'cancelled' => 'bg-red-100 text-red-800'
                                        ];
                                    @endphp
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $statusColors[$project->status] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $project->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('projects.show', $project) }}"
                                        class="text-blue-600 hover:text-blue-900 flex items-center">
                                        <x-icon name="eye" class="w-4 h-4 mr-1" />
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </x-ui.table>
                @else
                    <div class="text-center py-12">
                        <x-icon name="projects" class="mx-auto h-12 w-12 text-gray-400" />
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada projects</h3>
                        <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat project pertama Anda.</p>
                        <div class="mt-6">
                            <x-ui.button-link href="{{ route('projects.create') }}" variant="primary">
                                <x-slot name="icon">
                                    <x-icon name="plus" class="w-4 h-4" />
                                </x-slot>
                                Buat Project
                            </x-ui.button-link>
                        </div>
                    </div>
                @endif
            </x-ui.card>
        </div>
    </div>
</x-app-layout>