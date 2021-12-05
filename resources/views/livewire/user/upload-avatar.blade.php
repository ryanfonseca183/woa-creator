<div>
    <label class="avatar" wire:loading.class="loading-avatar">
        <div>
            <div class="spinner-border text-warning" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <img src="{{  asset(auth()->user()->avatar ? 'storage/'. auth()->user()->avatar : 'img/user.png') }}" class="img-thumbnail rounded-circle">
        
        <input type="file" wire:model="avatar" name="avatar" id="avatar" class="d-none" accept="image/jpeg,.jpg,image/gif,.gif,image/png,.png,.jpeg,image/webp,.webp">
    </label>
    @error("avatar")
        <script>toastr.error('{{ $message }}');</script>
    @enderror
</div>