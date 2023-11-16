@extends('layouts.dashboard.app-without-nav')
@section('title')
@lang('dashboard.login')
@endsection
@section('content')
@include('partials.includes._flash_message')

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">

                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">@lang('dashboard.welcome_message') @lang('dashboard.app_name')</h5>
                            <p class="text-muted">@lang('dashboard.login').</p>
                        </div>
                        @include('partials.dashboard.errors')
                        <div class="p-2 mt-4">
                            <form method="POST" action="{{ route('login')  }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">@lang('dashboard.email')</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="برجاء  أدخال   البريد الالكترونى ">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <label for="password">@lang('dashboard.password')</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="برجاء  أدخال  كلمه  المرور  ">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="auth-remember-check" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="auth-remember-check">@lang('dashboard.remember_me')</label>
                                </div>
                                <div class="mt-3 text-center">
                                    <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">@lang('dashboard.login')</button>
                                </div>
                                <div class="mt-4 text-center">
                                    <p>@lang('dashboard.for register') <a href="{{ route('register') }}">@lang('dashboard.sign up')</a>.</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end container -->
</div>
@endsection