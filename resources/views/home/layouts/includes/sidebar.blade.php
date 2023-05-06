<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <div class="col-lg-12">
                <form class="d-flex" action="{{ route('posts.search') }}" method="GET">
@csrf
                    <input class="form-control me-2" name="search" type="text" placeholder="Search" aria-label="Search">
                    <input class="btn btn-outline-dark" value="search" type="submit">
                  </form>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                    <h2>Recent Posts</h2>
                </div>
                <div class="content">
                    @foreach ($latest as $latest)
                        <ul>
                            <li><a href="{{ route('post.show', $latest->slug) }}">
                                    <h5>{{ $latest->title }}</h5>
                                    <span>{{ $latest->created_at }}</span>
                                </a></li>
                        </ul>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="sidebar-item tags">
                <div class="sidebar-heading">
                    <h2>Tags</h2>
                </div>
                <div class="content">
                    <ul>
                        @foreach ($tag as $tag)
                            <li><a href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
