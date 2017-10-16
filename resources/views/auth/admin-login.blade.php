@extends('layouts.app')

@section('content')
<div class="preloader">
<div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
<div class="login-box">
    <div class="white-box">
        {{ Form::open(array('route'=>'admin.login.submit', 'class'=>'form-horizontal form-material')) }}
            <h3 class="box-title m-b-20">Sign In</h3>
            @if (Session::has('message'))                
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> Access denied. 
                </div>
            @endif
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" name="email" required="" value="{{ old('email') }}" placeholder="E-mail">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <h6 style="color:red; font-size: 12px;">{{ $errors->first('email') }}</h6>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control" type="password" name="password" required="" placeholder="Password">
                    @if ($errors->has('password') || Session::has('error'))
                        <span class="help-block">
                            <h6 style="color:red; font-size: 12px;">{{ $errors->first('password') }}{{ Session::get('error') }}</h6>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block waves-effect waves-light" type="submit">Sign In</button>
                </div>
            </div> 
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <a class="btn btn-googleplus btn-lg btn-block waves-effect waves-light" href="/login/google" type="button">
                        <i aria-hidden="true" class="fa fa-google-plus"></i> 
                        Sign in with Google
                    </a>
                </div>
            </div>        
        {{ Form::close() }}
    </div>
</div>
</section>
@endsection
