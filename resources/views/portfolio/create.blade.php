@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <h1 class="h4 mb-3">
            <a href="#" title="Voltar" class="text-decoration-none me-2">
                <i class="fas fa-long-arrow-alt-left" ></i>
            </a>
            Criar portfólio
        </h1>
        <form action="{{ route('portfolio.store') }}" method="POST">
            @csrf
            <div class="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Portfólio
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                        <div class="accordion-body">
                            <x-controls.input label="Nome do portfólio" name="nome" />
    
                            <x-controls.toggle type="switch" label="Visível" name="visivel" checked value="1" />
                        </div>
                    </div>
                  </div>
            </div>
            <div class="d-flex justify-content-end my-4">
                <button class="btn btn-lg btn-outline-secondary me-3">Voltar</button>
                <button class="btn btn-lg btn-primary">Finalizar</button>
            </div>
        </form>
         
    </main>
@endsection
