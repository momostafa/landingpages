@aware(['page'])
@props(['blog'])
@php
    use Illuminate\Support\Str;

    // 1. Determine target suffix (e.g., ":ar" or ":en")
    $currentLang = request()->query('lang') === 'ar' ? 'ar' : 'en';
    $suffix = ":{$currentLang}";

    // 2. Build the "Normalized" blog array
    $blog = collect($blog)->mapWithKeys(function ($value, $key) use ($suffix) {
        // If the key ends with our target language (e.g., "signin_text:ar")
        if (Str::endsWith($key, $suffix)) {
            // Return the stripped key (e.g., "signin_text") with the current value
            return [Str::before($key, ':') => $value];
        }

        // If it's a key that doesn't have a language suffix at all (e.g., "logo_dark")
        // OR if it's a suffix for the OTHER language, we only keep it if it has no suffix.
        if (!Str::contains($key, ':')) {
            return [$key => $value];
        }

        // Otherwise, ignore keys belonging to the other language
        return [];
    })->toArray();

@endphp
@if($blog['is_active'])

    <!-- ====== Blog Section Start -->
    <section id="blog" class="bg-white pb-10 pt-20 dark:bg-dark lg:pb-20 lg:pt-[120px]">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap justify-center -mx-4">
          <div class="w-full px-4">
            <div class="mx-auto mb-[60px] max-w-[485px] text-center">
              <span class="block mb-2 text-lg font-semibold text-primary">
                {{ $blog['section_title'] }}
              </span>
              <h2
                class="mb-4 text-3xl font-bold text-dark dark:text-white sm:text-4xl md:text-[40px] md:leading-[1.2]"
              >
                {{ $blog['heading'] }}
              </h2>
              <p class="text-base text-body-color dark:text-dark-6">
                {{ $blog['description'] }}
              </p>
            </div>
          </div>
        </div>
        <div class="flex flex-wrap -mx-4">
                {{-- foreach blog items --}}
                @foreach($blog['items'] as $item)
            <div class="w-full px-4 md:w-1/2 lg:w-1/3 wow fadeInUp group" data-wow-delay=".1s">
              <div class="mb-8 overflow-hidden rounded-[5px]">
                <a href="{{ $item['button_link'] }}" class="block">
                  <img
                    src="{{ asset($item['image']) }}"
                    alt="image"
                    class="w-full transition group-hover:rotate-6 group-hover:scale-125"
                  />
                </a>
                </div>
              <div>
                <span
                  class="mb-6 inline-block rounded-[5px] bg-primary px-4 py-0.5 text-center text-xs font-medium leading-loose text-white"
                >
                  {{ \Carbon\Carbon::parse($item['published_at'])->format('M d, Y') }}
                </span>
                <h3>
                  <a
                    href="{{ $item['title_link'] }}"
                    class="inline-block mb-4 text-xl font-semibold text-dark hover:text-primary dark:text-white dark:hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl"
                  >
                    {{ $item['title'] }}
                  </a>
                </h3>
                <p
                  class="max-w-[370px] text-base text-body-color dark:text-dark-6"
                >
                  {{ $item['description'] }}
                </p>
                <div class="mt-5">
                  <a href="{{ $item['button_link'] }}" class="inline-block mb-4 text-xl font-semibold text-dark hover:text-primary dark:text-white dark:hover:text-primary sm:text-xl lg:text-xl xl:text-xl">{{ $item['button_text'] }}</a>
                </div>
              </div>
            </div>
            @endforeach    
            </div>
        </div>
    </div>
    </div>
</section>
    <!-- ====== Blog Section End -->

@endif
