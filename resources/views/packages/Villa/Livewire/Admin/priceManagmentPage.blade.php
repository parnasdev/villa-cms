<div>
    {{--@dd($calenderData)--}}
    @if(session()->has('message'))
        {{ session('message')['title'] }}
    @endif
    <div class="calender" x-data="{
        calenders: @entangle('calenderData'),
        month: @entangle('currentMonth'),
        year: @entangle('currentYear'),
        dayIn: null,
        dayOut: null,
        datesSelected: @entangle('datesSelected'),
        init() {
            this.getCa()
        },
        getCa() {
            $wire.getCalender($wire.residenceData).then(result  => {
                this.calenders = JSON.parse(result) ;
                this.month = this.calenders.month;
                this.year = this.calenders.year;
            })
        },
        itemClicked(data) {
            $wire.itemClicked(JSON.stringify(data))
        },
        nextMonth() {
        $wire.nextMonth().then(result => this.getCa())},
        previousMonth() {
        $wire.previousMonth().then(result => this.getCa())
    },
    onItemClicked(index) {
   if (index) {
    this.datesSelected = [];
    if (!this.dayIn && !this.dayOut) {
        this.dayIn = index
    }else if (this.dayIn && !this.dayOut) {
        this.dayOut = index;
        $wire.getDates(this.dayIn , this.dayOut);

    }else {
        this.dayIn = index;
        this.dayOut = null;
   }
   }else {
   alert('امکان قیمت گذاری در این تاریخ وجود ندارد.');
   }
   },getDates(e) {
        this.calenders = JSON.parse(e.detail);
   }
   }
" @send-data.window="getDates">
        <div class="header-calender">
            <div class="month-prev">
                <svg id="Outline" viewBox="0 0 24 24" width="22" height="22">
                    <path
                        d="M7,24a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42l8.17-8.17a3,3,0,0,0,0-4.24L6.29,1.71A1,1,0,0,1,7.71.29l8.17,8.17a5,5,0,0,1,0,7.08L7.71,23.71A1,1,0,0,1,7,24Z"/>
                </svg>
                <span class="text-month-prev" @click="previousMonth()">ماه قبل</span>
            </div>
            <div class="date-header">
                <strong>{{ $months->firstWhere('id' , $currentMonth ?? 1)['text'] }}</strong>
                <strong class="years"> {{$currentYear}}</strong>
            </div>
            <div class="month-next">
                <a class="text-month-next" @click="nextMonth()">ماه بعد</a>
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
                <template x-for="(x , index) in calenders?.dates">
                    <div class="item-number-day" :class="{'date-selected' : datesSelected.includes(index),'date-dayIn' : dayIn === index,'date-dayOut':dayOut === index}"
                         @click="x.status === 'Disabled' || x.status === 'Hidden' ? onItemClicked(null) :onItemClicked(index)">
                        <template x-if="x.isToday">
                            <label class="active-day" for="">امروز</label>
                        </template>

                        <h1 class="number" :class="{ 'text-danger' : x.isHolyDay  }"
                            x-text="x.dateFa.split('-')[2]"></h1>
                        {{--                            <small style="font-size: 12px">رزرو شده</small>--}}
                        <div class="price-day">
                            <template x-if="x.data.length > 0 && x.data[0].price">

                                <span x-text="x.data[0].price + ' ' + 'تومان'"></span>
                            </template>
                            <template x-if="x.data.length === 0 || !x.data[0].price">
                                <span>قیمت ندارد</span>
                            </template>

                        </div>
                        <template x-if="x.data.length > 0 && x.data[0].isReserves">

                            <span x-text="'رزرو شده'"></span>
                        </template>
                        <template x-if="x.data.length === 0 || !x.data[0].isReserves">

                            <small x-text="'رزرو نشده'"></small>
                        </template>
                        <template x-if="x.status === 'Disabled' || x.status === 'Hidden'">
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
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>
    <form wire:submit.prevent="submit">

        <input type="text" wire:model="price" placeholder="قیمت خود را وارد کنید">
        <button type="submit">ثبت قیمت</button>
    </form>


</div>
