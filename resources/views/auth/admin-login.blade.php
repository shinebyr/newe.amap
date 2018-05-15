<!DOCTYPE html>
<html lang="en">
<head>
	<title>AMAP | Admin</title>
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
			<div class="login100-more" style="background-image: url('{{URL::asset('images/bg-03.jpg')}}');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
					    {{ csrf_field() }}
					<span class="login100-form-title p-b-59">
						Администратор
					</span>

					<div class="wrap-input100 validate-input{{ $errors->has('password') ? ' has-error' : '' }}" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Имэйл хаяг</span>
						<input class="input100" type="text" name="email" id="email" placeholder="Имэйл хаяг...">
						@if ($errors->has('email'))
								<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
								</span>
						@endif
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input{{ $errors->has('password') ? ' has-error' : '' }}" data-validate = "Password is required">
						<span class="label-input100">Нууц үг</span>
						<input class="input100" type="password" name="password" id="password" placeholder="*************">

						                                @if ($errors->has('password'))
						                                    <span class="help-block">
						                                        <strong>{{ $errors->first('password') }}</strong>
						                                    </span>
						                                @endif
						<span class="focus-input100"></span>
					</div>
					<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
									<div class="checkbox">
											<label>
													<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
											</label>
									</div>
							</div>
					</div>

        </a>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" class="login100-form-btn">
								Нэвтрэх
							</button>
						</div>

					</div>
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
