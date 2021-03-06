@extends('layouts.profile')

@section('title', 'Inicio')

@section('content')
    <main>
        <x-page-title title="Editar portfólio">
            <x-back route="{{ route('portfolios.index') }}" />
        </x-page-title>
        

        {{-- PORTFÓLIO --}}
        <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-forms.portfolio.create :portfolio="$portfolio" />
        </form>

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
                        <h3 class="h5 mb-0">Cursos e educação</h3>
                        <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
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
                            <i class="fs-5 fas fa-pencil-ruler"></i>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="h5 mb-0">Ocupações</h3>
                        <p class="mb-0">Voluptate eiusmod ea nulla aute.</p>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link" type="button" data-bs-toggle="modal" data-bs-target="#createOcupation">
                           Criar ocupação
                        </button>
                    </div>
                </div>
            </div> 
            <livewire:portfolio.ocupation.index :portfolio="$portfolio" />
        </div>
    </main>

    {{-- CADASTRAR CURSO COMPLEMENTAR --}}
    <div class="modal fade" id="createCourse" tabindex="-1" aria-labelledby="createCourseLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="createCourseLabel">Cadastrar curso complementar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <livewire:portfolio.courses.create :portfolio="$portfolio"/>
            </div>
          </div>
        </div>
    </div>

    {{-- EDITAR CURSO COMPLEMENTAR --}}
    <div class="modal fade" id="editCourse" tabindex="-1" aria-labelledby="editCourseLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editCourseLabel">Editar curso complementar</h5>
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
            toastr.success('Curso atualizado com sucesso!');
        })
        Livewire.on('courseSaved', function(){
            createCourseModal.hide();
            toastr.success('Curso criado com sucesso!');
        })
        Livewire.on('courseDeleted', function(){
            toastr.success('Curso deletado com sucesso!');
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
