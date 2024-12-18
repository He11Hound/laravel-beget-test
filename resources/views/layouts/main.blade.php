<!doctype html>
<html lang="en">
<head>
    <title>Блог Данича</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="/wordify-master/css/bootstrap.css">
    <link rel="stylesheet" href="/wordify-master/css/animate.css">
    <link rel="stylesheet" href="/wordify-master/css/owl.carousel.min.css">

    <link rel="stylesheet" href="/wordify-master/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/wordify-master/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/wordify-master/fonts/flaticon/font/flaticon.css">
    <!-- Theme Style -->
    <link rel="stylesheet" href="/wordify-master/css/style.css">
</head>
<body>

<div class="wrap">
    @include('blocks.header')

    <section class="site-section pt-5">
        <div class="container">
            @yield('content')
        </div>
    </section>

    @include('blocks.footer')
</div>

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

<script src="/wordify-master/js/jquery-3.2.1.min.js"></script>
<script src="/wordify-master/js/jquery-migrate-3.0.0.js"></script>
<script src="/wordify-master/js/popper.min.js"></script>
<script src="/wordify-master/js/bootstrap.min.js"></script>
<script src="/wordify-master/js/owl.carousel.min.js"></script>
<script src="/wordify-master/js/jquery.waypoints.min.js"></script>
<script src="/wordify-master/js/jquery.stellar.min.js"></script>


<script src="/wordify-master/js/main.js"></script>
</body>
</html>
