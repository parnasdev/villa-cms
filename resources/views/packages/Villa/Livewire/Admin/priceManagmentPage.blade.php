{{--@dd($calenderData)--}}

<div class="calender">
    <div class="header-calender">
        <div class="month-prev">
            <svg id="Outline" viewBox="0 0 24 24" width="22" height="22">
                <path
                    d="M7,24a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42l8.17-8.17a3,3,0,0,0,0-4.24L6.29,1.71A1,1,0,0,1,7.71.29l8.17,8.17a5,5,0,0,1,0,7.08L7.71,23.71A1,1,0,0,1,7,24Z"/>
            </svg>
            <span class="text-month-prev" wire:click="previousMonth()">ماه قبل</span>
        </div>
        <div class="date-header">
            <strong>{{ $months->firstWhere('id' , $currentMonth ?? 1)['text'] }}</strong>
            <strong class="years">1400</strong>
        </div>
        <div class="month-next">
            <span class="text-month-next" wire:click="nextMonth()">ماه بعد</span>
            <svg id="Outline" viewBox="0 0 24 24" width="22" height="22">
                <path
                    d="M7,24a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42l8.17-8.17a3,3,0,0,0,0-4.24L6.29,1.71A1,1,0,0,1,7.71.29l8.17,8.17a5,5,0,0,1,0,7.08L7.71,23.71A1,1,0,0,1,7,24Z"/>
            </svg>
        </div>
    </div>
    <div class="body-calender">
        <div class="week-header">
            <label for="">شنبه</label>
            <label for="">یکشنبه</label>
            <label for="">دوشنبه</label>
            <label for="">سه شنبه</label>
            <label for="">چهار شنبه</label>
            <label for="">پنج شنبه</label>
            <label for="">جمعه</label>

        </div>
        <div class="week-body">
            @foreach($calenderData->dates as $x)

                    <div class="item-number-day">

                        @if($x->isToday)
                            <label class="active-day" for="">امروز</label>
                        @endif
                        <h1 class="number {{$x->isHolyDay ? 'text-danger' : ''}}">{{explode('-',$x->dateFa)[2]}}</h1>
{{--                            <small style="font-size: 12px">رزرو شده</small>--}}
                        <div class="price-day">
                            <span>0</span>
                            <span>تومان</span>
                        </div>
                            @if($x->status === 'Disabled' || $x->status === 'Hidden')
                                <div class="disable-day">
                                    <div class="linear-disable"></div>
                                    <div class="linear-disable"></div>
                                    <div class="linear-disable"></div>
                                    <div class="linear-disable"></div>
                                    <div class="linear-disable"></div>
                                    <div class="linear-disable"></div>
                                    <div class="linear-disable"></div>
                                    <div class="linear-disable"></div>
                                    <div class="linear-disable"></div>
                                </div>
                            @endif
                    </div>
            @endforeach


        </div>
    </div>
</div>

