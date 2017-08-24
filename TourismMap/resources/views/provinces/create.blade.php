@extends('layouts.app')
@section('content')

<div class="col-md-10 p-4-l p-4-r mob-back-h"><div class="pull-left">
<h4>Create New Province</h4></div> <div class="pull-right">
<a href="{{ url('/admin/provinces') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-10 panel default margin-top-p-4 p-4-t">
    
        <form enctype="multipart/form-data" id="provinceForm" action="{{ url('/admin/provinces/store') }}" name="provinceForm" method="POST"  class="form-horizontal">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

             <div class="form-group">
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
            </div>

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
                         Status
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <select class="form-control"
                                name="status"
                                >
                            <option value="Enable">Enable</option>
                               <option value="Disable">Disable</option>
                        </select>
                    </div>
                </div>
                 <div class="form-group">
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
                </div>
                  <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                       <a href="{{ url('/admin/provinces') }}" class="btn btn-sm btn-danger">Discard</a>
                          {{-- <input type="submit" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save"  class="btn btn-sm btn-success upload-image" value="Save"/> --}}
                     
<button type="submit" class="btn btn-sm btn-success upload-image " id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save">Save</button>

                    </div>
                </div>
        <form>
       
<script src="{{ asset('app/province/create.js') }}"></script>
<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
.modal{
        padding-left: 500px;
}
</style>
@endsection

