@extends('layout.backend.guest')

@section('content')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <img class="img-fluid logo-dark mb-2" src="{{ asset('assets/backend/img/logo2.png') }}" alt="Logo">
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Register</h1>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <div class="form-addons">
                                <label class="form-control-label">Name</label>
                                <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Enter your full name">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-addons">
                                <label class="form-control-label">Email Address</label>
                                <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email"
                                placeholder="Enter your email address">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="form-addons">
                                <label class="form-control-label">Password</label>
                                <input id="password" type="password"
                            class="pass-input form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Enter your password">
                                </div>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Confirm Password</label>
                                <input id="password-confirm" type="password" class="pass-input form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter your password">
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-lg btn-block btn-primary w-100"
                                    type="submit">Register</button>
                            </div>
                        </form>

                        <div class="text-center dont-have">Already have an account? <a href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
