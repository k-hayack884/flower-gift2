<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お気に入り一覧
        </h2>
    </x-slot>
    <x-flash-message status="session('status')"></x-flash-message>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <span id="api">
                            <div class="flex flex-wrap">
                                
                                @foreach ($favoriteItem as $item)
                                
                                @if($item->product->status===0)
                                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                    <div class="relative">
                                        <x-product-image :filename="$item->product->img" />
                                            <div class=" absolute top-0 right-0">
                                                <favorite-component :canFavorite="false" :productId="{{ $item->product_id }}"/></favorite-component>
                                            </div>   
                                    </div>
                                    <div class="mt-4">
                                            <p class="text-gray-900 title-font font-medium mb-10">
                                               この商品は運営によって非公開にされています</p>
                                            
                                            <p class="text-gray-900">{{ $item->created_at->toDateString() }}に追加</p>
                                    </div>


                                </div>
                                @else
                                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                        <div class="relative">
                                            <a href="{{ route('user.trades.show', ['trade' => $item->product->id]) }}"
                                                class="block relative rounded overflow-hidden">
                                                <x-product-image :filename="$item->product->img" />
                                            </a>
                                            <div class=" absolute top-0 right-0">
                                                <favorite-component :canFavorite="false" :productId="{{ $item->product_id }}"/></favorite-component>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                                <h2 class="text-gray-900 title-font text-lg font-medium mb-4">
                                                    {{ $item->product->name }}</h2>
                                                <p class="mb-4 leading-relaxed">
                                                    現在の状態:@if ($item->product->status == \Constant::PRODUCT_LIST['sell'])取引可能@elseif($item->product->status == \Constant::PRODUCT_LIST['transaction'])取引中@elseif($item->product->status == \Constant::PRODUCT_LIST['sold'])取引終了@endif
                                                </p>
                                                <p class="text-gray-900">{{ $item->created_at->toDateString() }}に追加</p>
                                        </div>
                                    </div>
                                    @endif
                                
                                @endforeach
                            
                            </div>
                        </span>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</x-app-layout>
