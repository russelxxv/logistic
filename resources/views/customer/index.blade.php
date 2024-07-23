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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- notus theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tailwind.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('styles')
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
        <section class="relative w-full h-full py-40 min-h-screen">
            <div class="container mx-auto px-4 h-full">
                <div class="flex content-center items-center justify-center h-full">
                    <div class="w-full lg:w-10/12 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                            <div class="rounded-t mb-0 px-6 py-6 border-green-500">
                                <div class="text-center mb-3">
                                    <h3 class="text-blueGray-500 text-sm font-bold">
                                        ORDER RETURN FORM
                                    </h3>
                                </div>
                                <hr class="mt-6 border-b-1 border-blueGray-300" />
                            </div>
                        </div>

                        <div class="flex flex-wrap" id="wrapper-for-text-green">
                            <div class="w-full">
                                <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-green-600"
                                            data-tab-toggle="text-tab-profile-green"
                                            onclick="changeAtiveTab(event,'wrapper-for-text-green','green','text-tab-profile-green')">
                                            Customer Details
                                        </a>
                                    </li>
                                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-green-600 bg-white"
                                            data-tab-toggle="text-tab-settings-green"
                                            onclick="changeAtiveTab(event,'wrapper-for-text-green','green','text-tab-settings-green')">
                                            Settings
                                        </a>
                                    </li>
                                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-green-600 bg-white"
                                            data-tab-toggle="text-tab-options-green"
                                            onclick="changeAtiveTab(event,'wrapper-for-text-green','green','text-tab-options-green')">
                                            Options
                                        </a>
                                    </li>
                                </ul>
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                    <div class="px-4 py-5 flex-auto">
                                        <div class="tab-content tab-space">
                                            <div class="block" data-tab-content="true" id="text-tab-profile-green">
                                                <p>
                                                    Collaboratively administrate empowered markets via
                                                    plug-and-play networks. Dynamically procrastinate B2C users
                                                    after installed base benefits.
                                                    <br />
                                                    <br />
                                                    Dramatically visualize customer directed convergence
                                                    without revolutionary ROI.
                                                </p>
                                            </div>
                                            <div class="hidden" data-tab-content="true" id="text-tab-settings-green">
                                                <p>
                                                    Completely synergize resource taxing relationships via
                                                    premier niche markets. Professionally cultivate one-to-one
                                                    customer service with robust ideas.
                                                    <br />
                                                    <br />
                                                    Dynamically innovate resource-leveling customer service for
                                                    state of the art customer service.
                                                </p>
                                            </div>
                                            <div class="hidden" data-tab-content="true" id="text-tab-options-green">
                                                <p>
                                                    Efficiently unleash cross-media information without
                                                    cross-media value. Quickly maximize timely deliverables for
                                                    real-time schemas.
                                                    <br />
                                                    <br />
                                                    Dramatically maintain clicks-and-mortar solutions
                                                    without functional solutions.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js" charset="utf-8"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<script src="{{ asset('assets/js/mask.js') }}"></script>
<script>
    /* Make dynamic date appear */
    (function() {
        if (document.getElementById("get-current-year")) {
            document.getElementById("get-current-year").innerHTML =
                new Date().getFullYear();
        }
    })();
    /* Function for opning navbar on mobile */
    function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("block");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
            element = element.parentNode;
        }
        Popper.createPopper(element, document.getElementById(dropdownID), {
            placement: "bottom-start"
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
    }

    function changeAtiveTab(event, wrapperID, color, tabID) {
        let tabsWrapper = document.getElementById(wrapperID);
        let tabsAnchors = tabsWrapper.querySelectorAll("[data-tab-toggle]");
        let tabsContent = tabsWrapper.querySelectorAll("[data-tab-content]");

        for (let i = 0; i < tabsAnchors.length; i++) {
            if (tabsAnchors[i].getAttribute("data-tab-toggle") === tabID) {
                tabsAnchors[i].classList.remove("text-" + color + "-600");
                tabsAnchors[i].classList.remove("bg-white");
                tabsAnchors[i].classList.add("text-white");
                tabsAnchors[i].classList.add("bg-" + color + "-600");
                tabsContent[i].classList.remove("hidden");
                tabsContent[i].classList.add("block");
            } else {
                tabsAnchors[i].classList.add("text-" + color + "-600");
                tabsAnchors[i].classList.add("bg-white");
                tabsAnchors[i].classList.remove("text-white");
                tabsAnchors[i].classList.remove("bg-" + color + "-600");
                tabsContent[i].classList.add("hidden");
                tabsContent[i].classList.remove("block");
            }
        }
    }
</script>

</html>
