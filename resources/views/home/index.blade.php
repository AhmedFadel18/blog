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

    <title>Stand CSS Blog by TemplateMo</title>

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
    @endif
     <!-- Banner Starts Here -->
    @include('home.layouts.includes.head_content')
    <!-- Banner Ends Here -->
    <section class="blog-posts">
    @include('home.layouts.includes.main_content')
    @include('home.layouts.includes.sidebar')
    </div>
    </div>
    </section>


    @include('home.layouts.includes.footer')

    @include('home.layouts.includes.js')
    </div>
</body>

</html>
