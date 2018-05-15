@extends('layouts.admin.app')

@section('content')

<div class="dashboard-content">

  <!-- Titlebar -->
  <div id="titlebar">
    <div class="row">
      <div class="col-md-12">
        <h2>Add Tag</h2>
        <a href="{{ route('role.index') }}" class="button preview"><i class="im im-icon-Arrow-Back3"></i> Буцах</a>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li>Add Listing</li>
            <li>Edit Role</li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  		<div class="row">
  			<div class="col-lg-12">
          <form role="form" action="{{ route('role.update', $role->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
  				<div class="switcher-content">

  				</div>
  				<div id="add-listing">
  					<!-- Section -->
  					<div class="add-listing-section">

  						<!-- Headline -->
  						<div class="add-listing-headline">
  							<h3><i class="sl sl-icon-doc"></i> Role засах хэсэг</h3>
  						</div>

  						<!-- Title -->
  						<div class="row with-forms">
  							<div class="col-md-12">
  								<h5>Tag title</h5>
  								<input id="name" name="name" class="search-field" type="text" value="{{ $role->name }}"/>
  							</div>
  						</div>
              <!-- Title -->

  				<button type="submit" class="button preview" name="button">Хадгалах<i class="fa fa-arrow-circle-right"></i></button>

  				</div>
  			</div>
  </form>
  			<!-- Copyrights -->
  			@include('layouts.inc.copyright')

  		</div>

  	</div>
  	<!-- Content / End -->


  </div>
  <!-- Dashboard / End -->


  </div>
  <!-- Wrapper / End -->
@endsection
