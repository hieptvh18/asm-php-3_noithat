@extends('layout.auth')
@section('page-title','Register')
@section('content')

<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">

                <div class="px-5 ms-xl-4">
                    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                    <a href="{{route('client.home')}}"><img src="{{asset('client/img/core-img/logo.png')}}" alt=""></a>                    </div>

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                  

                    <form action="{{route('register')}}" method="post" style="width: 23rem;">
                        @csrf
                        <h3 class="fw-normal mb-3 pb-3 mt-5" style="letter-spacing: 1px;">Register</h3>
                        <div class="form-outline mb-4">
                            <input type="text" id="" name="name" value="{{old('name')}}" class="form-control form-control-lg" />
                            <label class="form-label" for="form2Example18">Full name</label>
                            @error('name')
                                <small class="text-danger">{{$message}}</small>   
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" name="email" value="{{old('email')}}" id="form2Example18" class="form-control form-control-lg" />
                            <label class="form-label" for="form2Example18">Email address</label>
                            @error('email')
                            <small class="text-danger">{{$message}}</small>   
                        @enderror
                      
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example28" class="form-control form-control-lg" />
                            <label class="form-label" for="form2Example28">Password</label>
                            @error('password')
                            <small class="text-danger">{{$message}}</small>   
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" name="password_confirm" id="form2Example28" class="form-control form-control-lg" />
                            <label class="form-label" for="form2Example28">Password</label>
                            @if (session('msg-er'))
                            <div class="text-danger">{{session('msg-er')}}</div>
                        @endif
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit">Register</button>
                        </div>

                        <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                        <p>You have an account? <a href="{{route('login')}}" class="link-info">Login here</a></p>

                    </form>

                </div>

            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
                    alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</section>

@endsection