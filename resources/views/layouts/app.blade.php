<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kenya Power PLC</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
    @livewireStyles
    {{--  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>  --}}
</head>
<body class="font-sans antialiased" x-cloak x-data="{ darkMode: $persist(false), zoomLevel: $persist(100), siteGrayscale: $persist(false) }" :class="{ 'dark': darkMode === true }"
    :style="'zoom: ' + zoomLevel + '%'">
    {{--  <x-banner />  --}}

    <div class="bg-white dark:bg-slate-950 flex flex-col" x-data="scrollHandler()">

        <template x-if="siteGrayscale">
            <style>
                img {
                    filter: grayscale(100%);
                }
            </style>
        </template>

        <!-- Page Content -->
        <div class="lg:ml-0 lg:mr-0 md:ml-4 ml-4 md:mr-4 mr-4 sm:ml-4 sm:mr-4">
            @yield('content')
        </div>

        <div class="">
            <!-- Page footer -->
            {{--  @include('bandari.footer')  --}}
        </div>
    </div>

    <!-- Add your JS scripts or links here -->


    {{--  @stack('modals')  --}}

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
        AOS.init();
    </script>

</body>




</html>
