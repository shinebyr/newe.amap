@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <p class="notification error closeable">{{ $error }}</p>
  @endforeach
@endif
