<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <x-icon name="services" class="mr-3 text-gray-600 w-5 h-5" />
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Services Management') }}
                </h2>
            </div>
            <x-ui.button-link href="{{ route('services.create') }}" variant="primary">
                <x-slot name="icon">
                    <x-icon name="plus" class="w-4 h-4" />
                </x-slot>
                Tambah Service
            </x-ui.button-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-ui.card>
                @if($services->count() > 0)
                    <x-ui.table :headers="['Service', 'Speed', 'Price', 'Status', 'Aksi']">
                        @foreach ($services as $service)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <x-icon name="services" class="w-5 h-5 text-indigo-600" />
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $service->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $service->description ?? 'No description' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full">
                                        {{ $service->speed }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('services.show', $service) }}"
                                            class="text-blue-600 hover:text-blue-900 flex items-center">
                                            <x-icon name="eye" class="w-4 h-4 mr-1" />
                                            Detail
                                        </a>
                                        <a href="{{ route('services.edit', $service) }}"
                                            class="text-green-600 hover:text-green-900 flex items-center">
                                            <x-icon name="edit" class="w-4 h-4 mr-1" />
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-ui.table>
                @else
                    <div class="text-center py-12">
                        <x-icon name="services" class="mx-auto h-12 w-12 text-gray-400" />
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada services</h3>
                        <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan service pertama Anda.</p>
                        <div class="mt-6">
                            <x-ui.button-link href="{{ route('services.create') }}" variant="primary">
                                <x-slot name="icon">
                                    <x-icon name="plus" class="w-4 h-4" />
                                </x-slot>
                                Tambah Service
                            </x-ui.button-link>
                        </div>
                    </div>
                @endif
            </x-ui.card>
        </div>
    </div>
</x-app-layout>