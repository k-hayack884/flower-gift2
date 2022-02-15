<x-app-layout>
    {{-- <script src="https://unpkg.com/vue@next"></script> --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ホーム画面') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-center text-gray-900 mb-20">管理者画面にようこそ!
            </h1>
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
                <div class="p-4 md:w-1/2 flex">
                    <div class="flex-grow pl-6">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">ユーザー管理</h2>
                        <p class="leading-relaxed text-base">ユーザーの登録及び編集、削除をすることができます。</p>
                        <a href="{{ route('admin.users.index') }}"
                            class="mt-3 text-indigo-500 inline-flex items-center text-right">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 flex">
                    <div class="flex-grow pl-6">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">退会ユーザー管理</h2>
                        <p class="leading-relaxed text-base">退会したユーザーの確認および削除ができます</p>
                        <a href="{{ route('admin.expired-users.index') }}"
                            class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 flex">
                    <div class="flex-grow pl-6">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">違反商品管理</h2>
                        <p class="leading-relaxed text-base">違反していると報告された商品確認、非公開処理の切り替えができます</p>
                        <a href="{{ route('admin.bads.product-index') }}"
                            class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 flex">
                    <div class="flex-grow pl-6">
                        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">違反コメント管理</h2>
                        <p class="leading-relaxed text-base">違反していると報告された商品確認、非公開処理の切り替えができます</p>
                        <a href="{{ route('admin.bads.comment-index') }}"
                            class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
    </script>
</x-app-layout>
