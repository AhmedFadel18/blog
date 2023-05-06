@extends('home.layouts.layout')
@section('title', $post->title)
@section('content')

    <div class="heading-page header-text">
        <div class="container">
            <section class="page-heading col-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>{{ $post->title }}</h4>
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
                                        @foreach ($post->tags as $tags)
                                            <span>[{{ $tags->name }}]</span>
                                        @endforeach
                                        <h4>{{ $post->title }}</h4></a>
                                        <ul class="post-info">
                                            <li><a href="#">{{ $post->user->name }}</a></li>
                                            <li>{{ $post->created_at->format('d-m-Y') }}</a></li>
                                            <li><span> {{ $commentsCount }} Comments</span></li>
                                        </ul>
                                        <p>{{ $post->description }}</p>
                                        @if (Auth::user() && Auth::user()->id == $post->user_id)
                                            <div class="container">
                                                <div class="col-6">
                                                    <a href="{{ route('post.edit', $post->id) }}"
                                                        class="btn btn-block btn-dark">Edit Post</a>
                                                </div>
                                                <div class="col-3 pt-2">
                                                    <a href="{{ route('post.delete', $post->id) }}"
                                                        class="btn btn-block btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Start Comments --}}
                        <div class="sidebar-heading">
                            <h2>{{ $commentsCount }} comments</h2>
                        </div>
                        @foreach ($comment as $comment)
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <div class="right-content">
                                                    <h4>{{ $comment->user->name }}<span>{{ $comment->created_at }}</span>
                                                    </h4>
                                                    <p>{{ $comment->comment_body }}</p>
                                                    @if (Auth::user() && Auth::user()->id)
                                                        <a href="{{ route('comment.delete', $comment->id) }} "
                                                            class="btn btn-danger btn-sm">Delete Comment</a>
                                                    @endif
                                                </div>

                                                @foreach ($comment->reply as $reply)
                                            <li class="replied">
                                                <div class="right-content">
                                                    <h4>{{ $reply->user->name }}<span>{{ $reply->created_at }}</span>
                                                    </h4>
                                                    <p>{{ $reply->reply_body }}</p>
                                                    @if (Auth::user() && Auth::user()->id)
                                                        <a href="{{ route('reply.delete', $reply->id) }} "
                                                            class="btn btn-danger btn-sm">Delete Reply</a>
                                                    @endif
                        @endforeach
                        <div class="sidebar-item submit-comment">
                            <form action="{{ route('reply.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="commentId" value="{{ $comment->id }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <textarea name="reply_body" id="reply_body" placeholder="Type your reply" required=""></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-12">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="main-button">Submit</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </li>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-lg-12">
            <div class="sidebar-item submit-comment">
                <div class="sidebar-heading">
                    <h2>Your comment</h2>
                </div>
                <div class="content">
                    <form id="comment" action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="postId" value="{{ $post->id }}">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="comment_body" id="comment_body" placeholder="Type your comment" required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button">Submit</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Comments  --}}
        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
