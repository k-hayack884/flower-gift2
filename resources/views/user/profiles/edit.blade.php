<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザー情報編集
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                            <div class="flex flex-col text-center w-full">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">ユーザー編集</h1>
                            </div>
                            <div class="lg:w-2/3 mx-auto">
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form action="{{ route('user.profiles.update', ['profile' => $userProfile->id]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="flex flex-col items-center m-2 lg:w-2/3 mx-auto">
                                        <div class="p-2 mx-auto">
                                            <div class="flex justify-center">
                                                <div class="w-32">
                                                    <x-user-icon :filename="$userProfile->img" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 mx-auto w-full">
                                            <div class="relative">
                                                <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                                <input type="file" name="image" id="image"
                                                    accept="image/png,image/jpeg,image/jpg"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 mx-auto w-full">
                                            <div class="relative">
                                                <label for="name" class="leading-7 text-sm text-gray-600">ユーザー名</label>
                                                <input type="text" id="name" name="name"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    value="{{ $userProfile->name }}" required>
                                            </div>
                                        </div>
                                        <div class="p-2 mx-auto w-full">
                                            <div class="relative">
                                                <label for="comment"
                                                    class="leading-7 text-sm text-gray-600">自己紹介</label>
                                                <textarea type="text" id="comment" name="comment"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    required>{{ $userProfile->comment }}</textarea>
                                            </div>
                                        </div>
                                        <div class="p-2 mx-auto w-full">
                                            <div class="relative">
                                                <label for="address" class="leading-7 text-sm text-gray-600">出身地</label>
                                                <input type="text" id="address" name="address"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    value="{{ $userProfile->prefecture }}" required>
                                            </div>
                                        </div>
                                        <div class="p-2 mx-auto w-full">
                                            <div class="relative">
                                                <label for="password"
                                                    class="leading-7 text-sm text-gray-600">パスワード</label>
                                                <input type="password" id="password" name="password"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="p-2 mx-auto w-full">
                                            <div class="relative">
                                                <label for="password_confirmation"
                                                    class="leading-7 text-sm text-gray-600">パスワード確認</label>
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="flex flex-col md:flex-row mt-4 w-full">
                                            <button type="submit"
                                            class="mx-auto text-center text-white w-full bg-indigo-500 border-0 py-2 md:px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mb-4 md:mx-4">登録</button>
                                            <button type="button"
                                                onclick="location.href='{{ route('user.profiles.show', ['profile' => $userProfile->id]) }}'"
                                                class="mx-auto text-center w-full text-white bg-gray-500 border-0 md:px-8 py-2 focus:outline-none hover:bg-gray-600 rounded text-lg mb-4 md:mx-4">戻る</button>
                                            
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
