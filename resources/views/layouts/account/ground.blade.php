@extends('layouts.app')

@section('title', 'My Account')

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
                                            <li><a class="@yield('personal-home')" href="/@yield('home-link')"><i class="icon-home"></i>
                                                Personal Home </a></li>
                                        </ul>
                                    </div>
                                </div>
                                @if(Auth::user()->permission==1)
                                <div class="collapse-box">
                                    <h5 class="collapse-title"> My Tables <a href="#MyAds" data-toggle="collapse"
                                                                          class="pull-right"><i
                                            class="fa fa-angle-down"></i></a></h5>
                                    <div class="panel-collapse collapse in" id="MyAds">
                                        <ul class="acc-list">
                                            <li><a class="@yield('admin-users')" href="/admin-users"><i class="icon-users"></i> Users </a></li>
                                            {{-- @if($jobs->company_id==$companies->id) --}}
                                            <li><a class="@yield('admin-companies')" href="/admin-companies"><i class="icon-th-thumb"></i> Companies </a></li>
                                           {{--  @endif --}}
                                            <li><a class="@yield('admin-categories')" href="/admin-categories"><i class="icon-docs"></i> Categories </a></li>
                                            {{-- @if($jobs->company_id==$companies->id) --}}
                                            <li><a class="@yield('admin-jobs')" href="/admin-jobs"><i class="icon-book"></i> Jobs </a></li>
                                           {{--  @endif --}}
                                        </ul>
                                        {{-- ganti ke modal konfirmasi --}}
                                    </div>
                                </div>
                                <!-- /.collapse-box  -->
                                @else
                                <div class="collapse-box">
                                    <h5 class="collapse-title"> My Jobs <a href="#MyAds" data-toggle="collapse"
                                                                          class="pull-right"><i
                                            class="fa fa-angle-down"></i></a></h5>

                                    <div class="panel-collapse collapse in" id="MyAds">
                                        <ul class="acc-list">
                                            <li><a class="@yield('saved-search')" href="/saved"><i class="icon-star-circled"></i>
                                                Saved search</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="collapse-box">
                                    <h5 class="collapse-title"> My Company <a href="#MyAds" data-toggle="collapse"
                                                                          class="pull-right"><i
                                            class="fa fa-angle-down"></i></a></h5>
                                    @if(Auth::user()->company()->count())

                                    <div class="panel-collapse collapse in" id="MyAds">
                                        <ul class="acc-list">    
                                            <li><a class="@yield('company-home')" href="/company"><i class="icon-home"></i> Company Home </a></li>
                                            {{-- @if($jobs->company_id==$companies->id) --}}
                                            <li><a class="@yield('posted-jobs')" href="/job"><i class="icon-docs"></i> Posted Jobs </a></li>
                                           {{--  @endif --}}
                                            <li><a href="/job/create"><i class="icon-plus"></i> Post Job </a></li>
                                        </ul>
                                        {{-- ganti ke modal konfirmasi --}}
                                    </div>
                                    @else
                                    <div class="panel-collapse collapse in" id="MyAds">
                                        <ul class="acc-list">    
                                            <li><a href="/create-company"><i class="icon-plus"></i> Create Company </a></li>
                                        </ul>
                                        {{-- ganti ke modal konfirmasi --}}
                                    </div>
                                    @endif
                                </div>
                                <!-- /.collapse-box  -->
                                @endif
                                @yield('delete')
                                <!-- /.collapse-box  -->
                            </div>
                        </div>
                        <!-- /.inner-box  -->

                    </aside>
                </div>
                <!--/.page-sidebar-->
                @yield('page-content')
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>
    <!-- /.main-container -->
@endsection