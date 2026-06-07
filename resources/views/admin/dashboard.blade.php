<x-layouts.admin>
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Dashboard Overview</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Welcome back, here's what's happening with your store today.</p>
        </div>
        <div class="flex items-center gap-3">
            <x-button variant="secondary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Export Report
            </x-button>
            <x-button variant="primary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                New Product
            </x-button>
        </div>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @php
            $kpis = [
                ['title' => 'Total Revenue', 'value' => '$124,563.00', 'trend' => '+14.5%', 'trendUp' => true, 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ['title' => 'Total Orders', 'value' => '1,429', 'trend' => '+5.2%', 'trendUp' => true, 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
                ['title' => 'Total Users', 'value' => '8,234', 'trend' => '-2.1%', 'trendUp' => false, 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                ['title' => 'Conversion Rate', 'value' => '3.8%', 'trend' => '+1.2%', 'trendUp' => true, 'icon' => 'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6'],
            ];
        @endphp

        @foreach($kpis as $kpi)
            <x-card padding="p-5">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 rounded-full bg-brand-50 dark:bg-brand-900/20 flex items-center justify-center text-brand-600 dark:text-brand-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $kpi['icon'] }}"></path></svg>
                    </div>
                    <span class="flex items-center text-sm font-semibold {{ $kpi['trendUp'] ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        {{ $kpi['trend'] }}
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $kpi['trendUp'] ? 'M5 10l7-7m0 0l7 7m-7-7v18' : 'M19 14l-7 7m0 0l-7-7m7 7V3' }}"></path></svg>
                    </span>
                </div>
                <h3 class="text-slate-500 dark:text-slate-400 text-sm font-medium">{{ $kpi['title'] }}</h3>
                <p class="text-2xl font-bold text-slate-900 dark:text-white mt-1">{{ $kpi['value'] }}</p>
            </x-card>
        @endforeach
    </div>

    <!-- Recent Orders & Top Products -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Recent Orders -->
        <x-card class="lg:col-span-2" padding="p-0">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Recent Orders</h2>
                <a href="#" class="text-sm font-medium text-brand-600 hover:text-brand-700 dark:text-brand-400">View all</a>
            </div>
            <x-table>
                <x-slot name="head">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider dark:text-slate-400">Order ID</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider dark:text-slate-400">Customer</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider dark:text-slate-400">Date</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider dark:text-slate-400">Amount</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider dark:text-slate-400">Status</th>
                </x-slot>
                <x-slot name="body">
                    @foreach(['#ORD-001', '#ORD-002', '#ORD-003', '#ORD-004', '#ORD-005'] as $index => $orderId)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-white">{{ $orderId }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">John Doe {{ $index }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">Today, 10:{{ 45 + $index }} AM</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-white">${{ number_format(100 + ($index * 45.5), 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <x-badge variant="{{ $index % 3 == 0 ? 'warning' : 'success' }}">
                                {{ $index % 3 == 0 ? 'Pending' : 'Completed' }}
                            </x-badge>
                        </td>
                    </tr>
                    @endforeach
                </x-slot>
            </x-table>
        </x-card>

        <!-- Top Products -->
        <x-card padding="p-0">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                <h2 class="text-lg font-bold text-slate-900 dark:text-white">Top Products</h2>
            </div>
            <div class="p-6 space-y-6">
                @foreach([1,2,3,4,5] as $i)
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-lg bg-slate-100 dark:bg-slate-700 overflow-hidden shrink-0">
                        <img src="https://picsum.photos/seed/prod{{$i}}/100/100" alt="Product" class="w-full h-full object-cover">
                    </div>
                    <div class="ml-4 flex-1">
                        <h4 class="text-sm font-bold text-slate-900 dark:text-white truncate">Premium Wireless Headphones</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">45 Sales</p>
                    </div>
                    <div class="text-sm font-bold text-slate-900 dark:text-white">${{ 199.99 * $i }}</div>
                </div>
                @endforeach
            </div>
        </x-card>
    </div>
</x-layouts.admin>
