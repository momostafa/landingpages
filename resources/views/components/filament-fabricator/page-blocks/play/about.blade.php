@aware(['page'])
@props(['about'])
@php
    use Illuminate\Support\Str;

    // 1. Determine target suffix (e.g., ":ar" or ":en")
    $currentLang = request()->query('lang') === 'ar' ? 'ar' : 'en';
    $suffix = ":{$currentLang}";

    // 2. Build the "Normalized" navbar array
    $about = collect($about)->mapWithKeys(function ($value, $key) use ($suffix) {
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

    // Handle both old and new field names for backward compatibility
    $image1 = $about['image_1'] ?? $about['background_image'] ?? 'templates/play/assets/images/about/about-image-01.jpg';
    $image2 = $about['image_2'] ?? 'templates/play/assets/images/about/about-image-02.jpg';
    $experienceYears = $about['experience_years'] ?? '10';
    if($currentLang == 'en'){
    $wehave = "We have";
    $yearsofexperince = "Years of experience";
    }else{
    $wehave = "لدينا";
    $yearsofexperince = "سنوات من الخبرة";
    }


@endphp
@if($about['is_active'])
{{-- <!-- About Section Start --> --}}
<section id="about" class="bg-gray-1 pb-8 pt-20 dark:bg-dark-2 lg:pb-[70px] lg:pt-[120px]">
    <div class="container mx-auto px-4">
        <div class="wow fadeInUp" data-wow-delay=".2s">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4 lg:w-1/2">
                    <div class="mb-12 max-w-[540px] lg:mb-0">
                        <h2 class="mb-5 text-3xl font-bold leading-tight text-dark dark:text-white sm:text-[40px] sm:leading-[1.2]">
                            {{ $about['heading'] ?? 'Brilliant Toolkit to Build Nextgen Website Faster.' }}
                        </h2>
                        <p class="mb-10 text-base leading-relaxed text-body-color dark:text-dark-6">
                            {!! nl2br($about['description'] ?? '') !!}
                        </p>

                        <a href="{{ $about['button_link'] ?? '#' }}" class="inline-flex items-center justify-center py-3 text-base font-medium text-center text-white border rounded-md border-primary bg-primary px-7 hover:border-blue-dark hover:bg-blue-dark">
                            {{ $about['button_text'] ?? 'Know More' }}
                        </a>
                    </div>
                </div>

                <div class="w-full px-4 lg:w-1/2">
                    <div class="flex flex-wrap -mx-2 sm:-mx-4 lg:-mx-2 xl:-mx-4">
                        <div class="w-full px-2 sm:w-1/2 sm:px-4 lg:px-2 xl:px-4">
                            <div class="mb-4 sm:mb-8 sm:h-[400px] md:h-[540px] lg:h-[400px] xl:h-[500px]">
                                <img src="{{ asset($image1) }}" alt="about image" class="object-cover object-center w-full h-full" />
                            </div>
                        </div>

                        <div class="w-full px-2 sm:w-1/2 sm:px-4 lg:px-2 xl:px-4">
                            <div class="mb-4 sm:mb-8 sm:h-[220px] md:h-[346px] lg:mb-4 lg:h-[225px] xl:mb-8 xl:h-[310px]">
                                <img src="{{ asset($image2) }}" alt="about image" class="object-cover object-center w-full h-full" />
                            </div>

                            <div class="relative z-10 mb-4 flex items-center justify-center overflow-hidden bg-primary px-6 py-12 sm:mb-8 sm:h-[160px] sm:p-5 lg:mb-4 xl:mb-8">
                                <div>
                                    <span class="block text-base font-semibold text-white">
                                        {{ $wehave }}
                                    </span>
                                    <span class="block text-5xl font-extrabold text-white">
                                        {{ $experienceYears }}
                                    </span>
                                    <span class="block text-base font-medium text-white text-opacity-70">
                                        {{ $yearsofexperince }}
                                    </span>
                                </div>
                                <div>
                                    <span class="absolute top-0 left-0 -z-10">
                                        <svg width="106" height="144" viewBox="0 0 106 144" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.1" x="-67" y="47.127" width="113.378" height="131.304" transform="rotate(-42.8643 -67 47.127)" fill="url(#paint0_linear_1416_214)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_1416_214" x1="-10.3111" y1="47.127" x2="-10.3111" y2="178.431" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="white" />
                                                    <stop offset="1" stop-color="white" stop-opacity="0" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </span>
                                    <span class="absolute top-0 right-0 -z-10">
                                        <svg width="130" height="97" viewBox="0 0 130 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.1" x="0.86792" y="-6.67725" width="155.563" height="140.614" transform="rotate(-42.8643 0.86792 -6.67725)" fill="url(#paint0_linear_1416_215)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_1416_215" x1="78.6495" y1="-6.67725" x2="78.6495" y2="133.937" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="white" />
                                                    <stop offset="1" stop-color="white" stop-opacity="0" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </span>
                                    <span class="absolute bottom-0 right-0 -z-10">
                                        <svg width="175" height="104" viewBox="0 0 175 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.1" x="175.011" y="108.611" width="101.246" height="148.179" transform="rotate(137.136 175.011 108.611)" fill="url(#paint0_linear_1416_216)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_1416_216" x1="225.634" y1="108.611" x2="225.634" y2="256.79" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="white" />
                                                    <stop offset="1" stop-color="white" stop-opacity="0" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <!-- About Section End --> --}}
@endif
