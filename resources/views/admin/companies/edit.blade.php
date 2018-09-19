@extends('admin.layouts.crud')

@section('title', 'Companies')

@section('icon', 'icon-th-thumb')

@section('admin-companies','active')

@section('crud-title', 'Companies')

@section('crud-add-title','Company')

@section('table')
<div class="inner-box">
            <div class="row">
                <div class="col-md-5 col-xs-4 col-xxs-12">
                    <h3 class="no-padding text-center-480 useradmin">
                    <img src="/uploads/avatars/companies/{{$company->photo_path}}" style="width:100px; height:100px; border-radius: 50%">  {{ $company->name }}
                    </h3>
                    <br>
                    <form id="user_image" enctype="multipart/form-data" action="/admin-companies/profile/{{$company->id}}" method="POST">
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
                                <a href="/admin-companies"><i class="icon-reply ln-shadow"></i> Back</a>
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
                        <h4 class="panel-title">Company details</h4>
                    </div>
                    <div class="panel">
                        <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/admin-companies/{{$company->id}}">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                                 {{-- Text input --}}
                                <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Owner</label>

                                    <div class="col-md-6">
                                        <select class="form-control" name="user_id" id="user_id">
                                                <option selected="" value="" name="default">Select owner...
                                                </option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" name="{{$user->lastname}}">{{$user->lastname}}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('user_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('user_id') }}</strong>
                                            </span>
                                        @endif

                                        @if(Session::has('danger'))
                                            <span class="help-block alert-danger">
                                                <strong>{!! session('danger') !!}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Company Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control input-md" name="name" value="{{ $company->name }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                                    <label for="phonenumber" class="col-md-4 control-label">Phone Number</label>

                                    <div class="col-md-6">
                                        <input id="phonenumber" type="text" class="form-control input-md" name="phonenumber" value="{{ $company->phonenumber }}" required autofocus>

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
                                        <input id="email" type="email" class="form-control input-md" name="email" value="{{ $company->email }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-4 control-label">Address</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control input-md" name="address" value="{{ $company->address }}" required autofocus>

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                                    <label for="bio" class="col-md-4 control-label">Bio</label>

                                    <div class="col-md-6">
                                        <input id="bio" type="text" class="form-control input-md" value="{{ $company->bio }}" name="bio"  required>

                                        @if ($errors->has('bio'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('bio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('motto') ? ' has-error' : '' }}">
                                    <label for="motto" class="col-md-4 control-label">Motto</label>

                                    <div class="col-md-6">
                                        <input id="motto" type="text" class="form-control input-md" value="{{ $company->motto }}" name="motto" required>

                                        @if ($errors->has('motto'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('motto') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-default">
                                            Update
                                        </button>
                                        <a href="/admin-companies" class="btn btn-danger">cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection