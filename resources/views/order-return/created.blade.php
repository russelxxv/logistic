<x-form-layout>
    <x-slot name="header">
        <h4 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ config('app.name', 'Online Order Return System') }}
        </h4>
    </x-slot>

    <h2 class="text-xl font-semibold leading-7 text-gray-900 mb-10 text-center">Your return order is submitted!</h2>
    <h2 class="text-sm font-semibold leading-7 text-gray-600 mb-10 text-center">Do you want to create a new order return?</h2>


    <div class="mt-6 flex justify-center gap-x-6">
        <a href="{{ route('order-return.index') }}"
            class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
            New Return Order</a>
        
        <a href="{{ route('order-return.close') }}"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">No I'm Done</a>
    </div>
</x-form-layout>
