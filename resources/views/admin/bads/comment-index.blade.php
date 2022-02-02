<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        違反コメント管理
      </h2>
    </x-slot>
  
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="md:p-6 bg-white border-b border-gray-200">
            <section class="text-gray-600 body-font">
              <div class="container md:px-5 mx-auto">
                <div class="flex justify-between w-full mb-4">
                  <h1 class="text-4xl font-medium title-font text-gray-900  ">違反コメント管理</h1>
                </div>
                <div class="lg:w-3/4 w-full mx-auto overflow-auto">
                  <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                      <tr>
                        <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                          報告ユーザー</th>
                        <th
                          class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                          理由</th>
                        <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                          報告日時</th>
                      <th
                          class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                        処理</th>
                        <th
                          class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                        </th>  
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($comments as $comment)
                      <tr>
                        <td class="md:px-4 py-3">{{$comment->user->name}}</td>
                        <td class="md:px-4 py-3">{{$comment->reason}}</td>
                        <td class="md:px-4 py-3">{{ $comment->created_at }}
                        </td>
                        <td class="w-10 text-center md:px-4 py-3">
                        <form action="{{ route('admin.bads.comment.delete',['comment'=>$comment->id]) }}" method="post">
                        @csrf
                        <td class="w-10 text-center md:px-4 py-3">
                        <input type="submit" value="削除する"
                          class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">
                        </form> 
                        <form action="{{ route('admin.bads.comment.cancel',['comment'=>$comment->id]) }}" method="post">
                            @csrf
                          <input type="submit" value="違反取消"
                          class="flex mx-auto  text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg mx-4">
</td>
</form>
                      </tr>
                      @endforeach
  
                    </tbody>
                  </table>
                  {{$comments->links()}}
                </div>
                <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                  <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                      <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                  </a>
                 
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
      'use strict';
          function deletePost(e){
          if(confirm('本当に削除してもよろしいですか？')){
            document.getElementById('delete_'+e.dataset.id).submit();
          }
          }
    </script>
  
  </x-app-layout>