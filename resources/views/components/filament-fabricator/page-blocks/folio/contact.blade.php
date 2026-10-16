@aware(['page'])

@props(['contact'])

@if($contact['is_active'])

<!-- CONTACT Section START -->
<section id="contact" class="py-24">
  <div class="max-w-6xl mx-auto px-6">
    <div class="bg-zinc-900 dark:bg-zinc-800 rounded-3xl p-10 md:p-16 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-64 h-64 bg-accent/20 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
      <div class="absolute bottom-0 left-0 w-40 h-40 bg-accent/10 rounded-full blur-2xl pointer-events-none" aria-hidden="true"></div>

      <div class="relative z-10 grid md:grid-cols-2 gap-12 items-start">

        <div>
          <p class="reveal text-xs font-medium text-accent tracking-widest uppercase mb-3">{{ $contact['section_name'] }}</p>
          <h2 class="reveal d1 font-display font-bold text-4xl md:text-5xl text-white leading-tight mb-5">{{ $contact['heading'] }}<br>{{ $contact['heading2'] }}</h2>
          <p class="reveal d2 text-zinc-400 leading-relaxed mb-8">{{ $contact['description'] }}</p>

          <div class="reveal d3 flex flex-col gap-4">
            @foreach ($contact['items'] as $key => $value)
            @if ($value['type'] == 'email')
            <a href="{{ $value['url'] }}" class="group flex items-center gap-3 text-zinc-400 hover:text-white transition-colors">
              <span class="w-9 h-9 flex items-center justify-center bg-zinc-800 rounded-lg group-hover:bg-accent/20 transition-colors shrink-0">
                <x-icon name="{{ $value['icon'] }}" class="w-6 h-6 text-accent fill-none stroke:currentColor viewBox:0 0 20 20 aria-hidden:true"/>
              </span>
              <span class="text-sm">{{ $value['url'] }}</span>
            </a>
            @else
            <a href="{{ $value['url'] }}" class="group flex items-center gap-3 text-zinc-400 hover:text-white transition-colors">
              <span class="w-9 h-9 flex items-center justify-center bg-zinc-800 rounded-lg group-hover:bg-accent/20 transition-colors shrink-0">
                <x-icon name="{{ $value['icon'] }}" class="w-6 h-6 text-accent fill-none stroke:currentColor viewBox:0 0 20 20 aria-hidden:true"/>
              </span>
              <span class="text-sm">{{ $value['url'] }}</span>
            </a>
            @endif

            @endforeach
          </div>
        </div>

        <div class="reveal d2">
          <!-- Livewire Contact Form & Mail Component -->
            @livewire('mail.create-mail-folio',
                [
                'page_slug' => $page->slug,
                'page_id' => $page->id,
                'page_layout' => $page->layout,
                'user_id' => $page->user_id,
                'source' => 'contact_form',
                'direction' => 'inbound'
                ])
          <!-- Livewire Contact Form & Mail Component -->
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CONTACT Section END -->
@endif
