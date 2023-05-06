@extends('admin.dashboard')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="blog-post">
               <h3> {{ $post->title }}</h3>
            </div>
            <div class="blog-post">
                <img style="height: 240px"
                src="{{ asset('assets/images/posts/' . $post->image) }}">
            </div>
            <div class="blog-post">
               <h6 > {{ $post->user->name }}</h6>
            </div>
            <div class="blog-post">
               <h6> {{ $post->created_at }}</h6>
            </div>
            <div class="blog-post">
               <p style="padding: 10px"> {{ $post->description }}</p>
            </div>
        </div>
    </div>
@endsection
