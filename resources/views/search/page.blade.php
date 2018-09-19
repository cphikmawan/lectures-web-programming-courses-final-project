@extends('layouts.app')
@section('title', 'Search')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<div class="search-row-wrapper"
         style="background-image: {{ URL::asset('dist/images/jobs/ibg.jpg') }}; background-size: cover; background-position: center center;">
        <form class="container text-center" method="GET" id="search" action="/search">
            <div class="col-sm-3">
                <input class="form-control keyword" type="text" placeholder="Jobs Title" id="title" name="title" value="{{ request()->title }}">
            </div>
            <div class="col-sm-3">
                <select class="form-control" name="category" id="search-category">
                    <option selected="selected" value="">All Categories</option>
                    
                    @foreach($category as $cat)
                    	<option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach

                    <option value="other"> Other</option>
                </select>
            </div>
            <div class="col-sm-3">
                <input class="form-control keyword" type="text" id="salary" placeholder="Min Salary/Year" name="salary" value="{{ request()->salary }}">
            </div>
            <div class="col-sm-3">
                <button class="btn btn-block btn-primary  " type="submit"> Find Jobs <i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-sm-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">
                        
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a onclick="addKota(this)">Jakarta</a></li>
                                    <li><a onclick="addKota(this)">Bandung</a></li>
                                    <li><a onclick="addKota(this)">Tangerang</a></li>
                                    <li><a onclick="addKota(this)">Bogor</a></li>
                                    <li><a onclick="addKota(this)">Bekasi</a></li>
                                    <li><a onclick="addKota(this)">Surabaya</a></li>
                                    <li><a onclick="addKota(this)">Jogjakarta</a></li>
                                    <li><a onclick="addKota(this)">Semarang</a></li>
                                    <li><a onclick="addKota(this)">Banten</a></li>
                                    <li><a onclick="addKota(this)">Denpasar</a></li>
                                    <li><a onclick="addKota(this)"> Other Locations </a></li>
                                </ul>
                            </div>
                            <!--/.locations-list-->

                            <div style="clear:both"></div>
                        </div>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-sm-9 page-content col-thin-left">

                    <div class="category-list">
                        <div class="tab-box clearfix ">

                            <!-- Nav tabs -->
                            <div class="col-lg-12  box-title no-border">
                                <div class="inner">
                                    <h2> {{ request()->title }} <small> {{ $job->count() }} Jobs Found</small>
                                    </h2>
                                </div>
                            </div>

                            <!-- Mobile Filter bar -->
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
                            <!-- Mobile Filter bar End-->


                            <div class="tab-filter hide-xs">

                                <select class="selectpicker" data-style="btn-select" data-width="auto">
                                    <option value="Short by">Sort by</option>
                                    <option value="Relevance">Relevance</option>
                                    <option value="Company">Company</option>
                                </select>
                            </div>
                            <!--/.tab-filter-->

                        </div>
                        <!--/.tab-box-->

                        <div class="adds-wrapper jobs-list">
						@if(!$job->count())
							<div class="item-list job-item">
								<h1>We're Sorry</h1>
								<p>The job you are looking is currently unavailable</p>
							</div>
						@else
                        @foreach($job as $j)
                            <div class="item-list job-item">


                                <div class="col-sm-1  col-xs-2 no-padding photobox">
                                    <div class="add-image"><a href=""><img class="thumbnail no-margin" src="/uploads/avatars/companies/{{$j->company->photo_path}}" alt="company logo"></a></div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-sm-10  col-xs-10  add-desc-box">
                                    <div class="add-details jobs-item" id="jobs">
                                        <h5 class="company-title "><a href="/detail/company/{{$j->company->id}}">{{ $j->company->name }}</a></h5>
                                        <h4 class="job-title"><a href="/detail/{{$j->id}}" id="ini"> {{ $j->title }} </a></h4>
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
                                                <li>
                                                    <a href="search/save/{{ $j->id }}" class="save-job">
                                                        <span class="fa fa-star-o"></span>
                                                        Save Job
                                                    </a>
                                                </li>
                                                @else
                                                <li class="saved-job">
                                                    <a class="saved-job" href="search/unsave/{{ $j->id }}">
                                                        <span class="fa fa-star"></span>
                                                        Saved Job
                                                    </a>
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
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      $(function()
      {
         $( "#title" ).autocomplete({
          source: "{{ url('search/autocomplete') }}",
          minLength: 1,
          select: function(event, ui) {
            $('#title').val(ui.item.value);
          }
        });
      });
      </script>
        

    <script type="text/javascript">
    	var myForm = document.getElementById('search');

    	myForm.addEventListener('submit', function () {
    	    var allInputs = myForm.getElementsByTagName('input');
    	    var allSelect = myForm.getElementsByTagName('select');

    	    for (var i = 0; i < allInputs.length; i++) {
    	        var input = allInputs[i];

    	        if (input.name && !input.value) {
    	            input.name = '';
    	        }
    	    }

    	    for (var i = 0; i < allSelect.length; i++) {
    	        var input = allSelect[i];

                if (input.name && !input.value) {
                    input.name = '';
    	        }
    	    }

    	});
    </script>

@endsection