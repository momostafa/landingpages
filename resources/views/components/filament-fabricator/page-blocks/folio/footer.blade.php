@aware(['page'])
@props(['footer' => null])
@php 
// 
@endphp
@if($footer['is_active'] ?? false)
<!--  FOOTER Section Start -->
<footer class="border-t border-zinc-100 dark:border-zinc-900">
  <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
    <p class="text-sm text-zinc-400">© <span id="yr"></span> {{ $footer['copyright_name'] }} All rights reserved. <br> Developed by {{ $footer['copyright_developer_name'] }} <a href="{{ $footer['copyright_developer_name_link'] }}" target="_blank" class="font-bold">{{ $footer['copyright_developer_name'] }}</a> • Distributed by <a href="{{ $footer['copyright_company_link'] }}" target="_blank" class="font-bold">{{ $footer['copyright_company'] }}</a></p>
    <p class="text-sm text-zinc-400">Laravel & Filament Integration by <br> <a href="{{ $footer['copyright_developer_name2_link'] }}" target="_blank" class="font-bold">{{ $footer['copyright_developer_name2'] }}</a></p>
    <p class="text-xs text-zinc-500">Built with
      <a href="{{ $footer['built_with_tech_1_link'] }}" rel="noopener noreferrer" target="_blank" class="hover:text-accent transition-colors">{{ $footer['built_with_tech_1'] }}</a>
      &amp;
      <a href="{{ $footer['built_with_tech_2_link'] }}" rel="noopener noreferrer" target="_blank" class="hover:text-accent transition-colors">{{ $footer['built_with_tech_2'] }}</a>
    </p>
  </div>
</footer>
<!--  FOOTER Section End -->
@endif