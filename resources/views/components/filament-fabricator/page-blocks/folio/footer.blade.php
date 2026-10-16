@aware(['page'])
@props(['footer'])
@php 
// 
@endphp
@if($footer['is_active'])
<!--  FOOTER Section Start -->
<footer class="border-t border-zinc-100 dark:border-zinc-900">
  <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col sm:flex-row items-center justify-between gap-4">
    <p class="text-sm text-zinc-400">© <span id="yr"></span> Eliott. All rights reserved. <br> Developed by <a href="https://lbegey78.gumroad.com/" target="_blank" class="font-bold">Laurent Begey</a> • Distributed by <a href="https://themewagon.com/" target="_blank" class="font-bold">ThemeWagon</a></p>
    <p class="text-xs text-zinc-500">Built with
      <a href="https://tailwindcss.com" rel="noopener noreferrer" target="_blank" class="hover:text-accent transition-colors">Tailwind CSS</a>
      &amp;
      <a href="https://alpinejs.dev" rel="noopener noreferrer" target="_blank" class="hover:text-accent transition-colors">Alpine.js</a>
    </p>
  </div>
</footer>
<!--  FOOTER Section End -->
@endif