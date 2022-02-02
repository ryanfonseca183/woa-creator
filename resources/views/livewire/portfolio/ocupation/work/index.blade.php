<div class="mb-4">
    <h2>{{$ocupation->nome}}</h2>
    <hr>
    @if($total > 1)
    <div class="d-flex justify-content-between mb-3">
        <button class="btn btn-icon" wire:click="prev">
            <i class="fas fa-chevron-left me-2"></i> Anterior
        </button>
        <button class="btn btn-icon" wire:click="next">
            Próximo <i class="fas fa-chevron-right ms-2"></i>
        </button>
    </div>
    @endif
    <div class="row align-items-center mb-5">
        <div class="col">
            <div id="{{Str::slug($this->trabalho->titulo)}}_midias" class="carousel slide border p-3" data-bs-ride="carousel"  data-bs-touch="false">
                <div class="carousel-indicators">
                    @foreach($this->trabalho->midias as $key => $midia)
                        <button type="button" data-bs-target="#{{Str::slug($this->trabalho->titulo)}}_midias" data-bs-slide-to="{{ $key }}" class="active" aria-current="true" aria-label="Slide {{ $key }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($this->trabalho->midias as $midia)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img src="{{ asset('storage/' . $midia->url_midia) }}" class="d-block w-100" height="350">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col">
            <h4 class="display-6">{{$this->trabalho->titulo}}</h4>
            <span>{{$this->trabalho->descricao}}</span>
        </div>
    </div>
</div>
