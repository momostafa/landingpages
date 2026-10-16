@aware(['page'])
@props(['pricing'])
@php 
//dd($pricing['items']);
@endphp
@if($pricing['is_active'])
    <!-- ====== Pricing Section Start -->
    <section
      id="pricing"
      class="relative z-20 overflow-hidden bg-white dark:bg-dark pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]"
    >
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <div class="mx-auto mb-[60px] max-w-[510px] text-center">
              <span class="block mb-2 text-lg font-semibold text-primary">
                {{ $pricing['section_title'] }}
              </span>
              <h2
                class="mb-3 text-3xl font-bold text-dark dark:text-white sm:text-4xl md:leading-[1.2] md:text-[40px]"
              >
                {{ $pricing['heading'] }}
              </h2>
              <p class="text-base text-body-color dark:text-dark-6">
                {{ $pricing['description'] }}
              </p>
            </div>
          </div>
        </div>
        <div class="flex flex-wrap justify-center -mx-4">
            @foreach ($pricing['items'] as $item)
          <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div
              class="relative z-10 px-8 py-10 mb-10 overflow-hidden bg-white rounded-xl dark:bg-dark-2 shadow-pricing sm:p-12 lg:py-10 lg:px-6 xl:p-14"
            >
              <span
                class="block mb-5 text-xl font-medium text-dark dark:text-white"
              >
                {{ $item['name'] }}
              </span>
              <h2
                class="mb-11 text-4xl font-semibold text-dark dark:text-white xl:leading-[1.21] xl:text-[42px]"
              >
                <span class="text-xl font-medium">$</span>
                <span class="-ml-1 -tracking-[2px]">{{ $item['price'] }}</span>
                <span
                  class="text-base font-normal text-body-color dark:text-dark-6"
                >
                  Per Month
                </span>
              </h2>
              <div class="mb-[50px]">
                <h5 class="mb-5 text-lg font-medium text-dark dark:text-white">
                  Features
                </h5>
                @foreach ($item['features'] as $feature)
                <div class="flex flex-col gap-[14px]">
                    <li class="flex items-center my-1 text-slate-400">
                        <x-icon name="{{ $feature['icon'] }}" class="text-lg text-green-600 me-1" style="height: 20px;" />
                        <span>{{ $feature['feature'] }}</span>
                    </li>
                </div>
                @endforeach
              </div>
              <a
                href="{{ $item['button_link'] }}"
                class="inline-block py-3 text-base font-medium text-center text-white transition rounded-md bg-primary px-7 hover:bg-blue-dark"
              >
                {{ $item['button_text'] }}
              </a>
            </div>
          </div>
          @endforeach
      </div>
    </section>
    <!-- ====== Pricing Section End -->
@endif
