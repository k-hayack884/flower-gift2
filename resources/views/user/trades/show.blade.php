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
                    <a href="{{ route('user.dashboard', ['category' => $productInfo->secondary_category_id]) }}" class="text-blue-600">
                        {{ $productInfo->category->name }}
                    </a>
                </div>
                <div class="flex">
                <h1 class="title-font  text-3xl font-medium text-gray-900 my-2">
                    <p class="hidden lg:inline-block">{{ $productInfo->name }}
                </h1>
                @if (empty($favorite))
                <form method="post" action="{{ route('user.favorites.add') }}">
                    @csrf
                    <button class="pt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </button>
                    <input type="hidden" name="product_id" value="{{ $productInfo->id }}">
                </form>
            @else

                <form method="post" action="{{ route('user.favorites.delete') }}">
                    @csrf
                    <button class="pt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="yellow"
                            viewBox="0 0 24 24" stroke="gold">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </button>
                    <input type="hidden" name="product_id" value="{{ $productInfo->id }}">
                </form>
            @endif
        </div>     
                <p class="mb-8 leading-relaxed w-2/3">{{ $productInfo->comment }}</p>


                <div
                    class="lg:flex-grow flex flex-col md:items-start md:text-left items-center text-left">
                    <ul>
                        <li class="mb-4 leading-relaxed">出品者: <a
                                href="{{ route('user.profiles.show', ['profile' => $userProfile->user->id]) }}"
                                class="text-blue-600">
                                {{ $userProfile->user->name }}
                            </a>
                        </li>
                        <li class="mb-4 leading-relaxed">
                            <div class="flex">ユーザー評価:
                                <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px"
                                    height="512px" viewBox="0 0 512 512" style="width: 24px; height: 24px; opacity: 1;"
                                    xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #4B4B4B;
                                        }

                                    </style>
                                    <g>
                                        <path class="st0" d="M256.016,0C114.625,0,0,114.625,0,256s114.625,256,256.016,256C397.375,512,512,397.375,512,256
                              S397.375,0,256.016,0z M256.016,450.031c-107,0-194.047-87.063-194.047-194.031c0-37.766,11.031-72.953,29.781-102.781h328.5
                              C439,183.047,450,218.234,450,256C450,362.969,362.969,450.031,256.016,450.031z"
                                            style="fill: rgb(255, 170, 243);"></path>
                                        <path class="st0" d="M221.266,261.375c-5.328-11.313-13.172-21.031-22.984-28.031c-9.781-6.984-21.672-11.188-34.344-11.188
                              c-12.656,0-24.547,4.203-34.344,11.188c-9.813,7-17.656,16.719-22.984,28.063l23.656,11.125c3.578-7.594,8.688-13.75,14.5-17.875
                              c5.859-4.156,12.266-6.344,19.172-6.344c6.922,0,13.328,2.188,19.156,6.344c5.813,4.125,10.938,10.281,14.531,17.875
                              L221.266,261.375z" style="fill: rgb(255, 170, 243);"></path>
                                        <path class="st0" d="M405.375,261.375c-5.344-11.313-13.188-21.031-23-28.031c-9.781-6.984-21.656-11.188-34.313-11.188
                              s-24.563,4.203-34.344,11.188c-9.813,7-17.656,16.719-23,28.063l23.656,11.125c3.563-7.594,8.688-13.75,14.5-17.875
                              c5.844-4.156,12.266-6.344,19.188-6.344c6.906,0,13.313,2.188,19.141,6.344c5.828,4.125,10.953,10.281,14.531,17.875
                              L405.375,261.375z" style="fill: rgb(255, 170, 243);"></path>
                                        <path class="st0"
                                            d="M167.781,344.844c17.234,30.844,50.281,51.813,88.203,51.813c37.953,0,71.016-20.969,88.234-51.828
                              l-26.609-14.875c-12.109,21.609-35.109,36.203-61.625,36.203c-26.484,0-49.469-14.594-61.594-36.219L167.781,344.844z"
                                            style="fill: rgb(255, 170, 243);"></path>
                                    </g>
                                </svg>
                                {{ $good }} <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px"
                                    height="512px" viewBox="0 0 512 512" style="width: 24px; height: 24px; opacity: 1;"
                                    xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #4B4B4B;
                                        }

                                    </style>
                                    <g>
                                        <path class="st0" d="M256.016,0C114.625,0,0,114.625,0,256s114.625,256,256.016,256C397.375,512,512,397.375,512,256
                              S397.375,0,256.016,0z M256.016,450.031c-106.984,0-194.047-87.063-194.047-194.031c0-37.766,11.031-72.953,29.797-102.781H420.25
                              C439,183.047,450,218.234,450,256C450,362.969,362.969,450.031,256.016,450.031z"
                                            style="fill: rgb(184, 221, 24);"></path>
                                        <path class="st0" d="M164.094,214.547c-19,0-34.406,15.422-34.406,34.406c0,19.047,15.406,34.453,34.406,34.453
                              c19.031,0,34.438-15.406,34.438-34.453C198.531,229.969,183.125,214.547,164.094,214.547z"
                                            style="fill: rgb(184, 221, 24);"></path>
                                        <path class="st0" d="M350.313,214.547c-19.031,0-34.469,15.422-34.469,34.406c0,19.047,15.438,34.453,34.469,34.453
                              c19,0,34.406-15.406,34.406-34.453C384.719,229.969,369.313,214.547,350.313,214.547z"
                                            style="fill: rgb(184, 221, 24);"></path>
                                        <rect x="188.875" y="342.594" class="st0" width="139.875"
                                            height="32.313" style="fill: rgb(184, 221, 24);"></rect>
                                    </g>
                                </svg> {{ $normal }} <svg version="1.1" id="_x32_"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" width="512px" height="512px" viewBox="0 0 512 512"
                                    style="width: 24px; height: 24px; opacity: 1;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #4B4B4B;
                                        }

                                    </style>
                                    <g>
                                        <rect x="186.063" y="342.594" class="st0" width="139.875"
                                            height="32.313" style="fill: rgb(162, 142, 247);"></rect>
                                        <path class="st0" d="M256.016,0C114.625,0,0,114.625,0,256s114.625,256,256.016,256C397.375,512,512,397.375,512,256
                                S397.375,0,256.016,0z M256.016,450.031c-107,0-194.047-87.063-194.047-194.031c0-37.766,11.031-72.953,29.781-102.781h328.5
                                C439,183.047,450,218.234,450,256C450,362.969,362.969,450.031,256.016,450.031z"
                                            style="fill: rgb(162, 142, 247);"></path>
                                        <path class="st0" d="M290.719,240.813c5.344,11.313,13.188,21.031,23,28.031c9.781,7,21.656,11.203,34.313,11.188
                                c12.688,0.016,24.563-4.188,34.344-11.188c9.813-7,17.672-16.719,23-28.031l-23.656-11.141c-3.563,7.609-8.688,13.734-14.5,17.875
                                c-5.844,4.141-12.25,6.328-19.188,6.344c-6.906-0.016-13.313-2.203-19.156-6.344c-5.813-4.141-10.922-10.297-14.5-17.891
                                L290.719,240.813z" style="fill: rgb(162, 142, 247);"></path>
                                        <path class="st0" d="M106.625,240.813c5.344,11.313,13.172,21.031,22.984,28.031c9.781,7,21.672,11.203,34.328,11.188
                                c12.656,0.016,24.547-4.188,34.328-11.188c9.828-7,17.672-16.719,23.016-28.031l-23.656-11.141
                                c-3.578,7.578-8.703,13.734-14.5,17.875c-5.859,4.141-12.281,6.328-19.188,6.344c-6.906-0.016-13.313-2.203-19.156-6.344
                                c-5.813-4.141-10.938-10.297-14.531-17.891L106.625,240.813z"
                                            style="fill: rgb(162, 142, 247);"></path>
                                    </g>
                                </svg> {{ $bad }}
                            </div>
                        </li>
                        <li class="mb-4 leading-relaxed">出品日: {{ $productInfo->created_at }}</li>
                        <li class="mb-4 leading-relaxed">
                            現在の状態:@if ($productInfo->status == \Constant::PRODUCT_LIST['sell'])取引可能@elseif($productInfo->status == \Constant::PRODUCT_LIST['transaction'])取引中@elseif($productInfo->status == \Constant::PRODUCT_LIST['sold'])取引終了@endif
                        </li>

                        <li class="mb-4 leading-relaxed">希望取引形態:
                            @if ($productInfo->trade_type == \Constant::TRADE_LIST['direct'])直接取引@elseif($productInfo->trade_type == \Constant::TRADE_LIST['payment'])配送(着払い)@elseif($productInfo->trade_type == \Constant::TRADE_LIST['prepayment'])配送(元払い)@endif
                        </li>

                        @if ($productInfo->trade_type == \Constant::TRADE_LIST['direct'])
                            取引希望場所 {{ $productInfo->address }}
                            <div id="my_map" style="width: 300px; height: 300px; margin-bottom:20px;">
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuaFvbBqEM2aU64_xQ_M-6mxYFxM-fjN4&callback=initMapWithAddress"
                                                                async defer></script>
                            </div>
                        @endif

                            <div class="flex flex-col md:flex-row">   
                                @if($productInfo->user_id!==auth()->user()->id)                        
                                <button type="button"
                                    onclick="location.href='{{ route('user.emails.create', ['mail' => $productInfo->id]) }}'"
                                    class="mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4 text-center mb-4">取引希望</button>
                                    @endif
                                    <button type="button" onclick="location.href='{{ route('user.dashboard') }}'"
                                    class=" mx-auto  text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4 text-center mb-4">戻る</button>
                                  
                                    <a href="{{ route('user.bads.product', ['bad' => $userProfile->id]) }}" class="text-center">違反報告</a>
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
