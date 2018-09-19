@extends('admin.layouts.crud')

@section('title', 'Users')

@section('icon', 'icon-users')

@section('admin-users','active')

@section('crud-title', 'Users')

@section('crud-add-title','User')

@section('table')
<div class="inner-box">
            <div class="row">
                <div class="col-md-5 col-xs-4 col-xxs-12">
                    <h2><i class="icon-plus">Create User</i></h2> 
                </div>

                <div class="col-md-7 col-xs-8 col-xxs-12">
                    <div class="header-data text-center-xs">

                        <!-- Traffic data -->
                        <div class="hdata">
                                <a href="/admin-users"><i class="icon-reply ln-shadow"></i> Back</a>
                            <div class="clearfix"></div>
                        </div>

                        <!-- revenue data -->
                    </div>
                </div>   
            </div>
        </div>
<div class="inner-box category-content">
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" role="form" method="POST" action="{{route('admin-users.store')}}">
                 {{-- Text input --}}

                 <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                    <label for="firstname" class="col-md-4 control-label">First Name</label>

                    <div class="col-md-6">
                        <input id="firstname" type="text" class="form-control input-md" name="firstname" value="{{ old('firstname') }}" required autofocus>

                        @if ($errors->has('firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Last Name</label>

                    <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control input-md" name="lastname" value="{{ old('lastname') }}" required autofocus>

                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                    <label for="phonenumber" class="col-md-4 control-label">Phone Number</label>

                    <div class="col-md-6">
                        <input id="phonenumber" type="text" class="form-control input-md" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus>

                        @if ($errors->has('phonenumber'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phonenumber') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control input-md" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control input-md" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control input-md" name="password_confirmation" required>
                    </div>
                </div>
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                        <a href="/admin-users" class="btn btn-danger">cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection