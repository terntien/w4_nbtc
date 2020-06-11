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
                                        
                                        <div id="map"></div>  
                                        <div id="map_canvas">      
                                                                           
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
    
<script>

      var flightPath;
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

        function initMap() {
          var map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 16.5178, lng: 104.121},
              zoom: 7,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
          });
          var infoWindow = new google.maps.InfoWindow;
          // Change this depending on the name of your PHP or XML file
          downloadUrl('/xml-marker', function(data) {
                parser = new DOMParser();
                xml = parser.parseFromString(data.responseText, "text/xml");
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                console.log(markerElem);
                var id = markerElem.getAttribute('id');
            //     var image = markerElem.getAttribute('image');
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
</script>

<script async defer src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBJNL4UPbFH1CroiFiCcYRXPTyjy1q9mIA&callback=initMap') }}" type="text/javascript" asyncdefer></script>
@endsection
