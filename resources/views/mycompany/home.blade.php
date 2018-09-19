@extends('layouts.account.app')

@section('title', 'My Company')

@section('company-home','active')

@section('page-content')
    <div class="col-sm-9 page-content">
        <div class="inner-box">
            <div class="row">
                <div class="col-md-5 col-xs-4 col-xxs-12">
                    <h3 class="no-padding text-center-480 useradmin">
                    <img src="/uploads/avatars/companies/{{Auth::user()->company->photo_path}}" style="width:100px; height:100px; border-radius: 50%";>  {{ Auth::user()->company->name }}
                    </h3>
                    <br>
                    <form id="user_image" enctype="multipart/form-data" action="{{route('company.profile.update')}}" method="POST">
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
                            <div class="mcol-left">
                                <!-- Icon with red background -->
                                <i class="icon-docs ln-shadow"></i></div>
                            <div class="mcol-right">
                                <!-- Number of visitors -->
                                <p><a href="#">{{$jobs->count()}}</a> <em>Posted</em></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <!-- revenue data -->
                        <div class="hdata">
                            <div class="mcol-left">
                                <!-- Icon with green background -->
                                <i class="fa fa-star ln-shadow"></i></div>
                            <div class="mcol-right">
                                <!-- Number of visitors -->
                                <p><a href="#">4.53</a><em>Ratings</em></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
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
                        <form class="form-horizontal" role="form" action="/company/{{Auth::user()->company->id}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                                 <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-3 control-label">Company Name :</label>

                                    <div class="col-md-9">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->company->name}}" required>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                                    <label for="phonenumber" class="col-md-3 control-label">Phone Number :</label>

                                    <div class="col-md-9">
                                        <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ Auth::user()->company->phonenumber}}" required>

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
                                        <input id="email" type="text" class="form-control" name="email" value="{{ Auth::user()->company->email}}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-3 control-label">Address :</label>

                                    <div class="col-md-9">
                                        <input id="address" type="text" name="address" class="form-control" value="{{ Auth::user()->company->address}}" required>
{{-- <textarea class="form-control" rows="3" id="textArea"></textarea> --}}
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
                                        <input id="bio" type="text" class="form-control" name="bio" value="{{ Auth::user()->company->bio}}" required>

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
                                        <input id="motto" type="text" class="form-control" name="motto" value="{{ Auth::user()->company->motto}}" required>

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
            </div>
            <!--/.row-box End-->

        </div>
    </div>
@endsection