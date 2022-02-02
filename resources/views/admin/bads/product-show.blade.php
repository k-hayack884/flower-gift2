<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            違反商品確認
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <x-product-image :filename="$product->product->img" />
            </div>
            <div
                class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">

                <div
                    class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <ul>
                        <li class="mb-8 leading-relaxed">商品名:{{$product->product->name}}</li>
                        <li class="mb-8 leading-relaxed">{{$product->product->comment}}</li>
                        {{-- <li class="mb-8 leading-relaxed">出品日: {{ $product->product->created_at->toDateString() }}</li> --}}
                        <li class="mb-8 leading-relaxed">
                            現在の状態:@if ($product->product->status == \Constant::PRODUCT_LIST['sell'])取引可能@elseif($product->product->status == \Constant::PRODUCT_LIST['transaction'])取引中@elseif($product->product->status == \Constant::PRODUCT_LIST['sold'])取引終了@endif
                        </li>

                        <li class="mb-8 leading-relaxed">希望取引形態:
                            @if ($product->product->trade_type == \Constant::TRADE_LIST['direct'])直接取引@elseif($product->product->trade_type == \Constant::TRADE_LIST['payment'])配送(着払い)@elseif($product->product->trade_type == \Constant::TRADE_LIST['prepayment'])配送(元払い)@endif
                        </li>




                        </ul>
                            <div class="flex justify-center">

                                <form action="{{ route('admin.bads.product.delete',['product'=>$product->id]) }}" method="post">
                                    @csrf
                                    <td class="w-10 text-center md:px-4 py-3">
                                    <input type="submit" value="削除する"
                                      class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">
                                    </form> 
                                    <form action="{{ route('admin.bads.product.cancel',['product'=>$product->id]) }}" method="post">
                                        @csrf
                                      <input type="submit" value="違反取消"
                                      class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">
            </form>
            <button type="button" onclick="location.href='{{ route('admin.bads.product-index') }}'"
            class="flex mx-auto  text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">戻る</button>
                            </div>
                </div>
            </div>
        </div>

    </section>
    <script src="{{ asset('/js/result.js') }}"></script>

</x-app-layout>
