@extends('layouts.frontend.app')
@section('content')
<body>
    <main class="main">
        <div class="box-content-full">
            <section class="section-box box-login-page">
                <div class="container">
                    <h5 class="neutral-1000 mb-30">Create New Account</h5>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="box-button-logins"> <a class="btn btn-login btn-google mr-10"
                                    href="#"><img src="{{ asset('assets/imgs/page/profile/google.svg')}}" alt="Travila"><span
                                        class="text-sm-bold">Sign up with Google</span></a><a
                                    class="btn btn-login mr-10" href="#"><img
                                        src="{{ asset('assets/imgs/page/profile/facebook.svg')}}" alt="Travila"></a><a
                                    class="btn btn-login" href="#"><img src="{{ asset('assets/imgs/page/profile/apple.svg')}}"
                                        alt="Travila"></a></div>
                            <div class="form-login">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="text-sm-medium">Name *</label>
                                        <input class="form-control username" name="name" type="text"
                                            placeholder="Name">
                                        @error('name')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="text-sm-medium">Username *</label>
                                        <input class="form-control username" name="username" type="text"
                                            placeholder="Username">
                                        @error('username')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="text-sm-medium">Your email *</label>
                                        <input class="form-control email" type="text" name="email"
                                            placeholder="Email">
                                        @error('email')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-sm-medium">Password *</label>
                                                <input class="form-control password" name="password" type="password"
                                                    placeholder="***********">
                                                @error('password')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-sm-medium">Confirm Password *</label>
                                                <input class="form-control password" name="password_confirmation"
                                                    type="password" placeholder="***********">
                                                @error('password_confirmation')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="box-remember-forgot">
                                            <div class="remeber-me">
                                                <div class="text-xs-medium neutral-500">
                                                    <input class="cb-remember" type="checkbox">I agree to term and
                                                    conditions
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-45 mb-30">
                                        <button class="btn btn-black-lg" type="submit">
                                            Create New Account
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <p class="text-sm-medium neutral-500">Already have an account <a
                                            class="neutral-1000 btn-signin" href="{{route('login')}}">Login Here !</a></p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-7 text-center text-lg-end"> <img src="{{asset('assets/imgs/page/profile/register.png')}}"
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