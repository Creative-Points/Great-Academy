@props(['active', 'href'])

@php
// $classes = ($active ?? false)
//             ? 'active'
//             : 'active';
$classes = $active == $href ? 'background: #008510;' : ''; 
@endphp
<li {{ $attributes->merge(['style' => $classes]) }}>
    <a href="{{$href}}">
        {{ $slot }}
    </a>
</li>