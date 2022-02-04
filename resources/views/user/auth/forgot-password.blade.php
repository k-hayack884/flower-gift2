<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="bg-cover static">
                <img src="{{asset('images/back_img.jpg')}}" class="" alt="">
                <h1 class="text-white absolute top-48 left-48 mx-auto">飾り終わった花を必要な人にお届けするサービス!</h1>
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('登録したメールアドレスをご入力ください') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('user.password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('登録メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('メールを送信する') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
