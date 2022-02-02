@props(['portfolio'])

<a href="{{ route('user.portfolios.show', [$portfolio->user_id, $portfolio->id]) }}">
    <div class="card card-portfolio">
        <img src="{{ asset('storage/' . $portfolio->capa) }}" class="card-img-top card-img-overflow">
        <div class="card-body">
            <h6 class="card-subtitle mb-1 text-muted">{{$portfolio->user->nome_artistico}}</h6>
            <h5 class="card-title card-title-overflow">{{$portfolio->nome}}</h5>
        </div>
    </div>
</a>
