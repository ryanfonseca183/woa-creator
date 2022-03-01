@extends('layouts.user')

@section('title', 'Portfólios')

@section('content')
    <main>
        <div class="row">
            @forelse($usuario->portfolios as $portfolio) 
                <div class="col-lg-4">
                    <x-portfolio :portfolio="$portfolio" />
                </div>
            @empty 
                <div class="col">
                    <x-not-found description="Este artista ainda não criou nenhum portfólio" />
                </div>
            @endforelse
        </div>
    </main>
@endsection
