<form wire:submit.prevent="submit">
{{--    @dd($this->getErrorBag())--}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="Content">
                    <div class="HeaderContent">
                        <h3>اقامتگاهتان را معرفی کنید</h3>
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <x-parnas.form-group class="input-group input-group-sm">
                                    <x-parnas.inputs.select class="form-select" wire:model.defer="req.status_id">
                                        <x-parnas.inputs.option value="{{ null }}">
                                            -
                                        </x-parnas.inputs.option>
                                        @foreach($statuses as $status)
                                            <x-parnas.inputs.option value="{{ $status->id }}">
                                                {{ $status->label }}
                                            </x-parnas.inputs.option>
                                        @endforeach
                                    </x-parnas.inputs.select>

                                </x-parnas.form-group>
                            </div>
                        </div>
                    </div>
                    <div class="SubContent p-2">
                        <form class="form-row">
                            <div class="col-lg-8">
                                <div class="row no-gutters py-2">
                                    <div class="col-lg-4 col-md-4 col-6 p-1">
                                        <label for="">نام اقامتگاه</label>
                                        <x-parnas.inputs.text
                                            wire:model.defer="req.title"
                                            type="text"
                                            placeholder="مثلا :ویلای استخردار متل قو"></x-parnas.inputs.text>

                                    </div>
                                    <div class="col-lg-4 custom-control custom-radio p-1">
                                        <div class="row no-gutters">
                                            <div class="col-lg-12 text-right pr-4">

                                            </div>
                                            <div class="col-lg-12 pr-1">
                                                <input
                                                    type="text"
                                                    wire:model.defer="req.mobile"

                                                    placeholder="تلفن تماس مالک اقامتگاه"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row no-gutters py-2">
                                    <div class="col-lg-12 col-md-12 px-1">
                                        <label for="">توضیحات</label>
                                        <textarea
                                            name=""
                                            wire:model.defer="req.description"

                                            class="border w-100 description text-justify"
                                            id=""
                                            placeholder="توضیحات اقامتگاه ( حداکثر 150 کارکتر ) "
                                        ></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="col-lg-12 col-12 p-0 mb-3">
                                    <label for="">تصویر نمای اقامتگاه</label>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <input
                    placeholder="نام استان"
                    wire:model.defer="req.province_id"
                    aria-label="نام استان"
                />
                <input
                    placeholder="نام شهر"
                    wire:model.defer="req.city_id"
                    aria-label="نام شهر"

                />
                <div class="Content">
                    <div class="HeaderContent">
                        <h3>آدرس ویلا</h3>
                    </div>
                    <div class="SubContent p-2">
                        <div class="row no-gutters">


                            <div class="col-lg-12 col-md-12 mt-1 p-1">
              <textarea
                  name=""
                  class="border w-100"
                  id=""
                  wire:model.defer="req.address"
                  rows="5"
                  placeholder="آدرس کامل اقامتگاه ( آمل-خیابان 1- کوچه 2 -پلاک 110)"></textarea>

                            </div>

                        </div>
                    </div>
                </div>
            </div>


{{--            <div class="col-lg-12">--}}
{{--                <div class="Content">--}}
{{--                    <div class="HeaderContent">--}}
{{--                        <h3>آدرس روی نقشه</h3>--}}
{{--                    </div>--}}
{{--                    <div class="SubContent">--}}
{{--                        <app-get-lat-long (latlng)="getLatlng($event)"></app-get-lat-long>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-12">
                <div class="Content">
                    <div class="HeaderContent">
                        <h3>ظرفیت ویلا</h3>
                    </div>
                    <div class="SubContent p-2">
                        <form class="form-row">
                            <div class="col-lg-3 col-12 Topic1 mb-1">
                                <div class="TopicIcon"><i class="fa fa-archway pr-2"></i></div>
                                <div class="SubTopic w-100">
                                    <div class="row d-flex align-items-center no-gutters">
                                        <div class="col-lg-5 p-1">
                                            <label>متراژ زمین</label>
                                        </div>
                                        <div class="col-lg-7 p-1">
                                            <input
                                                type="number"
                                                min="0"
                                                wire:model.defer="req.land_area"

                                            />

                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center no-gutters">
                                        <div class="col-lg-5 p-1">
                                            <label>متراژ بنا</label>
                                        </div>
                                        <div class="col-lg-7 p-1">
                                            <input
                                                type="number"
                                                min="0"
                                                wire:model.defer="req.building_area"

                                            />

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12 Topic1 mb-1">
                                <div class="TopicIcon"><i class="fa fa-users pr-2"></i></div>
                                <div class="SubTopic w-100">
                                    <div class="row d-flex align-items-center no-gutters">
                                        <div class="col-lg-6 p-1">
                                            <label>ظرفیت</label>
                                        </div>
                                        <div class="col-lg-6 p-1">
                                            <select
                                                class="valid"
                                                id="Capacity"
                                                wire:model.defer="req.max"

                                                name="Capacity">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>20</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                                <option>25</option>
                                                <option>26</option>
                                                <option>27</option>
                                                <option>28</option>
                                                <option>29</option>
                                                <option>30</option>
                                            </select>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-12 Topic1 mb-1">
                                <div class="TopicIcon"><i class="fa fa-bed pr-2"></i></div>
                                <div class="SubTopic w-100">
                                    <div class="row d-flex align-items-center no-gutters">
                                        <div class="col-lg-5 p-1">
                                            <label>تعداد اتاق</label>
                                        </div>
                                        <div class="col-lg-7 p-1">
                                            <select
                                                class="valid"
                                                id="Rooms"
                                                wire:model.defer="req.room_count"

                                                name="Rooms">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="Content">
                    <div class="HeaderContent">
                        <h3>با انتخاب تصاویر مناسب نمایش خوبی از اقامتگاهتان داشته باشید</h3>
                    </div>
                    <div class="SubContent p-2">
                        <div class="images text-center">

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 my-2">
                <div class="row d-flex justify-content-end">
                    <div class="col-6 col-sm-6 col-lg-2 col-md-6 p-1">
                        <button
                            type="submit"
                            class="SubmitButton text-center">

                            ثبت
                        </button>
                    </div>
                    <div class="col-lg-2 p-1">
                        <button class="CancelButton text-center">
                            بازگشت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

