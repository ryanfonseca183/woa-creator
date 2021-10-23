@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <h2 class="h4">Portfólios</h2>
        <hr>
        <div class="row">
            @forelse($portfolios as $portfolio)
                <div class="col-4">
                    <a href="{{ route('portfolios.edit', $portfolio->id) }}">
                        <div class="set-bg rounded"  style="height:250px; background-image: url({{ asset('storage/' . $portfolio->capa) }})">
                        </div>
                        <div class="d-flex justify-content-between align-items-center text-muted py-3">
                            <span>{{$portfolio->nome}}</span>
                            <div>
                                <span class="me-2">
                                    <i class="fas fa-thumbs-up me-1"></i>{{$portfolio->visualizacoes}}
                                </span>
                                <span>
                                    <i class="fas fa-eye me-1"></i>{{$portfolio->curtidas}} 
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty 
                <div class="col">
                    <div class="text-center bg-light rounded p-5">
                        <div class="icon-wrapper icon-md">
                            <i class="fs-1 fas fa-search"></i>
                        </div>
                        <h3 class="h5">Nenhum portfólio cadastrado</h3>
                        <p>Cillum cillum officia elit culpa cillum eu voluptate.</p>
                        <a href="{{ route('portfolios.create') }}" class="btn btn-primary">Criar portfólio</a>
                    </div>
                </div>
            @endforelse
        </div>
    </main>
@endsection