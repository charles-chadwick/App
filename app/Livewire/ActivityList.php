<?php

namespace App\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class ActivityList extends Component
{
    public $object;
    public $activities = [];
    public function mount($object) : void
    {
        $this->object = $object;
        $activities = Activity::where("subject_type", get_class($object))->where('subject_id', $this->object->id)->get();

        foreach ($activities as $activity) {

            $user = $activity->causer;


            $this->activities[] = [
                'description' => $activity->description,
                'date' => Carbon::parse($activity->created_at)->format('M, d, Y @ h:i A' ),
            ];
        }

    }

    public function render() : View
    {
        return view('livewire.activity-list');
    }
}
