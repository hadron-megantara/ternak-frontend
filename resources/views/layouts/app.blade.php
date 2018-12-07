<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KangKoding') }}</title>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="/img/icon/icon.png"/>

    <!-- CSS Core -->
        <link href="/css/font-awesome.min.css" rel="stylesheet" />
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/core.css" rel="stylesheet">
    <!-- End CSS Core -->

    <!-- CSS Layout -->
        <link href="/css/header.css" rel="stylesheet">
        <link href="/css/footer.css" rel="stylesheet">
    <!-- End CSS Layout -->

    <!-- CSS Custom -->
        <link href="/css/shortcode/shortcodes.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="/css/responsive.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
    <!-- End CSS Custom -->

    <!-- CSS Plugins -->
        <link href="/css/jquery-ui.min.css" rel="stylesheet">
        <link href="/css/magnific-popup.css" rel="stylesheet">
        <link href="/css/nivo-slider.css" rel="stylesheet">
        <link href="/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="/css/style-customizer.css" rel="stylesheet">
        <link href="/css/login.css" rel="stylesheet">
    <!-- End CSS Plugins -->

    <!-- JS Template -->
        <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- End JS Template -->

    <script src="/js/jquery-1.12.4.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jquery.priceformat.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>
    <script src="/js/spin.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="body">
    @include('includes.header')
    @yield('content')
    @include('includes.footer')

    <script src="/js/infinite-scroll.pkgd.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/ajax-mail.js"></script>
    <script src="/js/headroom.min.js"></script>
    <script src="/js/jquery.nivo.slider.pack.js"></script>
    <script src="/js/moment-with-locales.js"></script>
    <script src="/js/style-customizer.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>
