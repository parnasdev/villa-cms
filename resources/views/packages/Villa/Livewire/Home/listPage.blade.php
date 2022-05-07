{{--@foreach($residences as $item)--}}
{{--    <!--? child  -->--}}
{{--    <div class="swiper-data swiper-slide bg-white ms-3 mb-3" >--}}
{{--        <div class="over-background"></div>--}}
{{--        <div class="image">--}}
{{--            <img src="/images/pic-01.png" alt="" />--}}
{{--        </div>--}}
{{--        <div class="text data-info d-flex flex-column justify-content-between">--}}
{{--            <div class="up-data">--}}
{{--                <div class="title mb-1">--}}
{{--                    <span class="text-white">{{$item->title}}</span>--}}
{{--                </div>--}}
{{--                <div class="paragraph">--}}
{{--                    <span style="color: white">تاریخ ایجاد :</span>--}}
{{--                    <p class="text-white">--}}
{{--                        {{jdate($item->created_at)->format('Y-m-d')}}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="text">--}}
{{--                    <p class="text-white">{{collect(config('vila.types'))->firstWhere('id',$residence->specifications['type']??0)['title']??''}}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="price d-flex justify-content-end">--}}
{{--                <a href="/info/{{$item->id}}">جزییات</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}


<div style="padding-top: 5rem">
    <div class="prs-responsive">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 title-villa-main">
                    <h5>دیگران کجاها سفر می کنند</h5>
                    <h2>پرطرفدارترین شهرهای ایران</h2>
                </div>
                <div class="col-md-12 villa-list-index">
                    @foreach($residences as $item)
                        <div class="item-villa-index">
                            <div class="city-villa-fix">
                                {{$item->province()->first()->title}}،{{$item->city()->first()->title}}
                            </div>
                            <img class="img-villa-index" src="{{$item->residenceFiles()->first()->url}}" alt="">
                            <h2 class="title-villa-index"><a href="">{{$item->title}}</a></h2>
                            <div class="price-villa-index">
                                <div>
                                    {{--                                    <span>شروع از</span>--}}
                                    <span> {{collect(config('vila.types'))->firstWhere('id',$item->specifications['type']??0)['title']??''}}
</span>
                                </div>
                                <a class="btn-details-villa" href="/info/{{$item->id}}">جزییات ویلا</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
