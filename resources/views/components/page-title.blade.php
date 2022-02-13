@props(['title'])

<nav {{ $attributes->merge(['class' => 'navbar navbar-light bg-light mb-4']) }}>
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 text-purple">{{$title}}</span>
    <div>
      {{$slot }}
    </div>
  </div>
</nav>
