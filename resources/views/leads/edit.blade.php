<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <x-icon name="leads" class="mr-3 text-gray-600 w-5 h-5" />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Lead: ') . $lead->name }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <x-ui.card title="Edit Informasi Lead">
                <x-slot name="icon">
                    <x-icon name="edit" />
                </x-slot>

                <form method="POST" action="{{ route('leads.update', $lead) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama -->
                        <div>
                            <x-input-label for="name" :value="__('Nama Lengkap')" />
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-icon name="users" class="h-5 w-5 text-gray-400" />
                                </div>
                                <x-text-input id="name" class="block w-full pl-10" type="text" name="name"
                                    :value="old('name', $lead->name)" required placeholder="Masukkan nama lengkap" />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-icon name="email" class="h-5 w-5 text-gray-400" />
                                </div>
                                <x-text-input id="email" class="block w-full pl-10" type="email" name="email"
                                    :value="old('email', $lead->email)" placeholder="contoh@email.com" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div>
                            <x-input-label for="phone" :value="__('Nomor Telepon')" />
                            <div class="relative mt-1">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-icon name="phone" class="h-5 w-5 text-gray-400" />
                                </div>
                                <x-text-input id="phone" class="block w-full pl-10" type="tel" name="phone"
                                    :value="old('phone', $lead->phone)" placeholder="08123456789" />
                            </div>
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label for="status" :value="__('Status Lead')" />
                            <select id="status" name="status"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="cold" {{ old('status', $lead->status) == 'cold' ? 'selected' : '' }}>Cold
                                </option>
                                <option value="warm" {{ old('status', $lead->status) == 'warm' ? 'selected' : '' }}>Warm
                                </option>
                                <option value="hot" {{ old('status', $lead->status) == 'hot' ? 'selected' : '' }}>Hot
                                </option>
                                <option value="qualified" {{ old('status', $lead->status) == 'qualified' ? 'selected' : '' }}>Qualified</option>
                                <option value="in_project" {{ old('status', $lead->status) == 'in_project' ? 'selected' : '' }}>In Project</option>
                                <option value="lost" {{ old('status', $lead->status) == 'lost' ? 'selected' : '' }}>Lost
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Address -->
                    <div>
                        <x-input-label for="address" :value="__('Alamat')" />
                        <textarea id="address" name="address" rows="3"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Masukkan alamat lengkap">{{ old('address', $lead->address) }}</textarea>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div>
                        <x-input-label for="description" :value="__('Catatan/Deskripsi')" />
                        <textarea id="description" name="description" rows="3"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Catatan tambahan tentang lead ini">{{ old('description', $lead->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                        <x-ui.button-link href="{{ route('leads.show', $lead) }}" variant="secondary">
                            Batal
                        </x-ui.button-link>

                        <x-primary-button>
                            <x-icon name="edit" class="w-4 h-4 mr-2" />
                            {{ __('Update Lead') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-ui.card>
        </div>
    </div>
</x-app-layout>