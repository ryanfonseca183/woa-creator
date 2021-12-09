@props(['artista'])

<div class="text-center">
    <div class="card card-body border-yellow card-artist">
        <p class="mb-0">{{  $artista->descricao }}</p>
        <span class="quotes"><i class="fas fa-quote-right"></i></span>
    </div>
    <x-avatar :user="$artista" style="height: 100px; width: 100px"/>
    <h4 class="mb-0">{{$artista->nome_artistico}}</h4>
    <small class="text-muted">{{$artista->cidade}}, {{ $artista->estado }}</small>
</div>

