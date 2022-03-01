<form wire:submit.prevent="save" novalidate>
    <x-controls.input wire:model.defer="curso.instituicao" label="Instituição de ensino" name="curso.instituicao" required />

    <div class="row">
        <div class="col">
            <x-controls.input wire:model.defer="curso.diploma" label="Diploma" name="curso.diploma" />
        </div>
        <div class="col">
            <x-controls.input wire:model.defer="curso.area" label="Area de estudo" name="curso.area" required />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-controls.input wire:model.lazy="curso.data_inicio" type="date" label="Data de inicio" name="curso.data_inicio" required />
        </div>
        <div class="col">
            <x-controls.input wire:model.lazy="curso.data_termino" type="date" label="Data de término" name="curso.data_termino" required />
        </div>
    </div>

    <x-controls.textarea wire:model.defer="curso.descricao" label="Descrição" name="curso.descricao" required />

    <div class="d-flex justify-content-end mt-3">
        <button type="button" class="btn btn-link me-2" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-warning">Salvar</button>
    </div>
</form>