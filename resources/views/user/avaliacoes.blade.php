@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <h2 class="h4 mb-4">Trabalhos curtidos</h2>
        <div class="row mb-4">
            @forelse([] as $trabalho)
                <div class="col-md-6 col-xl-4">
                    <x-trabalho :trabalho="$trabalho" />
                </div>
            @empty 
                <div class="col">
                    <div class="text-center bg-light rounded p-5">
                        <div class="icon-wrapper icon-md">
                            <i class="fs-1 fas fa-search"></i>
                        </div>
                        <h3 class="h5">Nenhum trabalho curtido</h3>
                        <p>Cillum cillum officia elit culpa cillum eu voluptate.</p>
                        <a href="{{ route('navegacao', ['search_type' => 'trabalho']) }}" class="btn app-btn-primary">Explorar</a>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
            {{$trabalhos->links()}}
        </div>
    </main>
@endsection
