@extends('layouts.app-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('admin.dashboard') }}" class="pull-right">Back</a>
                    Admin Edit
                </div>
                <div class="panel-body">
                    
                    {{ Form::model($admin, ['route' => ['admin.edit', $admin->id], 'method' => 'patch', 'class' => 'form-horizontal']) }}
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Username:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" placeholder="Enter name">
                                @if($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-3" for="email">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" placeholder="Enter email">
                                @if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Password:</label>
                            <div class="col-sm-9"> 
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Confirm Password:</label>
                            <div class="col-sm-9"> 
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter password confirm">
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="control-label col-sm-12">
                                <button type="submit" class="btn btn-default">Save</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection