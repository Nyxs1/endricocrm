<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <x-icon name="users" class="mr-3 text-gray-600 w-5 h-5" />
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $customer->name }}
                    </h2>
                    <p class="text-sm text-gray-500">{{ $customer->customer_code }}</p>
                </div>
            </div>
            <div class="flex space-x-3">
                <x-ui.button-link href="{{ route('customers.index') }}" variant="secondary">
                    Kembali ke Daftar
                </x-ui.button-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Customer Information -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Customer Details -->
                    <x-ui.card title="Informasi Customer">
                        <x-slot name="icon">
                            <x-icon name="users" />
                        </x-slot>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Customer</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <x-icon name="users" class="w-5 h-5 text-gray-400 mr-3" />
                                    <span class="text-gray-900 font-medium">{{ $customer->name }}</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Customer Code</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <span
                                        class="inline-flex px-2 py-1 text-xs font-mono bg-blue-100 text-blue-800 rounded">
                                        {{ $customer->customer_code }}
                                    </span>
                                </div>
                            </div>

                            @if($customer->email)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                        <x-icon name="email" class="w-5 h-5 text-gray-400 mr-3" />
                                        <a href="mailto:{{ $customer->email }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $customer->email }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($customer->phone)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
                                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                        <x-icon name="phone" class="w-5 h-5 text-gray-400 mr-3" />
                                        <a href="tel:{{ $customer->phone }}" class="text-blue-600 hover:text-blue-800">
                                            {{ $customer->phone }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if($customer->address)
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                                    <div class="p-3 bg-gray-50 rounded-lg">
                                        <p class="text-gray-900">{{ $customer->address }}</p>
                                    </div>
                                </div>
                            @endif

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Berlangganan</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    <x-icon name="calendar" class="w-5 h-5 text-gray-400 mr-3" />
                                    <span
                                        class="text-gray-900">{{ $customer->subscribed_at ? $customer->subscribed_at->format('d M Y') : 'Belum berlangganan' }}</span>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                    @php $activeCount = $customer->subscriptions->where('status', 'active')->count(); @endphp
                                    <span
                                        class="inline-flex px-3 py-1 text-sm font-semibold rounded-full {{ $activeCount > 0 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        {{ $activeCount > 0 ? 'Active Customer' : 'Inactive Customer' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </x-ui.card>

                    <!-- Active Services -->
                    <x-ui.card title="Layanan Berlangganan">
                        <x-slot name="icon">
                            <x-icon name="services" />
                        </x-slot>

                        @if($customer->subscriptions->count() > 0)
                            <div class="space-y-4">
                                @php $totalMonthly = 0; @endphp
                                @foreach ($customer->subscriptions as $subscription)
                                    @php $totalMonthly += $subscription->service->price; @endphp
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
                                                <h4 class="text-sm font-medium text-gray-900">{{ $subscription->service->name }}
                                                </h4>
                                                <p class="text-sm text-gray-500">Speed: {{ $subscription->service->speed }}</p>
                                                <p class="text-xs text-gray-400">Start:
                                                    {{ $subscription->start_date ? \Carbon\Carbon::parse($subscription->start_date)->format('d M Y') : 'N/A' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <div class="flex items-center text-green-600 mb-1">
                                                <x-icon name="money" class="w-4 h-4 mr-1" />
                                                <span class="font-semibold">Rp
                                                    {{ number_format($subscription->service->price, 0, ',', '.') }}</span>
                                            </div>
                                            <span
                                                class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $subscription->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($subscription->status) }}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach

                                <!-- Total Monthly -->
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-medium text-gray-900">Total Bulanan</span>
                                        <div class="flex items-center text-green-600">
                                            <x-icon name="money" class="w-5 h-5 mr-2" />
                                            <span class="text-xl font-bold">Rp
                                                {{ number_format($totalMonthly, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <x-icon name="services" class="mx-auto h-12 w-12 text-gray-400" />
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada layanan</h3>
                                <p class="mt-1 text-sm text-gray-500">Customer ini belum berlangganan layanan apapun.</p>
                            </div>
                        @endif
                    </x-ui.card>
                </div>

                <!-- Customer Stats & Actions -->
                <div class="space-y-6">
                    <!-- Quick Stats -->
                    <x-ui.card title="Statistik">
                        <x-slot name="icon">
                            <x-icon name="dashboard" />
                        </x-slot>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Total Services</span>
                                <span
                                    class="text-lg font-semibold text-gray-900">{{ $customer->subscriptions->count() }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Active Services</span>
                                <span
                                    class="text-lg font-semibold text-green-600">{{ $customer->subscriptions->where('status', 'active')->count() }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Monthly Revenue</span>
                                <span class="text-lg font-semibold text-green-600">Rp
                                    {{ number_format($customer->subscriptions->sum(function ($sub) {
    return $sub->service->price; }), 0, ',', '.') }}</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Customer Since</span>
                                <span class="text-sm text-gray-900">{{ $customer->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </x-ui.card>

                    <!-- Quick Actions -->
                    <x-ui.card title="Actions">
                        <x-slot name="icon">
                            <x-icon name="plus" />
                        </x-slot>

                        <div class="space-y-3">
                            @if($customer->email)
                                <a href="mailto:{{ $customer->email }}"
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                                    <x-icon name="email" class="w-4 h-4 mr-2" />
                                    Send Email
                                </a>
                            @endif

                            @if($customer->phone)
                                <a href="tel:{{ $customer->phone }}"
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 transition">
                                    <x-icon name="phone" class="w-4 h-4 mr-2" />
                                    Call Customer
                                </a>
                            @endif

                            @if($customer->lead)
                                <x-ui.button-link href="{{ route('leads.show', $customer->lead) }}" variant="secondary"
                                    class="w-full justify-center">
                                    <x-slot name="icon">
                                        <x-icon name="eye" class="w-4 h-4" />
                                    </x-slot>
                                    View Original Lead
                                </x-ui.button-link>
                            @endif
                        </div>
                    </x-ui.card>

                    <!-- Customer Timeline -->
                    <x-ui.card title="Timeline">
                        <x-slot name="icon">
                            <x-icon name="calendar" />
                        </x-slot>

                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">Customer Created</p>
                                    <p class="text-xs text-gray-500">{{ $customer->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>
                            </div>

                            @if($customer->subscribed_at)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">First Subscription</p>
                                        <p class="text-xs text-gray-500">
                                            {{ $customer->subscribed_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($customer->updated_at != $customer->created_at)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Last Updated</p>
                                        <p class="text-xs text-gray-500">{{ $customer->updated_at->format('d M Y, H:i') }}
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
