<?php

namespace Packages\Villa\src\Http\Livewire\Admin;


use Livewire\Component;
use Packages\Villa\src\Models\Residence;

class PriceManagement extends Component
{
    public Residence $residence;

    public function mount()
    {
    }

    public function render()
    {
     $calenderData =$this->getCalender();
        return view('Villa::Livewire.Admin.PriceManagementPage', compact('calenderData'));
    }

    public function getCalender()
    {
        $req = [
            'year' => null ,
            'month' => null,
            'minDate' => null ,
            'maxDate' => null ,
            'format ' => 15,
            'data' => [
        [
            'date'=> '1400-10-12',
            'items'=> [
            'description'=> 'test1'
            ]
        ],
        [
            'date'=> '1400-10-12',
            'items'=> [
            'description'=> "test2"
            ]
        ]
    ],


        ];
        return apiService()->getCalender($req);
    }
}
