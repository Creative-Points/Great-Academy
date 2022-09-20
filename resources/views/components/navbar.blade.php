@props(['active', 'href'])

@php
// $classes = ($active ?? false)
//             ? 'active'
//             : 'active';
$classes = $active == $href ? 'background: #02b918;' : ''; 
@endphp
<li {{ $attributes->merge(['style' => $classes]) }}>
    <a href="{{$href}}">
        {{ $slot }}
    </a>
</li>