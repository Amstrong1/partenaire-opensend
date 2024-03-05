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
                        <a href="">
                            <div class="flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div class="w-10 h-10 p-2 mr-4 text-white bg-blue-100 rounded-full dark:text-white dark:bg-blue-500"
                                    style="background-color: #0c3147">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Solde : {{ $balance }}
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                    <hr>
                                </div>
                            </div>
                        </a>
                        <!-- Card -->
                        <a href="/uuid">
                            <div class="flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
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
                                    <hr>
                                </div>
                            </div>
                        </a>

                        <!-- Card -->
                        <a href="">
                            <div class="flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
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
                                    <hr>
                                </div>
                            </div>
                        </a>

                        <!-- Card -->
                        <a href="">
                            <div class="flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
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
                                    <hr>
                                </div>
                            </div>
                        </a>

                        <!-- Card -->
                        <a href="">
                            <div class="flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
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
                                    <hr>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
