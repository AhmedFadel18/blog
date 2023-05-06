@extends('home.layouts.layout')
@section('title', $tag->name)
@section('content')

    <div class="heading-page header-text">
        <div class="container">
            <section class="page-heading col-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>{{ $tag->name }}</h4>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    <!-- Banner Ends Here -->
    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="down-content">
                                        @foreach ($post as $post)
                                            <div class="col-lg-12">
                                                <div class="blog-post">
                                                    <div class="blog-thumb">
                                                        <img style="height: 480px"
                                                            src="{{ asset('assets/images/posts/' . $post->image) }}"
                                                            alt="">
                                                    </div>

                                                    <div class="down-content">
                                                        @foreach ($post->tags as $tags)
                                                        <span>{{ $tags->name }}</span>
                                                        @endforeach
                                                        <a href="{{ route('post.show', $post->slug) }}">
                                                            <h4>{{ $post->title }}</h4>
                                                        </a>
                                                        <ul class="post-info">
                                                            <li><a href="#">{{ $post->user->name }}</a></li>
                                                            <li><a
                                                                    href="{{ route('post.show', $post->slug) }}">{{ $post->created_at->format('d-m-Y') }}</a>
                                                            </li>
                                                            <span>{{ $post->comment_count }} Comments</span>
                                                        </ul>
                                                        <p>{{ Illuminate\Support\Str::limit($post->description, 500) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
