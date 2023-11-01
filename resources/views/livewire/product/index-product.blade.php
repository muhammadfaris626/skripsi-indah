<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            @if(count($products) == 0)

            @else
                <section class="text-gray-600 body-font">
                    <div class="grid grid-cols-3 gap-3">
                        <div class="col-span-2">
                            <h1 class="text-4xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">Products</h1>
                        </div>
                        <div>
                            {{-- <input type="text" wire:model="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Search Product"> --}}
                        </div>
                    </div>
                    <div class="container mx-auto mt-10">
                        <div class="flex flex-wrap -m-4">
                            @foreach ($products as $v)
                                <a href="{{ route('detail-product', $v->id) }}">
                                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                        <p class="block relative rounded overflow-hidden">
                                            <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ asset($v->product_image[0]) }}">
                                        </p>
                                        <div class="mt-4">
                                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ Str::upper($v->brand->name) }}</h3>
                                            <h2 class="text-gray-900 title-font text-lg font-medium">{{ Str::upper($v->name) }}</h2>
                                        </div>
                                    </div>
                                </a>
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
