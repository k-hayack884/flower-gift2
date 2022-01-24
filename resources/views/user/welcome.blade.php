<x-app-layout>
    <body class="antialiased">
        <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('user.login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/user/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('user.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('user.register'))
                            <a href="{{ route('user.register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
<form action="#" method="get">
<span class="text-sm">表示順</span><br>
<select name="sort" id="sort">
  <option value="{{ \Constant::SORT_ORDER['later'] }}"@if(\Request::get('sort')===\Constant::SORT_ORDER['later']) selected @endif>新しい順
  </option>
  <option value="{{ \Constant::SORT_ORDER['older'] }}" @if(\Request::get('sort')===\Constant::SORT_ORDER['older'])
      selected @endif>古い順
    </option>
</select>
</form>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-wrap m-4">
                @foreach($productInfo as $product)
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                  <a href="{{ route('user.products.edit',['product'=>$product->id]) }}" class="block relative h-48 rounded overflow-hidden">
                    <x-product-image :filename="$product->img" />
                  </a>
                  <div class="mt-4">
                    <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{$product->category->name}}</h3>
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{$product->name}}</h2>
                    <p class="mt-1">$16.00</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
        </div>
         {{$productInfo->links()}}
    </body>
</html>

<script>
const select=document.getElementById('sort')
select.addEventListener('change',function(){
  this.form.submit()
})

</script>
</x-app-layout>
