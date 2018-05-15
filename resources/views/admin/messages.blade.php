@extends('layouts.admin.app')

@section('content')

	<!-- Content
  	================================================== -->
  	<div class="dashboard-content">

  		<!-- Titlebar -->
  		<div id="titlebar">
  			<div class="row">
  				<div class="col-md-12">
  					<h2>Messages</h2>
  					<!-- Breadcrumbs -->
  					<nav id="breadcrumbs">
  						<ul>
  							<li><a href="#">Home</a></li>
  							<li><a href="#">Dashboard</a></li>
  							<li>Messages</li>
  						</ul>
  					</nav>
  				</div>
  			</div>
  		</div>

  		<div class="row">

  			<!-- Listings -->
  			<div class="col-lg-12 col-md-12">

  				<div class="messages-container margin-top-0">
  					<div class="messages-headline">
  						<h4>Inbox</h4>
  					</div>

  					<div class="messages-inbox">

  						<ul>
                @foreach($messages as $message)
  							<li class="unread">
  								<a href="">
  									<div class="message-avatar"><h5>{{$message->name}}</h5></div>

  									<div class="message-by">
  										<div class="message-by-headline">
                        <h4>{{$message->subject}}</h4>
                        <b>Emial:</b> <h5>{{$message->email}}</h5>
  											<span>{{ date('F nS, Y - gi:A', strtotime($message->creaded_at)) }}</span>
  										</div>
  										<p>{{$message->comments}}</p>

  									</div>
  								</a>
  							</li>
                @endforeach

              </ul>

  				<!-- Pagination -->
  				<div class="clearfix"></div>
  				<div class="pagination-container margin-top-30 margin-bottom-0">
  					<nav class="pagination">
  						<ul>
  							<li><a href="#" class="current-page">1</a></li>
  							<li><a href="#">2</a></li>
  							<li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
  						</ul>
  					</nav>
  				</div>
  				<!-- Pagination / End -->

  			</div>
      </div>
    </div>
@endsection
