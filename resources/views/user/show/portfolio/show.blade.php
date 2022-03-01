@extends('layouts.user')

@section('title', $portfolio->nome)

@section('content')
    <main>
        <div class="card bg-dark text-white mb-5 shadow border-0">
            <img src="{{ asset('storage/' . $portfolio->capa) }}" class="card-img" style="height: 200px;">
            <div class="card-img-overlay d-flex justify-content-center align-items-center">
                <h2 class="display-6 fw-bold text-shadow-1">Web design and Art</h2>
            </div>
        </div>
        {{-- EXPERIENCIA PROFISSIONAL --}}
        @php $found = false; @endphp
        @foreach($portfolio->ocupacoes as $key => $ocupacao)
            @if($ocupacao->trabalhos->isNotEmpty())
                @php $found = true; @endphp
                <h2 class="page-title">{{$ocupacao->nome}}</h2>
                <livewire:portfolio.ocupation.work.index wire:key="ocupacao.{{ $key }}" :ocupation="$ocupacao"/>
            @endif
        @endforeach
        @if(!$found)
            <div class="mb-5">
                <x-not-found description="O artista não cadastrou nenhum trabalho para este portfólio" />
            </div>
        @endif
        
        {{-- FORMAÇÃO ACADÊMICA --}}
        @php 
            $formacoes = $portfolio->cursos->whereNotNull('user_id');
            $cursos = $portfolio->cursos->whereNull('user_id');
        @endphp
        @if($portfolio->cursos->isNotEmpty())
            <div class="card mb-5">
                @if($formacoes->isNotEmpty())
                    <x-cursos title="Formação acadêmica" icon="fas fa-graduation-cap" :cursos="$formacoes" />
                @endif
                @if($cursos->isNotEmpty())
                    <x-cursos title="Cursos complementares" icon="fas fa-certificate" :cursos="$cursos" />
                @endif
            </div>
        @endif
    </main>
@endsection
