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
                 <a href="{{url('/admin/provinces/create')}}" class="btn btn-success btn-sm">Create New</a>
                 </div>
                 </div>
    </div>
</div>
<div class="row ">
<table class="table table-condensed">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="17%">Tourism Place</th>
            <th width="17%">Province Name</th>
              <th width="17%">Client Name</th>
               <th width="17%">Description</th>
                <th width="17%">Location</th>
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
       $('#img-upload').css({'display':'none'});
       $('#loadingId').css({'display':'none'});
       loadingId
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