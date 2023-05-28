<?php

namespace App\Http\Livewire\Blocks;

use Livewire\Component;

class ViajeSearcher extends Component
{
    public $year;
    public $month;
    public $daysInMonth;
    public $firstDayOfMonth;


    public function mount()
    {
        $this->year = date('Y');
        $this->month = date('n');

        $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
        $this->firstDayOfMonth = date('N', strtotime(date('Y-m-01')));
    }


    public function previousYear()
    {
        $this->year--;

        // $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, array_search($this->month, $this->months) + 1, $this->year);
        $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        // $this->firstDayOfMonth = date('N', strtotime($this->year . '-' . (array_search($this->month, $this->months) + 1) . '-01'));
        $this->firstDayOfMonth = date('N', strtotime($this->year . '-' . $this->month . '-01'));
    }

    public function nextYear()
    {
        $this->year++;

        // $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, array_search($this->month, $this->months) + 1, $this->year);
        $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        // $this->firstDayOfMonth = date('N', strtotime($this->year . '-' . (array_search($this->month, $this->months) + 1) . '-01'));
        $this->firstDayOfMonth = date('N', strtotime($this->year . '-' . $this->month . '-01'));
    }

    public function previousMonth()
    {
        if ($this->month == 1) {
            $this->month = 12;
            $this->year--;
        } else {
            // $this->month = $this->months[array_search($this->month, $this->months) - 1];
            $this->month--;
        }

        // $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, array_search($this->month, $this->months) + 1, $this->year);
        $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        // $this->firstDayOfMonth = date('N', strtotime($this->year . '-' . (array_search($this->month, $this->months) + 1) . '-01'));
        $this->firstDayOfMonth = date('N', strtotime($this->year . '-' . $this->month . '-01'));
    }

    public function nextMonth()
    {
        if ($this->month == 12) {
            $this->month = 1;
            $this->year++;
        } else {
            // $this->month = $this->months[array_search($this->month, $this->months) + 1];
            $this->month++;
        }

        // $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, array_search($this->month, $this->months) + 1, $this->year);
        $this->daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        // $this->firstDayOfMonth = date('N', strtotime($this->year . '-' . (array_search($this->month, $this->months) + 1) . '-01'));
        $this->firstDayOfMonth = date('N', strtotime($this->year . '-' . $this->month . '-01'));
    }


    public function render()
    {
        return view('livewire.blocks.viaje-searcher');
    }
}
