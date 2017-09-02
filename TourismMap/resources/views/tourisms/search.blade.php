@extends('layouts.app')
@section('content')
<div>
<div class="col-md-10 panel panel-default container-p">
<script>
var EnableUri="{{url('/admin/tourisms/enable')}}";
var _urlCurrentPage="{{url('/admin/tourisms')}}";
var DisableUri="{{url('/admin/tourisms/disable')}}";
var _token='{{ csrf_token() }}';
console.log(
    EnableUri,
_urlCurrentPage,
_token);
</script>
<div>
<div class="col-md-12 p-4-l p-4-r"><div class="pull-left">
<h4>Tourisms</h4></div> <div class="pull-right">
<a href="{{ url('/admin/tourisms') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>
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
                {{--  <a href="{{url('/admin/tourisms/')}}/{{$value->id}}/enable"  class="btn-rb-default">Enable</a>  --}}
                 <a href="javascript:;" id="removeId" data-id="{{$value->id}}" class="btn-rb-success">Enable</a>           
             </div>
              <div class="margin-rb-b" @if($value->status==0) style="display:none" @endif>
                <a href="javascript:;" id="disableId" data-id="{{$value->id}}" class="btn-rb-banning">Disable</a>           
             </div>
            </td>
        </tr>
    @endforeach
    </tbody>
   
</table>

</div>

<script src="{{ asset('app/tourism/ajaxSweetAlertEnable.js') }}"></script>
<script src="{{ asset('app/tourism/ajaxSweetAlertDisable.js') }}"></script>
@endsection