@extends('home.layouts.layout')
@section('title','Register')
@section('content')
<section>
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          {{-- <div class="card" style="border-radius: 1rem;"> --}}
            <div class="row g-0">

              {{-- <div class="col-md-6 col-lg-7 d-flex align-items-center"> --}}
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="{{ route('create_user') }}" method="POST">
                    @csrf
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div class="form-outline mb-4">
                      <input type="text" id="form2Example17" name="name" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">User name</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Email address</label>
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Password</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block"  type="submit">Submit</button>
                    </div>

                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a href="{{ route('login') }}"
                        style="color: #393f81;">Login here</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>

                </div>
              {{-- </div> --}}
            </div>
          {{-- </div> --}}
        </div>
      </div>
    </div>
  </section>
@endsection
