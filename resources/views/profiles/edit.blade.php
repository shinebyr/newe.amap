@extends('layouts.app')

@section('content')
<div class="container">
		<div class="row">
			<div class="col-lg-12">
					<div class="panel panel-default">
						@if (session('success'))
						<div class="alert alert-success">
						      <div class="notification success closeable">
						        <p><span> <b>Таны мэдээлэл амжилттай шинчлэгдлээ </b> </span> Мэдээллээ үнэн зөвөөр оруулсанд баярлалаа</p>
						        <a class="close" href="#"></a>
						      </div>
						</div>
						@endif
								<div class="notification notice large margin-bottom-55">
									<h4>Та өөрийн мэдээллээ үнэн зөв орууна уу! 🙂</h4>
									<p>Баярлалаа</p>
								</div>
								<div class="separated-form">
									<!-- Section -->
									<div class="add-listing-section">
										<div class="add-listing-headline">
											<h3><i class="sl sl-icon-doc"></i> Үндсэн мэдээлэл</h3>
										</div>
										<form class="" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
									    {{ csrf_field() }}
											<div class="form-group">
												<h5>Төрөл</h5>
												<select class="chosen-select-no-single" name="">
												<option>Улаанбаатар</option>
												<option>Орон нутаг</option>
												<option>Foreign citizen</option>
												</select>
											</div>
											<div class="form-group">
												<label for="about">Өөрийн тухай</label>
												<textarea name="about" rows="10" cols="30" id="about" class="form-control">{{ $info->about }}</textarea>
											</div>

											<div class="row with-forms">
												<div class="col-md-12">
													<h5>Зураг</h5>
													<input name='avatar' class="form-control" type="file" accept="image/" />
												</div>
											</div>

									</div>
									<!-- Section / End -->
								</br>
											<p class="text-center">
												<button type="submit" class="button">
													Өөрчлөлтийг хадгалах
												</button>
											</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
