@props(['artista'])

<div class="row align-items-center">
    <div class="col-auto">
        <a href="#">
            <img src="{{ asset($artista->avatar ? 'storage/'. $artista->avatar : 'img/user.png') }} " class="img-thumbnail rounded-circle" style="height: 75px; width: 75px">
        </a>
    </div>
    <div class="col">
        <h4 class="mb-0"><a href="#">{{ $artista->nome}}</a></h4>
        
        <small class="text-muted mb-2 d-block">@if(!$artista->cidade || !$artista->estado) Localização desconhecida @else {{ $artista->cidade }}, {{ $artista->estado }} @endif</small>
        <p class="card-text">
            <small class="text-muted me-2">
                <i class="fas fa-thumbs-up me-1"></i>{{ $artista->trabalhos_sum_curtidas ?? 0 }} 
            </small>
            <small class="text-muted">
                <i class="fas fa-eye me-1"></i>{{ $artista->trabalhos_sum_visualizacoes ?? 0 }} 
            </small>
        </p>
    </div>
</div>

