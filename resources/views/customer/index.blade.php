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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.3.0/build/css/intlTelInput.css">
    <style>
        .iti.iti--allow-dropdown {
            width: 100% !important;
        }
    </style>
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
            <div class="container mx-auto px-4 h-full">
                <div class="flex content-center items-center justify-center h-full">
                    <div class="w-full lg:w-10/12 px-4">
                        <div
                            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                            <div class="rounded-t mb-0 px-6 py-6 border-green-500">
                                <div class="text-center mb-3">
                                    <h3 class="text-blueGray-500 font-bold">
                                        ORDER RETURN FORM
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap" id="wrapper-for-text-green">
                            <div class="w-full">
                                <ul class="flex mb-0 list-none flex-wrap pt-1 pb-4 flex-row">
                                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-green-600 cursor-pointer"
                                            data-tab-toggle="tab-customer-details"
                                            onclick="changeAtiveTab(event,'wrapper-for-text-green','green','tab-customer-details')">
                                            1. Customer Details
                                        </a>
                                    </li>
                                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-green-600 bg-white cursor-pointer"
                                            data-tab-toggle="tab-order-details"
                                            onclick="changeAtiveTab(event,'wrapper-for-text-green','green','tab-order-details')">
                                            2. Order Return Details
                                        </a>
                                    </li>
                                </ul>
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                    <div class="px-4 py-5 flex-auto">
                                        <div class="tab-content tab-space">


                                            {{-- Customer Details --}}
                                            <div class="block" data-tab-content="true" id="tab-customer-details">
                                                <form method="post" action="{{ route('customer.store', [], false) }}">
                                                    @csrf
                                                    <h2 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                                        Personal Information</h2>
                                                    <div class="flex flex-wrap">
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="first_name">
                                                                    First Name <span class="text-red-500">*</span>
                                                                </label>
                                                                <input type="text" required
                                                                    class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:ring-green-400 active:ring-green-400 w-full ease-linear transition-all duration-150"
                                                                    value="" name="first_name" id="first_name" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="last_name">
                                                                    Last Name <span class="text-red-500">*</span>
                                                                </label>
                                                                <input type="text" required
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    name="last_name" id="last_name" value="" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="middle_name">
                                                                    Middle Name
                                                                </label>
                                                                <input type="text"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    value="" name="middle_name"
                                                                    id="middle_name" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="email">
                                                                    Email address <span class="text-red-500">*</span>
                                                                </label>
                                                                <input type="email" required
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    value="" name="email" id="email" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="phone">
                                                                    Phone
                                                                </label>
                                                                <input type="tel" required
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    value="" name="phone" id="phone" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="retailer_name">
                                                                    Retailer name <span
                                                                        class="italic lowercase text-xs">(leave blank
                                                                        if not
                                                                        applicable)</span>
                                                                </label>
                                                                <input type="text"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    value="" name="retailer_name"
                                                                    id="retailer_name" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('retailer_name')" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-6 border-b-1 border-blueGray-300" />


                                                    <h2
                                                        class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                                        Address
                                                    </h2>
                                                    <div class="flex flex-wrap">
                                                        <div class="w-full lg:w-4/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="country">
                                                                    Country <span class="text-red-500">*</span>
                                                                </label>
                                                                <select id="country" name="country" required
                                                                    class="block w-full rounded-md border-0 px-3 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600">
                                                                    <option selected disabled></option>
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ $country->id }}" data-code="{{ $country->code }}">
                                                                            {{ $country->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        {{-- State & City --}}
                                                        <div class="w-full lg:w-4/12 px-4 us-address hidden">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="State">
                                                                    States <span class="text-red-500">*</span>
                                                                </label>
                                                                <select id="state" name="state_id" required
                                                                    class="block w-full rounded-md border-0 px-3 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600">
                                                                    <option selected disabled></option>
                                                                    @foreach ($states as $state)
                                                                        <option value="{{ $state->id }}">
                                                                            {{ $state->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-4/12 px-4 us-address hidden">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="city">
                                                                    City <span class="text-red-500">*</span>
                                                                </label>
                                                                <select id="city" name="city_id" required
                                                                    class="block w-full rounded-md border-0 px-3 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600">
                                                                </select>
                                                            </div>
                                                        </div>

                                                        {{-- ./ State & City --}}
                                                    </div>

                                                    <div class="w-full px-4 mt-1">
                                                        <button
                                                            class="bg-green-500 text-white block active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-green-300 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                                            type="submit">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- /end Customer Details --}}






                                            <div class="hidden" data-tab-content="true" id="tab-order-details">
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
<script src="{{ asset('assets/js/mask.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.3.0/build/js/intlTelInput.min.js"></script>
<script src="{{ asset('assets/js/select2.full.min.js') }}"></script>
{{-- Custom --}}
<script>
    var app = app || {};
</script>
<script src="{{ asset('assets/js/common.js') }}"></script>
<script>
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

    $(document).ready(function() {
        const phoneInput = document.querySelector("#phone");
        window.intlTelInput(phoneInput, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.3.0/build/js/utils.js",
            onlyCountries: ['us', 'ph'],
            separateDialCode: true,
            formatOnDisplay: false,
            nationalMode: false,
            autoPlaceholder: 'aggressive',
            hiddenInput: function(telInputName) {
                return {
                    phone: "phone_full",
                    country: "country_code"
                };
            }
        });

        phoneInput.addEventListener('countrychange', function(e) {
            const iti = intlTelInput.getInstance(e.target);
        })

        $("#state").change(function() {
            $('#city').empty()
            const request = $.ajax({
                url: '{{ route('us-city.fetch', [], false) }}' + `?state_id=${$(this).val()}`,
                type: 'get',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': app.data.csrf
                },
            });

            request.done(function(data) {
                let options = '';
                const cities = data.data

                cities.forEach(d => $('#city').append(
                    `<option value='${d.id}'>${d.name}</option>`));
            })
        });

        $("#country").change(function() {
            let countryCode = $(this).find('option:selected').data('code');

            if (countryCode === 'US') {
                $(`.us-address`).removeClass('hidden');
                $(`.ph-address`).addClass('hidden');
            } else {
                $(`.ph-address`).removeClass('hidden');
                $(`.us-address`).addClass('hidden');
            }
        })
    })
</script>

</html>
