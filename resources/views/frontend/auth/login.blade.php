@extends('layouts.frontend.app')
@section('content')
<body>
    <main class="main">
        <div class="box-content-full">
            <section class="section-box box-login-page">
                <div class="container">
                    <h5 class="neutral-1000 mb-30">Welcome Back! </h5>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="box-login-form">
                                <div class="box-button-logins"> <a class="btn btn-login btn-google mr-10"
                                        href="#"><img src="{{asset('assets/imgs/page/profile/google.svg')}}"
                                            alt="Travila"><span class="text-sm-bold">Sign in with Google</span></a><a
                                        class="btn btn-login mr-10" href="#"><img
                                            src="{{asset('assets/imgs/page/profile/facebook.svg')}}" alt="Travila"></a><a
                                        class="btn btn-login" href="#"><img
                                            src="{{asset('assets/imgs/page/profile/apple.svg')}}" alt="Travila"></a></div>
                                <div class="form-login">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-sm-medium">Email</label>
                                            <input class="form-control username" type="text" name="email"
                                                placeholder="Email">
                                                @error('email')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-sm-medium">Password</label>
                                            <input class="form-control password" name="password" type="password"
                                                placeholder="">
                                                @error('password')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="box-remember-forgot">
                                                <div class="remeber-me">
                                                    <div class="text-xs-medium neutral-500">
                                                        <input class="cb-remember" type="checkbox">Remember me
                                                    </div>
                                                </div>
                                                <div class="forgotpass"> <a class="text-xs-medium neutral-500"
                                                        href="#">Forgot password?</a></div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-45 mb-30">
                                          <button class="btn btn-black-lg" type="submit">
                                              Login
                                              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round"></path>
                                              </svg>
                                          </button>
                                      </div>
                                        <p class="text-sm-medium neutral-500">Don’t have an account? <a
                                                class="neutral-1000 btn-signup" href="{{route('register')}}">Register Here !</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 text-center text-lg-end"><img src="{{asset('assets/imgs/page/profile/img-login.png')}}"
                                alt="Travilla"></div>
                    </div>
                </div>
            </section>
            <footer class="footer mt-20 background-body">
                <div class="container">
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-25 text-center text-md-start">
                                <p class="text-xs-medium neutral-500">© 2024 <a class="neutral-1000"
                                        href="#">Travila </a><span>Inc. All rights reserved.</span></p>
                            </div>
                            <div class="col-md-6 col-sm-12 text-center text-md-end mb-25">
                                <ul class="menu-footer">
                                    <li><a href="#">Terms</a></li>
                                    <li><a href="#">Privacy policy</a></li>
                                    <li><a href="#">Legal notice</a></li>
                                    <li><a href="#">Accessibility</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
@stop
