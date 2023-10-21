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
                        <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ asset($product->productSpecColorItem->productSpecItem->product->product_image[0]) }}">
                        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                            <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ Str::upper($product->productSpecColorItem->productSpecItem->product->brand->name) }}</h2>
                            <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ Str::upper($product->productSpecColorItem->productSpecItem->product->name) }}</h1>
                            @if ($this->checkStatus($product->id) == 0)
                                <div class="border-t pt-3">
                                    <p class="">
                                        Address
                                    </p>
                                    <div class="flex border-gray-100 pb-4">
                                        @if ($customer->address == null || $disableAddress == true)
                                            <input type="text" wire:model="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        @else
                                            <input readonly type="text" value="{{ $customer->address }}" class="@if($disableAddress == false) cursor-not-allowed bg-gray-200 @else bg-gray-50 @endif  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        @endif
                                    </div>
                                    <div class="flex">
                                        @if ($customer->address == null || $disableAddress == true)
                                            <button wire:click="saveAddress" class="flex ml-auto text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">Save address</button>
                                        @else
                                            <button wire:click="editAddress" class="flex ml-auto text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded">Edit address</button>
                                        @endif
                                    </div>
                                    <p class="border-t pt-3 mt-6">
                                        Proof of Payment
                                    </p>
                                    <form wire:submit="uploadPayment({{ $product->id }})">
                                        <div class="flex border-gray-100">
                                            <input wire:model="proof_of_payment" class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none" type="file"/>
                                        </div>
                                        <div class="flex">
                                            @error('proof_of_payment') <span class="text-red-400">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="flex mt-5">
                                            <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Upload Payment</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                            @if ($this->checkStatus($product->id) == 1)
                                <div class="border-t pt-3">
                                    <div class="flex justify-center">
                                        <div>
                                            <div class="flex items-center bg-green-500 rounded-lg text-white text-sm font-bold px-4 py-3" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="height: 25px" viewBox="0 0 24 24" id="check"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm3.88-11.71L10 14.17l-1.88-1.88c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41l2.59 2.59c.39.39 1.02.39 1.41 0L17.3 9.7c.39-.39.39-1.02 0-1.41-.39-.39-1.03-.39-1.42 0z" fill="#ffffff" class="color000000 svgShape"></path></svg>
                                                <p class="ml-1 font-bold">Thank you for making payment, we will immediately process your order.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                                    {{ $product->productSpecColorItem->productSpecItem->chipset }}
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">RAM</span>
                                <span class="title-font font-bold text-right">
                                    {{ $product->productSpecColorItem->productSpecItem->ram }}
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">INTERNAL MEMORY</span>
                                <span class="title-font font-bold text-right">
                                    {{ $product->productSpecColorItem->productSpecItem->internal_memory }}
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">EXTERNAL MEMORY</span>
                                <span class="title-font font-bold text-right">
                                    {{ $product->productSpecColorItem->productSpecItem->external_memory }}
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">CPU</span>
                                <span class="title-font font-bold text-right">
                                    {{ $product->productSpecColorItem->productSpecItem->cpu }}
                                </span>
                            </div>
                        </div>
                        <div class="p-2 sm:w-1/2 w-full">
                            <div class="bg-indigo-300 rounded p-4">
                                <span class="text-white font-bold w-6 h-6 mr-4">GPU</span>
                                <span class="title-font font-bold text-right">
                                    {{ $product->productSpecColorItem->productSpecItem->gpu }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
