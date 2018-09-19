@extends('layouts.app')

@section('title', 'Post Job')

@section('content')
        <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content">
                    <div class="inner-box category-content">
                        <h2 class="title-2 uppercase"><strong> <i class="icon-briefcase"></i> Post a Job </strong></h2>

                        <div class="row">
                            <div class="col-sm-12">
                                <form class="form-horizontal" method="POST" action="{{route('job.store')}}">
                                {{csrf_field()}}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label" for="CompanyName">Company :</label>

                                        <div class="col-md-8">
                                            <label class="control-label" for="CompanyName">{{Auth::user()->company->name}}</label>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label for="title" class="col-md-3 control-label">Job Title :</label>

                                        <div class="col-md-8">
                                            <input id="title" type="text" class="form-control input-md" placeholder="Job Title" name="title" required>

                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Select Basic -->
                                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label class="col-md-3 control-label">Category :</label>

                                        <div class="col-md-8">
                                            <select class="form-control" name="category_id" id="category_id">
                                                    <option selected="" value="0" name="default">Select a catagory...
                                                    </option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" name="{{$category->name}}">{{$category->name}}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('category_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('category_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Textarea -->
                                    <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                                        <label for="desc" class="col-md-3 control-label">Job Description :</label>

                                        <div class="col-md-8">
                                            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                                            <textarea name="desc" class="form-control my-editor"></textarea>
                                            <script>
                                              var editor_config = {
                                                path_absolute : "/",
                                                selector: "textarea.my-editor",
                                                plugins: [
                                                  "advlist autolink lists link charmap print preview hr anchor pagebreak",
                                                  "searchreplace wordcount visualblocks visualchars code fullscreen",
                                                  "insertdatetime media nonbreaking save table contextmenu directionality",
                                                  "emoticons template paste textcolor colorpicker textpattern"
                                                ],
                                                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
                                                relative_urls: false,
                                                file_browser_callback : function(field_name, url, type, win) {
                                                  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                                  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                                                  var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                                                  if (type == 'image') {
                                                    cmsURL = cmsURL + "&type=Images";
                                                  } else {
                                                    cmsURL = cmsURL + "&type=Files";
                                                  }

                                                  tinyMCE.activeEditor.windowManager.open({
                                                    file : cmsURL,
                                                    title : 'Filemanager',
                                                    width : x * 0.8,
                                                    height : y * 0.8,
                                                    resizable : "yes",
                                                    close_previous : "no"
                                                  });
                                                }
                                              };

                                              tinymce.init(editor_config);
                                            </script>  

                                            <span class="help-block">Describe the responsibilities ,  experience, skills, or education. </span>

                                            @if ($errors->has('desc'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('desc') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
                                        <label for="deadline" class="col-md-3 control-label">Deadline :</label>

                                        <div class="col-md-8">
                                            <input id="deadline"  type="date" class="form-control input-md" name="deadline" required>

                                            @if ($errors->has('deadline'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('deadline') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Select Basic -->
                                    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                        <label for="position" class="col-md-3 control-label">Job Position :</label>

                                        <div class="col-md-8">
                                            <input id="position" placeholder="Job Position" type="text" class="form-control input-md" name="position" required>

                                            @if ($errors->has('position'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('position') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                        <label for="city" class="col-md-3 control-label">Location :</label>

                                        <div class="col-md-8">
                                            <input id="city" placeholder="City" type="text" class="form-control input-md" name="city" required>

                                            @if ($errors->has('city'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Prepended text-->
                                    <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                                        <label for="salary" class="col-md-3 control-label">Salary :</label>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input id="salary" placeholder="Salary" type="text" class="form-control input-md" name="salary" required>
                                            </div>

                                            @if ($errors->has('salary'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('salary') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="content-subheading"><i class="icon-user fa"></i> <strong>Company
                                        information</strong></div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textinput-name">Owner Name :</label>

                                        <div class="col-md-8">
                                            <label class="control-label" for="textinput-name">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</label>
                                        </div>
                                    </div>

                                    <!-- Appended checkbox -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textinput-name">Company Email :</label>

                                        <div class="col-md-8">
                                            <label class="control-label" for="textinput-name">{{Auth::user()->company->email}}</label>
                                        </div>
                                    </div>

                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textinput-name">Phone Number :</label>

                                        <div class="col-md-8">
                                            <label class="control-label" for="textinput-name">{{Auth::user()->company->phonenumber}}</label>
                                        </div>
                                    </div>
                                    <!-- Button  -->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>

                                        <div class="col-md-8"><button id="button1id"
                                                                 class="btn btn-success btn-lg">Submit</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.page-content -->

                <div class="col-md-3 reg-sidebar">
                    <div class="reg-sidebar-inner text-center">
                        <div class="promo-text-box"><i class=" icon-lamp fa fa-4x icon-color-1"></i>

                            <h3><strong>Effective Job Postings </strong></h3>

                            <p> The difference between finding mediocre candidates and extraordinary candidates for your
                                clients is a good job posting. </p>
                        </div>

                        <div class="panel sidebar-panel">
                            <div class="panel-heading uppercase">
                                <small><strong> Job Posting Tips</strong></small>
                            </div>
                            <div class="panel-content">
                                <div class="panel-body text-left">
                                    <ul class="list-check">
                                        <li> Add Keywords</li>
                                        <li> Use Familiar Job Titles</li>
                                        <li> Give Them Details</li>
                                        <li> Expand Your Location</li>
                                        <li> Easy Read Postings</li>
                                        <li> Keep it simple and expected</li>

                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!--/.reg-sidebar-->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
@endsection