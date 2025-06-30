<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\View\View;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class ActivityList extends Component
{
    public $object;

    public $activities = [];

    public function mount($object): void
    {
        $this->object = $object;
        $activities = Activity::where('subject_type', get_class($object))
            ->orderBy('created_at', 'DESC')
            ->where('subject_id', $this->object->id)
            ->get();

        foreach ($activities as $activity) {

            $user = $activity->causer;
            $full_name = $user->full_name;

            $this->activities[] = [
                'description' => $activity->description,
                'date' => Carbon::parse($activity->created_at)
                    ->format('M, d, Y @ h:i:s A'),
                'full_name' => $full_name,
            ];
        }

    }

    public function render(): View
    {
        return view('livewire.activity-list');
    }
}
