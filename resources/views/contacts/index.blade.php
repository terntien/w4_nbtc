@extends('layouts.head')
@section('content')

<div class="content-wrapper">
        <section class="content">
            <div class="row row-main">
                <div class="col-md-12 logo text-center">
                    <img src="../assets/image/nbtc_bg.jpg" alt="logonbtc">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <section class="col-lg-12 connectedSortable">
                            <div class="col-md-12">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">ติดต่อเรา</h3>
                                    </div>
                                    <div class="card-body">
                                    <!DOCTYPE html>
                                        <html>
                                        <head>
                                            <style>
                                            /* Set the size of the div element that contains the map */
                                            #map {
                                                height: 300px;  /* The height is 400 pixels */
                                                width: 100%;  /* The width is the width of the web page */
                                            }
                                            </style>
                                        </head>
                                        <body>
                                           
                                            <!--The div element for the map -->
                                            <div id="map"></div>
                                            <script>
                                        // Initialize and add the map
                                        function initMap() {
                                        // The location of Uluru
                                        var Khonkaen = {lat: 16.479497, lng: 102.802433};
                                        // The map, centered at Uluru
                                        var map = new google.maps.Map(
                                            document.getElementById('map'), {zoom: 16, center: Khonkaen});
                                        // The marker, positioned at Uluru
                                        var marker = new google.maps.Marker({position: Khonkaen, map: map});
                                        }
                                            </script>
                                            <!--Load the API from the specified URL
                                            * The async attribute allows the browser to render the page while the API loads
                                            * The key parameter will contain your own API key (which is not needed for this tutorial)
                                            * The callback parameter executes the initMap() function
                                            -->
                                            <script async defer
                                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJNL4UPbFH1CroiFiCcYRXPTyjy1q9mIA&callback=initMap">
                                            </script>
                                        </body>
                                        </html>
                                        <div class="form-group">
                                         @if(session()->get('success'))
                                            <div class="alert alert-success">
                                            {{ session()->get('success') }}  
                                            </div>
                                        @endif

                                       
                                    
                                            <table class="table" width="100%">
                                               
                                                <tbody>
                                                @foreach($contact as $contact)
                                                    <div class="card-body ">
                                                        <div class="form-group">
                                                            <label for="name"><h4>{{ $contact->namecontact }}</h4></label>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">ที่อยู่ :</label>
                                                            {{ $contact->address }}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="area">พื้นที่ความรับผิดชอบ :</label>
                                                            {{ $contact->area }}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">หมายเลขโทรศัพท์ :</label>
                                                            {{ $contact->phone }}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel">โทรสาร :</label>
                                                            {{ $contact->tel }}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">E-mail :</label>
                                                            {{ $contact->email }}
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="web">Website :</label>
                                                            {{ $contact->web }}
                                                        </div>
                                                    
                                                        
                                                    </div>
                                                        <td id="btn" style="width: 20px">
                                                            <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-warning">Edit</a>
                                                        </td>
                                                        
                                                   
                                                @endforeach
                                                </tbody>
                                            </table>
                                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script async defer src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyBJNL4UPbFH1CroiFiCcYRXPTyjy1q9mIA&callback=initMap') }}" type="text/javascript" asyncdefer></script>
@endsection