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
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#userGeneralInfoModal">
                        <i class="fas fa-edit me-2"></i>Editar
                    </button>
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
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#userContactInfoModal">
                        <i class="fas fa-edit me-2"></i>Editar
                    </button>
                </div>
            </div>
            <livewire:user.show-user-contact-info />
        </div>

        {{-- SEGURANÇA --}}
        <div class="card card-body mb-5">
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

        {{-- FORMAÇÃO ACADÊMICA --}}
        <div class="card mb-5">
            <div class="card-body">
                <div class="row gx-3 align-items-center">
                    <div class="col-auto">
                        <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                            <i class="fs-5 fas fa-graduation-cap"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="h5 mb-0">Formação acadêmica</h3>
                        <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link" type="button" data-bs-toggle="modal" data-bs-target="#createCourse">
                            Criar formação
                        </button>
                    </div>
                </div>
            </div>
            <livewire:user.courses.index />
        </div>
    </main>
      
    {{-- CADASTRAR FORMAÇÃO ACADÊMICA --}}
    <div class="modal fade" id="createCourse" tabindex="-1" aria-labelledby="createCourseLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createCourseLabel">Cadastrar formação acadêmica</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:user.courses.create />
            </div>
          </div>
        </div>
    </div>

    {{-- EDITAR FORMAÇÃO ACADÊMICA --}}
    <div class="modal fade" id="editCourse" tabindex="-1" aria-labelledby="editCourseLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editCourseLabel">Editar formação acadêmica</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:user.courses.edit />
            </div>
          </div>
        </div>
    </div>

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
            const userGeneralInfoModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('userGeneralInfoModal')),
                  userContactInfoModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('userContactInfoModal')),
                  createCourseModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('createCourse'));
                  editCourseModalEl = document.getElementById('editCourse'),
                  editCourseModal = bootstrap.Modal.getOrCreateInstance(editCourseModalEl),

            editCourseModalEl.addEventListener('show.bs.modal', function(e){
                Livewire.emit('updateCourseModalOpened', e.relatedTarget.getAttribute('data-course-id'));
            });
            Livewire.on('userGeneralInfoUpdated', function(){
                userGeneralInfoModal.hide();
            })
            Livewire.on('userContactInfoUpdated', function(){
                userGeneralInfoModal.hide();
            })
            Livewire.on('courseUpdated', function(){
                editCourseModal.hide();
                toastr.success('Formação atualizada com sucesso!');
            })
            Livewire.on('courseSaved', function(){
                createCourseModal.hide();
                toastr.success('Formação criada com sucesso!');
            })
            Livewire.on('courseDeleted', function(){
                toastr.success('Formação deletada com sucesso!');
            })
        </script>
    @endpush
@endsection
