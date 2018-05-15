<div id="footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="images/logo.png" alt="">
				<br><br>
				<p>Танилцуулга</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Танд туслах холбоосууд</h4>
				<ul class="footer-links">
					 @if (Auth::guest())
					<li><a href="/login">Нэвтрэх</a></li>
					<li><a href="/register">Бүртгүүлэх</a></li>
					 @else
					<li><a href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}">Миний бүртгэл</a></li>
					@endif
					<li><a href="{{ route('useraddlist.index')}}">Байгууллага нэмэх</a></li>
					<!-- <li><a href="#">Pricing</a></li>
					<li><a href="#">Privacy Policy</a></li> -->
				</ul>

				<ul class="footer-links">
					<!-- <li><a href="#">FAQ</a></li> -->
					<li><a href="#">Блог</a></li>
					<!-- <li><a href="#">Our Partners</a></li>
					<li><a href="#">How It Works</a></li> -->
					<li><a href="{{route('contact.create')}}">Холбогдох</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<div class="col-md-3  col-sm-12">
				<h4>Оффис Байрлал</h4>
				<div class="text-widget">
					<span>Улаанбаатар</span> <br>
					Утас: <span>(976) 88917722</span><br>
					E-Mail:<span> <a href="#"><span class="__cf_email__" data-cfemail="1f707979767c7a5f7a677e726f737a317c7072">t.sh1nee@yahoo.com</span></a> </span><br>
				</div>

				<!-- Widget -->
				<div class="widget margin-top-40">
					<h3 class="margin-bottom-25">Social</h3>
					<ul class="social-icons rounded">
						<li><a class="facebook" href="https://www.facebook.com/tumee.shinee"><i class="icon-facebook"></i></a></li>
						<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
						<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
						<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
					</ul>

				</div>
				<!-- Widget / End-->
			</div>

		</div>

		<!-- Copyright -->
		<div class="row">
			@include('layouts.inc.copyright')
		</div>

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
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiIuBk5sJVCsQ0FcxgQRr4mq-mu9q2EAw">
</script>
{{Html::script('scripts/tooltips.min.js')}}
{{Html::script('scripts/custom.js')}}
{{Html::script('scripts/infobox.min.js')}}
{{Html::script('scripts/markerclusterer.js')}}
<!-- {{Html::script('scripts/maps.js')}} -->



<!-- Style Switcher
================================================== -->
<!-- <script src="{{ URL::asset('scripts/switcher.js') }}"></script> -->
<!-- {{Html::script('scripts/switcher.js')}} -->
{{Html::script('scripts/switcher.js')}}
<script>
$(".opening-day.js-demo-hours .chosen-select").each(function() {
	$(this).append(''+
        '<option></option>'+
        '<option>Хаалттай</option>'+
        '<option>1 AM</option>'+
        '<option>2 AM</option>'+
        '<option>3 AM</option>'+
        '<option>4 AM</option>'+
        '<option>5 AM</option>'+
        '<option>6 AM</option>'+
        '<option>7 AM</option>'+
        '<option>8 AM</option>'+
        '<option>9 AM</option>'+
        '<option>10 AM</option>'+
        '<option>11 AM</option>'+
        '<option>12 AM</option>'+
        '<option>1 PM</option>'+
        '<option>2 PM</option>'+
        '<option>3 PM</option>'+
        '<option>4 PM</option>'+
        '<option>5 PM</option>'+
        '<option>6 PM</option>'+
        '<option>7 PM</option>'+
        '<option>8 PM</option>'+
        '<option>9 PM</option>'+
        '<option>10 PM</option>'+
        '<option>11 PM</option>'+
        '<option>12 PM</option>');
});
</script>

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

<!-- REVOLUTION SLIDER SCRIPT -->

{{Html::script('scripts/themepunch.tools.min.js')}}
{{Html::script('scripts/themepunch.revolution.min.js')}}
<script type="text/javascript">
	var tpj=jQuery;
	var revapi4;
	tpj(document).ready(function() {
		if(tpj("#rev_slider_4_1").revolution == undefined){
			revslider_showDoubleJqueryError("#rev_slider_4_1");
		}else{
			revapi4 = tpj("#rev_slider_4_1").show().revolution({
				sliderType:"standard",
				jsFileLocation:"scripts/",
				sliderLayout:"auto",
				dottedOverlay:"none",
				delay:9000,
				navigation: {
					keyboardNavigation:"off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation:"off",
					onHoverStop:"on",
					touch:{
						touchenabled:"on",
						swipe_threshold: 75,
						swipe_min_touches: 1,
						swipe_direction: "horizontal",
						drag_block_vertical: false
					}
					,
					arrows: {
						style:"zeus",
						enable:true,
						hide_onmobile:true,
						hide_under:600,
						hide_onleave:true,
						hide_delay:200,
						hide_delay_mobile:1200,
						tmp:'<div class="tp-title-wrap"></div>',
						left: {
							h_align:"left",
							v_align:"center",
							h_offset:40,
							v_offset:0
						},
						right: {
							h_align:"right",
							v_align:"center",
							h_offset:40,
							v_offset:0
						}
					}
					,
					bullets: {
				enable:false,
				hide_onmobile:true,
				hide_under:600,
				style:"hermes",
				hide_onleave:true,
				hide_delay:200,
				hide_delay_mobile:1200,
				direction:"horizontal",
				h_align:"center",
				v_align:"bottom",
				h_offset:0,
				v_offset:32,
				space:5,
				tmp:''
					}
				},
				viewPort: {
					enable:true,
					outof:"pause",
					visible_area:"80%"
			},
			responsiveLevels:[1200,992,768,480],
			visibilityLevels:[1200,992,768,480],
			gridwidth:[1180,1024,778,480],
			gridheight:[640,500,400,300],
			lazyType:"none",
			parallax: {
				type:"mouse",
				origo:"slidercenter",
				speed:2000,
				levels:[2,3,4,5,6,7,12,16,10,25,47,48,49,50,51,55],
				type:"mouse",
			},
			shadow:0,
			spinner:"off",
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,
			shuffle:"off",
			autoHeight:"off",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				nextSlideOnWindowFocus:"off",
				disableFocusListener:false,
			}
		});
		}
	});	/*ready*/
</script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
	(Load Extensions only on Local File Systems !
	The following part can be removed on Server for On Demand Loading) -->
{{Html::script('scripts/extensions/revolution.extension.actions.min.js')}}
{{Html::script('scripts/extensions/revolution.extension.carousel.min.js')}}
{{Html::script('scripts/extensions/revolution.extension.kenburn.min.js')}}
{{Html::script('scripts/extensions/revolution.extension.layeranimation.min.js')}}
{{Html::script('scripts/extensions/revolution.extension.migration.min.js')}}
{{Html::script('scripts/extensions/revolution.extension.navigation.min.js')}}
{{Html::script('scripts/extensions/revolution.extension.parallax.min.js')}}
{{Html::script('scripts/extensions/revolution.extension.slideanims.min.js')}}
{{Html::script('scripts/extensions/revolution.extension.video.min.js')}}
</body>
</html>
