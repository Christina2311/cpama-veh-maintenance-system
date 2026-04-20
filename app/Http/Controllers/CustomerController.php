<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Appointment;
use App\Models\AppointmentService;
use App\Models\Service;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // ──────────────────────────────────────────
    // DASHBOARD — MY VEHICLES
    // ──────────────────────────────────────────
    public function dashboard()
    {
        // ✅ Fixed: was '$vehicle' (singular) — must be '$vehicles' (plural)
        // ✅ Fixed: compact('vehicles') must match the variable name
        $vehicles = auth()->user()->vehicles()->with('appointments')->get();
        $services = Service::where('status', 'active')->orderBy('service_name')->get();

        return view('customer.dashboard', compact('vehicles', 'services'));
    }

    // ──────────────────────────────────────────
    // VEHICLES — STORE
    // ──────────────────────────────────────────
    public function storeVehicle(Request $request)
    {
        // ✅ Fixed: duplicate 'make' rule, missing fields, wrong 'require' → 'required', missing semicolon
        $request->validate([
            'make'          => 'required|string|max:50',
            'model'         => 'required|string|max:50',
            'year'          => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate',
            'color'         => 'nullable|string|max:30',
            'mileage'       => 'nullable|integer|min:0',
            'vin'           => 'nullable|string|max:17|unique:vehicles,vin',
        ]);

        auth()->user()->vehicles()->create([
            'make'          => $request->make,
            'model'         => $request->model,
            'year'          => $request->year,
            'license_plate' => $request->license_plate,
            'color'         => $request->color,
            'mileage'       => $request->mileage,
            'vin'           => $request->vin,
        ]);

        return redirect()->route('customer.dashboard')->with('vehicle_added', true);
    }

    // ──────────────────────────────────────────
    // APPOINTMENTS — LIST
    // ──────────────────────────────────────────
    public function appointments()
    {
        $appointments = Appointment::with(['vehicle', 'appointmentServices.service'])
            ->where('customer_id', auth()->id())
            ->orderBy('appointment_date', 'desc')
            ->get();

        $vehicles = auth()->user()->vehicles()->get();
        $services = Service::where('status', 'active')->orderBy('service_name')->get();

        return view('customer.appointments.index', compact('appointments', 'vehicles', 'services'));
    }

    // ──────────────────────────────────────────
    // APPOINTMENTS — STORE (Book)
    // ──────────────────────────────────────────
    public function storeAppointment(Request $request)
    {
        $request->validate([
            'vehicle_id'       => 'required|exists:vehicles,id',
            'service_id'       => 'required|exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'notes'            => 'nullable|string|max:500',
        ]);

        $appointment = Appointment::create([
            'customer_id'      => auth()->id(),
            'vehicle_id'       => $request->vehicle_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'notes'            => $request->notes,
            'status'           => 'pending',
        ]);

        AppointmentService::create([
            'appointment_id' => $appointment->id,
            'service_id'     => $request->service_id,
        ]);

        return redirect()->route('customer.dashboard')->with('booking_success', true);
        
    }

    public function cancelAppointment($id)
    {
        $appointment = Appointment::where('id', $id)
            ->where('customer_id', auth()->id())
            ->firstOrFail();

        $appointment->update(['status' => 'cancelled']);

        return redirect()->route('customer.appointments');
    }

    // ──────────────────────────────────────────
    // SERVICE HISTORY
    // ──────────────────────────────────────────
    public function history()
    {
        $history = Appointment::with(['vehicle', 'appointmentServices.service', 'tasks.mechanic'])
            ->where('customer_id', auth()->id())
            ->where('status', 'completed')
            ->orderBy('appointment_date', 'desc')
            ->get();

        return view('customer.history.index', compact('history'));
    }
}