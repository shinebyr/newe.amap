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
					<a href="{{ route('posttag.create') }}" class="button preview"><i class="im im-icon-Tag-2"></i> Tag нэмэх</a>
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
				<form role="form" action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }} {{ method_field('PUT') }}

				<div id="add-listing">
					<!-- Section -->
					<div class="add-listing-section">

						<!-- Headline -->
						<div class="add-listing-headline">
							<h3><i class="sl sl-icon-doc"></i> POST</h3>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Гарчиг<i class="tip" data-tip-content="Өөрийн бизнесийн байгууллагын нэрийг бичнэ үү! "></i></h5>
								<input id="title" name="title" class="search-field" type="text" value="{{$post->title}}"/>
							</div>
						</div>

						<!-- Title -->
						<div class="row with-forms">
							<div class="col-md-12">
								<h5>Толгой нийтлэл <i class="tip" data-tip-content="Name of your slug"></i></h5>
								<input id="subtitle" name="subtitle" class="search-field" type="text" value="{{$post->subtitle}}"/>
							</div>
						</div>

						<!-- Row -->
						<div class="row with-forms">
							<!-- Type -->
							<div class="col-md-6">

								<h5>Түлхүүр үг <i class="tip" data-tip-content="Та уг хэсэг дээр өөрийн байгууллагаа нэг үгээр илтгэж болох оновчтой сонголт хийх ёстой юм."></i></h5>

								<select name="tag" data-placeholder="Select Multiple Items" class="chosen-select" value="{{$post->tag}}">
									<option value="">Зөвөлгөө</option>
									<option value="">Байгууллага</option>
									<option value="">Бүтээгдэхүүн</option>
									<option value="">Event</option>
								</select>

							</div>

							<div class="col-md-6">
								<h5>Slug <i class="tip" data-tip-content="Name of your slug"></i></h5>
								<input id="slug" name="slug" class="search-field" type="text" value="{{$post->slug}}"/>
							</div>

						</div>
						<!-- Row / End -->
						<div class="row with-forms">
								<!-- <div class="col-md-6">
									<h5>Зураг <i class="tip" data-tip-content="Name of your slug"></i></h5>

												<div class="submit-section">
													<input type="file" name="image" id="image">
												</div>

								</div> -->

								<div class="col-md-6">

																<!-- Checkboxes -->
																<h5 class="margin-top-30 margin-bottom-10">Байдал</h5>
																<div class="checkboxes in-row margin-bottom-20">


																	<input id="check-a" type="checkbox" name="status" value="1">
																	<label for="check-a"><mark class="color">Нүүр хуудасруу хэвлэх</mark><i class="tip" data-tip-content="Энэхүү хэсгийг итэвхижүүлснээр веб сайтын нүүр хуудсанд нийтлэгдэх эрх олгох юм."></i></label>


																</div>
																<!-- Checkboxes / End -->

									<!-- Section / End -->
								</div>
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
							<textarea class="WYSIWYG" name="body" cols="40" rows="3" id="body" spellcheck="true">{{$post->body}}</textarea>

						</div>

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
