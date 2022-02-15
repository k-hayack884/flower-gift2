<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            取引希望画面
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">取引希望メール</h1>
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form action="{{ route('user.emails.send') }}" method="post">
                @csrf
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class=" flex flex-col -m-2">
                        <div class="p-2">
                            <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="relative">
                                <label for="address" class="leading-7 text-sm text-gray-600">送り先希望住所 ※直接取引の場合は不要</label>
                                <input type="text" id="address" name="address"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                                <label for="message" class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
                                <textarea id="message" name="message"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative flex flex-justify-center">
                                <button
                                    class="w-full md:w-1/2 mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">送信する</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
