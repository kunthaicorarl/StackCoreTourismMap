@extends('layouts.app')
@section('content')
 <div class="col-md-10 p-4-l p-4-r mob-back-h"><div class="pull-left">
<h4>Create New Tourism</h4></div> <div class="pull-right">
<a href="{{ url('/admin/tourisms') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-10 panel default margin-top-p-4 p-4-t">
    
        <form enctype="multipart/form-data" id="form" action="{{ url('/admin/tourisms/store') }}" name="form" method="POST"  class="form-horizontal">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                         Provinces
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <select class="form-control"
                                name="province" id="province"
                                >
                                <option value="">--Select Gallery Type--</option>
                                @foreach($provinces as $key => $value)
                                 <option value="{{$value->id}}">{{$value->title_khmer}}</option>
                                @endforeach 
                        </select>
                    </div>
         </div>
          <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                         Gallery Type
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <select class="form-control"
                                name="gallery_type" id="gallery_type"
                                >
                                <option value="">--Select Gallery Type--</option>
                                @foreach($galleryTypes as $key => $value)
                                 <option value="{{$value->id}}">{{$value->title}}</option>
                                @endforeach 
                        </select>
                    </div>
         </div>
           <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                     Lategitude
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                                name="latitude"
                               id="latitude"
                               class="form-control"
                               placeholder="latitude" />
                    </div>
                   
            </div>
             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                     Longitude
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                                name="longitude"
                               id="longitude"
                               class="form-control"
                               placeholder="longitude" />
                    </div>
                   
            </div>
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Title Khmer
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
                      Title English
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

             {{--  <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Des Khmer
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="description_khmer"
                               id="description_khmer"
                               class="form-control"
                               placeholder="Des Khmer" />
                    </div>
            </div>  --}}
             <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Description Khmer</label>
                    <div class="col-md-5">
                    <textarea class="form-control" rows="5" id="description_khmer" name="description_khmer" placeholder="Description Khmer"></textarea>
                    </div>
                </div>  
     <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Description English</label>
                    <div class="col-md-5">
                    <textarea class="form-control" rows="5" id="description_english" name="description_english" placeholder="Description English"></textarea>
                    </div>
                </div>  
             {{--  <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Des English
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="description_english"
                               id="description_english"
                               class="form-control"
                               placeholder="Des English" />
                    </div>
            </div>  --}}
    

            <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Address Khmer
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="address_khmer"
                               id="address_khmer"
                               class="form-control"
                               placeholder="Des Khmer" />
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Address English
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="address_english"
                               id="address_english"
                               class="form-control"
                               placeholder="Des English" />
                    </div>
            </div>
                
            <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Image Upload
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6" id="imgId">
                        {{--  <input type="file"
                               name="thumbnail"
                                id="thumbnail"
                               class="form-control"
                               placeholder="File Upload" />  --}}
                               <label class="myLabel">
                                  <input type="file"
                                            name="thumbnail"
                                                id="thumbnail"
                                            class="form-control"
                                            placeholder="File Upload" />
                                <span>Image Loading</span>
                            </label>
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
                    </label>
                    <div class="col-md-5 col-sm-6">
                       <a href="{{ url('/admin/provinces') }}" class="btn btn-sm btn-danger">Discard</a>
                          {{-- <input type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save"  class="btn btn-sm btn-success upload-image" value="Save"/> --}}
                     
<button type="submit" class="btn btn-sm btn-success upload-image" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save">Save</button>

                    </div>
                </div>
        <form>   
<script src="{{ asset('app/tourism/create.js') }}"></script>

@endsection

