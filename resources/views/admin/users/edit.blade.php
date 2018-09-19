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
                    <h3 class="no-padding text-center-480 useradmin">
                    <img src="/uploads/avatars/{{$user->photo_path}}" style="width:100px; height:100px; border-radius: 50%">  {{ $user->lastname }}'s Profiles
                    </h3>
                    <br>
                    <form id="user_image" enctype="multipart/form-data" action="/admin-users/profile/{{$user->id}}" method="POST">
                    {{csrf_field()}}
                        <label class="btn btn-default btn-file btn-sm" style="margin-left: 23px">
                        Change <input type="file" id="user_avatar" name="avatar" style="display: none;">
                    </label>
                    </form>
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

        <div class="inner-box">
            <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">User details</h4>
                    </div>
                    <div class="panel">
                        <div class="panel-body">
                        <form class="form-horizontal" role="form" action="/admin-users/{{$user->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                                 <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <label for="firstname" class="col-md-3 control-label">First Name :</label>

                                    <div class="col-md-9">
                                        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $user->firstname}}" required>

                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <label for="phonenumber" class="col-md-3 control-label">Last Name :</label>

                                    <div class="col-md-9">
                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname}}" required>

                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                                    <label for="phonenumber" class="col-md-3 control-label">Phone Number :</label>

                                    <div class="col-md-9">
                                        <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ $user->phonenumber}}" required>

                                        @if ($errors->has('phonenumber'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phonenumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="phonenumber" class="col-md-3 control-label">Email :</label>

                                    <div class="col-md-9">
                                        <input id="email" type="text" class="form-control" name="email" value="{{ $user->email}}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Role :</label>

                                        <div class="col-md-9">
                                            <select class="form-control" name="permission" id="permission">
                                            		@if($user->permission==0)
                                                    <option selected="" value="0" name="default">User
                                                    </option>
                                                    <option value="1" name="default">Admin
                                                    </option>
                                                    @else
                                                    <option value="0" name="default">User
                                                    </option>
                                                    <option selected="" value="1" name="default">Admin
                                                    @endif
                                            </select>

                                            @if ($errors->has('permission'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('permission') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-3 control-label">Address :</label>

                                    <div class="col-md-9">
                                        <input id="address" type="text" name="address" class="form-control" value="{{ $user->address}}">
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                    <label for="bio" class="col-md-3 control-label">Bio :</label>

                                    <div class="col-md-9">
                                        <input id="bio" type="text" class="form-control" name="bio" value="{{ $user->bio}}">

                                        @if ($errors->has('bio'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('motto') ? ' has-error' : '' }}">
                                    <label for="motto" class="col-md-3 control-label">Motto :</label>

                                    <div class="col-md-9">
                                        <input id="motto" type="text" class="form-control" name="motto" value="{{ $user->motto}}">

                                        @if ($errors->has('motto'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('motto') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-default">Update</button>
                                        <a href="/admin-users" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection