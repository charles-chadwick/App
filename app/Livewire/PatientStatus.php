<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class PatientStatus extends Component
{
    public \App\Enums\PatientStatus $status;
    public string                   $color;

    public function render() : View
    {
        $this->color = match ($this->status) {
            \App\Enums\PatientStatus::Archived    => "indigo",
            \App\Enums\PatientStatus::Active      => "lime",
            \App\Enums\PatientStatus::Inactive    => "red",
            \App\Enums\PatientStatus::Prospective => "blue",
            default                               => "gray",
        };
        return view('livewire.patient-status');
    }
}
