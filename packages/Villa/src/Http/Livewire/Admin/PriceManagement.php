<?php

namespace Packages\Villa\src\Http\Livewire\Admin;


use Livewire\Component;
use Packages\Villa\src\Models\Residence;
use Packages\Villa\src\Models\ResidenceDate;

class PriceManagement extends Component
{
    public Residence $residence;
    public int|null $currentMonth = null;
    public int|null $currentYear = null;
    public $residenceData = [];
    public string $price = '';
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
        $calenderDataRes = ResidenceDate::query()->where('residence_id', $this->residence->id)->get();
        foreach ($calenderDataRes as $x) {
            array_push($this->residenceData,
                [
                    'date' => jdate($x->date)->format('Y-m-d'),
                    'items' => [
                        'price' => $x->price
                    ]
                ]);
        }
//        dd($this->residenceData);
        return view('Villa::Livewire.Admin.PriceManagmentPage');
    }

    public function getCalender($data = [])
    {
        $req = [
            'year' => $this->currentYear,
            'month' => $this->currentMonth,
            'minDate' => jdate()->format('Y-m-d'),
            'maxDate' => null,
            'format ' => 15,
            'data' => $data
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
        $item = $this->data->firstWhere('id', $currentMonth ?? 1)['text'];
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


    public function getDates($index, $index1)
    {
        $this->dayIn = $index;
        $this->dayOut = $index1;
        $this->datesSelected = range($this->dayIn, $this->dayOut);
//        dd($this->datesSelected);


    }

    public function submit()
    {
//        $this->validate(['price' => 'required']);
        $calenderRequestData = [];
        if ($this->price !== '') {
            foreach ($this->datesSelected as $itemIndex) {
                ResidenceDate::query()->create([
                    'date' => $this->calenderData['dates'][$itemIndex]['dateEn'],
                    'residence_id' => $this->residence->id,
                    'price' => $this->price
                ]);

                array_push($calenderRequestData,
                    [
                        'date' => $this->calenderData['dates'][$itemIndex]['dateFa'],
                        'items' => [
                            'price' => $this->price
                        ]
                    ]);
            }
            session()->flash('message', ['title' => 'قیمت شما ثبت شد', 'icon' => 'success']);
            $this->removeSelection();
            $this->dispatchBrowserEvent('send-data', $this->getCalender($calenderRequestData));
        } else {
            dd('قیمت را وارد نکرده اید');
        }
    }


    function removeSelection()
    {
        $this->datesSelected = [];
        $this->dayIn = null;
        $this->dayOut = null;
        $this->price = '';
    }
}
