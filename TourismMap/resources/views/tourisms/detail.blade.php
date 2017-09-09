@extends('layouts.app')
@section('content')

<div class="col-md-9 p-4-l p-4-r"><div class="pull-left">
<h4>Tourism Detail</h4></div> <div class="pull-right">
<a href="{{ url('/admin/tourisms') }}" class="btn btn-default btn-sm">
<i class="fa fa-arrow-left"></i>
           Back
    </a></div></div>

    <div class="col-md-9 panel default margin-top-p-4 p-4-t">
        <form name="provinceForm" novalidate role="form" class="form-horizontal">
          <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Province Name 
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        {{$tourism->provinces->title_khmer}}
                      
                    </div>
            </div>
              <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Title Khmer
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                      កំពុងចាម
                    </div>
            </div>
                
                <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Title English
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        Khom Pongcham
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                      Des Khmer
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        ជាខេត្តមានសក្តានុពលម្រេច
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Des English
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        This  is much propper
                    </div>
            </div>
                
                 <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                       Image Upload
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <img style="width: 100%;" src="http://img10.deviantart.net/1642/i/2015/171/8/4/the_lord_of_darkness_by_imge-d8y0ci4.jpg"/>
                    </div>
            </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                         Status
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        Enable
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                     Latigute
                        <span class="required"></span>
                    </label>
                    <div class="col-md-5 col-sm-6">
                        <input type="text"
                               name="postalCode"
                               
                               class="form-control"
                               placeholder="Latigute" />
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 col-sm-4 control-label">
                        <span class="required"></span>
                    </label>
                    <div class="col-md-7 col-sm-6">
                        <div id="map"></div>
                    </div>
                </div>
                 
        <form>
    </div>
<script>
       function initMap() {
        var cairo = {lat: 11.5568408, lng: 104.9063004};

        var map = new google.maps.Map(document.getElementById('map'), {
          scaleControl: true,
          center: cairo,
          zoom:11,
          zoomControl: false,
         scaleControl: false,
       scrollwheel: false,
       disableDoubleClickZoom: true,
        });
      
       var infoImage=[
          'Chicago, IL',
          'LatLng: ' + cairo.lat,
          'Zoom level: ' + 11,
          'World Coordinate: ' + 1,
          'Pixel Coordinate: ' + 1,
          'Tile Coordinate: ' + 1
        ].join('<br>');
        
        var inforImage=[];
            

        var infowindow = new google.maps.InfoWindow;
         infowindow.setContent(infoImage);
     
        var marker = new google.maps.Marker({map: map, position: cairo});
          infowindow.open(map, marker);
     //   marker.addListener('click', function() {
        //  infowindow.open(map, marker);
      //  });
      
      }

    </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJBGKGXeJjiVm7yfHW9jnm0TM34yJf8CI&callback=initMap"
    async defer></script>
@endsection

