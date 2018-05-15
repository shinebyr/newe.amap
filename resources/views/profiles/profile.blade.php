@extends('layouts.app')

@section('content')

  <!-- Titlebar
  ================================================== -->
  <div id="titlebar" class="gradient">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">

  				<div class="user-profile-titlebar">
  					<div class="user-profile-avatar">
              <img src="{{ Storage::url($user->avatar) }}" alt="">
            </div>
  					<div class="user-profile-name">
  						<h2>{{$user->name}}</h2>
              <h5>{{ $user->profile->location }}</h5>
  						<!-- <div class="star-rating" data-rating="5">
  							<div class="rating-counter"><a href="#listing-reviews">(60 reviews)</a></div>
  						</div> -->
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
  <!-- Edit Section -->
      <div class="container">
        @if(Auth::id() == $user->id )
        <a href="{{ route('profile.edit') }}" class="button border">Бүртгэл засварлах</a>
        @endif
      </div>
  <!-- Content
  ================================================== -->
  <div class="container">
  	<div class="row sticky-wrapper">
  		<!-- Sidebar
  		================================================== -->
  		<div class="col-lg-4 col-md-4 margin-top-0">
  			<!-- Verified Badge -->
  			<!-- <div class="verified-badge with-tip" data-tip-content="Account has been verified and belongs to the person or organization represented.">
  				<i class="sl sl-icon-user-following"></i> Итэвхитэй
  			</div> -->
  			<!-- Contact -->
  			<div class="boxed-widget margin-top-30 margin-bottom-50">
  				<h3>Хэрэглэгчийн цонх</h3>
  				<ul class="listing-details-sidebar">
  					<!-- <li><i class="sl sl-icon-phone"></i> (123) 123-456</li> -->
  					<!-- <li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="88fce7e5c8edf0e9e5f8e4eda6ebe7e5">[email&#160;protected]</span></a></li> -->
            <li><i class="fa fa-envelope-o"></i> <a href="#"><span class="__cf_email__" data-cfemail="88fce7e5c8edf0e9e5f8e4eda6ebe7e5">{{$user->email}}</span></a></li>
          </ul>
  				<ul class="listing-details-sidebar social-profiles">
  					<li><a href="http://www.facebook.com/{{$user->facebook}}" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
  					<li><a href="http//instagram.com/insta" class="instagram-profile"><i class="fa fa-instagram"></i> Instagram</a></li>
  				</ul>
          <ul>
            <li><span>{{ $user->profile->about }}</span></li>
          </ul>
  			<!-- Contact / End-->
  		</div>
  		<!-- Sidebar / End -->
  		<!-- Content
  		================================================== -->
  	</div>
    <!-- Content
		================================================== -->
		<div class="col-lg-8 col-md-8 padding-left-30">

			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="margin-top-60 margin-bottom-20">Үнэлгээнүүд</h3>

				<div class="clearfix"></div>
        <section class="comments listing-reviews">

          <ul>
              @foreach($user->reviews as $review)
            <li>
              <div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
              <div class="comment-content"><div class="arrow-comment"></div>
                <div class="comment-by">{{$review->headline}}<span class="date">{{ date('F nS, Y - gi:A', strtotime($review->creaded_at)) }}</span>
                  <div class="star-rating" data-rating="{{$review->rating}}"></div>
                </div>
                <p>{{$review->description}}</p>

                <div class="review-images mfp-gallery-container">
                  <a href="images/review-image-01.jpg" class="mfp-gallery"><img src="images/review-image-01.jpg" alt=""></a>
                </div>
              </div>
            </li>
            @endforeach
           </ul>
        </section>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
						<div class="pagination-container margin-top-30">
							<nav class="pagination">
								<ul>
									<li><a href="#" class="current-page">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- Pagination / End -->
			</div>


		</div>

  </div>
</div>


@endsection
