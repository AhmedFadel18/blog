@extends('admin.dashboard')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card-body">
                <form action="{{ route('admin.tags.update') }}" method="POST">
                    <div class="form-group">
                        @csrf
                        <label>Tag Name: </label>
                        <input type="text" name="name" value="{{ $tag->name }}">
                    </div>
                    <div class="form-group">
                        @csrf
                        <input type="submit" name="submit" value="Add Tag" class="btn btn-success">
                    </div>
                    </form>
            </div>
        </div>
    </div>
