<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Checker extends Component
{
    public $isChecked = false;

    public function render()
    {
        return view('livewire.checker');
    }
}
