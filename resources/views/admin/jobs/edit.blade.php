@extends('admin.layouts.crud')

@section('title', 'Jobs')

@section('icon', 'icon-jobs')

@section('admin-jobs','active')

@section('crud-title', 'Jobs')

@section('crud-add-title','Job')

@section('table')
<div class="inner-box">
            <div class="row">
                <div class="col-md-5 col-xs-4 col-xxs-12">
                    <h2><i class="icon-pencil">Edit Job</i></h2> 
                </div>

                <div class="col-md-7 col-xs-8 col-xxs-12">
                    <div class="header-data text-center-xs">

                        <!-- Traffic data -->
                        <div class="hdata">
                                <a href="/admin-jobs"><i class="icon-reply ln-shadow"></i> Back</a>
                            <div class="clearfix"></div>
                        </div>

                        <!-- revenue data -->
                    </div>
                </div>   
            </div>
        </div>
<div class="inner-box category-content">
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" method="POST" action="{{route('admin-jobs.store')}}">
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-3 control-label">Company:</label>

                    <div class="col-md-8">
                        <select class="form-control" name="company_id" id="company_id">
                                <option selected="" value="" name="default">Select company...
                                </option>
                            @foreach($companies as $company)
                                <option value="{{$company->id}}" name="{{$company->name}}">{{$company->name}}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('company_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('company_id') }}</strong>
                            </span>
                        @endif
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
                        {{-- <script src="{{ URL::asset('dist/assets/js/tinymce.js') }}"></script> --}}
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
                <!-- Button  -->
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>

                    <div class="col-md-8"><button id="button1id"
                                             class="btn btn-primary">Create</button>
                    <a href="/admin-jobs" class="btn btn-danger">Cancel</a>
                                             </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection