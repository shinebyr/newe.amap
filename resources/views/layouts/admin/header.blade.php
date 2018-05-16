
<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>UB-LIST.com | Админ хэсэг</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/colors/main.css') }}" id="colors">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css">
<link src="">

<style>
      #map{
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>

</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fixed fullwidth dashboard">

	<!-- Header -->
	<div id="header" class="not-sticky">
		<div class="container">

			<!-- Left Side Content -->
			<div class="left-side">

				<!-- Logo -->
				<div id="logo">
					<a href="index.html"><img src="" alt=""></a>
					<a href="index.html" class="dashboard-logo"><img src="images/logo2.png" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">

						<li><a href="/">Нүүр хуудас</a></li>

						<li><a href="/admin">Админ хуудас</a></li>

            <li><a href="/admin/addlist">Байгууллагууд</a></li>



					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->

			</div>
			<!-- Left Side Content / End -->

			<!-- Right Side Content / End -->
				@include('layouts.admin.menuright')
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">
      <div class="active treeview">

			<ul data-submenu-title="Үндсэн хэсэг">
				<li ><a href="{{ asset('admin') }}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
				<li><a href="{{route('admin.messages')}}"><i class="sl sl-icon-envelope-open"></i> Messages</a></li>
				<!-- <li><a href="dashboard-bookings.html"><i class="fa fa-calendar-check-o"></i> Bookings</a></li> -->
          <li ><a href="{{ route('post.index') }}"><i class="im im-icon-Tag-4"></i>Нийтлэл</a></li>
          <li ><a href="{{ route('post.create') }}"><i class="im im-icon-Tag-2"></i>Шинэ нийтлэл</a></li>
			</ul>

			<ul data-submenu-title="Байгууллага">
				<li ><a href="{{ route('addlist.index') }}"><i class="sl sl-icon-layers"></i> Байгууллагууд</a></li>
				<li ><a href="{{ route('addlist.create') }}"><i class="sl sl-icon-plus"></i> Байгууллага нэмэх</a></li>
        <li ><a href="{{ route('addcategory.index') }}"><i class="im im-icon-Tag-4"></i> Төрлийн жагсаалт</a></li>
        <li ><a href="{{ route('addtag.index') }}"><i class="im im-icon-Tag-2"></i> Түлхүүр үгсийн жагсаалт</a></li>
        <li ><a href="{{ route('city.index') }}"><i class="im im-icon-Opera-House"></i> Хотуудын жагсаалт</a></li>
        <li ><a href="{{ route('amenity.index') }}"><i class="im im-icon-Coffee"></i> Орчин</a></li>

        <li ><a href="{{ route('addlist.reviews')}}"><i class="sl sl-icon-star"></i> Reviews</a></li>
			</ul>

      <ul data-submenu-title="Хэрэглэгч">
        <li ><a href="{{ route('users.index') }}"><i class="sl sl-icon-user"></i> Хэрэглэгчид</a></li>
        <li ><a href="{{ route('role.index') }}"><i class="im im-icon-Find-User"></i> Админ эрх</a></li>
        <li ><a href="index.html"><i class="sl sl-icon-power"></i> Гарах</a></li>
      </ul>
</div>
		</div>
	</div>
	<!-- Navigation / End -->
