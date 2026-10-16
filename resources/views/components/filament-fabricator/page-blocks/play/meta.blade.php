@aware(['page'])
@props(['meta' => null])
@if($meta['is_active'] ?? false)
        {{-- Meta Start --}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $meta['title'] }}</title>
        <meta name="description" content="{{ $meta['description'] }}">
        <meta name="keywords" content="{{ implode(', ', $meta['keywords']) }}">
        <meta name="author" content="{{ $meta['author'] }}">
        <meta name="website" content="{{ $meta['website'] }}">
        <meta name="email" content="{{ $meta['email'] }}">
        <meta name="version" content="{{ $meta['version'] }}">
        {{-- <!-- favicon --> --}}
        <link href="{{ asset($meta['favicon']) }}" rel="shortcut icon">
        {{-- <!-- Meta End --> --}}
@endif
