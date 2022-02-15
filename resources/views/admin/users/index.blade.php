<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザー管理
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                    <div class="container md:px-5 mx-auto">
                        <div class="flex justify-between w-full mb-4">
                            <h1 class="text-4xl font-medium title-font text-gray-900  ">ユーザー管理</h1>
                            <div class="p-2 w-1/3">
                                <button onclick="location.href='{{ route('admin.users.create') }}'"
                                    class="  bg-indigo-500 border-0  sm:px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg py-2 text-white">新規登録する</button>
                            </div>
                        </div>
                        <div class="lg:w-3/4 w-full mx-auto overflow-auto">
                            <table class="table-auto text-left whitespace-no-wrap border solid">
                                <thead>
                                    <tr>
                                        <th
                                            class="md:px-4 py-3 w-1/6 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                            ユーザー名</th>
                                        <th
                                            class=" md:px-4 py-3 w-1/3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                            メールアドレス</th>
                                        <th
                                            class="md:px-4 py-3 w-1/6 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                            前回のログイン</th>
                                        <th
                                            class="w-10 title-font w-1/3 tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="border-2">
                                            <td class="md:px-4 py-3 break-all">{{ $user->name }}</td>
                                            <td class="md:px-4 py-3 break-all">{{ $user->email }}</td>
                                            <td class="md:px-4 py-3">
                                                @if ($user->created_at->diffInDays(now()) >= 30)
                                                    {{ $user->created_at->subDays(30)->toDateString() }}
                                                @else
                                                    {{ $user->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class=" text-center md:px-4 py-3 md:flex md:flex-row">
                                                <button type="button"
                                                    onclick="location.href='{{ route('admin.users.edit', ['user' => $user->id]) }}'"
                                                    class="mx-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-gray-600 rounded text-sm mb-2 md:mb-0">編集</button>
                                                <form id="delete_{{ $user->id }}" method="post"
                                                    action="{{ route('admin.users.destroy', ['user' => $user->id]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="#" data-id="{{ $user->id }}" onclick="deletePost(this)"
                                                        class="inline-block mx-auto text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded text-sm">
                                                        削除</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
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
