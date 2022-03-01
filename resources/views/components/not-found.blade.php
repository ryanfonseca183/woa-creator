@props(['title' => 'Ooops...', 'subtitle' => 'Nada para ver aqui', 'description'])

<div class="d-flex flex-column justify-content-center align-items-center spad px-4 bg-light">
    <div class="icon-wrapper icon-md">
        <i class="fs-1 fas fa-search"></i>
    </div>
    <h1 class="h2 mb-0">{{$title}}</h1>
    <h2 class="h5 text-muted mb-3">{{$subtitle}}</h2>
    <p>{{$description}}</p>
</div>