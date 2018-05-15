@extends('layouts.admin.app')

@section('content')


<div class="dashboard-content">

  <!-- Titlebar -->
  <div id="titlebar">
    <div class="row">
      <div class="col-md-12">

	<a href="{{ route('role.create') }}" class="button preview"><i class="im im-icon-Tag-2"></i> Role нэмэх</a>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li>Role table</li>
          </ul>
        </nav>
      </div>
    </div>
  </div>


  		<div class="row">
  			<div class="col-lg-12">

  				<div id="add-listing">
  					<!-- Section -->
  					<div class="add-listing-section">

  						<!-- Headline -->
  						<div class="add-listing-headline">
  							<h4><i class="sl sl-icon-doc"></i> Role жагсаалт</h4>
  						</div>

  						<!-- Title -->
  						<div class="row with-forms">
  							<div class="col-md-12">
                  <table class="basic-table">

                    <tr>
                      <th>Д/Д</th>
                      <th>Түлхүүр үг</th>
                      <th>Засах</th>
                      <th>Устгах</th>
                    </tr>
                    @foreach ($roles as $role)
                    <tr>
                      <td data-label="Column 1">{{ $loop->index }}</td>
                      <td data-label="Column 2">{{ $role->name }}</td>
                      <td data-label="Column 4"><a href="{{ route('role.edit', $role->id) }}" class="button border"><i class="im im-icon-Edit"></i> Засах</a></td>
                      <td data-label="Column 5"><form id="delete-form-{{ $role->id }}" action="{{ route('role.destroy', $role->id) }}" method="post" style="display: none">
                          {{  csrf_field() }}
                          {{ method_field('DELETE') }}
                      </form>
                        <a href="" onclick="
                        if(confirm('Та уг түлхүүр үгийг устгахдаа итгэлтэй байна уу?'))
                        {
                          event.preventDefault();
                          document.getElementById('delete-form-{{ $role->id }}').submit();
                        }
                          else
                        {
                          event.preventDefault();
                        }"
                        class="button border"><i class="im im-icon-Remove"></i> Устгах</a>

                      </td>
                    </tr>
                    @endforeach

                  </table>
  							</div>
  						</div>


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
