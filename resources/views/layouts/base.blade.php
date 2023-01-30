<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('metatags')
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    @livewireStyles
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-227662341-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-227662341-1');
    </script>
    <title>@yield('title') | Magical Umbrella Pvt. Ltd</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-230152608-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-230152608-1');
    </script>
</head>

<body>
    <x-nav-bar />
    <main>
        <div class="space-20"></div>
        <div class="space-20 mobile-hide"></div>
        @yield('content')
    </main>
    <x-footer />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>

    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
</body>

</html>
