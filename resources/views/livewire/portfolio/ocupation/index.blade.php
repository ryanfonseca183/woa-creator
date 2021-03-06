{{-- OCUPAÇÕES --}}
<ul class="list-group list-group-flush">
    @foreach($this->portfolio->ocupacoes as $key => $ocupacao)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="h6 mb-0">{{$ocupacao->nome}} @if(!$ocupacao->visivel) <span class="badge bg-danger ms-2">Invisível</span> @endif</h2>
                <span>
                    <a href="{{ route("portfolios.ocupacoes.show", ['portfolio' => $this->portfolio, 'ocupacao' => $ocupacao->id]) }}" class="btn-icon me-2">
                        <i class="fas fa-eye"></i>
                    </a>
                    <button class="btn-icon me-2" type="button" data-bs-toggle="modal" data-bs-target="#editOcupation" data-ocupation-id="{{ $ocupacao->id }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="btn-icon" wire:click="deleteOcupation({{$ocupacao->id}})">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </span>
            </div>
        </li>
    @endforeach
</ul>