@extends('layouts.app')
@section('content')

<div class="col-md-10 p-4-l p-4-r mob-back-h"><div class="pull-left">
<h4>Create New Gallery</h4></div> <div class="pull-right">
<a href="{{ url('/admin/gallerys') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-10 panel default margin-top-p-4 p-4-t">
      <form  id="galleryTypeForm" method="POST" action="{{url('/admin/gallerys/store')}}" name="galleryTypeForm" class="form-horizontal"> 
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title"/>
                            </div>
                        </div>

                       <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Description</label>

                            <div class="col-md-6">
                            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                            </div>
                        </div>                  
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <a href="/admin/gallerys"  class="btn btn-rb-danger">
                                   Discard
                                </a>
                               <button type="submit" class="btn-rb-success galleryTypeSubmit" id="load" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Save">Save</button>
                            </div>
                        </div>
                    </form>
    </div> 
<script src="{{ asset('app/gallery/unSaveConfirm.js') }}"></script>
<script src="{{ asset('app/gallery/create.js') }}"></script>

@endsection

