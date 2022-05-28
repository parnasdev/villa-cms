<?php

namespace Packages\Villa\src\Http\Livewire\Home;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Packages\Villa\src\Models\Residence;

class ListPage extends Component
{
    public $url = null;
    public $city = null;
    public $startDate = null;
    public $endDate = null;
    protected $queryString = [
        'city' => ['except' => null] ,
        'startDate' => ['except' => null , 'as' => 'start'],
        'endDate' => ['except' => null , 'as' => 'end']
    ];




    public function render()
    {

        if($this->city) {
            $residences = Residence::query()
                ->join('residence_dates' , 'residence_dates.residence_id' , '=', 'residences.id')
                ->select('residences.*')
                ->groupBy('residences.id')
                ->whereBetween('residence_dates.date' , [$this->startDate , $this->endDate])
                ->where('status_id', 1)
                ->where('city_id',$this->city)
            ->get();
        }else {
            $residences = Residence::query()
                ->join('residence_dates' , 'residence_dates.residence_id' , '=', 'residences.id')
                ->select('residences.*')
                ->groupBy('residences.id')
                ->whereBetween('residence_dates.date' , [$this->startDate , $this->endDate])
                ->where('status_id', 1)->get();
        }

        return view('Villa::Livewire.Home.listPage', compact('residences'));
    }
}
