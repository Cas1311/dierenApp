@props(['tagsCsv'])
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="tags-container">
    @foreach ($tags as $tag)
        <li>
            <a class="tag" href="/?tag={{ $tag }}">{{ $tag }}</a>
        </li>
    @endforeach

</ul>
