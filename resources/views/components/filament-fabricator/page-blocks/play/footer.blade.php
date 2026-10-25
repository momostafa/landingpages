@aware(['page'])
@props(['footer' => null])
@php
    use Illuminate\Support\Str;

    // 1. Determine target suffix (e.g., ":ar" or ":en")
    $currentLang = request()->query('lang') === 'ar' ? 'ar' : 'en';
    $suffix = ":{$currentLang}";

    // 2. Build the "Normalized" footer array
    $footer = collect($footer)->mapWithKeys(function ($value, $key) use ($suffix) {
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
@if($footer['is_active'] ?? false)
    <!-- ====== Footer Section Start -->
    <footer
      class="wow fadeInUp relative z-10 bg-[#090E34] pt-20 lg:pt-[100px]"
      data-wow-delay=".15s"
    >
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-4/12 xl:w-3/12">
            <div class="w-full mb-10">
              <a
                href="{{ $footer['logo_link'] }}"
                class="mb-6 inline-block max-w-[160px]"
              >
                <img
                  src="{{ asset($footer['logo']) }}"
                  alt="logo"
                  class="max-w-full"
                />
              </a>
              <p class="mb-8 max-w-[270px] text-base text-gray-7">
                {{ $footer['heading'] }}
              </p>
              <div class="flex items-center -mx-3">
                @foreach ($footer['social_links'] as $social_link)
                <a
                  href="{{ $social_link['title_link'] }}"
                  class="px-3 text-gray-7 hover:text-white"
                >
                  <x-icon name="{{ $social_link['icon'] }}" alt="$social_link['title']" class="text-lg text-green-600 me-1" style="height: 20px;" />
                  
                </a>
                    
                @endforeach
              </div>
            </div>
          </div>
          <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-2/12 xl:w-2/12">
            <div class="w-full mb-10">
              <h4 class="text-lg font-semibold text-white mb-9">{{ $footer['about_us'] }}</h4>
                @foreach ($footer['about_links'] as $about_link)
                <ul>
                  <li>
                    <a
                      href="{{ $about_link['title_link'] }}"
                      class="inline-block mb-3 text-base text-gray-7 hover:text-primary"
                    >
                      {{ $about_link['title'] }}
                    </a>
                  </li>
                </ul>
                @endforeach
            </div>
          </div>
          <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-3/12 xl:w-2/12">
            <div class="w-full mb-10">
              <h4 class="text-lg font-semibold text-white mb-9">{{ $footer['features'] }}</h4>
              @foreach ($footer['features_links'] as $feature_link)
                <ul>
                  <li>
                    <a
                      href="{{ $feature_link['title_link'] }}"
                      class="inline-block mb-3 text-base text-gray-7 hover:text-primary"
                    >
                      {{ $feature_link['title'] }}
                    </a>
                  </li>
                </ul>
                @endforeach
            </div>
          </div>
          <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-3/12 xl:w-2/12">
            <div class="w-full mb-10">
              <h4 class="text-lg font-semibold text-white mb-9">{{ $footer['products'] }}</h4>
                @foreach ($footer['products_links'] as $product_link)
                <ul>
                  <li>
                    <a
                      href="{{ $product_link['title_link'] }}"
                      class="inline-block mb-3 text-base text-gray-7 hover:text-primary"
                    >
                      {{ $product_link['title'] }}
                    </a>
                  </li>
                </ul>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="w-full px-4 md:w-2/3 lg:w-6/12 xl:w-3/12">
            <div class="w-full mb-10">
              <h4 class="text-lg font-semibold text-white mb-9">{{ $footer['blog'] }}</h4>
              <div class="flex flex-col gap-8">
                @foreach ($footer['blog_links'] as $blog_link)
                <a
                  href="{{ $blog_link['title_link'] }}"
                  class="group flex items-center gap-[22px]"
                >
                  <div class="overflow-hidden rounded-sm">
                    <img
                      src="{{ asset($blog_link['image']) }}"
                      alt="{{ $blog_link['title'] }}"
                    />
                  </div>
                  <span
                    class="max-w-[180px] text-base text-gray-7 group-hover:text-white"
                  >
                    {{ $blog_link['title'] }}
                  </span>
                  @endforeach
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-12 border-t border-[#8890A4]/40 py-8 lg:mt-[60px]">
        <div class="container px-4 mx-auto">
          <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 md:w-2/3 lg:w-1/2">
              <div class="my-1">
                <div
                  class="flex items-center justify-center -mx-3 md:justify-start"
                >
                  <a
                    href="{{ $footer['privacy_policy_link'] }}"
                    class="px-3 text-base text-gray-7 hover:text-white hover:underline"
                  >
                    {{ $footer['privacy_policy'] }}
                  </a>
                  <a
                    href="{{ $footer['legal_notice_link'] }}"
                    class="px-3 text-base text-gray-7 hover:text-white hover:underline"
                  >
                    {{ $footer['legal_notice'] }}
                  </a>
                  <a
                    href="{{ $footer['terms_service_link'] }}"
                    class="px-3 text-base text-gray-7 hover:text-white hover:underline"
                  >
                    {{ $footer['terms_service'] }}
                  </a>
                </div>
              </div>
            </div>
            <div class="w-full px-4 md:w-1/3 lg:w-1/2">
              <div class="flex justify-center my-1 md:justify-end">
                <p class="text-base text-gray-7">
                  {{ $footer['copyright_text'] }}
                  <a
                    href="{{ $footer['copyright_link'] }}"
                    rel="nofollow noopner"
                    target="_blank"
                    class="text-gray-1 hover:underline"
                  >
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div>
        <span class="absolute left-0 top-0 z-[-1]">
          <img src="{{ asset('templates/play/assets/images/footer/shape-1.svg') }}" alt="" />
        </span>

        <span class="absolute bottom-0 right-0 z-[-1]">
          <img src="{{ asset('templates/play/assets/images/footer/shape-3.svg') }}" alt="" />
        </span>

      </div>
    </footer>
    <!-- ====== Footer Section End -->
@endif
