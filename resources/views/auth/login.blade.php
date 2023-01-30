@extends('layouts.base')

@section('content')
    <style>
        .password_protected {
            position: relative;
        }

        .eye {
            width: 20px;
            height: 20px;
            position: absolute;
            right: 20px;
            top: 8px;
            cursor: pointer;
        }

        .eye:hover {
            opacity: .7;
        }

        input.password_protected_input {
            padding-right: 30px;
        }
    </style>
    <section class="container-fluid " id="login">
        <div class="row justify-content-center max_width">
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Sign In</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <small class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6 password_protected">
                                    <input id="password" type="password"
                                        class="form-control password_protected_input @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    <img class="eye" src="{{ asset('images/password-eye.png') }}"
                                        onclick="handlePassword()" alt="">
                                    <small style="color: rgba(128 128 128/ 0.5);font-size:10px;"><span
                                            class="text-danger">*</span>
                                        Should have at least 1 lowercase, 1
                                        uppercase, 1 number and 1 symbol</small>

                                    @error('password')
                                        <small class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Sign up / Join For Free</h4>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <small class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="signup-email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="signup-email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <small class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="number"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                    @error('phone_number')
                                        <small class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="signup-password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                                </label>

                                <div class="col-md-6 password_protected">
                                    <input id="signup-password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    <img class="eye" src="{{ asset('images/password-eye.png') }}"
                                        onclick="handlePassword()" alt="">
                                    <small style="color: rgba(128 128 128/ 0.5);font-size:10px;"><span
                                            class="text-danger">*</span>
                                        Should have at least 1 lowercase, 1
                                        uppercase, 1 number and 1 symbol</small>
                                    @error('password')
                                        <small class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="terms" id="terms_checkbox">

                                        <label class="form-check-label" for="terms_checkbox">
                                            I agree to the <a href="{{ route('terms') }}">Terms and Conditions</a>.
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const PasswordField = document.querySelector('#password');
        const SignupPassword = document.querySelector('#signup-password');
        const ConfirmPassword = document.querySelector('#password-confirm');

        function handlePassword() {
            if (PasswordField.type == 'password') {
                PasswordField.type = 'text';
            } else {
                PasswordField.type = 'password';
            }

            if (SignupPassword.type == 'password') {
                SignupPassword.type = 'text';
                ConfirmPassword.type = 'text';
            } else {
                SignupPassword.type = 'password';
                ConfirmPassword.type = 'password';
            }
        }
    </script>
@endsection
