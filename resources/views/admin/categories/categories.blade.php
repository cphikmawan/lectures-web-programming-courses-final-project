@extends('admin.layouts.temp')

@section('title', 'Categories')

@section('admin-categories','active')

@section('icon', 'icon-docs')

@section('add')
    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#createModal">
      Add Category <i
            class="glyphicon glyphicon-plus "></i>
    </button>
@endsection

@section('crud-title', 'Categories')


@section('table')
<table id="addManageTable"
       class="table table-striped table-bordered add-manage-table table demo"
       data-filter="#filter" data-filter-text-only="true">
    <thead>
    <tr>
        <th data-sort-ignore="true"> Category</th>
        <th colspan="1"> Option</th>
    </tr>
    </thead>
    <tbody>

   @foreach($categories as $category)
    <tr>
        <td style="width:90%" class="ads-details-td">
            <div>
                <p><strong><a href="#">{{$category->name}}</a></strong></p>
            </div>
        </td>
        <td>
        <form action="{{'/admin-categories/'.$category->id}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Add Category</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{route('admin-categories.store')}}">
        {{csrf_field()}}
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="control-label">Category Name</label>

              <input id="name" type="text" class="form-control input-md" name="name" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
          </div>
          <button type="submit"  class="btn btn-primary">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection