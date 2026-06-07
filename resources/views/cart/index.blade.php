<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white mb-8 tracking-tight">Shopping Cart</h1>

        <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start" x-data="cartData()">
            <!-- Cart Items -->
            <div class="lg:col-span-8">
                <template x-if="items.length > 0">
                    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-sm border border-slate-200 dark:border-slate-700 overflow-hidden mb-8 lg:mb-0">
                        <ul role="list" class="divide-y divide-slate-200 dark:divide-slate-700">
                            <template x-for="(item, index) in items" :key="item.id">
                                <li class="p-6 flex py-6 sm:py-8">
                                    <div class="shrink-0">
                                        <img :src="item.image" alt="Product Image" class="w-24 h-24 rounded-lg object-cover sm:w-32 sm:h-32 border border-slate-100 dark:border-slate-700">
                                    </div>

                                    <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
                                        <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                                            <div>
                                                <div class="flex justify-between">
                                                    <h3 class="text-base font-bold text-slate-900 dark:text-white">
                                                        <a href="#" class="hover:text-brand-600 transition-colors" x-text="item.name"></a>
                                                    </h3>
                                                </div>
                                                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400" x-text="'Color: ' + item.color"></p>
                                                <p class="mt-1 text-sm font-medium text-slate-900 dark:text-white" x-text="'$' + item.price.toFixed(2)"></p>
                                            </div>

                                            <div class="mt-4 sm:mt-0 sm:pr-9 flex flex-col items-end">
                                                <div class="flex items-center border border-slate-300 dark:border-slate-600 rounded-lg bg-slate-50 dark:bg-slate-900">
                                                    <button type="button" @click="if(item.quantity > 1) item.quantity--" class="p-1.5 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                                    </button>
                                                    <input type="number" x-model.number="item.quantity" class="w-10 text-center border-0 bg-transparent text-sm text-slate-900 dark:text-white font-medium focus:ring-0 p-0" min="1">
                                                    <button type="button" @click="item.quantity++" class="p-1.5 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white transition-colors">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                                    </button>
                                                </div>
                                                
                                                <div class="absolute top-0 right-0 sm:relative sm:mt-4 sm:right-auto sm:top-auto">
                                                    <button type="button" @click="items.splice(index, 1)" class="-m-2 p-2 inline-flex text-slate-400 hover:text-red-500 transition-colors">
                                                        <span class="sr-only">Remove</span>
                                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </template>

                <template x-if="items.length === 0">
                    <div class="text-center py-16 bg-white dark:bg-slate-800 rounded-2xl border border-slate-200 dark:border-slate-700 border-dashed">
                        <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <h3 class="mt-4 text-sm font-medium text-slate-900 dark:text-white">Your cart is empty</h3>
                        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">Start shopping to add items to your cart.</p>
                        <div class="mt-6">
                            <a href="{{ url('/products') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-brand-600 hover:bg-brand-700">
                                Browse Products
                            </a>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-4" x-show="items.length > 0">
                <x-card padding="p-6">
                    <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-6">Order Summary</h2>

                    <!-- Coupon Input -->
                    <div class="mb-6 pb-6 border-b border-slate-200 dark:border-slate-700">
                        <label for="discount-code" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">Discount code</label>
                        <div class="flex space-x-2">
                            <x-input type="text" id="discount-code" name="discount-code" class="flex-1" placeholder="Enter code" x-model="couponCode" />
                            <x-button type="button" variant="secondary" @click="applyCoupon">Apply</x-button>
                        </div>
                        <p x-show="couponApplied" class="mt-2 text-sm text-green-600 dark:text-green-400 flex items-center" style="display: none;">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Coupon applied successfully!
                        </p>
                    </div>

                    <dl class="space-y-4 text-sm text-slate-600 dark:text-slate-400">
                        <div class="flex items-center justify-between">
                            <dt>Subtotal</dt>
                            <dd class="font-medium text-slate-900 dark:text-white" x-text="'$' + subtotal.toFixed(2)"></dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt>Shipping estimate</dt>
                            <dd class="font-medium text-slate-900 dark:text-white" x-text="'$' + shipping.toFixed(2)"></dd>
                        </div>
                        <div class="flex items-center justify-between">
                            <dt>Tax estimate</dt>
                            <dd class="font-medium text-slate-900 dark:text-white" x-text="'$' + tax.toFixed(2)"></dd>
                        </div>
                        <template x-if="couponApplied">
                            <div class="flex items-center justify-between text-green-600 dark:text-green-400">
                                <dt>Discount (10%)</dt>
                                <dd class="font-medium" x-text="'-$' + discount.toFixed(2)"></dd>
                            </div>
                        </template>
                        <div class="flex items-center justify-between border-t border-slate-200 dark:border-slate-700 pt-4 text-base font-bold text-slate-900 dark:text-white">
                            <dt>Order Total</dt>
                            <dd x-text="'$' + total.toFixed(2)"></dd>
                        </div>
                    </dl>

                    <div class="mt-8">
                        <a href="{{ url('/checkout') }}" class="w-full inline-flex items-center justify-center px-4 py-3 border border-transparent shadow-sm text-base font-medium rounded-lg text-white bg-brand-600 hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand-500 transition-colors">
                            Proceed to Checkout
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </x-card>
            </div>
        </div>
    </div>

    <script>
        function cartData() {
            return {
                items: [
                    { id: 1, name: 'Premium Wireless Headphones', price: 349.00, quantity: 1, color: 'Black', image: 'https://picsum.photos/seed/p1/400/400' },
                    { id: 2, name: 'Ergonomic Desk Chair', price: 199.50, quantity: 2, color: 'Grey', image: 'https://picsum.photos/seed/p2/400/400' },
                ],
                shipping: 15.00,
                taxRate: 0.08,
                couponCode: '',
                couponApplied: false,
                
                get subtotal() {
                    return this.items.reduce((total, item) => total + (item.price * item.quantity), 0);
                },
                get tax() {
                    return this.subtotal * this.taxRate;
                },
                get discount() {
                    return this.couponApplied ? this.subtotal * 0.10 : 0;
                },
                get total() {
                    return this.subtotal + this.shipping + this.tax - this.discount;
                },
                applyCoupon() {
                    if (this.couponCode.length > 3) {
                        this.couponApplied = true;
                    }
                }
            }
        }
    </script>
</x-layouts.app>
