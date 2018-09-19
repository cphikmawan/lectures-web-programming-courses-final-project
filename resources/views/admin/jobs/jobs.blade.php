@extends('admin.layouts.temp')

@section('title', 'Jobs')

@section('admin-jobs','active')

@section('icon', 'icon-book')

@section('add')
    <label for="Create"><a href="/admin-jobs/create" class="btn btn-xs btn-primary">Add Job <i
            class="glyphicon glyphicon-plus "></i></a> </label>
@endsection

@section('crud-title', 'Jobs')

@section('crud-add-title','Job')

@section('table')
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

                    <p><strong>Located In:</strong> {{$job->city}}
                    </p>
                </div>
            </td>
            <td style="width:16%" class="price-td">
                <div><strong> ${{$job->salary}}</strong></div>
            </td>
            <td style="width:10%" class="action-td">
                <div>
                    <p><a href="/admin-jobs/{{$job->id}}/edit" class="btn btn-default btn-xs"> <i class="fa fa-edit"></i> Edit </a>
                    </p>

                    <form action="{{'/admin-jobs/'.$job->id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
</table>
@endsection