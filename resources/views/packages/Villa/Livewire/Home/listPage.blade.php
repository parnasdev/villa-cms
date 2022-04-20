@foreach($residences as $item)
    <!--? child  -->
    <div class="swiper-data swiper-slide bg-white ms-3 mb-3" >
        <div class="over-background"></div>
        <div class="image">
            <img src="/images/pic-01.png" alt="" />
        </div>
        <div class="text data-info d-flex flex-column justify-content-between">
            <div class="up-data">
                <div class="title mb-1">
                    <span class="text-white">{{$item->title}}</span>
                </div>
                <div class="paragraph">
                    <span style="color: white">تاریخ ایجاد :</span>
                    <p class="text-white">
                        {{jdate($item->created_at)->format('Y-m-d')}}
                    </p>
                </div>
                <div class="text">
                    <p class="text-white">{{collect(config('vila.types'))->firstWhere('id',$residence->specifications['type']??0)['title']??''}}</p>
                </div>
            </div>
            <div class="price d-flex justify-content-end">
                <a href="/info/{{$item->id}}">جزییات</a>
            </div>
        </div>
    </div>
@endforeach
