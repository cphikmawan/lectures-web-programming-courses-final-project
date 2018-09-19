@extends('admin.layouts.temp')

@section('title', 'Companies')

@section('admin-companies','active')

@section('icon', 'icon-th-thumb')

@section('add')
    <label for="Create"><a href="/admin-companies/create" class="btn btn-xs btn-primary">Add Company <i
            class="glyphicon glyphicon-plus "></i></a> </label>
@endsection

@section('crud-title', 'Companies')

@section('table')
<table id="addManageTable"
       class="table table-striped table-bordered add-manage-table table demo"
       data-filter="#filter" data-filter-text-only="true">
    <thead>
    <tr>
        <th data-sort-ignore="true"> Company</th>
        <th data-type="numeric"> Email</th>
        <th> Owner</th>
        <th colspan="2"> Option</th>
    </tr>
    </thead>
    <tbody>

   @foreach($companies as $company)
    <tr>
        <td style="width:50%" class="ads-details-td">
            <div>
                <p><strong><a href="#">{{$company->name}}</a></strong></p>
            </div>
        </td>
        <td style="width:16%" class="price-td">
            <div><strong>{{$company->email}}</strong></div>
        </td>
        <td style="width:16%" class="price-td">
            <div>
                {{-- {{$company->user->lastname}} --}}
            </div>
        </td>
        <td><a href="/admin-companies/{{$company->id}}/edit" class="btn btn-default btn-xs"> <i class="fa fa-edit"></i> Edit </a>
        </td>

        <td><form action="{{'/admin-companies/'.$company->id}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
        </form></td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection