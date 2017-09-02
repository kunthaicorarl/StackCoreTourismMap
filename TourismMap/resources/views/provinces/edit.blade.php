@extends('layouts.app')
@section('content')
<div class="col-md-10 p-4-l p-4-r"><div class="pull-left">
<h4>Edit Province</h4></div> <div class="pull-right">
<a href="{{ url('/admin/provinces') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

  <div class="col-md-10 panel default margin-top-p-4 p-4-t">
          <form enctype="multipart/form-data" id="provinceForm" action="{{ url('/admin/provinces/update') }}" name="provinceForm" method="Post"  class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" id="_thumbnail" name="_thumbnail" value="{{ $province->thumbnail }}">
               <input type="hidden" name="_id" value="{{ $province->id }}">
               {{--  <input type="hidden" name="status" value="{{ $province->status==1?'Enable':'Disable' }}">
                 --}}
            <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Postal Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="postal_code"
                               id="postal_code"
                               class="form-control"
                               value="{{$province->postal_code}}"
                               placeholder="Postal Code" />
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
                                value="{{$province->title_khmer}}"
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
                                 value="{{$province->title_english}}"
                               placeholder="Title English" />
                    </div>
            </div>
{{--  
             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Des Khmer
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="description_khmer"
                               id="description_khmer"
                                value="{{$province->description_khmer}}"
                               class="form-control"
                               placeholder="Des Khmer" />
                    </div>
            </div>  --}}
            <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Description Khmer</label>
                    <div class="col-md-5">
                    <textarea class="form-control" rows="5" id="description_khmer" name="description_khmer" placeholder="Description English">{{$province->description_khmer}}</textarea>
                    </div>
                </div>  
{{--  
             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Des English
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="description_english"
                               id="description_english"
                               class="form-control"
                                value="{{$province->description_english}}"
                               placeholder="Des English" />
                    </div>
            </div>  --}}
                 <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Description English</label>
                    <div class="col-md-5">
                    <textarea class="form-control" rows="5" id="description_english" name="description_english" placeholder="Description English">{{$province->description_english}}</textarea>
                    </div>
                </div>  
                
                 {{--  <div class="form-group">
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
            </div>  --}}
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Image Upload
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
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
                         <img id="preview" src="{{ asset('img/provinces/') }}/{{$province->thumbnail}}" style=" width: 100%;"/>
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
                         Status
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <select class="form-control"
                                name="status"          
                                >
                       <option value="Enable" {{$province->status==1?'selected':''}}>Enable</option>
                       <option value="Disable" {{$province->status!=1?'selected':''}}>Disable</option>     
                               
                        </select>
                    </div>
                </div>
                 {{--  <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                     Latigute,Longitude
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="postalCode"
                               
                               class="form-control"
                               placeholder="Latigute" />
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                     Longitude
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="postalCode"
                               
                               class="form-control"
                               placeholder="Longitude" />
                    </div>
                </div>  --}}
                  <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                       <a href="{{ url('/admin/provinces') }}" class="btn btn-sm btn-danger">Discard</a>
                          <input type="submit" class="btn btn-sm btn-success upload-image" value="Save"/>
                      
                    </div>
                </div>
         <form>
  </div>
   <script src="{{ asset('app/province/create.js') }}"></script>
@endsection