@extends('layouts.app')
@section('content')
    <h1 class="edica-page-title" data-aos="fade-up">Register</h1>
    <section class="edica-contact py-5 mb-5">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row">
                <div class="form-group col-12" data-aos="fade-up">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12" data-aos="fade-up">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12" data-aos="fade-up">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-12" data-aos="fade-up">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-12">
                    <button type="submit" class="btn btn-warning btn-lg" data-aos="fade-up" data-aos-delay="300">{{ __('Register') }}</button>

                </div>
            </div>
        </form>                
    </section>
@endsection

