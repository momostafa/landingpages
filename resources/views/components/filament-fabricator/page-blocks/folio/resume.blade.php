@aware(['page'])
@props(['resume'])
@php 
// 
@endphp
@if($resume['is_active'])

            <div class="relative mx-auto max-w-container xl:max-2xl:max-w-65rem *:py-5 xl:*:py-3.5 *:max-w-content max-xl:*:mx-auto xl:*:ml-auto xl:max-2xl:*:max-w-50rem">

                            <!-- My Resume Section Start -->
                <div data-scroll-index="4" id="resume">

                    <div class="resume-section px-5 py-8 md:p-8 bg-white dark:bg-nightBlack rounded-2xl lg:p-10 2xl:p-13">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 text-xs tracking-wide text-black dark:text-white border lg:px-5 section-name border-platinum dark:border-greyBlack200 rounded-4xl">
                            <i class="fal fa-folder-open text-theme"></i>
                            {{ $resume['section_header'] }}
                        </div>
                        <div class="mb-8 mt-7 md:my-10 section-title">
                            <h2
                                class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                                @php $experince_header = explode(' ', $resume['experience_header']) @endphp
                                {{ $experince_header[0] }} <span class="font-semibold text-theme">{{ $experince_header[1] }}</span>
                            </h2>
                            <p class="max-w-xl mt-4 md:mt-6 subtitle">
                                {{ $resume['experience_description'] }}
                            </p>
                        </div><!--./section-title-->

                        <!-- Work Experience Start -->
                        <div class="experience">
                            <ul
                                class="space-y-5 md:space-y-11 relative md:before:content-[''] md:before:absolute md:before:left-64 md:before:border-r md:before:border-platinum md:dark:before:border-metalBlack md:before:h-[calc(100%_-1.5rem)] md:before:top-1/2 md:before:-translate-y-1/2 *:p-5 *:border *:rounded-xl md:*:flex max-md:*:space-y-2 *:border-platinum dark:*:border-metalBlack md:*:border-0 md:*:p-0 md:*:rounded-none">
                            @foreach($resume['experience'] as $experience)
                                <li>
                                    <div class="flex items-center justify-between mb-5 md:w-64 md:block md:mb-0">
                                        <h6
                                            class="text-sm font-medium text-black dark:text-white text-opacity-60 md:text-base md:text-opacity-100">
                                            {{ $experience['company'] }}
                                        </h6>
                                        <p class="text-[13px] md:text-sm text-theme">
                                            {{ $experience['period'] }}
                                        </p>
                                    </div>
                                    <div
                                        class="md:flex-1 md:pl-16 relative md:before:content-[''] md:before:absolute md:before:-left-1 md:before:top-3 md:before:w-2 md:before:h-2 md:before:bg-theme md:before:rounded-full md:before:shadow-dots_glow">
                                        <h4
                                            class="text-xl xl:text-2xl font-medium xl:font-medium leading-7 text-black dark:text-white mb-2.5">
                                            {{ $experience['position'] }}
                                        </h4>
                                        <p>
                                            {{ $experience['description'] }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        <!-- Work Experience End -->
                        <br>
                        <!-- Education section Header & Description Start -->
                        <div class="mb-8 mt-7 md:my-10 section-title">
                            <h2
                                class="title text-[32px] md:text-4xl lg:text-5xl font-extralight text-black dark:text-white leading-1.27">
                                @php $education_header = explode(' ', $resume['education_header']) @endphp
                                {{ $education_header[0] }} <span class="font-semibold text-theme">{{ $education_header[1] }}</span>
                            </h2>
                            <p class="max-w-xl mt-4 md:mt-6 subtitle">
                                {{ $resume['education_description'] }}
                            </p>
                        </div>
                        <!-- Education section Header & Description End -->

                        <!-- Education Start -->
                        <div class="experience">
                            <ul
                                class="space-y-5 md:space-y-11 relative md:before:content-[''] md:before:absolute md:before:left-64 md:before:border-r md:before:border-platinum md:dark:before:border-metalBlack md:before:h-[calc(100%_-1.5rem)] md:before:top-1/2 md:before:-translate-y-1/2 *:p-5 *:border *:rounded-xl md:*:flex max-md:*:space-y-2 *:border-platinum dark:*:border-metalBlack md:*:border-0 md:*:p-0 md:*:rounded-none">
                            @foreach($resume['education'] as $education)
                                <li>
                                    <div class="flex items-center justify-between mb-5 md:w-64 md:block md:mb-0">
                                        <h6
                                            class="text-sm font-medium text-black dark:text-white text-opacity-60 md:text-base md:text-opacity-100">
                                            {{ $education['school'] }}
                                        </h6>
                                        <p class="text-[13px] md:text-sm text-theme">
                                            {{ $education['period'] }}
                                        </p>
                                    </div>
                                    <div
                                        class="md:flex-1 md:pl-16 relative md:before:content-[''] md:before:absolute md:before:-left-1 md:before:top-3 md:before:w-2 md:before:h-2 md:before:bg-theme md:before:rounded-full md:before:shadow-dots_glow">
                                        <h4
                                            class="text-xl xl:text-2xl font-medium xl:font-medium leading-7 text-black dark:text-white mb-2.5">
                                            {{ $education['degree'] }}
                                        </h4>
                                        <p>
                                            {{ $education['description'] }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        <!-- Education End -->
                    </div>

                </div>
                <!-- My Resume Section End -->

            </div>
@endif
