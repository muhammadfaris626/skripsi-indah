<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
            <section class="text-gray-600 body-font overflow-hidden">
                <div class="container px-5 pb-10 mx-auto">
                    @if (session('message'))
                        <div class="flex justify-center mt-5">
                            <div>
                                <div class="flex items-center bg-red-500 rounded-lg text-white text-sm font-bold px-4 py-3" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="height: 25px" viewBox="0 0 24 24" id="Close"><path d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z" fill="#ffffff" class="color000000 svgShape"></path></svg>
                                    <p class="ml-1 font-bold">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="lg:w-4/5 mx-auto flex flex-wrap mt-5">
                        <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset("storage/".$product->product_image[0]) }}">
                        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                            <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ Str::upper($product->brand->name) }}</h2>
                            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ Str::upper($product->name) }}</h1>
                            <div class="flex border-b-2 border-gray-100 pb-4">
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
                                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                    </svg>
                                    <span class="text-gray-600 ml-3">5 Reviews</span>
                                </span>
                            </div>

                            {{-- <p class="leading-relaxed">
                                {{ $product->description }}
                            </p> --}}
                            <div class="flex py-2">
                                <span class="text-gray-500">Select RAM :</span>
                            </div>
                            <div class="flex border-t border-gray-200 py-2">
                                <div class="grid grid-cols-4 gap-2">
                                    @foreach ($specs as $spec)
                                        <div>
                                            <button wire:click="clickRam({{ $spec->id }})" style="@if($listRam[$spec->id]) background-color:#6466f1;color:white; @endif" class="text-center px-2 py-2 inline-block align-middle w-full h-full rounded text-black bg-white border-2 border-indigo-500 hover:bg-indigo-600 hover:text-white">{{ $spec->ram }}/{{ $spec->internal_memory }}</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex py-2 border-t">
                                <span class="text-gray-500">Select Color :</span>
                            </div>
                            <div class="flex border-t @if(!empty($listColor) && in_array(true, $listRam)) border-b mb-2 @endif border-gray-200 py-2">
                                <div class="grid grid-cols-4 gap-2">
                                    @if (in_array(true, $listRam))
                                        @if (empty($listColor))
                                        @else
                                            @foreach ($this->showColor() as $color)
                                                <div>
                                                    <button @if($color->qty == 0) disabled @endif wire:click="clickColor({{ $color->id }})" style="@if($listColor[$color->id]) background-color:#6466f1;color:white; @endif" class="@if($color->qty == 0) cursor-not-allowed @endif text-center px-2 py-2 inline-block align-middle text-black bg-white border-2 border-indigo-500 w-full h-full rounded hover:bg-indigo-600 hover:text-white">{{ Str::upper($color->color) }} : {{ $color->qty }}</button>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="flex">
                                <span class="title-font font-bold text-3xl text-gray-900">@currency($this->nominal())</span>
                                {{-- <button wire:click="buyNow(@if(empty($listColor)) 0 @else {{ array_search(true, $this->listColor) }} @endif)" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Buy</button> --}}
                                <button wire:click="buyNow" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="text-gray-600 body-font">
                <div class="container mx-auto">
                    <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">CHIPSET</span>
                                <span class="title-font font-bold text-right">
                                    @if ($this->specification()['status'] == false)
                                        -
                                    @else
                                        {{ $this->specification()['data']->productSpecItem->chipset }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">RAM</span>
                                <span class="title-font font-bold text-right">
                                    @if ($this->specification()['status'] == false)
                                        -
                                    @else
                                        {{ $this->specification()['data']->productSpecItem->ram }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">INTERNAL MEMORY</span>
                                <span class="title-font font-bold text-right">
                                    @if ($this->specification()['status'] == false)
                                        -
                                    @else
                                        {{ $this->specification()['data']->productSpecItem->internal_memory }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">EXTERNAL MEMORY</span>
                                <span class="title-font font-bold text-right">
                                    @if ($this->specification()['status'] == false)
                                        -
                                    @else
                                        {{ $this->specification()['data']->productSpecItem->external_memory }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">CPU</span>
                                <span class="title-font font-bold text-right">
                                    @if ($this->specification()['status'] == false)
                                        -
                                    @else
                                        {{ $this->specification()['data']->productSpecItem->cpu }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">GPU</span>
                                <span class="title-font font-bold text-right">
                                    @if ($this->specification()['status'] == false)
                                        -
                                    @else
                                        {{ $this->specification()['data']->productSpecItem->gpu }}
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
