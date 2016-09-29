@extends('layout')
 
@section('content')
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            There were some problems adding the category.<br />
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-lg-7">
                         <form action="addMeter_submit" method="get" accept-charset="utf-8 " class="form-group">
                            <div class="col-lg-12 form-group">
                             <input type="text" name="meterNo" value="" class="form-control" placeholder="Enter Meter Number" required> 
                            </div>
                             <div class="col-lg-12 form-group">
                                <input type="text" name="meter_number" value="" class="form-control" placeholder="Please enter the meter number" required>
                            </div>
                            <div class="col-lg-12 form-group">
                            <select name="customerId" class="form-control">
                             @foreach($data as $row)
                                <option value="{{$row->DCLink}} "> {{$row->Name}} </option>
                             @endforeach
                            </select>
                            </div>
                           
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label>Place it on the Map</label>

                                <div class="well">
                                 <div id="myMap" style="width: 100%; height: 380px "></div>

                                 <h4 class="label label-primary">Move the pin to the precise location of the property, then zoom to get the precise location.</h4>
                                 </div></div>
                                 
                                 <div class="form-group">
                                <input id="address" class="form-control"  type="text" />
                                 <br/></div>
                                 
                                <div class="form-group">
                                <input class="form-control" id="latitude" type="text" name="latitude"  placeholder="Latitude"/> 
                                </div>

                                <div class="form-group">
                                 <input class="form-control"  id="longitude" type="text" name="longitude" placeholder="Longitude"/>
                                </div> 
                            </div>
                               
                            <div class="col-lg-12 form-group">   
                            <button type="button" name="" value="" class="btn btn-info" >Save Data</button>
                            </div>


                         </form>
                </div>
                <div class="col-lg-8">


                </div>       

                </div>
                <!-- /.row -->
 


@stop



@section('foot')

//change the plugin key
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBIL_hk8jO3XiAhG9OfimL6PC339lJVKEY"></script>
</script>
        <script type="text/javascript"> 
            var map;
            var marker;
            var myLatlng = new google.maps.LatLng(-0.15655498097406856, 37.31048583984375);
            var geocoder = new google.maps.Geocoder();
            var infowindow = new google.maps.InfoWindow();
            function initialize(){
                var mapOptions = {
                    zoom: 6,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
               
                map = new google.maps.Map(document.getElementById("myMap"), mapOptions);
                
                marker = new google.maps.Marker({
                    map: map,
                    position: myLatlng,
                    draggable: true 
                });     
                
                geocoder.geocode({'latLng': myLatlng }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#address').val(results[0].formatted_address);
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });

                               
                google.maps.event.addListener(marker, 'dragend', function() {

                geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#address').val(results[0].formatted_address);
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
            });
            
            }
            
            google.maps.event.addDomListener(window, 'load', initialize);

            
            </script>           
            
            

@stop