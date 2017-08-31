@extends('layouts.app')
@section('content')

<div class="col-md-9 p-4-l p-4-r"><div class="pull-left">
<h4>Confirm Remove Image</h4></div> <div class="pull-right">
</div></div>
    <div class="col-md-9 panel default margin-top-p-4 p-4-t">
        <form name="form" id="form" action="{{ url('/admin/images/destroy') }}" class="form-horizontal">
      <div class="form-group"><label class="col-md-5 control-label pull-left">
                   Are you sure to Remove this {{$image->title}}??
                    </label></div>

                       <div class="form-group">
                       <label class="col-md-5 control-label pull-left">
                      <img src="{{asset($image->url)}}/{{$image->name}}" width="150px"/>
                    </label>
                    <label>
                    from Gallery : <b>{{$gallerType->title}}</b>
                    </label>
                       </div>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="_id" value="{{ $image->id }}">
   
                  <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                       <a href="{{ url('/admin/images') }}" class="btn btn-sm btn-danger">Discard</a>
                        <button type="submit" class="btn btn-sm btn-success">Save</button>
                    </div>
                </div>
        <form>
    </div>
<script src="{{ asset('app/image/remove.js') }}"></script>
@endsection

