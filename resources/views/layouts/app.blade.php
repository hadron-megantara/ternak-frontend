<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ternakin') }}</title>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="/img/icon/favicon.png" />

    <!-- CSS Core -->
        <link href="/css/font-awesome.min.css" rel="stylesheet" />
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/style.min.css" rel="stylesheet">
        <link href="/css/custom-style.css" rel="stylesheet">
    <!-- End CSS Core -->

    <!-- CSS Layout -->
        <link href="/css/header.css" rel="stylesheet">
        <link href="/css/footer.css" rel="stylesheet">
    <!-- End CSS Layout -->

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

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/plugins.min.js"></script>
    <script src="/js/main.min.js"></script>
</body>
</html>
