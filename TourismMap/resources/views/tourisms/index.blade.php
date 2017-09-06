@extends('layouts.app')
@section('content')
<div>
<div class="col-md-9 panel panel-default container-p">

<div class="row header-title-module-p">
    <div>
        <div class="col-md-6">
            <h4>Tourisms</h4>
        </div>
               <div class="col-md-6">
               <div class="col-md-10 header-title-module-p-btn-23">
               <div class="input-group"><input type="text" placeholder="Search" ng-change="searchDB()" ng-model="searchText" name="table_search" title="" tooltip="" data-original-title="Min character length is 3" class="form-control input-sm ng-valid ng-dirty">
                <span class="input-group-addon">Search</span>
                </div>
                </div>
                 <div class="col-md-2">
                 {{-- <button data-toggle="modal" data-target="#create-user" class="btn btn-success btn-sm">Create New</button> --}}
                 <a href="{{url('/admin/tourisms/create')}}" class="btn btn-success btn-sm">Create New</a>
                 </div>
                 </div>
    </div>
</div>
<div class="row ">
<table class="table table-condensed">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="17%">Title</th>
            <th width="17%">Description</th>
             <th width="15%">CreateBy</th>
            <th width="5%">Status</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>DDD</td>
            <td>DDDD</td>
            <td>DDDD</td>
             <td>DDDD</td>
            <td>
            <button data-toggle="modal" ng-click="edit(value.id)" data-target="#edit-data" class="btn btn-sm btn-primary">Update</button>
            <a href="{{url('/admin/provinces/show')}}"  class="btn btn-sm btn-danger">Remove</a>
            </td>
        </tr>
    </tbody>
</table>
</div>
<div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <form method="POST" action="{{url('/admin/provinces/store')}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Province</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Post Code</label>
            <input type="text" class="form-control" name="postalCode" id="postalCode">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Tittle KH</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="form-control-label">Tittle EN</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
        <div class="form-group">
                <label>Upload Image</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Browse… <input type="file" name="user_photo" id="imgInp">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                </div>
                <img id='img-upload'/>
                <h1 id="loadingId">Loading....</h1>
            </div>

          <div class="form-group">
            <label for="message-text" class="form-control-label">Des KH:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
         <div class="form-group">
            <label for="message-text" class="form-control-label">Des EN:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
        <input type="submit" class="btn btn-primary" value="Save"/>
      </div>
    </div>
  </div>
</div>
 </form>
</div>
@endsection