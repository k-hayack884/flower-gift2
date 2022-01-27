<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-col text-center w-full mb-12">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">商品登録</h1>
                            </div>

                            <div class="lg:w-1/2 mx-auto">
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form action="{{ route('user.products.update',['product'=>$product->id]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="flex flex-col items-center m-2">
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                カテゴリー
                                                <select name="category">
                                                    @foreach($categories as $category)
                                                    <optgroup label={{$category->name}}>
                                                        @foreach($category->secondary as $secondary)
                                                        <option value="{{$secondary->id}}" @if($secondary->
                                                            id===$product->secondary_category_id) selected @endif>
                                                            {{$secondary->name}}
                                                        </option>
                                                        @endforeach
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                                <input type="text" id="name" name="name"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    value=" {{$product->name }}" required>
                                            </div>
                                        </div>
                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <label for="comment" class="leading-7 text-sm text-gray-600">紹介文</label>
                                                <textarea type="text" id="comment" name="comment"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    required>{{$product->comment}}</textarea>
                                            </div>
                                        </div>

                                        <div class="p-2 w-1/2 mx-auto">
                                            <div class="relative">
                                                <x-product-image :filename="$product->img" />
                                                <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                                <input type="file" name="image" id="image"
                                                    accept="image/png,image/jpeg,image/jpg"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-1/2 mx-auto">
                                        <div class="flex justify-around">

                                            <div><input type="radio" name="status"
                                                    value="{{\Constant::PRODUCT_LIST['sell']}}" @if
                                                    ($product->status===0)checked @endif>販売中</div>
                                            <div><input type="radio" name="status"
                                                    value="{{\Constant::PRODUCT_LIST['transaction']}}" @if
                                                    ($product->status===1)checked @endif>取引中</div>
                                            <div><input type="radio" name="status"
                                                    value="{{\Constant::PRODUCT_LIST['sold']}}" @if
                                                    ($product->status===2)checked @endif>販売終了</div>
                                        </div>

                                    </div>
                                    <div class="flex justify-around mt-4">

                                        <button type="button"
                                            onclick="location.href='{{ route('user.products.index') }}'"
                                            class="flex mx-auto  text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">戻る</button>



                                        <button type="submit"
                                            class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-12 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-4">更新</button>
                                    </div>
                                    <div class="flex justify-center">

                                    </div>
                                </form>
                                <form id="delete_{{ $product->id }}" method="post"
                                    action="{{ route('user.products.destroy',['product'=>$product->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" data-id="{{$product->id}}" onclick="deletePost(this)"
                                        class=" mx-auto  text-center text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg my-8">
                                        削除する</a>
                                </form>


                            </div>
                        </div>
                </div>
                </section>

            </div>
        </div>
    </div>
    </div>
    <script>
        'use strict';
        function deletePost(e){
        if(confirm('本当に退会してもよろしいですか？')){
          document.getElementById('delete_'+e.dataset.id).submit();
        }
        }
    </script>
    </script>
</x-app-layout>
