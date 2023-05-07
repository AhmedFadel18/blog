@extends('admin.dashboard')
@section('content')
    <div class="main-panel">settings
        <div class="content-wrapper">
   
            <div class="card-body">
                <h3>Blog Settings</h3>
            </div>
            <form action="{{ route('admin.settings.update', $settings->id) }}" method="POST">
                @csrf
                <div class="form-group col-md-3">
                    <label>
                        <h6>Blog Name:</h6>
                    </label>
                    <input type="text" value="{{ $settings->blog_name }}" name="blog_name">
                </div>
                <div class="form-group col-md-3">
                    <label>
                        <h6>Owner Name:</h6>
                    </label>
                    <input type="text" value="{{ $settings->owner }}" name="owner">
                </div>
                <div class="form-group col-md-3">
                    <label>
                        <h6>Blog Description:</h6>
                    </label>
                    <input type="text" value="{{ $settings->description }}" name="description">
                </div>
                <div class="form-group pl-4">
                    <input type="submit" name="Update" class="btn btn-success  col-md-2">
                </div>
            </form>
        </div>
    </div>
@endsection
