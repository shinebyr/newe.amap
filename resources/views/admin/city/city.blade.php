@extends('layouts.admin.app')

@section('content')

<div class="dashboard-content">

  <!-- Titlebar -->
  <div id="titlebar">
    <div class="row">
      <div class="col-md-12">
        <h2>Хот нэмэх</h2>
        <a href="{{ route('addlist.index') }}" class="button preview"><i class="im im-icon-Arrow-Back3"></i> Байгууллагууд</a>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li>Хот хэмэх</li>
          </ul>
        </nav>
      </div>
    </div>
  </div>

@include('layouts.errors')

  		<div class="row">
  			<div class="col-lg-12">
  				<div class="switcher-content">

  				</div>
          <form for="form" action="{{ route('city.store') }}" method="post">
            {{ csrf_field() }}
  				<div id="add-listing">
  					<!-- Section -->
  					<div class="add-listing-section">

  						<!-- Headline -->
  						<div class="add-listing-headline">
  							<h3><i class="sl sl-icon-doc"></i> Категори нэмэх хэсэг</h3>
  						</div>

  						<!-- Title -->
  						<div class="row with-forms">
  							<div class="col-md-12">
  								<h5>City title</h5>
  								<input id="name" name="name" class="search-field" type="text" value=""/>
  							</div>
  						</div>
              <!-- Title -->
              <div class="row with-forms">
                <div class="col-md-12">
                  <h5>City Slug</h5>
                  <input id="slug" name="slug" class="search-field" type="text" value=""/>
                </div>
              </div>

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
