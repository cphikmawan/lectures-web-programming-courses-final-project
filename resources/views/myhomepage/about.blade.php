@extends('layouts.app')

@section('title', 'About US')

@section('intro')
<div class="intro-inner">
    <div class="about-intro" style="background:url(dist/images/bg2.jpg) no-repeat center; background-size:cover;">
        <div class="dtable hw100">
            <div class="dtable-cell hw100">
                <div class="container text-center">
                    <h1 class="intro-title animated fadeInDown"> 3E</h1>
                    <h1 class="intro-title animated fadeInDown"> Easy Job - Easy Money - Easy Life</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="main-container inner-page">
    <div class="container">
        <div class="section-content">
            <div class="row ">
                <h1 class="text-center title-1"> Find Us Here! </h1>
                <hr class="center-block small text-hr">
                <div class="col-sm-4">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">
                            <div class="front" style="background: url('alvinback.jpg') 0 0 no-repeat;">
                                <span class="name">Alvin Mudhoffar</span>
                            </div>
                            <div class="back">
                                <div class="back-logo" style="background: url('alvin.jpg') 0 0 no-repeat;"></div>
                                <div class="back-title">@alvinmudhoffar 5115100062</div>
                                    <p>Software Engineer <br>Software Developer <br>Web Developer <br>Administrator Lab RPL</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">
                            <div class="front" style="background: url('heroback.jpg') 0 0 no-repeat;">
                                <span class="name">Hero Akbar Ahmadi</span>
                            </div>
                            <div class="back">
                                <div class="back-logo" style="background: url('hero.jpg') 0 0 no-repeat;"></div>
                                <div class="back-title">@hero.ahmadi <br>5115100006</div>
                                <p>Network Engineer <br>Network Security <br>Web Developer <br>Administrator Lab NCC</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                        <div class="flipper">
                            <div class="front" style="background: url('awanback.jpg') 0 0 no-repeat;">
                                <span class="name">Cahya Putra Hikmawan</span>
                            </div>
                            <div class="back">
                                <div class="back-logo" style="background: url('awan.jpg') 0 0 no-repeat;"></div>
                                <div class="back-title">@cphikmawan <br>5115100119</div>
                                <p>Network Engineer <br>Network Infrastructure <br>Web Developer <br>Administrator Lab AJK</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
    {{-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
    <link href="{{ URL::asset('styleflip.css') }}" rel="stylesheet">
@endsection

@section('page-info')
<div class="parallaxbox about-parallax-bottom">
    <div class="container">
        <div class="row text-center featuredbox">
            <div class="col-sm-4 xs-gap">
                <div class="inner">
                    <div class="icon-box-wrap"><i class="icon-book-open ln-shadow-box shape-3"></i></div>
                    <h3 class="title-4">Customer service</h3>
                    <a href="#"><p>customer-service@golekkerjo.com</p></a>
                </div>
            </div>
            <div class="col-sm-4 xs-gap">
                <div class="inner">
                    <div class="icon-box-wrap"><i class=" icon-lightbulb ln-shadow-box shape-6"></i></div>
                    <h3 class="title-4">Seller satisfaction</h3>
                    <p>Get more job for freelancer here</p>
                </div>
            </div>
            <div class="col-sm-4 xs-gap">
                <div class="inner">
                    <div class="icon-box-wrap"><i class="icon-megaphone ln-shadow-box shape-5"></i></div>
                    <h3 class="title-4">Best Offers </h3>
                    <p>Get full access just for $5 a month</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection