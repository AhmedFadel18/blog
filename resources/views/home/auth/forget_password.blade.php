@extends('home.layouts.layout')
@section('title','Login')
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

                  <form action="{{ route('submit_forget_password') }}" method="POST">
                    @csrf
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Reset Password</h5>

                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Email address</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block"  type="submit">Send Reset Password Link</button>
                    </div>

                  </form>

                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
