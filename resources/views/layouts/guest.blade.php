<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login {{ config('app.name', 'OORS') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/sublogo-mark.png') }}">

    <!-- Scripts vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- notus theme -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />
</head>

<body class="text-blueGray-700 antialiased">
    {{-- Start main --}}
    <main>
        <section class="relative w-full h-full py-20 min-h-screen">
            <div class="absolute top-0 w-full h-full bg-green-700 bg-full bg-no-repeat"
                style="background-image: url({{ asset('assets/img/register_bg_2.png') }})"></div>

                    
            <div class="container mx-auto h-full">
                <div class="flex content-center items-center justify-center h-full">
                    {{ $slot }}
                </div>
            </div>
        </section>
    </main>
</body>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/mask.js') }}"></script>
@stack('script')
</html>
