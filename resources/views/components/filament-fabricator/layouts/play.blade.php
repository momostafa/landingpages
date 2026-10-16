@props(['page'])
@php

use App\Models\Page as PageModel;

@endphp
<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">
    <head>
        @php
            $type = "play.meta";
            $blockData = PageModel::getBlocks($page->id, $type);
            if($blockData->count() > 0){
                $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
            }else{
                $pageBlock = null;
            }
        @endphp
        @isset($pageBlock)
            <x-dynamic-component
                :component="$pageBlock::getComponent()"
                :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData[$type]))"
            />
            {{-- @dd($component) --}}
        @endisset
        <!-- Css -->
        <link rel="stylesheet" href="{{ asset('templates/play/assets/css/swiper-bundle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('templates/play/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('templates/play/assets/css/tailwind.css') }}">
    </head>
    
    <body class="font-rubik text-base text-slate-900 dark:text-white dark:bg-slate-900">
    
        

        @section('title', 'Index Page')
        <!-- Main Content -->
        <div class="content">                

{{-- <!-- Navbar Start --> --}}
@php
$type = "play.navbar";
$blockData = PageModel::getBlocks($page->id, $type);
if($blockData->count() > 0){
    $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
}else{
    $pageBlock = null;
}
@endphp
@isset($pageBlock)
<x-dynamic-component
    :component="$pageBlock::getComponent()"
    :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData[$type]))"
/>
{{-- @dd($component) --}}
@endisset
{{-- <!-- Navbar End --> --}}

@php
    $type = "";
    $exclude = ['play.contact', 'play.meta', 'play.navbar', 'play.footer'];
    $blocksData = PageModel::getBlocks($page->id, $type, $exclude);
    // dd($blocksData);
@endphp

@foreach ($blocksData as $type => $blockData)
@php
    $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
@endphp
    @isset($pageBlock)
        <x-dynamic-component
            :component="$pageBlock::getComponent()"
            :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData))"
        />
    @endisset
@endforeach

{{-- <x-filament-fabricator::page-blocks :blocks="$blocksData" /> --}}


{{-- <!-- Hero Start -->
<!-- Hero End -->

<!-- About Start -->
<!-- About End -->

<!-- Features Start -->
<!-- Features End -->

<!-- Portfolio Start -->
<!-- Portfolio End -->

<!-- CTA Start -->
<!-- CTA End -->

<!-- Testimonial Start -->
<!-- Testimonial End -->

<!-- Pricing Start -->
<!-- Pricing End -->

<!-- Team Start -->
<!-- Team End -->

<!-- Blog Start -->
<!-- Blog End -->--}}

{{-- <!-- Contact Start --> --}}
        @php
        $type = "play.contact";
        $blockData = PageModel::getBlocks($page->id, $type);
        if($blockData->count() > 0){
            $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
        }else{
            $pageBlock = null;
        }
        @endphp
        @isset($pageBlock)
        <x-dynamic-component
            :component="$pageBlock::getComponent()"
            :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData[$type]))"
        />
        {{-- @dd($component) --}}
        @endisset
{{-- <!-- Contact End -->  --}}

{{-- @endsection --}}
        </div>


        {{-- <!-- Footer Start --> --}}
        @php
        $type = "play.footer";
        $blockData = PageModel::getBlocks($page->id, $type);
        if($blockData->count() > 0){
            $pageBlock = \Z3d0X\FilamentFabricator\Facades\FilamentFabricator::getPageBlockFromName($type);
        }else{
            $pageBlock = null;
        }
        @endphp
        @isset($pageBlock)
        <x-dynamic-component
            :component="$pageBlock::getComponent()"
            :attributes="new \Illuminate\View\ComponentAttributeBag($pageBlock::mutateData($blockData[$type]))"
        />
        {{-- @dd($component) --}}
        @endisset
        {{-- <!-- Footer End --> --}}

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 right-5 size-8 text-center bg-orange-600 text-white leading-8"><i class="mdi mdi-arrow-up"></i></a>
        <!-- Back to top -->

        <!-- Switcher -->
        <div class="fixed top-1/4 -right-2 z-3">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" />
                <label class="label bg-slate-900 dark:bg-white shadow-sm dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                    <i class="uil uil-moon text-[20px] text-yellow-500"></i>
                    <i class="uil uil-sun text-[20px] text-yellow-500"></i>
                    <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] size-7"></span>
                </label>
            </span>
        </div>
        <!-- Switcher -->

        <!-- LTR & RTL Mode Code -->
        {{-- <div class="fixed top-1/3 -right-3 z-50">
            <a href="" id="switchRtl">
                <span class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 text-slate-900 dark:text-white shadow-md dark:shadow-sm dark:shadow-gray-800 font-semibold rtl:block ltr:hidden">LTR</span>
                <span class="py-1 px-3 relative inline-block rounded-t-md -rotate-90 bg-white dark:bg-slate-900 text-slate-900 dark:text-white shadow-md dark:shadow-sm dark:shadow-gray-800 font-semibold ltr:block rtl:hidden">RTL</span>
            </a>
        </div> --}}
        <!-- LTR & RTL Mode Code -->

        <!-- ====== Back To Top Start -->
    <a
      href="javascript:void(0)"
      class="fixed left-auto items-center justify-center hidden w-10 h-10 text-white transition duration-300 ease-in-out rounded-md shadow-md back-to-top bottom-8 right-8 z-999 bg-primary hover:bg-dark"
    >
      <span
        class="mt-[6px] h-3 w-3 rotate-45 border-l border-t border-white"
      ></span>
    </a>
    <!-- ====== Back To Top End -->

        <!-- JAVASCRIPTS -->
        <script src="{{ asset('templates/play/assets/js/wow.min.js') }}"></script>
        <script>
            new WOW().init();
        </script>
        <script src="{{ asset('templates/play/assets/js/main.js') }}"></script>
        <script src="{{ asset('templates/play/assets/js/swiper-bundle.min.js') }}"></script>
        <!-- JAVASCRIPTS -->

    <script>
      // ==== for menu scroll
      const pageLink = document.querySelectorAll(".ud-menu-scroll");

      pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
          e.preventDefault();
          document.querySelector(elem.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
            offsetTop: 1 - 60,
          });
        });
      });

      // section menu active
      function onScroll(event) {
        const sections = document.querySelectorAll(".ud-menu-scroll");
        const scrollPos =
          window.pageYOffset ||
          document.documentElement.scrollTop ||
          document.body.scrollTop;

        for (let i = 0; i < sections.length; i++) {
          const currLink = sections[i];
          const val = currLink.getAttribute("href");
          const refElement = document.querySelector(val);
          const scrollTopMinus = scrollPos + 73;
          if (
            refElement.offsetTop <= scrollTopMinus &&
            refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
          ) {
            document
              .querySelector(".ud-menu-scroll")
              .classList.remove("active");
            currLink.classList.add("active");
          } else {
            currLink.classList.remove("active");
          }
        }
      }

      window.document.addEventListener("scroll", onScroll);

      // Testimonial
      const testimonialSwiper = new Swiper(".testimonial-carousel", {
        slidesPerView: 1,
        spaceBetween: 30,

        // Navigation arrows
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },

        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1280: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
        },
      });
    </script>
    </body>
</html>