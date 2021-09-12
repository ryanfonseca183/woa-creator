<form wire:submit.prevent="save">
    <div class="row gx-3 align-items-top">
        <div class="col-auto">
            <div style="width: 40px;" class="text-center">
                <i class="fab fs-1 fa-facebook mt-2"></i>
            </div>
        </div>
        <div class="col">
            <x-controls.input wire:model.defer="url_facebook" label="Facebook" name="url_facebook" />
        </div>
    </div>

    <div class="row gx-3 align-items-top">
        <div class="col-auto">
            <div style="width: 40px;" class="text-center">
                <i class="fab fa-instagram fs-1 mt-2"></i>
            </div>
        </div>
        <div class="col">
            <x-controls.input wire:model.defer="url_instagram" label="Instagram" name="url_instagram" />
        </div>
    </div>

    <div class="row gx-3 align-items-top">
        <div class="col-auto">
            <div style="width: 40px;" class="text-center">
                <i class="fab fa-twitter fs-1 mt-2"></i>
            </div>
        </div>
        <div class="col">
            <x-controls.input wire:model.defer="url_twitter" label="Twitter" name="url_twitter" />
        </div>
    </div>

    <div class="row gx-3 align-items-top">
        <div class="col-auto">
            <div style="width: 40px;" class="text-center">
                <i class="fas fa-mobile-alt fs-1 mt-2"></i>
            </div>
        </div>
        <div class="col">
            <x-controls.input wire:model.defer="celular" label="Celular" name="celular" />
        </div>
    </div>


   
    
    <div class="d-flex justify-content-end my-4">
        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>