@extends('layouts.app')
@section('content')
<div>
<div class="col-md-10 panel panel-default container-p">

<div class="row header-title-module-p">
    <div>
        <div class="col-md-3">
            <h4>Users</h4>
        </div>
             <form name="provinceSearchForm" id="provinceSearchForm">
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
                 <a href="{{url('/admin/provinces/create')}}" class="btn btn-rb-success  btn-md">Create New</a>
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
            <th width="17%">Name</th>
            <th width="17%">Photo</th>
              <th width="10%">Activation</th>
             <th width="15%">CreateBy</th>
            <th width="10%">Action</th>
        </tr>
    </thead>
  <tbody>
    @foreach($displayUsers as $key => $value)
        <tr>
            <td>{{$value->id }}</td>
            <td>
               <div class="table-text-trail">  
               <b>{{ $value->name }}</b>
               <br>
              <span>{{ $value->email }}<span>
              <br>
              {{-- <span class="label label-{{ $value->status==1?'success':'danger'}}">{{ $value->status==1?'enable':'disable'}}</span> --}}
               </div>  
           </td>
             <td>
               <img style="width: 35%;" src="{{ asset('img/provinces') }}/{{ $value->thumbnail?$value->thumbnail:'no-images.png'}}"/>
            </td>
            <td>active</td>
             <td>
                {{$value->created_at}}
                <br>
                {{$value->created_at==$value->updated_at?'':'Last Updated'.$value->updated_at}}
            </td>
            <td>
             <div class="margin-rb-b">
                <a href="{{url('/admin/provinces/')}}/{{$value->id}}/edit"  class="btn-rb-success">Update</a>
             </div>
              <div class="margin-rb-b">
                <a href="{{url('/admin/provinces/')}}/{{$value->id}}/detail"  class="btn-rb-default">View</a>
             </div>
              <div class="margin-rb-b">
                <a href="{{url('/admin/provinces/')}}/{{$value->id}}/detail"  class="btn-rb-green">Permissions</a>
             </div>
               <a href="{{url('/admin/provinces/')}}/{{$value->id}}/show"  class="btn-rb-danger">Remove</a>
            </td>
        </tr>
    @endforeach
    </tbody>
   
</table>
</div>

<div class="container">
 {{$displayUsers}}
</div>
</div>
<div>
</div>

<script>



$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
});


$(document).ready( function() {
    $('#provinceSearchForm').bind("keypress", function(e) {
  if (e.keyCode == 13) {               
    e.preventDefault();
    return false;
  }
});
        $('#btnSearch').on('click',function(){
             if($('#searchKey').val()){
                             setTimeout(function(){ window.location = "/admin/provinces/"+$('#searchKey').val()+"/search"; }, 200);
             }else {
                 alert("Input Key Search");
                 return;
             }
         });

       $('#img-upload').css({'display':'none'});
       $('#loadingId').css({'display':'none'});
    	$(document).on('change', '.btn-file :file', function() {
              $('#loadingId').css({'display':'block'});
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
                      $('#img-upload').css({'display':'block'});
                       $('#loadingId').css({'display':'none'});
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>

@endsection