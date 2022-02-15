<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品情報
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full lg:w-1/2 w-5/6 mb-10 md:mb-0">
                <x-product-image :filename="$productInfo->img" />
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:pl-12 md:pl-16 flex flex-col md:items-start md:text-left items-center">
                <div class="lg:flex-grow flex  md:items-start md:text-left">
                    {{ $categoryName->primary_name }}>>
                    <a href="{{ route('user.dashboard', ['category' => $productInfo->secondary_category_id]) }}"
                        class="text-blue-600">
                        {{ $productInfo->category->name }}
                    </a>
                </div>
                <div class="flex">
                    <h1 class="title-font  text-3xl font-medium text-gray-900 my-2">
                        <p>{{ $productInfo->name }}</p>
                    </h1>
                    <span id="api">
                        @if (empty($favorite))
                            <favorite-component :canFavorite="true" :productId="{{ $productInfo->id }}" />
                            </favorite-component>
                        @else
                            <favorite-component :canFavorite="false" :productId="{{ $productInfo->id }}" />
                            </favorite-component>
                        @endif
                    </span>
                </div>
                <p class="mb-8 leading-relaxed w-2/3">{{ $productInfo->comment }}</p>
                <div class="lg:flex-grow flex flex-col md:items-start md:text-left items-center text-left">
                    <ul>
                        <li class="mb-4 leading-relaxed">出品者: <a
                                href="{{ route('user.profiles.show', ['profile' => $userProfile->user->id]) }}"
                                class="text-blue-600">
                                {{ $userProfile->user->name }}
                            </a>
                        </li>
                        <li class="mb-4 leading-relaxed">
                            <div class="flex">
                                <div id="app">
                                    <review-component v-bind:good='{{ $good }}'
                                        v-bind:normal='{{ $normal }}' v-bind:bad='{{ $bad }}'
                                        v-bind:userId="{{ $userProfile->user->id }}">
                                    </review-component>
                                </div>
                            </div>

                        </li>
                        <li class="mb-4 leading-relaxed">出品日: {{ $productInfo->created_at }}</li>
                        <li class="mb-4 leading-relaxed">
                            現在の状態:@if ($productInfo->status == \Constant::PRODUCT_LIST['sell'])
                        取引可能@elseif($productInfo->status == \Constant::PRODUCT_LIST['transaction'])取引中@elseif($productInfo->status == \Constant::PRODUCT_LIST['sold'])取引終了
                        @endif
                    </li>
                    <li class="mb-4 leading-relaxed">希望取引形態:
                        @if ($productInfo->trade_type == \Constant::TRADE_LIST['direct'])
                            直接取引
                        @elseif($productInfo->trade_type == \Constant::TRADE_LIST['payment'])配送(着払い)
                        @elseif($productInfo->trade_type == \Constant::TRADE_LIST['prepayment'])配送(元払い)
                        @endif
                    </li>
                    @if ($productInfo->trade_type == \Constant::TRADE_LIST['direct'])
                        取引希望場所 {{ $productInfo->address }}
                        <div id="my_map" style="width: 300px; height: 300px; margin-bottom:20px;">
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaFvbBqEM2aU64_xQ_M-6mxYFxM-fjN4&callback=initMapWithAddress"
                                                        async defer></script>
                        </div>
                    @endif
                    <div class="flex flex-col md:flex-row">
                        @if ($productInfo->user_id !== auth()->user()->id)
                            <button type="button"
                                onclick="location.href='{{ route('user.emails.create', ['mail' => $productInfo->id]) }}'"
                                class="mx-auto  text-white bg-indigo-500 border-0 py-2 px-12 lg:px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4 text-center mb-4">取引希望</button>
                        @endif
                        <button type="button" onclick="location.href='{{ route('user.dashboard') }}'"
                            class=" mx-auto  text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4 text-center mb-4">戻る</button>
                        <a href="{{ route('user.bads.product', ['bad' => $userProfile->id]) }}"
                            class="text-center pt-2">違反報告</a>
                    </div>
                </div>  
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
                            <x-user-icon :filename="$comment->user->img" />
                        </li>
                        <li class="col-span-3 ml-4">
                            このコメントは非公開にされています
                        </li>
                    @else
                        <li class="w-24">
                            <x-user-icon :filename="$comment->user->img" />
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
                            @endif
                        </li>
                        <li class=""></li>
                        <li>
                            <a href="{{ route('user.bads.comment', ['bad' => $comment->id]) }}">
                                <p class="text-right">違反報告</p>
                            </a>
                        </li>
                        <li>
                            <p class="text-right text-sm">{{ $comment->created_at->toDateString() }}</p>
                        </li>
                        </form>
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
    </div>
</section>
<script src="{{ mix('/js/app.js') }}"></script>
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
