<form wire:submit.prevent="save" novalidate>
    <x-controls.input wire:model.defer="ocupacao.nome"  label="Nome da ocupação" name="ocupacao.nome" />

    <x-controls.toggle wire:model.defer="ocupacao.visivel"  label="Visivel" name="ocupacao.visivel" value="1" />

    <div class="d-flex justify-content-end mt-3">
        <button type="button" class="btn btn-link me-2" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-warning">Salvar</button>
    </div>
</form>