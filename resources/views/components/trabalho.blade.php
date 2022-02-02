@props(['trabalho'])

<div class="card mb-3">
    <a href="{{ route('trabalhos.show', $trabalho->id) }}">
        <img src="{{ asset('storage/' . $trabalho->midias->first()->url_midia) }}" class="card-work-img card-img-top" alt="{{ $trabalho->midias->first()->descricao }}">
    </a>
    <div class="card-body">
        <h5 class="card-title"><a href="{{ route('trabalhos.show', $trabalho->id) }}">{{$trabalho->titulo}}</a></h5>
        <p class="fst-italic">Publicado em {{$trabalho->created_at->day}} de {{ $trabalho->created_at->locale('pt')->monthName }} de {{ $trabalho->created_at->year }}</p>
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


    