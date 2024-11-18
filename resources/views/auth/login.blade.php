@extends('layouts.login')

@section('content')
    <form method="POST" class="bg-[#EEEFFF] drop-shadow-lg p-16 min-h-[500px] min-w-[400px] flex flex-col gap-5" action="{{ route('login') }}">
        <h2 class="text-3xl text-center mb-4">
            Bienvenido
        </h2>
        @csrf
        <div class="">
            <label for="email" class="text-lg">{{ __('Email Address') }}</label>

            <div class="">
                <input id="email" type="email" class="form-control text-lg w-full px-2 py-1 border-2 @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="password" class="text-lg">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control text-lg w-full px-2 py-1 border-2 @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
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
                <button type="submit" class="w-full mb-4 py-2 px-4 bg-[#D5D6E7] rounded-md shadow-md">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection
