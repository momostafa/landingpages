@aware(['page'])
@props(['brands'])
@php
    use Illuminate\Support\Str;

    // 1. Determine target suffix (e.g., ":ar" or ":en")
    $currentLang = request()->query('lang') === 'ar' ? 'ar' : 'en';
    $suffix = ":{$currentLang}";

    // 2. Build the "Normalized" brands array
    $brands = collect($brands)->mapWithKeys(function ($value, $key) use ($suffix) {
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
@if($brands['is_active'])
    <!-- ====== Brands Section Start -->
    <section class="pb-20 dark:bg-dark">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap items-center justify-center gap-8 -mx-4 xl:gap-11">
          @foreach($brands['logos'] as $logo)
          <a href="{{ $logo['link'] }}">
            <img
              src="{{ asset($logo['image_light']) }}"
              alt="{{ $logo['alt'] }}"
              class="dark:hidden"
            />
            <img
              src="{{ asset($logo['image_dark']) }}"
              alt="{{ $logo['alt'] }}"
              class="hidden dark:block"
            />
          </a>
          @endforeach
        </div>
      </div>
    </section>
    <!-- ====== Brands Section End -->
@endif
