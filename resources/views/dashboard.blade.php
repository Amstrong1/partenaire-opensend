<x-app-layout>
    <div class="sm:py-6 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white">
                    <div class="md:flex justify-between">
                        <h1 class="font-semibold text-lg m-1">
                            {{ __('TABLEAU DE BORD') }}
                        </h1>
                    </div>
                    <!-- Cards -->
                    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                        <!-- Card -->
                        <div class="flex p-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800 items-center">
                            <div class="w-10 h-10 p-2 mr-4 text-white bg-blue-100 rounded-full dark:text-white dark:bg-blue-500"
                                style="background-color: #0c3147">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>
                            </div>
                            <div class="flex justify-between w-full">
                                <div class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    <div id="balancex">Solde</div>
                                    <div id="balance" class="hidden">{{ "$ " . $balance }}</div>
                                </div>
                                <div class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    <svg id="view1" onclick="showBalance()" xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>

                                    <svg id="view2" onclick="hideBalance()" xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- Card -->
                        <a href="/uuid">
                            <div class="flex p-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800 items-center">
                                <div class="w-10 h-10 p-2 mr-4 text-white bg-blue-100 rounded-full dark:text-white dark:bg-blue-500"
                                    style="background-color: #0c3147">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        UUID
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                </div>
                            </div>
                        </a>

                        <!-- Card -->
                        <a href="#" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'topup-modal')">
                            <div class="flex p-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800 items-center">
                                <div class="w-10 h-10 p-2 mr-4 text-white bg-blue-100 rounded-full dark:text-white dark:bg-blue-500"
                                    style="background-color: #0c3147">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m-6 3.75 3 3m0 0 3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Recharger compte
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                </div>
                            </div>
                        </a>

                        <!-- Card -->
                        <a href="{{ route('transfert.create') }}">
                            <div class="flex p-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800 items-center">
                                <div class="w-10 h-10 p-2 mr-4 text-white bg-blue-100 rounded-full dark:text-white dark:bg-blue-500"
                                    style="background-color: #0c3147">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                                    </svg>
                                </div>

                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Effectuer un transfert
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                </div>
                            </div>
                        </a>

                        <!-- Card -->
                        <a href="{{ route('withdrawal.create') }}">
                            <div class="flex p-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800 items-center">
                                <div class="w-10 h-10 p-2 mr-4 text-white bg-blue-100 rounded-full dark:text-white dark:bg-blue-500"
                                    style="background-color: #0c3147">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                                    </svg>
                                </div>

                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Effectuer un retrait
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal class="m-4" name="topup-modal" :show="$errors->isNotEmpty()" focusable>
        <form id="topup" action="{{ route('stripeSession') }}" onsubmit="return checkPayment()" method="post">
            @csrf
            <div class="m-6">
                <x-input-label for="payment_method" value="{{ __('message.mPayment') }}"
                    class="text-gray-900 dark:text-gray-100" />

                <select name="payment_method" id="payment_method" required
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full p-2">
                    <option value="">{{ __('Choisir une méthode de paiement') }}</option>
                    <option value="stripe">{{ __('message.vCard') }}</option>
                    <option value="kkiapay">{{ __('Mobile Money') }}</option>
                    @if (Auth::user()->country === 'Canada')
                        <option value="interac">{{ __('Interac') }}</option>
                    @endif
                </select>

                <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
            </div>

            <div class="m-6">
                <x-input-label for="amount" value="{{ __('message.amount') . ' ' . Auth::user()->currency }}"
                    class="text-gray-900 dark:text-gray-100" />

                <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" required />

                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <div class="m-6 flex justify-end">
                <x-danger-button type="button" x-on:click="$dispatch('close')">
                    {{ __('message.cancel') }}
                </x-danger-button>

                <x-primary-button class="ms-3">
                    {{ __('message.confirm') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</x-app-layout>
