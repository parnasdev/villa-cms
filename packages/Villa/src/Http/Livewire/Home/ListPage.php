<?php

namespace Packages\Villa\src\Http\Livewire\Home;

use Livewire\Component;
use Packages\Villa\src\Models\Residence;

class ListPage extends Component
{
    public $url = null;
    public $city = null;
    protected $queryString = ['city' => ['except' => null]];




    public function render()
    {
        if($this->city) {
            $residences = Residence::query()->where('status_id', 1)->where('city_id',$this->city)->get();
        }else {
            $residences = Residence::query()->where('status_id', 1)->get();

        }

        return view('Villa::Livewire.Home.listPage', compact('residences'));
    }
}
