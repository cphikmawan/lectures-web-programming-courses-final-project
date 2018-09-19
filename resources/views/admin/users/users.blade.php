@extends('admin.layouts.temp')

@section('title', 'Users')

@section('icon', 'icon-users')

@section('admin-users','active')

@section('add')
    <label for="Create"><a href="/admin-users/create" class="btn btn-xs btn-primary">Add User <i
            class="glyphicon glyphicon-plus "></i></a> </label>
@endsection

@section('search')
    <div class="table-search pull-right col-xs-7">
    <form method="GET" id="search" action="/admin-users/search">
        <div class="form-group">
            <label class="col-xs-5 control-label text-right">Search <br>
                <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
            </label>

            <div class="col-xs-7 searchpan">
                <input type="text" class="form-control" id="susers" name="susers" placeholder="This Feature Not Yet">
            </div>
        </div>
        </form>
    </div>
    
@endsection

@section('crud-title', 'Users')

@section('table')
<table id="addManageTable"
       class="table table-striped table-bordered add-manage-table table demo"
       data-filter="#filter" data-filter-text-only="true">
    <thead>
    <tr>
        <th data-sort-ignore="true"> Name</th>
        <th data-type="numeric"> Email</th>
        <th> Role</th>
        <th colspan="2"> Option</th>
    </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
    <tr>
        <td style="width:50%" class="ads-details-td">
            <div>
                <p><strong>{{$user->firstname}} {{$user->lastname}}</strong></p>
            </div>
        </td>
        <td style="width:16%" class="price-td">
            <div><strong>{{$user->email}}</strong></div>
        </td>
        <td style="width:16%" class="price-td">
            <div>
                @if($user->permission==0)
                <strong>User</strong>
                @else
                <strong>Admin</strong>
                @endif
            </div>
        </td>
        <td><a href="/admin-users/{{$user->id}}/edit" class="btn btn-default btn-xs"> <i class="fa fa-edit"></i> Edit </a>
        </td>
        
        <td>
        <form action="{{'/admin-users/'.$user->id}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
@endsection

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function()
{
     $( "#susers" ).autocomplete({
          source: "{{ url('admin-users/autocompleteusers') }}",
          minLength: 1,
          select: function(event, ui) {
            $('#susers').val(ui.item.value);
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