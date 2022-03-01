@props(['trabalho'])

<div class="card mb-3 h-100">
    <a href="{{ route('trabalhos.show', $trabalho->id) }}">
        <img src="{{ $trabalho->midias->first() ? asset('storage/' . $trabalho->midias->first()->url_midia) : asset('img/picture-not-found.gif') }}" class="card-work-img card-img-top border-bottom">
    </a>
    <div class="card-body d-flex flex-column justify-content-between">
        <h5 class="card-title"><a href="{{ route('trabalhos.show', $trabalho->id) }}">{{$trabalho->titulo}}</a></h5>
        <div>
            <small class="fst-italic mb-0">
                Publicado em {{$trabalho->created_at->day}} de 
                {{ $trabalho->created_at->locale('pt')->monthName }} de 
                {{ $trabalho->created_at->year }}
            </small>
            <p class="card-text">
              <small class="text-muted me-3">
                  <i class="fas fa-thumbs-up me-1"></i>{{ $trabalho->total_curtidas }}
              </small>
              <small class="text-muted">
                  <i class="fas fa-eye me-1"></i>{{ $trabalho->total_visualizacoes }}
              </small>
            </p>
        </div>
    </div>
</div>


    