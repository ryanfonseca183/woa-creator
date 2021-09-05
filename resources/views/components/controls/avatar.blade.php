@props(['image' => asset('img/user.png')])

<div class="text-center">
  <label class="form-label avatar" for="avatar">
    <span>Avatar</span>
    <div class="avatar-preview">
      <img src="{{ $image }}"  alt="Imagem de perfil">
      <div class="pick-avatar">
        <i class="fas fa-camera"></i>
      </div>
    </div>
    <input type="file" {{$attributes}} class="form-control d-none">
  </label>
  @error('avatar')
    <span class="d-inline-block invalid-feedback">{{ $message }}</span>
  @enderror
</div>