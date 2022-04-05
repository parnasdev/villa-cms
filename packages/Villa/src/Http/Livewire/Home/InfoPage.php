<?php

namespace Packages\Villa\src\Http\Livewire\Home;

use App\Models\City;
use App\Models\Province;
use Livewire\Component;
use Packages\Villa\src\Models\Residence;
use Packages\Villa\src\Models\ResidenceDate;
use Packages\Villa\src\Models\ResidenceFile;
use Packages\Villa\src\Models\ResidenceReserve;

class InfoPage extends Component
{
    public Residence $residence;
    public int|null $currentMonth = null;
    public int|null $currentYear = null;
    public $residenceData = [];
    public string $name = '';
    public string $family = '';
    public string $phone = '';
    public $dayIn = null;
    public $dayOut = null;
    public array $datesSelected = [];
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
        $province = Province::query()->where('id', $this->residence->province_id)->get();
        $files = ResidenceFile::query()->where('residence_id', $this->residence->id)->get();
        $cities = City::query()->where('province_id', $this->residence->province_id)->get();
        $city = $cities->where('id', $this->residence->city_id);
        $allDatesReserved = [];
        $calenderReservesSource = ResidenceReserve::query()->where('residence_id', $this->residence->id)->get();
        foreach ($calenderReservesSource as $date) {
            $dates = $this->getBetweenDates($date['checkIn'], $date['checkOut']);
            foreach ($dates as $index=>$y) {
                if ($index !== count($dates) -1) {
                    array_push($allDatesReserved, $y);
                }
            }
        }

        $calenderDataRes = ResidenceDate::query()->where('residence_id', $this->residence->id)->get();
        foreach ($calenderDataRes as $x) {
            array_push($this->residenceData,
                [
                    'date' => jdate($x->date)->format('Y-m-d'),
                    'items' => [
                        'price' => $x->price,
                        'isReserved' => in_array($x->date, $allDatesReserved)
                    ]
                ]);


        }
        return view('Villa::Livewire.Home.InfoPage', compact('province', 'city', 'files'));

    }


    function getCalenderDatesReserved()
    {

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


    public function getDates($date1, $date2)
    {
        if ($date1 && $date2) {
            $this->datesSelected = [];
            $this->dayIn = $date1;
            $this->dayOut = $date2;
            $dates = $this->getBetweenDates($this->dayIn['dateEn'], $this->dayOut['dateEn']);
            foreach ($dates as $d) {
                array_push($this->datesSelected,$this->getItemByDateEn($d));
            }
        }
        return json_encode($this->datesSelected);
    }

   public function getItemByDateEn($dateEn)
    {
        foreach ($this->calenderData['dates'] as $item) {
            if ($item['dateEn'] === $dateEn) {
                return $item;
            }
        }
    }


    public function submit()
    {

        $calenderRequestData = [];
        if (count($this->datesSelected) > 0) {

            ResidenceReserve::query()->create([
                'residence_id' => $this->residence->id,
                'checkIn' => $this->datesSelected[0]['dateEn'],
                'checkOut' => $this->datesSelected[count($this->datesSelected) - 1]['dateEn'],
                'totalPrice' => $this->getTotalPrice(),
                'user_id' => user()->id,
                'name' => $this->name,
                'family' => $this->family,
                'phone' => $this->phone,
                'status_id' => $this->residence->status_id,
            ]);
            foreach ($this->datesSelected as $index=>$item) {
                if ($this->datesSelected)
                array_push($calenderRequestData,
                    [
                        'date' => $item['dateFa'],
                        'items' => [
                            'price' => $item['data'][0]['price'],
                            'isReserved' => $index !== (count($this->datesSelected)-1)
                        ]
                    ]);
            }
            session()->flash('message', ['title' => 'رزرو شما انجام شد', 'icon' => 'success']);
            $this->removeSelection();
            $this->dispatchBrowserEvent('send-data', $this->getCalender($calenderRequestData));
        } else {
            dd('لطفا روزهای خود را انتخاب کنید.');
        }
    }


    function removeSelection()
    {
        $this->datesSelected = [];
        $this->dayIn = null;
        $this->dayOut = null;
    }

    public function getTotalPrice()
    {
        $total = 0;
        for ($i = 0; $i < count($this->datesSelected) - 1; $i++) {
            $total += $this->datesSelected[$i]['data'][0]['price'];
        }


        return $total;
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
}
