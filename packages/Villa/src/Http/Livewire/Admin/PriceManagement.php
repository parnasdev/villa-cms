<?php

namespace Packages\Villa\src\Http\Livewire\Admin;


use Livewire\Component;
use Packages\Villa\src\Models\Residence;

class PriceManagement extends Component
{
    public Residence $residence;
    public int|null $currentMonth = null;
    public int|null $currentYear = null;

    public $dayIn = null;
    public $dayOut = null;
    public $datesSelected = [];
    public $calenderData;

    public $months = null;

    public function mount()
    {
        $this->months = collect([
            array('id' => 1, 'text' => 'فروردین'),
            array('id' => 2, 'text' => 'اردیبهشت'),
            array('id' => 3, 'text' => 'خرداد'),
            array('id' => 4, 'text' => 'تیر'),
            array('id' => 5, 'text' => 'مرداد'),
            array('id' => 6, 'text' => 'شهریور'),
            array('id' => 7, 'text' => 'مهر'),
            array('id' => 8, 'text' => 'آبان'),
            array('id' => 9, 'text' => 'آذر'),
            array('id' => 10, 'text' => 'دی'),
            array('id' => 11, 'text' => 'بهمن'),
            array('id' => 12, 'text' => 'اسفند'),
        ]);
    }

    public function render()
    {

        return view('Villa::Livewire.Admin.PriceManagmentPage');
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

        return json_encode(apiService()->getCalender($req));
    }

    public function previousMonth()
    {
        if ($this->currentMonth === 1) {
            $this->currentYear = $this->currentYear - 1;
            $this->currentMonth = 12;
        } else {
            $this->currentMonth = $this->currentMonth - 1;

        }

    }

    public function itemClicked($date)
    {
        dd($date);
        $item = $this->data->firstWhere('id' , $currentMonth ?? 1)['text'];
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

    public function getDates($index , $index1)
    {
        $this->dayIn = $index;
        $this->dayOut = $index1;
        $this->datesSelected = range($this->dayIn , $this->dayOut);
        dd($this->datesSelected);
    }
}
