    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <div class="col-lg-12" style="padding-bottom: 15px;">
                            <a href="{{ route('post.create') }}"
                                style="color: #20232e; font-size: 18px; font-weight: 900;"
                                class="btn btn-secondary btn-lg btn-block">Add New Post</a>
                        </div>
                        @if (isset($posts) && $posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img style="height: 480px"
                                            src="{{ asset('assets/images/posts/' . $post->image) }}">
                                    </div>

                                    <div class="down-content">
                                        @foreach ($post->tags as $tags)
                                            <span>[{{ $tags->name }}]</span>
                                        @endforeach

                                        <a href="{{ route('post.show', $post->slug) }}">
                                            <h4>{{ $post->title }}</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="#">{{ $post->user->name }}</a></li>
                                            <li><a
                                                    href="{{ route('post.show', $post->slug) }}">{{ $post->created_at->format('d-m-Y') }}</a>
                                            </li>
                                            <span>{{ $post->comment_count }} comments</span>
                                        </ul>
                                        <p>{{ Illuminate\Support\Str::limit($post->description, 500) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <p>Post Not Found</p>
                        @endif
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="blog.html">View All Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
