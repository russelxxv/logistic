<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login {{ config('app.name', 'OORS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="text-blueGray-700 antialiased">
    {{-- Start Nav --}}
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                    href="../../index.html">Notus Tailwind JS</a><button
                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button" onclick="toggleNavbar('example-collapse-navbar')">
                    <i class="text-white fas fa-bars"></i>
                </button>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none hidden"
                id="example-collapse-navbar">
                <ul class="flex flex-col lg:flex-row list-none mr-auto">
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="https://www.creative-tim.com/learning-lab/tailwind/js/overview/notus?ref=njs-login"><i
                                class="lg:text-blueGray-200 text-blueGray-400 far fa-file-alt text-lg leading-lg mr-2"></i>
                            Docs</a>
                    </li>
                </ul>
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto items-center">
                    <li class="inline-block relative">
                        <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="#pablo" onclick="openDropdown(event,'demo-pages-dropdown')">
                            Demo Pages
                        </a>
                        <div class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                            id="demo-pages-dropdown">
                            <span
                                class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
                                Admin Layout
                            </span>
                            <a href="../admin/dashboard.html"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Dashboard
                            </a>
                            <a href="../admin/settings.html"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Settings
                            </a>
                            <a href="../admin/tables.html"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Tables
                            </a>
                            <a href="../admin/maps.html"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Maps
                            </a>
                            <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div>
                            <span
                                class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
                                Auth Layout
                            </span>
                            <a href="./login.html"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Login
                            </a>
                            <a href="./register.html"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Register
                            </a>
                            <div class="h-0 mx-4 my-2 border border-solid border-blueGray-100"></div>
                            <span
                                class="text-sm pt-2 pb-0 px-4 font-bold block w-full whitespace-nowrap bg-transparent text-blueGray-400">
                                No Layout
                            </span>
                            <a href="../landing.html"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Landing
                            </a>
                            <a href="../profile.html"
                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
                                Profile
                            </a>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdemos.creative-tim.com%2Fnotus-js%2F"
                            target="_blank"><i
                                class="lg:text-blueGray-200 text-blueGray-400 fab fa-facebook text-lg leading-lg"></i><span
                                class="lg:hidden inline-block ml-2">Share</span></a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fdemos.creative-tim.com%2Fnotus-js%2F&text=Start%20your%20development%20with%20a%20Free%20Tailwind%20CSS%20and%20JavaScript%20UI%20Kit%20and%20Admin.%20Let%20Notus%20JS%20amaze%20you%20with%20its%20cool%20features%20and%20build%20tools%20and%20get%20your%20project%20to%20a%20whole%20new%20level."
                            target="_blank"><i
                                class="lg:text-blueGray-200 text-blueGray-400 fab fa-twitter text-lg leading-lg"></i><span
                                class="lg:hidden inline-block ml-2">Tweet</span></a>
                    </li>
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-blueGray-200 text-blueGray-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="https://github.com/creativetimofficial/notus-js?ref=njs-login" target="_blank"><i
                                class="lg:text-blueGray-200 text-blueGray-400 fab fa-github text-lg leading-lg"></i><span
                                class="lg:hidden inline-block ml-2">Star</span></a>
                    </li>
                    <li class="flex items-center">
                        <button
                            class="bg-white text-blueGray-700 active:bg-blueGray-50 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3 ease-linear transition-all duration-150"
                            type="button">
                            <i class="fas fa-arrow-alt-circle-down"></i> Download
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- End Nav --}}

    {{-- Start main --}}
    <main>
        <section class="relative w-full h-full py-40 min-h-screen">
            <div class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
                style="background-image: url(../../assets/img/register_bg_2.png)"></div>

                    
            <div class="container mx-auto px-4 h-full">
                <div class="flex content-center items-center justify-center h-full">
                    {{ $slot }}
                </div>
            </div>
            <footer class="absolute w-full bottom-0 bg-blueGray-800 pb-6">
                <div class="container mx-auto px-4">
                    <hr class="mb-6 border-b-1 border-blueGray-600" />
                    <div class="flex flex-wrap items-center md:justify-between justify-center">
                        <div class="w-full md:w-4/12 px-4">
                            <div class="text-sm text-white font-semibold py-1 text-center md:text-left">
                                Copyright © <span id="get-current-year"></span>
                                <a href="https://www.creative-tim.com?ref=njs-login"
                                    class="text-white hover:text-blueGray-300 text-sm font-semibold py-1">Creative
                                    Tim</a>
                            </div>
                        </div>
                        <div class="w-full md:w-8/12 px-4">
                            <ul class="flex flex-wrap list-none md:justify-end justify-center">
                                <li>
                                    <a href="https://www.creative-tim.com?ref=njs-login"
                                        class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">Creative
                                        Tim</a>
                                </li>
                                <li>
                                    <a href="https://www.creative-tim.com/presentation?ref=njs-login"
                                        class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">About
                                        Us</a>
                                </li>
                                <li>
                                    <a href="http://blog.creative-tim.com?ref=njs-login"
                                        class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">Blog</a>
                                </li>
                                <li>
                                    <a href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-login"
                                        class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3">MIT
                                        License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </main>
    {{-- End main --}}

    {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h4 class="text-2xl">{{ config('app.name') }}</h4>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div> --}}
</body>

</html>
