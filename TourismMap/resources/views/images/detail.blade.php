@extends('layouts.app')
@section('content')

<div class="col-md-10 p-4-l p-4-r"><div class="pull-left">
<h4>View Image Detail</h4></div> <div class="pull-right">
<a href="{{ url('/admin/images') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-10 panel default margin-top-p-4 p-4-t">
        <form name="userForm" novalidate role="form" class="form-horizontal">
          <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                    Gallery Type :
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6 text-m-6">
                        {{$galleryType->title}}
                    </div>
            </div>
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Image title : 
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6 text-m-6">
                      {{$image->title}}
                    </div>
             </div>
             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Image Name : 
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6 text-m-6">
                      {{$image->name}}
                    </div>
             </div>
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Caption: 
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6 text-m-6">
                      {{$image->caption}}
                    </div>
             </div>
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Image Folder : 
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6 text-m-6">
                      {{$image->url}}
                    </div>
             </div>
             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Image Alt Text : 
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6 text-m-6">
                      {{$image->alt_text}}
                    </div>
             </div>
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Created At : 
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6 text-m-6">
                      {{$image->created_at}}
                    </div>
             </div>
          
        <form>
    </div>

@endsection

