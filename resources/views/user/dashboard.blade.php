<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>

  
        <form action="#" method="get">
        <div class="lg:flex lg:justify-around">
            <div class="lg:flex items-center">
                 <select name="category" class="lg:mr-4 md:my-4">
                     <option value="0" @if(\Request::get('category')==='0') selected @endif>すべての商品</opition>
                                               @foreach($categories as $category)
                                               <optgroup label={{$category->name}}>
                                                   @foreach($category->secondary as $secondary)
                                                   <option value="{{$secondary->id}}" @if(\Request::get('category')==$secondary->id) selected @endif>
                                                       {{$secondary->name}}
                                                   </option>
                                                       @endforeach
                                                       @endforeach
                                                </select>
                <div class="flex space-x-2 items-center">
                    <div><input name="keyword" class="w-full md:my-4 bg-gray-100 bg-opacity-50 rounded border border-black focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out sm:my-4" placeholder="キーワードを入力" value="{{request()->keyword}}"></div>
                    <div><button type="submit" class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-4">検索する</button></div>
                </div>
            </div>
                


<div class="text-sm sm:my-4">表示順
<select name="sort" id="sort" class="ml-4">
  <option value="{{\Constant::ORDER_LIST['later'] }}"@if(\Request::get('sort')===\Constant::ORDER_LIST['later']) selected @endif>新しい順
  </option>
  <option value="{{\Constant::ORDER_LIST['older'] }}" @if(\Request::get('sort')===\Constant::ORDER_LIST['older'])
      selected @endif>古い順
    </option>
    <option value="{{\Constant::ORDER_LIST['sell'] }}" @if(\Request::get('sort')===\Constant::ORDER_LIST['sell'])
      selected @endif>取引中を除く
    </option>
</select>
</div>
</form>
</div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="container px-5 py-12 mx-auto">
              <div class="flex flex-wrap m-4">
                @foreach($productInfo as $product)
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                  <a href="{{ route('user.products.edit',['product'=>$product->id]) }}" class="block relative h-48 rounded overflow-hidden">
                    <x-product-image :filename="$product->img" />
                  </a>
                  <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{$product->category->name}}</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{$product->name}}</h2>
                    <p class="mt-1">$16.00</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
        </div>
         {{$productInfo->appends(request()->query())->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
