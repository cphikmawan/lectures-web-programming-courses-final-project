@extends('layouts.app')

@section('title')
    @yield('title')
@endsection

@section('intro')
    <div class="intro jobs-intro hasOverly" style="background-image: url(dist/images/jobs/1.jpg); background-position: center center;">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <h1 class="intro-title animated fadeInDown"> Find the Right Job </h1>
                    <p class="sub animateme fittext3 animated fadeIn"> Find the latest jobs available in your area. </p>
                    <div class="row search-row animated fadeInUp">
                        <div class="col-lg-4 col-sm-4 search-col relative locationicon">
                            
                        </div>
                        <div class="col-lg-4 col-sm-4 search-col">
                            <a href="/search" class="btn btn-primary btn-search btn-block"><i class="icon-search"></i><strong>Find Jobs</strong></a>
                        </div>
                    </div>

                    <div class="resume-up">
                        {{-- <a><i class="icon-doc-4"></i></a> <a><b>Upload your CV</b></a> and easily apply to jobs from any device! --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @yield('content')
@endsection

@section('page-info')
    <div class="page-info hasOverly" style="background-image: url(dist/images/jobs/2.jpg); background-position: center center; background-size:cover">
        <div class="bg-overly">
            <div class="container text-center section-promo">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-commerical-building"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    {{-- <h5><span>2200+</span></h5> --}}
                                    <div class="iconbox-wrap-text">Companies</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-briefcase"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    {{-- <h5><span>400K+</span></h5> --}}
                                    <div class="iconbox-wrap-text">Live Jobs</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>
                    <div class="col-sm-3 col-xs-6  col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon  icon-users"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    {{-- <h5><span>3000+</span></h5> --}}
                                    <div class="iconbox-wrap-text"> Resume</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>
                    <div class="col-sm-3 col-xs-6 col-xxs-12">
                        <div class="iconbox-wrap">
                            <div class="iconbox">
                                <div class="iconbox-wrap-icon">
                                    <i class="icon icon-doc-1"></i>
                                </div>
                                <div class="iconbox-wrap-content">
                                    {{-- <h5><span>2000+</span></h5> --}}
                                    <div class="iconbox-wrap-text"> Resources</div>
                                </div>
                            </div>
                            <!-- /..iconbox -->
                        </div>
                        <!--/.iconbox-wrap-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-info -->

    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">
            <div class="page-bottom-info-content text-center">
                <h1>If you have any questions, comments or concerns, please call Career Services at (085) 850-059599</h1>
                    <a class="btn  btn-lg btn-primary-dark" href="#">
                        <i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> (085) 850-059599
                    </a>
            </div>
        </div>
    </div>
@endsection