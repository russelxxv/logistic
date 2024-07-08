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
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
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
                                        First Name
                                    </label>
                                    <input type="text"
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
                                        Last Name
                                    </label>
                                    <input type="text"
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
                                        Email address
                                    </label>
                                    <input type="email"
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
                                    <input type="text"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->phone }}" name="phone" id="phone" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="retailer_name">
                                        Retailer name
                                    </label>
                                    <input type="text"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->retailer_name }}" name="retailer_name" id="retailer_name" />
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
                                        Address
                                    </label>
                                    <input type="text" name="address_line"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        value="{{ $order_return->customer->address->address_line }}" />
                                    <x-input-error class="mt-2" :messages="$errors->get('address_line')" />
                                </div>
                            </div>
                            <div class="w-full lg:w-3/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        for="country">
                                        Country
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
                                        State
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
                                        City
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
                                        Postal Code
                                    </label>
                                    <input type="text" id="postal_code" name="postal_code"
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
                        About Me
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                    htmlFor="grid-password">
                                    About me
                                </label>
                                <textarea type="text"
                                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    rows="4">
                              A beautiful UI Kit and Admin for JavaScript & Tailwind CSS. It is Free
                              and Open Source.
                            </textarea>
                            </div>
                        </div>
                    </div>
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
        </script>
    @endpush
</x-admin-app-layout>
