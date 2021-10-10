@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <h2 class="h4">Portfólios</h2>
        <hr>
        <div class="row">
            @forelse($portfolios as $portfolio)
                <div class="col-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $portfolio->capa) }}" class="card-img-top" alt="...">
                        <div class="card-body bg-light">
                            <h5 class="card-title">{{$portfolio->nome}}</h5>
                            <p class="card-text">
                                {{$portfolio->visualizacoes}} visualizacoes <br/>
                                {{$portfolio->curtidas}} curtidas <br/>
                            </p>
                            <div class="d-flex">
                                <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-primary me-2">Ver</a>
                                <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-danger">Deletar</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
