@extends('layouts.app')
@section('content')

<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">


		<!-- Post Content -->
		<div class="col-lg-9 col-md-8 padding-right-30">

</br>
@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<p class="notification error closeable">{{ $error }}</p>
			@endforeach
		@endif

		@if (session('success'))
		<div class="alert alert-success">
		      <div class="notification success closeable">
		        <p><span>Сэтгэгдэл бичсэнд баярлалаа</span></p>
		        <a class="close" href="#"></a>
		      </div>
		</div>
		@endif
			<!-- Blog Post -->
			<div class="blog-post single-post">

				<!-- Img -->
				<img class="post-img" src="{{Storage::disk('local')->url($post->image)}}" alt="">


				<!-- Content -->
				<div class="post-content">

					<h3>{{$post->title}}</h3>

					<ul class="post-meta">
						<li>August 22, 2017</li>
						<li><a href="#">{{$post->tag}}</a></li>
						<li><a href="#">5 Comments</a></li>
					</ul>

					<p>{{$post->subtitle}}</p>

					<p>{{$post->body}}</p>


					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
						<li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>
			<!-- Blog Post / End -->


			<!-- Post Navigation -->
			<ul id="posts-nav" class="margin-top-0 margin-bottom-45">
				<li class="next-post">
					<a href="#"><span>Next Post</span>
					The Best Cofee Shops In Sydney Neighborhoods</a>
				</li>
				<li class="prev-post">
					<a href="#"><span>Previous Post</span>
					Hotels for All Budgets</a>
				</li>
			</ul>



			<!-- Related Posts -->
			<div class="clearfix"></div>
			<h4 class="headline margin-top-25">Related Posts</h4>
			<div class="row">
			@foreach($newses as $news)
				<!-- Blog Post Item -->
				<div class="col-md-6">
					<a href="#" class="blog-compact-item-container">
						<div class="blog-compact-item">
							<img src="{{Storage::disk('local')->url($news->image)}}" alt="">
							<span class="blog-item-tag">{{$news->tag}}</span>
							<div class="blog-compact-item-content">
								<ul class="blog-post-tags">
									<li>22 August 2017</li>
								</ul>
								<h3>{{$news->title}}</h3>
								<p>{{$news->subtitle}}</p>
							</div>
						</div>
					</a>
				</div>
				<!-- Blog post Item / End -->
			@endforeach
			</div>
			<!-- Related Posts / End -->


			<div class="margin-top-50"></div>

			<!-- Reviews -->
			<section class="comments">
			<h4 class="headline margin-bottom-35">Comments <span class="comments-amount">(5)</span></h4>

				<ul>
					@foreach($post->comments as $comment)
					<li>
						<div class="avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /> </div>
						<div class="comment-content"><div class="arrow-comment"></div>
							<div class="comment-by">{{$comment->name}}<span class="date">{{$comment->created_at->format('F nS, Y - gi:A')}}</span>

							</div>
							<p>{{$comment->comment}}</p>
						</div>
						@endforeach
					</li>
				 </ul>

			</section>
			<div class="clearfix"></div>


			<!-- Add Comment -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-35">Add Review</h3>

				<!-- Review Comment -->
				<form action="{{ route('comments.store') }}" class="add-comment" method="post">
					{{ csrf_field() }}

					<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>Нэр:</label>
								<input type="text" name="name" id="name" value=""/>
							</div>

							<div class="col-md-6">
								<label>Имэйл:</label>
								<input type="text" name="email" id="email"  value=""/>
							</div>
						</div>

						<div>
							<label>Сэтгэгдэл:</label>
							<textarea cols="40" name="comment" id="comment" rows="3"></textarea>
						</div>
						<input type="hidden" name="post_id" value="{{$post->id}}">
					</fieldset>

					<button class="button">Илгээх</button>
					<div class="clearfix"></div>
				</form>

			</div>
			<!-- Add Review Box / End -->

	</div>
	<!-- Content / End -->

@endsection
