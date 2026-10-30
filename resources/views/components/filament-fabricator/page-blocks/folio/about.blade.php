@aware(['page'])
@props(['about' => null])
@php
// dd($about);
@endphp
@if($about['is_active'] ?? false)
<!-- About Me Section Start -->
<section id="about" class="py-24 bg-zinc-50 dark:bg-zinc-900/40">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-16 items-center">

      <div class="reveal order-2 md:order-1">
        <div class="pf w-full aspect-square max-w-sm mx-auto rounded-3xl">
          <img src="{{ asset($about['image']) }}" alt="{{ $about['section_name']}}" loading="lazy">
        </div>
      </div>

      <div class="order-1 md:order-2">
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">{{ $about['section_name'] }}</p>
        <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white text-accent leading-tight mb-6">{{ $about['heading'] }}<br><span class="text-accent">{{ $about['heading2'] }}</span></h2>
        <p class="reveal d2 text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">
        {{ $about['description']}}
        </p>
        <p class="reveal d3 text-zinc-500 dark:text-zinc-400 leading-relaxed mb-8">
        {{ $about['description2']}}
        </p>
        <div class="reveal d4">
          <p class="text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-widest mb-3">Stack &amp; tools</p>
          <div class="flex flex-wrap gap-2" role="list" aria-label="Skills">
            @foreach($about['skills'] as $skill)
            <span role="listitem" class="stag text-sm bg-white dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 px-3.5 py-1.5 rounded-full hover:border-accent">{{ $skill['skill'] }}</span>
            @endforeach
            </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- About Me Section End -->
@endif
