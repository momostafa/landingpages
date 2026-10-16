@aware(['page'])
@props(['services'])
@php
//dd($services);
@endphp
@if($services['is_active'])
<!-- Services Section Start -->
<section id="services" class="py-24 bg-zinc-50 dark:bg-zinc-900/40">
  <div class="max-w-6xl mx-auto px-6">
    <div class="mb-14">
      <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">{{ $services['heading'] }}</p>
      <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">{{ $services['section_name'] }}</h2>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
    @foreach ($services['items'] as $item)
      <article class="reveal d1 card-h group bg-white dark:bg-zinc-900 rounded-2xl p-8 border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="w-12 h-12 flex items-center justify-center bg-orange-50 dark:bg-zinc-800 rounded-xl mb-6 group-hover:bg-accent/10 transition-colors">
            <x-icon name="{{ $item['icon'] }}" class="w-6 h-6 text-accent fill:none viewBox:0 0 24 24 stroke:currentColor aria-hidden:true"/>
        </div>
        <h3 class="font-display font-bold text-xl text-zinc-900 dark:text-white mb-3">{{ $item['title'] }}</h3>
        <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed">{{ $item['description'] }}</p>
      </article>
    @endforeach
    </div>
  </div>
</section>
<!-- Services Section End -->
@endif
