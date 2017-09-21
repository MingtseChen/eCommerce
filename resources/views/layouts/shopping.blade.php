<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<style>
    body {
        padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }

    .slide-image {
        width: 100%;
    }

    .carousel-holder {
        margin-bottom: 30px;
    }

    .carousel-control,
    .item {
        border-radius: 4px;
    }

    .caption {
        height: 130px;
        overflow: hidden;
    }

    .caption h4 {
        white-space: nowrap;
    }

    .thumbnail img {
        width: 100%;
    }

    .ratings {
        padding-right: 10px;
        padding-left: 10px;
        color: #d17581;
    }

    .thumbnail {
        padding: 0;
    }

    .thumbnail .caption-full {
        padding: 9px;
        color: #333;
    }

    footer {
        margin: 50px 0;
    }
</style>
<body>

@include('partial.nav')

@yield('content')

<script src="{{ asset('js/app.js') }}"></script>

</body>

</html>