@extends('layouts.app')
@section('content')
<script>
  $(document).ajaxStart(function(){
    $.LoadingOverlay("show");
});
</script>
<div class="col-md-10 p-4-l p-4-r mob-back-h"><div class="pull-left">
<h4>Create New Gallery</h4></div> <div class="pull-right">
<a href="{{ url('/admin/gallerys') }}" id='_currentGalleryCreateUrl' class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

<div id="result"></div>
    <div class="col-md-10 panel default margin-top-p-4 p-4-t">
      <form  id="galleryTypeForm" method="POST" action="{{url('/admin/gallerys/store')}}" name="galleryTypeForm" class="form-horizontal"> 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                        <div class="page-head portlet-title">
                                                    <div class="page-title">
                                                        <div class="caption">
                                                            <span class="caption-subject font-blue-sharp bold uppercase">
                                                            <h4> Gallery Type Infor</h4>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                        <hr>
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title"/>
                            </div>
                        </div>

                       <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Description</label>

                            <div class="col-md-6">
                            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                            </div>
                        </div>
                        </div>
                        <div>
                            <div class="page-head portlet-title">
                                                    <div class="page-title">
                                                        <div class="caption">
                                                            <span class="caption-subject font-blue-sharp bold uppercase">
                                                            <h4> Image Album</h4>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                             <hr>
                             <!--Drop Zone Config-->
       


  <div id="container">
    <div id="actions" class="row">

      <div class="col-md-12">
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-sm btn-rb-success fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add files...</span>
        </span>
        <button type="submit" class="btn-sm btn-rb-danger start">
            <i class="glyphicon glyphicon-upload"></i>
            <span>Start upload</span>
        </button>
        <button type="reset" class="btn-sm btn-rb-danger cancel">
            <i class="glyphicon glyphicon-ban-circle"></i>
            <span>Cancel upload</span>
        </button>
      </div>
    </div>
  <div>
   <hr/>
    <div class="table table-striped files" id="previews">

      <div id="template" class="file-row">
        <!-- This is used as the file preview template -->            
       <div class="rb-content-preview">   
       <div class="rb-preview">
            <span class="preview"><img data-dz-thumbnail /></span>
        </div>
        <div class="rb-content-image">
            <span class="name" style="font-weight: 600;" data-dz-name></span>|<span class="size rb-size-image" data-dz-size></span>
            <br><span><b>Caption:</b></span><span>This is Image</span>
            <br><span><b>AltText:</b></span><span>This is Image</span>
            <br><span><b>Description:</b></span><span>Province</span>
            <strong class="error text-danger" data-dz-errormessage></strong><br/>
        </div>
        <div class="rb-content-action-image">
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
            </div>
           <div>
            <button class="btn btn-primary  btn-sm start">
                <i class="glyphicon glyphicon-upload"></i>
                <span>Save</span>
            </button>
            {{--  <button data-dz-remove class="btn btn-warning cancel">
                <i class="glyphicon glyphicon-ban-circle"></i>
                <span>Cancel</span>
            </button>  --}}
            <button data-dz-remove class="btn btn-sm btn-warning cancel">
                <i class="glyphicon glyphicon-ban-circle"></i>
                <span>Update</span>
            </button>
            <button data-dz-remove class="btn  btn-sm btn-danger delete">
                <i class="glyphicon glyphicon-trash"></i>
                <span>Delete</span>
            </button>
        </div>
       </div>
      </div>
    
      </div>

    </div>
  </div>

 <!--Drop Zone Config-->

                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href="/admin/gallerys"  class="btn btn-rb-danger">
                                   Discard
                                </a>
                               <button type="submit" class="btn-rb-success galleryTypeSubmit" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save">Save</button>
                            </div>
                        </div>
                    </form>
    </div>
<script>
$(function(){
     if (typeof(Storage) !== "undefined") {
          $('#_currentGalleryCreateUrl').attr('href',localStorage.getItem("_currentUrl"));
         
        } else {
            sweetAlert("Oops...", "Sorry, your browser does not support Web Storage...", "error");
            return;
        }

});
</script> 
 <script src="{{ asset('app/gallery/initDropZone.js') }}"></script> 
<script src="{{ asset('app/gallery/unSaveConfirm.js') }}"></script>
<script src="{{ asset('app/gallery/create.js') }}"></script>

@endsection

