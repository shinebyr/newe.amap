<nav id="navigation" class="style-1">
  <ul id="responsive">

    <li><a class="current" href="/"><i class="im im-icon-Home"></i> Нүүр хуудас</a>
    </li>

    <li><a href="{{route('listings')}}"><i class="im im-icon-Bulleted-List"></i> Жагсаалт</a>
    </li>

    <li><a href="/blog"><i class="im im-icon-Blogger"></i> Блог</a></li>

    <li><a href="{{route('contact.create')}}"><i class="im im-icon-Mail"></i> Холбогдох</a></li>

  </ul>
</nav>
<div class="clearfix"></div>
</div>
@include('layouts.inc.menuright')
