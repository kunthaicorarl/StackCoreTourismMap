@extends('layouts.app')
@section('content')
<div>
<div class="col-md-10 panel panel-default container-p">

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
             <th width="17%">Province</th>
             <th width="15%">Thumbnail</th>
             <th width="17%">GalleryType</th>
             <th width="17%">Description</th>
             <th width="15%">CreateBy</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
  <tbody>
    @foreach($displayTourisms as $key => $value)
        <tr>
            <td>{{$value->id }}</td>
            <td>
               <div class="table-text-trail">  
                  <b>{{ $value->title_khmer }}</b>
                <br>
                <span>{{ $value->title_english }}<span>
                 <br>
                <span class="label label-{{ $value->status==1?'success':'danger'}}">{{ $value->status==1?'enable':'disable'}}</span>
               </div>  
            </td>

            <td>
               <div class="table-text-trail">  
                 <b>  {{ $value->provinces->title_khmer }}</b>
                  <br>
                  <span>  {{ $value->provinces->title_english }}<span> 
               </div>  
            </td>

             <td>
               <img style="width: 35%;" src="{{ asset('img/gallerys') }}/{{ $value->thumbnail?$value->thumbnail:'no-images.png'}}"/>
             </td>
              <td>
               {{
                  $value->galleryTypes[0]->title
               }}
              </td>
               <td>
                  <div class="table-text-trail">  
                  <b>{{ $value->description_khmer }}</b>
                  <br>
                  <span>{{ $value->description_english }}<span>
                  </div>
              </td>
             <td>
                {{$value->created_at}}
                <br>
                {{$value->created_at==$value->updated_at?'':'Last Updated'.$value->updated_at}}
            </td>
            <td>
             <div class="margin-rb-b">
                <a href="{{url('/admin/tourisms/')}}/{{$value->id}}/edit"  class="btn-rb-success">Update</a>
             </div>
              <div class="margin-rb-b">
                <a href="{{url('/admin/tourisms/')}}/{{$value->id}}/detail"  class="btn-rb-default">View</a>
             </div>
               <a href="{{url('/admin/tourisms/')}}/{{$value->id}}/show"  class="btn-rb-danger">Remove</a>
             <div class="margin-rb-b" @if($value->status==1) style="display:none" @endif>
                <a href="{{url('/admin/tourisms/')}}/{{$value->id}}/enableDisplay"  class="btn-rb-default">Enable</a>
             </div>
              <div class="margin-rb-b" @if($value->status==0) style="display:none" @endif>
                <a href="{{url('/admin/tourisms/')}}/{{$value->id}}/disableDisplay"  class="btn-rb-danger">Disable</a>
             </div>
            </td>
        </tr>
    @endforeach
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