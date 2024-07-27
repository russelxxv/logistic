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
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
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
                                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-green-600 bg-white cursor-not-allowed"
                                            data-tab-toggle="tab-customer-details">
                                            1. Customer Details <i class="fa fa-check-circle text-green-600"></i>
                                        </a>
                                    </li>
                                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-green-600 cursor-pointer"
                                            data-tab-toggle="tab-order-details"
                                            onclick="changeAtiveTab(event,'wrapper-for-text-green','green','tab-order-details')">
                                            2. Order Details
                                        </a>
                                    </li>
                                </ul>
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                    <div class="px-4 py-5 flex-auto">
                                        <div class="tab-content tab-space">

                                            {{-- Customer Details --}}
                                            <div class="hidden" data-tab-content="true" id="tab-customer-details">
                                            </div>
                                            {{-- /end Customer Details --}}

                                            {{-- Order Return --}}
                                            <div class="block" data-tab-content="true" id="tab-order-details">
                                                @if ($errors->any())
                                                    <div class="bg-red-100 border-l-4 border-red-500 text-orange-700 p-4"
                                                        role="alert">
                                                        <p class="font-bold">Form Invalid</p>
                                                        <p>Something invalid in your form.</p>
                                                    </div>
                                                @endif
                                                <form method="post"
                                                    action="{{ route('order-return.store', [], false) }}"
                                                    name="form-order-details" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="flex flex-wrap">
                                                        <div class="w-full lg:w-6/12 px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="order_number">
                                                                    Order No. <span class="text-red-500">*</span>
                                                                </label>
                                                                <input type="text" required
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    value="{{ old('order_number') }}"
                                                                    name="order_number" id="order_number"
                                                                    placeholder="1234. etc" />
                                                                <x-input-error class="mt-2" :messages="$errors->get('order_number')" />
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4"></div>


                                                        <div class="w-full px-4">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="product_category">Product Category <span
                                                                        class="text-red-500">*</span>
                                                                </label>
                                                                <x-input-error class="mt-2" :messages="$errors->get('product_category')" />
                                                                <div class="grid grid-cols-3 gap-3">
                                                                    @foreach ($productCategories as $category)
                                                                        <div
                                                                            class="mb-[0.125rem] me-4 inline-block min-h-[1.5rem] ps-[1.5rem]">
                                                                            <input
                                                                                class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-green-500 checked:bg-green-500 checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-green-500 dark:checked:bg-green-500"
                                                                                type="checkbox"
                                                                                id="{{ $category->name }}"
                                                                                name="product_category[]"
                                                                                value="{{ $category->id }}" />
                                                                            <label
                                                                                class="text-sm inline-block ps-[0.15rem] hover:cursor-pointer text-gray-600"
                                                                                for="{{ $category->name }}">{{ $category->name }}</label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="w-full lg:w-6/12 px-4 item-container">
                                                            <label
                                                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                for="product_category">Order Items <span
                                                                    class="text-red-500">*</span></label>
                                                            <input type="text" name="item_number[]"
                                                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                placeholder="New Item Number" value=""
                                                                pattern="[0-9]*" />
                                                        </div>
                                                        <div class="w-full lg:w-6/12 px-4 mb-2 div-button-item">
                                                            <div class="mt-7 -ml-2">
                                                                <button type="button" id="btn-add-item"
                                                                    class="bg-green-500 text-white block active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-green-300 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                                                    <i class="fa fa-plus"></i> Add item
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="w-full"></div>
                                                        <div class="w-full lg:w-6/12 px-4 mb-3 mt-2">
                                                            <div class="relative w-full">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    for="return_reason_id">
                                                                    Reason <span class="text-red-500">*</span>
                                                                </label>
                                                                <select id="return_reason_id" name="return_reason_id"
                                                                    required
                                                                    class="block w-full rounded-md border-0 px-3 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-green-600">
                                                                    <option selected disabled></option>
                                                                    @foreach ($reasons as $reason)
                                                                        <option value="{{ $reason->id }}">
                                                                            {{ $reason->reason }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="w-full lg:w-12/12 px-4 mt-2">
                                                            <div class="relative w-full mb-3">
                                                                <label
                                                                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                                                    htmlFor="grid-password">
                                                                    Other Notes/Instructions <span
                                                                        class="text-red-500">*</span>
                                                                </label>
                                                                <textarea type="text" id="details" name="details"
                                                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                                                    rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- /end flex-wrap --}}

                                                    <hr class="mt-6 border-b-1 border-blueGray-300" />
                                                    <div class="w-full px-4 my-5 flex justify-end">
                                                        <button
                                                            class="bg-green-500 text-white block active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-green-300 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                                            type="submit">
                                                            Submit <i class="fas fa-arrow-circle-right"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            {{-- /Order return end --}}
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
        $(`input[name="item_number[]"], #order_number`).mask('###############', {
            translation: {
                '#': {
                    pattern: /[0-9]/,
                    optional: true
                }
            }
        });

        $("#btn-add-item").click(function() {
            const itemOrders = $(".item-container");
            const itemOrderLength = itemOrders.length
            const idRandom = Math.floor((Math.random() * 100) + 1)

            let itemContainer = `
                    <div class="w-full lg:w-6/12 px-4 mt-2 item-container mb-2">
                                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                                        <input type="text" required value="" name="item_number[]"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pr-10"/>
                                        <span class="z-10 h-full leading-snug font-normal text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3 hover:cursor-pointer ">
                                        <i class="fas fa-times text-red-400 hover:text-red-600 delete-order-item" title="Delete Order Item"></i>
                                        </span>
                                    </div>
                                </div>
                `;
            $(itemContainer).insertAfter(itemOrders.length === 1 ? $(".div-button-item") : itemOrders
                .last());
            $(`input[name="item_number[]"]`).mask('###############', {
                translation: {
                    '#': {
                        pattern: /[0-9]/,
                        optional: true
                    }
                }
            });
        });

        $(document).on('click', '.delete-order-item', function() {
            $(this).parents('.item-container').remove()
        });

        $(`a[data-tab-toggle="tab-customer-details"]`).click(function(e) {
            e.preventDefault()
        })
    })
</script>

</html>
