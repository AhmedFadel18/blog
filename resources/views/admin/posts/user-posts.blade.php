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
                <h3>{{ $user->name }} Posts</h3>
            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                            <a href="{{ route('admin.post.show',$post->id) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                            <td>{{ $post->created_at }}</td>
                            @if ($post->status==0)
                            <td style="color: goldenrod">Pending</td>
                            @else
                            <td>Published</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
