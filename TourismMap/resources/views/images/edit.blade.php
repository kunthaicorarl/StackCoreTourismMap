@extends('layouts.app')
@section('content')

<div class="col-md-10 p-4-l p-4-r mob-back-h"><div class="pull-left">
<h4>Edit Image</h4></div> <div class="pull-right">
<a href="{{ url('/admin/images') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-10 panel default margin-top-p-4 p-4-t">

 <form  id="form" method="POST" action="{{url('/admin/images/update')}}" name="form" class="form-horizontal"> 
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <input type="hidden" name="_id" value="{{ $image->id }}">
  <input type="hidden" id="_thumbnail" name="_thumbnail" value="{{ $image->name }}">
 <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                         Gallery Type
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <select class="form-control"
                                name="gallery_type_id" id="gallery_type_id"
                                >
                                <option value="">--Select Gallery Type--</option>
                                @foreach($gallerTypes as $key => $value)
                                 <option value="{{$value->id}}" 
                                  @if($value->id==$image->gallery_type_id)
                                   selected
                                  @endif>{{$value->title}}</option>
                                @endforeach 
                        </select>
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
                               value="{{$image->title}}"
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
                               value="{{$image->url}}"
                               class="form-control"
                               readonly
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
                               value="{{$image->caption}}"
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
                               value="{{$image->alt_text}}"
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
                               value="{{$image->description}}"
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
                         <img id="preview" src="{{asset($image->url)}}/{{$image->name}}" style=" width: 100%;"/>
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
                       <a href="{{ url('/admin/images') }}" class="btn btn-sm btn-danger">Discard</a>
                          {{-- <input type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save"  class="btn btn-sm btn-success upload-image" value="Save"/> --}}
                     
<button type="submit" class="btn btn-sm btn-success form-post" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save">Save</button>

                    </div>
                </div>                       


</form>
    </div> 
<script src="{{ asset('app/image/unSaveConfirm.js') }}"></script>
<script src="{{ asset('app/image/update.js') }}"></script>

@endsection

