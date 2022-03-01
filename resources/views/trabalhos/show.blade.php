@extends('layouts.app')

@section('title', 'Conheça o melhor do WoaCreator')

@section('body')
<div class="container spad pt-3">
    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col-auto">
                    <a href="#">
                        <x-avatar :user="$trabalho->user" />
                    </a>
                </div>
                <div class="col">
                    <h4 class="mb-0"><a href="#">{{ $trabalho->user->nome}}</a></h4>
                    <small class="text-muted mb-2 d-block">@if(!$trabalho->user->cidade || !$trabalho->user->estado) Localização desconhecida @else {{ $trabalho->user->cidade }}, {{ $trabalho->user->estado }} @endif</small>
                </div>
            </div>
        </div>
        <div class="card-body p-5 text-center">
            <h1>{{ $trabalho->titulo }}</h1>
            <p class="card-text">
                <small class="text-muted me-2">
                    <i class="fas fa-thumbs-up me-1"></i>{{ $trabalho->total_curtidas }} 
                </small>
                <small class="text-muted">
                    <i class="fas fa-eye me-1"></i>{{ $trabalho->total_visualizacoes }} 
                </small>
            </p>

            <pre class="work-description">{{ $trabalho->descricao }}</pre>
        </div>
        <div class="d-flex flex-wrap">
            @foreach($trabalho->midias as $midia) 
                <img src="{{ asset('storage/' . $midia->url_midia) }}" class="img-fluid flex-fill">
            @endforeach
        </div>
        <div class="card-footer text-center bg-light p-5">
            <livewire:like-btn :trabalho="$trabalho" />
            <h1>{{ $trabalho->titulo }}</h1>
            <i>
                Publicado em 
                {{ $trabalho->created_at->day }} de 
                {{ $trabalho->created_at->locale('pt')->monthName }} de 
                {{ $trabalho->created_at->year }}
            </i> <br/><br/>
            <a href="{{ route('user.profile', $trabalho->user_id) }}">Ver outros trabalhos deste artista</a>
        </div>
    </div>
</div>
@endsection
