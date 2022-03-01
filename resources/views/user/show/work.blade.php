@extends('layouts.user')

@section('title', 'Inicio')

@section('content')
    <main>
        <div class="row">
            @forelse($usuario->trabalhos as $trabalho) 
                <div class="col-lg-4">
                    <x-trabalho :trabalho="$trabalho" />
                </div>
            @empty 
                <div class="col">
                    <x-not-found description="Este artista ainda não publicou nenhum trabalho" />
                </div>
            @endforelse
        </div>
    </main>
@endsection
