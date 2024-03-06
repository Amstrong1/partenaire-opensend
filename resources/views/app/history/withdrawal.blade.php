<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 m-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg mx-4 text-center">
            <div class="p-6 text-white">
                @if (count($withdrawals) > 0)
                    <table>
                        <thead>
                            <tr
                                class="text-left text-xs text-gray-500 uppercase bg-gray-50 dark:bg-gray-900 dark:text-gray-400">
                                <th class="w-1/3 p-2">{{ __('message.amount') }}</th>
                                <th class="w-1/3 p-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdrawals as $withdrawal)
                                <tr>
                                    <td class="text-xs dark:text-white p-2">
                                        {{ $withdrawal->amount . ' ' . $withdrawal->currency }}</td>
                                    <td class="text-xs dark:text-white p-2">{{ $withdrawal->formatted_date }}</td>
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
