
@extends('layouts.app')
@section('title','Job all')
@section('content')
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!--/.page-side-bar-->
                <div class="col-sm-12 page-content">

                    <div class="category-list">
                        <div class="tab-box clearfix ">

                            <!-- Nav tabs -->
                            <div class="col-lg-12  box-title no-border">
                                <div class="inner">
                                    <h2> <small>All Jobs({{$job->count()}})</small>
                                    </h2>
                                </div>
                            </div>

                            <div class="mobile-filter-bar col-lg-12  ">
                                <ul class="list-unstyled list-inline no-margin no-padding">
                                    <li class="filter-toggle">
                                        <a class="">
                                            <i class="  icon-th-list"></i>
                                            Filters
                                        </a>
                                    </li>
                                    <li>


                                        <div class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle"><i class="caret "></i>
                                                Sort by </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="" rel="nofollow">Relevance</a></li>
                                                <li><a href="" rel="nofollow">Date</a></li>
                                                <li><a href="" rel="nofollow">Company</a></li>
                                            </ul>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                            <div class="menu-overly-mask"></div>
                        </div>
                       
                        <div class="adds-wrapper jobs-list">
						@if(!$job->count())
							<div class="item-list job-item">
								<h1>We're Sorry</h1>
								<p>The job you are looking is currently unavailable</p>
							</div>
						@else
                        @foreach($job as $j)
                            <div class="item-list job-item" id="jobs">


                                <div class="col-sm-1  col-xs-2 no-padding photobox">
                                    <div class="add-image"><a href=""><img class="thumbnail no-margin"
                                                                           src="/uploads/avatars/companies/{{$j->company->photo_path}}"
                                                                           alt="company logo"></a></div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-sm-10  col-xs-10  add-desc-box">
                                    <div class="add-details jobs-item">
                                        <h5 class="company-title "><a href="/detail/company/{{$j->company->id}}">{{ $j->company->name }}</a></h5>
                                        <h4 class="job-title"><a href="/detail/{{$j->id}}"> {{ $j->title }} </a></h4>
                                        <span class="info-row">  <span class="item-location"><i
                                                class="fa fa-map-marker"></i> {{ $j->city }} </span> <span class=" salary">	<i
                                                class=" icon-money"> </i> {{ $j->salary }} a year</span></span>

                                        <div class="jobs-desc">
                                            {!!str_limit($j->desc,250)!!}
                                        </div>


                                        @if(auth()->check())
                                        <div class="job-actions">
                                            <ul class="list-unstyled list-inline">
                                                @if(!$j->simpan->where('user_id', auth()->user()->id)->count())
                                                <li><a class="save-job" href="search/save/{{ $j->id }}"><span class="fa fa-star-o"></span>Save Job</a>
                                                </li>
                                                @else
                                                <li class="saved-job"><a href="search/unsave/{{ $j->id }}" class="saved-job"><span class="fa fa-star"></span>Saved Job</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        @endif


                                    </div>
                                </div>
                                <!--/.add-desc-box-->

                                <!--/.add-desc-box-->
                            </div>
                            <!--/.job-item-->
                        @endforeach
                        @endif
                        </div>
                        <!--/.adds-wrapper-->
                    </div>
                    <!--/.pagination-bar -->

                    <div class="post-promo text-center">
                        <h2> Looking for a job? </h2>
                        <h5> Upload your CV and easily apply to jobs from any device! </h5>
                        <a href="" class="btn btn-lg btn-border btn-post btn-danger">Upload your CV </a></div>
                </div>
            </div>
        </div>
    </div>
@endsection