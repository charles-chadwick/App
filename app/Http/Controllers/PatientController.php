<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy(request('order_by', 'first_name'), request('order_direction', 'asc'))
                           ->paginate(request('per_page', 20));
        return view('patients.index', compact('patients'));
    }

    public function details(Patient $patient)
    {
        return view('patients.details', compact('patient'));

    }
}
