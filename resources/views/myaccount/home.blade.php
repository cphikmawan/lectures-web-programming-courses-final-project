@extends('layouts.account.app')

@section('title', 'My Account')

@section('personal-home','active')

@section('home-link', 'account-home')

@section('page-content')
    <div class="col-sm-9 page-content">
        <div class="inner-box">
            <div class="row">
                <div class="col-md-5 col-xs-4 col-xxs-12">
                    <h3 class="no-padding text-center-480 useradmin">
                    <img src="/uploads/avatars/{{Auth::user()->photo_path}}" style="width:100px; height:100px; border-radius: 50%">  {{ Auth::user()->lastname }}'s Profiles
                    </h3>
                    <br>
                    <form id="user_image" enctype="multipart/form-data" action="{{route('profile.update')}}" method="POST">
                    {{csrf_field()}}
                        <label class="btn btn-default btn-file btn-sm" style="margin-left: 23px">
                        Change <input type="file" id="user_avatar" name="avatar" style="display: none;">
                    </label>
                    </form>
                </div>

{{--                 <div class="col-md-7 col-xs-8 col-xxs-12">
                    <div class="header-data text-center-xs">

                        <!-- Traffic data -->
                        <div class="hdata">
                            <div class="mcol-left">
                                <!-- Icon with red background -->
                                <i class="icon-heart ln-shadow"></i></div>
                            <div class="mcol-right">
                                <!-- Number of visitors -->
                                <p><a href="#">7000</a> <em>Saved</em></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- revenue data -->
                    </div>
                </div>  --}}  
            </div>
        </div>


        <div class="inner-box">
            <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Hello, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>
            </div>
            <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">My details</h4>
                    </div>
                    <div class="panel">
                        <div class="panel-body">
                        <form class="form-horizontal" role="form" action="/account-home/{{Auth::user()->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                                 <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <label for="firstname" class="col-md-3 control-label">First Name :</label>

                                    <div class="col-md-9">
                                        <label for="firstname" class="control-label">{{Auth::user()->firstname}}</label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <label for="lastname" class="col-md-3 control-label">Last Name :</label>

                                    <div class="col-md-9">
                                        <label for="lastname" class="control-label">{{Auth::user()->lastname}}</label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                                    <label for="phonenumber" class="col-md-3 control-label">Phone Number :</label>

                                    <div class="col-md-9">
                                        <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ Auth::user()->phonenumber}}" required>

                                        @if ($errors->has('phonenumber'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phonenumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-3 control-label">Email :</label>

                                    <div class="col-md-9">
                                        <label for="email" class="control-label">{{Auth::user()->email}}</label>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-3 control-label">Address :</label>

                                    <div class="col-md-9">
                                        <input id="address" type="text" name="address" class="form-control" value="{{ Auth::user()->address}}" required>
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
                                        <input id="bio" type="text" class="form-control" name="bio" value="{{ Auth::user()->bio}}" required>

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
                                        <input id="motto" type="text" class="form-control" name="motto" value="{{ Auth::user()->motto}}" required>

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
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Settings </h4>
                    </div>
                    <div class="panel">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="/account-home/{{Auth::user()->id}}/pass" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-3 control-label">New Password</label>

                                    <div class="col-md-9">
                                        <input id="password" type="password" class="form-control input-md" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-3 control-label">Confirm New Password</label>

                                    <div class="col-md-9">
                                        <input id="password-confirm" type="password" class="form-control input-md" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-default">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-box End-->

        </div>
    </div>
@endsection