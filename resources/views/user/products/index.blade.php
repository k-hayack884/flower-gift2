<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>
    <x-flash-message status="session('status')"></x-flash-message>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="flex justify-center md:justify-start">
                        <button onclick="location.href='{{ route('user.products.create') }}'"
                            class="bg-indigo-500 border-0 w-full md:w-1/4 sm:px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg py-4 text-white">商品登録する</button>
                        </div>
                            <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-wrap m-4">
                                


                                @foreach ($productInfo as $info)

                                    @foreach ($info->product as $product)
                                    @if($product->status===0)
                                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                    <div class="relative">
                                        <x-product-image :filename="$product->img" />
                                            <div class=" absolute top-0 right-0">
                                                
                                            </div>   
                                    </div>
                                    <div class="mt-4">
                                            <p class="text-gray-900 title-font font-medium mb-4">
                                               この商品は運営によって非公開にされています</p>
                                            <p class="text-gray-900">{{ $product->created_at->toDateString() }}に追加</p>
                                    </div>


                                </div>
                                @else

                                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                            <a href="{{ route('user.products.show', ['product' => $product->id]) }}"
                                                class="block relative rounded overflow-hidden">
                                                <x-product-image :filename="$product->img" />
                                            </a>
                                            <div class="mt-4">
                                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                                    {{ $product->category->name }}</h3>
                                                <h2 class="text-gray-900 title-font text-lg font-medium mb-4">
                                                    {{ $product->name }}</h2>
                                            </div>
                                            <p class="text-gray-900">{{ $product->created_at->toDateString() }}に追加</p>
                                        </div>
                                        @endif
                                    @endforeach
                                @endforeach
                               
                            </div>
                        </div>
                        
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
