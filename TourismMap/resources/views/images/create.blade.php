@extends('layouts.app')
@section('content')

<div class="col-md-10 p-4-l p-4-r mob-back-h"><div class="pull-left">
<h4>Create New Image</h4></div> <div class="pull-right">
<a href="{{ url('/admin/images') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-10 panel default margin-top-p-4 p-4-t">
    
  <form enctype="multipart/form-data" id="provinceForm" action="{{ url('/admin/provinces/store') }}" name="provinceForm" method="POST"  class="form-horizontal">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
         <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                         Gallery Type
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <select class="form-control"
                                name="status" id="status"
                                >
                             <option value="Enable">Enable</option>
                               <option value="Disable">Disable</option>
                               <option value="AddNew">AddNew</option>
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
                               name="postal_code"
                               id="postal_code"
                               class="form-control"
                               placeholder="Postal Code" />
                    </div>
            </div>
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Url
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                                name="title_khmer"
                               id="title_khmer"
                               class="form-control"
                               placeholder="Title Khmer" />
                    </div>
            </div>
                
                <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                    Caption
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="title_english"
                               id="title_english"
                               class="form-control"
                               placeholder="Title English" />
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                     Alt Text
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="description_khmer"
                               id="description_khmer"
                               class="form-control"
                               placeholder="Des Khmer" />
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Description
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="description_english"
                               id="description_english"
                               class="form-control"
                               placeholder="Des English" />
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
                       <a href="{{ url('/admin/provinces') }}" class="btn btn-sm btn-danger">Discard</a>
                          {{-- <input type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save"  class="btn btn-sm btn-success upload-image" value="Save"/> --}}
                     
<button type="submit" class="btn btn-sm btn-success upload-image" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save">Save</button>

                    </div>
                </div>
        <form>

    </div> 

<script src="{{ asset('app/image/unSaveConfirm.js') }}"></script>
<script src="{{ asset('app/image/create.js') }}"></script>
<script src="{{ asset('app/image/cacheData.js') }}"></script>

@endsection

