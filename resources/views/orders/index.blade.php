<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white mb-8">My Orders</h1>

        <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden">
            <x-table>
                <x-slot name="head">
                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-400">Order ID</th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-400">Date</th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-400">Total Amount</th>
                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-400">Status</th>
                    <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider dark:text-slate-400">Action</th>
                </x-slot>
                <x-slot name="body">
                    @php
                        $orders = [
                            ['id' => 'ORD-9382', 'date' => 'Oct 24, 2023', 'total' => 349.00, 'status' => 'paid', 'items' => 1],
                            ['id' => 'ORD-8472', 'date' => 'Sep 12, 2023', 'total' => 842.50, 'status' => 'shipped', 'items' => 3],
                            ['id' => 'ORD-7261', 'date' => 'Aug 05, 2023', 'total' => 129.99, 'status' => 'pending', 'items' => 1],
                            ['id' => 'ORD-6150', 'date' => 'Jun 18, 2023', 'total' => 54.00, 'status' => 'cancelled', 'items' => 2],
                        ];
                    @endphp

                    @foreach($orders as $order)
                        <tr>
                            <td class="px-6 py-5 whitespace-nowrap text-sm font-bold text-slate-900 dark:text-white">
                                <a href="{{ url('/orders/show') }}" class="hover:text-brand-600 transition-colors">#{{ $order['id'] }}</a>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">
                                {{ $order['date'] }}
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-white">
                                ${{ number_format($order['total'], 2) }}
                                <span class="text-xs font-normal text-slate-500 ml-1">({{ $order['items'] }} items)</span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                @if($order['status'] === 'paid')
                                    <x-badge variant="brand">Paid</x-badge>
                                @elseif($order['status'] === 'shipped')
                                    <x-badge variant="success">Shipped</x-badge>
                                @elseif($order['status'] === 'pending')
                                    <x-badge variant="warning">Pending</x-badge>
                                @else
                                    <x-badge variant="danger">Cancelled</x-badge>
                                @endif
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ url('/orders/show') }}" class="text-brand-600 hover:text-brand-900 dark:text-brand-400 dark:hover:text-brand-300">View Details</a>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-table>
        </div>
    </div>
</x-layouts.app>
