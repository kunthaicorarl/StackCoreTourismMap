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
<br/>
<h4>Image List</h4> 
<a class="btn btn-sm btn-success" href="{{url('/admin/gallerys')}}/{{$galleryType->id}}/addimage">
Add Image
<a>
<hr/>
         <div class="col-md-offset-0 col-md-12">
<div class="table-responsive">
<table class="table table-condensed">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="5%">Title</th>
            <th width="15%">CreateBy</th>
            <th width="5%">Action</th>
        </tr>
    </thead>
  <tbody>
 @foreach($displayImage as $key => $value)
        <tr>
            <td>{{$value->id }}</td>
            <td>
              <img src="{{asset($value->url)}}/{{$value->name}}" width="150px"/>
               <div class="table-text-only-trail title-font">  
               {{ $value->title }}
                </div>  
                <div class="table-text-only-trail subtitle-font">  
                {{ $value->description }}
                </div>  
           </td>
             <td>
                {{$value->created_at}}
                <br>
                {{$value->created_at==$value->updated_at?'':'Last Updated'.$value->updated_at}}
            </td>
            <td>
             <div class="margin-rb-b">
                <a href="{{url('/admin/gallerys/')}}/{{$value->id}}/updateimage"  class="btn-rb-success">Update</a>
             </div>
              {{--  <div class="margin-rb-b">
                <a href="{{url('/admin/gallerys/')}}/{{$value->id}}/detail"  class="btn-rb-default">View</a>
             </div>  --}}
              <a href="javascript:;" id="removeId" data-id="{{$value->id}}" class="btn-rb-danger">Remove</a>           
            </td>
        </tr>
    @endforeach
    </tbody>
   
</table>
</div>
<script src="{{ asset('app/gallery/ajaxSweetAlertDelete.js') }}"></script>
    </div>




@endsection

