@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <h2 class="h4">Portfólios</h2>
        <hr>
        <div class="text-center bg-light rounded p-5">
            <div class="icon-wrapper icon-md">
                <i class="fs-1 fas fa-search"></i>
            </div>
            <h3 class="h5">Nenhum portfólio cadastrado</h3>
            <p>Cillum cillum officia elit culpa cillum eu voluptate.</p>
            <button class="btn btn-primary">Criar portfólio</button>
        </div>
    </main>
@endsection
