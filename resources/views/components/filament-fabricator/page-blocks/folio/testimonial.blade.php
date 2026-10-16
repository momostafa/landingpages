@aware(['page'])
@props(['testimonial'])
@php
//
@endphp
@if($testimonial['is_active'])
<!--  TESTIMONIALS Section Start -->
<section id="testimonial" class="py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="mb-14">
      <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">{{ $testimonial['heading'] }}</p>
      <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">{{ $testimonial['section_name'] }}</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
    @foreach($testimonial['posts'] as $post)
      <blockquote class="reveal d1 bg-zinc-50 dark:bg-zinc-900 rounded-2xl p-7 border border-zinc-100 dark:border-zinc-800">
        <div class="flex gap-0.5 mb-5" aria-label="5 stars">
        @for($i = 1; $i <= $post['rating']; $i++)
            {{-- <x-icon name="{{ $value['icon'] }}" class="w-6 h-6 text-accent fill-none stroke:currentColor viewBox:0 0 20 20 aria-hidden:true"/> --}}

            <x-icon name="uni-star" class="w-6 h-6 text-accent fill-none hover:text-white stroke:currentColor viewBox:0 0 20 20 aria-hidden:true"/>
        @endfor
        </div>
        <p class="text-zinc-600 dark:text-zinc-400 text-sm leading-relaxed mb-6 italic">"{{ $post['content'] }}"</p>
        <footer class="flex items-center gap-3">
          <div class="pf w-10 h-10 rounded-full shrink-0"><img src="{{ asset($post['image']) }}" alt="{{ $post['author'] }}" loading="lazy"></div>
          <div>
            <p class="font-medium text-sm text-zinc-900 dark:text-white">Sarah Müller</p>
            <p class="text-xs text-zinc-500">{{ $post['author_position'] }}</p>
          </div>
        </footer>
      </blockquote>
    @endforeach
    </div>
  </div>
</section>
<!--  TESTIMONIALS Section End -->
@endif
