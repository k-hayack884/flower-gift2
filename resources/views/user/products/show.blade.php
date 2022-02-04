<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品確認
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <x-product-image :filename="$productInfo->img" />
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:pl-12 md:pl-16 flex flex-col md:items-start md:text-left items-center">
                <div class="lg:flex-grow flex  md:items-start md:text-left mb-4">
                    {{ $categoryName->primary_name }}>><a
                        href="{{ route('user.dashboard', ['category' => $productInfo->secondary_category_id]) }}"
                        class="text-blue-600">
                        {{ $productInfo->category->name }}
                    </a>
                </div>
                <h1 class="title-font  text-3xl mb-4 font-medium text-gray-900">
                    <br class="hidden lg:inline-block">{{ $productInfo->name }}
                </h1>
                <p class="mb-8 leading-relaxed lg:w-2/3">{{ $productInfo->comment }}</p>
                <div
                    class="lg:flex-grow flex flex-col md:items-start md:text-left items-center">
                    <ul>
                        <li class="mb-8 leading-relaxed">出品日: {{ $productInfo->created_at->toDateString() }}</li>
                        <li class="mb-8 leading-relaxed">
                            現在の状態:@if ($productInfo->status == \Constant::PRODUCT_LIST['sell'])取引可能@elseif($productInfo->status == \Constant::PRODUCT_LIST['transaction'])取引中@elseif($productInfo->status == \Constant::PRODUCT_LIST['sold'])取引終了@endif
                        </li>
                        <li class="mb-8 leading-relaxed">希望取引形態:
                            @if ($productInfo->trade_type == \Constant::TRADE_LIST['direct'])直接取引@elseif($productInfo->trade_type == \Constant::TRADE_LIST['payment'])配送(着払い)@elseif($productInfo->trade_type == \Constant::TRADE_LIST['prepayment'])配送(元払い)@endif
                        </li>
                        @if ($productInfo->trade_type == \Constant::TRADE_LIST['direct'])
                            取引希望場所 {{ $productInfo->address }}
                            <div id="my_map" style="width: 300px; height: 300px">
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaFvbBqEM2aU64_xQ_M-6mxYFxM-fjN4&callback=initMapWithAddress"
                                                                async defer></script>
                            </div>
                        @endif
                        <ul>
                            <div class="flex flex-col md:flex-row">

                                <button type="button"
                                    onclick="location.href='{{ route('user.products.edit', ['product' => $productInfo->id]) }}'"
                                    class=" mx-auto w-full text-white bg-indigo-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg md:mx-4 mb-4">編集</button>
                                <button type="button" onclick="location.href='{{ route('user.dashboard') }}'"
                                    class="mx-auto w-full text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg md:mx-4 mb-4">戻る</button>
                            </div>
                </div>
            </div>
        </div>
        <div class="mx-auto bg-white md:w-2/3">
            <h1 class="text-4xl md:pt-8 md:pl-8">コメント</h1>
            @foreach ($comments as $comment)
                <ul class="mb-4">
                    <div class="grid grid-cols-4 w-full md:p-8">
                        @if ($comment->status == 0)
                            <li class="w-24">
                                <x-product-image :filename="$comment->user->img" />
                            </li>
                            <li class="col-span-3 ml-4">
                                このコメントは非公開にされています
                            </li>

                        @else
                            <li class="w-24">
                                <x-product-image :filename="$comment->user->img" />
                                {{ $comment->user->name }}
                            </li>
                            <li class="col-span-3 ml-4">{{ $comment->comment }}

                            </li>

                            <li>
                                @if ($comment->user_id === auth()->user()->id)
                                    <form id="delete_{{ $comment->id }}" method="post"
                                        action="{{ route('user.trades.show.delete', ['trade' => $comment->id]) }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $productInfo->id }}">
                                        <a href="#" data-id="{{ $comment->id }}" onclick="deletePost(this)"
                                            class="mx-auto text-center text-white bg-red-500 border-0 px- focus:outline-none hover:bg-red-600 rounded text-lg mx-4">
                                            削除</a>
                            </li>
                            <li class=""></li>
                            <li>
                                <a href="{{ route('user.bads.comment', ['bad' => $comment->id]) }}">
                                    <p class="text-right">違反報告</p>
                                </a>
                            </li>
                            <li>
                                <p class="text-right">{{ $comment->created_at->toDateString() }}</p>
                            </li>
                            </form>
                        @endif
            @endif
        </div>
        </ul>
        @endforeach
        <div class="lg:w-1/2 mx-auto">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form action="{{ route('user.trades.show.add') }}" method="post">
                @csrf
                <label for="comment" class="leading-7 text-sm text-gray-600">コメントを書く</label>
                <input type="hidden" name="product_id" value="{{ $productInfo->id }}">
                <textarea type="text" id="comment" name="comment"
                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    value=" {{ old('comment') }}" required> </textarea>
                    <div class="flex justify-center md:justify-end">
                <button type="submit"
                    class=" text-white bg-indigo-500 border-0 py-2 px-12 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-4">コメントを書く</button>
                </div>
                </form>
        </div>
    </section>
    <script src="{{ asset('/js/result.js') }}"></script>
    <script>
        'use strict';

        function deletePost(e) {
            if (confirm('コメントを削除してもよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
        var _my_address = '{{ $productInfo->address }}';

        function initMapWithAddress() {
            var opts = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            };
            var my_google_map = new google.maps.Map(document.getElementById('my_map'), opts);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                    'address': _my_address,
                    'region': 'jp'
                },
                function(result, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var latlng = result[0].geometry.location;
                        my_google_map.setCenter(latlng);
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: my_google_map,
                            title: latlng.toString(),
                            draggable: true
                        });
                        google.maps.event.addListener(marker, 'dragend', function(event) {
                            marker.setTitle(event.latLng.toString());
                        });
                    }
                }
            );
        }
    </script>
</x-app-layout>
