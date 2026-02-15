<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;   // ← هذي تتحط فوق

class PatientController extends Controller
{
    public function index()
    {

        return Patient::all();
    }
    public function store(Request $request)
    {
        $patient = Patient::create($request->all());
        return response()->json($patient);
    }
}
