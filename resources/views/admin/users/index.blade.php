<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           ユーザー管理
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
  <div class="container px-5 mx-auto">

 <x-flash-message status="info"></x-flash-message>
        <div class="flex justify-between w-full mb-4">
      <h1 class="sm:text-4xl font-medium title-font text-gray-900  ">ユーザー管理</h1>

      <div class="p-2 w-1/4">
            <button onclick="location.href='{{ route('admin.users.create') }}'"
              class="flex mx-auto  bg-indigo-500 border-0  px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg py-4 text-white">新規登録する</button>
          </div>
    </div>


    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ユーザー名</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">前回のログイン</th>
            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
          <tr>
            <td class="px-4 py-3">{{$user->name}}</td>
            <td class="px-4 py-3">{{$user->email}}</td>
            <td class="px-4 py-3">
                @if($user->created_at->diffInDays(now())>=30)
                {{$user->created_at->subDays(30)}}
                @else
                {{$user->created_at->diffForHumans()}}
                @endif
                </td>
            <td class="w-10 text-center">
                <button type="button" onclick="location.href='{{ route('admin.users.edit',['user'=>$user->id]) }}'" class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">編集</button>
            </td>

            <td class="w-10 text-center">
             <form id="delete_{{ $user->id }}" method="post" action="{{ route('admin.users.destroy',['user'=>$user->id]) }}">
            @csrf
            @method('delete')
{{-- <button type="button"
  class="flex mx-auto  text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4" @click="open()">戻る</button> --}}
<div id="hoge">
  <deleteButton></deleteBbutton>
</div>
            </form>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
      <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </a>
      <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
    </div>
  </div>
</section>
                </div>
            </div>
        </div>
    </div>
    <script>
// const Counter = {
// data() {
// return {
// counter: 'あへあへ'
// }
// }
// }
// Vue.createApp(Counter).mount('#counter')
    </script>
    <script src="{{ mix('/js/app.js') }}"></script>
</x-app-layout>
