<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\City;
use App\Models\Landmark;

class Select extends Component
{
    public $cities;
    public $landmarks;
    public $city;
    public $landmark;

    public function mount()
    {
        $this->cities = City::all();
        $this->landmarks = collect();
    }

    public function render()
    {
        return view('livewire.select', [
            'landmarks']);
    }

    public function updatedCity($value)
    {
        $this->landmarks = Landmark::where('city_id', $value)->get();
        // dump($this->landmark);
    }

    public function updatedLandmark($value)
    {
        //這段目前用不到，暫時保留，有須要可用
        // $this->landmarks = Landmark::where('city_id', $value)->get();
    }
}
