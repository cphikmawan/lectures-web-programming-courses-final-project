@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-content">
                    <div class="inner-box category-content">
                    <h2 class="title-2"><i class="icon-user"></i> Reset Password </h2>
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" role="form" method="POST" action="{{route('password.request')}}">
                                {{csrf_field()}}
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">New Password</label>

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
                                        <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control input-md" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Reset Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection