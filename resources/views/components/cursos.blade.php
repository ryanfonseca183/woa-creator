@props(['title', 'icon', 'cursos'])

<div class="card-body">
    <h2 class="mb-0 h5"><i class="{{ $icon }} me-2 text-orange"></i> {{$title}}</h2>
</div>
<ul class="list-group list-group-flush">
    @foreach($cursos as $curso)
        <li class="list-group-item">
            <span>{{ $curso->instituicao }}</span> <br/>
            <span>{{ $curso->diploma}}, {{$curso->area }}</span> <br/>
            <span>
                {{ Carbon\Carbon::createFromFormat('Y-m-d', $curso->data_inicio)->format('Y') }} - 
                {{ Carbon\Carbon::createFromFormat('Y-m-d', $curso->data_inicio)->format('Y') }}
            </span>
        </li>
    @endforeach
</ul>