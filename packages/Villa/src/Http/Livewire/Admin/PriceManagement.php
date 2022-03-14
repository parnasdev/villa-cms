<?php

namespace Packages\Villa\src\Http\Livewire\Admin;


use Livewire\Component;
use Packages\Villa\src\Models\Residence;
use phpDocumentor\Reflection\Types\Integer;

class PriceManagement extends Component
{
    public Residence $residence;
    public int|null $currentMonth = null;
    public int|null $currentYear = null;

    public $months = null;

    public function mount()
    {
        $this->months = collect([
            array('id' => 1 , 'text' => 'فروردین'),
            array('id' => 12 , 'text' => 'اسفند'),
        ]);
    }

    public function render()
    {
        $calenderData = $this->getCalender();
        $this->currentMonth = $calenderData->month;
        $this->currentYear = $calenderData->year;
        return view('Villa::Livewire.Admin.PriceManagmentPage', compact('calenderData'));
    }

    public function getCalender()
    {
        $req = [
            'year' => $this->currentYear,
            'month' => $this->currentMonth,
            'minDate' => jdate()->format('Y-m-d'),
            'maxDate' => null,
            'format ' => 15,
            'data' => []
        ];

        return apiService()->getCalender($req);
    }

    public function previousMonth()
    {
        $this->currentMonth = $this->currentMonth === 1 ? 12 : $this->currentMonth - 1;
        $this->currentYear = $this->currentYear - 1;

    }

    public function nextMonth()
    {
        if ($this->currentMonth === 12) {
            $this->currentYear = $this->currentYear + 1;
            $this->currentMonth = 1;
        } else {
            $this->currentMonth = $this->currentMonth + 1;

        }
    }
}
