@props(['page'])
@php

use App\Models\Page as PageModel;

@endphp
<!DOCTYPE html>
<html lang="en" x-data="app()" :class="{'dark':dark}" class="scroll-smooth">
    <head>
        @php
            $type = "folio.meta";
            $blockData = PageModel::getBlocks($page->id, $type);
            if($blockData->count() > 0){
                $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
            }else{
                $pageBlock = null;
            }
        @endphp
        @isset($pageBlock)
            <x-dynamic-component
                :component="$pageBlock::getComponent()"
                :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData[$type]))"
            />
            {{-- @dd($component) --}}
        @endisset

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('templates/folio/assets/css/tailwind.css') }}">

        <!-- Alpine.js -->
        {{-- <script defer src="{{ asset('templates/folio/assets/js/alpine.min.js') }}"></script> --}}

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500&display=swap" rel="stylesheet">

        <!-- Livewire Styles -->
        @livewireStyles
        <style>[x-cloak] { display: none !important; }</style>
      </head>

<body class="bg-white dark:bg-zinc-950 text-zinc-900 dark:text-zinc-100 antialiased">

    @section('title', 'Index Page')

{{-- <!-- Navbar Start --> --}}
@php
$type = "folio.navbar";
$blockData = PageModel::getBlocks($page->id, $type);
if($blockData->count() > 0){
    $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
}else{
    $pageBlock = null;
}
@endphp

@isset($pageBlock)
<x-dynamic-component
    :component="$pageBlock::getComponent()"
    :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData[$type]))"
/>
{{-- @dd($component) --}}
@endisset
{{-- <!-- Navbar End --> --}}

<!-- MAIN CONTENT START -->
<main>

@php
    $type = "";
    $exclude = ['folio.contact', 'folio.meta', 'folio.navbar', 'folio.footer'];
    $blocksData = PageModel::getBlocks($page->id, $type, $exclude);
    // dd($blocksData);
@endphp

@foreach ($blocksData as $type => $blockData)
@php
    $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
@endphp
    @isset($pageBlock)
        <x-dynamic-component
            :component="$pageBlock::getComponent()"
            :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData))"
        />
    @endisset
@endforeach


{{-- <!-- Contact Start --> --}}
        @php
        $type = "folio.contact";
        $blockData = PageModel::getBlocks($page->id, $type);
        if($blockData->count() > 0){
            $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
        }else{
            $pageBlock = null;
        }
        @endphp
        @isset($pageBlock)
        <x-dynamic-component
            :component="$pageBlock::getComponent()"
            :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData[$type]))"
        />
        {{-- @dd($component) --}}
        @endisset
{{-- <!-- Contact End -->  --}}


        {{-- <!-- Footer Start --> --}}
        @php
        $type = "folio.footer";
        $blockData = PageModel::getBlocks($page->id, $type);
        if($blockData->count() > 0){
            $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
        }else{
            $pageBlock = null;
        }
        @endphp
        @isset($pageBlock)
        <x-dynamic-component
            :component="$pageBlock::getComponent()"
            :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData[$type]))"
        />
        {{-- @dd($component) --}}
        @endisset
        {{-- <!-- Footer End --> --}}

</main>

<!-- App JavaScript -->
<script src="{{ asset('templates/folio/assets/js/main.js') }}"></script>
<!-- Livewire Scripts -->
@livewireScripts
    </body>
</html>
