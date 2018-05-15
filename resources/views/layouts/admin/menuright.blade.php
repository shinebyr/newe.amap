<div class="right-side">
  <div class="header-widget">

    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button medium border">Logout <i class="sl sl-icon-logout"></i></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    </form>


  </div>
</div>
