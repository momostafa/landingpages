@aware(['page'])
@props(['navbar' => null])

@php
    use Illuminate\Support\Str;

    $currentLang = request()->query('lang') === 'ar' ? 'ar' : 'en';
    $suffix = ":{$currentLang}";
    $navbar = collect($navbar)->mapWithKeys(function ($value, $key) use ($suffix) {
        if (Str::endsWith($key, $suffix)) {
            return [Str::before($key, ':') => $value];
        }

        return !Str::contains($key, ':') ? [$key => $value] : [];
    })->toArray();
    if ($currentLang == 'ar'){
        $account = "حسابي";
    }
    else{
        $account = "Account";
    }

@endphp

<style>
    @if($currentLang == 'ar')
    .rtl-header-fix {
        direction: ltr !important;
    }
    .rtl-header-fix * {
        direction: rtl; /* Keeps text inside readable in Arabic */
    }
/* Responsive Explicit RTL custom overrides */
    .navbarTogglerRtl {
        @media (width >= 440px) {
        right: 240px !important;
        left: 4rem !important;
        }
        @media (width <= 400px) {
        right: 170px !important;
        left: auto !important;
        }

    }
    .switchersRtl {
        padding-right: 4rem !important;
        padding-left: 0 !important;
        justify-content: flex-end !important;
    }
    @endif
</style>

{{-- @dd($navbar) --}}
@if($navbar['is_active'] ?? false)
<div class="absolute top-0 left-0 z-40 flex items-center w-full bg-transparent ud-header">
    <div class="container px-4 mx-auto">
        <div class="relative flex items-center justify-between -mx-4">
                <div class="max-w-full px-4 w-60">
                    <a href="{{ url('/'.$page->slug) }}" class="block w-44 shrink-0 py-5 navbar-logo sm:w-52">
                    <img src="{{ asset($navbar['logo_dark']) }}" alt="{{ config('app.name') }}" class="hidden w-full dark:block">
                    <img src="{{ asset($navbar['logo_light']) }}" alt="{{ config('app.name') }}" class="w-full dark:hidden">
                    </a>
                </div>
            <div class="flex items-center justify-between w-full px-4">
                <div>
                    <button id="navbarToggler" class="absolute {{ $currentLang == 'en' ? 'right-4' : 'navbarTogglerRtl' }} top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                    </button>
                    <nav id="navbarCollapse" class="absolute {{ $currentLang == 'en' ? 'right-4' : 'left-4' }} top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:bg-dark-2 lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:px-4 lg:py-0 lg:shadow-none dark:lg:bg-transparent xl:px-6">
                        <ul class="block lg:flex items-center gap-x-6 2xl:ml-20">
                            @foreach($navbar['menu_items'] ?? [] as $menu_item)
                                @if($menu_item['is_active'])
                                    <li>
                                        {{-- Added whitespace-nowrap to prevent multi-word items from wrapping --}}
                                        <a href="{{ $menu_item['title_link'] }}" class="flex py-2 mx-8 text-base font-medium ud-menu-scroll text-dark group-hover:text-primary dark:text-white lg:mr-0 lg:inline-flex lg:px-0 lg:py-6 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 whitespace-nowrap">
                                            {{ $menu_item['title'] }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                            <li class="relative submenu-item group">
                            <a
                            href="javascript:void(0)"
                            class="relative flex items-center justify-between py-2 mx-8 text-base font-medium text-dark group-hover:text-primary dark:text-white lg:ml-8 lg:mr-0 lg:inline-flex lg:py-6 lg:pl-0 lg:pr-4 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-10 whitespace-nowrap"
                            >
                            {{ $account }}

                            <svg
                                class="ml-2 fill-current"
                                width="16"
                                height="20"
                                viewBox="0 0 16 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                d="M7.99999 14.9C7.84999 14.9 7.72499 14.85 7.59999 14.75L1.84999 9.10005C1.62499 8.87505 1.62499 8.52505 1.84999 8.30005C2.07499 8.07505 2.42499 8.07505 2.64999 8.30005L7.99999 13.525L13.35 8.25005C13.575 8.02505 13.925 8.02505 14.15 8.25005C14.375 8.47505 14.375 8.82505 14.15 9.05005L8.39999 14.7C8.27499 14.825 8.14999 14.9 7.99999 14.9Z"
                                />
                            </svg>
                            </a>
                                <div
                                    class="submenu relative rounded-full left-0 top-full hidden w-[250px] rounded-xl bg-white p-4 transition-[top] duration-300 group-hover:opacity-100 dark:bg-dark-2 lg:invisible lg:absolute lg:top-[110%] lg:block lg:opacity-0 lg:shadow-lg lg:group-hover:visible lg:group-hover:top-full"
                                >
                                    @if(!empty($navbar['signin_text']))
                                        <a href="{{ $navbar['signin_link'] ?? '#' }}"
                                            class="block text-center rounded-sm px-3 py-[14px] text-sm text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary"
                                        >
                                        {{ $navbar['signin_text'] }}
                                        </a>
                                    @endif
                                    @if(!empty($navbar['signup_text']))
                                        <a href="{{ $navbar['signup_link'] ?? '#' }}"
                                            class="block text-center rounded-sm px-3 py-[14px] text-sm text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary"
                                        >
                                        {{ $navbar['signup_text'] }}
                                        </a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="flex items-center {{ $currentLang == 'en' ? 'justify-end pr-16 lg:pr-0' : 'rtl-switchers lg:pl-0' }}" >
                    <div class="flex items-center rounded-full border border-white/20 bg-white/10 px-2 py-1" role="group" aria-label="{{ __('Language') }}">
                        <button type="button" onclick="setLanguage('en')" class="rounded-full px-2 py-1 text-xs font-bold text-dark dark:text-white hover:bg-white/10" aria-label="{{ __('English') }}">EN</button>
                        <span class="text-white/50" aria-hidden="true">/</span>
                        <button type="button" onclick="setLanguage('ar')" class="rounded-full px-2 py-1 text-xs font-bold text-dark dark:text-white hover:bg-white/10" aria-label="{{ __('Arabic') }}">AR</button>
                    </div>
                        <label for="themeSwitcher" class="inline-flex h-10 w-10 shrink-0 cursor-pointer items-center justify-center rounded-full text-white hover:bg-white/10" aria-label="{{ __('Toggle theme') }}">
                        <input type="checkbox" name="themeSwitcher" id="themeSwitcher" class="sr-only">
                        <span class="text-xl" aria-hidden="true">☾</span>
                        </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
