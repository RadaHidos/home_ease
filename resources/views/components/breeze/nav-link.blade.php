@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-3 py-2 rounded-md text-sm font-medium bg-slate-800 text-white transition-all duration-150'
: 'inline-flex items-center px-3 py-2 rounded-md text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-800/60 transition-all duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>