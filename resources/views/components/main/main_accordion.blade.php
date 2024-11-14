<div id="accordion-collapse" data-accordion="collapse" class="flex flex-col w-1/2 justify-between adapt-block-collapse">

    <div class="px-6 bgcC1CFFF w-full mt-3 dark:bg-custom-303134">
        <h2 id="accordion-collapse-heading-1 w-full" class="">
            <button type="button" class="flex justify-between w-full pt-6 pb-6 dark:bg-custom-303134 active:bg-custom-303134 focus:bg-custom-303134" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true">
                <span class="font-medium text-lg">{{__('main.integration')}}</span>
                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-1" class="hidden dark:text-white pb-6" aria-labelledby="accordion-collapse-heading-1">
            {{__('main.nah')}}
        </div>
    </div>

    <div class="px-6 bgcC1CFFF w-full mt-3 dark:bg-custom-303134">
        <h2 id="accordion-collapse-heading-2 w-full">
            <button type="button" class="flex justify-between w-full pt-6 pb-6" data-accordion-target="#accordion-collapse-body-2" aria-expanded="true">
                <span class="font-medium text-lg">{{__('main.why')}}</span>
                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-2" class="hidden pb-6 dark:text-white" aria-labelledby="accordion-collapse-heading-1">
            {{__('main.no_point')}}
        </div>
    </div>

    <div class="px-6 bgcC1CFFF w-full mt-3 dark:bg-custom-303134">
        <h2 id="accordion-collapse-heading-3 w-full">
            <button type="button" class="flex justify-between w-full pt-6 pb-6" data-accordion-target="#accordion-collapse-body-3" aria-expanded="true">
                <span class="font-medium text-lg">{{__('main.many_inputs')}}</span>
                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-3" class="hidden pb-6 dark:text-white" aria-labelledby="accordion-collapse-heading-1">
            {{__('main.necessary')}} <span class="c4D52BC">{{__('main.useful')}}</span> {{__('main.content')}}
        </div>
    </div>

</div>