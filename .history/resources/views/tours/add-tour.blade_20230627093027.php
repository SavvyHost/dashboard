<x-layout.default>
    @section('title','Tours - New')
    <link rel='stylesheet' type='text/css' href='{{ Vite::asset('resources/css/nice-select2.css') }}'>

    <link rel="stylesheet" type="text/css" href="{{ Vite::asset('resources/css/quill.snow.css') }}" />
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <div >
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{route('tours.show')}}" class="text-primary hover:underline">Tours</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>New</span>
            </li>
        </ul>
        <div class="pt-5 grid grid-cols-1 lg:grid-cols-1 gap-6">
            <div class="panel">
                <div class="flex items-center justify-between mb-5">

                    <h5 class="font-semibold text-lg dark:text-white-light">Enter Tour Details</h5>
                </div>
                @if (session()->get('success'))
                <div class=" text-center mb-5">
                    <h3 style="font-size: 1.5rem;color:currentColor;">{{ session()->get('success') }}</h3>
                </div>
                @endif

                <div class="mb-5">

                    <form class="space-y-5" method="POST" action="{{route('tour.form.save')}}">
                        @csrf
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelName" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Title</label>
                            <input id="HotelName" type="text"  placeholder="Enter Tour Title"
                                class="form-input flex-1" name="tour_title" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Category</label>
                            <select class="selectize" id="gender"  name="category" required>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>

                            <div id="map" style="height: 500px; width: 100%; margin: 0 auto;"></div>

                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label for="projectinput1"> Address  </label>
                                        <input type="text" id="pac-input"
                                               class="form-control"
                                               placeholder="  " name="address">

                                        @error("address")
                                        <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelLocation" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Location</label>
                            <input id="HotelLocation" type="text"  placeholder="Enter Tour Location"
                                class="form-input flex-1" name="tour_location" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelLocation" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Duration</label>
                            <input id="HotelLocation" type="text"  placeholder="Enter Tour Duration"
                                class="form-input flex-1" name="tour_duration" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Price</label>
                            <input id="HotelPrice" type="text"  placeholder="Enter Tour Price"
                                class="form-input flex-1" name="tour_price" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Sale Price</label>
                            <input id="HotelPrice" type="text"  placeholder="Enter Sale Price"
                                class="form-input flex-1" name="tour_sale_price"  />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Min People</label>
                            <input id="HotelPrice" type="text"  placeholder="Min People"
                                class="form-input flex-1" name="min_people" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Max People</label>
                            <input id="HotelPrice" type="text"  placeholder="Max People"
                                class="form-input flex-1" name="max_people" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <label for="HotelPrice" class="mb-0 sm:w-1/4 sm:ltr:mr-2 rtl:ml-2">Date</label>
                            <input id="HotelPrice" type="date"
                                class="form-input flex-1" name="tour_date" required />
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            @foreach ($attrs as $attr)
                                <div class="w-full" style="margin-right: 10px">
                                    <label for="ctnFile">{{$attr->name}}</label>
                                    <select class="selectize" name="terms[]" multiple='multiple'>
                                        @foreach ($attr->terms as $term)
                                            <option value="{{$term->id}}">{{$term->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex sm:flex-row flex-col ">
                            <div style="margin-right: 10px">
                                <label for="ctnFile">Banner Image</label>
                                <input id="ctnFile" type="file"  name="banner" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file-ml-5 file:text-white file:hover:bg-primary" required>
                                <output></output>
                            </div>
                            <div style="margin-right: 10px">
                                <label for="ctnFile">Images</label>
                                <input id="ctnFile" type="file" multiple="multiple" name="image[]" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file-ml-5 file:text-white file:hover:bg-primary" required>
                                <output></output>
                            </div>

                            <div class="flex sm:flex-row flex-col">
                                <div class="w-full" style="margin-right: 10px">
                                    <label for="ctnFile">Type</label>
                                    <select class="selectize" name="type" multiple='multiple'>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="mb-5">
                                <label for="editor">Description</label>
                                <input  style="display:none" name="description">

                                <div id="editor"></div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary !mt-6">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="{{asset('assets/js/highlight.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select2.js')}}"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var form = document.querySelector('form');
        form.onsubmit = function() {
        // Populate hidden form on submit
        var content = document.querySelector(".ql-editor").innerHTML;
        var bio = document.querySelector('input[name=description]');
        bio.value = content;
        };
    </script>
    <!-- script -->
    <script>
         document.addEventListener("DOMContentLoaded", function(e) {
            // default
            var els = document.querySelectorAll(".selectize");
            els.forEach(function(select) {
                NiceSelect.bind(select);
            });

            // seachable
            var options = {
                searchable: true
            };
            NiceSelect.bind(document.getElementById("seachable-select"), options);
        });

    </script>
<script>
  function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: 24.740691, lng: 46.6528521 },
      zoom: 13,
      mapTypeId: 'roadmap'
    });

    var markers = [];
    var infoWindow = new google.maps.InfoWindow;
    var geocoder = new google.maps.Geocoder();

    // Add marker for current location
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        map.setCenter(pos);
        var marker = new google.maps.Marker({
          position: pos,
          map: map,
          title: 'Your current location'
        });
        markers.push(marker);
        marker.addListener('click', function () {
          geocodeLatLng(geocoder, map, infoWindow, marker);
        });
        google.maps.event.trigger(marker, 'click');
      }, function () {
        handleLocationError(true, infoWindow, map.getCenter());
      });
    } else {
      handleLocationError(false, infoWindow, map.getCenter());
    }

    // Add click event listener to the map
    google.maps.event.addListener(map, 'click', function (event) {
      geocoder.geocode({
        'location': event.latLng
      }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            deleteMarkers();
            addMarker(event.latLng);
            var selectedLocation = results[0].formatted_address;
            console.log(selectedLocation);
            splitLatLng(String(event.latLng));
            $("#pac-input").val(selectedLocation);
          }
        }
      });
    });

    // Initialize the search box
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

    // Bias the SearchBox results towards the current map's viewport
    map.addListener('bounds_changed', function () {
      searchBox.setBounds(map.getBounds());
    });

    // Listen for the event fired when the user selects a prediction and retrieve more details for that place
    searchBox.addListener('places_changed', function () {
      var places = searchBox.getPlaces();
      if (places.length === 0) {
        return;
      }
      deleteMarkers();
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function (place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        addMarker(place.geometry.location);
        bounds.extend(place.geometry.location);
      });
      map.fitBounds(bounds);
    });

    function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
      var latlng = { lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng() };
      $('#latitude').val(markerCurrent.position.lat());
      $('#longitude').val(markerCurrent.position.lng());
      geocoder.geocode({ 'location': latlng }, function (results, status) {
        if (status === 'OK') {
          if (results[0]) {
            map.setZoom(8);
            var marker = new google.maps.Marker({
              position: latlng,
              map: map
            });
            markers.push(marker);
            infowindow.setContent(results[0].formatted_address);
            var selectedLocation = results[0].formatted_address;
            $("#pac-input").val(selectedLocation);
            infowindow.open(map, marker);
          } else {
            window.alert('No results found');
          }
        } else {
          window.alert('Geocoder failed due to: ' + status);
        }
      });
    }

    function addMarker(location) {
      var marker = new google.maps.Marker({
        position: location,
        map: map
      });
      markers.push(marker);
    }

    function setMapOnAll(map) {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
      }
    }

    function clearMarkers() {
      setMapOnAll(null);
    }

    function deleteMarkers() {
      clearMarkers();
      markers = [];
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
      infoWindow.open(map);
    }

    function splitLatLng(latLng) {
      var newString = latLng.substring(0, latLng.length - 1);
      var newString2 = newString.substring(1);
      var trainindIdArray = newString2.split(',');
      var lat = trainindIdArray[0];
      var lng = trainindIdArray[1];
      $("#latitude").val(lat);
      $("#longitude").val(lng);
    }
  }

  // Initialize the map
  initAutocomplete();
</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
         async defer"></script>
</x-layout.default>
