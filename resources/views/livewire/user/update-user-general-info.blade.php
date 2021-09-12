<form wire:submit.prevent="save">
    <x-controls.input wire:model.defer="nome" label="Nome completo" name="nome" />

    <x-controls.input wire:model.defer="nome_artistico" label="Nome artístico" name="nome_artistico" />
    <div class="row">
        <div class="col">
            <x-controls.input wire:model.defer="cidade" label="Cidade" name="cidade" />
        </div>
        <div class="col">
            <x-controls.input wire:model.defer="estado" label="Estado" name="estado" />
        </div>
    </div>
    
    <x-controls.textarea wire:model.defer="descricao" label="Descrição" name="descricao" />
    
    <div class="d-flex justify-content-end my-4">
        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>