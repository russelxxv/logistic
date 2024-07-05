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
            <ul>
                @foreach ($errors->all() as $key => $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @session('order_return.created')
        <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
            </svg>
            <p>Return order created</p>
        </div>
    @endsession

    <div class="space-y-4">
        <form method="post" action="{{ route('order-return.store', [], false) }}" id="form-order-return">
            @csrf
            <div class="my-4 gap-x-4 gap-y-4 grid grid-cols-2">
                {{-- Start Order Number --}}
                <div class="sm:col-span-1 mb-2">
                    <label for="order-number" class="block text-sm font-medium leading-6 text-gray-900">Order No.: <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <input type="text" name="order_number" id="order-number" autocomplete="given-name" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            value="{{ old('order_number') }}">
                        <x-input-error class="mt-2" :messages="$errors->get('order_number')" />
                    </div>
                </div>
                {{-- End Order Number --}}
                {{-- Start Product Categories --}}
                <div class="sm:col-span-2 mb-2">
                    <label for="product-category" class="block text-sm font-medium leading-6 text-gray-900">Product
                        Category<span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <x-input-error class="mt-2" :messages="$errors->get('product_category')" />
                        <div class="grid grid-cols-3 gap-3">
                            @foreach ($productCategories as $category)
                                <div class="mb-[0.125rem] me-4 inline-block min-h-[1.5rem] ps-[1.5rem]">
                                    <input
                                        class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-primary dark:checked:bg-primary"
                                        type="checkbox" id="{{ $category->name }}" name="product_category[]"
                                        value="{{ $category->id }}"
                                        {{ old('product_category') && in_array($category->id, old('product_category')) ? 'checked' : '' }} />
                                    <label class="text-sm inline-block ps-[0.15rem] hover:cursor-pointer text-gray-600"
                                        for="{{ $category->name }}">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- End Product Categories --}}
                {{-- Start Items --}}
                <div class="sm:col-span-1 item-container sm:col-start-1" data-item_number="1">
                    <label for="order-number" class="block text-sm font-medium leading-6 text-gray-900">Item(s) number
                        <span class="text-red-500">*</span></label>
                    <div class="relative flex flex-wrap items-stretch">
                        <input type="text" name="item_number[]"
                            class="relative m-0 block flex-auto rounded-s border border-solid border-neutral-200 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-neutral-500 focus:z-[3] focus:border-primary focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:border-white/10 dark:text-white dark:placeholder:text-neutral-200 dark:autofill:shadow-autofill dark:focus:border-primary"
                            placeholder="Item number" aria-describedby="item_number_1"
                            value="{{ old('item_number') ? old('item_number')[0] : '' }}" pattern="[0-9]*" />
                    </div>
                </div>
                <div class="sm:col-span-1 mt-7" id="div-add-item">
                    <button type="button" id="btn-add-item"
                        class="text-end inline-block rounded pb-2 text-xs font-medium uppercase leading-normal text-primary hover:text-primary-600 focus:text-primary-600 focus:outline-none focus:ring-0 active:text-primary-700 motion-reduce:transition-none dark:text-secondary-600 dark:hover:text-secondary-500 dark:focus:text-secondary-500 dark:active:text-secondary-500">
                        + Add item
                    </button>
                </div>
                {{-- End Items --}}
                {{-- Start Return Reason --}}
                <div class="sm:col-span-1 sm:col-start-1">
                    <label for="return-reason" class="block text-sm font-medium leading-6 text-gray-900">Reason
                        <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                        <select id="return-reason" name="return_reason_id" required
                            class="w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option disabled selected>Select reason</option>
                            @foreach ($reasons as $reason)
                                <option value="{{ $reason->id }}">{{ $reason->reason }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- End Return Reason --}}
                {{-- Start Notes / Special Description --}}
                <div class="sm:col-span-2 sm:col-start-1">
                    <label for="order-number" class="block text-sm font-medium leading-6 text-gray-900">Other
                        Notes/Instructions</label>
                    <div class="relative flex sm:w-full md:w-[75%] flex-wrap items-stretch">
                        <textarea id="details" name="details" rows="4"
                            class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('details') }}</textarea>
                    </div>
                </div>
                {{-- /End Notes / Special Description --}}

                <div class="mt-6 flex items-center gap-x-6">
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>

                    <a href="{{ route('order-return.close') }}"
                        class="rounded-md bg-gray-300 px-3 py-2 text-sm font-semibold text-dark shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
                </div>
            </div>
            {{-- End Grid cols --}}
        </form>
    </div>
    {{-- End space div --}}

    @push('scripts')
        <script>
            $("#btn-add-item").click(function() {
                const itemOrders = $(".item-container");
                const itemOrderLength = itemOrders.length
                const targetElementAfter = $("#form-order-return").find(`div[data-item_number="1"]`)
                const idRandom = Math.floor((Math.random() * 100) + 1)

                let itemContainer = `
                    <div class="sm:col-span-1 sm:col-start-1 item-container" data-item_number="${idRandom}">
                        <div class="relative flex flex-wrap items-stretch">
                            <input type="text" name="item_number[]"
                                class="relative m-0 block flex-auto rounded-s border border-solid border-neutral-200 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-surface outline-none transition duration-200 ease-in-out placeholder:text-neutral-500 focus:z-[3] focus:border-primary focus:shadow-inset focus:outline-none motion-reduce:transition-none dark:border-white/10 dark:text-white dark:placeholder:text-neutral-200 dark:autofill:shadow-autofill dark:focus:border-primary"
                                placeholder="Item number" aria-describedby="item_number_${idRandom}" />
                            <span
                                class="flex items-center whitespace-nowrap rounded-e border border-s-0 border-solid border-neutral-200 px-3 py-[0.25rem] text-center text-base font-normal leading-[1.6] text-surface dark:border-white/10 dark:text-white text-red-500 cursor-pointer"
                                id="item_number_${idRandom}" onclick="deleteItem(this)">x</span>
                        </div>
                    </div>`;
                $(itemContainer).insertAfter(itemOrders.length === 1 ? $("#div-add-item") : itemOrders.last());
                $(`input[name="item_number[]"]`).mask('###############', {
                    translation: {
                        '#': {
                            pattern: /[0-9]/,
                            optional: true
                        }
                    }
                });
            });

            function deleteItem(el) {
                $($(el).parents('.item-container')).remove()
            }

            $(`input[name="item_number[]"], #order-number`).mask('###############', {
                translation: {
                    '#': {
                        pattern: /[0-9]/,
                        optional: true
                    }
                }
            });
        </script>
    @endpush
</x-form-layout>
