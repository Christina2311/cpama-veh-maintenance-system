<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Overview - CPAMA VEH MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        :root {
            --bg-primary:       #0D0D32;
            --bg-secondary:     #D9D9D9;
            --bg-secondary-20:  rgba(217,217,217,0.2);
            --bg-neutral-tert:  #F5F5F5;
            --bg-brand:         #6160A2;
            --bg-hover:         #E3E3E3;
            --text-default:     #000000;
            --text-default-20:  rgba(0,0,0,0.2);
            --text-neutral:     #FFFFFF;
            --text-neutral-50:  rgba(255,255,255,0.5);
            --text-brand:       #6160A2;
            --border-default:   #D9D9D9;
            --border-neutral:   #C0C0C0;
            --border-brand:     #6160A2;
            --accent-green:     #009951;
            --accent-yellow:    #FFCC00;
            --accent-blue:      #3b82f6;
            --accent-dark:      #0F0F40;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6160A2, #6160A2, #CFCFFF);
            font-family: sans-serif;
            margin: 0;
            overflow: hidden;
            color: var(--text-default);
        }

       /* ── SIDEBAR ── */
        .sidebar {
            width: 240px;
            min-width: 240px;
            height: 100vh;
            background: #0D0D32;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px 16px;
            position: sticky;
            top: 0;
            flex-shrink: 0;
        }

        .sidebar-logo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 12px;
        }

        .sidebar-title {
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            color: white;
            text-align: center;
            letter-spacing: 0.5px;
            line-height: 1.4;
            margin-bottom: 6px;
        }

        .sidebar-mechanic {
            font-size: 12px;
            font-weight: 700;
            color: rgba(255,255,255,0.85);
            margin-bottom: 20px;
            text-align: center;
        }

        .nav-item .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 12px;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.15);
            background-color: rgba(255,255,255,0.08);
            transition: background-color 0.2s;
            text-decoration: none;
        }

        .nav-item .nav-link:hover,
        .nav-item .nav-link.active {
            background-color: rgba(255,255,255,0.22);
            color: white;
        }

        .nav-item .nav-link img {
            width: 15px;
            height: 15px;
            filter: brightness(0) invert(1);
            flex-shrink: 0;
        }

        .logout-btn {
            font-size: 12px;
            font-weight: 600;
            color: white;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 8px;
            padding: 9px 14px;
            width: 100%;
            transition: background-color 0.2s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .logout-btn:hover { background-color: rgba(255,255,255,0.15); }

        /* ── MAIN ── */
        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 36px 32px;
        }

        .page-title {
            font-size: 34px;
            font-weight: 800;
            color: var(--text-neutral);
            margin-bottom: 24px;
        }

        /* ── PANEL ── */
        .panel {
            background: var(--text-neutral);
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .panel-header {
            padding: 16px 20px 4px;
            font-size: 15px;
            font-weight: 800;
            color: var(--text-default);
        }

        /* ── TEAM MEMBERS TABLE ── */
        .members-table {
            width: 100%;
            border-collapse: collapse;
        }

        .members-table thead th {
            padding: 12px 20px;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-default);
            background: var(--bg-secondary-20);
            border-bottom: 1px solid var(--border-default);
            text-align: left;
        }

        .members-table tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.15s;
        }

        .members-table tbody tr:last-child { border-bottom: none; }
        .members-table tbody tr:hover { background: #fafafa; }

        .members-table tbody td {
            padding: 13px 20px;
            font-size: 13px;
            color: var(--text-default);
            vertical-align: middle;
        }

        /* ── STATUS PILL ── */
        .status-pill {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .pill-active     { background: #d1fae5; color: #065f46; }
        .pill-inactive   { background: #fee2e2; color: #991b1b; }

        /* task count badges */
        .count-badge {
            display: inline-block;
            min-width: 24px;
            padding: 2px 7px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 700;
            text-align: center;
            margin-left: 4px;
        }

        .badge-assigned   { background: #fef9c3; color: #92400e; }
        .badge-inprogress { background: #dbeafe; color: #1e40af; }
        .badge-completed  { background: #d1fae5; color: #065f46; }

        /* ── DELEGATED TASKS SECTION ── */
        .delegated-header {
            padding: 18px 20px 6px;
        }

        .delegated-title {
            font-size: 15px;
            font-weight: 800;
            color: var(--text-default);
            margin-bottom: 2px;
        }

        .delegated-subtitle {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 0;
        }

        .tasks-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            padding: 16px 20px 20px;
        }

        /* ── TASK CARD ── */
        .task-card {
            background: var(--bg-neutral-tert);
            border-radius: 10px;
            padding: 14px 16px;
            border: 1px solid var(--border-default);
        }

        .task-card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .task-vehicle {
            font-size: 12px;
            font-weight: 700;
            color: #6c757d;
            margin-bottom: 2px;
        }

        .task-service {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-default);
        }

        .task-status-label {
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
            margin-left: 8px;
        }

        .status-assigned   { color: var(--accent-blue); }
        .status-inprogress { color: var(--accent-yellow); }
        .status-completed  { color: var(--accent-green); }

        .task-meta-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
            margin-bottom: 10px;
        }

        .task-meta-item {
            background: var(--bg-secondary-20);
            border-radius: 6px;
            padding: 6px 10px;
        }

        .task-meta-label {
            font-size: 10px;
            color: #6c757d;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .task-meta-value {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-default);
        }

        .task-notes {
            background: var(--bg-secondary-20);
            border-radius: 6px;
            padding: 8px 10px;
            font-size: 12px;
            color: #444;
            margin-bottom: 12px;
            min-height: 34px;
        }

        .task-notes-label {
            font-size: 10px;
            font-weight: 700;
            color: #6c757d;
            margin-bottom: 3px;
        }

        .task-card-actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        /* ── BUTTONS ── */
        .btn-view-details {
            background: var(--text-neutral);
            color: var(--text-default);
            border: 1.5px solid var(--border-default);
            border-radius: 8px;
            padding: 7px 16px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.15s;
        }
        .btn-view-details:hover { background: var(--bg-hover); }

        .btn-make-started {
            background: var(--bg-primary);
            color: var(--text-neutral);
            border: none;
            border-radius: 8px;
            padding: 7px 16px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .btn-make-started:hover { opacity: 0.85; }

        .btn-make-complete {
            background: var(--accent-green);
            color: var(--text-neutral);
            border: none;
            border-radius: 8px;
            padding: 7px 16px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .btn-make-complete:hover { opacity: 0.85; }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 40px 24px;
            color: #9ca3af;
            font-size: 13px;
        }

        /* ── MODAL ── */
        .modal-card { background: white; border-radius: 12px; border: none; }
        .modal-card .modal-header { background: var(--bg-primary); border-radius: 12px 12px 0 0; border-bottom: none; padding: 16px 20px; }
        .modal-card .modal-title { font-size: 16px; font-weight: 700; color: var(--text-neutral); }
        .modal-card .modal-body { padding: 20px 24px; max-height: 70vh; overflow-y: auto; }
        .modal-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; }
        .modal-card .btn-close { filter: invert(1) brightness(2); }

        .detail-label { font-size: 11px; font-weight: 700; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 3px; }
        .detail-value { font-size: 13px; font-weight: 600; color: var(--text-default); background: #f8f9fa; border-radius: 7px; padding: 9px 13px; margin-bottom: 12px; }

        .dialog-card { border-radius: 12px; border: none; }
        .dialog-card .modal-header { background: var(--bg-primary); border-radius: 12px 12px 0 0; border-bottom: none; padding: 16px 20px; }
        .dialog-card .modal-title { font-size: 16px; font-weight: 700; color: var(--text-neutral); }
        .dialog-card .btn-close { filter: invert(1) brightness(2); }
        .dialog-card .modal-body { font-size: 13px; color: #444; padding: 16px 20px; }
        .dialog-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; }

        .btn-cancel-sm { background: #e5e7eb; color: #333; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-ok        { background: var(--bg-primary); color: white; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-ok:hover  { background: var(--accent-dark); }
        .btn-ok-green  { background: var(--accent-green); color: white; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-ok-green:hover { opacity: 0.85; }
    </style>
</head>
<body>

<div class="d-flex" style="height: 100vh;">

    <!-- SIDEBAR -->
        <div class="sidebar">
            <img src="{{ asset('images/veh_main_logo.png') }}" alt="Logo" class="sidebar-logo">
            <div class="sidebar-title">CPAMA VEH MAINTENANCE</div>
            <div class="sidebar-mechanic">
                {{ auth()->user()->is_senior ? 'Senior Mechanic' : 'Mechanic' }}: {{ auth()->user()->name }}
            </div>

            <ul class="nav flex-column w-100 gap-2 flex-grow-1">
                <li class="nav-item">
                    <a href="{{ route('mechanic.tasks') }}" class="nav-link">
                        <img src="{{ asset('images/task_icon.png') }}" alt=""> My Assigned Tasks
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mechanic.inprogress') }}" class="nav-link">
                        <img src="{{ asset('images/inprogress_icon.png') }}" alt=""> In Progress
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mechanic.completed') }}" class="nav-link">
                        <img src="{{ asset('images/maintenance_icon.png') }}" alt=""> Completed
                    </a>
                </li>
                @if(auth()->user()->is_senior)
                <li class="nav-item">
                    <a href="{{ route('mechanic.team') }}" class="nav-link active">
                        <img src="{{ asset('images/team_overview_icon.png') }}" alt=""> Team Overview
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mechanic.reports') }}" class="nav-link">
                        <img src="{{ asset('images/team_reports_icon.png') }}" alt=""> Team Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mechanic.vehicles') }}" class="nav-link">
                        <img src="{{ asset('images/customer_vehicle_icon.png') }}" alt=""> Customer Vehicles
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mechanic.assign') }}" class="nav-link">
                        <img src="{{ asset('images/assign_task_icon.png') }}" alt=""> Assign Task to Team
                    </a>
                </li>
                @endif
            </ul>

            <form method="POST" action="{{ route('logout') }}" class="w-100 mt-2">
                @csrf
                <button type="submit" class="logout-btn">
                    <img src="{{ asset('images/logout_icon.png') }}" style="width:14px; height:14px; filter: brightness(0) invert(1);">
                    Logout
                </button>
            </form>
        </div>

    <!-- ── MAIN CONTENT ── -->
    <div class="main-content flex-grow-1">

        <h1 class="page-title">Team Overview</h1>

        <!-- ══ TEAM MEMBERS TABLE ══ -->
        <div class="panel">
            <div class="panel-header">Team Members</div>
            <table class="members-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Assigned</th>
                        <th>In Progress</th>
                        <th>Completed</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mechanics as $mechanic)
                        <tr>
                            <td style="font-weight:700;">{{ $mechanic->name }}</td>
                            <td style="text-transform:capitalize;">
                                {{ str_replace('_', ' ', $mechanic->role) }}
                            </td>
                            <td>
                                <span class="status-pill {{ $mechanic->status === 'active' ? 'pill-active' : 'pill-inactive' }}">
                                    {{ ucfirst($mechanic->status) }}
                                </span>
                            </td>
                            <td>
                                <span class="count-badge badge-assigned">{{ $mechanic->assigned_count }}</span>
                            </td>
                            <td>
                                <span class="count-badge badge-inprogress">{{ $mechanic->inprogress_count }}</span>
                            </td>
                            <td>
                                <span class="count-badge badge-completed">{{ $mechanic->completed_count }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">No team members found.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ══ DELEGATED TASKS ══ -->
        <div class="panel">
            <div class="delegated-header">
                <div class="delegated-title">Team Members</div>
                <div class="delegated-subtitle">Track tasks you've delegated to team members (manual tracking)</div>
            </div>

            @if($delegatedTasks->count() > 0)
                <div class="tasks-grid">
                    @foreach($delegatedTasks as $task)
                        @php
                            $vehicle     = $task->appointment->vehicle ?? null;
                            $service     = $task->service              ?? null;
                            $mechanic    = $task->mechanic             ?? null;
                            $appointment = $task->appointment          ?? null;

                            $duration = '—';
                            if ($service && $service->estimated_duration) {
                                $mins = $service->estimated_duration;
                                $duration = $mins >= 60
                                    ? floor($mins/60) . '-' . (floor($mins/60)+1) . ' hours'
                                    : $mins . ' min';
                            }

                            $statusClass = match($task->status) {
                                'in-progress' => 'status-inprogress',
                                'completed'   => 'status-completed',
                                default       => 'status-assigned',
                            };

                            $statusLabel = match($task->status) {
                                'in-progress' => 'In Progress',
                                'completed'   => 'Completed',
                                default       => 'Assigned',
                            };
                        @endphp
                        <div class="task-card">
                            <div class="task-card-top">
                                <div>
                                    <div class="task-vehicle">
                                        Vehicle {{ $vehicle->license_plate ?? '—' }}
                                    </div>
                                    <div class="task-service">
                                        {{ $service->service_name ?? '—' }}
                                    </div>
                                </div>
                                <span class="task-status-label {{ $statusClass }}">{{ $statusLabel }}</span>
                            </div>

                            <div class="task-meta-grid">
                                <div class="task-meta-item">
                                    <div class="task-meta-label">Assigned To</div>
                                    <div class="task-meta-value">{{ $mechanic->name ?? '—' }}</div>
                                </div>
                                <div class="task-meta-item">
                                    <div class="task-meta-label">Assigned Date</div>
                                    <div class="task-meta-value">
                                        {{ $task->assigned_at
                                            ? \Carbon\Carbon::parse($task->assigned_at)->format('Y-m-d')
                                            : ($appointment && $appointment->appointment_date
                                                ? \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d')
                                                : '—') }}
                                    </div>
                                </div>
                                <div class="task-meta-item">
                                    <div class="task-meta-label">Est. Duration</div>
                                    <div class="task-meta-value">{{ $duration }}</div>
                                </div>
                            </div>

                            <div class="task-notes">
                                <div class="task-notes-label">Notes:</div>
                                {{ $task->notes ?? 'No notes.' }}
                            </div>

                            <div class="task-card-actions">
                                <button class="btn-view-details"
                                    onclick="openViewModal(
                                        '{{ addslashes($vehicle->license_plate ?? '—') }}',
                                        '{{ addslashes(($vehicle->year ?? '') . ' ' . ($vehicle->make ?? '') . ' ' . ($vehicle->model ?? '')) }}',
                                        '{{ addslashes($service->service_name ?? '—') }}',
                                        '{{ $mechanic->name ?? '—' }}',
                                        '{{ $task->assigned_at ? \Carbon\Carbon::parse($task->assigned_at)->format('Y-m-d') : '—' }}',
                                        '{{ $duration }}',
                                        '{{ $statusLabel }}',
                                        '{{ addslashes($task->notes ?? '—') }}',
                                        '{{ addslashes($task->work_description ?? '—') }}'
                                    )">
                                    View Details
                                </button>

                                @if($task->status === 'assigned')
                                    <button class="btn-make-started"
                                        onclick="openStartModal({{ $task->id }})">
                                        Make as started
                                    </button>
                                @elseif($task->status === 'in-progress')
                                    <button class="btn-make-complete"
                                        onclick="openCompleteModal({{ $task->id }})">
                                        Make as Complete
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state" style="padding: 40px;">
                    <div style="font-size:36px; margin-bottom:10px;">👥</div>
                    <div>No delegated tasks found.</div>
                </div>
            @endif
        </div>

    </div>
</div>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- MODAL — VIEW TASK DETAILS                                 -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Task Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-6">
                        <div class="detail-label">Vehicle ID</div>
                        <div class="detail-value" id="vd_plate">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Make / Model / Year</div>
                        <div class="detail-value" id="vd_makemodel">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Service</div>
                        <div class="detail-value" id="vd_service">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Assigned To</div>
                        <div class="detail-value" id="vd_mechanic">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Assigned Date</div>
                        <div class="detail-value" id="vd_date">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Est. Duration</div>
                        <div class="detail-value" id="vd_duration">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Status</div>
                        <div class="detail-value" id="vd_status">—</div>
                    </div>
                    <div class="col-12">
                        <div class="detail-label">Notes</div>
                        <div class="detail-value" id="vd_notes" style="min-height:48px;">—</div>
                    </div>
                    <div class="col-12">
                        <div class="detail-label">Work Description</div>
                        <div class="detail-value" id="vd_work" style="min-height:48px;">—</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button class="btn-ok" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- MODAL — CONFIRM START                                     -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="modal fade" id="startModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Start Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Mark this task as <strong>In Progress</strong>?</div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel-sm" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-ok" onclick="submitStart()">Yes, Start</button>
            </div>
        </div>
    </div>
</div>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- MODAL — CONFIRM COMPLETE                                  -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Complete Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Mark this task as <strong>Completed</strong>?</div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel-sm" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-ok-green" onclick="submitComplete()">Yes, Complete</button>
            </div>
        </div>
    </div>
</div>


<!-- Hidden forms -->
<form id="startForm" method="POST" style="display:none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" value="in-progress">
</form>

<form id="completeForm" method="POST" style="display:none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" value="completed">
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const viewModal     = new bootstrap.Modal(document.getElementById('viewModal'));
    const startModal    = new bootstrap.Modal(document.getElementById('startModal'));
    const completeModal = new bootstrap.Modal(document.getElementById('completeModal'));

    let currentTaskId = null;

    // ── VIEW DETAILS ──
    function openViewModal(plate, makemodel, service, mechanic, date, duration, status, notes, work) {
        document.getElementById('vd_plate').textContent    = plate;
        document.getElementById('vd_makemodel').textContent = makemodel.trim() || '—';
        document.getElementById('vd_service').textContent  = service;
        document.getElementById('vd_mechanic').textContent = mechanic;
        document.getElementById('vd_date').textContent     = date;
        document.getElementById('vd_duration').textContent = duration;
        document.getElementById('vd_status').textContent   = status;
        document.getElementById('vd_notes').textContent    = notes;
        document.getElementById('vd_work').textContent     = work;
        viewModal.show();
    }

    // ── START TASK ──
    function openStartModal(taskId) {
        currentTaskId = taskId;
        startModal.show();
    }

    function submitStart() {
        const form = document.getElementById('startForm');
        form.action = `/mechanic/tasks/${currentTaskId}/status`;
        startModal.hide();
        form.submit();
    }

    // ── COMPLETE TASK ──
    function openCompleteModal(taskId) {
        currentTaskId = taskId;
        completeModal.show();
    }

    function submitComplete() {
        const form = document.getElementById('completeForm');
        form.action = `/mechanic/tasks/${currentTaskId}/status`;
        completeModal.hide();
        form.submit();
    }
</script>
</body>
</html>