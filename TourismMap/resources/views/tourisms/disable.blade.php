@extends('layouts.app')
@section('content')

 <div class="col-md-10 p-4-l p-4-r mob-back-h"><div class="pull-left">
<h4>Disable  Tourism Confirm</h4></div> <div class="pull-right">
<a href="{{ url('/admin/tourisms') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

<div class="col-md-10 p-4-l p-4-r"><div class="pull-left">
</div></div>
    <div class="col-md-10 panel default margin-top-p-4 p-4-t">
        <form name="form" action="{{url('admin/tourisms/disable')}}" id="form" method="POST" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="_id" value="{{ $tourism->id }}">
           <div class="form-group"><label class="col-md-5 control-label pull-left">
                   Are you sure to Disable this ??
                    </label></div>
               
                  <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                       <a href="{{ url('/admin/tourisms') }}" class="btn btn-sm btn-danger">Discard</a>
                        <button type="submit" class="btn btn-sm btn-success form-submit">Save</button>
                    </div>
                </div>
        <form>
    </div>
<script src="{{ asset('app/tourism/remove.js') }}"></script>
@endsection

