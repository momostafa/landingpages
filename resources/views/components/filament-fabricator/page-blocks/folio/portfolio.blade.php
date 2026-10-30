@aware(['page'])
@props(['portfolio'])
@php
//
@endphp
@if($portfolio['is_active'])
<!-- Portfolio Section Start -->
<section id="portfolio" class="py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-14">
      <div>
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">{{ $portfolio['heading'] }}</p>
        <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">{{ $portfolio['section_name'] }}</h2>
      </div>
      <a href="{{ $portfolio['allprojects_link'] }}" class="reveal d1 text-sm font-medium text-zinc-500 dark:text-zinc-400 hover:text-accent transition-colors self-start sm:self-auto nl">All projects →</a>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
    @foreach ($portfolio['items'] as $item)
      <article class="card-h reveal d1 group rounded-2xl overflow-hidden bg-zinc-100 dark:bg-zinc-900 border border-zinc-100 dark:border-zinc-800 hover:border-accent md:row-span-2">
        <div class="pf w-full h-64 md:h-80">
          <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="lazy">
        </div>
        <div class="p-7">
          <div class="flex flex-wrap gap-2 mb-4">
            @foreach ($item['tags'] as $tag )
            <span class="text-xs bg-orange-50 dark:bg-zinc-800 text-accent border border-orange-200 dark:border-zinc-700 px-3 py-1 rounded-full">{{ $tag }}</span>
            @endforeach
            {{-- <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full">Figma</span>
            <span class="text-xs bg-zinc-200 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 px-3 py-1 rounded-full">Tailwind</span> --}}
          </div>
          <a href="{{ $item['link'] }}">
            <h3 class="font-display font-bold text-2xl text-zinc-900 dark:text-white mb-2">Novu — SaaS Dashboard</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-5">{{ $item['description'] }}</p>
          <a href="{{ $item['link'] }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">View case study <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>
        </div>
      </article>
    @endforeach
    </div>
  </div>
</section>
<!-- Portfolio Section End -->
@endif
