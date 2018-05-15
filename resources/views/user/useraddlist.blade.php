@extends('layouts.app')
@section('content')


<!-- Content
================================================== -->

@if (session('success'))
<div class="alert alert-success">
      <div class="notification success closeable">
        <p><span>Амжилттай илгээлээ!!!</span> Бид таны бүртгэлийг нягталж үзээд веб сайтдаа бүртгэх болно. Баярлалаа</p>
        <a class="close" href="#"></a>
      </div>
</div>
@endif

@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="notification error closeable">
      <p><span>{{ $error }}></span> Уг талбаруудыг бөглөнө үү!!</p>
  <a class="close" href="#"></a>
    </div>

  @endforeach
@endif
<!-- Container -->
<div class="container">

		<div class="row">
			<div class="col-lg-12">

				<div class="notification notice large margin-bottom-55">
					<h4>Та өөрийн байгууллагаа бүртгүүлж амжаагүй байна уу? 🙂</h4>
					<p>Тэгвэл та өөрийн байгууллагын мэдээллийг доорх форм дээр <b>ҮНЭН ЗӨВ БӨГЛСНӨӨР</b> манай вэб сайтд үнэ төлбөргүй нэгдэх боломжтой. </p>
				</div>
        <form role="form" action="{{ route('useraddlist.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
				<div id="add-listing" class="separated-form">

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
								<input id="title" name="title" class="search-field" type="text" placeholder="Өөрийн байгууллагын албан ёсны бренд нэрийг бичнэ үү"/>
							</div>
						</div>

            <!-- Title -->
            <div class="row with-forms">
              <div class="col-md-12">
                <h5>AMAP ID <i class="tip" data-tip-content="Уг хэсэг нь танай байгууллын манай веб сайтад хандах холбоос бүхий эрх үүсгэх ID учир та өөрийн байгууллагын нэрийг Англи үсгээр үнэн зөв бичнэ үү!"></i></h5>
                <input id="slug" name="slug" class="search-field" type="text" placeholder="Латин үсгээр бичнэ үү."/>
              </div>
            </div>


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
          				<div id="map-main" data-map-zoom="30" style="width:100%; height:500px;"></div>
          				<div class="row with-forms">
          					<div class="col-md-4">
          						<h5>latitude </h5>
          						<input name="latitude" id="latitude" type="text">
          					</div>

          					<div class="col-md-4">
          						<h5>longitude</h5>
          						<input name="longitude" id="longitude" type="text">
          					</div>
          				</div>
          	</div>
                <!-- Address -->
								<div class="col-md-6">
									<h5>Хаяг</h5>
									<input id="address" name="address" type="text" placeholder="Байрлалаа тодорхой бичнэ үү">
								</div>


						</div>
					</div>
					<!-- Section / End -->
          <!-- Section -->
          <div class="add-listing-section margin-top-45">

            <!-- Headline -->
            <div class="add-listing-headline">
              <h3><i class="sl sl-icon-picture"></i> Зураг</h3>
            </div>

            <div class="submit-section">
              <input type="file" name="images" id="images">
            </div>

          </div>
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
                <h5>Утас <span></span></h5>
                <input name="phone" id="phone" type="text">
              </div>

              <!-- Website -->
              <div class="col-md-4">
                <h5>Веб сайт <span>(нэмэлт мэдээлэл)</span></h5>
                <input name="website" id="website" type="text">
              </div>

              <!-- Email Address -->
              <div class="col-md-4">
                <h5>Имэйл хаяг <span>(нэмэлт мэдээлэл)</span></h5>
                <input name="email" id="email" type="text">
              </div>

              <div class="col-md-4">
                <h5>Tax <span>(optional)</span></h5>
                <input name="tax" id="tax" type="text">
              </div>

						</div>
						<!-- Row / End -->


						<!-- Row -->
						<div class="row with-forms">

							<!-- Phone -->
              <div class="col-md-4">
                <h5 class="fb-input"><i class="fa fa-facebook-square"></i> Facebook <span>(нэмэлт мэдээлэл)</span></h5>
                <input name="facebook" id="facebook" type="text" placeholder="https://www.facebook.com/">
              </div>

              <!-- Website -->
              <div class="col-md-4">
                <h5 class="twitter-input"><i class="fa fa-instagram"></i> Instagram <span>(нэмэлт мэдээлэл)</span></h5>
                <input name="instagram" id="instagram" type="text" placeholder="https://www.instagtam.com/">
              </div>

						</div>
						<!-- Row / End -->

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




                              <button type="submit" class="button preview" name="button">Хадгалах<i class="fa fa-arrow-circle-right"></i></button>

                              </form>
				</div>
			</div>

		</div>

	</div>
</div>
	<!-- Content / End -->
<!-- Container / End -->
<!-- Opening hours added via JS (this is only for demo purpose) -->


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
