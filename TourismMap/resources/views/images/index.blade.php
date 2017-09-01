@extends('layouts.app')
@section('content')

<div>
<div class="col-md-10 panel panel-default container-p">

<div class="row header-title-module-p">
    <div>
        <div class="col-md-3">
            <h4>Image</h4>
        </div>
             <form name="gallerySearchForm" id="gallerySearchForm">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="col-md-7 col-md-offset-2">
               <div class="col-md-10 header-title-module-p-btn-23">
               <div class="input-group">
               <input type="text" placeholder="Search" ng-model="searchKey" name="searchKey" id="searchKey" title="" tooltip=""  class="form-control form-control-rb">
                <span id="btnSearch" class="input-group-addon" >Search</span>
                </div>
                </div>
                 <div class="col-md-2">
                 {{-- <button data-toggle="modal" data-target="#create-user" class="btn btn-success btn-sm">Create New</button> --}}
                 <a href="{{url('/admin/images/create')}}" class="btn btn-rb-success  btn-md">Create New</a>
                 </div>


                 </div>
                 </form>
    </div>
</div>


<div class="row header-title-module-p">
    <div>
        <div class="col-md-3">
           <form name="gallerySearchForm" id="gallerySearchForm">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                         Gallery Type
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <select class="form-control"
                                name="gallery_type_id" id="gallery_type_id"
                                >
                                <option value="">--Select Gallery Type--</option>
                                @foreach($galleryTypes as $key => $value)
                                 <option value="{{$value->id}}">{{$value->title}}</option>
                                @endforeach 
                        </select>
                    </div>
         </div>
        </div>
            
    </div>
</div>

<div class="row ">
<div class="table-responsive">
<table class="table table-condensed">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="17%">Title</th>
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
                <a href="{{url('/admin/gallerys/')}}/{{$value->id}}/edit"  class="btn-rb-success">Update</a>
             </div>
              <div class="margin-rb-b">
                <a href="{{url('/admin/gallerys/')}}/{{$value->id}}/detail"  class="btn-rb-default">View</a>
             </div>
              {{-- <div class="margin-rb-b">
                <a href="{{url('/admin/provinces/')}}/{{$value->id}}/detail"  class="btn-rb-green">Permissions</a>
             </div>
               <a href="{{url('/admin/provinces/')}}/{{$value->id}}/show"  class="btn-rb-danger">Remove</a> --}}
            </td>
        </tr>
    @endforeach
    </tbody>
   
</table>
</div>

<div class="row">
<div class="container">
 {{$displayImage}}
</div>
</div>
</div>
<div>
</div>
  <script src="{{ asset('app/gallery/searchGallery.js') }}"></script> 
@endsection