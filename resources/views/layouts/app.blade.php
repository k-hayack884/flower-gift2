<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{ session()->get('api_token') ?? '' }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @if (auth('admin')->user())
            @include('layouts.admin-navigation')
        @elseif(auth('users')->user())
            @include('layouts.user-navigation')
        @endif
        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7x py-6 px-4 sm:px-6 lg:px-8 bg-green-300">
                {{ $header ?? '' }}

                <x-flash-message status="session('status')"></x-flash-message>

            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
<footer class="shadow text-center text-gray-300 text-sm">
    © 2022, https://flower-gift.herokuapp.com/, k-hayack884
</footer>
</body>

</html>
