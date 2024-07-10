<x-form-layout>
    @push('styles')
        <style>
            .iti.iti--allow-dropdown {
                width: 100% !important;
            }
        </style>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ config('app.name', 'Online Order Return System') }}
        </h2>
    </x-slot>

    <h2 class="text-xl font-semibold leading-7 text-gray-900 mb-10 text-center">Customer Details</h2>

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
            <div class="border-b border-gray-900/10 pb-12 pt-3">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-2">
                        <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First
                            Name <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="text" name="first_name" id="first-name" autocomplete="given-name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                value="{{ old('first_name') }}">
                            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last
                            Name <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="text" name="last_name" id="last-name" autocomplete="family-name" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                value="{{ old('last_name') }}">
                            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="middle-name" class="block text-sm font-medium leading-6 text-gray-900">Middle
                            Name</label>
                        <div class="mt-2">
                            <input type="text" name="middle_name" id="middle-name" autocomplete="family-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                value="{{ old('middle_name') }}">
                            <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                            Address <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                value="{{ old('email') }}">
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone <span
                                class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input id="phone" name="phone" type="tel" autocomplete="phone" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                value="{{ old('phone') }}">
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>
                    </div>

                    <h2 class="text-base font-semibold leading-7 text-gray-900">Address</h2>
                    <div class="col-span-full">
                        <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street /
                            Address Line <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="text" name="address_line" id="street-address" required
                                autocomplete="street-address" value="{{ old('address_line') }}"
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
                                    <option value="{{ $country->id }}"
                                        {{ old('country') && $country->id == old('country') ? 'selected' : '' }}>
                                        {{ $country->name }}</option>
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
                            Postal Code <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="text" name="postal_code" id="postal-code" autocomplete="postal-code"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
                        </div>
                    </div>

                    <div class="sm:col-span-2 sm:col-start-1 pt-6">
                        <input type="checkbox" name="is_retailer" id="is-retailer">
                        <label for="is-retailer"
                            class="inline-block text-sm font-medium leading-6 text-gray-900 hover:cursor-pointer">Are
                            You A Retailer?</label>
                        <x-input-error class="mt-2" :messages="$errors->get('is_retailer')" />
                    </div>
                    <div class="sm:col-span-2 hidden" id="div-retailer">
                        <label for="retailer-name" class="block text-sm font-medium leading-6 text-gray-900">Retailer
                            Name <span class="text-red-500">*</span></label>
                        <div class="mt-2">
                            <input type="text" name="retailer_name" id="retailer-name"
                                autocomplete="retailer-name"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                placeholder="Retailer name">
                            <x-input-error class="mt-2" :messages="$errors->get('retailer_name')" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-x-6">
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

            var phoneInput = document.querySelector("#phone")
            window.intlTelInput(phoneInput, ({
                onlyCountries: ['us', 'ph'],
                separateDialCode: true,
            }));

            phoneInput.addEventListener('countrychange', function(e) {
                // console.log($(phoneInput).val(), e.target.value,e)
                var countryData = $("#phone").intlTelInput("getSelectedCountryData");
                console.log(countryData)
            })
        </script>
    @endpush
</x-form-layout>
