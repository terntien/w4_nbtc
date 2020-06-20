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
                                            <div id="floating-panel">
                                                <b>Start: </b>
                                                <select id="map-distance-start">
                                                    <option value="">เลือกจุดเริ่มวัด</option>
                                                    @foreach($tower as $row)
                                                        <option value="{{$row->LATDEG}},{{$row->LONGDEG}}">{{$row->namecus}} : {{$row->towers_license_code}} </option>
                                                    @endforeach
                                                </select>

                                                <b>End: </b>
                                                <select id="map-distance-end">
                                                    <option value="">เลือกจุดสิ้นสุดการวัด</option>
                                                    @foreach($tower as $row)
                                                        <option value="{{$row->LATDEG}},{{$row->LONGDEG}}">{{$row->namecus}} : {{$row->towers_license_code}} </option>
                                                    @endforeach
                                                </select>
                                                <input onclick="removeLine();" type=button value="ลบระยะทางทั้งหมด">
 
                                            </div>
                                   
                                        <div id="map"></div>  
                                                                   
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
        var custom = {
            0: {
                label: 'null',
            },
            1:{
                label: 'TOT',
            },
            2: {
                label: 'D-TAC',
            },
            3: {
                label: 'CAT',
            },
            4: {
                label: 'FM',
            },
            5: {
                label: 'TRUE'
            }
        };
        
        var map;
        function initMap() {
            var origin = {lat: 16.432194, lng: 103.914167};
            var myOptions = {
                zoom: 10,
                center: origin,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
            };
            map = new google.maps.Map(document.getElementById("map"), myOptions);
            
            var infoWindow = new google.maps.InfoWindow;

            downloadUrl('/xml-marker', function(data) {
            parser = new DOMParser();
            xml = parser.parseFromString(data.responseText, "text/xml");
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                console.log(markerElem);
                var id = markerElem.getAttribute('id');
                var typeleaf = markerElem.getAttribute('typeleaf');
                var sending = markerElem.getAttribute('sending');
                var parish = markerElem.getAttribute('parish');
                var district = markerElem.getAttribute('district');
                var pravince = markerElem.getAttribute('pravince');
                var code = markerElem.getAttribute('code');
                var customer = markerElem.getAttribute('customer');
                var network = markerElem.getAttribute('network');
                var license_code = markerElem.getAttribute('license_code');
                var license_date = markerElem.getAttribute('license_date');
                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));
                var infowincontent = `
                    <div class="conn-info-tower">
                    <table class="table" >
                        <thead>
                        <tr>
                            <th scope="col" width="120px" class="text-right">หัวข้อ</th>
                            <th scope="col">รายละเอียด</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row" class="text-right">ประเภทใบตั้ง</th>
                            <td>${typeleaf}</td>
                        </tr>
                        
                        <tr>
                            <th scope="row" class="text-right">ที่อยู่</th>
                            <td>ตำบล${parish} อำเภอ${district} จังหวัด${pravince} ${code}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">รหัสใบอนุญาต</th>
                            <td>${license_code}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">วันขอใบอนุญาต</th>
                            <td>${license_date}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                `;
                    var icon = custom[customer] || {};
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        label: icon.label
                    });
                    marker.addListener('click', function() {
                        infoWindow.setContent(infowincontent);
                        infoWindow.open(map, marker);
                    });

                });  
 
            });
        }
        initMap();

         
        function addruler(lat,lng,lat2,lng2) {

            ruler1 = new google.maps.Marker({
                position: new google.maps.LatLng(
                    parseFloat(lat),
                    parseFloat(lng)
                ),
                map: map,
                draggable: true
            });
            

            ruler2 = new google.maps.Marker({
                position: new google.maps.LatLng(
                    parseFloat(lat2),
                    parseFloat(lng2)
                ),
                map: map,
                draggable: true,

            });
           
        
            var ruler1label = new Label({ map: map });
            var ruler2label = new Label({ map: map });
            
            ruler1label.bindTo('position', ruler1, 'position');
            ruler2label.bindTo('position', ruler2, 'position');
 
            rulerpoly = new google.maps.Polyline({
                path: [ruler1.position, ruler2.position] ,
                strokeColor: "#FFFFF",
                strokeOpacity: .7,
                strokeWeight: 8
            });
          

            // marker map distance
            rulerpoly.setMap(map);
            ruler1label.set('text',distance( ruler1.getPosition().lat(), ruler1.getPosition().lng(), ruler2.getPosition().lat(), ruler2.getPosition().lng()));
            ruler2label.set('text',distance( ruler1.getPosition().lat(), ruler1.getPosition().lng(), ruler2.getPosition().lat(), ruler2.getPosition().lng()));
        }
        // addruler('16.432194','102.823624','16.483228','102.830085');
       
        function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };
            request.open('GET', url, true);
            request.send(null);
        }
        function doNothing() {}  

        
    
        $('#map-distance-start , #map-distance-end').change(function (e) { 
            
            var start = $('#map-distance-start').val();
            var end = $('#map-distance-end').val();
            
            if (start == '') {
                alert('โปรดเลือกจุดหมาย Start เพื่อวัดระยะทาง');
                return;
            }
            if (end == '') {
                alert('โปรดเลือกจุดหมาย End เพื่อวัดระยะทาง');
                return;
            }
            
          
            
            if (start != '' && end != '') {
                if (start == end) {
                    alert('ไม่สามารถวัดระยะทางได้ เนื่องเป็นจุดเดียวกัน');
                    return;
                } else {
                    start = start.split(',');
                    end = end.split(',');
                    console.log(start , end);
                    addruler(start[0],start[1],end[0],end[1]); 
                    
                } 
                
            }
            ruler1.setMap(null);
            ruler2.setMap(null);
        });
        function removeLine() {
            window.location.reload();
        }
       
            
		
    </script>
    @endsection
