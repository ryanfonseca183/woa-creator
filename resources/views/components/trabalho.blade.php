@props(['trabalho'])

<div class="card mb-3">
    <a href="#">
        <img src="{{ asset('storage/' . $trabalho->midias->first()->url_midia) }}" class="card-work-img card-img-top" alt="{{ $trabalho->midias()->first()->descricao }}">
    </a>
    <div class="card-body">
        <h5 class="card-title"><a href="#">{{$trabalho->titulo}}</a></h5>
        <p class="card-text">{{$trabalho->descricao}}</p>
        <p class="card-text">
          <small class="text-muted me-3">
              <i class="fas fa-thumbs-up me-1"></i>{{ $trabalho->curtidas }}
          </small>
          <small class="text-muted">
              <i class="fas fa-eye me-1"></i>{{ $trabalho->visualizacoes }}
          </small>
      </p>
    </div>
</div>


    