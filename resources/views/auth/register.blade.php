@extends('layouts.app')

@section('content')
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <!-- <form class="form-horizontal form-material" id="loginform" action="index.html"> -->
            {{ Form::open(array('route' => 'register', 'class' => 'form-horizontal form-material', 'id' => 'loginform')) }}
                <h3 class="box-title m-b-20">Sign In</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="name" required="" placeholder="Name">
                        @if ($errors->has('name'))
                            <span class="help-block text-danger">
                                <h6 style="color:red; font-size: 12px;">{{ $errors->first('name') }}</h6>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="text" name="email" required="" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="help-block text-danger">
                                <h6 style="color:red; font-size: 12px;">{{ $errors->first('email') }}</h6>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block text-danger">
                                <h6 style="color:red; font-size: 12px;">{{ $errors->first('password') }}</h6>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="{{ route('login') }}" class="text-primary m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            {{ Form::close() }}
            <!-- </form> -->
        </div>
    </div>
</section>
@endsection
