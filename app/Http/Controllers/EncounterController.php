<?php

namespace App\Http\Controllers;

use App\Models\Encounter;
use Illuminate\Http\Request;

class EncounterController extends Controller
{
    public function index()
    {
        return view('encounters.index', ['encounters' => Encounter::all()]);
    }

    public function show(Encounter $encounter)
    {
        return $encounter;
    }

}
