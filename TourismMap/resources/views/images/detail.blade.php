@extends('layouts.app')
@section('content')

<div class="col-md-10 p-4-l p-4-r"><div class="pull-left">
<h4>View Gallery Type Detail</h4></div> <div class="pull-right">
<a href="{{ url('/admin/gallerys') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-10 panel default margin-top-p-4 p-4-t">
        <form name="userForm" novalidate role="form" class="form-horizontal">
          <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                    Name
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6 text-m-6">
                        {{$galleryType->title}}
                    </div>
            </div>
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Description
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6 text-m-6">
                      {{$galleryType->description}}
                    </div>
             </div>
        <form>
    </div>

@endsection

