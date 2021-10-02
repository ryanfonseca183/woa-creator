<form wire:submit.prevent="save" novalidate>
    <x-controls.input wire:model.defer="curso.instituicao" label="Instituição de ensino" name="instituicao" required />

    <div class="row">
        <div class="col">
            <x-controls.input wire:model.defer="curso.diploma" label="Diploma" name="diploma" />
        </div>
        <div class="col">
            <x-controls.input wire:model.defer="curso.area" label="Area de estudo" name="area" required />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-controls.input wire:model.defer="curso.data_inicio" type="date" label="Data de inicio" name="data_inicio" required />
        </div>
        <div class="col">
            <x-controls.input wire:model.defer="curso.data_termino" type="date" label="Data de término" name="data_termino" required />
        </div>
    </div>

    <x-controls.textarea wire:model.defer="curso.descricao" label="Descrição" name="descricao" required />

    <x-controls.toggle wire:model.defer="padrao" type="checkbox" label="Vincular formação a conta" name="padrao" />

    <div class="d-flex justify-content-end mt-3">
        <button type="button" class="btn btn-link me-2" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-warning">Salvar</button>
    </div>
</form>