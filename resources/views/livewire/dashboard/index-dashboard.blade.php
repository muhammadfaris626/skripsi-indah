<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            @if(empty($newProduct))

            @else
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-5 pb-10 mx-auto">
                        <div class="lg:w-4/5 mx-auto flex flex-wrap">
                            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset("storage/".$newProduct->product_image[0]) }}">
                            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                            <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ Str::upper($newProduct->brand->name) }}</h2>
                            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ Str::upper($newProduct->name) }}</h1>
                            <div class="flex mb-4">
                                <span class="flex items-center">
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                                <span class="text-gray-600 ml-3">4 Reviews</span>
                                </span>
                                <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                                    </svg>
                                </a>
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                                    </svg>
                                </a>
                                <a class="text-gray-500">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                                    </svg>
                                </a>
                                </span>
                            </div>
                            <p class="leading-relaxed text-justify">{{ $newProduct->description }}</p>

                            <div class="flex">

                                <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Choose</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </section>
            @endif
            @if(count($products) == 0)
            @else
                <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
                            @foreach ($products as $v)
                                <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
                                    <div class="rounded-lg h-64 overflow-hidden">
                                        <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset("storage/".$v->product_image[0]) }}">
                                    </div>
                                    <div class="mt-4">
                                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ Str::upper($v->brand->name) }}</h3>
                                        <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{ Str::upper($v->name) }}</h2>
                                    </div>
                                    <a class="text-indigo-500 inline-flex items-center mt-3" href="{{ route('detail-product', $v->id) }}">LIHAT
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </div>
</div>
