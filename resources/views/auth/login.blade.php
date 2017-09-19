@push('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@extends('layouts.app')

@section('main')
    <div class="login-wrapper columns">
        <div class="column is-8 is-hidden-mobile hero-banner">
            <section class="hero is-fullheight is-dark">
                <div class="hero-body">
                    <div class="container section">
                        <div class="has-text-right">
                            <h1 class="title is-1">Login</h1> <br>
                            <p class="title is-3">Secure User Account Login</p>
                        </div>
                    </div>
                </div>
                <div class="hero-footer">
                    <p class="has-text-centered">Image © Glenn Carstens-Peters via unsplash</p>
                </div>
            </section>
        </div>
    <div class="column is-4">
        <section class="hero is-fullheight">
            <div class="hero-heading">
                <div class="section has-text-centered">
                    <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo" width="150px">
                </div>
            </div>
            <div class="hero-body">
                <div class="container">
                    <div class="columns">
                        <div class="column is-8 is-offset-2">
                            <h1 class="avatar has-text-centered section">
                                <img src="https://placehold.it/128x128">
                            </h1>
                            {{--SRART LOGIN FORM--}}
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                            <div class="login-form">

                                <p class="control has-icon has-icon-right">
                                    <input class="input email-input  {{$errors->has('email') ? 'is-danger' : ''}}" type="text" name="email" id="email" placeholder="jsmith@example.org">
                    <span class="icon user">
                      <i class="fa fa-user"></i>
                    </span>
                                </p>
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{$errors->first('email')}}</p>
                                @endif
                                <p class="control has-icon has-icon-right">
                                    <input class="input password-input {{$errors->has('password') ? 'is-danger' : ''}}" type="password" name="password" id="password" placeholder="●●●●●●●">
                    <span class="icon user">
                      <i class="fa fa-lock"></i>
                    </span>
                                </p>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{$errors->first('password')}}</p>
                                @endif
                                <p class="control login">
                                    <button class="button is-success is-outlined is-large is-fullwidth">Login</button>
                                </p>

                            </div>
                            </form>
                            {{--END LOGIN FORM--}}

                            <div class="section forgot-password">
                                <p class="has-text-centered">
                                    <a href="{{route('password.request')}}">Forgot password</a>
                                    <a href="#">Need help?</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>


{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Login</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('login') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-8 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Login--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--Forgot Your Password?--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
