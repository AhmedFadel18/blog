<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-stand-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
</head>

<body>
    <!-- Header -->
    @include('home.layouts.includes.header')
    <!-- Page Content -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>
    @endif <!-- Banner Starts Here -->
    <div class="main-banner header-text">
        <div class="container-fluid">
            <div class="owl-banner owl-carousel">
            </div>
        </div>
    </div>

    <!-- Banner Ends Here -->
    <section class="list-group">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @yield('content')
                </div>
            </div>
    </section>


    @include('home.layouts.includes.footer')

    @include('home.layouts.includes.js')
    </div>
</body>

</html>
