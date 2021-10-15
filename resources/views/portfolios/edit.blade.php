@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <h1 class="h4 mb-3">
            <a href="#" title="Voltar" class="text-decoration-none me-2">
                <i class="fas fa-long-arrow-alt-left" ></i>
            </a>
            Editar portfólio
        </h1>

        {{-- PORTFÓLIO --}}
        <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                <div class="row">
                    <div class="col-auto">
                        <label>
                            <span class="mb-2 d-inline-block">Capa do portfólio</span>
                            <div class="img-wrapper" style="height: 250px; width: 250px;">
                                <img src="{{ asset('storage/' . $portfolio->capa) }}" class="img-preview" alt="">
                            </div>
                            <input type="file" name="capa" class="img-picker d-none">
                        </label>
                        @error('capa')
                            <span class="invalid-feedback d-block">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <x-controls.input label="Nome do portfólio" name="nome" value="{{ $portfolio->nome }}" />

                        <x-controls.toggle type="switch" label="Visível" name="visivel" value="1" :checked="$portfolio->visivel" />
        
                        <button class="btn btn-primary align-self-end mt-3">Salvar</button>
                    </div>
                </div>
            </div>
        </form>

        {{-- FORMAÇÃO ACADÊMICA --}}
        <div class="card mb-5">
            <div class="card-body">
                <div class="row gx-3 align-items-center">
                    <div class="col-auto">
                        <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                            <i class="fs-5  fas fa-phone"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="h5 mb-0">Cursos e educação</h3>
                        <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#createCourse">
                            <i class="fas fa-plus me-2"></i>Novo
                        </button>
                    </div>
                </div>
               
            </div>
            <livewire:portfolio.courses.index :portfolio="$portfolio" />
        </div>

        {{-- OCUPAÇÃO --}}
        <div class="card mb-5">
            <div class="card-body">
                <div class="row gx-3 align-items-center">
                    <div class="col-auto">
                        <div class="icon-wrapper icon-sm d-inline-flex mb-0">
                            <i class="fs-5  fas fa-phone"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="h5 mb-0">Ocupações</h3>
                        <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#createOcupation">
                            <i class="fas fa-plus me-2"></i>Novo
                        </button>
                    </div>
                </div>
            </div> 
            <livewire:portfolio.ocupation.index :portfolio="$portfolio" />
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
                <livewire:portfolio.courses.create :portfolio="$portfolio"/>
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
                <livewire:portfolio.courses.edit :portfolio="$portfolio"/>
            </div>
          </div>
        </div>
    </div>

    {{-- CADASTRAR OCUPAÇÃO --}}
    <div class="modal fade" id="createOcupation" tabindex="-1" aria-labelledby="createOcupationLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createOcupationLabel">Cadastrar ocupação</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:portfolio.ocupation.create :portfolio="$portfolio"/>
            </div>
          </div>
        </div>
    </div>

    {{-- EDITAR OCUPAÇÃO --}}
    <div class="modal fade" id="editOcupation" tabindex="-1" aria-labelledby="editOcupationLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editOcupationLabel">Editar ocupação</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:portfolio.ocupation.edit :portfolio="$portfolio"/>
            </div>
          </div>
        </div>
    </div>
@endsection

@push('assets-body')
    <script>
        const editCourseModalEl = document.getElementById('editCourse'),
              editOcupationModalEl = document.getElementById('editOcupation'),
              editCourseModal = bootstrap.Modal.getOrCreateInstance(editCourseModalEl),
              createCourseModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('createCourse')),
              editOcupationModal = bootstrap.Modal.getOrCreateInstance(editOcupationModalEl),
              createOcupationModal = bootstrap.Modal.getOrCreateInstance(document.getElementById('createOcupation'));
        editCourseModalEl.addEventListener('show.bs.modal', function(e){
            Livewire.emit('updateCourseModalOpened', e.relatedTarget.getAttribute('data-course-id'));
        });
        editOcupationModalEl.addEventListener('show.bs.modal', function(e){
            Livewire.emit('updateOcupationModalOpened', e.relatedTarget.getAttribute('data-ocupation-id'));
        });
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
        Livewire.on('ocupationUpdated', function(){
            editOcupationModal.hide();
            toastr.success('Ocupação atualizada com sucesso!');
        })
        Livewire.on('ocupationSaved', function(){
            createOcupationModal.hide();
            toastr.success('Ocupação criada com sucesso!');
        })
        Livewire.on('ocupationDeleted', function(){
            toastr.success('Ocupação deletada com sucesso!');
        })
    </script>
@endpush
