@extends('home.layouts.layout')
@section('title', 'Profile')
@section('content')


    <div class="body" style="padding: 25px">

            <h2 style="padding: 10px">User Information</h2>
                <ul>
                    <li>
                        <span>User Name : </span>
                        <h5>{{ Auth::user()->name }}</h5>
                    </li>
                    <li>
                        <span>Email Address :</span>
                        <h5>{{ Auth::user()->email }}</h5>
                    </li>
                    <li>
                        <span>Posts :</span>
                        <h5>{{ Auth::user()->post->count() }} Posts</h5>
                    </li>
                </ul>


    </div>

@endsection
