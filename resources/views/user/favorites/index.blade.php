<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      お気に入り一覧
    </h2>
  </x-slot>
  <x-flash-message status="session('status')"></x-flash-message>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-wrap m-4">
                @foreach($favoriteItem as $item)

                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                  <div class="relative">
                    <a href="{{ route('user.trades.show',['trade'=>$item->product->id]) }}"
                      class="block relative h-48 rounded overflow-hidden">
                      <x-product-image :filename="$item->product->img" />
                    </a>
                    <div class=" absolute top-0 right-0">

                      <form method="post" action="{{route('user.favorites.indexdelete',['favorite'=>$item->product->id])}}">
                        @csrf
                        <button>
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 fill-yellow-300 text-yellow-400"
                            fill="yellow" viewBox="0 0 24 24" stroke="yellow">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                          </svg>
                        </button>
                        <input type="hidden" name="product_id" value="{{$item->product->id}}">
                      </form>

                    </div>
                  </div>

                  <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">
                      <h2 class="text-gray-900 title-font text-lg font-medium">{{$item->product->name}}</h2>
                      <p class="mb-8 leading-relaxed">
                        現在の状態:@if($item->product->status==\Constant::PRODUCT_LIST['sell'])取引可能@elseif($item->product->status==\Constant::PRODUCT_LIST['transaction'])取引中@elseif($item->product->status==\Constant::PRODUCT_LIST['sold'])取引終了@endif
                      </p>
                      <p class="text-gray-900">{{$item->created_at->toDateString()}}に追加</p>
                  </div>
                </div>

                @endforeach
              </div>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
  <script>

  </script>
</x-app-layout>
