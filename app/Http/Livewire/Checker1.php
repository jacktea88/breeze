<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Checker1 extends Component
{
    public $isChecked1 = false;

    public function render()
    {
        return view('livewire.checker1');
    }
}
