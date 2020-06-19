@extends('layouts.head')
@section('content')
  <div class="content-wrapper">
      <section class="content">
          <div class="row row-main">
              <div class="container-fluid">
                  <section class="col-lg-12 connectedSortable">
                      <div class="col-md-12">
                          <div class="card card-success">
                              <div class="card-body">
                                  <div class="offset-md-5"></div>
                                        <div class="offset-md-2"></div>
                                        <div class="col-md-12 map">
                                        
                                            <div id="map_canvas"></div>                                           
                                                                       
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </section>
              </div>
          </div>
      </section>
  </div>
  
    <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBJNL4UPbFH1CroiFiCcYRXPTyjy1q9mIA') }}" type="text/javascript" asyncdefer></script>
    
        <script src="{{ url('https://code.jquery.com/jquery-3.4.1.slim.min.js') }}" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
        <script type="text/javascript" src="{{ asset('/assets/plugins/api/ruler.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/assets/plugins/api/labels.js') }}"></script>
    
    <script>
        var map;
        function startMap() {
				var myOptions = {
                    zoom: 6,
                    center: {lat: 16.5178, lng: 104.121},
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
				};
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			}
        startMap();
        addruler();
        
    
    </script>

@endsection
