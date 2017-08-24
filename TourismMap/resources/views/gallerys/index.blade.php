@extends('layouts.app')
@section('content')
<div>
<div class="col-md-10 panel panel-default container-p">

<div class="row header-title-module-p">
    <div>
        <div class="col-md-3">
            <h4>Galleries</h4>
        </div>
             <form name="userSearchForm" id="userSearchForm">
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
                 <a href="{{url('/admin/users/create')}}" class="btn btn-rb-success  btn-md">Create New</a>
                 </div>


                 </div>
                 </form>
    </div>
</div>
<div class="row ">
<div class="table-responsive">
<table class="table table-condensed">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="17%">Title</th>
              <th width="17%">Description</th>
            <th width="15%">CreateBy</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
  <tbody>
    @foreach($displayGallerys as $key => $value)
        <tr>
            <td>{{$value->id }}</td>
            <td>
               <div class="table-text-trail">  
               {{ $value->name }}
                </div>  
                <div class="table-text-trail">  
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
                <a href="{{url('/admin/users/')}}/{{$value->id}}/edit"  class="btn-rb-success">Update</a>
             </div>
              <div class="margin-rb-b">
                <a href="{{url('/admin/users/')}}/{{$value->id}}/detail"  class="btn-rb-default">View</a>
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
 {{$displayGallerys}}
</div>
</div>
</div>
<div>
</div>
  <script src="{{ asset('app/user/searchUser.js') }}"></script> 
@endsection