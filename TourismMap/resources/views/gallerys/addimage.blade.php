@extends('layouts.app')
@section('content')

<div class="col-md-10 p-4-l p-4-r mob-back-h"><div class="pull-left">
<h4>Create New Image</h4></div> <div class="pull-right">
<a href="{{ url('/admin/gallerys') }}/{{ $gallery_type_id->id }}/detail"  id="_currentUrl" class="btn btn-default btn-sm">
<input type="hidden" name="_url" id="_url" value="{{ url('/admin/gallerys/create') }}">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-10 panel default margin-top-p-4 p-4-t">
    
<script>
var _urlRedirect='{{ url("/admin/gallerys") }}/{{ $gallery_type_id->id }}/detail';
console.log(_urlRedirect);
</script>

<div>
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Image Single Upload</a></li>
    <li><a data-toggle="tab" href="#menu1">Multiple Upload</a></li>
    <li><a data-toggle="tab" href="#menu2">Url Upload</a></li>
    <li><a data-toggle="tab" href="#menu3">From Website</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Image Upload Info</h3>


  <form enctype="multipart/form-data" id="form" action="{{ url('/admin/images/store') }}" name="form" method="POST"  class="form-horizontal">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="hidden" id="gallery_type_id" name="gallery_type_id" value="{{ $gallery_type_id->id }}">
         <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                         Gallery Type
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                         <input type="text"
                              name="title"
                               id="title"
                               value='{{$gallery_type_id->title}}'
                               class="form-control"
                               placeholder="TItle" readonly />
                    </div>
         </div>
          <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Title
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                              name="title"
                               id="title"
                               class="form-control"
                               placeholder="TItle" />
                    </div>
            </div>
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Url
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                                name="url"
                               id="url"
                               class="form-control"
                               placeholder="Url" />
                    </div>
            </div>
                
                <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                    Caption
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="caption"
                               id="caption"
                               class="form-control"
                               placeholder="Caption" />
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                     Alt Text
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="alt_text"
                               id="alt_text"
                               class="form-control"
                               placeholder="Alt Text" />
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Description
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="description"
                               id="description"
                               class="form-control"
                               placeholder="Description" />
                    </div>
            </div>
                
            <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Image Upload
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="file"
                               name="thumbnail"
                                id="thumbnail"
                               class="form-control"
                               placeholder="File Upload" />
                    </div>  
            </div>              
             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                    </label>
                    <div class="col-md-5 col-sm-6">
                         <img id="preview" src="" style=" width: 100%;"/>
                         <!-- The Modal -->
                        <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                        </div>
                    </div>
            </div>

                  <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                       <a href="{{ url('/admin/gallerys') }}/{{ $gallery_type_id->id }}/detail" class="btn btn-sm btn-danger">Discard</a>
                          {{-- <input type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save"  class="btn btn-sm btn-success upload-image" value="Save"/> --}}
                     
<button type="submit" class="btn btn-sm btn-success upload-image" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save">Save</button>

                    </div>
                </div>
        <form>


    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Multiple Image Info</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Single Image Info</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Url Upload</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>



    </div> 
<script src="{{ asset('app/gallery/unImageSaveConfirm.js') }}"></script>
{{--  <script src="{{ asset('app/gallery/redirectCacheImage.js') }}"></script>  --}}
<script src="{{ asset('app/gallery/addImage.js') }}"></script>
@endsection

