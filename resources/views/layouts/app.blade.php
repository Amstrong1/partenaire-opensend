<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-700">
        <header class="fixed z-50 w-full bg-white text-white shadow dark:bg-gray-700">
            @include('layouts.navigation')
            <div class="mx-auto py-6 px-4 lg:px-8 hidden lg:block">
                <nav class="relative flex w-full items-center justify-between lg:justify-center py-2 text-neutral-600 dark:text-neutral-300 lg:flex-wrap"
                    data-te-navbar-ref>
                    <div class="px-2">
                        <div class="flex-grow basis-[100%] items-center lg:flex lg:basis-auto text-white"
                            id="navbarSupportedContentX" data-te-collapse-item>
                            @include('layouts.nav-top')
                        </div>
                    </div>
                </nav>
            </div>
        </header>


        <!-- Page Heading -->
        {{-- @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif --}}

        <!-- Page Content -->
        <div class="w-full min-h-screen pt-16 md:pt-30 lg:pt-40 mb-0 dark:bg-gray-900">
            {{ $slot }}
        </main>

        <footer class="fixed bottom-0 w-full">
            @include('layouts.nav-bottom')
        </footer>
    </div>


    <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
    <script>
        function openDropdown(event, dropdownID) {
            // let dropups = document.getElementsByClassName('dropup');
            let element = event.target;
            while (element.nodeName !== "BUTTON") {
                element = element.parentNode;
            }
            var popper = Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: 'top-end'
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
</body>

</html>
