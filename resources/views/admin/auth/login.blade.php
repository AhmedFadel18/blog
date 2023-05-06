@extends('home.layouts.layout')
@section('title', 'Login')
@section('content')
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="row g-0">

                        <div class="card-body p-4 p-lg-5 text-black">
                            @if (session()->has('fail'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                    {{ session()->get('fail') }}
                                </div>
                            @endif

                            <form action="{{ route('admin.login_user') }}" method="POST">
                                @csrf
                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                <div class="form-outline mb-4">
                                    <input type="email" id="form2Example17" name="email"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="form2Example17">Email address</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form2Example27"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="form2Example27">Password</label>
                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                </div>

                                <a class="small text-muted" href="{{ route('admin.show_forget_password') }}">Forgot
                                    password?</a>
                                <a href="#!" class="small text-muted">Terms of use.</a>
                                <a href="#!" class="small text-muted">Privacy policy</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
