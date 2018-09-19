<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Fav and touch icons --}}
    <link href="{{ URL::asset('dist/assets/ico/apple-touch-icon-144-precomposed.png') }}" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="{{ URL::asset('dist/assets/ico/apple-touch-icon-114-precomposed.png') }}" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="{{ URL::asset('dist/assets/ico/apple-touch-icon-72-precomposed.png') }}" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="{{ URL::asset('dist/assets/ico/apple-touch-icon-57-precomposed.png') }}" rel="apple-touch-icon-precomposed">

    {{-- <link href="{{ URL::asset('dist/assets/ico/favicon.png') }}" rel="shortcut icon"> --}}
    <title>Kerjoan - @yield('title')</title>
    {{-- Bootstrap core CSS --}}
    <link href="{{ URL::asset('dist/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    {{-- Custom styles for this template --}}
    <link href="{{ URL::asset('dist/assets/css/style.css') }}" rel="stylesheet">
    {{-- styles needed for carousel slider --}}
    <link href="{{ URL::asset('dist/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/assets/css/followbtn.css') }}" rel="stylesheet">
    {{-- favicon --}}
    <link href="{{ URL::asset('favicon.ico') }}" rel="shortcut icon" >
    {{-- Scripts --}}
    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ URL::asset('dist/assets/js/pace.min.js') }}"></script>
    @yield('css')
</head>

<body>
    <div id="wrapper">
        <div class="header">
            <nav class="navbar   navbar-site navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/" class="navbar-brand logo logo-title">
                            {{-- Original Logo will be placed here  --}}
                            {{-- class="icon icon-search-1 ln-shadow-logo shape-0" --}}
                            <span class="logo-icon"><i><img src="{{ URL::asset('dist/images/logo.png') }}" width="50"></i> </span>GolekK<span>erjo </span> </a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-left">
                            @if(Auth::guest())
                            <li><a href="/search">Browse Jobs</a></li>
                            @else
                                @if(Auth::user()->permission==0)
                                <li><a href="/search">Browse Jobs</a></li>
                                @endif
                            @endif
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                                <li><a href="/login">Login</a></li>
                                <li><a href="/register">Sign Up</a></li>
                                <li class="postadd"><a class="btn btn-block btn-border btn-post btn-danger" href="/job/create">Post A Job</a></li>
                            @else
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Signout <i class="glyphicon glyphicon-off"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>{{ Auth::user()->lastname }}</span> <i class="icon-user fa"></i> <i
                                        class=" icon-down-open-big fa"></i></a>
                                        @if(Auth::user()->permission==1)
                                        <ul class="dropdown-menu user-menu">
                                            <li class="active"><a href="/admin"><i class="icon-home"></i> Personal Home
                                            </a></li>
                                            <li><a href="/admin-users"><i class="icon-users"></i> Users </a></li>
                                            <li><a href="/admin-companies"><i class="icon-th-thumb"></i> Companies </a></li>
                                            <li><a href="/admin-categories"><i class="icon-docs"></i> Categories </a></li>
                                            <li><a href="/admin-jobs"><i class="icon-book"></i> Jobs </a></li>
                                        </ul>
                                        @else
                                        <ul class="dropdown-menu user-menu">
                                            <li class="active"><a href="/account-home"><i class="icon-home"></i> Personal Home
                                            </a></li>
                                            @if(Auth::user()->company()->count())
                                                <li><a href="/company"><i class="icon-th-thumb"></i> My Company </a></li>
                                                <li><a href="/job"><i class="icon-docs"></i> Posted Jobs </a></li>
                                            @endif
                                            <li><a href="/saved"><i class="icon-heart"></i> Saved Search </a></li>
                                        </ul>
                                        @endif
                                </li>
                                @if(Auth::guest())
                                    <li class="postadd"><a class="btn btn-block btn-border btn-post btn-danger" href="/job/create">Post A Job</a></li>
                                @else
                                    @if(Auth::user()->permission==0)
                                        <li class="postadd"><a class="btn btn-block btn-border btn-post btn-danger" href="/job/create">Post A Job</a></li>
                                    @endif
                                @endif
                            @endif
                        </ul>
                    </div>
                    {{-- /.nav-collapse  --}}
                </div>
                {{-- /.container-fluid --}}
            </nav>
        </div>
        {{-- /.header --}}

        {{-- intro --}}
        @yield('intro')
        {{-- content --}}
        @yield('content')
        {{-- page-info page-info-bottom --}}
        @yield('page-info')

        {{-- footer --}}
        <div class="footer" id="footer">
            <div class="container">
                <ul class=" pull-left navbar-link footer-nav">
                    <li>
                        <a href="/"> Home </a>
                        <a href="/about-us"> About us </a>
                        {{-- <a href="terms-conditions.html"> Terms and Conditions </a>
                        <a href="#"> Privacy Policy </a>
                        <a href="contact.html"> Contact us </a>
                        <a href="faq.html"> FAQ </a> --}}
                </ul>
                <ul class=" pull-right navbar-link footer-nav">
                    <li> &copy; 2017 GolekKerjo</li>
                </ul>
            </div>
        </div>
        {{-- /.footer --}}
    </div>
    {{-- /.wrapper --}}

{{-- Le javascript
================================================== --}}
{{-- Placed at the end of the document so the pages load faster --}}
{{-- <script src="{{ URL::asset('dist/assets/js/jquery/1.10.1/jquery-1.10.1.min.js') }}"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="{{ URL::asset('dist/assets/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{-- <script src="{{ URL::asset('dist/assets/js/jquery/1.10.1/jquery-1.10.1.min.js') }}"></script> --}}
{{-- include carousel slider plugin  --}}
<script src="{{ URL::asset('dist/assets/js/owl.carousel.min.js') }}"></script>
{{-- include equal height plugin  --}}
<script src="{{ URL::asset('dist/assets/js/jquery.matchHeight-min.js') }}"></script>
{{-- include jquery list shorting plugin plugin  --}}
<script src="{{ URL::asset('dist/assets/js/hideMaxListItem.js') }}"></script>
{{-- include jquery.fs plugin for custom scroller and selecter  --}}
<script src="{{ URL::asset('dist/assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js') }}"></script>
<script src="{{ URL::asset('dist/assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js') }}"></script>
{{-- include custom script for site  --}}
<script src="{{ URL::asset('dist/assets/js/script.js') }}"></script>
{{-- include jquery autocomplete plugin  --}}
<script src="{{ URL::asset('dist/assets/plugins/autocomplete/jquery.mockjax.js') }}" type="text/javascript"></script>
{{-- <script src="{{ URL::asset('dist/assets/plugins/autocomplete/jquery.autocomplete.js') }}" type="text/javascript"></script> --}}
<script src="{{ URL::asset('dist/assets/plugins/autocomplete/usastates.js') }}" type="text/javascript"></script>
{{-- <script src="{{ URL::asset('dist/assets/plugins/autocomplete/autocomplete-demo.js') }}" type="text/javascript"></script> --}}
<script>
    document.getElementById("user_avatar").onchange = function() {
        document.getElementById("user_image").submit();
    }
</script>

</body>
</html>
