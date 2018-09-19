@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
<div class="main-container inner-page">
    <div class="container">
        <div class="section-content">
            <div class="inner-box ">
                <div class="row">


                    <div class="col-sm-6">
                        <div class="seller-info seller-profile">
                            <div class="seller-profile-img">
                                <a><img src="/uploads/avatars/companies/{{$company->photo_path}}" class="img-responsive thumbnail" alt="img"> </a>
                            </div>
                            <h3 class="no-margin no-padding link-color uppercase "> {{$company->name}}</h3>

{{--                             <div class="text-muted">
                                99.8% positive Feedback
                            </div> --}}
                            <div class="user-ads-action">
                                <button class="btn_follow followButton" rel="6" style="margin: 2px">Follow</button>
                            </div>

                            <div class="seller-social-list">

                                <ul class="share-this-post">


                                    <li><a class="google-plus"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a class="facebook"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a class="pinterest"><i class="fa fa-pinterest"></i></a>
                                    </li>

                                </ul>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-6">

                        <div class="seller-contact-info">

                            <h3 class="no-margin uppercase color-danger"> Contact Information </h3>

                            <dl class="dl-horizontal">
                                <dt>Address:</dt>
                                <dd class="contact-sensitive"> {{$company->address}}
                                </dd>
                      
                                <dt>Mobile Phone:</dt>
                                <dd class="contact-sensitive"> {{$company->phonenumber}}</dd>
                            </dl>
                        </div>

                    </div>
                </div>

            </div>

            <div class="section-block">
                <div class="row">
                    <div class="col-sm-9 col-thin-left page-content ">

                        <div class="category-list">
                            <div class="tab-box ">

                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs add-tabs" role="tablist">
                                    <li class="active"><a href="#allAds" role="tab" data-toggle="tab"> Company all jobs
                                        <span class="badge">{{$jobs->count()}}</span></a></li>

                                </ul>
                            </div>
                            <!--/.tab-box-->

                            <div class="listing-filter">
                                <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                        class="list-view active"><i class="  icon-th"></i></span> <span
                                        class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                        class="grid-view "><i class=" icon-th-large "></i></span></div>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.listing-filter-->

							@foreach($jobs as $job)
                            <div class="adds-wrapper">
                            	<div class="item-list">
                            	    <!--/.photobox-->
                            	    <div class="col-sm-7 add-desc-box">
                            	        <div class="add-details">
                            	            <h5 class="add-title"><a href="/detail/{{$job->id}}"> {{$job->title}} </a></h5>
                            	            <span class="info-row"><span
                            	                    class="date"><i class=" icon-clock"> </i> {{$job->created_at->toDayDateTimeString()}} </span> - <span
                            	                    class="category">{{$job->category->name}} </span>- <span
                            	                    class="item-location"><i class="fa fa-map-marker"></i> {{$job->city}} </span> </span>
                            	        </div>
                            	    </div>
                            	    <!--/.add-desc-box-->
                            	    <div class="pull-right col-sm-3 text-right  price-box">
                            	        <h2 class="item-price"> $ {{$job->salary}}</h2>
                            	        <a class="btn btn-default  btn-sm make-favorite"> <i
                            	                class="fa fa-heart"></i> <span>Save</span> </a></div>
                            	    <!--/.add-desc-box-->
                            	</div>
                            </div>
                            @endforeach
                            <!--/.adds-wrapper-->

                            <div class="tab-box  save-search-bar text-center"><a href=""> <i class=" icon-plus"></i>
                                Follow User </a></div>
                        </div>

                        <!--/.pagination-bar -->

                        <div class="post-promo text-center">
                            <h2> Your Company Need Employee ? </h2>
                            <h5> Recruit Your Employee online FOR FREE. It's easier than you think !</h5>
                            <a href="/job/create" class="btn btn-lg btn-border btn-post btn-danger">Post a Job </a></div>
                        <!--/.post-promo-->

                    </div>


                    <div class="col-sm-3  page-sidebar-right">
                        <aside>
{{--                             <div class="panel sidebar-panel panel-contact-seller">
                                <div class="panel-heading">Followers <span class="badge">81</span>
                                </div>
                                <div class="panel-content user-info">
                                    <div class="panel-body text-center">
                                        <ul class="list-unstyled list-user-list long-list-user"> --}}
											{{-- @foreach() --}}
{{--                                             <li><a><img alt="img" src="images/users/1.jpg"
                                                        class="img-circle   "></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="panel sidebar-panel">
                                <div class="panel-heading">Safety Tips for Buyers</div>
                                <div class="panel-content">
                                    <div class="panel-body text-left">
                                        <ul class="list-check">
                                            <li> Meet seller at a public place</li>
                                            <li> Check the item before you buy</li>
                                            <li> Pay only after collecting the item</li>
                                        </ul>
                                        <p><a class="pull-right" href="#"> Know more <i
                                                class="fa fa-angle-double-right"></i> </a></p>
                                    </div>
                                </div>
                            </div>
                            <!--/.categories-list-->
                        </aside>
                    </div>
                    <!--/.page-side-bar-->
                </div>
            </div>


        </div>

    </div>
</div>
<script>

    $('.user-ads-action').on('click','button.followButton', function(e){
        e.preventDefault();
        $button = $(this);
        if($button.hasClass('following')){
            
            //$.ajax(); Do Unfollow
            
            $button.removeClass('following');
            $button.removeClass('unfollow');
            $button.text('Follow');
        } else {
            
            // $.ajax(); Do Follow
            
            $button.addClass('following');
            $button.text('Following');
        }
    });

    $('button.followButton').hover(function(){
         $button = $(this);
        if($button.hasClass('following')&&{{$company->id==1}}){
            $button.addClass('unfollow');
            $button.text('Unfollow');
        }
    }, function(){
        if($button.hasClass('following')&&{{$company->id==1}}){
            $button.removeClass('unfollow');
            $button.text('Following');
        }
    });
</script>
@endsection