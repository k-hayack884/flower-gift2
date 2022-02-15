<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品編集
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">商品編集</h1>
                            </div>
                            <div class="lg:w-1/2 mx-auto">
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form action="{{ route('user.products.update', ['product' => $product->id]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="flex flex-col items-center m-2">
                                        <div class="p-2 mx-auto md:w-full">
                                            <div class="relative">
                                                カテゴリー
                                                <select name="category">
                                                    @foreach ($categories as $category)
                                                        <optgroup label={{ $category->name }}>
                                                            @foreach ($category->secondary as $secondary)
                                                                <option value="{{ $secondary->id }}"
                                                                    @if ($secondary->id === $product->secondary_category_id) selected @endif>
                                                                    {{ $secondary->name }}
                                                                </option>
                                                            @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="p-2 mx-auto md:w-full">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                                <input type="text" id="name" name="name"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    value=" {{ $product->name }}" required>
                                            </div>
                                        </div>
                                        <div class="p-2 mx-auto md:w-full">
                                            <div class="relative">
                                                <label for="comment" class="leading-7 text-sm text-gray-600">紹介文</label>
                                                <textarea type="text" id="comment" name="comment"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    required>{{ $product->comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="p-2 mx-auto md:w-full">
                                            <div class="relative">
                                                <x-product-image :filename="$product->img" />
                                                <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                                <input type="file" name="image" id="image"
                                                    accept="image/png,image/jpeg,image/jpg"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 mx-auto md:w-full">
                                        取引形態
                                        <div class="flex  flex-col md:flex-row md:justify-around">
                                            <div><input type="radio" name="trade_type"
                                                    value="{{ \Constant::TRADE_LIST['direct'] }}"
                                                    @if ($product->trade_type === 0) checked @endif>直接取引</div>
                                            <div><input type="radio" name="trade_type"
                                                    value="{{ \Constant::TRADE_LIST['payment'] }}"
                                                    @if ($product->trade_type === 1) checked @endif>配送(着払い)</div>
                                            <div><input type="radio" name="trade_type"
                                                    value="{{ \Constant::TRADE_LIST['prepayment'] }}"
                                                    @if ($product->trade_type === 2) checked @endif>配送(元払い)</div>
                                        </div>
                                    </div>
                                    <div class="p-2 mx-auto md:w-full">
                                        <div class="relative">
                                            <label for="address" class="leading-7 text-sm text-gray-600">取引希望場所
                                                ※直接取引の場合入力ください</label>
                                            <input type="text" name="address" id="address"
                                                value="{{ $product->address }}"
                                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                    </div>
                                    <div class="p-2 mx-auto md:w-full">
                                        <div class="flex  flex-col md:flex-row md:justify-around">
                                            <div><input type="radio" name="status"
                                                    value="{{ \Constant::PRODUCT_LIST['sell'] }}"
                                                    @if ($product->status === 1) checked @endif>販売中</div>
                                            <div><input type="radio" name="status"
                                                    value="{{ \Constant::PRODUCT_LIST['transaction'] }}"
                                                    @if ($product->status === 2) checked @endif>取引中</div>
                                            <div><input type="radio" name="status"
                                                    value="{{ \Constant::PRODUCT_LIST['sold'] }}"
                                                    @if ($product->status === 3) checked @endif>販売終了</div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row justify-around mt-4">
                                        <button type="submit"
                                            class=" mx-auto  text-white bg-indigo-500 border-0 py-2 px-12 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-4 mb-4">更新</button>

                                        <button type="button"
                                            onclick="location.href='{{ route('user.products.show', ['product' => $product->id]) }}'"
                                            class="mx-auto  text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4 mb-4">戻る</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script>
        'use strict';

        function deletePost(e) {
            if (confirm('本当に削除してもよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
