<div class="mb-5">
    @if($total > 0)
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
        <div class="row gy-5 align-items-center">
            <div class="col-xl">
                <div id="{{Str::slug($this->trabalho->titulo)}}_midias" class="carousel slide border p-3" data-bs-ride="carousel" data-bs-touch="false">
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
                <p>{{$this->trabalho->descricao}}</p>
                <i class="text-muted">
                    {{ $this->trabalho->created_at->day }} de 
                    {{ $this->trabalho->created_at->locale('pt')->monthName }} de 
                    {{ $this->trabalho->created_at->year }}
                </i>
                @if(Auth::check() && $this->trabalho->user_id == Auth::id())
                    <div class="mt-3">
                        <a href="{{ route('trabalhos.edit', $this->trabalho->id) }}" class="btn btn-icon me-3">
                            <i class="fas fa-edit me-1"></i> Editar
                        </a>
                        <form action="{{ route('trabalhos.destroy', $this->trabalho->id) }}" method="post" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-icon">
                                <i class="far fa-trash-alt me-1"></i> Deletar
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="text-center bg-light rounded p-5">
            <div class="icon-wrapper icon-md">
                <i class="fs-1 fas fa-search"></i>
            </div>
            <h3 class="h5">Nenhum trabalho cadastrado</h3>
            <p>Cillum cillum officia elit culpa cillum eu voluptate.</p>
        </div>
    @endif
</div>
