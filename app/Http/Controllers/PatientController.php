<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientController extends Controller
{
    public function details(Patient $patient)
    {
        return view('patient.details', compact('patient'));

    }
}
