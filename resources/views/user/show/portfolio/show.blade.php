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
        @foreach($portfolio->ocupacoes as $key => $ocupacao)
            <h2>{{$ocupacao->nome}}</h2>
            <hr>
            <livewire:portfolio.ocupation.work.index wire:key="ocupacao.{{ $key }}" :ocupation="$ocupacao"/>
        @endforeach
        {{-- FORMAÇÃO ACADÊMICA --}}
       <div class="card mb-5">
            <div class="card-body">
                    <h2 class="mb-0 h5">Formação acadêmica</h2>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span>Instituto Federal de Educação, Ciência e Tecnologia de Minas Gerais - IFMG Campus Formiga</span> <br/>
                    <span>Graduação, Ciencias da computação</span> <br/>
                    <span>2021 - 2024</span>
                </li>
                <li class="list-group-item">
                    <span>Instituto Federal de Educação, Ciência e Tecnologia de Minas Gerais - IFMG Campus Formiga</span> <br/>
                    <span>Graduação, Ciencias da computação</span> <br/>
                    <span>2021 - 2024</span>
                </li>
             </ul>
             <div class="card-body">
                <h2 class="mb-0 h5">Cursos complementares</h2>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <span>Instituto Federal de Educação, Ciência e Tecnologia de Minas Gerais - IFMG Campus Formiga</span> <br/>
                    <span>Graduação, Ciencias da computação</span> <br/>
                    <span>2021 - 2024</span>
                </li>
                <li class="list-group-item">
                    <span>Instituto Federal de Educação, Ciência e Tecnologia de Minas Gerais - IFMG Campus Formiga</span> <br/>
                    <span>Graduação, Ciencias da computação</span> <br/>
                    <span>2021 - 2024</span>
                </li>
            </ul>
       </div>
    </main>
@endsection
