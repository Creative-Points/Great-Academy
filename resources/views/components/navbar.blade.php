@props(['active', 'href'])

@php
// $classes = ($active ?? false)
//             ? 'active'
//             : 'active';
$classes = $active == $href ? 'active' : ''; 
@endphp
<li {{ $attributes->merge(['class' => $classes]) }}>
    <a href="{{$href}}">
        {{ $slot }}
    </a>
</li>