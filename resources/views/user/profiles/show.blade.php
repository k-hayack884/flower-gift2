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

<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
     <x-user-icon :filename="$userProfile->img" />     
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">ユーザー情報</h1>
      <ul>
      <li class="mb-8 leading-relaxed">ユーザー名: {{ $userProfile->name }}</li>
      <li class="mb-8 leading-relaxed">メールアドレス: {{ $userProfile->email }}</li>
      <li class="mb-8 leading-relaxed">出身地: {{ $userProfile->prefecture }}</li>
      <li class="mb-8 leading-relaxed">自己紹介: {{ $userProfile->comment }}</li>
      <ul>
      <div class="flex justify-center">

        <button type="button" onclick="location.href='{{ route('user.profiles.edit',['profile'=>$userProfile->id]) }}'"
    class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">編集</button>
<button type="button"
                                            onclick="location.href='{{ route('user.dashboard') }}'"
                                            class="flex mx-auto  text-white bg-gray-500 border-0 py-2 px-12 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">戻る</button>
      </div>
    </div>
  </div>
          <form id="delete_{{ $userProfile->id }}" method="post"
                          action="{{ route('user.profiles.destroy',['profile'=>$userProfile->id]) }}">
                          @csrf
                          <a href="#" data-id="{{$userProfile->id}}" onclick="deletePost(this)"
                            class="flex mx-auto  text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg mx-4">
                            削除</a>
                        </form>
</section>







<!--                    <section class="text-gray-600 body-font relative">-->
<!--                        <div class="container px-5 py-24 mx-auto">-->
<!--                            <div class="flex flex-col text-center w-full mb-12">-->
<!--                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">ユーザー登録</h1>-->
<!--                            </div>-->
<!--  <x-flash-message status="session('status')"></x-flash-message>-->
<!--<button type="button" onclick="location.href='{{ route('user.profiles.edit',['profile'=>$userProfile->id]) }}'"-->
<!--    class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">編集</button>-->

<!--                            <div class="lg:w-1/2 mx-auto">-->
<!--                                <x-auth-validation-errors class="mb-4" :errors="$errors" />-->
<!--                                <div class="lg:w-1/2 mx-auto">-->
<!--                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />-->
<!--                                    <div class="flex flex-col items-center m-2">-->
<!--                                        <div class="p-2 w-1/2 mx-auto">-->
<!--                                            <div class="relative">-->
<!--                                                <label for="name" class="leading-7 text-sm text-gray-600">ユーザー名</label>-->
<!--                                                {{ $userProfile->name }}-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="p-2 w-1/2 mx-auto">-->
<!--                                            <div class="relative">-->
<!--                                                <label for="email"-->
<!--                                                    class="leading-7 text-sm text-gray-600">メールアドレス</label>-->
<!--                                                {{ $userProfile->email }}-->
<!--                                            </div>-->
<!--                                        </div>-->


<!--                                    </div>-->
<!--<form id="delete_{{ $userProfile->id }}" method="post"-->
<!--                          action="{{ route('user.profiles.destroy',['profile'=>$userProfile->id]) }}">-->
<!--                          @csrf-->
<!--                          <a href="#" data-id="{{$userProfile->id}}" onclick="deletePost(this)"-->
<!--                            class="flex mx-auto  text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg mx-4">-->
<!--                            削除</a>-->
<!--                        </form>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </section>-->

                </div>
            </div>
        </div>
    </div>
     <script>
    'use strict';
        function deletePost(e){
        if(confirm('本当に削除してもよろしいですか？')){
          document.getElementById('delete_'+e.dataset.id).submit();
        }
        }
  </script>
</x-app-layout>
