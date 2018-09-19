@extends('layouts.account.app')

@section('title', 'Close Account')

@section('close-account','active')

@section('page-content')
<div class="col-sm-9 page-content">


    <div class="inner-box">
        <h2 class="title-2"><i class="icon-cancel-circled "></i> Close account </h2>
        
        <p>You are sure you want to close your account?</p>
        <br>
        <form action="{{'/account-home/'.Auth::user()->id}}" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
                 <button type="submit" class="btn btn-danger">Delete</button>
            <a class="btn btn-primary" href="/account-home">Cancel</a>
        </form>
    </div>
    <!--/.inner-box-->
</div>
@endsection