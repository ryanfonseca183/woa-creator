@props(['object'])

<div class="row align-items-center">
    <div class="col-auto">
        <a href="#">
            <img src="{{ asset($object->avatar ? 'storage/'. $object->avatar : 'img/user.png') }} " class="img-thumbnail rounded-circle" style="height: 75px; width: 75px">
        </a>
    </div>
    <div class="col">
        <h4 class="mb-0"><a href="#">{{ $object->nome}}</a></h4>
        <small class="text-muted">{{ $object->cidade }}, {{ $object->estado }}</small>
        <p class="card-text">
            <small class="text-muted me-2">
                <i class="fas fa-thumbs-up me-1"></i>{{ $object->trabalhos_sum_curtidas ?? 0 }} 
            </small>
            <small class="text-muted">
                <i class="fas fa-eye me-1"></i>{{ $object->trabalhos_sum_visualizacoes ?? 0 }} 
            </small>
        </p>
    </div>
</div>

