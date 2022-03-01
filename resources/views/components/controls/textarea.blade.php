@props(['name' => '', 'id' => '', 'label',  'validation' => 'Digite um valor válido para o campo ' . $label])

@php $id = $id !== '' ? $id : $name; @endphp 

<div class="form-group">
  <label for="{{ $id }}" class="form-label @if($attributes->get('required')) form-label-required @endif">{{$label}}</label>
  <textarea id="{{ $id}}" name="{{ $name }}" {{$attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }}>{{$slot}}</textarea>
  <span class="invalid-feedback"> @error($name) {{$message}} @else {{$validation}} @enderror</span>
</div>
