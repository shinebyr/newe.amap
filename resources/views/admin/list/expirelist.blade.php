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
                      @foreach ($lists as $list)
                      <li>
                        <div class="list-box-listing">
                          <div class="list-box-listing-img"><a href="#"><img src="{{Storage::disk('local')->url($list->images)}}" alt=""></a></div>
                          <div class="list-box-listing-content">
                            <div class="inner">
                              <h3><a href="#">{{$list->title}}</a></h3>
                              <span>@foreach($list->cities as $city)
                              {{ $city->name }}
                            @endforeach, {{ $list->address }}</span>
                              <div class="star-rating" data-rating="{{$list->getStarRating()}}">
                                <div class="rating-counter">{{ $list->reviews()->count() }} үнэлгээтэй</div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="buttons-to-right">

                          <a href="{{ route('addlist.edit', $list->id) }}" class="button gray"><i class="sl sl-icon-note"></i> Засах</a>
                          <form id="delete-form-{{ $list->id }}" action="{{ route('addlist.destroy', $list->id) }}" method="post" style="display: none">
                              {{  csrf_field() }}
                              {{ method_field('DELETE') }}
                          </form>
                          <a href="" onclick="
                          if(confirm('Та уг байгууллагын бүртгэлийг устгахдаа итгэлтэй байна уу?'))
                          {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $list->id }}').submit();
                          }
                            else
                          {
                            event.preventDefault();
                          }" class="button gray"><i class="sl sl-icon-close"></i> Устгах</a>
                        </div>
                      </li>
<!--
											<form action="/admin/addlist/image-upload/{{$list->id}}" class="dropzone" id="my-awesome-dropzone-{{$list->id}}" method="post">
												{{csrf_field()}}
											</form> -->

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
