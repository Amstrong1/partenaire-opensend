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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
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

        <!-- Page Content -->
        <div class="w-full min-h-screen pt-16 md:pt-30 lg:pt-40 mb-0 dark:bg-gray-900">
            {{ $slot }}
            </main>

            <footer class="fixed bottom-0 w-full">
                @include('layouts.nav-bottom')
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

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
    
        function showBalance() {
            document.getElementById('view1').classList.add("hidden");
            document.getElementById('view2').classList.remove("hidden");
            document.getElementById('balance').classList.remove("hidden");
            document.getElementById('balancex').classList.add("hidden");
        }

        function hideBalance() {
            document.getElementById('view1').classList.remove("hidden");
            document.getElementById('view2').classList.add("hidden");
            document.getElementById('balance').classList.add("hidden");
            document.getElementById('balancex').classList.remove("hidden");
        }

        function checkPayment() {
            if (document.getElementById('payment_method').value == 'kkiapay') {
                // openKkiapayWidget({
                //     amount: document.getElementById('amount').value,
                //     position: "right",
                //     callback: "success",
                //     data: "",
                //     theme: "",
                //     sandbox: "true",
                //     key: "298dba30723511ec9f5205a1aca9c042"
                // })
                return false;
            }
            if (document.getElementById('payment_method').value == 'stripe') {
                return true;
            }
        }

        // function replace() {
        //     window.location.replace('/interac');
        // }

        function copy() {
            // Sélectionne le contenu de la div
            var uuid = document.getElementById('uuid');
            var selection = window.getSelection();
            var range = document.createRange();
            range.selectNodeContents(uuid);
            selection.removeAllRanges();
            selection.addRange(range);

            // Copie le contenu sélectionné dans le presse-papiers
            document.execCommand('copy');

            // Désélectionne le texte après la copie
            selection.removeAllRanges();
        }
    </script>
</body>

</html>
