@aware(['page'])
@props(['blog' => null])

@if($blog['is_active'] ?? false)
<!--  BLOG Section Start -->
<section id="blog" class="py-24 bg-zinc-50 dark:bg-zinc-900/40">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-14">
      <div>
        <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">{{ $blog['heading'] }}</p>
        <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-zinc-900 dark:text-white">{{ $blog['section_name'] }}</h2>
      </div>
      <a href="{{ $blog['allposts_link'] }}" class="reveal d1 text-sm font-medium text-zinc-500 dark:text-zinc-400 hover:text-accent transition-colors self-start sm:self-auto nl">All articles →</a>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
    @foreach ($blog['posts'] as $post )
      <article class="reveal d1 card-h group bg-white dark:bg-zinc-900 rounded-2xl overflow-hidden border border-zinc-100 dark:border-zinc-800 hover:border-accent">
        <div class="pf w-full h-44">
          <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" loading="lazy">
        </div>
        <div class="p-6">
          <div class="flex items-center gap-3 mb-3">
            <span class="text-xs bg-orange-50 dark:bg-zinc-800 text-accent border border-orange-200 dark:border-zinc-700 px-2.5 py-1 rounded-full">{{ $post['category'] }}</span>
            <span class="text-xs text-zinc-400">{{ $post['date'] }}</span>
          </div>
          <a href="{{ $post['link'] }}">
            <h3 class="font-display font-bold text-lg text-zinc-900 dark:text-white mb-2 group-hover:text-accent transition-colors">{{ $post['title'] }}</h3>
          </a>
          <p class="text-sm text-zinc-500 dark:text-zinc-400 leading-relaxed mb-4">{{ $post['intro'] }}</p>
          <a href="{{ $post['link'] }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-zinc-900 dark:text-white nl">Read more →</a>
        </div>
      </article>
    @endforeach
    </div>
  </div>
</section>
<!--  BLOG Section End -->
@endif
