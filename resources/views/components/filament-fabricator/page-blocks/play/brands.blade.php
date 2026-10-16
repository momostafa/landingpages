@aware(['page'])
@props(['brands'])
@php 

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
