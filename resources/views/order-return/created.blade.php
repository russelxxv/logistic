<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- notus theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.3.0/build/css/intlTelInput.css">
</head>

<body class="font-sans text-gray-900 antialiased">
    <nav
        class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-green-700 opacity-75">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                    href="{{ route('customer.create') }}"><i
                        class="lg:text-blueGray-200 fas fa-home text-lg leading-lg"></i> BRAVO ZULU</a>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden"
                id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
                    <li class="flex items-center">
                        <button
                            class="text-white text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-white border-white lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150 bg-green-600 hover:bg-green-500"
                            type="button">
                            <i class="fas fa-phone mr-2"></i> Talk Us Now
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <section class="relative w-full h-full py-24 min-h-screen">
            <div class="container mx-auto px-4 h-full bg-blueGray-100 p-5">
                <div class="flex content-center items-center justify-center h-full">
                    <div class="flex flex-col">
                        <h2 class="text-xl font-semibold leading-7 text-gray-900 mb-10 text-center">Your order return is submitted!</h2>
                        <h2 class="text-sm font-semibold leading-7 text-gray-600 mb-10 text-center">Do you want to
                            create a
                            new order return?</h2>

                        <div class="mt-6 flex flex-row justify-center gap-x-3">
                            <a href="{{ route('order-return.index') }}"
                                class="rounded-md underline px-3 py-2 text-sm font-semibold text-gray-600 hover:text-green-500">Create
                                New Return Order</a>

                            <a href="{{ route('order-return.close') }}"
                                class="rounded-md underline px-3 py-2 text-sm font-semibold text-green-600 hover:text-green-400">No
                                I'm Done</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js" charset="utf-8"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/mask.js') }}"></script>
{{-- Custom --}}
<script>
    var app = app || {};
</script>
<script src="{{ asset('assets/js/common.js') }}"></script>
<script>
    $(document).ready(function() {

    }) // end document ready
</script>

</html>
