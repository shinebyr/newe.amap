<!DOCTYPE html>
<html lang="en">
<head>
	<title>UB-LIST.com | Хэрэглэгч бүртгэл</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  	<link rel="icon" type="image/png" href="{{URL::asset('images/icons/favicon.ico')}}"/>
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/animate/animate.css')}}">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/css-hamburgers/hamburgers.min.css')}}">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/animsition/css/animsition.min.css')}}">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/select2/select2.min.css')}}">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('vendor/daterangepicker/daterangepicker.css')}}">
  <!--===============================================================================================-->
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/util.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')}}">
  <!--===============================================================================================-->
</head>
<body style="background-color: #999999;">

	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-04.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
						{{ csrf_field() }}

					<span class="login100-form-title p-b-59">
						Бүртгүүлэх хэсэг
					</span>

					<div class="wrap-input100 validate-input{{ $errors->has('name') ? ' has-error' : '' }}" data-validate="Name is required">
						<span class="label-input100">Нэр</span>
						<input class="input100" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Нэр..." autofocus>

						                                @if ($errors->has('name'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('name') }}</strong>
						                                    </span>
						                                @endif
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input{{ $errors->has('email') ? ' has-error' : '' }}" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Имэйл</span>
						<input class="input100" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Имэйл хаяг@abc.xyz" >
						@if ($errors->has('email'))
								<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
								</span>
						@endif
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input{{ $errors->has('gender') ? ' has-error' : '' }}">
							<label for="gender" class="col-md-4 control-label">Gender</label>

							<div class="col-md-6">
								<select class="form-control" name="gender" id="gender" >
										<option value="1">Male</option>
										<option value="2">Female</option>
								</select>
									@if ($errors->has('gender'))
											<span class="help-block">
													<strong>{{ $errors->first('gender') }}</strong>
											</span>
									@endif
							</div>
					</div>

					<div class="wrap-input100 validate-input{{ $errors->has('facebook') ? ' has-error' : '' }}" data-validate="Username is required">
						<span class="label-input100">Facebook ID</span>
						<input class="input100" type="text" name="facebook" id="facebook" placeholder="www.FACEBOOK.com/Таны_ID_Хаяг" value="{{ old('facebook') }}"  autofocus>
						@if ($errors->has('facebook'))
								<span class="help-block">
										<strong>{{ $errors->first('facebook') }}</strong>
								</span>
						@endif
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input{{ $errors->has('password') ? ' has-error' : '' }}" data-validate = "Password is required">
						<span class="label-input100">Нууц үг</span>
						<input class="input100" type="password" name="password" id="password" placeholder="*************" >

						                                @if ($errors->has('password'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('password') }}</strong>
						                                    </span>
						                                @endif
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Нууц үгээ давт</span>
						<input class="input100" type="password" id="password-confirm" name="password_confirmation" placeholder="*************" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Бүртгүүлэх
							</button>
						</div>

						<a href="/login" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Нэвтрэх
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

  <!--===============================================================================================-->
  	<!-- <script src="vendor/jquery/jquery-3.2.1.min.js"></script> -->
    {{Html::script('vendor/jquery/jquery-3.2.1.min.js')}}
  <!--===============================================================================================-->
  	<!-- <script src="vendor/animsition/js/animsition.min.js"></script> -->
    {{Html::script('vendor/animsition/js/animsition.min.js')}}
  <!--===============================================================================================-->
  	<!-- <script src="vendor/bootstrap/js/popper.js"></script> -->
      {{Html::script('vendor/bootstrap/js/popper.js')}}
  	<!-- <script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
      {{Html::script('vendor/bootstrap/js/bootstrap.min.js')}}
  <!--===============================================================================================-->
  	<!-- <script src="vendor/select2/select2.min.js"></script> -->
      {{Html::script('vendor/select2/select2.min.js')}}
  <!--===============================================================================================-->
  	<!-- <script src="vendor/daterangepicker/moment.min.js"></script> -->
      {{Html::script('vendor/daterangepicker/moment.min.js')}}
  	<!-- <script src="vendor/daterangepicker/daterangepicker.js"></script> -->
      {{Html::script('vendor/daterangepicker/daterangepicker.js')}}
  <!--===============================================================================================-->
  	<!-- <script src="vendor/countdowntime/countdowntime.js"></script> -->
      {{Html::script('vendor/countdowntime/countdowntime.js')}}
  <!--===============================================================================================-->
  	<!-- <script src="js/main.js"></script> -->
      {{Html::script('js/main.js')}}

</body>
</html>
