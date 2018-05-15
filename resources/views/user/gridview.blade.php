@extends('layouts.app')
@section('content')

<div id="map-container" class="fullwidth-home-map">

    <div id="map" data-map-zoom="14">
        <!-- map goes here -->
    </div>

	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="main-search-input">

						<div class="main-search-input-item">
							<input type="text" placeholder="What are you looking for?" value=""/>
						</div>

						<div class="main-search-input-item location">
							<input type="text" placeholder="Location" value=""/>
							<a href="#"><i class="fa fa-dot-circle-o"></i></a>
						</div>

						<div class="main-search-input-item">
							<select data-placeholder="All Categories" class="chosen-select" >
								<option>All Categories</option>
								<option>Shops</option>
								<option>Hotels</option>
								<option>Restaurants</option>
								<option>Fitness</option>
								<option>Events</option>
							</select>
						</div>

						<button class="button">Search</button>

					</div>
				</div>
			</div>
		</div>

	</div>
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>AMAP</h2><span>Бүртгэлийн хэсэг</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Listings</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
		<div class="row">
			<div class="col-md-12">

				<!-- Filters -->
				<div id="filters">
					<ul class="option-set margin-bottom-30">
						<li><a href="#" class="selected" data-filter="*">Хайлтын илэрц</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>


			<div class="row">

        @foreach ($services as $service)

          <!-- Listing Item -->
          <div class="col-lg-4 col-md-6">
            <a href="{{ route('service',$service->slug)}}" class="listing-item-container compact">
              <div class="listing-item">
                <img src="{{Storage::disk('local')->url($service->images)}}" alt="">
								<div class="listing-item-details">
									<ul>
										<li>{{ $service->tax}}</li>
									</ul>
								</div>
    @foreach($service->categories as $category)
                <div class="listing-badge now-open">{{ $category->name }}</div>
      @endforeach
                <div class="listing-item-content">

                  <h3>{{ $service->title }} <i class="verified-icon"></i></h3>
                  <div class="star-rating" data-rating="{{$service->getStarRating()}}"></div>
                  <span>
                    @foreach($service->cities as $city)
                    {{$city->name}}
                    @endforeach
                    , {{ $service->address}}</span>
                </div>
                <span class="like-icon"></span>
              </div>
            </a>
          </div>
          <!-- Listing Item / End -->

        @endforeach

			</div>

      <!-- Pagination -->
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12">
          <!-- Pagination -->
          <div class="pagination-container margin-top-20 margin-bottom-40">
            <nav class="pagination">
              <ul>
                <li>{{ $services->links() }}</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!-- Pagination / End -->

		</div>

	</div>
</div>


@endsection
@section('script')


<script>
var infoBox_ratingType = 'star-rating';
(function($) {
  "use strict";

  function mainMap() {
    var ib = new InfoBox();

    function locationData(locationURL, locationImg, locationTitle, locationAddress, locationRating, locationRatingCounter) {
      return ('' +
        '<a href="' + locationURL + '" class="listing-img-container">' +
        '<div class="infoBox-close"><i class="fa fa-times"></i></div>' +
        '<img src="' + locationImg + '" alt="">' +
        '<div class="listing-item-content">' +
        '<h3>' + locationTitle + '</h3>' +
        '<span>' + locationAddress + '</span>' +
        '</div>' +
        '</a>' +
        '<div class="listing-content">' +
        '<div class="listing-title">' +
        '<div class="' + infoBox_ratingType + '" data-rating="' + locationRating + '"><div class="rating-counter">(' + locationRatingCounter + ' reviews)</div></div>' +
        '</div>' +
        '</div>')
    }
    var locations = [
      @foreach ($services as $service)
      [locationData('{{route('listings')}}', 'images/listing-item-01.jpg', "{{$service->title}}", '{{$service->address}}', '3.5', '12'), {{$service->latitude}}, {{$service->longitude}}, 1, '<i class="im im-icon-Chef-Hat"></i>'],
      @endforeach
    ];
    google.maps.event.addListener(ib, 'domready', function() {
      if (infoBox_ratingType = 'numerical-rating') {
        numericalRating('.infoBox .' + infoBox_ratingType + '');
      }
      if (infoBox_ratingType = 'star-rating') {
        starRating('.infoBox .' + infoBox_ratingType + '');
      }
    });
    var mapZoomAttr = $('#map').attr('data-map-zoom');
    var mapScrollAttr = $('#map').attr('data-map-scroll');
    if (typeof mapZoomAttr !== typeof undefined && mapZoomAttr !== false) {
      var zoomLevel = parseInt(mapZoomAttr);
    } else {
      var zoomLevel = 5;
    }
    if (typeof mapScrollAttr !== typeof undefined && mapScrollAttr !== false) {
      var scrollEnabled = parseInt(mapScrollAttr);
    } else {
      var scrollEnabled = false;
    }
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: zoomLevel,
      scrollwheel: scrollEnabled,
      center: new google.maps.LatLng(47.914177, 106.918787),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      zoomControl: false,
      mapTypeControl: false,
      scaleControl: false,
      panControl: false,
      navigationControl: false,
      streetViewControl: false,
      gestureHandling: 'cooperative',
      styles: [{
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#747474"
        }, {
          "lightness": "23"
        }]
      }, {
        "featureType": "poi.attraction",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#f38eb0"
        }]
      }, {
        "featureType": "poi.government",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ced7db"
        }]
      }, {
        "featureType": "poi.medical",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffa5a8"
        }]
      }, {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#c7e5c8"
        }]
      }, {
        "featureType": "poi.place_of_worship",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#d6cbc7"
        }]
      }, {
        "featureType": "poi.school",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#c4c9e8"
        }]
      }, {
        "featureType": "poi.sports_complex",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#b1eaf1"
        }]
      }, {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [{
          "lightness": "100"
        }]
      }, {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [{
          "visibility": "off"
        }, {
          "lightness": "100"
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffd4a5"
        }]
      }, {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffe9d2"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "all",
        "stylers": [{
          "visibility": "simplified"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "geometry.fill",
        "stylers": [{
          "weight": "3.00"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "geometry.stroke",
        "stylers": [{
          "weight": "0.30"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "labels.text",
        "stylers": [{
          "visibility": "on"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#747474"
        }, {
          "lightness": "36"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "labels.text.stroke",
        "stylers": [{
          "color": "#e9e5dc"
        }, {
          "lightness": "30"
        }]
      }, {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [{
          "visibility": "on"
        }, {
          "lightness": "100"
        }]
      }, {
        "featureType": "water",
        "elementType": "all",
        "stylers": [{
          "color": "#d2e7f7"
        }]
      }]
    });
    $('.listing-item-container').on('mouseover', function() {
      var listingAttr = $(this).data('marker-id');
      if (listingAttr !== undefined) {
        var listing_id = $(this).data('marker-id') - 1;
        var marker_div = allMarkers[listing_id].div;
        $(marker_div).addClass('clicked');
        $(this).on('mouseout', function() {
          if ($(marker_div).is(":not(.infoBox-opened)")) {
            $(marker_div).removeClass('clicked');
          }
        });
      }
    });
    var boxText = document.createElement("div");
    boxText.className = 'map-box'
    var currentInfobox;
    var boxOptions = {
      content: boxText,
      disableAutoPan: false,
      alignBottom: true,
      maxWidth: 0,
      pixelOffset: new google.maps.Size(-134, -55),
      zIndex: null,
      boxStyle: {
        width: "270px"
      },
      closeBoxMargin: "0",
      closeBoxURL: "",
      infoBoxClearance: new google.maps.Size(25, 25),
      isHidden: false,
      pane: "floatPane",
      enableEventPropagation: false,
    };
    var markerCluster, overlay, i;
    var allMarkers = [];
    var clusterStyles = [{
      textColor: 'white',
      url: '',
      height: 50,
      width: 50
    }];
    var markerIco;
    for (i = 0; i < locations.length; i++) {
      markerIco = locations[i][4];
      var overlaypositions = new google.maps.LatLng(locations[i][1], locations[i][2]),
        overlay = new CustomMarker(overlaypositions, map, {
          marker_id: i
        }, markerIco);
      allMarkers.push(overlay);
      google.maps.event.addDomListener(overlay, 'click', (function(overlay, i) {
        return function() {
          ib.setOptions(boxOptions);
          boxText.innerHTML = locations[i][0];
          ib.close();
          ib.open(map, overlay);
          currentInfobox = locations[i][3];
          google.maps.event.addListener(ib, 'domready', function() {
            $('.infoBox-close').click(function(e) {
              e.preventDefault();
              ib.close();
              $('.map-marker-container').removeClass('clicked infoBox-opened');
            });
          });
        }
      })(overlay, i));
    }

    var options = {
      imagePath: 'images/',
      styles: clusterStyles,
      minClusterSize: 2
    };
    markerCluster = new MarkerClusterer(map, allMarkers, options);
    google.maps.event.addDomListener(window, "resize", function() {
      var center = map.getCenter();
      google.maps.event.trigger(map, "resize");
      map.setCenter(center);
    });
    var zoomControlDiv = document.createElement('div');
    var zoomControl = new ZoomControl(zoomControlDiv, map);

    function ZoomControl(controlDiv, map) {
      zoomControlDiv.index = 1;
      map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
      controlDiv.style.padding = '5px';
      controlDiv.className = "zoomControlWrapper";
      var controlWrapper = document.createElement('div');
      controlDiv.appendChild(controlWrapper);
      var zoomInButton = document.createElement('div');
      zoomInButton.className = "custom-zoom-in";
      controlWrapper.appendChild(zoomInButton);
      var zoomOutButton = document.createElement('div');
      zoomOutButton.className = "custom-zoom-out";
      controlWrapper.appendChild(zoomOutButton);
      google.maps.event.addDomListener(zoomInButton, 'click', function() {
        map.setZoom(map.getZoom() + 1);
      });
      google.maps.event.addDomListener(zoomOutButton, 'click', function() {
        map.setZoom(map.getZoom() - 1);
      });
    }
    var scrollEnabling = $('#scrollEnabling');
    $(scrollEnabling).click(function(e) {
      e.preventDefault();
      $(this).toggleClass("enabled");
      if ($(this).is(".enabled")) {
        map.setOptions({
          'scrollwheel': true
        });
      } else {
        map.setOptions({
          'scrollwheel': false
        });
      }
    })
    $("#geoLocation, .input-with-icon.location a").click(function(e) {
      e.preventDefault();
      geolocate();
    });

    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
          map.setCenter(pos);
          map.setZoom(12);
        });
      }
    }
  }
  var map = document.getElementById('map');
  if (typeof(map) != 'undefined' && map != null) {
    google.maps.event.addDomListener(window, 'load', mainMap);
  }

  function singleListingMap() {
    var myLatlng = new google.maps.LatLng({
      lng: $('#singleListingMap').data('longitude'),
      lat: $('#singleListingMap').data('latitude'),
    });
    var single_map = new google.maps.Map(document.getElementById('singleListingMap'), {
      zoom: 15,
      center: myLatlng,
      scrollwheel: false,
      zoomControl: false,
      mapTypeControl: false,
      scaleControl: false,
      panControl: false,
      navigationControl: false,
      streetViewControl: false,
      styles: [{
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#747474"
        }, {
          "lightness": "23"
        }]
      }, {
        "featureType": "poi.attraction",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#f38eb0"
        }]
      }, {
        "featureType": "poi.government",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ced7db"
        }]
      }, {
        "featureType": "poi.medical",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffa5a8"
        }]
      }, {
        "featureType": "poi.park",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#c7e5c8"
        }]
      }, {
        "featureType": "poi.place_of_worship",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#d6cbc7"
        }]
      }, {
        "featureType": "poi.school",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#c4c9e8"
        }]
      }, {
        "featureType": "poi.sports_complex",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#b1eaf1"
        }]
      }, {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [{
          "lightness": "100"
        }]
      }, {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [{
          "visibility": "off"
        }, {
          "lightness": "100"
        }]
      }, {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffd4a5"
        }]
      }, {
        "featureType": "road.arterial",
        "elementType": "geometry.fill",
        "stylers": [{
          "color": "#ffe9d2"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "all",
        "stylers": [{
          "visibility": "simplified"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "geometry.fill",
        "stylers": [{
          "weight": "3.00"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "geometry.stroke",
        "stylers": [{
          "weight": "0.30"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "labels.text",
        "stylers": [{
          "visibility": "on"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#747474"
        }, {
          "lightness": "36"
        }]
      }, {
        "featureType": "road.local",
        "elementType": "labels.text.stroke",
        "stylers": [{
          "color": "#e9e5dc"
        }, {
          "lightness": "30"
        }]
      }, {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [{
          "visibility": "on"
        }, {
          "lightness": "100"
        }]
      }, {
        "featureType": "water",
        "elementType": "all",
        "stylers": [{
          "color": "#d2e7f7"
        }]
      }]
    });
    $('#streetView').click(function(e) {
      e.preventDefault();
      single_map.getStreetView().setOptions({
        visible: true,
        position: myLatlng
      });
    });
    var zoomControlDiv = document.createElement('div');
    var zoomControl = new ZoomControl(zoomControlDiv, single_map);

    function ZoomControl(controlDiv, single_map) {
      zoomControlDiv.index = 1;
      single_map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
      controlDiv.style.padding = '5px';
      var controlWrapper = document.createElement('div');
      controlDiv.appendChild(controlWrapper);
      var zoomInButton = document.createElement('div');
      zoomInButton.className = "custom-zoom-in";
      controlWrapper.appendChild(zoomInButton);
      var zoomOutButton = document.createElement('div');
      zoomOutButton.className = "custom-zoom-out";
      controlWrapper.appendChild(zoomOutButton);
      google.maps.event.addDomListener(zoomInButton, 'click', function() {
        single_map.setZoom(single_map.getZoom() + 1);
      });
      google.maps.event.addDomListener(zoomOutButton, 'click', function() {
        single_map.setZoom(single_map.getZoom() - 1);
      });
    }
    var singleMapIco = "<i class='" + $('#singleListingMap').data('map-icon') + "'></i>";
    new CustomMarker(myLatlng, single_map, {
      marker_id: '1'
    }, singleMapIco);
  }
  var single_map = document.getElementById('singleListingMap');
  if (typeof(single_map) != 'undefined' && single_map != null) {
    google.maps.event.addDomListener(window, 'load', singleListingMap);
  }

  function CustomMarker(latlng, map, args, markerIco) {
    this.latlng = latlng;
    this.args = args;
    this.markerIco = markerIco;
    this.setMap(map);
  }
  CustomMarker.prototype = new google.maps.OverlayView();
  CustomMarker.prototype.draw = function() {
    var self = this;
    var div = this.div;
    if (!div) {
      div = this.div = document.createElement('div');
      div.className = 'map-marker-container';
      div.innerHTML = '<div class="marker-container">' +
        '<div class="marker-card">' +
        '<div class="front face">' + self.markerIco + '</div>' +
        '<div class="back face">' + self.markerIco + '</div>' +
        '<div class="marker-arrow"></div>' +
        '</div>' +
        '</div>'
      google.maps.event.addDomListener(div, "click", function(event) {
        $('.map-marker-container').removeClass('clicked infoBox-opened');
        google.maps.event.trigger(self, "click");
        $(this).addClass('clicked infoBox-opened');
      });
      if (typeof(self.args.marker_id) !== 'undefined') {
        div.dataset.marker_id = self.args.marker_id;
      }
      var panes = this.getPanes();
      panes.overlayImage.appendChild(div);
    }
    var point = this.getProjection().fromLatLngToDivPixel(this.latlng);
    if (point) {
      div.style.left = (point.x) + 'px';
      div.style.top = (point.y) + 'px';
    }
  };
  CustomMarker.prototype.remove = function() {
    if (this.div) {
      this.div.parentNode.removeChild(this.div);
      this.div = null;
      $(this).removeClass('clicked');
    }
  };
  CustomMarker.prototype.getPosition = function() {
    return this.latlng;
  };
})(this.jQuery);
// Шинээр байгууллагын байрлал тодорхойлох
// var marker = new google.maps.Marker({
//   position: {
//     lat: 47.919,
//     lng: 106.921
//   },
//   map: map,
//   draggable: true
// });
// var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
//
// google.maps.event.addListener(searchBox, 'places_changed' ,function(){
//   var places = searchBox.getPlaces();
//   var bounds = new google.maps.LatLngBounds();
//   var i, place;
//
//   for(i=0; place=places[i]; i++){
//     bounds.extend(place.geometry.location);
//     marker.setPosition(place.geometry.location);
//   }
//   map.fitBounds(bounds);
//   map.setZoom(13);
// });
//
// google.maps.event.addListener(marker, 'position_changed', function(){
//   var lat = marker.getPosition().lat();
//   var lng = marker.getPosition().lng();
//
//   $('#lat').val(lat);
//   $('#lng').val(lng);
// });
// дуус

</script>

@endsection
