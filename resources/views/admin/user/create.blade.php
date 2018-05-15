@extends('layouts.admin.app')

@section('content')

<div class="dashboard-content">

  <!-- Titlebar -->
  <div id="titlebar">
    <div class="row">
      <div class="col-md-12">
        <h2>My Profile</h2>
        <a href="{{ route('users.index') }}" class="button preview"><i class="im im-icon-Arrow-Back3"></i> Буцах</a>

        <!-- Breadcrumbs -->
        <nav id="breadcrumbs">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li>My Profile</li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
<form role="form" action="{{ route('users.store') }}" method="post">
{{ csrf_field() }}

  <div class="row">

    <!-- Profile -->
    <div class="col-lg-6 col-md-12">
      <div class="dashboard-list-box margin-top-0">
        <h4 class="gray">Profile Details</h4>
        <div class="dashboard-list-box-static">

          <!-- Avatar -->
          <div class="edit-profile-photo">
            <img src="images/user-avatar.jpg" alt="">
            <div class="change-photo-btn">
              <div class="photoUpload">
                  <span><i class="fa fa-upload"></i> Upload Photo</span>
                  <input type="file" class="upload" name="avatar" accept="image/" />
              </div>
            </div>
          </div>

          <!-- Details -->
          <div class="my-profile">

            <label>Хэрэглэгчийн нэр</label>
            <input type="text" id="name" name="name">

            <label>Имэйл хаяг</label>
            <input type="text" id="email" name="email">

            <label><i class="fa fa-instagram"></i> Twitter</label>
            <input placeholder="https://www.instagram.com" type="text">

            <label><i class="fa fa-facebook-square"></i> Facebook</label>
            <input placeholder="https://www.facebook.com/" id="facebook" name="facebook" type="text">

            <label><i class="fa fa-google-plus"></i> Google+</label>
            <input placeholder="https://www.google.com/" type="text">
          </div>



        </div>
      </div>
    </div>

    <!-- Change Password -->
    <div class="col-lg-6 col-md-12">
      <div class="dashboard-list-box margin-top-0">
        <h4 class="gray">Change Password</h4>
        <div class="dashboard-list-box-static">

          <!-- Change Password -->
          <div class="my-profile">
            <label>New Password</label>
            <input type="password" id="password" name="password">

            <label>Confirm New Password</label>
            <input type="password" name="confirm_password" id="confirm_password">
          </div>

        </div>
      </div>

    </div>

    <!-- Change Password -->
    <div class="col-lg-6 col-md-12">
      <div class="dashboard-list-box margin-top-0">
        <h4 class="gray">Change Password</h4>
        <div class="dashboard-list-box-static">
          <select name="roles[]" data-placeholder="Select Multiple Items" class="chosen-select" multiple>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
      <button class="button margin-top-15">Save Changes</button>


    <!-- Copyrights -->
    @include('layouts.inc.copyright')

  </div>

</form>
</div>
<!-- Content / End -->


</div>
<!-- Dashboard / End -->


</div>
<!-- Wrapper / End -->


@endsection
