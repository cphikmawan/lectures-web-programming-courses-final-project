@extends('layouts.app')

@section('title', 'Create Company')

@section('content')
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 page-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="user-panel-sidebar">
                                <div class="collapse-box">
                                    <h5 class="collapse-title no-border"> My Classified <a href="#MyClassified"
                                                                                           data-toggle="collapse"
                                                                                           class="pull-right"><i
                                            class="fa fa-angle-down"></i></a></h5>

                                    <div class="panel-collapse collapse in" id="MyClassified">
                                        <ul class="acc-list">
                                            <li><a href="/account-home"><i class="icon-home"></i>
                                                Personal Home </a></li>

                                        </ul>
                                    </div>
                                </div>
                                <!-- /.collapse-box  -->
                                <div class="collapse-box">
                                    <h5 class="collapse-title"> My Jobs <a href="#MyAds" data-toggle="collapse"
                                                                          class="pull-right"><i
                                            class="fa fa-angle-down"></i></a></h5>

                                    <div class="panel-collapse collapse in" id="MyAds">
                                        <ul class="acc-list">
                                            <li><a href="account-myads.html"><i class="icon-docs"></i> My jobs <span
                                                    class="badge">42</span> </a></li>
                                            <li><a href="account-saved-search.html"><i class="icon-star-circled"></i>
                                                Saved search <span class="badge">42</span> </a></li>
                                            <li><a href="account-pending-approval-ads.html"><i
                                                    class="icon-hourglass"></i> Pending approval <span
                                                    class="badge">42</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="collapse-box">
                                    <h5 class="collapse-title"> My Company <a href="#MyAds" data-toggle="collapse"
                                                                          class="pull-right"><i
                                            class="fa fa-angle-down"></i></a></h5>

                                    <div class="panel-collapse collapse in" id="MyAds">
                              <ul class="acc-list">    
                                            <li><a class="active"><i class="icon-plus"></i> Create Company </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.collapse-box  -->

                                <div class="collapse-box">
                                    <h5 class="collapse-title"> Terminate Account <a href="#TerminateAccount"
                                                                                     data-toggle="collapse"
                                                                                     class="pull-right"><i
                                            class="fa fa-angle-down"></i></a></h5>

                                    <div class="panel-collapse collapse in" id="TerminateAccount">
                                        <ul class="acc-list">
                                            <li><a href="account-close.html"><i class="icon-cancel-circled "></i> Close
                                                account </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.collapse-box  -->
                            </div>
                        </div>
                        <!-- /.inner-box  -->

                    </aside>
                </div>
                <!--/.page-sidebar-->

                <div class="col-sm-9 page-content">
                    {{-- <div class="inner-box">
                        <div class="row">
                            <div class="col-md-5 col-xs-4 col-xxs-12">
                                <h3 class="no-padding text-center-480 useradmin"><a href="">
                                <img class="userImg" src="{{ URL::asset('dist/images/user.jpg') }}" alt="user">  {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} 
                                </a></h3>
                            </div>
                            <div class="col-md-7 col-xs-8 col-xxs-12">
                                <div class="header-data text-center-xs">

                                    <!-- Traffic data -->
                                    <div class="hdata">
                                        <div class="mcol-left">
                                            <!-- Icon with red background -->
                                            <i class="fa fa-star-o ln-shadow"></i></div>
                                        <div class="mcol-right">
                                            <!-- Number of visitors -->
                                            <p><a href="#">5.0</a> <em>Rating</em></p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="inner-box">
                        <div class="welcome-msg">
                            <h3 class="page-sub-header2 clearfix no-padding">Create Your Company</h3>
                        </div>
                        <div id="accordion" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Register Company</h4>
                                </div>
                                <div class="panel">
                                    <div class="panel-body">
                                    <form class="form-horizontal" role="form" action="{{route('create-company.store_create_company')}}" method="post">
                                        {{csrf_field()}}
                                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-3 control-label">Company Name :</label>

                                                <div class="col-md-9">
                                                    <input id="name" type="text" class="form-control" name="name" required>

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
                                                    <input id="phonenumber" type="text" class="form-control" name="phonenumber" required>

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
                                                    <input id="email" type="text" class="form-control" name="email" required>

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
                                                    <input id="address" type="text" name="address" class="form-control" required>
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
                                                    <input id="bio" type="text" class="form-control" name="bio" required>

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
                                                    <input id="motto" type="text" class="form-control" name="motto"  required>

                                                    @if ($errors->has('motto'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('motto') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary">Create</button>
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
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!-- /.main-container -->
@endsection