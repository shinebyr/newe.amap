@extends('layouts.admin.app') @section('content')

<!-- Content
	================================================== -->


<div class="dashboard-content">
	@if (session('success'))
	<div class="alert alert-success">
	      <div class="notification success closeable">
	        <p><span>Зургын цомог амжилттай устгагдлаа!!!</span> {{ $list->title }} Байгууллагын бүртгэлд одоогоор зураггүй болсон тул шинээр зураг хуулна уу!!</p>
	        <a class="close" href="#"></a>
	      </div>
	</div>
	@endif
	<!-- Titlebar -->
	<div id="titlebar">
		<div class="row">
			<div class="col-md-12">
				<h2>Байгууллага засварлах</h2>
				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="#">Нүүр хуудас</a></li>
						<li><a href="#">Админ хэсэг</a></li>
						<li>Байгууллага жагсаалт</li>
						<li>Засах хэсэг</li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	@if (count($errors) > 0) @foreach ($errors->all() as $error)
	<p class="notification error closeable">{{ $error }}</p>
	@endforeach @endif
	<div class="row">
		<div class="col-lg-12">

			<!-- Section -->
			<div class="add-listing-section margin-top-45">

				<!-- Headline -->
				<div class="add-listing-headline">
					<h3><i class="sl sl-icon-picture"></i> Зураг</h3>
				</div>

				<!-- Dropzone -->
				<form action="/admin/addlist/image-upload/{{$list->id}}" class="dropzone" id="my-awesome-dropzone-{{$list->id}}" method="post">
					{{csrf_field()}}
				</form>


				<a href="{{url('/admin/addlist/delete/' . $list->id)}}" class="button">delete</a> Нийт <span>{{$list->pictures()->count()}}</span> Зураг байна.


			</div>
			<!-- Section / End -->
			<form role="form" action="{{ route('addlist.update', $list->id) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }} {{ method_field('PUT') }}
				<div id="add-listing">
					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> Үндсэн мэдээлэл</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Бүртгэлийн нэр <i class="tip" data-tip-content="Өөрийн бизнесийн байгууллагын нэрийг бичнэ үү! "></i></h5>
								<input id="title" name="title" class="search-field" type="text" value="{{ $list->title }}" />
							</div>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Slug <i class="tip" data-tip-content="Name of your slug"></i></h5>
								<input id="slug" name="slug" class="search-field" type="text" value="{{ $list->slug }}" />
							</div>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Status -->
							<div class="col-md-6">
								<h5>Төрөл</h5>
								<select class="chosen-select-no-single" name="categories[]>
									<option label=" blank ">Select Category</option>
									@foreach ($categories as $category)
									<option value="{{ $category->id }}"
										@foreach ($list->categories as $listCategory)
											@if ($listCategory->id == $category->id)
												selected
											@endif
										@endforeach
										>{{ $category->name }}</option>
									@endforeach
								</select>
							</div>

							<!-- Type -->
							<div class="col-md-6">

								<h5>Түлхүүр үг <i class="tip" data-tip-content="Та уг хэсэг дээр өөрийн байгууллагаа нэг үгээр илтгэж болох оновчтой сонголт хийх ёстой юм."></i></h5>

								<select name="tags[]" data-placeholder="Select Multiple Items" class="chosen-select" multiple>
									@foreach ($tags as $tag)
									<option value="{{ $tag->id }}"
										@foreach ($list->tags as $listTag)
											@if ($listTag->id == $tag->id)
												selected
											@endif
										@endforeach
										>{{ $tag->name }}</option>
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

							<div id="map-container" class="fullwidth-home-map">
								<div id="map-main" data-map-zoom="13" style="width:100%; height:500px; Display:block;"></div>
								<!-- Row -->
								<div class="row with-forms">
									<!-- Phone -->
									<div class="col-md-4">
										<h5>Өргөрөг </h5>
										<input name="latitude" id="latitude" type="text" value="{{ $list->latitude }}">
									</div>
									<!-- Website -->
									<div class="col-md-4">
										<h5>Уртраг</h5>
										<input name="longitude" id="longitude" type="text" value="{{ $list->longitude }}">
									</div>
								</div>
								<!-- Row / End -->
							</div>
							<!-- Row -->
							<div class="row with-forms">

								<!-- City -->
								<div class="col-md-6">
									<h5>Хот</h5>
									<select class="chosen-select-no-single" name="cities[]>
										<option label=" blank ">Select Category</option>
										@foreach ($cities as $city)
										<option value="{{ $city->id }}"
											@foreach ($list->cities as $listCity)
												@if ($listCity->id == $city->id)
													selected
												@endif
											@endforeach
											>{{ $city->name }}</option>
										@endforeach
									</select>
								</div>

								<!-- Address -->
								<div class="col-md-6">
									<h5>Хаяг</h5>
									<input id="address" name="address" type="text" placeholder="e.g. 964 School Street" value="{{ $list->address }}">
								</div>

							</div>
							<!-- Row / End -->

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
							<textarea class="WYSIWYG" name="description" cols="40" rows="3" id="description" spellcheck="true">{{ $list->description }}</textarea>
						</div>

						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5>Утас <span>(Нэмэлт мэдээлэл)</span></h5>
								<input name="phone" id="phone" type="text" value="{{ $list->phone }}">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5>Вэб сайт <span>(Нэмэлт мэдээлэл)</span></h5>
								<input name="website" id="website" type="text" value="{{ $list->website }}">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>Имэйл <span>(Нэмэлт мэдээлэл)</span></h5>
								<input name="email" id="email" type="text" value="{{ $list->email }}">
							</div>

							<!-- Email Address -->
							<div class="col-md-4">
								<h5>Tax <span>(optional)</span></h5>
								<input name="tax" id="tax" type="text" value="{{ $list->tax }}">
							</div>

						</div>
						<!-- Row / End -->


						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
							<div class="col-md-4">
								<h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(optional)</span></h5>
								<input name="facebook" id="facebook" type="text" placeholder="https://www.facebook.com/" value="{{ $list->facebook }}">
							</div>

							<!-- Website -->
							<div class="col-md-4">
								<h5 class="twitter-input"><i class="fa fa-instagram"></i> Instagram <span>(optional)</span></h5>
								<input name="instagram" id="instagram" type="text" placeholder="https://www.instagtam.com/" value="{{ $list->instagram }}">
							</div>

						</div>
						<!-- Row / End -->

						<div class="row with-forms">

							<div class="col-md-6">

								<h5>Орчины мэдээлэл <i class="tip" data-tip-content="Та уг хэсэг дээр өөрийн байгууллагаа нэг үгээр илтгэж болох оновчтой сонголт хийх ёстой юм."></i></h5>

								<select name="amenities[]" data-placeholder="Select Multiple Items" class="chosen-select" multiple>
									@foreach ($amenities as $amenity)
									<option value="{{ $amenity->id }}"
										@foreach ($list->amenities as $listAmenity)
											@if ($listAmenity->id == $amenity->id)
												selected
											@endif
										@endforeach
										>{{ $amenity->name }}</option>
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
								<div class="col-md-2">
									<h5>Даваа</h5></div>
								<div class="col-md-5">
									<select name="monday_open" id="monday_open" class="chosen-select" data-placeholder="Нээх цаг">
										<option>{{ $list->monday_open }}</option>
										<option>Хаалттай</option>
										<option value="1am">1 AM</option>
										<option value="2am">2 AM</option>
										<option value="3am">3 AM</option>
										<option value="4am">4 AM</option>
										<option value="5am">5 AM</option>
										<option value="6am">6 AM</option>
										<option value="7am">7 AM</option>
										<option value="8am">8 AM</option>
										<option value="9am">9 AM</option>
										<option value="10am">10 AM</option>
										<option value="11am">11 AM</option>
										<option value="12am">12 AM</option>
										<option value="1pm">1 PM</option>
										<option value="2pm">2 PM</option>
										<option value="3pm">3 PM</option>
										<option value="4pm">4 PM</option>
										<option value="5pm">5 PM</option>
										<option value="6pm">6 PM</option>
										<option value="7pm">7 PM</option>
										<option value="8pm">8 PM</option>
										<option value="9pm">9 PM</option>
										<option value="10pm">10 PM</option>
										<option value="11pm">11 PM</option>
										<option value="12pm">12 PM</option>
									</select>
								</div>
								<div class="col-md-5">
									<select name="monday_close" id="monday_close" class="chosen-select" data-placeholder="Хаах цаг">
										<option>{{ $list->monday_close }}</option>
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
								<div class="col-md-2">
									<h5>Tuesday</h5></div>
								<div class="col-md-5">
									<select name="tuesday_open" id="tuesday_open" class="chosen-select" data-placeholder="Нээх цаг">
										<option>{{ $list->tuesday_open }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
								<div class="col-md-5">
									<select name="tuesday_close" id="tuesday_close" class="chosen-select" data-placeholder="Хаах цаг">
										<option>{{ $list->tuesday_close }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2">
									<h5>Wednesday</h5></div>
								<div class="col-md-5">
									<select name="wednesday_open" id="wednesday_open" class="chosen-select" data-placeholder="Нээх цаг">
										<option>{{ $list->wednesday_open }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
								<div class="col-md-5">
									<select name="wednesday_close" id="wednesday_close" class="chosen-select" data-placeholder="Хаах цаг">
										<option>{{ $list->wednesday_close }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2">
									<h5>Thursday</h5></div>
								<div class="col-md-5">
									<select name="thursday_open" id="thursday_open" class="chosen-select" data-placeholder="Нээх цаг">
										<option>{{ $list->thursday_open }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
								<div class="col-md-5">
									<select name="thursday_close" id="thursday_close" class="chosen-select" data-placeholder="Хаах цаг">
										<option>{{ $list->thursday_close }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2">
									<h5>Friday</h5></div>
								<div class="col-md-5">
									<select name="friday_open" id="friday_open" class="chosen-select" data-placeholder="Нээх цаг">
										<option>{{ $list->friday_open }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
								<div class="col-md-5">
									<select name="friday_close" id="friday_close" class="chosen-select" data-placeholder="Хаах цаг">
										<option>{{ $list->friday_close }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2">
									<h5>Saturday</h5></div>
								<div class="col-md-5">
									<select name="saturday_open" id="saturday_open" class="chosen-select" data-placeholder="Нээх цаг">
										<option>{{ $list->saturday_open }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
								<div class="col-md-5">
									<select name="saturday_close" id="saturday_close" class="chosen-select" data-placeholder="Хаах цаг">
										<option>{{ $list->saturday_close }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
							</div>
							<!-- Day / End -->

							<!-- Day -->
							<div class="row opening-day js-demo-hours">
								<div class="col-md-2">
									<h5>Sunday</h5></div>
								<div class="col-md-5">
									<select name="sunday_open" id="sunday_open" class="chosen-select" data-placeholder="Нээх цаг">
										<option>{{ $list->sunday_open }}</option>
										<!-- Hours added via JS (this is only for demo purpose) -->
									</select>
								</div>
								<div class="col-md-5">
									<select name="sunday_close" id="sunday_close" class="chosen-select" data-placeholder="Хаах цаг">
										<option>{{ $list->sunday_close }}</option>
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
					<div class="add-listing-section margin-top-45">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-check"></i> Итэвхижүүлэлт</h3>
						</div>

						<!-- Checkboxes -->
						<h5 class="margin-top-30 margin-bottom-10">Зөвшөөрөл</h5>
						<div class="checkboxes in-row margin-bottom-20">


							<input id="check-b" type="checkbox" name="status" value="1" @if ($list->status == 1) {{'checked'}} @endif >
							<label for="check-b">Веб сайтад нийтлэх зөвшөөрөл</label>

							<input id="check-a" type="checkbox" name="special" value="1" @if ($list->special == 1) {{'checked'}} @endif >
							<label for="check-a"><mark class="color">Онцлох байгууллага болгох</mark><i class="tip" data-tip-content="Энэхүү хэсгийг итэвхижүүлснээр веб сайтын нүүр хуудсанд нийтлэгдэх эрх олгох юм."></i></label>


						</div>
						<!-- Checkboxes / End -->
					</div>
					<!-- Section / End -->

					<button type="submit" class="button preview" name="button">Хадгалах<i class="fa fa-arrow-circle-right"></i></button>
					<!-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> -->

				</div>
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
<!-- Wrapper / End -->

@endsection @section('script')
<script>
	function initAutocomplete() {
		var uluru = {
			lat: 47.9188213078,
			lng: 106.9177242441
		};
		var map = new google.maps.Map(document.getElementById('map-main'), {
			zoom: 15,
			center: uluru
		});
		var marker = new google.maps.Marker({
			position: uluru,
			map: map,
			draggable: true
		});


		google.maps.event.addListener(marker, 'position_changed', function() {
			var lat = marker.getPosition().lat();
			var lng = marker.getPosition().lng();

			$('#latitude').val(lat);
			$('#longitude').val(lng);
		});

	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4WTJ9nx9w0aSKa-8LyuqaSPm6-c0tuZw&callback=initAutocomplete">
</script>
@endsection
