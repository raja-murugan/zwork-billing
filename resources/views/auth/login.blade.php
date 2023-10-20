@extends('layout.backend.guest')

@section('content')
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2" src="{{ asset('assets/backend/img/logo2.png') }}" alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="form-addons">
                                        <label class="form-control-label">Email Address</label>
                                        <input type="email" id="email"
                                            class="floating form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus placeholder="Enter your email address">
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
                                        <div class="pass-group">
                                            <input type="password" id="password"
                                                class="pass-input floating form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Enter your password">
                                            <span class="fas fa-eye toggle-password"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="forgot-link" href="javascript::void(o);">Forgot Password ?</a>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary w-100" type="submit">Login</button>

                                <div class="text-center dont-have">Don't have an account yet? <a
                                        href="{{ route('register') }}">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
