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
            <a href="{{ route('admin.tags.create') }}" class="btn btn-primary float-right" >Add Tag</a>
            <h3>All Tags</h3>
        </div>
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Posts</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <th>{{ $tag->name }}</th>
                <td>
                    <a href="{{ route('admin.posts.show_tag_posts',$tag->id) }}">
                        {{ $tag->posts_count }}
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.tags.edit',$tag->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('admin.tags.delete',$tag->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</div>
@endsection

