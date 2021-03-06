<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 sm:px-4 lg:px-6 bg-green-500 py-2 ">
        <div class="flex justify-between h-16 bg-green-500">
            <div class="flex">

                <!-- Navigation Links -->
                <div class=" sm:-my-px sm:ml-4 flex items-center">
                    <x-logo></x-logo>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                        {{ __('ホーム') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                    <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                        {{ __('ユーザー管理') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                    <x-nav-link :href="route('admin.expired-users.index')"
                        :active="request()->routeIs('admin.expired-users.index')">
                        {{ __('退会ユーザー管理') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                    <x-nav-link :href="route('admin.bads.product-index')"
                        :active="request()->routeIs('admin.bads.product-index')">
                        {{ __('違反商品管理') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                    <x-nav-link :href="route('admin.bads.comment-index')"
                        :active="request()->routeIs('admin.bads.comment-index')">
                        {{ __('違反コメント管理') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:mr-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('admin.logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md hover:text-gray-500 hover:bg-green-500 focus:outline-none focus:bg-gray-100 focus:bg-green-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-green-300">
        <div class="pt-2 pb-3 space-y-1 bg-green-300">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('ホーム') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                {{ __('ユーザー管理') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.expired-users.index')"
                :active="request()->routeIs('admin.expired-users.index')">
                {{ __('退会ユーザー管理') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.bads.product-index')"
                :active="request()->routeIs('admin.bads.product-index')">
                {{ __('違反商品管理') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.bads.comment-index')"
                :active="request()->routeIs('admin.bads.comment-index')">
                {{ __('違反コメント管理') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('admin.logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
