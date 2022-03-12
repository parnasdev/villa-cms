<?php

namespace Packages\Villa\src\Http\Livewire\Admin;

use App\Models\Status;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Packages\Villa\src\Models\Residence;

class AddPage extends Component
{
    public Residence $req;


    public function rules()
    {
        return [
            'req.title' => ['required' , 'string' , 'max:100'],
            'req.slug' => ['nullable' , 'string'  , Rule::unique('req' , 'slug')],
            'req.province_id' => ['required'],
            'req.user_id' => ['required'],
            'req.city_id' => ['required'],
            'req.residence_owner' => [],
            'req.mobile' => ['required'],
            'req.description' => ['nullable' , 'string' , 'max:10000'],
            'req.address' => ['required'],
            'req.coordinates' => [],
            'req.building_area' => ['required'],
            'req.land_area' => ['required'],
            'req.max' => ['required'],
            'req.room_count' => ['required'],
            'req.rules' => [],
            'req.specifications' => [],
            'req.status_id' => ['required'],
        ];
    }


    public function mount()
    {
        $this->req = new Residence([
            'title' => '',
            'slug' => '',
            'province_id' => 0,
            'user_id' => 0,
            'city_id' => 0,
            'residence_owner' => '',
            'mobile' => '',
            'description' => '',
            'address' => '',
            'coordinates' => '',
            'building_area' => '',
            'land_area' => '',
            'max' => '',
            'room_count' => 0,
            'rules' => '',
            'specifications' => [],
            'status_id' => 0,
        ]);
    }

    public function render()
    {
        $statuses = Status::query()->where('type' , 1)->get();

        return view('Villa::Livewire.Admin.AddPage', compact( 'statuses'));
    }


    public function submit()
    {
        $this->validate();
        $this->req->user_id = auth()->id();
        $this->req->residence_owner = 1;
        $this->req->coordinates = [];
        $this->req->save();


        session()->flash('message' , ['title' =>  'ویلای شما با موفقیت اضافه شد' , 'icon' => 'success']);

        return redirect(route('admin.villa.list'));
    }
}
