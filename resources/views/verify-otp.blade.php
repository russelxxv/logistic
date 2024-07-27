<x-guest-layout>

    <div class="w-full lg:w-4/12 px-4">
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">

            <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold uppercase">
                        We have sent an Email containing your OTP (One Time Pin) to verify your email address.
                    </h6>
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form method="POST" action="{{ route('verify.check-otp') }}">
                    @csrf
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            for="grid-password">OTP {{ Session::get('otp') }}</label>
                        <input type="text"
                            class="border-0 text-center px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            required autofocus name="otp"
                            placeholder="OTP" />
                        <x-input-error :messages="$errors->get('otp')" class="mt-2" />
                    </div>
                    <div class="flex flex-col text-center mt-6">
                        <button
                            class="bg-green-600 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150 hover:bg-green-500"
                            type="submit">
                            Verify OTP
                        </button>

                        <a href="{{ route('verify.resend-otp') }}" class="text-blue-400 background-transparent underline font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Resend OTP</a>

                        
                        {{-- <span class="text-xs font-semibold inline-block py-1 rounded text-red-600 mt-2">
                            Expires at <span id="time">00:01</span>
                          </span> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
@push('script')
    <script>
        $(document).ready(function() {
            $(`input[name="otp"]`).mask('#####', {
                translation: {
                    '#': {
                        pattern: /[0-9]/,
                        optional: true
                    }
                }
            });
        })
    </script>
@endpush
</x-guest-layout>
