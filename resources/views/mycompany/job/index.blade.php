@extends('layouts.account.app')

@section('title', 'Posted Jobs')

@section('posted-jobs','active')

@section('page-content')
    <div class="col-sm-9 page-content">
        <div class="inner-box">
            <h2 class="title-2"><i class="icon-docs"></i> Posted Jobs </h2>

            <div class="table-responsive">
                <div class="table-action">
                    <div class="table-search pull-right col-xs-7">
                        <div class="form-group">
                            <label class="col-xs-5 control-label text-right">Search <br>
                                <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
                            </label>

                            <div class="col-xs-7 searchpan">
                                <input type="text" class="form-control" id="filter">
                            </div>
                        </div>
                    </div>
                </div>
                <table id="addManageTable"
                       class="table table-striped table-bordered add-manage-table table demo"
                       data-filter="#filter" data-filter-text-only="true">
                    <thead>
                    <tr>
                        <th data-sort-ignore="true"> Jobs Details</th>
                        <th data-type="numeric"> Salary</th>
                        <th> Option</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($jobs as $job)
                    <tr>
                        <td style="width:58%" class="ads-details-td">
                            <div>
                                <p><strong> <a href="/detail/{{$job->id}}" title="Brend New Nexus 4">{{$job->title}}</a> </strong></p>

                                <p><strong> Posted On </strong>:
                                    {{$job->created_at->toDayDateTimeString()}} </p>

                                <p><strong>Visitors </strong>: {{ Counter::showAndCount('detail.show', $job->id) }} <strong>Located In:</strong> {{$job->city}}
                                </p>
                            </div>
                        </td>
                        <td style="width:16%" class="price-td">
                            <div><strong> ${{$job->salary}}</strong></div>
                        </td>
                        <td style="width:10%" class="action-td">
                            <div>
                                <p><a href="/job/{{$job->id}}/edit" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i> Edit </a>
                                </p>

                                <p><a class="btn btn-danger btn-xs"> <i class=" fa fa-trash"></i> Delete
                                </a></p>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!--/.row-box End-->

        </div>
    </div>
@endsection