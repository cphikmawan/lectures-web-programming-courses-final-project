@extends('layouts.account.app')

@section('title', 'My Account')

@section('saved-search','active')

@section('page-content')
    <div class="col-sm-9 page-content">
        <div class="inner-box">
            <h2 class="title-2"><i class="icon-star-circled"></i> Saved search </h2>
            @foreach($saved as $save)
            <div class="row">
                <div class="col-sm-12">
                    <div class="adds-wrapper">
                        <div class="item-list">
                            <!--/.photobox-->
                            <div class="col-sm-8 add-desc-box">
                                <div class="ads-details">
                                    <h5 class="add-title"><a href="/detail/{{$save->job->id}}">{{$save->job->title}}</a></h5>
                                    <span class="info-row"> <span class="add-type business-ads tooltipHere"
                                                                  data-toggle="tooltip"
                                                                  data-placement="right"
                                                                  title="Business Ads">B </span> <span
                                            class="date"><i class=" icon-clock"> </i> {{$save->job->created_at->toDayDateTimeString()}} </span> - <span
                                            class="item-location"><i class="fa fa-map-marker"></i> {{$save->job->city}} </span> </span>
                                </div>
                            </div>
                            <!--/.add-desc-box-->

                            <div class="col-sm-2 text-right text-center-xs price-box">
                                <h4 class="item-price"> ${{$save->job->salary}}</h4>
                                <form action="{{'/saved/'.$save->job->id}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr>
            @endforeach
            <!--/.row-box End-->

        </div>
    </div>
@endsection