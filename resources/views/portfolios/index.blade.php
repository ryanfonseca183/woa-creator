@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <x-page-title title="Portfólios" >
            <a href="{{ route('portfolios.create') }}"><i class="fas fa-plus me-2"></i>Novo</a>
        </x-page-title>
        
        <div class="row mt-5">
            @forelse($portfolios as $portfolio)
                <div class="col-md-6 col-xl-4">
                    <x-portfolio :portfolio="$portfolio" />
                </div>
            @empty 
                <div class="col">
                    <div class="text-center bg-light rounded p-5">
                        <div class="icon-wrapper icon-md">
                            <i class="fs-1 fas fa-search"></i>
                        </div>
                        <h3 class="h5">Nenhum portfólio cadastrado</h3>
                        <p>Cillum cillum officia elit culpa cillum eu voluptate.</p>
                        <a href="{{ route('portfolios.create') }}" class="btn app-btn-primary">Criar portfólio</a>
                    </div>
                </div>
            @endforelse
        </div>
    </main>
@endsection
