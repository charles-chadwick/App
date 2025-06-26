<?php

namespace App\Livewire;

use App\Enums\PatientStatus;
use App\Models\Patient;
use Illuminate\View\View;
use Livewire\Component;

class PatientForm extends Component
{
    public Patient $patient;
    public         $status;
    public         $prefix;
    public         $first_name;
    public         $middle_name;
    public         $last_name;
    public         $suffix;
    public         $gender;
    public         $dob;
    public         $email;

    public $patient_statuses;

    public function mount(Patient $patient) : void
    {
        $this->patient = $patient;
        if ($patient->id !== null) {
            $this->fill($patient);
        }

        $this->patient_statuses = PatientStatus::array();
    }

    public function save() : void
    {
        $this->validate();

        $patient_data = [
            'status'      => $this->status,
            'prefix'      => $this->prefix,
            'first_name'  => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name'   => $this->last_name,
            'suffix'      => $this->suffix,
            'gender'      => $this->gender,
            'dob'         => $this->dob,
            'email'       => $this->email,
        ];

        if ($this->patient->id === null) {
            $this->patient = Patient::create($patient_data);
            $message = 'Patient has been created';
        } else {
            $this->patient->update($patient_data);
            $message = 'Patient has been updated';
        }

        session()->flash('message', $message);
    }

    protected function rules() : array
    {
        return [
            'status'      => 'required',
            'prefix'      => 'nullable',
            'first_name'  => 'required',
            'middle_name' => 'nullable',
            'last_name'   => 'required',
            'suffix'      => 'nullable',
            'gender'      => 'required',
            'dob'         => 'required|date',
            'email'       => 'required|email',
        ];
    }

    public function render() : View
    {
        return view('livewire.patient-form');
    }
}
