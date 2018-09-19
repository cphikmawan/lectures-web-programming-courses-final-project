@extends('myhomepage.layouts.layouts')

@section('title', 'Homepage')

@section('content')
    <div class="main-container">
        <div class="container">
            <div class="col-lg-12 content-box ">
                <div class="row row-featured row-featured-category row-featured-company">
                    <div class="col-lg-12  box-title no-border">
                        <div class="inner">
                            <h2>
                                <span>Featured</span>
                                companies <a class="sell-your-item" href="/search/all/company"> See all companies <i class="icon-th-list"></i></a>
                            </h2>
                        </div>
                    </div>
                    @foreach($companies->take(6) as $company)
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4 f-category">
                        <a href="/detail/company/{{$company->id}}"><img alt="img" class="img-responsive" src="/uploads/avatars/companies/{{$company->photo_path}}">
                            <h6> Jobs at <br><span class="company-name">{{$company->name}}</span></h6>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <div style="clear: both"></div>

            <div class="row">
                <div class="col-sm-9 page-content col-thin-right">
                    <div class="content-box col-lg-12">
                        <div class="row row-featured row-featured-category">
                            <div class="col-lg-12  box-title no-border">
                                <div class="inner"><h2><span>Latest</span>
                                    Jobs <a href="/search/all" class="sell-your-item"> View more <i class="  icon-th-list"></i> </a></h2>
                                </div>
                            </div>
                            @foreach($jobs->take(4) as $job)
                            <div class="adds-wrapper jobs-list">
                                <div class="item-list job-item">
                                    <div class="col-sm-1  col-xs-2 no-padding photobox">
                                        <div class="add-image"><a href=""><img alt="company logo" src="/uploads/avatars/companies/{{$job->company->photo_path}}" class="thumbnail no-margin"></a>
                                        </div>
                                    </div>
                                    <!--/.photobox-->
                                    <div class="col-sm-10  col-xs-10  add-desc-box">
                                        <div class="add-details jobs-item">
                                            <h5 class="company-title "><a href="/detail/company/{{$job->company->id}}">{{$job->company->name}}</a></h5>
                                            <h4 class="job-title"><a href="/detail/{{$job->id}}"> {{$job->title}} </a></h4>
                                            <span class="info-row">  <span class="item-location"><i class="fa fa-map-marker"></i> {{$job->city}} </span><span class=" salary"><i class=" icon-money"> </i> ${{$job->salary}}</span></span>
                                            <div class="jobs-desc">
                                                {!!str_limit($job->desc,250)!!}
                                            </div>
                                            @if(auth()->check())
                                            <div class="job-actions">
                                                <ul class="list-unstyled list-inline">
                                                    @if(!$job->simpan->where('user_id', auth()->user()->id)->count())
                                                    <li><a class="save-job" href="search/save/{{ $job->id }}"><span class="fa fa-star-o"></span>Save Job</a>
                                                    </li>
                                                    @else
                                                    <li class="saved-job"><a href="search/unsave/{{ $job->id }}" class="saved-job"><span class="fa fa-star"></span>Saved Job</a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--/.job-item-->
                            </div>
                            @endforeach
                            <div class="tab-box  save-search-bar text-center">
                                <a class="text-uppercase" href="/search/all"> <i class=" icon-briefcase "></i> View all jobs </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-3 page-sidebar col-thin-left">
                    <aside>
                        {{-- <div class="inner-box no-padding">
                            <div class="inner-box-content">
                                <a href="#"><img class="img-responsive" src="{{ URL::asset('dist/images/site/app.jpg') }}" alt="tv"></a>
                            </div>
                        </div> --}}
                        <div class="inner-box">
                            <h2 class="title-2">Top Job Categories </h2>
                            <div class="inner-box-content">
                                <ul class="cat-list arrow">
                                @foreach($categories as $category)
                                    <li><a href="/search/all/category/{{$category->id}}">{{$category->name}} <span class="count">{{$category->job->count()}}</span> </a>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="inner-box no-padding"><img class="img-responsive" src="{{ URL::asset('dist/images/add2.jpg') }}" alt="">
                        </div> --}}
                    </aside>
                </div>
            </div>
            <div style="clear: both"></div>
          {{--   <div class="col-lg-12 content-box ">
                <div class="row row-featured">
                    <div style="clear: both"></div>
                    <div class=" relative  content  clearfix">
                        <div class="">
                            <div class="tab-lite">
                                <!-- Nav tabs -->
                                <ul role="tablist" class="nav nav-tabs ">
                                    <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="tab1" href="#tab1" aria-expanded="true"><i class="icon-location-2"></i>Top Job Locations</a></li>
                                    <li role="presentation" class=""><a data-toggle="tab" role="tab" aria-controls="tab2" href="#tab2" aria-expanded="false"><i class="icon-briefcase"></i>Top Job Titles</a></li>
                                    <li role="presentation" class=""><a data-toggle="tab" role="tab" aria-controls="tab3" href="#tab3" aria-expanded="false"><i class="icon-commerical-building"></i>Top Companies</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="tab1">
                                        <div class="col-lg-12 tab-inner">
                                            <div class="row">
                                                <ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#">Atlanta</a></li>
                                                </ul>
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#">Boston </a></li>
                                                </ul>
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#">Virginia Beach </a></li>
                                                </ul>
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#">Salt Lake City </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab2">
                                        <div class="col-lg-12 tab-inner">
                                            <div class="row">
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#">Full Time Jobs</a></li>
                                                </ul>
                                                <ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#"> Hospitality Jobs</a></li>
                                                </ul>
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#"> Criminal Justice Jobs</a></li>
                                                </ul>
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#"> Online Teaching Jobs</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="tab3">
                                        <div class="col-lg-12 tab-inner">
                                            <div class="row">
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#"> Aramark Jobs & Careers</a></li>
                                                </ul>
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#"> Bankers Life Jobs & Careers</a></li>
                                                </ul>
                                                <ul class="cat-list col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#"> General Electric Jobs & Careers</a></li>
                                                </ul>
                                                <ul class="cat-list cat-list-border col-sm-3  col-xs-6 col-xxs-12">
                                                    <li><a href="#"> Quintiles Jobs & Careers</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- /.main-container -->
@endsection