<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Returned Order List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-900">
                    <table id="example" class="display table table-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Phone No.</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Reason for return</th>
                                <th>Date created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_returns as $order)
                                <tr>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->customer->full_name }}</td>
                                    <td>Nothing follows</td>
                                    <td>{{ $order->customer->phone }}</td>
                                    <td>{{ $order->customer->email }}</td>
                                    <td>complex</td>
                                    <td>{{ $order->reason->reason }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>View</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        new DataTable('#example');
    </script>
</x-app-layout>
