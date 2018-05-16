@extends('layouts.admin.app')

@section('content')
	<!-- Content
	================================================== -->
	<div class="dashboard-content">

		<!-- Titlebar -->
		<div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Байгууллага жагсаалт</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Нүүр хуудас</a></li>
							<li><a href="#">Админ хэсэг</a></li>
							<li>Байгууллага жагсаалт</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Listings -->
			<div class="col-lg-12 col-md-12">
				<div class="dashboard-list-box margin-top-0">
					<h4>Бүртгэгдсэн байгууллагын жагсаалт</h4>
					<ul>
						@extends('layouts.admin.app')

						@section('content')
							<!-- Content
							================================================== -->
							<div class="dashboard-content">

								<!-- Titlebar -->
								<div id="titlebar">
									<div class="row">
										<div class="col-md-12">
											<h2>Байгууллага жагсаалт</h2>
											<!-- Breadcrumbs -->
											<nav id="breadcrumbs">
												<ul>
													<li><a href="#">Нүүр хуудас</a></li>
													<li><a href="#">Админ хэсэг</a></li>
													<li>Байгууллага жагсаалт</li>
												</ul>
											</nav>
										</div>
									</div>
								</div>

								<div class="row">

									<!-- Listings -->
									<div class="col-lg-12 col-md-12">
										<div class="dashboard-list-box margin-top-0">
											<h4>Бүртгэгдсэн байгууллагын жагсаалт</h4>
											<ul>
																	@foreach($posts as $post)
																	<li>
																		<div class="list-box-listing">
																			<div class="list-box-listing-img"><a href="#"><img src="{{Storage::disk('local')->url($post->image)}}" alt=""></a></div>
																			<div class="list-box-listing-content">
																				<div class="inner">
																					<h3><a href="#">{{$post->title}}</a></h3>
																					<span>{{$post->subtitle}}</span>

																				</div>
																			</div>
																		</div>

																		<div class="buttons-to-right">
																			<a href="{{ route('post.edit', $post->id) }}" class="button gray"><i class="sl sl-icon-note"></i> Засах</a>
																			<form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="post" style="display: none">
																					{{  csrf_field() }}
																					{{ method_field('DELETE') }}
																			</form>
																			<a href="" onclick="
																			if(confirm('Та уг байгууллагын бүртгэлийг устгахдаа итгэлтэй байна уу?'))
																			{
																				event.preventDefault();
																				document.getElementById('delete-form-{{ $post->id }}').submit();
																			}
																				else
																			{
																				event.preventDefault();
																			}" class="button gray"><i class="sl sl-icon-close"></i> Устгах</a>
																		</div>
																	</li>


																		@endforeach


											</ul>
										</div>
									</div>



								</div>

							</div>
							<!-- Content / End -->


						</div>
						<!-- Dashboard / End -->


						</div>
						<!-- Wrapper / End -->




											</div>
										</div>
										<!-- Copyrights -->
						@include('layouts.inc.copyright')
									</div>

								</div>
								<!-- Content / End -->


							</div>
							<!-- Dashboard / End -->


						@endsection



					</ul>
				</div>
			</div>



		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->




  				</div>
  			</div>
  			<!-- Copyrights -->
@include('layouts.inc.copyright')
  		</div>

  	</div>
  	<!-- Content / End -->


  </div>
  <!-- Dashboard / End -->


@endsection
