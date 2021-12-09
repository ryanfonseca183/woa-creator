@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <h1 class="h4 mb-3">
            <a href="{{ route('portfolios.index') }}" title="Voltar" class="text-decoration-none me-2">
                <i class="fas fa-long-arrow-alt-left" ></i>
            </a>
            Criar portfólio
        </h1>
        <form action="{{ route('portfolios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
             {{-- PORTFÓLIO --}}
            <div class="card card-body mb-5">
                <div class="row gx-3 align-items-center mb-4">
                    <div class="col-auto">
                        <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                            <i class="fs-5  fas fa-phone"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="h5 mb-0">Portfólio</h3>
                        <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                    </div>
                </div>
                <label>
                    <span class="mb-2 d-inline-block">Capa do portfólio</span>
                    <div class="img-wrapper w-100 mb-3" style="height: 250px;"></div>
                    <input type="file" name="capa" class="img-picker d-none">
                </label>
                @error('capa')
                    <span class="invalid-feedback d-block">
                        {{$message}}
                    </span>
                @enderror
                <x-controls.input label="Nome do portfólio" name="nome" />

                <x-controls.toggle type="switch" label="Visível" name="visivel" value="1" checked />

                <button class="btn btn-primary align-self-start mt-3">Salvar</button>
            </div>
        </form>
    </main>
@endsection
