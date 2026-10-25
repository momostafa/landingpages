@aware(['page', 'blocks' => []])
@props(['features' => null])
@php
    use Illuminate\Support\Str;

    // 1. Determine target suffix (e.g., ":ar" or ":en")
    $currentLang = request()->query('lang') === 'ar' ? 'ar' : 'en';
    $suffix = ":{$currentLang}";

    // 2. Build the "Normalized" features array
    $features = collect($features)->mapWithKeys(function ($value, $key) use ($suffix) {
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
@if($features['is_active'] ?? false)
    <!-- ====== Features Section Start -->
    <section id="features" class="pb-8 pt-20 dark:bg-dark lg:pb-[70px] lg:pt-[120px]">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <div class="mx-auto mb-12 max-w-[485px] text-center lg:mb-[70px]">
              <span class="block mb-2 text-lg font-semibold text-primary">
                {{ $features['section_title'] }}
              </span>
              <h2
                class="mb-3 text-3xl font-bold text-dark dark:text-white sm:text-4xl md:text-[40px] md:leading-[1.2]"
              >
                {{ $features['heading'] }}
              </h2>
              <p class="text-base text-body-color dark:text-dark-6">
               {{ $features['description'] }}
              </p>
            </div>
          </div>
        </div>
        {{-- foreach features items --}}
        <div class="flex flex-wrap -mx-4">
            @foreach ($features['items'] as $item)
          <div class="w-full px-4 md:w-1/2 lg:w-1/4">
            <div class="size-20 bg-orange-600/5 text-orange-600 rounded-xl text-3xl flex align-middle justify-center items-center shadow-sm">
                <x-icon name="{{ $item['icon'] }}" class="text-orange-600" style="height: 40px;" />
            </div>
              <h4 class="mb-3 text-xl text-center font-bold text-dark dark:text-white">
              {{ $item['title'] }}
              </h4>
              <p class="mb-8 text-body-color dark:text-dark-6 lg:mb-9">
                {{ $item['description'] }}
              </p>
                <a href="{{ $item['button_link'] }}" class="btn btn-link text-dark hover:text-primary dark:text-white dark:hover:text-primary transition duration-500">{{ $item['button_text'] }} <i class="uil uil-arrow-right"></i></a>
          </div>

          @endforeach
        </div>
      </div>
    </section>
    <!-- ====== Features Section End -->

@endif
