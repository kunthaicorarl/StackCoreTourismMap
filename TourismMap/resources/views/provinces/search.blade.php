@extends('layouts.app')
@section('content')
<div>
<div class="col-md-10 p-4-l p-4-r"><div class="pull-left">
<h4>Province</h4></div> <div class="pull-right">
<a href="{{ url('/admin/provinces') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

<div class="col-md-10 panel panel-default container-p">

<div class="row header-title-module-p">
    <div>
        <div class="col-md-6">
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
            <th width="17%">Description</th>
             <th width="15%">Thumbnail</th>
             <th width="15%">CreateBy</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
  <tbody>
    @foreach($displayProvinces as $key => $value)
        <tr>
            <td>{{$value->id }}</td>
            <td>
               <b>{{ $value->title_khmer }}</b>
               <br>
              <span>{{ $value->title_english }}<span>
              <br>
              <span class="label label-{{ $value->status==1?'success':'danger'}}">{{ $value->status==1?'enable':'disable'}}</span>
            </td>
            <td>
               <b>{{ $value->description_khmer }}</b>
               <br>
              <span>{{ $value->description_english }}<span>
            </td>
             <td>
               <img style="width: 35%;" src="{{ asset('img/provinces') }}/{{ $value->thumbnail?$value->thumbnail:'no-images.png'}}"/>
            </td>
             <td>
                {{$value->created_at}}
                <br>
                {{$value->created_at==$value->updated_at?'':'Last Updated'.$value->updated_at}}
            </td>
            <td>
              <a href="{{url('/admin/provinces/')}}/{{$value->id}}/edit"  class="btn btn-sm btn-rb-success">Update</a>
                 <div class="margin-rb-b">
                <a href="{{url('/admin/provinces/')}}/{{$value->id}}/detail"  class="btn-rb-default">View</a>
             </div>
             <a href="{{url('/admin/provinces/')}}/{{$value->id}}/show"  class="btn btn-sm btn-rb-danger">Remove</a>
            </td>
        </tr>
    @endforeach
    </tbody>
   
</table>
</div>
<div class="row">
 <div class="container">
  {{$displayProvinces}}
 </div>
</div>
</div>
<div>
</div>





@endsection