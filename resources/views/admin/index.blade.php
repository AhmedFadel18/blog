@extends('admin.dashboard')
@section('content')
    <div class="container-fluid page-body-wrapper">
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">{{ $users }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success ">
                                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">All Users</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="d-flex align-items-center align-self-start">
                                            <h3 class="mb-0">{{ $posts }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="icon icon-box-success ">
                                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-muted font-weight-normal">All Posts</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between">

                                <h4 class="card-title mb-1">Most Pobular Posts</h4>
                                <p class="text-muted mb-1"></p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="preview-list">
                                        <div class="preview-item border-bottom">
                                            <div class="preview-thumbnail">
                                                <div class="preview-icon bg-primary">
                                                    <i class="mdi mdi-file-document"></i>
                                                </div>
                                            </div>
                                            <div class="preview-item-content d-sm-flex flex-grow">
                                                @foreach ($popularPosts as $post)
                                                <div class="flex-grow">
                                                    <h6 class="preview-subject">{{ $post->title }}</h6>
                                                    <p class="text-muted mb-0">{{ $post->user->name }}</p>
                                                </div>
                                                <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                    <p class="text-muted">{{ $post->updated_at->format('d-m-Y') }}</p>
                                                    <p class="text-muted mb-0">{{ $post->comment_count }}</p>
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

            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Most Active Users</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> User Name </th>
                                            <th> All Posts </th>
                                            <th> All Comments </th>
                                            <th> Last Post </th>
                                            <th> Joined Date </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $activeUsers as $user )
                                        <tr>

                                            <td>
                                                <span class="pl-2">{{ $user->name }}</span>
                                            </td>
                                            <td> {{ $user->post_count }} </td>
                                            <td> {{ $user->comment_count }} </td>
                                            @foreach ($user->post->take(1) as $post)
                                            <td> {{ $post->created_at->format('d-m-Y') }} </td>
                                            @endforeach
                                            <td> {{ $user->created_at->format('d-m-Y') }} </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->

        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
@endsection
