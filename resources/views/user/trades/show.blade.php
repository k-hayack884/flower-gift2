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
              {{$categoryName->primary_name}}>>{{$categoryName->secondary_name}}
            <h1 class="title-font  text-3xl mb-4 font-medium text-gray-900">
              
                <br class="hidden lg:inline-block">{{$productInfo->name}} お気に入りボタン
            </h1>
            <p class="mb-8 leading-relaxed">{{$productInfo->comment}}</p>
            
            
           <div
                class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <ul>
                  <li class="mb-8 leading-relaxed">出品者: {{ $userProfile->user->name }}(例外的にユーザーへーじに飛ばしたい)　ここにフォローボタン</li>　
  ここにレビュー
  <li class="mb-8 leading-relaxed">出品日: {{ $productInfo->created_at }}</li>
  <li class="mb-8 leading-relaxed">現在の状態:@if($productInfo->status==\Constant::PRODUCT_LIST['sell'])取引可能@elseif($productInfo->status==\Constant::PRODUCT_LIST['transaction'])取引中@elseif($productInfo->status==\Constant::PRODUCT_LIST['sold'])取引終了@endif</li>
  
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
