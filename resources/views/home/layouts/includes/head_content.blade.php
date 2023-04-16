<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            @foreach ($post as $post)
                <div class="item">
                    <img style="height: 435px;" src="{{ asset('assets/images/posts/' . $post->image) }}" alt="">
                    <div class="item-content">
                        <div class="main-content">
                            <div class="meta-category">
                                <span>{{ $post->tag->name }}</span>
                            </div>
                            <a href="{{ route('post.show', $post->slug) }}">
                                <h4>{{ $post->title }}</h4>
                            </a>
                            <ul class="post-info">
                                <li><a href="#">{{ $post->user->name }}</a></li>
                                <li><a href="{{ route('post.show', $post->slug) }}">{{ date('d-m-y', strtotime($post->updated_at)) }}</a></li>
                                <li><a href="{{ route('post.show', $post->slug) }}">{{ $post->comment->count() }} Comments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
