@extends('layouts.app')
@section('content')

<div class="col-md-9 p-4-l p-4-r"><div class="pull-left">
<h4>Create New Province</h4></div> <div class="pull-right">
<a href="{{ url('/admin/provinces') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-9 panel default margin-top-p-4 p-4-t">
        <form name="provinceForm" novalidate role="form" class="form-horizontal">
          <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Postal Code
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="postalCode"
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
                               name="postalCode"
                               
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
                               name="postalCode"
                               
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
                               name="postalCode"
                               
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
                               name="postalCode"
                               
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
                               name="postalCode"
                               
                               class="form-control"
                               placeholder="File Upload" />
                    </div>
            </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                         Status
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <select class="form-control"
                                name="holidayType"
                                >
                            <option value="">Enable</option>
                               <option value="">Disable</option>
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
                      <button class="btn btn-sm btn-success">Save</button>
                       <a href="{{ url('/admin/provinces') }}" class="btn btn-sm btn-danger">Discard</a>
                      
                    </div>
                </div>
        <form>
    </div>

@endsection

