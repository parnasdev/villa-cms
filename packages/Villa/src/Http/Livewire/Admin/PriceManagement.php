<?php

namespace Packages\Villa\src\Http\Livewire\Admin;


use Livewire\Component;
use Packages\Villa\src\Models\Residence;
use Packages\Villa\src\Models\ResidenceDate;
use Packages\Villa\src\Models\ResidenceReserve;

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
    public $calendarRequest = [];

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
    $this->fillCalendarRequest();
//        dd($this->residenceData);
        return view('Villa::Livewire.Admin.PriceManagmentPage');
    }
    public function getAllReservations()
    {
        $allDatesReserved = [];
        $calenderReservesSource = ResidenceReserve::query()->where('residence_id', $this->residence->id)->where('status_id',13)->get();
        foreach ($calenderReservesSource as $date) {
            $dates = $this->getBetweenDates($date['checkIn'], $date['checkOut']);
            foreach ($dates as $index => $y) {
                if ($index !== count($dates) - 1) {
                    array_push($allDatesReserved, $y);
                }
            }
        }
        return $allDatesReserved;
    }

    public function getCalendarResidencePrices()
    {
        return ResidenceDate::query()->where('residence_id', $this->residence->id)->get();
    }

    public function fillCalendarRequest()
    {
        $this->calendarRequest = [];
        foreach ($this->getCalendarResidencePrices() as $item) {
            array_push($this->calendarRequest,
                [
                    'date' => jdate($item->date)->format('Y-m-d'),
                    'items' => [
                        'price' => $item->price,
                        'isReserved' => in_array($item->date, $this->getAllReservations())
                    ]
                ]);
        }
//        dd($this->calendarRequest);

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
        if ($this->price !== '') {
            foreach ($this->datesSelected as $itemIndex) {
                ResidenceDate::query()->create([
                    'date' => $this->calenderData['dates'][$itemIndex]['dateEn'],
                    'residence_id' => $this->residence->id,
                    'price' => $this->price
                ]);


            }
            $this->fillCalendarRequest();

            session()->flash('message', ['title' => 'قیمت شما ثبت شد', 'icon' => 'success']);
            $this->removeSelection();
            $this->dispatchBrowserEvent('send-data', $this->getCalender($this->calendarRequest));
        } else {
            dd('قیمت را وارد نکرده اید');
        }
    }
    public function getBetweenDates($startDate, $endDate)
    {
        $rangArray = [];

        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        for ($currentDate = $startDate; $currentDate <= $endDate;
             $currentDate += (86400)) {

            $date = date('Y-m-d', $currentDate);
            $rangArray[] = $date;
        }
        return $rangArray;
    }

    function removeSelection()
    {
        $this->datesSelected = [];
        $this->dayIn = null;
        $this->dayOut = null;
        $this->price = '';
    }
}
