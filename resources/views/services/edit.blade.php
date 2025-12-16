<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-icon name="services" class="mr-3 text-gray-600 w-5 h-5" />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Service: ') . $service->name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <x-ui.card title="Edit Informasi Service">
                <x-slot name="icon">
                    <x-icon name="edit" />
                </x-slot>
                
                <form method="POST" action="{{ route('services.update', $service) }}" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Service Name -->
                        <div>
                            <x-input-label for="name" :value="__('Nama Service')" />
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-icon name="services" class="h-5 w-5 text-gray-400" />
                                </div>
                                <x-text-input id="name" 
                                            class="block w-full pl-10" 
                                            type="text" 
                                            name="name" 
                                            :value="old('name', $service->name)" 
                                            required 
                                            placeholder="Contoh: Internet Fiber 100Mbps" />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Speed -->
                        <div>
                            <x-input-label for="speed" :value="__('Kecepatan')" />
                            <x-text-input id="speed" 
                                        class="block w-full mt-1" 
                                        type="text" 
                                        name="speed" 
                                        :value="old('speed', $service->speed)" 
                                        placeholder="Contoh: 100Mbps, 1Gbps" />
                            <x-input-error :messages="$errors->get('speed')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div>
                            <x-input-label for="price" :value="__('Harga (Rp)')" />
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-icon name="money" class="h-5 w-5 text-gray-400" />
                                </div>
                                <x-text-input id="price" 
                                            class="block w-full pl-10" 
                                            type="number" 
                                            name="price" 
                                            :value="old('price', $service->price)" 
                                            required 
                                            min="0"
                                            step="1000"
                                            placeholder="500000" />
                            </div>
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label for="is_active" :value="__('Status')" />
                            <div class="mt-1">
                                <label class="flex items-center">
                                    <input type="checkbox" 
                                           id="is_active"
                                           name="is_active" 
                                           value="1"
                                           {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="ml-2 text-sm text-gray-700">Service Aktif</span>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Deskripsi Service')" />
                        <textarea id="description" 
                                name="description" 
                                rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                placeholder="Deskripsi detail tentang service ini">{{ old('description', $service->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Features -->
                    <div>
                        <x-input-label for="features" :value="__('Fitur-fitur')" />
                        <textarea id="features" 
                                name="features" 
                                rows="3"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                placeholder="Contoh: Unlimited bandwidth, 24/7 support, Free installation">{{ old('features', $service->features) }}</textarea>
                        <x-input-error :messages="$errors->get('features')" class="mt-2" />
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                        <x-ui.button-link href="{{ route('services.show', $service) }}" variant="secondary">
                            Batal
                        </x-ui.button-link>
                        
                        <x-primary-button>
                            <x-icon name="edit" class="w-4 h-4 mr-2" />
                            {{ __('Update Service') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-ui.card>
        </div>
    </div>
</x-app-layout>

