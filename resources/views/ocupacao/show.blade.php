@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h4 me-3 mb-0"> {{ $ocupacao->nome }} </h1>
            <div>
                <x-back route="{{ route('portfolios.edit', $ocupacao->portfolio_id) }}" />
                <a href="{{ route('portfolios.ocupacoes.trabalhos.create', ['portfolio' => $ocupacao->portfolio_id, 'ocupacao' => $ocupacao->id]) }}" class="btn btn-primary ms-2">Novo</a>
            </div>
        </div>
        <hr>
        @forelse($ocupacao->trabalhos()->with('midias')->get() as $trabalho)
            <div class="border rounded  overflow-hidden mb-4">
                <div class="row">
                    <div class="col-auto">
                        <img src="{{ asset('storage/' . $trabalho->midias->first()->url_midia) }}" alt="" class="img-fluid">
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h3 class="h6">{{$trabalho->titulo}}</h3>
                            <hr>
                            <p>{{ $trabalho->descricao }}</p>
                            <small>
                                Criado em: {{$trabalho->created_at->format('d/m/Y')}} <br/>
                                <a href="{{ route('trabalhos.edit', $trabalho->id) }}" class="me-2">Editar</a>
                                <form action="{{ route('trabalhos.destroy', $trabalho->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Excluir</button>
                                </form>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center bg-light rounded p-5">
                <div class="icon-wrapper icon-md">
                    <i class="fs-1 fas fa-search"></i>
                </div>
                <h3 class="h5">Nenhum trabalho cadastrado</h3>
                <p>Cillum cillum officia elit culpa cillum eu voluptate.</p>
            </div>
        @endforelse
    </main>
@endsection
