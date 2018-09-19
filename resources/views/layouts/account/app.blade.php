@extends('layouts.account.ground')
@section('delete')
    <div class="collapse-box">
        <h5 class="collapse-title"> Terminate Account <a href="#TerminateAccount"
                                                         data-toggle="collapse"
                                                         class="pull-right"><i
                class="fa fa-angle-down"></i></a></h5>

        <div class="panel-collapse collapse in" id="TerminateAccount">
            <ul class="acc-list">
                <li><a class="@yield('close-account')" href="/close"><i class="icon-cancel-circled "></i> Close
                    account </a></li>
            </ul>
        </div>
    </div>
@endsection