<x-form-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ config('app.name', 'Online Order Return System') }}
        </h2>
    </x-slot>

    <h2 class="text-xl font-semibold leading-7 text-gray-900 mb-10 text-center">Customer Details / Retailer</h2>

    @if ($errors->any())
        <div class="alert alert-default text-danger">
            @foreach ($errors->all() as $error)
                <x-input-error class="mt-2" :messages="$error" />
            @endforeach
        </div>
    @endif

    <form method="post" action="{{ route('customer.store', [], false) }}">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First
                            name <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="text" name="first_name" id="first-name" autocomplete="given-name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last
                            name <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="text" name="last_name" id="last-name" autocomplete="family-name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="middle-name" class="block text-sm font-medium leading-6 text-gray-900">Middle
                            name</label>
                        <div class="mt-2">
                            <input type="text" name="middle_name" id="middle-name" autocomplete="family-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            address <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone <span
                                class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input id="phone" name="phone" type="text" autocomplete="phone" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                    </div>

                    <h2 class="text-base font-semibold leading-7 text-gray-900">Address</h2>
                    <div class="col-span-full">
                        <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street /
                            Address line <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="text" name="address_line" id="street-address" required
                                autocomplete="street-address"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <x-input-error class="mt-2" :messages="$errors->get('address_line')" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country <span
                                class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <select id="country" name="country" autocomplete="country-name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option selected disabled></option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('country')" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State <span
                                class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <select id="state" name="state_id" autocomplete="state-name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option selected disabled></option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('state_id')" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City <span
                                class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <select id="city" name="city_id" autocomplete="city-name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('city_id')" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">ZIP /
                            Postal code <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="text" name="postal_code" id="postal-code" autocomplete="postal-code"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1">
                        <label for="retailer-name" class="block text-sm font-medium leading-6 text-gray-900">Retailer name</label>
                        <div class="mt-2">
                            <input type="text" name="retailer_name" id="retailer-name" autocomplete="retailer-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Retailer name">
                            <x-input-error class="mt-2" :messages="$errors->get('retailer_name')" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <input type="checkbox" name="is_retailer" id="is-retailer">
                        <label for="is-retailer"
                            class="inline-block text-sm font-medium leading-6 text-gray-900 hover:cursor-pointer">Are
                            you a retailer?</label>
                        <x-input-error class="mt-2" :messages="$errors->get('is_retailer')" />
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Next</button>
        </div>
    </form>


    @push('scripts')
        <script>
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

                    cities.forEach(d => {
                        $('#city').append(`<option value='${d.id}'>${d.name}</option>`)
                    });
                })
            });
        </script>
    @endpush
</x-form-layout>
