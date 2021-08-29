@props([
  'name' => '', 
  'id' => $id ?? $name, 
  'label', 
  'collection' => collect([]), 
  'optionValue' => "", 
  'optionLabel' => "", 
  'optionSelected' => "", 
  'validation' => 'Selecione uma opção válida para o campo ' . $label
])
<div class="form-group">
  <label for="{{ $id }}" class="form-label @if($attributes->get('required')) form-label-required @endif">{{ $label }}</label>
  <select name="{{ $name }}" id="{{ $id }}" {{ $attributes->class(['form-select', 'is-invalid' => $errors->has($name)]) }}>
    {{-- OPÇÃO PADRÃO --}}
    @if($attributes->get('required')) 
      <option selected disabled value="">Selecione uma opção</option> 
    @else 
      <option value="">...</option> 
    @endif
    {{-- OPÇÕES SELECIONÁVEIS --}}
    @forelse($collection as $model)
      <option value="{{ $model->$optionValue }}" @if($model->$optionValue == old($name, $optionSelected)) selected @endif>{{ $model->$optionLabel ?? $model->$optionValue }}</option>
    @empty 
      {{$slot}}
    @endforelse
  </select>
  <span class="invalid-feedback"> @error($name) {{$message}} @else {{$validation}} @enderror</span>
</div>

