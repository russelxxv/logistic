<x-admin-app-layout>
    <div class="flex flex-wrap mt-4">
        <div class="w-full px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Edit Customer Order Return
                        </h6>
                        @if (strtolower($order_return->status) != 'received')
                        <button id="btn-receive" data-order_id="{{ $order_return->id }}"
                            class="bg-amber-500 text-white hover:bg-amber-400 active:bg-amber-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                            type="button">
                            Received
                        </button>
                        @else
                            <span class="text-xs font-bold inline-block py-2 px-2 rounded-full text-amber-700 bg-amber-300 uppercase last:mr-0 mr-1  border-amber-700 border">
                                <i class="fas fa-check mr-1"></i> Received
                            </span>
                        @endif
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    @session('order.status')
                        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-amber-500">
                            <span class="text-xl inline-block mr-5 align-middle">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="inline-block align-middle mr-8">
                                <b class="capitalize">Received!</b>
                            </span>
                            <button
                                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                                <span>×</span>
                            </button>
                        </div>
                    @endsession
                    
                    {{-- start customer info --}}
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Customer Information
                    </h6>
                    @session('customer.updated')
                        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-amber-500">
                            <span class="text-xl inline-block mr-5 align-middle">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="inline-block align-middle mr-8">
                                <b class="capitalize">Updated</b> Customer information updated.
                            </span>
                            <button
                                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                                <span>×</span>
                            </button>
                        </div>
                    @endsession
                    <form name="customer_info" method="post"
                        action="{{ route('manage-customer.update', ['id' => $order_return->customer->id]) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $order_return->customer->id }}" name="id">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="first_name">
                                        First Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->first_name }}" name="first_name"
                                        id="first_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="last_name">
                                        Last Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        name="last_name" id="last_name"
                                        value="{{ $order_return->customer->last_name }}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="middle_name">
                                        Middle Name
                                    </label>
                                    <input type="text"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->middle_name }}" name="middle_name"
                                        id="middle_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="email">
                                        Email address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->email }}" name="email" id="email" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="phone">
                                        Phone
                                    </label>
                                    <input type="text" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->phone }}" name="phone" id="phone" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="retailer_name">
                                        Retailer name <span class="italic lowercase text-xs">(leave blank if not
                                            applicable)</span>
                                    </label>
                                    <input type="text"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->retailer_name }}" name="retailer_name"
                                        id="retailer_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('retailer_name')" />
                                </div>
                            </div>
                            <div class="w-full px-4 mt-1">
                                <button
                                    class="bg-amber-500 text-white block active:bg-amber-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-amber-300 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                    type="submit">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- end customer info --}}

                    <hr class="mt-6 border-b-1 border-blueGray-300" />

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Customer Address
                    </h6>
                    @session('customer_address.updated')
                        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-amber-500">
                            <span class="text-xl inline-block mr-5 align-middle">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="inline-block align-middle mr-8">
                                <b class="capitalize">Updated Address</b>
                            </span>
                            <button
                                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                                <span>×</span>
                            </button>
                        </div>
                    @endsession
                    <form name="customer_address" method="post"
                        action="{{ route('manage-customer.address-update', ['id' => $order_return->customer->id]) }}">
                        @csrf
                        @method('put')
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="address_line">
                                        Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="address_line" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->address->address_line ?? '' }}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('address_line')" />
                                </div>
                            </div>
                            <div class="w-full lg:w-3/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="country">
                                        Country <span class="text-red-500">*</span>
                                    </label>
                                    <select id="country" name="country" required
                                        class="block w-full rounded-md border-0 px-3 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-amber-600">
                                        <option selected disabled></option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ (old('country') && $country->id == old('country')) || $country->id == $order_return->customer->address->country_id ? 'selected' : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-3/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="state">
                                        State <span class="text-red-500">*</span>
                                    </label>
                                    <select id="state" name="state" required
                                        class="block w-full rounded-md border-0 px-3 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-amber-600">
                                        <option selected disabled></option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ $state->id == $order_return->customer->address->state_id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-3/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="city">
                                        City <span class="text-red-500">*</span>
                                    </label>
                                    <select id="city" name="city" required
                                        class="block w-full rounded-md border-0 px-3 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-amber-600">
                                        <option selected disabled></option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ $city->id == $order_return->customer->address->city_id ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-3/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="postal_code">
                                        Postal Code <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" id="postal_code" name="postal_code" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->address->postal_code }}" />
                                </div>
                            </div>

                            <div class="w-full px-4 mt-1">
                                <button
                                    class="bg-amber-500 text-white block active:bg-amber-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-amber-300 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                    type="submit">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr class="mt-6 border-b-1 border-blueGray-300" />

                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Order Return Details
                    </h6>
                    <form name="form_order_return" method="post"
                        action="{{ route('manage-order-return.update', ['id' => $order_return->id]) }}">
                        @csrf
                        @method('put')
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="order_number">
                                        Order No. <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" required
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->order_number }}" name="order_number"
                                        id="first_name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('order_number')" />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="product_category">Product Category <span class="text-red-500">*</span>
                                    </label>
                                    <x-input-error class="mt-2" :messages="$errors->get('product_category')" />
                                    <div class="grid grid-cols-3 gap-3">
                                        @foreach ($productCategories as $category)
                                            @php $isChecked = in_array($category->id, $selectedProducts) ? 'checked' :'' @endphp
                                            <div class="mb-[0.125rem] me-4 inline-block min-h-[1.5rem] ps-[1.5rem]">
                                                <input
                                                    class="relative float-left -ms-[1.5rem] me-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-secondary-500 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-checkbox before:shadow-transparent before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ms-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-black/60 focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-black/60 focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-checkbox checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ms-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent rtl:float-right dark:border-neutral-400 dark:checked:border-primary dark:checked:bg-primary"
                                                    type="checkbox" id="{{ $category->name }}"
                                                    name="product_category[]" value="{{ $category->id }}" {{ $isChecked }} />
                                                <label
                                                    class="text-sm inline-block ps-[0.15rem] hover:cursor-pointer text-gray-600"
                                                    for="{{ $category->name }}">{{ $category->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                    for="product_category">Order Items <span class="text-red-500">*</span></label>
                                <input type="text" name="item_number[]"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="New Item Number"
                                    value="" pattern="[0-9]*" />
                            </div>
                            <div class="w-full lg:w-6/12 px-4 mb-2">
                                <div class="mt-7 -ml-2" id="div-add-item">
                                    <button type="button" id="btn-add-item"
                                        class="bg-amber-500 text-white block active:bg-amber-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-amber-300 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                        <i class="fa fa-plus"></i> Add item
                                    </button>
                                </div>
                            </div>
                            @foreach ($order_return->returnItems as $return)
                                <div class="w-full lg:w-6/12 px-4 mt-2 item-container mb-2">
                                    <div class="relative flex w-full flex-wrap items-stretch mb-3">
                                        <input type="text" required value="{{ $return->item_number }}"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm shadow outline-none focus:outline-none focus:ring w-full pr-10"/>
                                        <span class="z-10 h-full leading-snug font-normal text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3 hover:cursor-pointer ">
                                        <i class="fas fa-times text-red-400 hover:text-red-600" title="Delete Order Item" onclick="deleteItem(this)"></i>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                            
                            <div class="w-full lg:w-6/12 px-4 mb-3">
                                <div class="relative w-full">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="return_reason_id">
                                        Reason <span class="text-red-500">*</span>
                                    </label>
                                    <select id="return_reason_id" name="return_reason_id" required
                                        class="block w-full rounded-md border-0 px-3 py-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-amber-600">
                                        <option selected disabled></option>
                                        @foreach ($reasonChoices as $reason)
                                            <option value="{{ $reason->id }}"
                                                {{ $reason->id == $order_return->order_return_reason_id ? 'selected' : '' }}>
                                                {{ $reason->reason }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-12/12 px-4 mt-2">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlFor="grid-password">
                                        Other Notes/Instructions <span class="text-red-500">*</span>
                                    </label>
                                    <textarea type="text" id="details" name="details"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        rows="4">{{ $order_return->details }}</textarea>
                                </div>
                            </div>
                            <div class="w-full px-4 mt-1">
                                <button
                                    class="bg-amber-500 text-white block active:bg-amber-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-amber-300 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                    type="submit">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript">
            $(document).on('click', '.view-details', function(e) {
                e.preventDefault()

                console.log('clicked');
            })

            $("#state").change(function() {
                $('#city').empty()
                const request = $.ajax({
                    url: '{{ route('cities.fetch', [], false) }}' + `?state_id=${$(this).val()}`,
                    type: 'get',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': app.data.csrf
                    },
                });

                request.done(function(data) {
                    let options = '';
                    const cities = data.data

                    cities.forEach(d => $('#city').append(`<option value='${d.id}'>${d.name}</option>`));
                })
            });

            // is retailer
            $("#is-retailer").change(function() {
                const val = $(this).prop('checked')

                if ($(this).prop('checked')) {
                    $("#div-retailer").removeClass('hidden')
                    $("#retailer-name").attr('required', true)
                } else {
                    $("#div-retailer").addClass('hidden')
                    $("#retailer-name").removeAttr('required')
                }
            })

            // receive
            $("#btn-receive").click(function() {
                const orderId = $(this).data('order_id');
                Swal.fire({
                    title: "Received this Item ?",
                    // text: "You won't be able to revert this!",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    showLoaderOnConfirm: true,
                    preConfirm: async (login) => {
                        try {
                            let url = app.data.appUrl
                            const urlEndPoint = `${url}manage-order-return/status/${orderId}`;
                            const form = document.createElement('form');
                            form.setAttribute('method', 'post');
                            form.setAttribute('action', urlEndPoint);

                            const inputMethod = document.createElement('input');
                            inputMethod.setAttribute('name', '_method');
                            inputMethod.value = 'PUT';

                            const inputCsrf = document.createElement('input');
                            inputCsrf.value = '{{ csrf_token() }}';
                            inputCsrf.setAttribute('name', '_token');

                            form.appendChild(inputMethod);
                            form.appendChild(inputCsrf);
                            $("body").append(form);
                            form.submit();
                        } catch (error) {
                            Swal.showValidationMessage(`Request failed: ${error}`);
                        }
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            })
            // end receive


            // Order Item
            function deleteItem(el) {
                const p = $(el).parents(".item-container");
                p.remove()
            }
        </script>
    @endpush
</x-admin-app-layout>
