<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // List all doctors
    public function index(Request $request)
    {
        $query = Doctor::query();

        if ($request->specialty) {
            $query->where('specialty', $request->specialty);
        }

        return response()->json($query->paginate(10));
    }

    // Store doctor (Admin only)
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'availability' => 'required|string|max:255',
        ]);

        $doctor = Doctor::create($validated);

        return response()->json([
            'message' => 'Doctor created successfully',
            'doctor' => $doctor
        ]);
    }

    // Show doctor
public function show($id)
{
    $doctor = Doctor::findOrFail($id);
    return response()->json($doctor);
}


    // Update doctor
    public function update(Request $request, $id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'availability' => 'required|string|max:255',
        ]);

        $doctor = Doctor::findOrFail($id);

        $doctor->update($validated);

        return response()->json([
            'message' => 'Doctor updated successfully',
            'doctor' => $doctor
        ]);
    }

    // Delete doctor
    public function destroy($id)
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        Doctor::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Doctor deleted successfully'
        ]);
    }
}
