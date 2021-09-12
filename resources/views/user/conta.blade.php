@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <h2 class="h4 mb-4">Minha conta</h2>
        {{-- SOBRE --}}
        <div class="card card-body mb-5">
            <div class="row gx-3 align-items-center mb-4">
                <div class="col-auto">
                    <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                        <i class="fs-5 far fa-user"></i>
                    </div>
                </div>
                <div class="col">
                    <h3 class="h5 mb-0">Sobre</h3>
                    <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#userGeneralInfoModal">Editar</button>
                </div>
            </div>
            <livewire:user.show-user-general-info />
        </div>

        {{-- CONTATO --}}
        <div class="card card-body mb-5">
            <div class="row gx-3 align-items-center mb-4">
                <div class="col-auto">
                    <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                        <i class="fs-5  fas fa-phone"></i>
                    </div>
                </div>
                <div class="col">
                    <h3 class="h5 mb-0">Contato</h3>
                    <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#userContactInfoModal">Editar</button>
                </div>
            </div>
            <livewire:user.show-user-contact-info />
        </div>

        {{-- SEGURANÇA --}}
        <div class="card card-body">
            <div class="row gx-3 align-items-center mb-4">
                <div class="col-auto">
                    <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                        <i class="fs-5 fas fa-lock"></i>
                    </div>
                </div>
                <div class="col">
                    <h3 class="h5 mb-0">Segurança</h3>
                    <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-warning">Editar</button>
                </div>
            </div>
            <ul class="list-group list-group-flush border-0">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-2">E-mail</div>
                        <div class="col">{{ auth()->user()->nome }}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-2">Senha</div>
                        <div class="col">{{ auth()->user()->nome_artistico }}</div>
                    </div>
                </li>
            </ul>
        </div>
    </main>
      
    {{-- ATUALIZAR DADOS GERAIS --}}
    <div class="modal fade" id="userGeneralInfoModal" tabindex="-1" aria-labelledby="userGeneralInfoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userGeneralInfoModal">Dados gerais</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <livewire:user.update-user-general-info />
                </div>
            </div>
        </div>
    </div>

    {{-- ATUALIZAR DADOS GERAIS --}}
    <div class="modal fade" id="userContactInfoModal" tabindex="-1" aria-labelledby="userContactInfoModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userContactInfoModal">Contato</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <livewire:user.update-user-contact-info />
                </div>
            </div>
        </div>
    </div>

    @push('assets-body')
        <script>
            let userGeneralInfoModal =bootstrap.Modal.getOrCreateInstance(document.getElementById('userGeneralInfoModal'));
            let userContactInfoModal =bootstrap.Modal.getOrCreateInstance(document.getElementById('userContactInfoModal'));

            Livewire.on('userGeneralInfoUpdated', function(){
                userGeneralInfoModal.hide();
            })
            Livewire.on('userContactInfoUpdated', function(){
                userGeneralInfoModal.hide();
            })
            Livewire.on('userGeneralInfoUpdated', function(){
                userGeneralInfoModal.hide();
            })
            toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')
        </script>
    @endpush
@endsection
