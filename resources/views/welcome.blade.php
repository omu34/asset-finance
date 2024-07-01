<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>kplc newsroom</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    @vite('resources/css/app.css')
    @vite('resources/css/custom.css')
</head>



<body class="antialiased" x-cloak x-data="{ darkMode: $persist(false), zoomLevel: $persist(100), siteGrayscale: $persist(false) }" :class="{ 'dark': darkMode === true }"
    :style="'zoom: ' + zoomLevel + '%'">

    {{--  <livewire:banner />  --}}
    @livewire('banner')

    <livewire:featured-items />
    <livewire:latest-videos />
    <livewire:latest-news />
    <livewire:latest-gallery />
    @livewire('tags')
    {{--  @livewire('search.search')  --}}
    <livewire:footer />

    <template x-if="siteGrayscale">
        <style>
            img {
                filter: grayscale(100%) !Important;
            }
        </style>
    </template>

    <style>
        @font-face {
            font-family: Hilmar;
            /* src: url('/public/fonts/hilmar.tff'); */
            src: url('/hilmar.tff')');
 font-weight: bold;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: Hilmar !important;
        }
    </style>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>



</html>
