<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            違反商品管理
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container md:px-5 mx-auto">
                            <div class="flex justify-between w-full mb-4">
                                <h1 class="text-4xl font-medium title-font text-gray-900  ">違反商品管理</h1>
                            </div>
                            <div class="lg:w-3/4 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="md:px-4 py-3 w-1/6 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                報告ユーザー</th>
                                            <th
                                                class="md:px-4 py-3 w-1/2  text-center title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                理由</th>
                                            <th
                                                class="md:px-4 py-3 w-1/6 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                報告日時</th>
                                            <th
                                                class="w-10 title-font w-1/6 tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                                処理</th>
                                            <th
                                                class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr class="border-2">
                                                <td class="md:px-4 py-3 break-all">{{ $product->product->user->name}}</td>
                                                <td class="md:px-4 py-3 break-all">{{ $product->reason }}</td>
                                                <td class="md:px-4 py-3 break-all">{{ $product->created_at->toDateString() }}
                                                </td>
                                                <td class="w-20 text-center md:px-4">
                                                    <a href="{{ route('admin.bads.product-show', ['product' => $product->id]) }}"
                                                        class="block relative text-white rounded overflow-hidden p-2 bg-indigo-500">確認
                                                    </a>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}
                            </div>
                            <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                            </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        'use strict';

        function deletePost(e) {
            if (confirm('本当に削除してもよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
