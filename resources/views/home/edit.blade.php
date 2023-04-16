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
    @include('home.layouts.includes.header') <br> <br> <br> <br>

    <!-- Page Content -->
    <div style="background-color: rgb(239, 237, 237); padding-top: 10px;">
        <h2 class="text-center" style=" font-size: 30px; font-weight: 900;">Add New Post</h2>
   </div>

   <div class="container m-auto pt-3 pb-2 text-center">
    <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="pt-2 pb-2">
            <input class="form-control pt-2" type="text" name="title" value="{{ $post->title }}" id="title" placeholder="Enter title">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="pt-2 pb-2">
            <textarea class="form-control" name="description" id="description" placeholder="Enter your topic">{{ $post->description }}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="pt-2 pb-2 form-group">
            Choose tags for your post:
            @foreach ($tag_id as $tag)
            <label for="{{ $tag->name }}">[ {{ $tag->name }} </label>
            <input type="radio" class="form-group" id="{{ $tag->name }}" name="tag" value="{{ $post->tag_id }}"> ] ,
            @endforeach
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input">
              <label class="custom-file-label">Choose file</label>
            </div>
            @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
          </div>

          <button type="submit" class="btn btn-dark btn-lg ">Submit the post</button>
    </form>
   </div>

    @include('home.layouts.includes.footer')

    @include('home.layouts.includes.js')
</body>

</html>
