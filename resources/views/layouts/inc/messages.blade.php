@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="notification error closeable">
      <p><span>{{ $error }}></span> Уг талбаруудыг бөглөнө үү!!</p>
  <a class="close" href="#"></a>
    </div>

  @endforeach
@endif

@if (session('success'))
<div class="alert alert-success">
      <div class="notification success closeable">
        <p><span>Таны санал амжилттай илгээгдлээ.</span>Танд баярлалаа </p>
        <a class="close" href="#"></a>
      </div>
</div>
@endif
