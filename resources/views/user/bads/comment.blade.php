<x-app-layout>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">違反コメント報告</h1>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex">
                    <div class="w-1/3">
                    <x-product-image :filename="$badComment->user->img" />
                    <p>投稿者:{{ $badComment->user->name}}</p>
                    </div>
                    <div class="w-2/3">{{ $badComment->comment }}
                        <p class="text-right">投稿日時:{{ $badComment->created_at->toDateString() }}</p>
                    </div>
                </div>
            </div>
            <form action="{{ route('user.bads.comment.send', ['comment' => $badComment->id]) }}" method="post">
                @csrf
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-full">
                            <div class="relative">
                                <input type="hidden" name="product_id" value="{{ auth()->user()->id }}">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="reason" class="leading-7 text-sm text-gray-600">違反理由をお書きください</label>
                                <textarea id="reason" name="reason"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信する</button>
                        </div>
            </form>
        </div>
    </section>
</x-app-layout>
