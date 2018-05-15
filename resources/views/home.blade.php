@extends('layouts.app')

@section('content')
<!-- Banner
================================================== -->
<div class="main-search-container dark-overlay">
	<div class="main-search-inner">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>AMAP Үйлчилгээний байгууллагуудын нэгдсэн портал</h2>
					<h4></h4>
				</div>
			</div>
		</div>
	</div>

	<!-- Video -->
	<div class="video-container">
		<video poster="images/main-search-video-poster.jpg" loop autoplay muted>
			<source src="images/main-search-video.mp4" type="video/mp4">
		</video>
	</div>

</div>

<!-- Content
================================================== -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-top-75">
				Нийт ангилал
			</h3>
		</div>

	</div>
</div>


<!-- Category Boxes -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="categories-boxes-container margin-top-5 margin-bottom-30">

				<!-- Box -->

				<a href="{{ URL('listings/tag/Restaurant') }}" class="category-small-box">
					<i class="im im-icon-Hamburger"></i>
					<h4>Ресторан</h4>
				</a>

				<!-- Box -->
				<a href="{{ URL('listings/tag/coffee-shop') }}" class="category-small-box">
					<i class="im  im-icon-Coffee"></i>
					<h4>Кофе Шоп</h4>
				</a>

				<!-- Box -->
				<a href="{{ URL('listings/tag/shops') }}" class="category-small-box">
					<i class="im im-icon-Shopping-Bag"></i>
					<h4>Дэлгүүр</h4>
				</a>

				<!-- Box -->
				<a href="{{ URL('listings/tag/night-clubs') }}" class="category-small-box">
					<i class="im im-icon-Cocktail"></i>
					<h4>Night Club +21</h4>
				</a>

				<!-- Box -->
				<a href="{{ URL('listings/tag/events') }}" class="category-small-box">
					<i class="im im-icon-Electric-Guitar"></i>
					<h4>Events</h4>
				</a>

				<!-- Box -->
				<a href="{{ URL('listings/tag/Camp') }}" class="category-small-box">
					<i class="im im-icon-Sunglasses-Smiley"></i>
					<h4>Амралтын газар</h4>
				</a>


			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->


<!-- Fullwidth Section -->
<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-45">
					Онцлох байгууллагууд
					<span>Манай сайтаас онцолж байгаа шилдэг байгууллагууд</span>
				</h3>
			</div>
		</div>
	</div>

	<!-- Carousel / Start -->
	<div class="simple-fw-slick-carousel dots-nav">
      @foreach ($services as $service)

		<div class="fw-carousel-item">
			<a href="{{ route('service',$service->slug)}}" class="listing-item-container compact">
				<div class="listing-item">
					<img src="{{Storage::disk('local')->url($service->images)}}" alt="">
					@foreach($service->categories as $category)
											<div class="listing-badge now-open">{{ $category->name }}</div>
				    @endforeach
					<div class="listing-item-content">
							<div class="star-rating" data-rating="{{$service->getStarRating()}}"></div>
						<h3>{{ $service->title }}</h3>
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

    @endforeach
	</div>
	<!-- Carousel / End -->


</section>
<!-- Fullwidth Section / End -->


<!-- Container -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-bottom-35 margin-top-70">Дүүргүүд<span>хамгийн их бүртгэлтэй байгууллагуудтай дүүргүүд</span></h3>
		</div>

		<div class="col-md-4">

			<!-- Image Box -->
			<a href="{{ URL('listings/city/bayngol') }}" class="img-box" data-background-image="images/bayngol.jpg">
				<div class="img-box-content visible">
					<h4>Баянгол</h4>
					<span>{{ $service->cities()->count() }} Listings</span>
				</div>
			</a>

		</div>

		<div class="col-md-8">

			<!-- Image Box -->
			<a href="{{ URL('listings/city/baynzurkh') }}" class="img-box" data-background-image="images/baynzurh.jpg">
				<div class="img-box-content visible">
					<h4>Баянзүрх</h4>
					<span>{{ $service->cities()->count() }} Listings</span>
				</div>
			</a>

		</div>

		<div class="col-md-8">

			<!-- Image Box -->
			<a href="{{ URL('listings/city/Sukhbaatar') }}" class="img-box" data-background-image="images/sukhbaatar.jpg">
				<div class="img-box-content visible">
					<h4>Сүхбаатар</h4>
					<span>12 Listings</span>
				</div>
			</a>

		</div>

		<div class="col-md-4">

			<!-- Image Box -->
			<a href="{{ URL('listings/city/Khan-Uul') }}" class="img-box" data-background-image="images/hanuul.jpg">
				<div class="img-box-content visible">
					<h4>Хан-Уул</h4>
					<span>9 Listings</span>
				</div>
			</a>

		</div>
		<div class="col-md-4">

			<!-- Image Box -->
			<a href="{{ URL('listings/city/SonginoKhairhan') }}" class="img-box" data-background-image="images/songinohairhan.jpg">
				<div class="img-box-content visible">
					<h4>Сонгинохайрхан</h4>
					<span>14 Listings</span>
				</div>
			</a>

		</div>

		<div class="col-md-8">

			<!-- Image Box -->
			<a href="{{ URL('listings/city/Chingeltei') }}" class="img-box" data-background-image="images/chingeltei.jpg">
				<div class="img-box-content visible">
					<h4>Чингэлтэй</h4>
					<span>24 Listings</span>
				</div>
			</a>

		</div>
	</div>
</div>
<!-- Container / End -->


<!-- Flip banner -->
<a href="{{route('listings')}}" class="flip-banner parallax margin-top-65" data-background="images/slider-bg-02.jpg" data-color="#f91942" data-color-opacity="0.85" data-img-width="2500" data-img-height="1666">
	<div class="flip-banner-content">
		<h2 class="flip-visible">Байгууллагуудын бүртгэлтэй танилцах</h2>
		<h2 class="flip-hidden">Жагсаалтруу шилжих <i class="sl sl-icon-arrow-right"></i></h2>
	</div>
</a>
<!-- Flip banner / End -->


<section class="fullwidth border-top margin-top-40 margin-bottom-0 padding-top-60 padding-bottom-65" data-background-color="#ffffff">
	<!-- Logo Carousel -->
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-40 margin-top-10">Companies We've Worked With <span>We can assist you with your innovation or commercialisation journey!</span></h3>
			</div>

			<!-- Carousel -->
			<div class="col-md-12">
				<div class="logo-slick-carousel dot-navigation">

					<div class="item">
					<a href="{{ URL('listings/category/broadway') }}"><img src="images/broadway.jpg" alt=""></a>
					</div>

					<div class="item">
						<img src="images/unitel.png" alt="">
					</div>

					<div class="item">
						<a href="ssda" src="images/unitel.png"></a>
					</div>

					<div class="item">
						<img src="images/logo-04.png" alt="">
					</div>

					<div class="item">
						<img src="images/logo-05.png" alt="">
					</div>

					<div class="item">
						<img src="images/logo-06.png" alt="">
					</div>

					<div class="item">
						<img src="images/unitel.png" alt="">
					</div>


				</div>
			</div>
			<!-- Carousel / End -->

		</div>
	</div>
	<!-- Logo Carousel / End -->
</section>


@endsection
