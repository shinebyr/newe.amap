@extends('layouts.app')
@section('content')


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Блог</h2><span></span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="/">Home</a></li>
						<li>Blog</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">


	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">
		<div class="col-lg-9 col-md-8 padding-right-30">
@foreach($posts as $post)
			<!-- Blog Post -->
			<div class="blog-post">

				<!-- Img -->
				<a href="{{route('view.post', $post->slug)}}" class="post-img">
					<img src="{{Storage::disk('local')->url($post->image)}}" alt="">
				</a>

				<!-- Content -->
				<div class="post-content">
					<h3><a href="{{route('view.post', $post->slug)}}">{{$post->title}}</a></h3>

					<ul class="post-meta">
						<li>{{$post->created_at->format('F nS, Y - gi:A')}}</li>
						<li><a href="#">{{$post->tag}}</a></li>
						<!-- <li><a href="#">5 Comments</a></li> -->
					</ul>

					<p>{{$post->subtitle}}</p>

					<a href="{{route('view.post', $post->slug)}}" class="read-more">Read More <i class="fa fa-angle-right"></i></a>
				</div>

			</div>
			<!-- Blog Post / End -->
@endforeach


			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-bottom-40">
						<nav class="pagination">
							<ul>
								<li><a href="#" class="current-page">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	<!-- Blog Posts / End -->


	<!-- Widgets -->
	<div class="col-lg-3 col-md-4">
		<div class="sidebar right">

			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Search Blog</h3>
				<div class="search-blog-input">
					<div class="input"><input class="search-field" type="text" placeholder="Type and hit enter" value=""/></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<!-- Widget / End -->


			<!-- Widget -->
			<div class="widget margin-top-40">
				<h3>Got any questions?</h3>
				<div class="info-box margin-bottom-10">
					<p>Having any questions? Feel free to ask!</p>
					<a href="pages-contact.html" class="button fullwidth margin-top-20"><i class="fa fa-envelope-o"></i> Drop Us a Line</a>
				</div>
			</div>
			<!-- Widget / End -->


			<!-- Widget -->
			<div class="widget margin-top-40">

				<h3>Popular Posts</h3>
				<ul class="widget-tabs">

					<!-- Post #1 -->
					<li>
						<div class="widget-content">
								<div class="widget-thumb">
								<a href="pages-blog-post.html"><img src="images/blog-widget-03.jpg" alt=""></a>
							</div>

							<div class="widget-text">
								<h5><a href="pages-blog-post.html">Hotels for All Budgets </a></h5>
								<span>October 26, 2016</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
				</ul>

			</div>
			<!-- Widget / End-->


			<!-- Widget -->
			<div class="widget margin-top-40">
				<h3 class="margin-bottom-25">Social</h3>
				<ul class="social-icons rounded">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>

			</div>
			<!-- Widget / End-->

			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>
<div id="backtotop"><a href="#"></a></div>


@endsection
