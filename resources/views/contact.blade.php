@extends('layouts.app')
@section('content')

<!-- Content
================================================== -->

<!-- Map Container -->
<div class="contact-map margin-bottom-60">

	<!-- Google Maps -->
	<div id="singleListingMap-container">
		<div id="singleListingMap" data-latitude="40.70437865245596" data-longitude="-73.98674011230469" data-map-icon="im im-icon-Map2"></div>
		<a href="#" id="streetView">Street View</a>
	</div>
	<!-- Google Maps / End -->

	<!-- Office -->
	<div class="address-box-container">
		<div class="address-container" data-background-image="images/our-office.jpg">
			<div class="office-address">
				<h3>Our Office</h3>
				<ul>
					<li>John Street 304</li>
					<li>New York</li>
					<li>Phone (123) 123-456 </li>
				</ul>
			</div>
		</div>
	</div>
	<!-- Office / End -->

</div>
<div class="clearfix"></div>
<!-- Map Container / End -->


<!-- Container / Start -->
<div class="container">

	<div class="row">

		<!-- Contact Details -->
		<div class="col-md-4">

			<h4 class="headline margin-bottom-30">Find Us There</h4>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
				<p>Collaboratively administrate channels whereas virtual. Objectively seize scalable metrics whereas proactive e-services.</p>

				<ul class="contact-details">
					<li><i class="im im-icon-Phone-2"></i> <strong>Утас:</strong> <span>(123) 123-456 </span></li>
					<li><i class="im im-icon-Fax"></i> <strong>Факс:</strong> <span>(123) 123-456 </span></li>
					<li><i class="im im-icon-Globe"></i> <strong>Веб сайт:</strong> <span><a href="#">www.example.com</a></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>Имэйл:</strong> <span><a href="#"><span class="__cf_email__" data-cfemail="640b02020d070124011c05091408014a070b09">example@email</span></a></span></li>
				</ul>
			</div>

		</div>

		<!-- Contact Form -->
		<div class="col-md-8">

			<section id="contact">
				<h4 class="headline margin-bottom-35">Холбогдох хэсэг</h4>

				<div id="contact-message"></div>

					<form method="post" action="{{route('contact.store')}}" name="contactform" id="contactform" autocomplete="on">
						{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="name" type="text" id="name" placeholder="Нэр" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" placeholder="Имэйл хаяг" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div>
						<input name="subject" type="text" id="subject" placeholder="Гарчиг" required="required" />
					</div>

					<div>
						<textarea name="comments" cols="40" rows="3" id="comments" placeholder="Санал хүсэлт" spellcheck="true" required="required"></textarea>
					</div>

					<input type="submit" class="submit button" id="submit" value="Submit Message" />

					</form>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->


@endsection
