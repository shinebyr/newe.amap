@extends('layouts.admin.app')

@section('content')

<div class="dashboard-content">

  <!-- Titlebar -->
  <div id="titlebar">
    <div class="row">
      <div class="col-md-12">
        <h2>Add Category</h2>
        <a href="{{ route('price.create') }}" class="button preview"><i class="im im-icon-Arrow-Back3"></i> Буцах</a>

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
          <form for="form" action="{{ route('price.update', $price->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
  				<div id="add-listing">
  					<!-- Section -->
  					<div class="add-listing-section">


                            											<!-- Section -->
                            											<div class="add-listing-section margin-top-45">

                            												<!-- Headline -->
                            												<div class="add-listing-headline">
                            													<h3><i class="sl sl-icon-book-open"></i> Pricing</h3>
                            													<!-- Switcher -->
                            													<label class="switch"><input type="checkbox" checked><span class="slider round"></span></label>
                            												</div>

                            												<!-- Switcher ON-OFF Content -->
                            												<div class="switcher-content">

                            													<div class="row">
                            														<div class="col-md-12">
                            															<table id="pricing-list-container">
                            																<tr class="pricing-list-item pattern">
                            																	<td>
                            																		<div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
                            																		<div class="fm-input pricing-name"><input type="text" placeholder="Title" name="pname" id="pname" value="{{$price->pname}}"/></div>
                            																		<div class="fm-input pricing-ingredients"><input type="text" placeholder="Description" name="pdescription" id="pdescription" value="{{$price->pdescription}}"/></div>
                            																		<div class="fm-input pricing-price"><input type="text" placeholder="Price" data-unit="MNT" name="pprice" id="pprice" value="{{$price->pprice}}"/></div>
                            																		<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div>
                            																	</td>
                            																</tr>
                            															</table>
                            															<a href="#" class="button add-pricing-list-item">Add Item</a>
                            														</div>
                            													</div>

                            												</div>
                            												<!-- Switcher ON-OFF Content / End -->



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
