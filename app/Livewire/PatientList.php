<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class PatientList extends Component
{
    public function render() :View
    {
        return view('livewire.patient-list');
    }
}
