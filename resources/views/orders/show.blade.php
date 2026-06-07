<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white flex items-center gap-3">
                Order #ORD-8472
                <x-badge variant="success">Shipped</x-badge>
            </h1>
            <a href="{{ url('/orders') }}" class="text-sm font-medium text-brand-600 hover:text-brand-500 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Orders
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <!-- Order Items -->
                <x-card padding="p-0">
                    <div class="p-6 border-b border-slate-100 dark:border-slate-700">
                        <h2 class="text-lg font-bold text-slate-900 dark:text-white">Items Ordered</h2>
                    </div>
                    <ul role="list" class="divide-y divide-slate-100 dark:divide-slate-700">
                        <li class="p-6 flex py-6 sm:py-8">
                            <div class="shrink-0">
                                <img src="https://picsum.photos/seed/p1/200/200" alt="Product Image" class="w-20 h-20 rounded-lg object-cover sm:w-24 sm:h-24 border border-slate-100 dark:border-slate-700">
                            </div>
                            <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                <div class="relative sm:grid sm:grid-cols-2 sm:gap-x-6">
                                    <div>
                                        <h3 class="text-base font-bold text-slate-900 dark:text-white">Premium Wireless Headphones</h3>
                                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Color: Black</p>
                                    </div>
                                    <div class="mt-4 sm:mt-0 flex justify-between sm:justify-end items-center sm:items-start gap-4 text-sm font-medium">
                                        <p class="text-slate-500 dark:text-slate-400">Qty 1</p>
                                        <p class="text-slate-900 dark:text-white">$349.00</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </x-card>

                <!-- Order Timeline -->
                <x-card padding="p-6">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Order Status</h2>
                    <div class="flow-root">
                        <ul role="list" class="-mb-8">
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-brand-600" aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-brand-600 flex items-center justify-center ring-8 ring-white dark:ring-slate-800">
                                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                            </span>
                                        </div>
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm font-medium text-slate-900 dark:text-white">Order placed</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-slate-500">
                                                <time datetime="2023-09-12">Sep 12, 10:24 AM</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-slate-200 dark:bg-slate-700" aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-brand-600 flex items-center justify-center ring-8 ring-white dark:ring-slate-800">
                                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                            </span>
                                        </div>
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm font-medium text-slate-900 dark:text-white">Processing</p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-slate-500">
                                                <time datetime="2023-09-12">Sep 12, 2:15 PM</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="relative pb-8">
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-brand-600 flex items-center justify-center ring-8 ring-white dark:ring-slate-800">
                                                <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                            </span>
                                        </div>
                                        <div class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                            <div>
                                                <p class="text-sm font-medium text-slate-900 dark:text-white">Shipped</p>
                                                <p class="mt-1 text-sm text-slate-500">Tracking: <a href="#" class="font-medium text-brand-600 hover:text-brand-500">1Z9999999999999999</a></p>
                                            </div>
                                            <div class="whitespace-nowrap text-right text-sm text-slate-500">
                                                <time datetime="2023-09-13">Sep 13, 9:00 AM</time>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </x-card>
            </div>

            <!-- Order Info Sidebar -->
            <div class="space-y-8">
                <x-card padding="p-6">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Order Summary</h2>
                    <dl class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
                        <div class="flex items-center justify-between">
                            <dt>Subtotal</dt>
                            <dd class="font-medium text-slate-900 dark:text-white">$349.00</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt>Shipping</dt>
                            <dd class="font-medium text-slate-900 dark:text-white">$15.00</dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt>Tax</dt>
                            <dd class="font-medium text-slate-900 dark:text-white">$27.92</dd>
                        </div>
                        <div class="flex items-center justify-between border-t border-slate-200 dark:border-slate-700 pt-4 text-base font-bold text-slate-900 dark:text-white">
                            <dt>Total</dt>
                            <dd>$391.92</dd>
                        </div>
                    </dl>
                </x-card>

                <x-card padding="p-6">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Customer Info</h2>
                    
                    <div class="space-y-6 text-sm">
                        <div>
                            <h3 class="font-medium text-slate-900 dark:text-white">Contact Information</h3>
                            <p class="mt-2 text-slate-500 dark:text-slate-400">john.doe@example.com</p>
                        </div>
                        
                        <div>
                            <h3 class="font-medium text-slate-900 dark:text-white">Shipping Address</h3>
                            <address class="mt-2 text-slate-500 dark:text-slate-400 not-italic">
                                John Doe<br>
                                123 Main Street<br>
                                Apt 4B<br>
                                New York, NY 10001
                            </address>
                        </div>

                        <div>
                            <h3 class="font-medium text-slate-900 dark:text-white">Payment Method</h3>
                            <div class="mt-2 flex items-center text-slate-500 dark:text-slate-400">
                                <svg class="w-8 h-auto mr-2" viewBox="0 0 36 24" fill="none"><rect width="36" height="24" rx="4" fill="#224297"/><path d="M16.924 10.963h-1.637l-1.042 4.954h1.637l1.042-4.954zm3.931 0h-1.28c-.3 0-.549.171-.659.444l-1.87 4.51h1.72l.343-.967h2.102l.2 1h1.564l-2.12-4.954zm-.42 3.14l.886-2.427h.03l.255 2.443-1.171-.016zm6.398-3.14h-1.636l-.995 4.954h1.636l.995-4.954zm-8.814 0h-1.572c-.328 0-.585.14-.716.425l-2.766 4.529h1.688l.551-.762h2.29l.216.76h1.597l-1.288-4.952zm-1.876 3.164l1.103-1.558.411 1.558h-1.514z" fill="#fff"/></svg>
                                Ending with 4242
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-layouts.app>
