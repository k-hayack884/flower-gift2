<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品一覧
        </h2>
    </x-slot>
    <span id="flash">
        <flashmessage-component :flashmessage="{{ $categories }}"></flashmessage-component>
    </span>

    <form action="{{ route('user.dashboard') }}" method="get">
        <div class="md:flex md:justify-around mt-20">
            <div class="md:flex items-center">
                <select name="category" class="my-2 md:mr-4 md:my-4">
                    <option value="0" @if (\Request::get('category') === '0') selected @endif>すべての商品</opition>
                        @foreach ($categories as $category)
                            <optgroup label={{ $category->name }}>
                                @foreach ($category->secondary as $secondary)
                                    <option value="{{ $secondary->id }}"
                                        @if (\Request::get('category') == $secondary->id) selected @endif>
                                        {{ $secondary->name }}
                                    </option>
                                @endforeach
                        @endforeach
                </select>
                <div class="flex space-x-2 items-center">
                    <div><input name="keyword"
                            class="w-full my-2 md:my-4 bg-gray-100 bg-opacity-50 rounded border border-black focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out sm:my-4"
                            placeholder="キーワードを入力" value="{{ request()->keyword }}"></div>
                    <div><button type="submit"
                            class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-4 md:px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg mx-4">検索する</button>
                    </div>
                </div>
            </div>
            <div class="text-sm my-2 sm:my-4">表示順
                <select name="sort" id="sort" class="ml-4">
                    <option value="{{ \Constant::ORDER_LIST['later'] }}"
                        @if (\Request::get('sort') === \Constant::ORDER_LIST['later']) selected @endif>新しい順
                    </option>
                    <option value="{{ \Constant::ORDER_LIST['older'] }}"
                        @if (\Request::get('sort') === \Constant::ORDER_LIST['older']) selected @endif>古い順
                    </option>
                    <option value="{{ \Constant::ORDER_LIST['sell'] }}"
                        @if (\Request::get('sort') === \Constant::ORDER_LIST['sell']) selected @endif>取引中を除く
                    </option>
                </select>
            </div>
    </form>
    </div>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="container px-5 py-12 mx-auto">
            @if (!isset($productInfo[0]))
                <p class="text-center mt-12">商品が見つかりませんでした</p>
            @else
                <div class="flex flex-wrap m-4">
                    @foreach ($productInfo as $product)
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                            <a href="{{ route('user.trades.show', ['trade' => $product->id]) }}"
                                class="block relative rounded overflow-hidden">
                                <x-product-image :filename="$product->img" />
                            </a>
                            <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                                    {{ $product->category->name }}</h3>
                                <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->name }}</h2>
                            </div>
                        </div>
                    @endforeach
            @endif

        </div>
    </div>
    </div>
    {{ $productInfo->appends(request()->query())->links() }}
    <script>
        const select = document.getElementById('sort')
        select.addEventListener('change', function() {
            this.form.submit()
        })
    </script>
</x-app-layout>
