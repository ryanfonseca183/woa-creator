@props(['object'])

<a href="#" class="card mb-3">
    <img src="{{ asset('storage/' . $object->midias->first()->url_midia) }}" class="card-work-img card-img-top" alt="{{ $object->midias()->first()->descricao }}">
    <div class="card-body">
      <h5 class="card-title">{{$object->titulo}}</h5>
      <p class="card-text">{{$object->descricao}}</p>
      <p class="card-text">
        <small class="text-muted me-3">
            <i class="fas fa-thumbs-up me-1"></i>{{ $object->curtidas }}
        </small>
        <small class="text-muted">
            <i class="fas fa-eye me-1"></i>{{ $object->visualizacoes }}
        </small>
    </p>
    </div>
</a>