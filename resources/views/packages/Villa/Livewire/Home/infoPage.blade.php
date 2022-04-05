<div x-data="{
        calenders: @entangle('calenderData'),
        month: @entangle('currentMonth'),
        year: @entangle('currentYear'),
        dayIn: null,
        dayOut: null,
        datesSelected: @entangle('datesSelected'),
        init() {
            this.getCa()
        },
        checkReservedInDates()
    {
    if (this.dayOut.dateEn < this.dayIn.dateEn) {
    alert('تاریخ انتخابی نامعتبر است.');
    this.dayIn = null;
    this.dayOut = null;
    }else {
        for (let i=this.findListItemIndex(this.dayIn);i<= this.findListItemIndex(this.dayOut);i++) {
              if (this.calenders.dates[i].data.length > 0 && !this.calenders.dates[i].data[0].isReserved) {
             } else {
            this.dayOut = this.calenders.dates[i];
            alert('بین روزهای انتخابی شما روز غیرقابل رزرو وجود دارد.')
            break;
           }
        }
        }
    },
        getCa() {
            $wire.getCalender($wire.residenceData).then(result  => {
                this.calenders = JSON.parse(result) ;
                console.log(JSON.parse(result))
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
    onItemClicked(dateItem = null) {
   if (dateItem) {
    this.datesSelected = [];
    if (!this.dayIn && !this.dayOut) {
        this.dayIn = dateItem
    }else if (this.dayIn && !this.dayOut) {
        this.dayOut = dateItem;
        this.checkReservedInDates();
        $wire.getDates(this.dayIn , this.dayOut).then(result => {
        this.datesSelected = JSON.parse(result);

        });
    }else {
        this.dayIn = dateItem;
        this.dayOut = null;
   }
   }else {
   alert('امکان رزرو در این تاریخ وجود ندارد.');
   }
   },getDates(e) {
  console.log(JSON.parse(e.detail))
        this.calenders = JSON.parse(e.detail);
   },
   isItemExistToSelected(item) {
           return this.datesSelected.filter(x => x.dateEn === item.dateEn)

   },findListItemIndex(item) {
   console.log(this.calenders.dates.findIndex(x => x.dateEn === item.dateEn))
           return this.calenders.dates.findIndex(x => x.dateEn === item.dateEn);

   },
   getIsDaysGone(dateItem) {
 return dateItem.status === 'Disabled' || dateItem.status === 'Hidden'
        }
   }
" @send-data.window="getDates">
    <!--? section 1 -->
    <div class="section-gallery my-2">
        <div class="container-fluid">
            <div class="row">
                <div class="gallery d-flex flex-wrap col-xl-12 col-lg-12">
                    <div class="galleryR col-xl-6 col-lg-6 col-12 p-1">
                        <div class="groupgallery col-xl-12 col-lg-12">
                            <div class="image col-xl-12 col-lg-12">
                                <img src={{$files->first()->url}} width="100%" height="550px" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="galleryL col-xl-6 col-lg-6 col-12 p-1">
                        <div class="groupgallery col-xl-12 col-lg-12 d-flex flex-wrap">
                            @foreach($files as $file)
                                <div class="image col-xl-6 col-lg-6 col-6 p-1 pb-2">
                                    <img src="{{$file->url}}" width="100%" height="265px" alt=""/>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--? section 2 -->
    <section class="section-detailCard my-2">
        <div class="container">
            <div class="row">
                <div
                    class="p-detailCard d-flex flex-wrap align-items-start justify-content-between col-xl-12 col-lg-12">
                    <div class="detailRight col-xl-8 col-lg-8 col-12 py-2 px-2">
                        <div class="title pb-2 px-2">
                            <h6>{{$residence->title}}</h6>
                            <span>{{$city->first()->title}} - {{$province->first()->title}}</span>
                        </div>
                        <!--! border bottom  -->
                        <div class="border-bottom"></div>
                        <!--? row box  -->
                        <div class="infoT my-3">
                            <!--? child -->
                            <div class="c-infoT py-1 px-2">
                                <div class="title">
                                    <h6 class="mb-0">آدرس</h6>
                                </div>
                                <div class="text">
                                    {{--                                <ul class="pt-2">--}}
                                    {{--                                    <li class="text-black-50">2 خوابه</li>--}}
                                    {{--                                    <li class="text-black-50">2 سرویس بهداشتی</li>--}}
                                    {{--                                    <li class="text-black-50">2 تخته</li>--}}
                                    {{--                                </ul>--}}
                                    <span class="pt-2">{{$residence->address}}</span>
                                </div>
                            </div>
                            <!--? child -->
                            <div class="c-infoT py-1 px-2">
                                <div class="title">
                                    <h6 class="mb-0">تعداد اتاق</h6>
                                </div>
                                <div class="text">
                                    {{--                                <ul class="pt-2">--}}
                                    {{--                                    <li class="text-black-50">هزینه هر نفر اضافه 450٫000 تومان</li>--}}
                                    {{--                                </ul>--}}
                                    <span class="pt-2">{{$residence->room_count}}</span>

                                </div>
                            </div>
                            <!--? child -->
                            <div class="c-infoT py-1 px-2">
                                <div class="title">
                                    <h6 class="mb-0">مساحت زمین</h6>
                                </div>
                                <div class="text">
                                    {{--                                <ul class="pt-2">--}}
                                    {{--                                    <li class="text-black-50">تحویل کلید از 14:00 تا 00:00</li>--}}
                                    {{--                                </ul>--}}
                                    <span class="pt-2">{{$residence->land_area}}</span>

                                </div>
                            </div>
                            <div class="c-infoT py-1 px-2">
                                <div class="title">
                                    <h6 class="mb-0">مساحت بنا</h6>
                                </div>
                                <div class="text">
                                    {{--                                <ul class="pt-2">--}}
                                    {{--                                    <li class="text-black-50">تحویل کلید از 14:00 تا 00:00</li>--}}
                                    {{--                                </ul>--}}
                                    <span class="pt-2">{{$residence->building_area}}</span>

                                </div>
                            </div>
                        </div>
                        <!--! border bottom  -->
                        <div class="border-bottom"></div>
                        <!--? row box  -->
                        <div class="infoT my-3">
                            <!--? child -->
                            <div class="c-infoT py-1 px-2">
                                <div class="title">
                                    <h6 class="mb-0">درباره این مکان</h6>
                                </div>
                                <div class="text">
                                    {{$residence->description}}
                                </div>
                            </div>
                        </div>
                        <!--! border bottom  -->
                        <div class="border-bottom"></div>
                        <!--? row box  -->
                    {{--                    <div class="my-3">--}}
                    {{--                        <!--? data  -->--}}
                    {{--                        <div class="infoT">--}}
                    {{--                            <!--? child -->--}}
                    {{--                            <div class="c-infoT py-1 px-2">--}}
                    {{--                                <div class="title">--}}
                    {{--                                    <h6 class="mb-0">پذیرایی و اتاق‌ها</h6>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="text">--}}
                    {{--                                    <span>برای مشاهده امکانات و سیستم سرمایش و گرمایش هر اتاق، بر روی آن کلیک کنید.</span>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!--? child -->--}}
                    {{--                            <div class="c-infoT py-1 px-2">--}}
                    {{--                                <div class="d-flex mt-1">--}}
                    {{--                                    <div>--}}
                    {{--                                        <div class="title">--}}
                    {{--                                            <h6 class="mb-0">پذیرایی</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="text">--}}
                    {{--                                            <ul class="pt-2">--}}
                    {{--                                                <li class="text-black-50">بدون تخت خواب</li>--}}
                    {{--                                            </ul>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div>--}}
                    {{--                                        <div class="title">--}}
                    {{--                                            <h6 class="mb-0">اتاق خواب</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="text">--}}
                    {{--                                            <ul class="pt-2">--}}
                    {{--                                                <li class="text-black-50">1 تخته دو نفره</li>--}}
                    {{--                                            </ul>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <!--? data  -->--}}
                    {{--                        <div class="infoT">--}}
                    {{--                            <!--? child -->--}}
                    {{--                            <div class="c-infoT py-1 px-2">--}}
                    {{--                                <div class="title">--}}
                    {{--                                    <h6 class="mb-0">سرویس های بهداشتی و حمام</h6>--}}
                    {{--                                </div>--}}
                    {{--                                <div class="text">--}}
                    {{--                                    <span>برای مشاهده امکانات حمام، موقعیت و جزئیات هر سرویس بهداشتی، بر روی آن کلیک کنید.</span>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!--? child -->--}}
                    {{--                            <div class="c-infoT py-1 px-2">--}}
                    {{--                                <div class="d-flex mt-1">--}}
                    {{--                                    <div>--}}
                    {{--                                        <div class="title">--}}
                    {{--                                            <h6 class="mb-0">سرویس بهداشتی</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="text">--}}
                    {{--                                            <ul class="pt-2">--}}
                    {{--                                                <li class="text-black-50"> (داخل حیاط)توالت فرنگی</li>--}}
                    {{--                                            </ul>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div>--}}
                    {{--                                        <div class="title">--}}
                    {{--                                            <h6 class="mb-0">سرویس بهداشتی / حمام</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="text">--}}
                    {{--                                            <ul class="pt-2">--}}
                    {{--                                                <li class="text-black-50">(داخل واحد)1 تخته دو نفره</li>--}}
                    {{--                                            </ul>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <!--! border bottom  -->
                        <div class="border-bottom"></div>
                        <!--? row box  -->
                        <div class="infoT my-3">
                            <!--? child -->
                            <div class="c-infoT py-1 px-2">
                                <div class="title">
                                    <h6 class="mb-0">امکانات</h6>
                                </div>
                                <div class="text">
                                    <ul class="pt-2">
                                        <li class="text-black-50">حمام</li>
                                        <li class="text-black-50">اجاق گاز</li>
                                        <li class="text-black-50">مبلمان</li>
                                        <li class="text-black-50">اسانسور</li>
                                        <li class="text-black-50">تلویزیون</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--! border bottom  -->
                        <div class="border-bottom"></div>
                        <!--? row box  -->
                    </div>
                    <div class="detailLeft col-xl-4 col-lg-4 col-12 sticky-data py-2 px-2">
                        <div class="d-flex flex-column justify-content-between h-100">
                            <!--? up  -->
                            <div class="up d-flex">
                                <div class="text pb-1 w-50">
                                    <span>
                                    تاریخ ورود :
                                </span>

                                    <span>{{count($datesSelected) > 0?$datesSelected[0]['dateFa'] : '---'}}</span>
                                </div>
                                <div class="text pb-1 w-50">
                                    <span>
                                    تاریخ خروج :
                                </span>
                                    <span>{{count($datesSelected) > 0?$datesSelected[count($datesSelected)-1]['dateFa'] : '---'}}</span>
                                </div>
                                <!--! border bottom  -->
                                <div class="border-bottom"></div>
                            </div>
                            <!--? down  -->
                            <div class="down">
                                <ul>
                                    @foreach(($datesSelected) as $dateItem)
                                        <li>
                                            <div class="d-flex">
                                                <span class="w-50">{{$dateItem['dateFa']}}</span>
                                                <div class="w-50">
                                                    @if($loop->index === count($datesSelected)-1)
                                                        <span>رایگان</span>
                                                    @else

                                                        <span>{{number_format(count($dateItem['data'])>0?$dateItem['data'][0]['price']:0 )}}</span>
                                                        <span> تومان</span>
                                                    @endif

                                                </div>
                                            </div>

                                        </li>
                                    @endforeach
                                </ul>
                                <div class="d-flex">
                                    <span class="w-50">قیمت کل:</span>
                                    <div class="w-50">
                                        <span class="w-50">{{$this->getTotalPrice()}}</span>
                                        <span>تومان</span>
                                    </div>

                                </div>

                                <form>
                                    <div class="form-group">
                                        <label for="name">نام سرپرست</label>
                                        <input type="text" wire:model.defer="name" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="family">نام خانوادگی سرپرست</label>
                                        <input type="text" wire:model.defer="family" class="form-control" id="family">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">شماره همراه</label>
                                        <input type="text" wire:model.defer="phone" class="form-control" id="phone">
                                    </div>
                                </form>

                                <div class="ancher-page d-flex justify-content-center">
                                    <button class="btn bg-info mt-2 text-white" wire:click="submit">درخواست رزرو
                                        رایگان
                                    </button>
                                </div>
                                <!--! text -->
                                <div class="text d-flex justify-content-center mt-2">
                                    <span class="f-thin text-warning">یک متن تستی برای راهنمایی می باشد</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{--calender section--}}
    <section>
        <div class="calender">
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

                        <div class="item-number-day"
                             :class="{
                             'date-selected' : isItemExistToSelected(x).length > 0,
                             'date-dayIn' : dayIn === x,
                             'date-dayOut':dayOut === x,
                             'date-disabled': getIsDaysGone(x),
                             'not-set-price':(x.data.length === 0 || !x.data[0].price) && !getIsDaysGone(x)
                             }"

                             @click="(getIsDaysGone(x) || x.data.length === 0) ? onItemClicked(null) :onItemClicked(x)">
                            <template x-if="x.isToday">
                                <label class="active-day" for="">امروز</label>
                            </template>

                            <template x-if="x.data.length > 0 && x.data[0].isReserved && !getIsDaysGone(x)">
                                <label class="reserved" for="">رزرو</label>
                            </template>
                            <template x-if="x.data.length > 0 && !x.data[0].isReserved && !getIsDaysGone(x)">
                                <label class="not-reserved" for="">رزرو نشده</label>
                            </template>

                            <h1 class="number" :class="{ 'text-danger' : x.isHolyDay  }"
                                x-text="x.dateFa.split('-')[2]"></h1>
                            {{--                            <small style="font-size: 12px">رزرو شده</small>--}}
                            <div class="price-day">
                                <template x-if="x.data.length > 0 && x.data[0].price && !getIsDaysGone(x)">

                                    <span x-text="x.data[0].price + ' ' + 'تومان'"></span>
                                </template>
                                <template
                                    x-if="(x.data.length === 0 || !x.data[0].price) && (x.status !== 'Disabled' && x.status !== 'Hidden')">
                                    <span>قیمت ندارد</span>
                                </template>
                            </div>
                            {{--                            <template x-if="x.data.length > 0 && x.data[0].isReserved">--}}

                            {{--                                <span x-text="'رزرو شده'"></span>--}}
                            {{--                            </template>--}}
                            {{--                            <template x-if="x.data.length === 0 || !x.data[0].isReserved">--}}

                            {{--                                <small x-text="'رزرو نشده'"></small>--}}
                            {{--                            </template>--}}
                            <template x-if="x.status === 'Disabled' || x.status === 'Hidden'">
                                <div class="disable-day">
                                    <div class="linear-disable"></div>

                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </section>


</div>
