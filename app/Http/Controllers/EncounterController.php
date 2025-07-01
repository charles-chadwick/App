<?php

namespace App\Http\Controllers;

use App\Models\Encounter;

class EncounterController extends Controller
{
    public function show(Encounter $encounter) {
        return view('encounters.show', [
            'encounter' => $encounter,
        ]);
    }
}
