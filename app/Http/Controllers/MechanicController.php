<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MechanicController extends Controller
{
    // ──────────────────────────────────────────
    // DASHBOARD — MY ASSIGNED TASKS
    // ──────────────────────────────────────────
    public function dashboard()
    {
        $mechanicId = Auth::id();

        $tasks = Task::with(['appointment.vehicle', 'service'])
            ->where('mechanic_id', $mechanicId)
            ->whereIn('status', ['assigned', 'in-progress'])
            ->orderBy('assigned_at', 'asc')
            ->get();

        $mechanics = User::where('role', 'mechanic')
            ->where('status', 'active')
            ->where('id', '!=', $mechanicId)
            ->get();

        return view('mechanic.dashboard', compact('tasks', 'mechanics'));
    }

    // SENIOR MECHANIC
        public function seniorDashboard()
    {
        $mechanicId = Auth::id();

        $tasks = Task::with(['appointment.vehicle', 'service'])
            ->where('mechanic_id', $mechanicId)
            ->whereIn('status', ['assigned', 'in-progress'])
            ->orderBy('assigned_at', 'asc')
            ->get();

        $mechanics = User::whereIn('role', ['mechanic', 'senior_mechanic'])
            ->where('status', 'active')
            ->where('id', '!=', $mechanicId)
            ->get();

        return view('mechanic.dashboard', compact('tasks', 'mechanics'));
    }

    // IN PROGRESS TASKS
    public function inProgress()
    {
        $tasks = Task::with(['appointment.vehicle', 'service'])
            ->where('mechanic_id', Auth::id())
            ->where('status', 'in-progress')
            ->orderBy('started_at', 'desc')
            ->get();

        $mechanics = User::where('role', 'mechanic')
            ->where('status', 'active')
            ->where('id', '!=', Auth::id())
            ->get();

        return view('mechanic.inprogress.index', compact('tasks', 'mechanics'));
    }

    // COMPLETED TASKS
    public function completed()
    {
        $tasks = Task::with(['appointment.vehicle', 'service'])
            ->where('mechanic_id', Auth::id())
            ->where('status', 'completed')
            ->orderBy('completed_at', 'desc')
            ->get();

        return view('mechanic.completed.index', compact('tasks'));
    }

    // TEAM OVERVIEW
    public function team()
    {
        $mechanicId = Auth::id();

        $mechanics = User::whereIn('role', ['mechanic', 'senior_mechanic'])
            ->where('status', 'active')
            ->get()
            ->map(function ($mechanic) {
                $mechanic->assigned_count   = Task::where('mechanic_id', $mechanic->id)->where('status', 'assigned')->count();
                $mechanic->inprogress_count = Task::where('mechanic_id', $mechanic->id)->where('status', 'in-progress')->count();
                $mechanic->completed_count  = Task::where('mechanic_id', $mechanic->id)->where('status', 'completed')->count();
                return $mechanic;
            });

        $delegatedTasks = Task::with(['appointment.vehicle', 'service', 'mechanic'])
            ->where('assigned_by', $mechanicId)
            ->where('mechanic_id', '!=', $mechanicId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mechanic.team.index', compact('mechanics', 'delegatedTasks'));
    }


    // TEAM REPORTS
    public function reports()
    {
        $totalTasks     = Task::count();
        $completedTasks = Task::where('status', 'completed')->count();
        $inProgress     = Task::where('status', 'in-progress')->count();
        $assigned       = Task::where('status', 'assigned')->count();

        return view('mechanic.reports.index', compact('totalTasks', 'completedTasks', 'inProgress', 'assigned'));
    }


    // CUSTOMER VEHICLES
    // CUSTOMER VEHICLES
    public function vehicles(Request $request)
    {
        $query = Vehicle::with('owner')->orderBy('make');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('make',          'like', "%{$search}%")
                  ->orWhere('model',        'like', "%{$search}%")
                  ->orWhere('license_plate','like', "%{$search}%")
                  ->orWhere('vin',          'like', "%{$search}%")
                  ->orWhereHas('owner', fn($u) => $u->where('name', 'like', "%{$search}%"));
            });
        }

        $vehicles = $query->paginate(15)->withQueryString();

        return view('mechanic.customervehicles.index', compact('vehicles'));
    }


    // ASSIGN TASK TO TEAM (page)
    public function assign()
    {
        $mechanics = User::where('role', 'mechanic')
            ->where('status', 'active')
            ->where('id', '!=', Auth::id())
            ->get();

        $tasks = Task::with(['appointment.vehicle', 'service'])
            ->where('mechanic_id', Auth::id())
            ->whereIn('status', ['assigned', 'in-progress'])
            ->get();

        return view('mechanic.assign.index', compact('mechanics', 'tasks'));
    }

    // UPDATE TASK STATUS
    public function updateTaskStatus(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);

        // Verify this task belongs to the logged-in mechanic
        if ($task->mechanic_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'status' => 'required|in:assigned,in-progress,completed',
        ]);

        $task->status = $request->status;

        if ($request->status === 'in-progress' && !$task->started_at) {
            $task->started_at = now();
        }

        if ($request->status === 'completed' && !$task->completed_at) {
            $task->completed_at = now();
        }

        $task->save();

        return redirect()->route('mechanic.tasks')->with('success', 'Task status updated.');
    }


    // ASSIGN TASK TO ANOTHER MECHANIC
    public function assignTask(Request $request, $taskId)
    {
        $request->validate([
            'mechanic_id' => 'required|exists:users,id',
            'notes'       => 'nullable|string|max:500',
        ]);

        $task = Task::findOrFail($taskId);

        // Only the current mechanic or admin can reassign
        if ($task->mechanic_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $task->update([
            'mechanic_id' => $request->mechanic_id,
            'notes'       => $request->notes ?? $task->notes,
            'assigned_by' => Auth::id(),
            'assigned_at' => now(),
            'status'      => 'assigned',
        ]);

        return redirect()->route('mechanic.tasks')->with('success', 'Task assigned successfully.');
    }

    public function saveNotes(Request $request, $taskId)
    {
        $task = Task::findOrFail($taskId);

        if ($task->mechanic_id != Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $task->update(['notes' => $request->notes]);
        return redirect()->route('mechanic.inprogress')->with('notes_saved', true);
    }
}