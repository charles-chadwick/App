<?php

namespace App\Livewire;

use App\Models\Encounter;
use App\Models\Patient;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use LaravelIdea\Helper\App\Models\_IH_Encounter_C;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class EncounterList extends Component
{
    use WithPagination;

    public Patient $patient;
    public         $sort_by        = 'date_of_service';
    public         $sort_direction = 'desc';
    public         $per_page       = 5;

    public function mount(Patient $patient) : void
    {
        $this->patient = $patient;
    }

    public function sort($column) : void
    {
        if ($this->sort_by === $column) {
            $this->sort_direction = $this->sort_direction === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sort_by = $column;
            $this->sort_direction = 'asc';
        }
    }

    #[Computed]
    public function encounters() : array|LengthAwarePaginator|_IH_Encounter_C
    {
        return Encounter::where('patient_id', $this->patient->id)
                        ->tap(fn($query) => $this->sort_by ? $query->orderBy($this->sort_by,
                            $this->sort_direction) : $query)
                        ->paginate($this->per_page);
    }

    public function render() : View
    {
        return view('livewire.encounter-list', [
            'encounters' => $this->encounters(),
        ]);
    }
}
