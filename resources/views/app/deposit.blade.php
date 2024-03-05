<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 m-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg mx-4 text-center">
            <div class="p-6 text-white">
                @if (count($deposits) > 0)
                    <table>
                        <thead>
                            <tr
                                class="text-left text-xs text-gray-500 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                                <th class="w-1/3 p-2">{{ __('message.amount') }}</th>
                                <th class="w-1/3 p-2">{{ __('message.hPayment') }}</th>
                                <th class="w-1/3 p-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deposits as $deposit)
                                <tr class="text-black text-start dark:text-white border-b border-gray-700">
                                    <td class="text-xs dark:text-white p-2">{{ $deposit->amount . ' USD' }}</td>
                                    <td class="text-xs dark:text-white p-2">{{ $deposit->payment_method }}</td>
                                    <td class="text-xs dark:text-white p-2">{{ $deposit->formatted_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <span class="dark:text-white">{{ __('message.empty') }}</span>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
