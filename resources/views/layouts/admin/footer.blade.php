<!-- Scripts
================================================== -->
<script data-cfasync="false" src="/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="{{ URL::asset('scripts/jquery-2.2.0.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/rangeslider.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/tooltips.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('scripts/custom.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Opening hours added via JS (this is only for demo purpose) -->
<script>
$(".opening-day.js-demo-hours .chosen-select").each(function() {
	$(this).append(''+
        '<option></option>'+
        '<option>Closed</option>'+
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



<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script> -->
{{Html::script('scripts/infobox.min.js')}}
{{Html::script('scripts/markerclusterer.js')}}
<!-- {{Html::script('scripts/maps.js')}} -->
{{Html::script('scripts/addmap.js')}}

<!-- DropZone | Documentation: http://dropzonejs.com -->
<script type="text/javascript" src="{{URL::asset('scripts/dropzone.js')}}"></script>
<script src="{{URL::asset('scripts/switcher.js')}}"></script>

<!--
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

</div> -->
<!-- Style Switcher / End -->

</body>
</html>
