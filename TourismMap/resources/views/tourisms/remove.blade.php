@extends('layouts.app')
@section('content')

<div class="col-md-9 p-4-l p-4-r"><div class="pull-left">
<h4>Confirm Remove Province</h4></div> <div class="pull-right">
</div></div>
    <div class="col-md-9 panel default margin-top-p-4 p-4-t">
        <form name="provinceForm" novalidate role="form" class="form-horizontal">
      <div class="form-group"><label class="col-md-5 control-label pull-left">
                   Are you sure to Remove this ??
                    </label></div>
            
                  <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                       <a href="{{ url('/admin/provinces') }}" class="btn btn-sm btn-danger">Discard</a>
                        <button class="btn btn-sm btn-success">Save</button>
                    </div>
                </div>
        <form>
    </div>

@endsection

