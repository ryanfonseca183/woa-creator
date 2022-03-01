@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <x-page-title title="{{ $ocupacao->nome }}" >
            <x-back route="{{ route('portfolios.edit', $ocupacao->portfolio_id) }}" />
            <a href="{{ route('portfolios.ocupacoes.trabalhos.create', ['portfolio' => $ocupacao->portfolio_id, 'ocupacao' => $ocupacao->id]) }}" class="btn btn-primary ms-3">Novo trabalho</a>
        </x-page-title>
       
        <livewire:portfolio.ocupation.work.index :ocupation="$ocupacao"/>
    </main>
@endsection
