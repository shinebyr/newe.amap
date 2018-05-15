@extends('layouts.admin.app')

@section('content')

	<!-- Content
	================================================== -->
	<div class="dashboard-content">
		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Байгууллага нэмэх</h2>
					<a href="{{ route('addcategory.create')}}" class="button preview"><i class="im im-icon-Tag-4"></i> Категори нэмэх</a>
					<a href="{{ route('addtag.create') }}" class="button preview"><i class="im im-icon-Tag-2"></i> Tag нэмэх</a>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Нүүр хуудас</a></li>
							<li><a href="#">Админ хэсэг</a></li>
							<li>Байгууллага нэмэх</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<p class="notification error closeable">{{ $error }}</p>
			@endforeach
		@endif
		<div class="row">
			<div class="col-lg-12">
				<form role="form" action="{{ route('addlist.store','addcategory.store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

				<div id="add-listing">
					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Ерөнхий мэдээлэл</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Байгууллагын нэр <i class="tip" data-tip-content="Өөрийн бизнесийн байгууллагын нэрийг бичнэ үү! "></i></h5>
								<input id="title" name="title" class="search-field" type="text" value=""/>
							</div>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>AMAP ID <i class="tip" data-tip-content="Name of your slug"></i></h5>
								<input id="slug" name="slug" class="search-field" type="text" value=""/>
							</div>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
							<div class="col-md-6">
								<h5>Төрөл</h5>
								<select class="chosen-select-no-single" name="categories[]">
									<option label="blank">Select Category</option>
									@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
							</div>

							<!-- Type -->
							<div class="col-md-6">

								<h5>Түлхүүр үг <i class="tip" data-tip-content="Та уг хэсэг дээр өөрийн байгууллагаа нэг үгээр илтгэж болох оновчтой сонголт хийх ёстой юм."></i></h5>

								<select name="tags[]" data-placeholder="Select Multiple Items" class="chosen-select" multiple>
									@foreach ($tags as $tag)
									<option value="{{ $tag->id }}">{{ $tag->name }}</option>
									@endforeach

								</select>

							</div>

						</div>
						<!-- Row / End -->

					</div>
					<!-- Section / End -->

					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-location"></i> Байрлал</h3>
						</div>

						<div class="submit-section">

							<!-- Row -->
							<div class="row with-forms">

															<div id="map-container" class="fullwidth-home-map">
																	<div id="map-main" data-map-zoom="30" style="width:100%; height:500px; Display:block;"></div>
																	<!-- Row -->
																	<div class="row with-forms">
																		<!-- Phone -->
																		<div class="col-md-4">
																			<h5>Өргөрөг </h5>
																			<input name="latitude" id="latitude" type="text">
																		</div>
																		<!-- Website -->
																		<div class="col-md-4">
																			<h5>Уртраг</h5>
																			<input name="longitude" id="longitude" type="text">
																		</div>
																	</div>
																	<!-- Row / End -->
														</div>
								<!-- City -->
								<div class="col-md-6">
									<h5>Хот</h5>
									<select class="chosen-select-no-single" name="cities[]">
										<option label="blank">Дүүрэг сонгох</option>
										@foreach ($cities as $city)
										<option value="{{ $city->id }}">{{ $city->name }}</option>
										@endforeach
									</select>
								</div>


								<!-- Address -->
								<div class="col-md-6">
									<h5>Хаяг</h5>
									<input id="address" name="address" type="text" placeholder="e.g. 964 School Street">
								</div>

							</div>
							<!-- Row / End -->

					</div>
					<!-- Section / End -->
</div>

					<!-- Section -->
					<div class="add-listing-section margin-top-45">


						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-picture"></i> Нүүр зураг</h3>
						</div>

						<div class="submit-section">
							<input type="file" name="images" id="images">
						</div>


					</div>
					<!-- Section / End -->


					<!-- Section -->
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-docs"></i> Дэлгэрэнгүй мэдээлэл</h3>
						</div>

						<!-- Description -->
						<div class="form">
							<h5>Байгууллагын танилцуулга</h5>
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="description" spellcheck="true"></textarea>

						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5>Утас <span>(Нэмэлт мэдээлэл)</span></h5>
								<input name="phone" id="phone" type="text">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Веб сайт <span>(optional)</span></h5>
								<input name="website" id="website" type="text">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>Имэйл <span>(optional)</span></h5>
								<input name="email" id="email" type="text">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>Tax <span>(optional)</span></h5>
								<select class="chosen-select-no-single" name="tax" id="tax">
									<option label="blank">Төлбөрийн зэргэ сонгох</option>
									<option>₮</option>
									<option>₮ ₮</option>
									<option>₮ ₮ ₮</option>
								</select>
							</div>



						</div>
						<!-- Row / End -->


						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
								<input name="facebook" id="facebook" type="text" placeholder="https://www.facebook.com/">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-instagram"></i> Instagram <span>(optional)</span></h5>
								<input name="instagram" id="instagram" type="text" placeholder="https://www.instagtam.com/">
							</div>

						</div>
						<!-- Row / End -->

						<div class="row with-forms">

							<div class="col-md-6">

								<h5>Орчины мэдээлэл <i class="tip" data-tip-content="Та уг хэсэг дээр өөрийн байгууллагаа нэг үгээр илтгэж болох оновчтой сонголт хийх ёстой юм."></i></h5>

								<select name="amenities[]" data-placeholder="Select Multiple Items" class="chosen-select" multiple>
									@foreach ($amenities as $amenity)
									<option value="{{ $amenity->id }}">{{ $amenity->name }}</option>
									@endforeach
								</select>

							</div>
						</div>

						<!-- Checkboxes / End -->

					</div>
					<!-- Section / End -->


					          					<!-- Section -->
					          					<div class="add-listing-section margin-top-45">

					          						<!-- Headline -->
					          						<div class="add-listing-headline">
					          							<h3><i class="sl sl-icon-clock"></i> Ажлийн цагийн хувиар</h3>
					          							<!-- Switcher -->
					          							<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
					          						</div>

					          						<!-- Switcher ON-OFF Content -->
					          						<div class="switcher-content">

					          							<!-- Day -->
					          							<div class="row opening-day">
					          								<div class="col-md-2"><h5>Даваа</h5></div>
					          								<div class="col-md-5">
					          									<select name="monday_open" id="monday_open" class="chosen-select" data-placeholder="Нээх цаг">
					          										<option label="Нээх цаг"></option>
					          										<option>Хаалттай</option>
					          										<option>1 AM</option>
					          										<option>2 AM</option>
					          										<option>3 AM</option>
					          										<option>4 AM</option>
					          										<option>5 AM</option>
					          										<option>6 AM</option>
					          										<option>7 AM</option>
					          										<option>8 AM</option>
					          										<option>9 AM</option>
					          										<option>10 AM</option>
					          										<option>11 AM</option>
					          										<option>12 AM</option>
					          										<option>1 PM</option>
					          										<option>2 PM</option>
					          										<option>3 PM</option>
					          										<option>4 PM</option>
					          										<option>5 PM</option>
					          										<option>6 PM</option>
					          										<option>7 PM</option>
					          										<option>8 PM</option>
					          										<option>9 PM</option>
					          										<option>10 PM</option>
					          										<option>11 PM</option>
					          										<option>12 PM</option>
					          									</select>
					          								</div>
					          								<div class="col-md-5">
					          									<select name="monday_close" id="monday_close" class="chosen-select" data-placeholder="Хаах цаг">
					          										<option label="Хаах цаг"></option>
					          										<option>Хаалттай</option>
					          										<option>1 AM</option>
					          										<option>2 AM</option>
					          										<option>3 AM</option>
					          										<option>4 AM</option>
					          										<option>5 AM</option>
					          										<option>6 AM</option>
					          										<option>7 AM</option>
					          										<option>8 AM</option>
					          										<option>9 AM</option>
					          										<option>10 AM</option>
					          										<option>11 AM</option>
					          										<option>12 AM</option>
					          										<option>1 PM</option>
					          										<option>2 PM</option>
					          										<option>3 PM</option>
					          										<option>4 PM</option>
					          										<option>5 PM</option>
					          										<option>6 PM</option>
					          										<option>7 PM</option>
					          										<option>8 PM</option>
					          										<option>9 PM</option>
					          										<option>10 PM</option>
					          										<option>11 PM</option>
					          										<option>12 PM</option>
					          									</select>
					          								</div>
					          							</div>
					          							<!-- Day / End -->

					          														<!-- Day -->
					          														<div class="row opening-day js-demo-hours">
					          															<div class="col-md-2"><h5>Мягмар</h5></div>
					          															<div class="col-md-5">
					          																<select name="tuesday_open" id="tuesday_open" class="chosen-select" data-placeholder="Нээх цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          															<div class="col-md-5">
					          																<select name="tuesday_close" id="tuesday_close" class="chosen-select" data-placeholder="Хаах цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          														</div>
					          														<!-- Day / End -->

					          														<!-- Day -->
					          														<div class="row opening-day js-demo-hours">
					          															<div class="col-md-2"><h5>Лхагва</h5></div>
					          															<div class="col-md-5">
					          																<select name="wednesday_open" id="wednesday_open" class="chosen-select" data-placeholder="Нээх цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          															<div class="col-md-5">
					          																<select name="wednesday_close" id="wednesday_close" class="chosen-select" data-placeholder="Хаах цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          														</div>
					          														<!-- Day / End -->

					          														<!-- Day -->
					          														<div class="row opening-day js-demo-hours">
					          															<div class="col-md-2"><h5>Пүрэв</h5></div>
					          															<div class="col-md-5">
					          																<select name="thursday_open" id="thursday_open" class="chosen-select" data-placeholder="Нээх цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          															<div class="col-md-5">
					          																<select name="thursday_close" id="thursday_close" class="chosen-select" data-placeholder="Хаах цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          														</div>
					          														<!-- Day / End -->

					          														<!-- Day -->
					          														<div class="row opening-day js-demo-hours">
					          															<div class="col-md-2"><h5>Баасан</h5></div>
					          															<div class="col-md-5">
					          																<select name="friday_open" id="friday_open" class="chosen-select" data-placeholder="Нээх цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          															<div class="col-md-5">
					          																<select name="friday_close" id="friday_close" class="chosen-select" data-placeholder="Хаах цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          														</div>
					          														<!-- Day / End -->

					          														<!-- Day -->
					          														<div class="row opening-day js-demo-hours">
					          															<div class="col-md-2"><h5>Бямба</h5></div>
					          															<div class="col-md-5">
					          																<select name="saturday_open" id="saturday_open" class="chosen-select" data-placeholder="Нээх цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          															<div class="col-md-5">
					          																<select name="saturday_close" id="saturday_close" class="chosen-select" data-placeholder="Хаах цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          														</div>
					          														<!-- Day / End -->

					          														<!-- Day -->
					          														<div class="row opening-day js-demo-hours">
					          															<div class="col-md-2"><h5>Ням</h5></div>
					          															<div class="col-md-5">
					          																<select name="sunday_open" id="sunday_open" class="chosen-select" data-placeholder="Нээх цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          															<div class="col-md-5">
					          																<select name="sunday_close" id="sunday_close" class="chosen-select" data-placeholder="Хаах цаг">
					          																	<!-- Hours added via JS (this is only for demo purpose) -->
					          																</select>
					          															</div>
					          														</div>
					          														<!-- Day / End -->

					          										</div>
					          										<!-- Switcher ON-OFF Content / End -->

					          										</div>
					          										<!-- Section / End -->


											<!-- Section -->
												<!-- <div class="add-listing-section margin-top-45">
													<div class="add-listing-headline">
														<h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
														<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
													</div>
													<div class="switcher-content">
														<div class="row">
															<div class="col-md-12">
																<table id="pricing-list-container">
																	<tr class="pricing-list-item pattern">
																		<td>
																			<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
																			<div class="fm-input pricing-name"><input type="text" placeholder="Title" name="" id=""/></div>
																			<div class="fm-input pricing-ingredients"><input type="text" placeholder="Description" name="" id=""/></div>
																			<div class="fm-input pricing-price"><input type="text" placeholder="Price" data-unit="MNT" name="" id=""/></div>
																			<div>	<input id="service_id" name="service_id" type="hidden" value=""></div>
																			<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
																		</td>
																	</tr>
																</table>
																<a href="#" class="button add-pricing-list-item">Add Item</a>
															</div>
														</div>
													</div>
											</div> -->

											<!-- Section -->
											<div class="add-listing-section margin-top-45">

												<!-- Headline -->
												<div class="add-listing-headline">
													<h3><i class="sl sl-icon-check"></i> Итэвхижүүлэлт</h3>
												</div>

																		<!-- Checkboxes -->
																		<h5 class="margin-top-30 margin-bottom-10">Зөвшөөрөл </h5>
																		<div class="checkboxes in-row margin-bottom-20">


																			<input id="check-b" type="checkbox" name="status" value="1">
																			<label for="check-b">Веб сайтад нийтлэх зөвшөөрөл</label>

																			<input id="check-a" type="checkbox" name="special" value="1">
																			<label for="check-a"><mark class="color">Онцлох байгууллага болгох</mark><i class="tip" data-tip-content="Энэхүү хэсгийг итэвхижүүлснээр веб сайтын нүүр хуудсанд нийтлэгдэх эрх олгох юм."></i></label>


																		</div>
																		<!-- Checkboxes / End -->
											</div>
											<!-- Section / End -->

							<button type="submit" class="button preview" name="button">Хадгалах<i class="fa fa-arrow-circle-right"></i></button>
											<!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->


										</form>

									</div>

									<!-- Copyrights -->
								@include('layouts.inc.copyright')

								</div>

							</div>
							<!-- Content / End -->


						</div>
						<!-- Dashboard / End -->

						</div>

						</div>
						<!-- Wrapper / End -->
						@endsection
						@section('script')
						<script>

									function initAutocomplete() {
										var uluru = {lat: 47.9188213078,  lng: 106.9177242441};
										var map = new google.maps.Map(document.getElementById('map-main'), {
											zoom: 15,
											center: uluru
										});
										var marker = new google.maps.Marker({
											position: uluru,
											map: map,
										draggable:true
										});


										google.maps.event.addListener(marker,'position_changed', function(){
											 var lat = marker.getPosition().lat();
											 var lng = marker.getPosition().lng();

											 $('#latitude').val(lat);
											 $('#longitude').val(lng);
										});

									}


						</script>
						<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4WTJ9nx9w0aSKa-8LyuqaSPm6-c0tuZw&callback=initAutocomplete"> </script>
						@endsection
