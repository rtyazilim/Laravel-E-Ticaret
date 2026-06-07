<x-layouts.app>
    <div class="bg-slate-50 dark:bg-slate-900 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-extrabold text-slate-900 dark:text-white mb-8">Checkout</h1>

            <div class="lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start" x-data="{ step: 1, shippingMethod: 'standard' }">
                <!-- Left Column (Forms) -->
                <div class="lg:col-span-7 xl:col-span-8 space-y-8">
                    
                    <!-- Step 1: Contact & Shipping -->
                    <x-card padding="p-0" class="overflow-hidden" :class="step !== 1 ? 'opacity-60 grayscale-[30%]' : ''">
                        <div class="p-6 sm:p-8 bg-white dark:bg-slate-800">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center">
                                    <span class="w-8 h-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center text-sm mr-3 dark:bg-brand-900/30 dark:text-brand-400">1</span>
                                    Contact & Shipping
                                </h2>
                                <button x-show="step > 1" @click="step = 1" class="text-sm font-medium text-brand-600 hover:text-brand-500" style="display: none;">Edit</button>
                            </div>

                            <div x-show="step === 1" x-collapse>
                                <form class="space-y-6">
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Email address</label>
                                        <div class="mt-1">
                                            <x-input type="email" id="email" name="email" value="{{ auth()->user()->email ?? '' }}" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        <div>
                                            <label for="first-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">First name</label>
                                            <div class="mt-1">
                                                <x-input type="text" id="first-name" name="first-name" />
                                            </div>
                                        </div>
                                        <div>
                                            <label for="last-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Last name</label>
                                            <div class="mt-1">
                                                <x-input type="text" id="last-name" name="last-name" />
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <label for="address" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Address</label>
                                        <div class="mt-1">
                                            <x-input type="text" id="address" name="address" />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                                        <div class="sm:col-span-1">
                                            <label for="city" class="block text-sm font-medium text-slate-700 dark:text-slate-300">City</label>
                                            <div class="mt-1">
                                                <x-input type="text" id="city" name="city" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <label for="state" class="block text-sm font-medium text-slate-700 dark:text-slate-300">State / Province</label>
                                            <div class="mt-1">
                                                <x-input type="text" id="state" name="state" />
                                            </div>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <label for="postal-code" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Postal code</label>
                                            <div class="mt-1">
                                                <x-input type="text" id="postal-code" name="postal-code" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-4 flex justify-end">
                                        <x-button type="button" @click="step = 2" variant="primary">Continue to Shipping Method</x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </x-card>

                    <!-- Step 2: Shipping Method -->
                    <x-card padding="p-0" class="overflow-hidden" :class="step !== 2 ? 'opacity-60 grayscale-[30%]' : ''">
                        <div class="p-6 sm:p-8 bg-white dark:bg-slate-800">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center">
                                    <span class="w-8 h-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center text-sm mr-3 dark:bg-brand-900/30 dark:text-brand-400">2</span>
                                    Shipping Method
                                </h2>
                                <button x-show="step > 2" @click="step = 2" class="text-sm font-medium text-brand-600 hover:text-brand-500" style="display: none;">Edit</button>
                            </div>

                            <div x-show="step === 2" x-collapse style="display: none;">
                                <fieldset>
                                    <legend class="sr-only">Shipping method</legend>
                                    <div class="space-y-4">
                                        <!-- Standard -->
                                        <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none dark:bg-slate-800" :class="shippingMethod === 'standard' ? 'border-brand-500 ring-1 ring-brand-500' : 'border-slate-300 dark:border-slate-700'">
                                            <input type="radio" name="shipping-method" value="standard" class="sr-only" x-model="shippingMethod">
                                            <span class="flex flex-1">
                                                <span class="flex flex-col">
                                                    <span class="block text-sm font-medium text-slate-900 dark:text-white">Standard Delivery</span>
                                                    <span class="mt-1 flex items-center text-sm text-slate-500 dark:text-slate-400">4-6 business days</span>
                                                </span>
                                            </span>
                                            <svg class="h-5 w-5 text-brand-600" :class="shippingMethod === 'standard' ? 'opacity-100' : 'opacity-0'" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                            <span class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></span>
                                        </label>

                                        <!-- Express -->
                                        <label class="relative flex cursor-pointer rounded-lg border bg-white p-4 shadow-sm focus:outline-none dark:bg-slate-800" :class="shippingMethod === 'express' ? 'border-brand-500 ring-1 ring-brand-500' : 'border-slate-300 dark:border-slate-700'">
                                            <input type="radio" name="shipping-method" value="express" class="sr-only" x-model="shippingMethod">
                                            <span class="flex flex-1">
                                                <span class="flex flex-col">
                                                    <span class="block text-sm font-medium text-slate-900 dark:text-white">Express Delivery</span>
                                                    <span class="mt-1 flex items-center text-sm text-slate-500 dark:text-slate-400">1-2 business days</span>
                                                </span>
                                            </span>
                                            <span class="mt-0 text-sm font-medium text-slate-900 dark:text-white ml-4">+$15.00</span>
                                            <svg class="h-5 w-5 text-brand-600 ml-4" :class="shippingMethod === 'express' ? 'opacity-100' : 'opacity-0'" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                                            <span class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></span>
                                        </label>
                                    </div>
                                </fieldset>

                                <div class="pt-6 flex justify-between">
                                    <x-button type="button" @click="step = 1" variant="ghost">Back</x-button>
                                    <x-button type="button" @click="step = 3" variant="primary">Continue to Payment</x-button>
                                </div>
                            </div>
                        </div>
                    </x-card>

                    <!-- Step 3: Payment -->
                    <x-card padding="p-0" class="overflow-hidden" :class="step !== 3 ? 'opacity-60 grayscale-[30%]' : ''">
                        <div class="p-6 sm:p-8 bg-white dark:bg-slate-800">
                            <div class="flex items-center mb-6">
                                <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center">
                                    <span class="w-8 h-8 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center text-sm mr-3 dark:bg-brand-900/30 dark:text-brand-400">3</span>
                                    Payment Information
                                </h2>
                            </div>

                            <div x-show="step === 3" x-collapse style="display: none;">
                                <div class="bg-slate-50 dark:bg-slate-900/50 p-4 rounded-lg mb-6 border border-slate-200 dark:border-slate-700">
                                    <div class="flex items-center">
                                        <svg class="h-6 w-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                        <span class="ml-2 text-sm text-slate-600 dark:text-slate-400">Secure encrypted payment via Stripe</span>
                                    </div>
                                </div>

                                <form class="space-y-6">
                                    <div>
                                        <label for="card-name" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Name on card</label>
                                        <div class="mt-1">
                                            <x-input type="text" id="card-name" name="card-name" />
                                        </div>
                                    </div>

                                    <div>
                                        <label for="card-number" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Card number</label>
                                        <div class="mt-1 relative">
                                            <x-input type="text" id="card-number" name="card-number" placeholder="0000 0000 0000 0000" />
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-6">
                                        <div>
                                            <label for="card-expiration" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Expiration date (MM/YY)</label>
                                            <div class="mt-1">
                                                <x-input type="text" id="card-expiration" name="card-expiration" placeholder="12/24" />
                                            </div>
                                        </div>
                                        <div>
                                            <label for="card-cvc" class="block text-sm font-medium text-slate-700 dark:text-slate-300">CVC</label>
                                            <div class="mt-1">
                                                <x-input type="text" id="card-cvc" name="card-cvc" placeholder="123" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-6 flex justify-between">
                                        <x-button type="button" @click="step = 2" variant="ghost">Back</x-button>
                                        <x-button type="button" variant="primary" class="px-8 text-lg" @click="$dispatch('notify', {message: 'Order placed successfully!', type: 'success'})">Place Order</x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </x-card>
                </div>

                <!-- Right Column (Order Summary Sticky) -->
                <div class="mt-10 lg:mt-0 lg:col-span-5 xl:col-span-4">
                    <div class="sticky top-24">
                        <x-card padding="p-6">
                            <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Order Summary</h2>
                            
                            <ul role="list" class="divide-y divide-slate-200 dark:divide-slate-700 text-sm">
                                <li class="py-4 flex justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="relative">
                                            <img src="https://picsum.photos/seed/p1/200/200" alt="Product" class="w-16 h-16 rounded-lg object-cover border border-slate-200 dark:border-slate-700">
                                            <span class="absolute -top-2 -right-2 w-5 h-5 bg-slate-500 text-white text-xs font-bold flex items-center justify-center rounded-full">1</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-slate-900 dark:text-white">Premium Wireless Headphones</p>
                                            <p class="text-slate-500 dark:text-slate-400">Black</p>
                                        </div>
                                    </div>
                                    <p class="font-medium text-slate-900 dark:text-white">$349.00</p>
                                </li>
                                <li class="py-4 flex justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="relative">
                                            <img src="https://picsum.photos/seed/p2/200/200" alt="Product" class="w-16 h-16 rounded-lg object-cover border border-slate-200 dark:border-slate-700">
                                            <span class="absolute -top-2 -right-2 w-5 h-5 bg-slate-500 text-white text-xs font-bold flex items-center justify-center rounded-full">2</span>
                                        </div>
                                        <div>
                                            <p class="font-medium text-slate-900 dark:text-white">Ergonomic Desk Chair</p>
                                            <p class="text-slate-500 dark:text-slate-400">Grey</p>
                                        </div>
                                    </div>
                                    <p class="font-medium text-slate-900 dark:text-white">$399.00</p>
                                </li>
                            </ul>

                            <dl class="space-y-4 text-sm text-slate-600 dark:text-slate-400 mt-6 pt-6 border-t border-slate-200 dark:border-slate-700">
                                <div class="flex items-center justify-between">
                                    <dt>Subtotal</dt>
                                    <dd class="font-medium text-slate-900 dark:text-white">$748.00</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt>Shipping</dt>
                                    <dd class="font-medium text-slate-900 dark:text-white" x-text="shippingMethod === 'standard' ? '$15.00' : '$30.00'"></dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt>Taxes</dt>
                                    <dd class="font-medium text-slate-900 dark:text-white">$59.84</dd>
                                </div>
                                <div class="flex items-center justify-between border-t border-slate-200 dark:border-slate-700 pt-4 text-lg font-bold text-slate-900 dark:text-white">
                                    <dt>Total</dt>
                                    <dd x-text="shippingMethod === 'standard' ? '$822.84' : '$837.84'"></dd>
                                </div>
                            </dl>
                        </x-card>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
