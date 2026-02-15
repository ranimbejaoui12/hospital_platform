<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private function checkAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    }

    // Dashboard statistics
    public function stats()
    {
        if ($this->checkAdmin()) {
            return $this->checkAdmin();
        }

        return response()->json([
            'total_users' => User::count(),
            'total_doctors' => Doctor::count(),
            'total_appointments' => Appointment::count(),
            'pending_appointments' => Appointment::where('status','pending')->count(),
            'approved_appointments' => Appointment::where('status','approved')->count(),
        ]);
    }

    // Filter appointments
    public function filterAppointments(Request $request)
    {
        if ($this->checkAdmin()) {
            return $this->checkAdmin();
        }

        $query = Appointment::query();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->date_from && $request->date_to) {
            $query->whereBetween('date', [$request->date_from, $request->date_to]);
        } elseif ($request->date) {
            $query->where('date', $request->date); // MongoDB compatible
        }

        return response()->json($query->get());
    }
}
