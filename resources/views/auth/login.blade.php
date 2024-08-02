<x-guest-layout>

    <div class="w-full lg:w-4/12 px-4">
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold uppercase">
                        SIGN IN
                    </h6>
                </div>
                <div class="text-center">
                    <img src="{{ asset('assets/img/bz-logo.png') }}" class="object-cover h-28 w-96">
                    {{-- <h2 class="text-2xl leading-normal mt-0 mb-2 text-blueGray-600 font-bold">
                        {{ config('app.name') }}
                      </h2> --}}
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- Email --}}
                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            for="grid-password">Email</label>
                            <input type="email"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" :value="old('email')" required autofocus autocomplete="username" name="email" placeholder="Email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                            for="grid-password">Password</label><input type="password"
                            class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                            placeholder="Password" name="password" required autocomplete="current-password"/>
                    </div>
                    <div>
                        <label class="inline-flex items-center cursor-pointer"><input id="customCheckLogin"
                                type="checkbox" name="remember"
                                class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150" /><span
                                class="ml-2 text-sm font-semibold text-blueGray-600">Remember me</span></label>
                    </div>
                    <div class="text-center mt-6">
                        <button
                            class="bg-green-500 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                            type="submit">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>
