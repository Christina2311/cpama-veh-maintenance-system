<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks - CPAMA VEH MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6160A2, #6160A2, #CFCFFF);
            font-family: sans-serif;
            margin: 0;
            overflow: hidden;
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
            font-size: 36px;
            font-weight: 800;
            color: white;
            margin-bottom: 24px;
        }

        /* ── TASK CARD ── */
        .task-card {
            background: white;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            position: relative;
        }

        .task-status-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .dot-overdue     { background: #ef4444; }
        .dot-assigned    { background: #FFCC00; }
        .dot-inprogress  { background: #009951; }

        .task-vehicle {
            font-size: 14px;
            font-weight: 700;
            color: #0D0D32;
            margin-bottom: 2px;
        }

        .task-service {
            font-size: 13px;
            font-weight: 600;
            color: #6160A2;
            margin-bottom: 12px;
        }

        .task-meta {
            display: flex;
            gap: 32px;
            margin-bottom: 16px;
        }

        .task-meta-item {
            font-size: 12px;
            color: #6c757d;
        }

        .task-meta-item strong {
            color: #0D0D32;
        }

        .task-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-view {
            background: transparent;
            border: 1.5px solid #0D0D32;
            color: #0D0D32;
            border-radius: 8px;
            padding: 7px 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .btn-view:hover { background: #f0f0f0; }

        .btn-assign {
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 7px 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-assign:hover { opacity: 0.85; }

        .btn-start {
            background: #0D0D32;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 7px 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .btn-start:hover { background: #1a1a5e; }

        .btn-complete {
            background: #009951;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 7px 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-complete:hover { opacity: 0.85; }

        .empty-state {
            text-align: center;
            padding: 60px 24px;
            color: rgba(255,255,255,0.7);
            font-size: 14px;
        }

        /* ── MODALS ── */
        .modal-card {
            background: white;
            border-radius: 12px;
            border: none;
        }
        .modal-card .modal-header {
            background: #0D0D32;
            border-radius: 12px 12px 0 0;
            border-bottom: none;
            padding: 16px 20px;
        }
        .modal-card .modal-title {
            font-size: 16px;
            font-weight: 700;
            color: white;
        }
        .modal-card .modal-body {
            padding: 20px 24px;
            background: white;
        }
        .modal-card .modal-footer {
            border-top: 1px solid #eee;
            padding: 12px 20px;
            background: white;
            border-radius: 0 0 12px 12px;
        }
        .modal-card .btn-close { filter: invert(1) brightness(2); }
        .modal-label { font-size: 12px; font-weight: 600; color: #0D0D32; margin-bottom: 6px; }
        .modal-input {
            width: 100%; padding: 10px 12px; border-radius: 8px; border: 1px solid #dee2e6;
            background: #f8f9fa; font-size: 13px; color: #333;
            outline: none; box-sizing: border-box;
        }
        .modal-input:focus { background: white; border-color: #6160A2; }
        .modal-select {
            width: 100%; padding: 10px 12px; border-radius: 8px; border: 1px solid #dee2e6;
            background: #f8f9fa; font-size: 13px; color: #333;
            outline: none; cursor: pointer; appearance: none;
        }

        /* ── VIEW MODAL ── */
        .view-card { border-radius: 12px; border: none; }
        .view-card .modal-header { background: #0D0D32; border-radius: 12px 12px 0 0; padding: 16px 20px; border-bottom: none; }
        .view-card .modal-title { color: white; font-size: 16px; font-weight: 700; }
        .view-card .modal-body { padding: 20px 24px; }
        .view-label { font-size: 11px; font-weight: 700; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 2px; }
        .view-input {
            background: #ede9fe; border-radius: 8px; padding: 10px 14px;
            font-size: 13px; font-weight: 500; color: #0D0D32; margin-bottom: 12px;
        }

        /* DIALOG MODALS */
        .dialog-card { border-radius: 12px; border: none; }
        .dialog-card .modal-header { background: #0D0D32; border-radius: 12px 12px 0 0; border-bottom: none; padding: 16px 20px; }
        .dialog-card .modal-title { font-size: 16px; font-weight: 700; color: white; }
        .dialog-card .btn-close { filter: invert(1) brightness(2); }
        .dialog-card .modal-body { font-size: 13px; color: #444; padding: 16px 20px; }
        .dialog-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; }
        .btn-cancel-sm {
            background: #e5e7eb; color: #333; border: none; border-radius: 6px;
            padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer;
        }
        .btn-confirm {
            background: #0D0D32; color: white; border: none; border-radius: 6px;
            padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer;
        }
        .btn-confirm:hover { background: #1a1a5e; }
        .btn-ok {
            background: #0D0D32; color: white; border: none; border-radius: 6px;
            padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer;
        }
        .btn-ok:hover { background: #1a1a5e; }
    
        /* ══════════════════════════════════════════════
           RESPONSIVE — TABLET (≤ 768px) & PHONE (≤ 480px)
        ══════════════════════════════════════════════ */

        /* ── TABLET (iPad, ≤ 768px) ── */
        @media (max-width: 768px) {
            body { overflow: auto !important; height: auto !important; }

            .d-flex[style*="height: 100vh"],
            .d-flex[style*="height:100vh"] {
                height: auto !important;
                min-height: 100vh !important;
            }

            /* Sidebar stays left, narrows — still shows icon + label */
            .sidebar {
                width: 160px !important;
                min-width: 160px !important;
                height: 100vh !important;
                min-height: 100vh !important;
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                z-index: 100 !important;
                overflow-y: auto !important;
                padding: 16px 10px !important;
            }

            .sidebar-logo { width: 60px !important; height: 60px !important; }
            .sidebar-title { font-size: 9px !important; }
            .sidebar-mechanic,
            .sidebar-admin,
            .sidebar-role,
            .sidebar-name { font-size: 10px !important; }

            .sidebar .nav-item .nav-link {
                padding: 8px 10px !important;
                font-size: 11px !important;
                gap: 7px !important;
            }

            .logout-btn { font-size: 11px !important; padding: 8px 10px !important; }

            /* Main content offset from fixed sidebar */
            .main-content {
                margin-left: 160px !important;
                padding: 20px 16px !important;
            }

            .page-title { font-size: 24px !important; }

            /* Stat cards: 2 columns */
            .stat-grid { grid-template-columns: repeat(2, 1fr) !important; gap: 10px !important; }

            /* Task cards: 1 column */
            .tasks-grid { grid-template-columns: 1fr !important; }

            /* Tables scroll horizontally */
            .table-card, .panel, .service-panel { overflow-x: auto !important; }
            .table-card table, .perf-table, .members-table { min-width: 480px !important; }

            /* Bottom grid stacks */
            .bottom-grid { grid-template-columns: 1fr !important; }

            /* Filters wrap */
            .filters-bar, .filter-bar, .search-bar { flex-wrap: wrap !important; gap: 8px !important; }

            /* Filter period buttons wrap */
            .filter-btn { padding: 5px 10px !important; font-size: 11px !important; }
        }

        /* ── PHONE (≤ 480px) ── */
        @media (max-width: 480px) {
            /* Sidebar collapses to icons only — full height */
            .sidebar {
                width: 56px !important;
                min-width: 56px !important;
                height: 100vh !important;
                min-height: 100vh !important;
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                z-index: 100 !important;
                overflow-y: auto !important;
                padding: 16px 8px !important;
                align-items: center !important;
            }

            .sidebar-logo {
                width: 36px !important;
                height: 36px !important;
                margin-bottom: 6px !important;
            }

            /* Hide all sidebar text */
            .sidebar-title,
            .sidebar-mechanic,
            .sidebar-admin,
            .sidebar-role,
            .sidebar-name { display: none !important; }

            /* Nav links: icon only, centered */
            .sidebar ul.nav { gap: 6px !important; }
            .sidebar .nav-item { width: 100% !important; }
            .sidebar .nav-item .nav-link {
                justify-content: center !important;
                padding: 9px 0 !important;
                font-size: 0 !important;
                gap: 0 !important;
            }
            .sidebar .nav-item .nav-link img {
                width: 18px !important;
                height: 18px !important;
                margin: 0 !important;
                flex-shrink: 0 !important;
            }

            /* Logout icon only */
            .logout-btn {
                padding: 9px 0 !important;
                font-size: 0 !important;
                gap: 0 !important;
                justify-content: center !important;
            }
            .logout-btn img {
                width: 18px !important;
                height: 18px !important;
                margin: 0 !important;
            }

            /* Main content offset */
            .main-content {
                margin-left: 56px !important;
                padding: 16px 12px !important;
            }

            .page-title { font-size: 20px !important; }

            /* Stat cards: 1 column */
            .stat-grid { grid-template-columns: 1fr !important; }
            .stat-card-value { font-size: 22px !important; }

            /* Task cards: 1 column */
            .tasks-grid { grid-template-columns: 1fr !important; }

            /* Top bar stacks */
            .top-bar {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 10px !important;
            }

            /* Revenue card stacks */
            .revenue-card {
                flex-direction: column !important;
                gap: 8px !important;
            }
            .revenue-value { font-size: 20px !important; }

            /* Filters full width */
            .filter-select,
            .search-input-wrap,
            .filter-date-input { width: 100% !important; max-width: 100% !important; }

            /* Filter bar wraps */
            .filter-bar, .filters-bar, .search-bar {
                flex-wrap: wrap !important;
                gap: 8px !important;
            }

            /* Pagination stacks */
            .pagination-bar {
                flex-direction: column !important;
                gap: 8px !important;
                align-items: flex-start !important;
            }

            /* Modals full screen */
            .modal-dialog { margin: 0 !important; max-width: 100% !important; }
            .modal-content,
            .modal-card { border-radius: 0 !important; }

            /* Task detail summary row 2 cols */
            .summary-row { grid-template-columns: repeat(2, 1fr) !important; }

            /* Task meta grid 2 cols */
            .task-meta-grid { grid-template-columns: repeat(2, 1fr) !important; }

            /* Members table scrolls */
            .members-table { min-width: 400px !important; }

            /* Team stats 2 cols */
            .bottom-grid { grid-template-columns: 1fr !important; }
        }

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
                    <a href="{{ route('mechanic.tasks') }}" class="nav-link active">
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
                    <a href="{{ route('mechanic.team') }}" class="nav-link">
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
        <!--------------------------------------------------------------------------->


        <!--------------------------------------------------------------------------->
        <!-- MAIN CONTENT -->
        <div class="main-content flex-grow-1">

            <h1 class="page-title">Tasks</h1>

            @forelse($tasks as $task)
                @php
                    $isOverdue = $task->status === 'assigned'
                        && $task->appointment
                        && $task->appointment->appointment_date < now()->toDateString();
                @endphp

                <div class="task-card">
                    {{-- Status dot --}}
                    <div class="task-status-dot
                        {{ $task->status === 'in-progress' ? 'dot-inprogress' : ($isOverdue ? 'dot-overdue' : 'dot-assigned') }}">
                    </div>

                    <div class="task-vehicle">
                        {{ $task->appointment->vehicle->make ?? '' }}
                        {{ $task->appointment->vehicle->model ?? '' }}
                        {{ $task->appointment->vehicle->license_plate ? '(' . $task->appointment->vehicle->license_plate . ')' : '' }}
                    </div>

                    <div class="task-service">
                        {{ $task->service->service_name ?? '—' }}
                    </div>

                    <div class="task-meta">
                        <div class="task-meta-item">
                            Due Date: <strong>
                                {{ $task->appointment->appointment_date
                                    ? \Carbon\Carbon::parse($task->appointment->appointment_date)->format('Y-m-d')
                                    : '—' }}
                            </strong>
                        </div>
                        <div class="task-meta-item">
                            Task ID: <strong>#{{ $task->id }}</strong>
                        </div>
                        <div class="task-meta-item">
                            Status: <strong>{{ ucfirst($task->status) }}</strong>
                        </div>
                    </div>

                    <div class="task-actions">
                        {{-- View --}}
                        <button class="btn-view" onclick="openViewModal(
                            '#{{ $task->id }}',
                            '{{ addslashes(($task->appointment->vehicle->make ?? '') . ' ' . ($task->appointment->vehicle->model ?? '')) }}',
                            '{{ $task->appointment->vehicle->license_plate ?? '—' }}',
                            '{{ $task->service->service_name ?? '—' }}',
                            '{{ $task->appointment->appointment_date ? \Carbon\Carbon::parse($task->appointment->appointment_date)->format('M d, Y') : '—' }}',
                            '{{ ucfirst($task->status) }}',
                            '{{ addslashes($task->notes ?? '—') }}'
                        )">View</button>

                        {{-- Assign to Team — ONLY for Senior Mechanics --}}
                        @if(auth()->user()->is_senior)
                            <button class="btn-assign" onclick="openAssignModal(
                                {{ $task->id }},
                                '{{ addslashes(($task->appointment->vehicle->make ?? '') . ' ' . ($task->appointment->vehicle->model ?? '') . ' (' . ($task->appointment->vehicle->license_plate ?? '') . ')') }}',
                                '{{ addslashes($task->service->service_name ?? '—') }}',
                                '{{ ucfirst($task->priority ?? 'Medium') }}',
                                '{{ $task->appointment->appointment_date ? \Carbon\Carbon::parse($task->appointment->appointment_date)->format('Y-m-d') : '—' }}'
                            )">
                                Assign to Team
                            </button>
                        @endif

                        {{-- Start Task (only if assigned) --}}
                        @if($task->status === 'assigned')
                            <button class="btn-start" onclick="openStartModal({{ $task->id }})">
                                Start Task
                            </button>
                        @endif

                        {{-- Complete (only if in-progress) --}}
                        @if($task->status === 'in-progress')
                            <button class="btn-complete" onclick="openCompleteModal({{ $task->id }})">
                                Mark Complete
                            </button>
                        @endif
                    </div>
                </div>

            @empty
                <div class="empty-state">
                    <div style="font-size: 48px; margin-bottom: 12px;">✅</div>
                    <div>No tasks assigned to you yet.</div>
                </div>
            @endforelse

        </div>
    </div>
    <!--------------------------------------------------------------------------->
    

    <!--------------------------------------------------------------------------->
    <!-- MODAL — VIEW TASK DETAILS -->

    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content view-card">
                <div class="modal-header">
                    <h5 class="modal-title">Task Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="view-label">Task ID</div>
                            <div class="view-input" id="vt_id">—</div>
                        </div>
                        <div class="col-6">
                            <div class="view-label">Status</div>
                            <div class="view-input" id="vt_status">—</div>
                        </div>
                        <div class="col-6">
                            <div class="view-label">Vehicle</div>
                            <div class="view-input" id="vt_vehicle">—</div>
                        </div>
                        <div class="col-6">
                            <div class="view-label">License Plate</div>
                            <div class="view-input" id="vt_plate">—</div>
                        </div>
                        <div class="col-6">
                            <div class="view-label">Service</div>
                            <div class="view-input" id="vt_service">—</div>
                        </div>
                        <div class="col-6">
                            <div class="view-label">Due Date</div>
                            <div class="view-input" id="vt_date">—</div>
                        </div>
                        <div class="col-12">
                            <div class="view-label">Notes</div>
                            <div class="view-input" id="vt_notes" style="min-height: 60px;">—</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn-ok" style="width:100%;" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------------->

    <!--------------------------------------------------------------------------->
    <!-- MODAL — ASSIGN TO TEAM               -->

    <div class="modal fade" id="assignModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-card">
                <div class="modal-header">
                    <h5 class="modal-title">Assign to Team</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Task summary -->
                    <div style="background:#f8f9fa; border-radius:10px; padding:12px 16px; margin-bottom:16px;">
                        <div class="row g-2">
                            <div class="col-6">
                                <div style="font-size:10px; color:#6c757d; font-weight:600; margin-bottom:2px;">Vehicle:</div>
                                <div style="font-size:12px; font-weight:700; color:#0D0D32;" id="atm_vehicle">—</div>
                            </div>
                            <div class="col-6">
                                <div style="font-size:10px; color:#6c757d; font-weight:600; margin-bottom:2px;">Service Type:</div>
                                <div style="font-size:12px; font-weight:700; color:#0D0D32;" id="atm_service">—</div>
                            </div>
                            <div class="col-6">
                                <div style="font-size:10px; color:#6c757d; font-weight:600; margin-bottom:2px;">Priority:</div>
                                <div style="font-size:12px; font-weight:700; color:#0D0D32;" id="atm_priority">—</div>
                            </div>
                            <div class="col-6">
                                <div style="font-size:10px; color:#6c757d; font-weight:600; margin-bottom:2px;">Due Date:</div>
                                <div style="font-size:12px; font-weight:700; color:#0D0D32;" id="atm_due">—</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-label">Select Mechanic</div>
                    <select id="assign_mechanic" class="modal-select mb-3">
                        <option value="">Select a mechanic...</option>
                        @foreach($mechanics as $mechanic)
                            <option value="{{ $mechanic->id }}">{{ $mechanic->name }}</option>
                        @endforeach
                    </select>
                    <div class="text-danger" style="font-size:11px;" id="err_mechanic"></div>

                    <div class="modal-label mt-2">Notes (optional)</div>
                    <textarea id="assign_notes" class="modal-input" rows="3"
                        placeholder="Add instructions for the mechanic..."></textarea>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn-cancel-sm" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn-confirm" onclick="submitAssign()">Assign</button>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------------->


    <!--------------------------------------------------------------------------->
    <!-- START TASK CONFIRMATION      -->
  
    <div class="modal fade" id="startModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content dialog-card">
                <div class="modal-header">
                    <h5 class="modal-title">Start Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Are you sure you want to start this task?</div>
                <div class="modal-footer">
                    <button class="btn-cancel-sm" data-bs-dismiss="modal">No</button>
                    <button class="btn-confirm" onclick="submitStart()">Yes, Start</button>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------------->


    <!--------------------------------------------------------------------------->
    <!-- COMPLETE TASK CONFIRMATION   -->

    <div class="modal fade" id="completeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content dialog-card">
                <div class="modal-header">
                    <h5 class="modal-title">Complete Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">Mark this task as completed?</div>
                <div class="modal-footer">
                    <button class="btn-cancel-sm" data-bs-dismiss="modal">No</button>
                    <button class="btn-confirm" onclick="submitComplete()">Yes, Complete</button>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------------->


    <!--------------------------------------------------------------------------->
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

    <form id="assignForm" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="mechanic_id" id="f_mechanic_id">
        <input type="hidden" name="notes"       id="f_assign_notes">
        <input type="hidden" name="task_id"     id="f_task_id">
    </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            const viewModal     = new bootstrap.Modal(document.getElementById('viewModal'));
            const assignModal   = new bootstrap.Modal(document.getElementById('assignModal'));
            const startModal    = new bootstrap.Modal(document.getElementById('startModal'));
            const completeModal = new bootstrap.Modal(document.getElementById('completeModal'));

            let currentTaskId = null;

            // VIEW TASK 
            function openViewModal(id, vehicle, plate, service, date, status, notes) {
                document.getElementById('vt_id').textContent      = id;
                document.getElementById('vt_vehicle').textContent = vehicle.trim() || '—';
                document.getElementById('vt_plate').textContent   = plate;
                document.getElementById('vt_service').textContent = service;
                document.getElementById('vt_date').textContent    = date;
                document.getElementById('vt_status').textContent  = status;
                document.getElementById('vt_notes').textContent   = notes;
                viewModal.show();
            }

            // ASSIGN TO TEAM 
            function openAssignModal(taskId, vehicle, service, priority, dueDate) {
                currentTaskId = taskId;
                // Pre-fill summary
                const vEl = document.getElementById('atm_vehicle');
                const sEl = document.getElementById('atm_service');
                const pEl = document.getElementById('atm_priority');
                const dEl = document.getElementById('atm_due');
                if (vEl) vEl.textContent = vehicle  || '—';
                if (sEl) sEl.textContent = service  || '—';
                if (pEl) pEl.textContent = priority || 'Medium';
                if (dEl) dEl.textContent = dueDate  || '—';
                // Reset fields
                document.getElementById('assign_mechanic').value = '';
                document.getElementById('assign_notes').value    = '';
                document.getElementById('err_mechanic').textContent = '';
                assignModal.show();
            }

            function submitAssign() {
                const mechanicId = document.getElementById('assign_mechanic').value;
                if (!mechanicId) {
                    document.getElementById('err_mechanic').textContent = 'Please select a mechanic.';
                    return;
                }
                document.getElementById('f_mechanic_id').value  = mechanicId;
                document.getElementById('f_assign_notes').value = document.getElementById('assign_notes').value;
                document.getElementById('f_task_id').value      = currentTaskId;

                const form = document.getElementById('assignForm');
                form.action = `/mechanic/tasks/${currentTaskId}/assign`;
                assignModal.hide();
                form.submit();
            }

            // START TASK 
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

            // COMPLETE TASK
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
        <!--------------------------------------------------------------------------->
    
</body>
</html>