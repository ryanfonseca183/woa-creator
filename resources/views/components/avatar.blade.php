@props(['user'])

<img src="{{ asset($user->avatar ? 'storage/'. $user->avatar : 'img/user.png') }} " {{$attributes->merge(['class' => 'img-thumbnail rounded-circle', 'style' => 'height: 75px; width: 75px'])}}>
