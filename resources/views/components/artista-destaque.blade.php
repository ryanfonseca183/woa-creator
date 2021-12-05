@props(['artista'])

<div class="text-center">
    <div class="card card-body border-yellow card-artist">
        <p class="mb-0">{{  $artista->descricao }}</p>
        <span class="quotes"><i class="fas fa-quote-right"></i></span>
    </div>
    <img src="{{ asset($artista->avatar ? 'storage/' . $artista->avatar : 'img/user.jpg') }}" class="img-thumbnail rounded-circle mb-3" style="height: 100px; width: 100px">
    <h4 class="mb-0">{{$artista->nome_artistico}}</h4>
    <small class="text-muted">{{$artista->cidade}}, {{ $artista->estado }}</small>
</div>

