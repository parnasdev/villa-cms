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
                                @error('req.status_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
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
                                        @error('req.title')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror

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
                                                @error('req.mobile')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
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
                                        @error('req.description')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror

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
                <select
                    class="valid"
                    id="Capacity"
                    wire:model="req.province_id"
                    name="Capacity">
                    @foreach($provinces as $p)
                        <option value="{{$p->id}}">{{$p->title}}</option>
                    @endforeach

                </select>

                @error('req.province_id')
                <p >{{ $message }}</p>
                @enderror
                <select
                    class="valid"
                    id="Capacity"
                    wire:model="req.city_id"
                    name="Capacity">
                    @foreach($cities as $c)
                        <option value="{{$c->id}}">{{$c->title}}</option>
                    @endforeach

                </select>
                @error('req.city_id')
                <p >{{ $message }}</p>
                @enderror
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
                                @error('req.address')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

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
                                        @error('req.land_rea')

                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
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
                                            @error('req.building_area')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
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
                                            @error('req.max')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
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
                                            @error('req.room_count')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
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
                            <ul class="list-unstyled list-inline">

                                @foreach($files->where('type' , 2) as $key => $_file)
                                    <li class="list-inline-item">
                                        <img src="{{ $_file['url'] }}" width="80" alt="{{ $_file['alt'] }}">
                                        <x-parnas.buttons.button type="button"
                                                                 class="btn btn-sm btn-danger"
                                                                 wire:click="deleteFile({{ $key }})"
                                                                 wire:loading.attr="disabled" wire:target="deleteFile">
                                            <i class="fas fa-times"></i>
                                        </x-parnas.buttons.button>
                                        <x-parnas.buttons.button type="button"
                                                                 class="btn btn-sm btn-primary"
                                                                 wire:click="editFile({{ $key }})"
                                                                 wire:loading.attr="disabled" wire:target="deleteFile , editFile">
                                            <i class="fas fa-edit"></i>
                                        </x-parnas.buttons.button>
                                    </li>
                                @endforeach


                                <div class="col-md-3">
                                    <x-parnas.inputs.file :file="$file['url']" model="file.url">
                                        @error('file.url')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </x-parnas.inputs.file>
                                    <x-parnas.form-group class="mb-2">
                                        <x-parnas.label class="mb-1" for="alt">متن جایگزین</x-parnas.label>
                                        <x-parnas.inputs.text class="form-control form-control-sm" id="alt"
                                                              wire:model.defer="file.alt"/>
                                        @error('file.alt')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="mb-2">
                                        <x-parnas.label class="mb-1" for="type">نوع</x-parnas.label>
                                        <x-parnas.inputs.select class="form-select form-select-sm" id="type"
                                                                wire:model.defer="file.type">
                                            <x-parnas.inputs.option value="{{ null }}">انتخاب نوع</x-parnas.inputs.option>
                                            <x-parnas.inputs.option value="1">عکس شاخص</x-parnas.inputs.option>
                                            <x-parnas.inputs.option value="2">گالری</x-parnas.inputs.option>
                                            <x-parnas.inputs.option value="3">فایل</x-parnas.inputs.option>
                                        </x-parnas.inputs.select>
                                        @error('file.type')
                                        <p>{{ $message }}</p>
                                        @enderror
                                    </x-parnas.form-group>
                                    <x-parnas.form-group class="mb-2">
                                        <x-parnas.buttons.button class="btn btn-primary btn-sm"
                                                                 type="button" wire:click="upload"
                                                                 wire:loading.attr="disabled" wire:target="upload"
                                        >
                                            ثبت
                                        </x-parnas.buttons.button>
                                        <x-parnas.buttons.button class="btn btn-warning btn-sm"
                                                                 type="button" wire:click="resetForm"
                                                                 wire:loading.attr="disabled" wire:target="resetForm"
                                        >
                                            لغو
                                        </x-parnas.buttons.button>
                                    </x-parnas.form-group>
                                </div>



                            </ul>
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

