@extends('layouts.app')
    <style>
        .home-page-bg{
            animation: animate 20s ease-in-out infinite;
        }

        @keyframes animate{
            0%, 100%{
                background-image: url('../img/1bg.jpg');
            }
            25%{
                background-image: url('../img/2bg.jpg');
            }
            50%{
                background-image: url('../img/3bg.jpg');
            }
            75%{
                background-image: url('../img/4bg.jpg');
            }
        }
    </style>
@section('content')
<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-6">
            <div class="card border border-0 shadow">
                <div class="card-header bg-primary"><h3 class="text-light">{{ __('Register') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class=" form-group mb-3">
                            <label for="name" class=" col-form-label ">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class=" col-form-label ">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm" class=" col-form-label ">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="secretkey" class="col-md-4 col-form-label ">{{ __('Secret Key') }}</label>

                            <div class="">
                                <input  type="password" class="form-control @error('key') is-invalid @enderror" name="key"  required>

                                @error('key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        

                        <div class="form-group mb-0">
                            <div class=" ">
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
</div>
@endsection
