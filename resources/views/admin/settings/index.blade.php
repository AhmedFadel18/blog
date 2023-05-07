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
            <div class="container-fluid">
                <h6>Blog Name:</h6>
                <span>{{ $data->blog_name }}</span>
            </div>
            <div class="container-fluid p-3">
                <h6>Blog Name:</h6>
                <span>{{ $data->owner }}</span>
            </div>
            <div class="container-fluid">
                <h6>Blog Name:</h6>
                <span>{{ $data->description }}</span>
            </div>
            <div class="container-fluid">
<a href="{{ route('admin.settings.edit') }}" class="btn btn-primary">Edit Settings</a>            </div>
        </div>
    </div>
@endsection
