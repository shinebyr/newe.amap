
<!DOCTYPE html>

<head>

<!-- Basic Page Needs
================================================== -->
<title>UB-LIST.com | {{$service->title}}</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/colors/main.css') }}" id="colors">
<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="/"><img src="images/logo.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>


						@include('layouts.inc.menu')


		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->
<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
	<a href="{{Storage::disk('local')->url($service->images)}}" data-background-image="{{Storage::disk('local')->url($service->images)}}" class="item mfp-gallery"></a>
	@foreach($service->pictures as $picture)
	<a href="{{ url($picture->image_path) }}" data-background-image="{{ url($picture->image_path) }}" class="item mfp-gallery" href="sdsa"></a>
	@endforeach
</div>

<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">
			@if (session('success'))
			<div class="alert alert-success">
						<div class="notification success closeable">
							<p><span>{{ $service->title }}-г үнэлсэнд баярлалаа</span>Таны үнэлгээ амжилттай нийтлэгдлээ</p>
							<a class="close" href="#"></a>
						</div>
			</div>
			@endif
			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>{{ $service->title }} <span class="listing-tag">
            @foreach($service->categories as $category)
            {{ $category->name }}
          </span> {{$service->tax}}</h2>
          @endforeach
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							@foreach($service->cities as $city)
							{{$city->name}}
							@endforeach, {{ $service->address }}
						</a>
					</span>
					<div class="star-rating" data-rating="{{$service->getStarRating()}}">

						<div class="rating-counter"><a href="#listing-reviews">( Үзсэн тоо: {{ $service->view_count }} )</a></div>

					</div>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Танилцуулга</a></li>
					<li><a href="#listing-pricing-list">Pricing</a></li>
					<li><a href="#listing-location">Location</a></li>
					<li><a href="#listing-reviews">Reviews</a></li>
					<li><a href="#add-review">Add Review</a></li>
				</ul>
			</div>

			<!-- Overview -->
			<div id="listing-overview" class="listing-section">

				<!-- Description -->

				<p>
          {{ $service->description }}
				</p>


				<!-- Amenities -->
				<h3 class="listing-desc-headline">Amenities</h3>
				<ul class="listing-features checkboxes margin-top-0">
					@foreach($service->amenities as $amenity)
				<li>{{ $amenity->name }}</li>
					@endforeach
				</ul>
			</div>

			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

				<div id="singleListingMap-container">
					<div id="singleListingMap" data-latitude="{{$service->latitude}}" data-longitude="{{$service->longitude}}" data-map-icon="im im-icon-Location-2"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div>

			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Нийт <span>{{ $service->reviews()->count() }}</span> хүн үнэлгээ өгсөн байна.</h3>

				<div class="clearfix"></div>

				<!-- Reviews Comment-->
				<section class="comments listing-reviews">

					<ul>
							@foreach($service->reviews as $review)
						<li>
							<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
							<div class="comment-content"><div class="arrow-comment"></div>
								<div class="comment-by">{{$review->headline}}<span class="date">{{$review->created_at->format('F nS, Y - gi:A')}}</span>
									<div class="star-rating" data-rating="{{$review->rating}}"></div>
								</div>
								<p>{{$review->description}}</p>
							</div>
						</li>
						@endforeach
					 </ul>
				</section>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">

						<div class="pagination-container margin-top-30">
							<nav class="pagination">
								<!-- <ul>
									<li><a href="#" class="current-page">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
								</ul> -->
							</nav>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>

			</div>


			<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">
						@if(auth()->check())
				<form role="form" action="{{ route('review.store') }}" method="post">
							{{ csrf_field() }}
				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-20">Үнэлгээ</h3>

				<span class="leave-rating-title"><b>{{$service->title}} </b>байгууллагад өгөх таны үнэлгээ</span>

				<!-- Rating / Upload Button -->
				<div class="row">
					<div class="col-md-6">
						<!-- Leave Rating -->
						<div class="clearfix"></div>

						<div class="stars">
						    <input class="star star-5" id="star-5" type="radio" name="rating" value="5"/>
						    <label class="star star-5" for="star-5"></label>
						    <input class="star star-4" id="star-4" type="radio" name="rating" value="4"/>
						    <label class="star star-4" for="star-4"></label>
						    <input class="star star-3" id="star-3" type="radio" name="rating" value="3"/>
						    <label class="star star-3" for="star-3"></label>
						    <input class="star star-2" id="star-2" type="radio" name="rating" value="2"/>
						    <label class="star star-2" for="star-2"></label>
						    <input class="star star-1" id="star-1" type="radio" name="rating" value="1"/>
						    <label class="star star-1" for="star-1"></label>
						</div>

						<div class="clearfix"></div>
					</div>
				</div>

					<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>Нэр</label>
								<input type="text" name="headline" id="headline" value=""/>
							</div>


								<div class="col-md-12">
							<label>Сэтгэгдэл:</label>
							<textarea cols="40" rows="5" name="description" id="description"></textarea>
						</div>

						<input type="hidden" name="service_id" value="{{$service->id}}"/>

					</fieldset>

					<button type="submit" class="button">Илгээх</button>
					<div class="clearfix"></div>
				</form>

				@else

				<a href="/login" class="button">Login</a>


					<div class="clearfix"></div>
				<!-- </form> -->
	@endif
			</div>
			<!-- Add Review Box / End -->


		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">




			<!-- Book Now -->
			<div class="boxed-widget booking-widget margin-top-35">
				<h3><i class="fa fa-calendar-check-o "></i> Book a Table</h3>
				<div class="row with-forms  margin-top-0">

					<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
					<div class="col-lg-6 col-md-12">
						<input type="text" id="booking-date" data-lang="en" data-large-mode="true" data-large-default="true" data-min-year="2017" data-max-year="2020" data-lock="from">
					</div>

					<!-- Time Picker - docs: http://www.vasterad.com/docs/listeo/#!/time_picker -->
					<div class="col-lg-6 col-md-12">
						<input type="text" id="booking-time" value="9:00 am">
					</div>

					<!-- Panel Dropdown -->
					<div class="col-lg-12">
						<div class="panel-dropdown">
							<a href="#">Guests <span class="qtyTotal" name="qtyTotal">1</span></a>
							<div class="panel-dropdown-content">

								<!-- Quantity Buttons -->
								<div class="qtyButtons">
									<div class="qtyTitle">Adults</div>
									<input type="text" name="qtyInput" value="1">
								</div>

								<div class="qtyButtons">
									<div class="qtyTitle">Childrens</div>
									<input type="text" name="qtyInput" value="0">
								</div>

							</div>
						</div>
					</div>
					<!-- Panel Dropdown / End -->

				</div>

				<!-- progress button animation handled via custom.js -->
				<a href="pages-booking.html" class="button book-now fullwidth margin-top-5">Book Now</a>
			</div>
			<!-- Book Now / End -->


			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Нээлттэй</div>
				<h3><i class="sl sl-icon-clock"></i> Нээх цаг</h3>
				<ul>
					<li>Даваа <span>{{ $service->monday_open }} - {{ $service->monday_close }}</span></li>
					<li>Мягмар <span>{{ $service->tuesday_open }} - {{ $service->tuesday_close }}</span></li>
					<li>Лхагва <span>{{ $service->wednesday_open }} - {{ $service->wednesday_close }}</span></li>
					<li>Пүрэв <span>{{ $service->thursday_open }} - {{ $service->thursday_close }}</span></li>
					<li>Баасан <span>{{ $service->friday_open }} - {{ $service->friday_close }}</span></li>
					<li>Бямба <span>{{ $service->saturday_open }} - {{ $service->saturday_close }}</span></li>
					<li>Ням <span>{{ $service->sunday_open }} - {{ $service->sunday_close }}</span></li>
				</ul>
			</div>
			<!-- Opening Hours / End -->


			<!-- Contact -->
			<div class="boxed-widget margin-top-35">
				<div class="hosted-by-title">
					<h4><span>Байгууллагын танилцуулга</span> <a href="pages-user-profile.html">{{ $service->title }}</a></h4>
					<a href="pages-user-profile.html" class="hosted-by-avatar"><img src="images/dashboard-avatar.jpg" alt=""></a>
				</div>
				<ul class="listing-details-sidebar">
					<li><i class="sl sl-icon-phone"></i>Утас: {{ $service->phone }}</li>
					<li><i class="sl sl-icon-globe"></i> <a href="#">{{ $service->website }}</a></li>
					<li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="acd8c3c1ecc9d4cdc1dcc0c982cfc3c1">{{ $service->email }}</span></a></li>
				</ul>
				<ul class="listing-details-sidebar social-profiles">Social network
					<li><a href="https://facebook.com/{{ $service->facebook }}" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<li><a href="https://instagram.com/{{ $service->instagram }}" class="instagram-profile"><i class="fa fa-instagram"></i> Instagram</a></li>
					<!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
				</ul>

				<!-- Reply to review popup -->
				<div id="small-dialog" class="zoom-anim-dialog mfp-hide">
					<div class="small-dialog-header">
						<h3>Send Message</h3>
					</div>
					<div class="message-reply margin-top-0">
						<textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
						<button class="button">Send Message</button>
					</div>
				</div>

				<a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
			</div>
			<!-- Contact / End-->


			<!-- Share / Like -->
			<div class="listing-share margin-top-40 margin-bottom-40 no-border">
					<input type="hidden" name="service_id" value="{{$service->id}}"/>
				<button class="like-button"><span class="like-icon"></span> Bookmark this listing</button>
				<span>159 people bookmarked this place</span>

					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
						<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
					</ul>
					<div class="clearfix"></div>
			</div>

		</div>
		<!-- Sidebar / End -->

	</div>
</div>




<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
{{Html::script('scripts/mmenu.min.js')}}
{{Html::script('scripts/jquery-2.2.0.min.js')}}
{{Html::script('scripts/chosen.min.js')}}
{{Html::script('scripts/rangeslider.min.js')}}
{{Html::script('scripts/slick.min.js')}}
{{Html::script('scripts/magnific-popup.min.js')}}
{{Html::script('scripts/waypoints.min.js')}}
{{Html::script('scripts/counterup.min.js')}}
{{Html::script('scripts/jquery-ui.min.js')}}
{{Html::script('scripts/jquery-ui.min.js')}}
{{Html::script('scripts/tooltips.min.js')}}
{{Html::script('scripts/custom.js')}}


<!-- Maps -->
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiIuBk5sJVCsQ0FcxgQRr4mq-mu9q2EAw">
</script>
{{Html::script('scripts/infobox.min.js')}}
{{Html::script('scripts/markerclusterer.js')}}
{{Html::script('scripts/maps.js')}}


<!-- Date Picker - docs: http://www.vasterad.com/docs/listeo/#!/date_picker -->
<link href="{{ URL::asset('css/plugins/datedropper.css') }}" rel="stylesheet" type="text/css">
{{Html::script('scripts/datedropper.js')}}
<script>$('#booking-date').dateDropper();</script>

{{Html::script('scripts/timedropper.js')}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/plugins/timedropper.css') }}">
<script>
this.$('#booking-time').timeDropper({
	setCurrentTime: false,
	meridians: true,
	primaryColor: "#f91942",
	borderColor: "#f91942",
	minutesInterval: '15'
});

var $clocks = $('.td-input');
	_.each($clocks, function(clock){
	clock.value = null;
});
</script>

<!-- Booking Widget - Quantity Buttons -->
{{Html::script('scripts/quantityButtons.js')}}


<!-- Style Switcher
================================================== -->
<script src="{{ URL::asset('scripts/switcher.js') }}"></script>

<div id="style-switcher">
	<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>

	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="main" title="Main"></a></li>
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
		</ul>
	</div>

</div>
<!-- Style Switcher / End -->

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


			[locationData('{{route('listings')}}', '{{Storage::disk('local')->url($service->images)}}', "{{$service->title}}", '{{$service->address}}', '3.5', '12'), {{$service->latitude}}, {{$service->longitude}}, 1, '<i class="im im-icon-Location-2"></i>'],

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
      center: new google.maps.LatLng(47.91, 106.91),
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
</script>

</body>
</html>
