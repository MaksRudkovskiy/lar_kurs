<div class="w-full h-full block p-10 dark:text-white">
    <div class="flex items-center justify-between">
        <h1 class="text-xl dark:text-white">
            {{__('profile.report_trans')}}
        </h1>
        @if($monthlyData == null || count($monthlyData) === 0)

        @else
        <div>
            <a href="{{ route('export.word') }}" class="dark:text-white block max-w-48 bg-custom-EDF1FF dark:bg-custom-303134 px-4 py-2 rounded text-hover dark:hover:text-custom-4D52BC">{{__('profile.word')}}</a>
        </div>
        @endif
    </div>

    <div class="reports-block overflow-y-auto max-h-790 scrollbar scrollbar-thumb-custom-EDF1FF flex flex-wrap gap-y-12 items-center mt-3 justify-around w-full">
        @if($monthlyData == null || count($monthlyData) === 0)
            <h2 class="text-xl text-center py-8 dark:text-white">{{ __('profile.add_report') }}</h2>
        @else
        @foreach($monthlyData as $monthData)
            <div class="bgEDF1FF dark:bg-custom-171717 dark:text-white p-8 min-h-96 min-w-460 max-w-460">
                <h2 class="">{{__('profile.trans_report')}}{{ $monthData['month'] }}</h2>               
                <div class="mt-3">
                    <div class="flex items-center justify-between text-center">
                        <div class="grid grid-cols-3 w-full">
                            @foreach($monthData['categoriesSums'] as $categoryId => $sum)
                                <div class="flex items-center gap-3 mt-5">
                                    @if(isset($icons[$categoryId]))
                                        <img src="{{ asset("content/img/{$icons[$categoryId]}") }}" alt="" class="w-8 dark:hidden">
                                        <img src="{{ asset("content/img-dark/{$icons[$categoryId]}") }}" alt="" class="w-8 hidden dark:block">
                                    @else
                                        @foreach($custom_categories as $custom_category)
                                            @if($custom_category->id == $categoryId)
                                        <svg class="max-w-8 max-h-8">
                                            <title>{{$custom_category->custom_category_name}}</title>
                                            {!! $custom_category->icon !!}
                                        </svg>
                                            @endif
                                        @endforeach
                                    @endif
                                    <p> {{ $sum }} {{__('profile.r')}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>