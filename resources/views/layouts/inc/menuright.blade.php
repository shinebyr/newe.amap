<div class="right-side">
  <div class="header-widget">
      @if (Auth::guest())
    <a href="#sign-in-dialog" class="sign-in popup-with-zoom-anim"><i class="sl sl-icon-login"></i> Нэвтрэх</a>
    @else
		<a href="{{ route('profile', ['slug' => Auth::user()->slug ]) }}" class="button medium border">{{ Auth::user()->name }} <i class="sl sl-icon-user"></i> </a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button medium border">Logout <i class="sl sl-icon-logout"></i></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    </form>
   @endif
    <a href="{{ route('useraddlist.index')}}" class="button border with-icon">Нэмэх <i class="sl sl-icon-plus"></i></a>

  </div>
</div>
<!-- Right Side Content / End -->

<!-- Sign In Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

  <div class="small-dialog-header">
    <h3>Нэвтрэх хэсэг</h3>
  </div>

  <!--Tabs -->
  <div class="sign-in-form style-1">

    <ul class="tabs-nav">
      <li class=""><a href="#tab1">Нэвтрэх</a></li>
      <li><a href="#tab2">Бүртгүүлэх</a></li>
    </ul>

    <div class="tabs-container alt">


      <!-- Login -->

      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} tab-content" id="tab1" style="display: none;">
        <form method="POST" class="login" action="{{ route('login') }}" role="form">

          <p class="form-group{{ $errors->has('email') ? ' has-error' : '' }} input-icon-left m-b-10">
            <label for="username">Имэйл хаяг:
              <i class="im im-icon-Male"></i>
              <input id="email" type="email" name="email" class="form-control value="{{ old('email') }}" form-control-secondary" required autofocus placeholder="И-Мэйл хаяг">
                {{ csrf_field() }}
              @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </p>
            </label>


          <p class="form-group{{ $errors->has('password') ? ' has-error' : '' }} input-icon-left m-b-15">
            <label for="password">Нууц үг:
              <i class="im im-icon-Lock-2"></i>
              <input id="password" type="password" class="form-control form-control-secondary" name="password" placeholder="Нууц Үг">
                                             @if ($errors->has('password'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                              @endif
            </label>
            <!-- <span class="lost_password">
              <a href="#" >Нууц үгээ мартсан уу?</a>
            </span> -->
            <div class="divider">
            <span>Бүртгэл байхгүй бол бүртгүүлж нэвтэрнэ үү!</span>
            </div>
            <a class="btn btn-secondary btn-block" href="{{ route('register') }}" role="button">Бүртгүүлэх</a>
          </p>

          <div class="form-row">
            <input type="submit" class="button border margin-top-5" name="login" value="Login" />
            <div class="checkboxes margin-top-10">
              <input id="remember-me" type="checkbox" name="check">
              <label for="remember-me">Намайг сана</label>
            </div>
          </div>

        </form>
      </div>

      <!-- Register -->
      <div class="tab-content" id="tab2" style="display: none;">
        <form method="post" role="form" class="register" action="{{ route('register') }}">
{{ csrf_field() }}
        <p class="form-group{{ $errors->has('name') ? ' has-error' : '' }} input-icon-left m-b-10">
          <label for="name">Нэвтрэх нэр:
            <i class="im im-icon-Male"></i>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control form-control-secondary" placeholder="Нэр" required autofocus>
                                          @if ($errors->has('name'))
                                            <span class="help-block">
                                               <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                          @endif
          </label>
        </p>

        <p class="form-group{{ $errors->has('email') ? ' has-error' : '' }} input-icon-left m-b-10">
          <label for="email2">Имэйл хаяг:
            <i class="im im-icon-Mail"></i>
            <input id="email" type="email" class="form-control form-control-secondary" name="email" value="{{ old('email') }}" placeholder="И-Мэйл хаяг">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
          </label>
        </p>

      <p class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
    <label for="gender">Хүйс:
        <select data-placeholder="Сонголт хийх" name="gender" id="gender" class="chosen-select">
          <option label="blank"></option>
          <option value="1">Эрэгтэй</option>
          <option value="2">Эмэгтэй</option>
        </select>
        @if ($errors->has('gender'))
            <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
        @endif
      </p>

      <p class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }} input-icon-left m-b-10">
        <label for="facebook">Facebook ID:
          <i class="im im-icon-Male"></i>
          <input type="text" id="facebook" name="facebook" value="{{ old('facebook') }}" class="form-control form-control-secondary" placeholder="http://facebook.com/Таны_хаяг" required autofocus>
                                        @if ($errors->has('facebook'))
                                          <span class="help-block">
                                             <strong>{{ $errors->first('facebook') }}</strong>
                                          </span>
                                        @endif
        </label>
      </p>

        <p class="form-group{{ $errors->has('password') ? ' has-error' : '' }} input-icon-left m-b-10">
          <label for="password1">нууц үг:
            <i class="im im-icon-Lock-2"></i>
            <input id="password" name="password" type="password" class="form-control form-control-secondary" required placeholder="Нууц үг">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
          </label>
        </p>

        <p class="form-group input-icon-left m-b-10">
          <label for="password2">Нууц үгээ дахин давтна уу:
            <i class="im im-icon-Lock-2"></i>
          <input id="password-confirm" type="password" class="form-control form-control-secondary" name="password_confirmation" placeholder="Нууц үг давтах" required>
          </label>
        </p>

        <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />

        </form>
      </div>

    </div>
  </div>
</div>
<!-- Sign In Popup / End -->
