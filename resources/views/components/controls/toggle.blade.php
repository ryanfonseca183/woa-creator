@props(['name' => '', 'id' => '', 'label', 'inline' => false, 'type' => 'checkbox', 'margin' => '', 'checked' => false])

@php $id = $id !== '' ? $id : $name @endphp

<div class="form-check {{ $margin }} @if($type == "switch") form-switch @endif @if($inline) form-check-inline @endif">
  <input name="{{$name}}" id="{{ $id }}" type="{{ $type == "switch" ? 'checkbox' : $type }}" @if(old($name) == "1" || $checked) checked @endif {{$attributes->merge(['class' => 'form-check-input'])}} >
  <label class="form-check-label" for="{{ $id }}">{{$label}} </label>
</div>