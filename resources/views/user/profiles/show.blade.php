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
                                        <div class="flex">ユーザー評価:
                                            <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px"
                                                height="512px" viewBox="0 0 512 512"
                                                style="width: 24px; height: 24px; opacity: 1;" xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: #4B4B4B;
                                                    }

                                                </style>
                                                <g>
                                                    <path class="st0" d="M256.016,0C114.625,0,0,114.625,0,256s114.625,256,256.016,256C397.375,512,512,397.375,512,256
                          S397.375,0,256.016,0z M256.016,450.031c-107,0-194.047-87.063-194.047-194.031c0-37.766,11.031-72.953,29.781-102.781h328.5
                          C439,183.047,450,218.234,450,256C450,362.969,362.969,450.031,256.016,450.031z"
                                                        style="fill: rgb(255, 170, 243);"></path>
                                                    <path class="st0" d="M221.266,261.375c-5.328-11.313-13.172-21.031-22.984-28.031c-9.781-6.984-21.672-11.188-34.344-11.188
                          c-12.656,0-24.547,4.203-34.344,11.188c-9.813,7-17.656,16.719-22.984,28.063l23.656,11.125c3.578-7.594,8.688-13.75,14.5-17.875
                          c5.859-4.156,12.266-6.344,19.172-6.344c6.922,0,13.328,2.188,19.156,6.344c5.813,4.125,10.938,10.281,14.531,17.875
                          L221.266,261.375z" style="fill: rgb(255, 170, 243);"></path>
                                                    <path class="st0" d="M405.375,261.375c-5.344-11.313-13.188-21.031-23-28.031c-9.781-6.984-21.656-11.188-34.313-11.188
                          s-24.563,4.203-34.344,11.188c-9.813,7-17.656,16.719-23,28.063l23.656,11.125c3.563-7.594,8.688-13.75,14.5-17.875
                          c5.844-4.156,12.266-6.344,19.188-6.344c6.906,0,13.313,2.188,19.141,6.344c5.828,4.125,10.953,10.281,14.531,17.875
                          L405.375,261.375z" style="fill: rgb(255, 170, 243);"></path>
                                                    <path class="st0"
                                                        d="M167.781,344.844c17.234,30.844,50.281,51.813,88.203,51.813c37.953,0,71.016-20.969,88.234-51.828
                          l-26.609-14.875c-12.109,21.609-35.109,36.203-61.625,36.203c-26.484,0-49.469-14.594-61.594-36.219L167.781,344.844z"
                                                        style="fill: rgb(255, 170, 243);"></path>
                                                </g>
                                            </svg>
                                            {{ $good }} <svg version="1.1" id="_x32_"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px"
                                                height="512px" viewBox="0 0 512 512"
                                                style="width: 24px; height: 24px; opacity: 1;" xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: #4B4B4B;
                                                    }

                                                </style>
                                                <g>
                                                    <path class="st0" d="M256.016,0C114.625,0,0,114.625,0,256s114.625,256,256.016,256C397.375,512,512,397.375,512,256
                          S397.375,0,256.016,0z M256.016,450.031c-106.984,0-194.047-87.063-194.047-194.031c0-37.766,11.031-72.953,29.797-102.781H420.25
                          C439,183.047,450,218.234,450,256C450,362.969,362.969,450.031,256.016,450.031z"
                                                        style="fill: rgb(184, 221, 24);"></path>
                                                    <path class="st0" d="M164.094,214.547c-19,0-34.406,15.422-34.406,34.406c0,19.047,15.406,34.453,34.406,34.453
                          c19.031,0,34.438-15.406,34.438-34.453C198.531,229.969,183.125,214.547,164.094,214.547z"
                                                        style="fill: rgb(184, 221, 24);"></path>
                                                    <path class="st0" d="M350.313,214.547c-19.031,0-34.469,15.422-34.469,34.406c0,19.047,15.438,34.453,34.469,34.453
                          c19,0,34.406-15.406,34.406-34.453C384.719,229.969,369.313,214.547,350.313,214.547z"
                                                        style="fill: rgb(184, 221, 24);"></path>
                                                    <rect x="188.875" y="342.594" class="st0" width="139.875"
                                                        height="32.313" style="fill: rgb(184, 221, 24);"></rect>
                                                </g>
                                            </svg> {{ $normal }} <svg version="1.1" id="_x32_"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="512px"
                                                height="512px" viewBox="0 0 512 512"
                                                style="width: 24px; height: 24px; opacity: 1;" xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: #4B4B4B;
                                                    }

                                                </style>
                                                <g>
                                                    <rect x="186.063" y="342.594" class="st0" width="139.875"
                                                        height="32.313" style="fill: rgb(162, 142, 247);"></rect>
                                                    <path class="st0" d="M256.016,0C114.625,0,0,114.625,0,256s114.625,256,256.016,256C397.375,512,512,397.375,512,256
                            S397.375,0,256.016,0z M256.016,450.031c-107,0-194.047-87.063-194.047-194.031c0-37.766,11.031-72.953,29.781-102.781h328.5
                            C439,183.047,450,218.234,450,256C450,362.969,362.969,450.031,256.016,450.031z"
                                                        style="fill: rgb(162, 142, 247);"></path>
                                                    <path class="st0" d="M290.719,240.813c5.344,11.313,13.188,21.031,23,28.031c9.781,7,21.656,11.203,34.313,11.188
                            c12.688,0.016,24.563-4.188,34.344-11.188c9.813-7,17.672-16.719,23-28.031l-23.656-11.141c-3.563,7.609-8.688,13.734-14.5,17.875
                            c-5.844,4.141-12.25,6.328-19.188,6.344c-6.906-0.016-13.313-2.203-19.156-6.344c-5.813-4.141-10.922-10.297-14.5-17.891
                            L290.719,240.813z" style="fill: rgb(162, 142, 247);"></path>
                                                    <path class="st0" d="M106.625,240.813c5.344,11.313,13.172,21.031,22.984,28.031c9.781,7,21.672,11.203,34.328,11.188
                            c12.656,0.016,24.547-4.188,34.328-11.188c9.828-7,17.672-16.719,23.016-28.031l-23.656-11.141
                            c-3.578,7.578-8.703,13.734-14.5,17.875c-5.859,4.141-12.281,6.328-19.188,6.344c-6.906-0.016-13.313-2.203-19.156-6.344
                            c-5.813-4.141-10.938-10.297-14.531-17.891L106.625,240.813z"
                                                        style="fill: rgb(162, 142, 247);"></path>
                                                </g>
                                            </svg> {{ $bad }}
                                        </div>
                                    </li>
                                    <li class="mb-8 leading-relaxed">メールアドレス: {{ $userProfile->email }}</li>
                                    <li class="mb-8 leading-relaxed">出身地: {{ $userProfile->prefecture }}</li>
                                    <li class="mb-8 leading-relaxed">自己紹介: {{ $userProfile->comment }}</li>
                                    <ul>
                                        <div class="flex justify-center">
                                            <button type="button"
                                                onclick="location.href='{{ route('user.profiles.edit', ['profile' => $userProfile->id]) }}'"
                                                class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">編集</button>
                                            <button type="button"
                                                onclick="location.href='{{ route('user.dashboard') }}'"
                                                class="flex mx-auto  text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">戻る</button>
                                        </div>
                            </div>
                        </div>
                        <form id="delete_{{ $userProfile->id }}" method="post"
                            action="{{ route('user.profiles.destroy', ['profile' => $userProfile->id]) }}">
                            @csrf
                            <a href="#" data-id="{{ $userProfile->id }}" onclick="deletePost(this)"
                                class="flex mx-auto  text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg mx-4">
                                削除</a>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        'use strict';

        function deletePost(e) {
            if (confirm('本当に退会してもよろしいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
