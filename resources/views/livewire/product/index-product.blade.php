<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
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
                    <div>
                        {{ $products->links() }}
                    </div>
                </section>
            @endif

        </div>
    </div>
</div>
