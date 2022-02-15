<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            退会済みユーザー管理
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container md:px-5 mx-auto">
                            <x-flash-message status="session('status')"></x-flash-message>
                            <div class="flex justify-between w-full mb-4">
                                <h1 class="text-4xl font-medium title-font text-gray-900  ">退会済みユーザー管理</h1>
                            </div>
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap ">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 w-1/6 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                ユーザー名</th>
                                            <th
                                                class="px-4 py-3 w-1/2 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                メールアドレス</th>
                                            <th
                                                class="px-4 py-3  w-1/6 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                前回のログイン</th>
                                            <th
                                                class="w-1/6 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($expireUsers as $expireUser)
                                            <tr class="border-2">
                                                <td class="px-4 py-3 break-all">{{ $expireUser->name }}</td>
                                                <td class="px-4 py-3 break-all">{{ $expireUser->email }}</td>
                                                <td class="px-4 py-3">
                                                    @if ($expireUser->deleted_at->diffInDays(now()) >= 30)
                                                        {{ $expireUser->deleted_at->subDays(30) }}
                                                    @else
                                                        {{ $expireUser->deleted_at->diffForHumans() }}
                                                    @endif
                                                </td>
                                                <td class="w-4 text-center">
                                                    <form id="delete_{{ $expireUser->id }}" method="post"
                                                        action="{{ route('admin.expired-users.destroy', ['user' => $expireUser->id]) }}">
                                                        @csrf
                                                        <a href="#" data-id="{{ $expireUser->id }}"
                                                            onclick="deletePost(this)"
                                                            class="flex  text-white bg-red-500 border-0 py-2 px-2 focus:outline-none hover:bg-red-600 rounded text-lg mx-4">
                                                            完全に削除</a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
