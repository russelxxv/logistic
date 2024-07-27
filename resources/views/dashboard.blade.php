<x-admin-app-layout>
    <div class="flex flex-wrap">
        <div class="w-full mb-12 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    @session('export.done')
                        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-600">
                            <span class="text-xl inline-block mr-5 align-middle">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="inline-block align-middle mr-8">
                                <b class="capitalize">Export Done</b>
                            </span>
                            <button
                                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                                <span>×</span>
                            </button>
                        </div>
                    @endsession
                </div>
                <div class="block w-full overflow-x-auto h-full px-2">
                    <!-- Projects table -->
                    <table class="items-center w-full bg-transparent border-collapse" id="table-order">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center bg-blueGray-50 text-green-700 border-blueGray-100">
                                    <i class="fas fa-tools"></i>
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-green-700 border-blueGray-100">
                                    Status
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-green-700 border-blueGray-100">
                                    Order Number
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-green-700 border-blueGray-100">
                                    Customer
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-green-700 border-blueGray-100">
                                    Retailer Name
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-green-700 border-blueGray-100">
                                    Phone
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-green-700 border-blueGray-100">
                                    Email
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-green-700 border-blueGray-100">
                                    Address
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-green-700 border-blueGray-100">
                                    Reason for return
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-green-700 border-blueGray-100">
                                    Date Created
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_returns as $order)
                                <tr>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4 text-right">
                                        <a title="Edit" href="{{ route('manage-order-return.edit', ['id' => $order->id], false) }}" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700 hover:text-green-500">
                                            <i class="fa fa-pen hover:text-green-600"></i>
                                        </a>
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        @if ($order->status === 'New')
                                            <i class="fas fa-circle text-amber-400 mr-2"></i>
                                        @else
                                            <i class="fa fa-check-circle text-emerald-500 mr-2"></i>
                                        @endif
                                        {{ $order->status }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ $order->order_number }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ $order->customer->full_name }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ $order->customer->retailer_name ?? '' }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ $order->customer->phone }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ $order->customer->email }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ $order->customer->address->addressConventionName }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ $order->reason->reason }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-4">
                                        {{ $order->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <a href="{{ route('manage-order-return.export') }}"
                                class="bg-green-700 text-white active:bg-green-400 hover:bg-green-400 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                type="button">
                                <i class="fa fa-download"></i> Download
                            </a>
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

                $(document).on('click', '#btn-apply-filter', function() {
                    const filter_phone = $("#filter_phone").val()
                    const filter_status = $("#filter_status").val() ?? ''
                    let url = '{{ route('dashboard') }}'

                    url = `${url}?filter_phone=${filter_phone}&filter_status=${filter_status}`

                    window.location.href = url
                })

                $(document).ready(function() {
                    $("#table-order").DataTable();
                })
            </script>
        @endpush
</x-admin-app-layout>
