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
                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-wrap m-4">
                @foreach($productInfo as $product)
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                  <a href="#" class="block relative h-48 rounded overflow-hidden">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
