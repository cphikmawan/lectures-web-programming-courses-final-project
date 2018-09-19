@extends('layouts.account.ground')

@section('home-link', 'admin')

@section('page-content')
    <div class="col-sm-9 page-content">
        <div class="inner-box">
            <h2 class="title-2"><i class="@yield('icon')"></i> @yield('crud-title') </h2>
            
            <div class="table-responsive">
                @yield('header')
                @yield('table')
            </div>
            <!--/.row-box End-->

        </div>
    </div>
@endsection