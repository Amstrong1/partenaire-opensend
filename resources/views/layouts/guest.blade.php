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
    @laravelPWA
</head>

<body class="font-sans antialiased ease-in-out motion-reduce:transition-none bg-left-top bg-cover bg-no-repeat"
    style="background-image: url('https://cdn.pixabay.com/photo/2024/01/12/20/58/business-8504711_1280.jpg')">
    
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0" style="background-color: rgba(0, 0, 0, 0.4)">
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            {{ $slot }}
        </div>
    </div>

    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                document.getElementById('view1').classList.add("hidden");
                document.getElementById('view2').classList.remove("hidden");

                if (document.getElementById('password_confirmation') !== null) {
                    document.getElementById('password_confirmation').type = "text";
                }
            } else {
                x.type = "password";
                document.getElementById('view1').classList.remove("hidden");
                document.getElementById('view2').classList.add("hidden");

                if (document.getElementById('password_confirmation') !== null) {
                    document.getElementById('password_confirmation').type = "password";
                }
            }
        }
    </script>
</body>

</html>
