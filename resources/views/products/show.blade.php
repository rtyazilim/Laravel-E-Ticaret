<x-layouts.app>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Breadcrumb -->
        <nav class="flex text-sm text-slate-500 dark:text-slate-400 mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ url('/') }}" class="hover:text-slate-900 dark:hover:text-white transition-colors">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        <a href="{{ url('/products') }}" class="ml-1 md:ml-2 hover:text-slate-900 dark:hover:text-white transition-colors">Products</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        <span class="ml-1 md:ml-2 text-slate-700 dark:text-slate-300 font-medium truncate max-w-[200px] sm:max-w-none">Premium Wireless Headphones</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Product Container -->
        <div class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
            <!-- Image Gallery (Alpine.js) -->
            <div class="flex flex-col-reverse" x-data="{ activeImage: 0, images: ['https://picsum.photos/seed/p1/800/800', 'https://picsum.photos/seed/p2/800/800', 'https://picsum.photos/seed/p3/800/800', 'https://picsum.photos/seed/p4/800/800'] }">
                <!-- Image selector -->
                <div class="mt-6 w-full max-w-2xl mx-auto sm:block lg:max-w-none">
                    <div class="grid grid-cols-4 gap-4">
                        <template x-for="(image, index) in images" :key="index">
                            <button @click="activeImage = index" 
                                    class="relative h-24 bg-white rounded-xl flex items-center justify-center text-sm font-medium uppercase text-slate-900 cursor-pointer hover:bg-slate-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4 overflow-hidden border-2 transition-colors"
                                    :class="activeImage === index ? 'border-brand-600 ring-brand-500' : 'border-transparent dark:border-slate-700'">
                                <span class="sr-only" x-text="'Image ' + (index + 1)"></span>
                                <span class="absolute inset-0">
                                    <img :src="image" alt="" class="w-full h-full object-cover object-center">
                                </span>
                                <span class="absolute inset-0 ring-2 ring-transparent ring-offset-2 rounded-xl pointer-events-none" aria-hidden="true" :class="activeImage === index ? 'ring-brand-500' : ''"></span>
                            </button>
                        </template>
                    </div>
                </div>

                <div class="w-full aspect-square rounded-2xl overflow-hidden bg-slate-100 dark:bg-slate-800 shadow-sm border border-slate-200 dark:border-slate-700 relative group">
                    <img :src="images[activeImage]" alt="Product view" class="w-full h-full object-cover object-center transform transition-transform duration-500 group-hover:scale-105">
                </div>
            </div>

            <!-- Product info -->
            <div class="mt-10 px-4 sm:px-0 lg:mt-0">
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white sm:text-4xl">Premium Wireless Headphones</h1>
                    <button class="text-slate-400 hover:text-red-500 transition-colors">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    </button>
                </div>

                <!-- Reviews -->
                <div class="mt-3">
                    <h3 class="sr-only">Reviews</h3>
                    <div class="flex items-center">
                        <div class="flex items-center">
                            @foreach(range(1,5) as $star)
                            <svg class="{{ $star <= 4 ? 'text-yellow-400' : 'text-slate-300 dark:text-slate-600' }} h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            @endforeach
                        </div>
                        <p class="ml-2 text-sm text-brand-600 dark:text-brand-400">117 reviews</p>
                    </div>
                </div>

                <div class="mt-6 flex items-end space-x-4">
                    <p class="text-4xl font-extrabold text-slate-900 dark:text-white">$349.00</p>
                    <p class="text-xl font-medium text-slate-400 line-through mb-1">$449.00</p>
                    <x-badge variant="danger" class="mb-2">-22%</x-badge>
                </div>

                <div class="mt-6 text-base text-slate-700 dark:text-slate-300 space-y-6">
                    <p>Experience pure, uninterrupted sound with our industry-leading active noise cancellation technology. Designed for all-day comfort, these headphones deliver premium audio quality and up to 30 hours of battery life on a single charge.</p>
                </div>

                <form class="mt-8" x-data="{ quantity: 1 }">
                    <!-- Color picker -->
                    <div class="mt-8">
                        <h3 class="text-sm font-medium text-slate-900 dark:text-white">Color</h3>
                        <fieldset class="mt-2">
                            <legend class="sr-only">Choose a color</legend>
                            <div class="flex items-center space-x-3">
                                <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-slate-900 dark:ring-white">
                                    <input type="radio" name="color-choice" value="Black" class="sr-only" aria-labelledby="color-choice-0-label">
                                    <span id="color-choice-0-label" class="sr-only">Black</span>
                                    <span aria-hidden="true" class="h-8 w-8 rounded-full border border-black border-opacity-10 bg-slate-900"></span>
                                </label>
                                <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-slate-900 dark:ring-white ring-2">
                                    <input type="radio" name="color-choice" value="Silver" class="sr-only" aria-labelledby="color-choice-1-label">
                                    <span id="color-choice-1-label" class="sr-only">Silver</span>
                                    <span aria-hidden="true" class="h-8 w-8 rounded-full border border-black border-opacity-10 bg-slate-300"></span>
                                </label>
                                <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 focus:outline-none ring-slate-900 dark:ring-white">
                                    <input type="radio" name="color-choice" value="Blue" class="sr-only" aria-labelledby="color-choice-2-label">
                                    <span id="color-choice-2-label" class="sr-only">Blue</span>
                                    <span aria-hidden="true" class="h-8 w-8 rounded-full border border-black border-opacity-10 bg-brand-700"></span>
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <div class="mt-10 flex flex-col sm:flex-row gap-4">
                        <div class="flex items-center border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800">
                            <button type="button" @click="if(quantity > 1) quantity--" class="p-3 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                            </button>
                            <input type="number" name="quantity" x-model="quantity" class="w-16 text-center border-0 bg-transparent text-slate-900 dark:text-white font-semibold focus:ring-0 p-0" min="1">
                            <button type="button" @click="quantity++" class="p-3 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </button>
                        </div>
                        
                        <x-button type="button" variant="primary" class="flex-1 py-4 text-lg" @click="$dispatch('notify', {message: quantity + ' items added to cart!', type: 'success'})">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Add to Cart
                        </x-button>
                    </div>
                </form>

                <div class="mt-8 border-t border-slate-200 dark:border-slate-700 pt-8">
                    <div class="flex items-center space-x-4 text-sm text-slate-600 dark:text-slate-400">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            In stock and ready to ship
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-brand-600 dark:text-brand-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            Secure checkout
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        <div class="mt-24 border-t border-slate-200 dark:border-slate-800 pt-16">
            <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white mb-8">Customers also bought</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([1,2,3,4] as $i)
                <div class="group relative flex flex-col bg-white dark:bg-slate-800 rounded-2xl border border-slate-100 dark:border-slate-700 overflow-hidden shadow-sm hover:shadow-lift transition-all duration-300">
                    <div class="relative aspect-square bg-slate-100 dark:bg-slate-900 overflow-hidden">
                        <img src="https://picsum.photos/seed/rel{{$i}}/400/400" alt="Related" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-4 flex flex-col flex-1">
                        <h3 class="text-sm font-bold text-slate-900 dark:text-white">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Accessory Item {{ $i }}
                            </a>
                        </h3>
                        <div class="mt-auto pt-2 flex items-center justify-between z-10 relative">
                            <span class="text-sm font-extrabold text-slate-900 dark:text-white">${{ number_format(49.99 * $i, 2) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
