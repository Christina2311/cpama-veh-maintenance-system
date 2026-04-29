<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Appointment;
use App\Models\AppointmentService;
use App\Models\Service;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    // ──────────────────────────────────────────
    // DASHBOARD
    // ──────────────────────────────────────────
    public function dashboard()
    {
        $today = Carbon::today();

        $stats = [
            'totalUsers'             => User::count(),
            'totalCustomers'         => User::where('role', 'customer')->count(),
            'totalMechanics'         => User::where('role', 'mechanic')->count(),
            'totalAdmins'            => User::where('role', 'admin')->count(),
            'totalVehicles'          => Vehicle::count(),
            'totalAppointments'      => Appointment::count(),
            'pendingAppointments'    => Appointment::where('status', 'pending')->count(),
            'confirmedAppointments'  => Appointment::where('status', 'confirmed')->count(),
            'inProgressAppointments' => Appointment::where('status', 'in-progress')->count(),
            'completedTasks'         => Task::where('status', 'completed')->count(),
            'totalRevenue'           => Appointment::whereIn('status', ['completed', 'in-progress'])->sum('total_amount'),
            'upcomingCount'          => Appointment::whereIn('status', ['pending', 'confirmed'])
                                            ->where('appointment_date', '>=', $today)->count(),
            'overdueCount'           => Appointment::whereIn('status', ['pending', 'confirmed'])
                                            ->where('appointment_date', '<', $today)->count(),
        ];

        $alerts = Appointment::with('vehicle')
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('appointment_date', '<', $today)
            ->orderBy('appointment_date', 'asc')
            ->limit(5)
            ->get();

        $recentAppointments = Appointment::with(['customer', 'vehicle'])
            ->where('status', 'completed')
            ->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentAppointments', 'alerts'));
    }

    // ──────────────────────────────────────────
    // USER MANAGEMENT — LIST
    // ──────────────────────────────────────────
    public function users(Request $request)
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        $roleCounts = [
            'admin'    => User::where('role', 'admin')->where('status', 'active')->count(),
            'senior_mechanic' => User::where('role', 'senior_mechanic')->where('status', 'active')->count(),
            'mechanic' => User::where('role', 'mechanic')->where('status', 'active')->count(),
            'customer' => User::where('role', 'customer')->where('status', 'active')->count(),
        ];

        return view('admin.users.index', compact('users', 'roleCounts'));
    }

    // ──────────────────────────────────────────
    // USER MANAGEMENT — CREATE
    // ──────────────────────────────────────────
    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'required|in:admin,mechanic,customer',
            'phone'    => 'nullable|string|max:20',
            'status'   => 'required|in:active,inactive',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'phone'    => $request->phone,
            'status'   => $request->status,
        ]);

        // ✅ Fixed: was incorrectly returning 'edit_success' — should be 'success' for Add User modal
        return redirect()->route('admin.users')->with('success', true);
    }

    // ──────────────────────────────────────────
    // USER MANAGEMENT — EDIT
    // ──────────────────────────────────────────
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|unique:users,email,' . $id,
            'role'   => 'required|in:admin,mechanic,customer',
            'phone'  => 'nullable|string|max:20',
            'status' => 'required|in:active,inactive',
        ]);

        $user->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'role'   => $request->role,
            'phone'  => $request->phone,
            'status' => $request->status,
        ]);

        // Only update password if a new one is provided
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8',
            ]);
            $user->update(['password' => Hash::make($request->password)]);
        }

        // ✅ Fixed: returns 'edit_success' so the correct Edit confirmation modal shows
        return redirect()->route('admin.users')->with('edit_success', true);
    }

    // ──────────────────────────────────────────
    // USER MANAGEMENT — DELETE
    // ──────────────────────────────────────────
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // ──────────────────────────────────────────
    // USER MANAGEMENT — ARCHIVE (set inactive)
    // ──────────────────────────────────────────
    public function archiveUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')->with('error', 'You cannot archive your own account.');
        }

        $user->update(['status' => 'inactive']);

        return redirect()->route('admin.users')->with('success', $user->name . ' has been archived.');
    }

    // ──────────────────────────────────────────
    // USER MANAGEMENT — RESTORE (set active)
    // ──────────────────────────────────────────
    public function restoreUser($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'active']);

        return redirect()->route('admin.users')->with('success', $user->name . ' has been restored.');
    }

    // ──────────────────────────────────────────
    // APPOINTMENTS — LIST
    // ──────────────────────────────────────────
    public function appointments(Request $request)
    {
        $query = Appointment::with(['customer', 'vehicle', 'appointmentServices.service']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $appointments = $query->orderBy('appointment_date', 'desc')
                              ->orderBy('appointment_time', 'desc')
                              ->paginate(20);

        $mechanics = User::where('role', 'mechanic')->where('status', 'active')->get();

        //Added customers with their vehicles for the Book modal dropdown
        $customers = User::where('role', 'customer')
                         ->where('status', 'active')
                         ->with('vehicles')
                         ->get();

        //Added: services list for the Book modal dropdown
        $services = Service::where('status', 'active')->orderBy('service_name')->get();

        return view('admin.appointments.index', compact(
            'appointments', 'mechanics', 'customers', 'services'
        ));
    }

    // ──────────────────────────────────────────
    // APPOINTMENTS — STORE (Book new)
    // ──────────────────────────────────────────
    public function storeAppointment(Request $request)
    {
        $request->validate([
            'customer_id'       => 'required|exists:users,id',
            'vehicle_id'        => 'required|exists:vehicles,id',
            'service_id'        => 'required|exists:services,id',
            'appointment_date'  => 'required|date|after_or_equal:today',
            'appointment_time'  => 'required',
            'notes'             => 'nullable|string|max:500',
        ]);

        $appointment = Appointment::create([
            'customer_id'      => $request->customer_id,
            'vehicle_id'       => $request->vehicle_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'notes'            => $request->notes,
            'status'           => 'pending',
        ]);

        // Link the selected service
        AppointmentService::create([
            'appointment_id' => $appointment->id,
            'service_id'     => $request->service_id,
        ]);

        return redirect()->route('admin.appointments')->with('booking_success', true);
    }

    // ──────────────────────────────────────────
    // APPOINTMENTS — UPDATE STATUS
    // ──────────────────────────────────────────
    public function updateAppointmentStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,in-progress,completed,cancelled',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => $request->status]);

        return redirect()->route('admin.appointments');
    }

    // ──────────────────────────────────────────
    // MAINTENANCE — LIST
    // ──────────────────────────────────────────
    public function maintenance(Request $request)
    {
        $query = Task::with(['appointment.vehicle', 'appointment.customer', 'service', 'mechanic']);

        if ($request->vehicle_id) {
            $query->whereHas('appointment', fn($q) => $q->where('vehicle_id', $request->vehicle_id));
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->year && $request->month && $request->day) {
            $date = $request->year . '-' . str_pad($request->month, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->day, 2, '0', STR_PAD_LEFT);
            $query->whereHas('appointment', fn($q) => $q->whereDate('appointment_date', $date));
        }

        $tasks    = $query->orderBy('created_at', 'desc')->paginate(15)->withQueryString();
        $vehicles = Vehicle::orderBy('make')->get();

        return view('admin.maintenance.index', compact('tasks', 'vehicles'));
    }

    public function updateMaintenanceStatus(Request $request, Task $task)
    {
        $request->validate(['status' => 'required|in:assigned,in-progress,completed']);
        $task->update(['status' => $request->status]);
        return redirect()->route('admin.maintenance')->with('success', 'Status updated.');
    }
    
    // ──────────────────────────────────────────

    // VEHICLE MANAGEMENT — LIST
    // ──────────────────────────────────────────
    public function vehicles(Request $request)
    {
        $vehicles  = Vehicle::with('owner')->paginate(20);
        $customers = User::where('role', 'customer')->where('status', 'active')->get();

        $tasks = Task::paginate(10);
        return view('admin.vehicles.index', compact('vehicles', 'customers', 'tasks'));
    }

    // ──────────────────────────────────────────
    // VEHICLE MANAGEMENT — STORE
    // ──────────────────────────────────────────
    public function storeVehicle(Request $request)
    {
        $request->validate([
            'customer_id'   => 'required|exists:users,id',
            'make'          => 'required|string|max:50',
            'model'         => 'required|string|max:50',
            'year'          => 'required|integer|min:1900',
            'license_plate' => 'required|string|max:20|unique:vehicles,license_plate',
            'color'         => 'nullable|string|max:30',
            'mileage'       => 'nullable|integer',
            'vin'           => 'nullable|string|max:17',
        ]);
        Vehicle::create($request->all());
        return redirect()->route('admin.vehicles')->with('vehicle_added', true);
    }

    // ──────────────────────────────────────────
    // VEHICLE MANAGEMENT — UPDATE
    // ──────────────────────────────────────────
    public function updateVehicle(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update([
            'make'    => $request->make,
            'year'    => $request->year,
            'mileage' => $request->mileage,
            'color'   => $request->color,
        ]);
        return redirect()->route('admin.vehicles')->with('vehicle_edited', true);
    }

    // OPERATION REPORTS
    public function reports()
    {
        // ── SUMMARY STATS ──
        $totalAppointments  = \App\Models\Appointment::count();
        $completedServices  = \App\Models\Appointment::where('status', 'completed')->count();
        $pendingAppointments = \App\Models\Appointment::whereIn('status', ['pending', 'confirmed'])->count();
        $totalRevenue       = (float) \App\Models\Appointment::where('status', 'completed')->sum('total_amount');
        $activeCustomers    = \App\Models\User::where('role', 'customer')->where('status', 'active')->count();
        $activeVehicles     = \App\Models\Vehicle::count();

        // ── REVENUE BY MONTH (last 12 months) ──
        $revenueByMonth = \App\Models\Appointment::where('status', 'completed')
            ->where('appointment_date', '>=', now()->subMonths(11)->startOfMonth())
            ->selectRaw("DATE_FORMAT(appointment_date, '%b %Y') as month, SUM(total_amount) as total, MIN(appointment_date) as sort_date")
            ->groupBy('month')
            ->orderBy('sort_date')
            ->get();

        // ── TOP PERFORMING MECHANICS (this month) ──
        $topMechanics = \App\Models\User::whereIn('role', ['mechanic', 'senior_mechanic'])
            ->where('status', 'active')
            ->get()
            ->map(function ($mechanic) {
                $completedTasks = \App\Models\Task::where('mechanic_id', $mechanic->id)
                    ->where('status', 'completed')
                    ->whereBetween('completed_at', [now()->startOfMonth(), now()->endOfMonth()])
                    ->count();

                $revenue = (float) \App\Models\Task::where('tasks.mechanic_id', $mechanic->id)
                ->where('tasks.status', 'completed')
                ->whereBetween('tasks.completed_at', [now()->startOfMonth(), now()->endOfMonth()])
                ->join('appointments', 'tasks.appointment_id', '=', 'appointments.id')
                ->sum('appointments.total_amount');
                
                $mechanic->completed_count = $completedTasks;
                $mechanic->revenue         = $revenue;
                return $mechanic;
            })
            ->filter(fn($m) => $m->completed_count > 0)
            ->sortByDesc('completed_count')
            ->take(5)
            ->values();

        // ── MAINTENANCE BREAKDOWN (all time) ──
        $maintenanceBreakdown = \App\Models\Service::leftJoin('tasks', 'tasks.service_id', '=', 'services.id')
            ->selectRaw('services.service_name, COUNT(tasks.id) as count')
            ->groupBy('services.id', 'services.service_name')
            ->orderByDesc('count')
            ->get()
            ->map(fn($s) => (object)[
                'service_name' => $s->service_name,
                'count'        => (int) $s->count,
            ]);

        return view('admin.reports.index', compact(
            'totalAppointments', 'completedServices', 'pendingAppointments',
            'totalRevenue', 'activeCustomers', 'activeVehicles',
            'revenueByMonth', 'topMechanics', 'maintenanceBreakdown'
        ));
    }
}