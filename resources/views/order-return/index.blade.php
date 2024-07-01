<x-form-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ config('app.name', 'Online Order Return System') }}
        </h4>
    </x-slot>

    <h2 class="text-xl font-semibold leading-7 text-gray-900 mb-10 text-center">Order Return</h2>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-orange-700 p-4" role="alert">
            <p class="font-bold">Form error</p>
            <p>Something invalid in your form.</p>
        </div>
    @endif

    @session('customer.created')
        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>Your details has been saved</p>
        </div>
    @endsession

    <form method="post" action="{{ route('customer.store', [], false) }}">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <ul id="nav-menu" class="mb-5 flex list-none flex-row flex-wrap border-b-0 ps-0" role="tablist"
                    data-twe-nav-ref>
                    <li role="presentation">
                        <a href="#tabs-order-1"
                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[twe-nav-active]:border-primary data-[twe-nav-active]:text-primary dark:text-white/50 dark:hover:bg-neutral-700/60 dark:data-[twe-nav-active]:text-primary"
                            data-twe-toggle="pill" data-twe-target="#tabs-order-1" data-twe-nav-active role="tab"
                            aria-controls="tabs-order-1" aria-selected="true">Order 1</a>
                    </li>
                    <li>
                        <a href="#" id="add-more-item"
                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[twe-nav-active]:border-primary data-[twe-nav-active]:text-primary dark:text-white/50 dark:hover:bg-neutral-700/60 dark:data-[twe-nav-active]:text-primary"
                            aria-selected="false">+ Add Item</a>
                    </li>
                </ul>
                <div class="mb-6 border border-gray-900/10">
                    <div class="hidden p-5 opacity-100 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
                        id="tabs-order-1" role="tabpanel" aria-labelledby="tabs-order-1-tab" data-twe-tab-active>
                        <div class="my-4 gap-x-4 grid grid-cols-2">
                            <div class="sm:col-span-1">
                                <label for="order-number"
                                    class="block text-sm font-medium leading-6 text-gray-900">Order
                                    number <span class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <input type="text" name="order_number" id="order-number"
                                        autocomplete="given-name" required
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        value="{{ old('order_number') }}">
                                    <x-input-error class="mt-2" :messages="$errors->get('order_number')" />
                                </div>
                            </div>
                            <div class="sm:col-span-1">
                                <label for="product-category"
                                    class="block text-sm font-medium leading-6 text-gray-900">Product Category<span
                                        class="text-red-500">*</span></label>
                                <div class="mt-2">
                                    <div class="flex flex-wrap gap-3 justify-start">

                                        @foreach ($productCategory as $category)
                                            <div class="mb-[0.125rem] me-4 inline-block min-h-[1.5rem] ps-[1.5rem]">
                                                <input
                                                    class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-primary dark:checked:bg-primary"
                                                    type="checkbox" id="{{ $category->name }}" name="product_category[]" value="{{ $category->id }}" />
                                                <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                    for="{{ $category->name }}">{{ $category->name }}</label>
                                            </div>
                                        @endforeach
                                        <!--Appliances-->
                                        

                                        <!--Electronics-->
                                        {{-- <div class="mb-[0.125rem] me-4 inline-block min-h-[1.5rem] ps-[1.5rem]">
                                            <input
                                                class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent disabled:opacity-60 rtl:float-right dark:border-neutral-400 dark:checked:border-primary dark:checked:bg-primary"
                                                type="checkbox" id="electronics" value="electronics" />
                                            <label class="inline-block ps-[0.15rem] hover:cursor-pointer"
                                                for="electronics">Electronics</label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Next</button>
                </div>
            </div>
        </div>
    </form>


    @push('styles')
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" /> --}}
    @endpush
    @push('scripts')
        <script>
            /**
                     * working but needs to finalize fields at the top
                    $("#add-more-item").click(function() {
                        let li = `
                    <li role="presentation">
                        <a href="#tabs-item-2"
                            class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-neutral-500 hover:isolate hover:border-transparent hover:bg-neutral-100 focus:isolate focus:border-transparent data-[twe-nav-active]:border-primary data-[twe-nav-active]:text-primary dark:text-white/50 dark:hover:bg-neutral-700/60 dark:data-[twe-nav-active]:text-primary"
                            data-twe-toggle="pill" data-twe-target="#tabs-item-2" data-twe-nav-active role="tab"
                            aria-controls="tabs-item-2" aria-selected="true">Item 1</a>
                    </li>`;

                        $(li).insertBefore($($("#add-more-item").parents('li')))

                        
                        let tab = `
                    <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[twe-tab-active]:block"
                        id="tabs-item-1" role="tabpanel" aria-labelledby="tabs-item-1-tab" data-twe-tab-active>
                        Tab 1 content
                    </div>
                `;

                    })
                    */
        </script>
    @endpush
</x-form-layout>
