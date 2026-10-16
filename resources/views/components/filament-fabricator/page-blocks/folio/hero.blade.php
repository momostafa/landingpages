@aware(['page'])
@props(['hero'])

@if($hero['is_active'])

<!-- Hero/Introduction Section Start -->
<section id="hero" class="relative min-h-screen flex items-center pt-16 overflow-hidden">
  <div class="absolute top-1/4 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
  <div class="absolute bottom-1/4 left-0 w-64 h-64 bg-zinc-200/50 dark:bg-zinc-800/30 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

  <div class="relative z-10 max-w-6xl mx-auto px-6 py-24 w-full">
    <div class="grid md:grid-cols-2 gap-12 items-center">

      <div>
        <p class="reveal text-sm font-medium text-accent tracking-widest uppercase mb-4">Available for work</p>
        <h1 class="reveal d1 font-display font-bold text-5xl md:text-6xl lg:text-7xl leading-[1.05] tracking-tight text-zinc-900 dark:text-white mb-6">
          Hi, I'm <span class="text-accent">Eliott</span>
        </h1>
        <p class="reveal d2 text-lg md:text-xl text-zinc-500 dark:text-zinc-400 font-light leading-relaxed max-w-md mb-10">
          Freelance <strong class="font-medium text-zinc-700 dark:text-zinc-300">UI/UX Designer &amp; Frontend Developer</strong>. I design and build digital products that people love to use — fast, clean, and accessible.
        </p>
        <div class="reveal d3 flex flex-wrap gap-4">
          <a href="#work" class="shimmer inline-flex items-center gap-2 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 font-medium px-7 py-3.5 rounded-full hover:bg-zinc-700 dark:hover:bg-zinc-200 transition-colors text-sm">
            View my work
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </a>
          <a href="#contact" class="inline-flex items-center gap-2 border border-zinc-300 dark:border-zinc-700 text-zinc-700 dark:text-zinc-300 font-medium px-7 py-3.5 rounded-full hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors text-sm">Get in touch</a>
        </div>
        <div class="reveal d4 flex gap-8 mt-14 pt-8 border-t border-zinc-100 dark:border-zinc-900">
          <div><p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">34+</p><p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Projects done</p></div>
          <div><p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">21+</p><p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Happy clients</p></div>
          <div><p class="font-display font-bold text-3xl text-zinc-900 dark:text-white">5y</p><p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Experience</p></div>
        </div>
      </div>

      <div class="reveal d2 flex justify-center md:justify-end">
        <div class="relative w-72 h-72 md:w-80 md:h-80 lg:w-96 lg:h-96">
          <div class="pf w-full h-full rounded-3xl">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&q=80" alt="Eliott — Freelance UI/UX Designer" loading="eager">
          </div>
          <div class="absolute -bottom-4 -left-4 bg-accent text-white font-display font-bold text-sm px-4 py-2.5 rounded-2xl shadow-lg">Open to projects</div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- Hero/Introduction Section End -->
@endif
