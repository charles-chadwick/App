<?php

namespace App\Livewire;

use Flux\Flux;
use Illuminate\View\View;
use Livewire\Component;

class ConfirmDelete extends Component
{
    public $object;
    public $to_delete;


    public function delete()
    {
        $this->object->delete();
        Flux::toast(text: 'Your changes have been saved.', heading: 'Changes saved', variant: 'success');
    }

    public function render() : View
    {
        // this is hacky and dumb but will do for now.
        $class = explode("\\", get_class($this->object));
        $this->to_delete = array_pop($class);
        return view('livewire.confirm-delete');
    }
}
