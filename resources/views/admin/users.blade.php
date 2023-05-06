@extends('admin.dashboard')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="card-body">
                <h3>All Users</h3>
            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Posts</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('admin.posts.show_user_posts', $user->id) }}">
                                    {{ $user->post_count }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.make_admin', $user->id) }}" class="btn btn-warning btn-sm">Make
                                    Admin</a>
                                <a href="{{ route('admin.user.block', $user->id) }}" class="btn btn-danger btn-sm">Block</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        <div class="card-body">
            {!! $users->links() !!}
        </div>

        <div class="card-body">
            <h3>All Admins</h3>
        </div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Added By</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->added_by }}</td>
                        <td>
                            <a href="{{ route('admin.make_admin', $admin->id) }}" class="btn btn-warning btn-sm">Remove
                                Admin</a>
                            <a href="{{ route('admin.user.block', $admin->id) }}" class="btn btn-danger btn-sm">Block</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
@endsection
