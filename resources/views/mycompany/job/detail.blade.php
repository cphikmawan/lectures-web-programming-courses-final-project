@extends('layouts.app')

@section('title', 'Job Detail')

@section('content')
	<div class="main-container">
	    <div class="container">
	        <div class="row">
	            <div class="col-sm-9 page-content col-thin-right">
	                <div class="inner inner-box ads-details-wrapper">
	                    <h2> {{$job->title}} </h2>
	                    <span class="info-row"> <span class="date"><i class=" icon-clock"> </i> Posted: {{$job->created_at->toDayDateTimeString()}} </span>  -  <span class="item-location"><i
	                            class="fa fa-map-marker"></i> {{$job->city}} </span> </span>

	                    <div class="Ads-Details ">
	                        <div class="row">
	                            <div class="ads-details-info jobs-details-info col-md-8">
	                                {!! $job->desc!!}
	                            </div>
	                            <div class="col-md-4">
	                                <aside class="panel panel-body panel-details job-summery">
	                                    <ul>

	                                        <li><p class=" no-margin "><strong>Company:</strong> {{$job->company->name}} </p>
	                                        </li>
	                                        <li>
	                                            <p class=" no-margin "><strong>Salary:</strong> ${{$job->salary}} </p>
	                                        </li>
	                                        <li>
	                                            <p class="no-margin"><strong>Location:</strong> {{$job->city}} </p>
	                                        </li>
	                                    </ul>
	                                </aside>
	                                <div class="ads-action">
	                                    <ul class="list-border">
	                                        <li><a href="#"> <i class=" fa icon-mail"></i> Email job</a></li>
	                                        <li><a href="#" data-toggle="modal"> <i class="fa icon-print"></i> Print job</a>
	                                        </li>
	                                        <li><a href="#"> <i class=" fa fa-heart"></i> Save job</a></li>
	                                        <li><a href="#"> <i class="fa fa-share-alt"></i> Share job</a></li>

	                                    </ul>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="content-footer text-left">
	                            <a href="#applyJob" data-toggle="modal" class="btn  btn-primary"> <i
	                                    class=" icon-mail-2"></i> Apply Online </a>
	                            <small> or. Send your CV to: <strong>{{$job->company->email}}</strong></small>
	                        </div>
	                    </div>
	                </div>
	                <!--/.ads-details-wrapper-->

	            </div>
	            <!--/.page-content-->

	            <div class="col-sm-3  page-sidebar-right">
	                <aside>
	                    <div class="panel sidebar-panel panel-contact-seller">
	                        <div class="panel-heading">Company Information</div>
	                        <div class="panel-content user-info">
	                            <div class="panel-body text-center">
	                                <div class="seller-info">
	                                    <div class="company-logo-thumb">
	                                        <a><img alt="img" class="img-responsive img-circle"
	                                                src="/uploads/avatars/companies/{{$job->company->photo_path}}"> </a></div>
	                                    <a href="/detail/company/{{$job->company->id}}" class="btn-sm btn btn-default">Profile</a>
	                                    <br><br>
	                                    <h3 class="no-margin"> {{$job->company->name}}</h3>
	                                    <p>Location: <strong>{{$job->company->address}}</strong></p>
	                                </div>

	                            </div>
	                        </div>
	                    </div>
	                    <div class="panel sidebar-panel">
	                        <div class="panel-heading"><i class="icon-lamp"></i> Successful CV Tips</div>
	                        <div class="panel-content">
	                            <div class="panel-body text-left">
	                                <ul class="list-check">
	                                    <li> Tailor a CV to a specific job</li>
	                                    <li> Keep it simple</li>
	                                    <li> Include key information - personal details</li>
	                                    <li> Showcase achievements</li>
	                                </ul>
	                                <p><a class="pull-right" href="#"> Know more <i
	                                        class="fa fa-angle-double-right"></i> </a></p>
	                            </div>
	                        </div>
	                    </div>
	                    <!--/.categories-list-->
	                </aside>
	            </div>
	            <!--/.page-side-bar-->
	        </div>
	    </div>
	</div>
	
	<div class="modal fade" id="applyJob" tabindex="-1" role="dialog">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
	                        class="sr-only">Close</span></button>
	                <h4 class="modal-title"><i class=" icon-mail-2"></i> Apply Job </h4>
	            </div>
	            <div class="modal-body">
	                <form role="form">
	                    <div class="form-group">
	                        <label for="recipient-name" class="control-label">Name:</label>
	                        <input class="form-control required" id="recipient-name" placeholder="Your name"
	                               data-placement="top" data-trigger="manual"
	                               data-content="Must be at least 3 characters long, and must only contain letters."
	                               type="text">
	                    </div>
	                    <div class="form-group">
	                        <label for="sender-email" class="control-label">E-mail:</label>
	                        <input id="sender-email" type="text"
	                               data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual"
	                               data-placement="top" placeholder="email@you.com" class="form-control email">
	                    </div>
	                    <div class="form-group">
	                        <label for="recipient-Phone-Number" class="control-label">Phone Number:</label>
	                        <input type="text" maxlength="60" class="form-control" id="recipient-Phone-Number">
	                    </div>
	                    <div class="form-group">
	                        <label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
	                        <textarea class="form-control" id="message-text" placeholder="Your message here.."
	                                  data-placement="top" data-trigger="manual"></textarea>
	                    </div>

	                    <div class="form-group">
	                        <label for="fileToUpload" class="control-label">Upload CV</label>
	                        <input type="file" name="fileToUpload" id="fileToUpload">

	                        <p class="help-block pull-left small "> We accept .DOC, .DOCX, .PDF, .RTF, .TXT, .ODT, .WPS up
	                            to 1000 KB </p>

	                    </div>

	                    <div class="form-group">
	                        <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not
	                            valid. </p>
	                    </div>
	                </form>
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                <button type="submit" class="btn btn-success pull-right"> Upload and send !</button>
	            </div>
	        </div>
	    </div>
	</div>

@endsection