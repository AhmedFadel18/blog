@extends('home.layouts.layout')
@section('title','All Posts')
@section('content')
        <div class="col-lg-8">
            <div class="all-blog-posts">
                    @foreach ($post as $post)
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img style="height: 480px" src="{{ asset('assets/images/posts/'.$post->image) }}" alt="">
                                </div>
                                <div class="down-content">
                                    <span>{{ $post->tag->name }}</span>
                                    <a href="{{ route('post.show', $post->slug) }}">
                                        <h4>{{ $post->title }}</h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="#">{{ $post->user->name }}</a></li>
                                        <li><a href="{{ route('post.show', $post->slug) }}">{{ $post->created_at->format('d-m-Y')  }}</a></li>
                                        <span>{{ $post->comment->count() }} Comments</span>
                                    </ul>
                                    <p>{{ $post->title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
