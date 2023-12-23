@props(['active','href','name'])
@php
$classes = ($active ?? false)
            ? 'nav-item active'
            : 'nav-item';
@endphp
<li  {{ $attributes->merge(['class' => $classes]) }}>
    <a class="nav-link " href="{{$href}}">
        {{$slot}}
       
        <span>{{$name}}</span></a>
</li>