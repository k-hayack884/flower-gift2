<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <x-product-image :filename="$productInfo->img" />
            </div>
            <div
                class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                            <div
                class="lg:flex-grow flex  md:items-start md:text-left">
                {{$categoryName->primary_name}}>><a href="{{ route('user.dashboard',['category'=>$productInfo->secondary_category_id]) }}" class="text-blue-600" >
                    {{$productInfo->category->name}}
                    </a>
                    </div>
                <h1 class="title-font  text-3xl mb-4 font-medium text-gray-900">
                    <br class="hidden lg:inline-block">{{$productInfo->name}}
                </h1>
                @if (empty($favorite))
                <form method="post" action="{{route('user.favorites.add')}}">
                    @csrf
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </button>
                    <input type="hidden" name="product_id" value="{{$productInfo->id}}">
                </form>
                @else

                <form method="post" action="{{route('user.favorites.delete')}}">
                    @csrf
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="yellow" viewBox="0 0 24 24"
                            stroke="gold">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </button>
                    <input type="hidden" name="product_id" value="{{$productInfo->id}}">
                </form>
                @endif

                <p class="mb-8 leading-relaxed">{{$productInfo->comment}}</p>


                <div
                    class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <ul>
                        <li class="mb-4 leading-relaxed">出品者: <a href="{{ route('user.profiles.show',['profile'=>$userProfile->user->id]) }}" class="text-blue-600" >
                    {{ $userProfile->user->name }}
                    </a>
                       </li>　
                        ここにレビュー
                        <li class="mb-8 leading-relaxed">出品日: {{ $productInfo->created_at }}</li>
                        <li class="mb-8 leading-relaxed">
                            現在の状態:@if($productInfo->status==\Constant::PRODUCT_LIST['sell'])取引可能@elseif($productInfo->status==\Constant::PRODUCT_LIST['transaction'])取引中@elseif($productInfo->status==\Constant::PRODUCT_LIST['sold'])取引終了@endif
                        </li>

                        <li class="mb-8 leading-relaxed">希望取引形態:</li>

                        取引希望場所

                        <ul>
                            <div class="flex justify-center">

                                <button type="button"
                                    onclick="location.href='{{ route('user.profiles.edit',['profile'=>$userProfile->id]) }}'"
                                    class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">違反報告</button>
                                <button type="button" onclick="location.href='{{ route('user.dashboard') }}'"
                                    class="flex mx-auto  text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">戻る</button>
                            </div>
                </div>
            </div>
        </div>
    </section>



</x-app-layout>
