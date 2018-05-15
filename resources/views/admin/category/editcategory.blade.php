@extends('layouts.admin.app')

@section('content')

<div class="dashboard-content">

  <!-- Titlebar -->
  <div id="titlebar">
    <div class="row">
      <div class="col-md-12">
        <h2>Add Category</h2>
        <a href="{{ route('addlist.create') }}" class="button preview"><i class="im im-icon-Arrow-Back3"></i> Буцах</a>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li>Add Listing</li>
            <li>Add Category</li>
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
          <form for="form" action="{{ route('addcategory.update', $category->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
  				<div id="add-listing">
  					<!-- Section -->
  					<div class="add-listing-section">

  						<!-- Headline -->
  						<div class="add-listing-headline">
  							<h3><i class="sl sl-icon-doc"></i> Категори засах хэсэг</h3>
  						</div>

  						<!-- Title -->
  						<div class="row with-forms">
  							<div class="col-md-12">
  								<h5>Category title</h5>
  								<input id="name" name="name" class="search-field" type="text" value="{{ $category->name }}"/>
  							</div>
  						</div>
              <!-- Title -->
              <div class="row with-forms">
                <div class="col-md-12">
                  <h5>Category Slug</h5>
                  <input id="slug" name="slug" class="search-field" type="text" value="{{ $category->slug }}"/>
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
