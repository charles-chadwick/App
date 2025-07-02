<?php

namespace App\Livewire;

use App\Enums\EncounterStatus;
use App\Models\Encounter;
use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class EncounterForm extends Component
{
    public ?Encounter $encounter;
    public            $patient_id;
    public            $owner_id;
    public            $type;
    public            $date_of_service;
    public            $status;
    public            $title;
    public            $content;
    public            $encounter_types = ['Office Visit', 'Medication Update', 'Phone Call', 'Checkup'];

    public function mount(?Encounter $encounter) : void
    {
        $this->encounter = $encounter;
        if ($encounter->id !== null) {
            $this->fill($encounter);
        }
    }

    public function save() : void
    {
        $this->validate();

        $encounter_data = [
            'patient_id'      => $this->patient_id,
            'owner_id'        => $this->owner_id,
            'type'            => $this->type,
            'date_of_service' => $this->date_of_service,
            'status'          => $this->status,
            'title'           => $this->title,
            'content'         => $this->content,
        ];

        if ($this->encounter->id === null) {
            $this->encounter = Encounter::create($encounter_data);
            $message = 'Encounter has been created';
        } else {
            $this->encounter->update($encounter_data);
            $message = 'Encounter has been updated';
        }

        Flux::toast(text: $message, heading: 'Success', variant: 'success');
        $this->redirect(route('encounters.show', $this->encounter->id), navigate: true);
    }

    protected function rules() : array
    {
        return [
            'patient_id'      => 'required|integer|exists:patients,id',
            'type'            => 'required|string',
            'date_of_service' => 'required|date',
            'status'          => 'required|string',
            'title'           => 'required|string',
            'content'         => 'required|string',
        ];
    }

    public function render() : View
    {
        return view('livewire.encounters.form');
    }
}
