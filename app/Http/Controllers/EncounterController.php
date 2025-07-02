<?php

namespace App\Http\Controllers;

use App\Enums\EncounterStatus;
use App\Models\Encounter;

class EncounterController extends Controller
{
    public function show(Encounter $encounter)
    {
        return view('encounters.show', [
            'patient'   => $encounter->patient,
            'encounter' => $encounter,
        ]);
    }

    public function unsign(Encounter $encounter)
    {
        $encounter->update([
            'status' => EncounterStatus::Unsigned
        ]);

        return redirect()->route('encounters.show', $encounter);
    }
}
