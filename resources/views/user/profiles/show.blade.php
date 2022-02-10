<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザー情報確認
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-flash-message status="session('status')"></x-flash-message>
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                                <x-user-icon :filename="$userProfile->img" />
                            </div>
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">ユーザー情報</h1>
                                <ul>
                                    <li class="mb-8 leading-relaxed">ユーザー名: {{ $userProfile->name }}</li>
                                    <li class="mb-8 leading-relaxed">
                                        <div id="app" class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                                            <review-component v-bind:good='{{$good}}' v-bind:normal='{{$normal}}' v-bind:bad='{{$bad}}'></review-component>
                                            <counter-component></counter-component>
                                        </div>
                                        
                                        
                                    </li>
                                    <li class="mb-8 leading-relaxed">メールアドレス: {{ $userProfile->email }}</li>
                                    <li class="mb-8 leading-relaxed">出身地: {{ $userProfile->prefecture }}</li>
                                    <li class="mb-8 leading-relaxed">自己紹介: {{ $userProfile->comment }}</li>
                                    <ul>
                                        <div class="flex flex-col md:flex-row">
                                            @if($userProfile->id===auth()->user()->id)  
                                            <button type="button"
                                                onclick="location.href='{{ route('user.profiles.edit', ['profile' => $userProfile->id]) }}'"
                                                class=" mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4 mb-4">編集</button>
                                            @endif
                                                <button type="button"
                                                onclick="location.href='{{ route('user.dashboard') }}'"
                                                class=" mx-auto text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4 mb-20 md:mb-4">戻る</button>
                                         @if($userProfile->id===auth()->user()->id)  
                                        <form id="delete_{{ $userProfile->id }}" method="post"
                                            action="{{ route('user.profiles.destroy', ['profile' => $userProfile->id]) }}">
                                            @csrf
                                            <a href="#" data-id="{{ $userProfile->id }}" onclick="deletePost(this)"
                                                class=" text-white bg-red-500 border-0 py-2 px-20 text-center focus:outline-none hover:bg-red-600 rounded text-lg mx-4 mt-8 md:hidden">
                                                削除</a>
                                        </form>
                                        @endif
                                    </div>
                                   
                            </div>
                           
                        </div>
                        @if($userProfile->id===auth()->user()->id) 
                        <div class="flex justify-end">
                        <form id="delete_{{ $userProfile->id }}" method="post"
                            action="{{ route('user.profiles.destroy', ['profile' => $userProfile->id]) }}">
                            @csrf
                            <a href="#" data-id="{{ $userProfile->id }}" onclick="deletePost(this)"
                                class=" text-white bg-red-500 border-0 py-2 px-8 mx-auto focus:outline-none hover:bg-red-600 rounded text-lg mx-4 mt-10 hidden md:block">
                                削除</a>
                        </form> 
                    </div>
                    @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        'use strict';

        function deletePost(e) {
            if (confirm('本当に退会してもよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
