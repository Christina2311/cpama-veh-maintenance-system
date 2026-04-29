<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In Progress - CPAMA VEH MAINTENANCE</title>
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
        .main-content { flex: 1; overflow-y: auto; padding: 32px 28px; }
        .page-title { font-size: 32px; font-weight: 800; color: white; margin-bottom: 24px; }

        /* ── TASK CARD ── */
        .task-card {
            background: white;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }

        .task-vehicle {
            font-size: 15px;
            font-weight: 700;
            color: #0D0D32;
            margin-bottom: 2px;
        }

        .task-service {
            font-size: 13px;
            color: #6160A2;
            font-weight: 600;
            margin-bottom: 14px;
        }

        .task-meta {
            display: flex;
            gap: 36px;
            align-items: center;
            margin-bottom: 14px;
            flex-wrap: wrap;
        }

        .task-meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #0D0D32;
        }

        .task-meta-item img {
            width: 14px;
            height: 14px;
            opacity: 0.6;
        }

        .task-meta-item span {
            font-weight: 400;
            color: #6c757d;
        }

        .task-meta-item strong {
            font-weight: 700;
            color: #0D0D32;
        }

        .task-notes-box {
            background: #f8f8ff;
            border: 1px solid #e0dff5;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 12px;
            color: #6c757d;
            min-height: 40px;
            margin-bottom: 14px;
            font-style: italic;
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

        .btn-add-notes {
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
        .btn-add-notes:hover { opacity: 0.85; }

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
        .modal-card { background: white; border-radius: 12px; border: none; }
        .modal-card .modal-header { background: #0D0D32; border-radius: 12px 12px 0 0; border-bottom: none; padding: 16px 20px; }
        .modal-card .modal-title { font-size: 16px; font-weight: 700; color: white; }
        .modal-card .modal-body { padding: 20px 24px; background: white; }
        .modal-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; background: white; border-radius: 0 0 12px 12px; }
        .modal-card .btn-close { filter: invert(1) brightness(2); }
        .modal-label { font-size: 12px; font-weight: 600; color: #0D0D32; margin-bottom: 6px; }
        .modal-input {
            width: 100%; padding: 10px 12px; border-radius: 8px; border: 1px solid #dee2e6;
            background: #f8f9fa; font-size: 13px; color: #333;
            outline: none; box-sizing: border-box;
        }
        .modal-input:focus { background: white; border-color: #6160A2; }

        /* ── VIEW MODAL ── */
        .view-card { border-radius: 16px; border: none; }
        .view-card .modal-header { background: #0D0D32; border-radius: 16px 16px 0 0; padding: 20px 24px; border-bottom: none; }
        .view-card .modal-title { color: white; font-size: 18px; font-weight: 800; }
        .view-card .modal-body { padding: 20px 24px; }
        .view-label { font-size: 11px; font-weight: 700; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 2px; }
        .view-input {
            background: #ede9fe; border-radius: 8px; padding: 10px 14px;
            font-size: 13px; font-weight: 500; color: #0D0D32; margin-bottom: 12px;
        }

        /* ── DIALOG MODALS ── */
        .dialog-card { border-radius: 12px; border: none; }
        .dialog-card .modal-header { background: #0D0D32; border-radius: 12px 12px 0 0; border-bottom: none; padding: 16px 20px; }
        .dialog-card .modal-title { font-size: 16px; font-weight: 700; color: white; }
        .dialog-card .btn-close { filter: invert(1) brightness(2); }
        .dialog-card .modal-body { font-size: 13px; color: #444; padding: 16px 20px; }
        .dialog-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; }
        .btn-cancel-sm { background: #e5e7eb; color: #333; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-confirm-green { background: #009951; color: white; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-confirm-green:hover { background: #007a3d; }
        .btn-confirm-blue { background: #3b82f6; color: white; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-confirm-blue:hover { background: #2563eb; }
        .btn-ok { background: #0D0D32; color: white; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
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
                    <a href="{{ route('mechanic.tasks') }}" class="nav-link">
                        <img src="{{ asset('images/task_icon.png') }}" alt=""> My Assigned Tasks
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mechanic.inprogress') }}" class="nav-link active">
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

    <!-- ── MAIN CONTENT ── -->
    <div class="main-content flex-grow-1">

        <h1 class="page-title">In Progress</h1>

        @forelse($tasks as $task)
            <div class="task-card">
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
                        <img src="{{ asset('images/appointment_icon.png') }}" alt="">
                        <span>Started:</span>
                        <strong>
                            {{ $task->started_at
                                ? \Carbon\Carbon::parse($task->started_at)->format('H:i')
                                : '—' }}
                        </strong>
                    </div>
                    <div class="task-meta-item">
                        <img src="{{ asset('images/reminder_icon.png') }}" alt="">
                        <span>Est. Duration</span>
                        <strong>
                            {{ $task->service->estimated_duration
                                ? $task->service->estimated_duration . ' minutes'
                                : '—' }}
                        </strong>
                    </div>
                    <div class="task-meta-item">
                        <img src="{{ asset('images/appointment_icon.png') }}" alt="">
                        <span>Due:</span>
                        <strong>
                            {{ $task->appointment->appointment_date
                                ? \Carbon\Carbon::parse($task->appointment->appointment_date)->format('M d, Y')
                                : '—' }}
                        </strong>
                    </div>
                </div>

                {{-- Notes box --}}
                <div class="task-notes-box">
                    {{ $task->notes ?? $task->work_description ?? 'No notes yet.' }}
                </div>

                <div class="task-actions">
                    {{-- View --}}
                    <button class="btn-view" onclick="openViewModal(
                        {{ $task->id }},
                        '{{ addslashes(($task->appointment->vehicle->make ?? '') . ' ' . ($task->appointment->vehicle->model ?? '')) }}',
                        '{{ addslashes(($task->appointment->vehicle->year ?? '') . ' ' . ($task->appointment->vehicle->make ?? '') . ' ' . ($task->appointment->vehicle->model ?? '')) }}',
                        '{{ $task->appointment->vehicle->license_plate ?? '—' }}',
                        '{{ $task->appointment->vehicle->mileage ? number_format($task->appointment->vehicle->mileage) : '—' }}',
                        '{{ $task->appointment->vehicle->vin ?? '—' }}',
                        '{{ addslashes($task->service->service_name ?? '—') }}',
                        '{{ $task->appointment->appointment_date ? \Carbon\Carbon::parse($task->appointment->appointment_date)->format('Y-m-d') : '—' }}',
                        '{{ ucfirst($task->status) }}',
                        '{{ addslashes($task->notes ?? $task->appointment->notes ?? '—') }}',
                        '{{ addslashes($task->appointment->customer->name ?? '—') }}',
                        '{{ addslashes($task->appointment->customer->phone ?? '—') }}',
                        '{{ addslashes($task->appointment->customer->email ?? '—') }}'
                    )">View</button>

                    {{-- Add Notes --}}
                    <button class="btn-add-notes" onclick="openNotesModal({{ $task->id }}, '{{ addslashes($task->notes ?? '') }}')">
                        Add Notes
                    </button>

                    {{-- Make Complete --}}
                    <button class="btn-complete" onclick="openCompleteModalDirect(
                        {{ $task->id }},
                        '{{ addslashes(($task->appointment->vehicle->make ?? '') . ' ' . ($task->appointment->vehicle->model ?? '')) }}',
                        '{{ addslashes($task->service->service_name ?? '—') }}',
                        '{{ $task->started_at ? \Carbon\Carbon::parse($task->started_at)->format('H:i') : '—' }}',
                        '{{ addslashes($task->notes ?? '') }}'
                    )">
                        Make Complete
                    </button>
                </div>
            </div>

        @empty
            <div class="empty-state">
                <div style="font-size: 48px; margin-bottom: 12px;">⚙️</div>
                <div>No tasks currently in progress.</div>
            </div>
        @endforelse

    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — TASK DETAILS (VIEW)          -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius:12px; border:none;">
            <div class="modal-header" style="background:#0D0D32; border-radius:12px 12px 0 0; border-bottom:none; padding:16px 20px;">
                <h5 class="modal-title" style="font-size:16px; font-weight:700; color:white;">Task Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter:invert(1) brightness(2);"></button>
            </div>
            <div class="modal-body" style="padding:20px 24px; max-height:70vh; overflow-y:auto;">
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <div style="font-size:11px; color:#6c757d; margin-bottom:2px;">Vehicle</div>
                        <div style="font-size:14px; font-weight:700; color:#0D0D32;" id="vt_vehicle">—</div>
                    </div>
                    <div class="col-6">
                        <div style="font-size:11px; color:#6c757d; margin-bottom:2px;">Service Type</div>
                        <div style="font-size:14px; font-weight:700; color:#0D0D32;" id="vt_service">—</div>
                    </div>
                    <div class="col-6">
                        <div style="font-size:11px; color:#6c757d; margin-bottom:2px;">Priority</div>
                        <span style="font-size:12px; font-weight:600; padding:3px 12px; border-radius:20px; border:1.5px solid #ef4444; color:#ef4444; background:#fef2f2;">High Priority</span>
                    </div>
                    <div class="col-6">
                        <div style="font-size:11px; color:#6c757d; margin-bottom:2px;">Due Date</div>
                        <div style="font-size:14px; font-weight:700; color:#0D0D32;" id="vt_due">—</div>
                    </div>
                    <div class="col-6">
                        <div style="font-size:11px; color:#6c757d; margin-bottom:2px;">Task ID</div>
                        <div style="font-size:14px; font-weight:700; color:#0D0D32;" id="vt_id">—</div>
                    </div>
                    <div class="col-6">
                        <div style="font-size:11px; color:#6c757d; margin-bottom:2px;">Status</div>
                        <div style="font-size:14px; font-weight:700; color:#0D0D32;" id="vt_status">—</div>
                    </div>
                </div>
                <hr style="border-color:rgba(0,0,0,0.08); margin:12px 0;">
                <div style="font-size:14px; font-weight:700; color:#0D0D32; margin-bottom:10px;">Vehicle Information</div>
                <div style="background:#f8f9fa; border-radius:8px; padding:14px 16px; margin-bottom:16px; font-size:13px; color:#0D0D32;">
                    <div class="d-flex justify-content-between mb-2"><span style="color:#6c757d;">Make/Model:</span><span id="vt_makemodel" style="font-weight:600;">—</span></div>
                    <div class="d-flex justify-content-between mb-2"><span style="color:#6c757d;">License Plate:</span><span id="vt_plate" style="font-weight:600;">—</span></div>
                    <div class="d-flex justify-content-between mb-2"><span style="color:#6c757d;">Current Mileage:</span><span id="vt_mileage" style="font-weight:600;">—</span></div>
                    <div class="d-flex justify-content-between"><span style="color:#6c757d;">VIN:</span><span id="vt_vin" style="font-weight:600;">—</span></div>
                </div>
                <div style="font-size:14px; font-weight:700; color:#0D0D32; margin-bottom:10px;">Service Instructions</div>
                <div id="vt_notes" style="background:#f8f9fa; border-radius:8px; padding:14px 16px; font-size:13px; color:#444; margin-bottom:16px; min-height:60px;">—</div>
                <div style="font-size:14px; font-weight:700; color:#0D0D32; margin-bottom:10px;">Customer Contact</div>
                <div style="background:#f8f9fa; border-radius:8px; padding:14px 16px; font-size:13px; color:#0D0D32;">
                    <div><strong>Name:</strong> <span id="vt_customer_name">—</span></div>
                    <div><strong>Phone:</strong> <span id="vt_customer_phone">—</span></div>
                    <div><strong>Email:</strong> <span id="vt_customer_email">—</span></div>
                </div>
            </div>
            <div class="modal-footer" style="border-top:1px solid #eee; padding:12px 20px; justify-content:space-between;">
                <button class="btn-cancel-sm" data-bs-dismiss="modal">Close</button>
                <button class="btn-confirm-green" onclick="switchToComplete()">Start Task</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — ADD NOTES                    -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="notesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Add Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="modal-label">Work Notes</div>
                <textarea id="notes_input" class="modal-input" rows="4"
                    placeholder="Describe the work done, issues found, parts used..."></textarea>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel-sm" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-confirm-blue" onclick="submitNotes()">Save Notes</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — COMPLETE TASK               -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="completeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius:12px; border:none;">
            <div class="modal-header" style="background:#0D0D32; border-radius:12px 12px 0 0; border-bottom:none; padding:16px 20px;">
                <h5 class="modal-title" style="font-size:16px; font-weight:700; color:white;">Complete Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" style="filter:invert(1) brightness(2);"></button>
            </div>
            <div class="modal-body" style="padding:20px 24px; max-height:70vh; overflow-y:auto;">
                <div style="background:#f8f9fa; border-radius:8px; padding:14px 16px; margin-bottom:16px;">
                    <div class="row" style="font-size:13px;">
                        <div class="col-6 mb-2">
                            <span style="color:#6c757d; font-size:11px;">Vehicle:</span>
                            <div style="font-weight:700; color:#0D0D32;" id="ct_vehicle">—</div>
                        </div>
                        <div class="col-6 mb-2">
                            <span style="color:#6c757d; font-size:11px;">Service Type:</span>
                            <div style="font-weight:700; color:#6160A2;" id="ct_service">—</div>
                        </div>
                        <div class="col-6">
                            <span style="color:#6c757d; font-size:11px;">Started At:</span>
                            <div style="font-weight:700; color:#0D0D32;" id="ct_started">—</div>
                        </div>
                        <div class="col-6">
                            <span style="color:#6c757d; font-size:11px;">Priority:</span>
                            <div style="font-weight:700; color:#ef4444;">High</div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <label style="font-size:13px; font-weight:600; color:#0D0D32; margin-bottom:4px;">End Time *</label>
                        <input type="time" id="ct_end_time" class="form-control" style="font-size:13px; border-radius:8px;">
                    </div>
                    <div class="col-12">
                        <label style="font-size:13px; font-weight:600; color:#0D0D32; margin-bottom:4px;">Work Completed Summary *</label>
                        <textarea id="ct_summary" class="form-control" rows="3" style="font-size:13px; border-radius:8px; resize:vertical;"
                            placeholder="Describe the work performed (e.g., Changed oil and filter, rotated tires, etc.)..."></textarea>
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_summary"></div>
                    </div>
                    <div class="col-12">
                        <label style="font-size:13px; font-weight:600; color:#0D0D32; margin-bottom:4px;">Parts Used</label>
                        <textarea id="ct_parts" class="form-control" rows="2" style="font-size:13px; border-radius:8px; resize:vertical;"
                            placeholder="List parts used with quantities (e.g., Oil Filter x1, Motor Oil 5W-30 x5 quarts)..."></textarea>
                    </div>
                    <div class="col-6">
                        <label style="font-size:13px; font-weight:600; color:#0D0D32; margin-bottom:4px;">Labor Cost *</label>
                        <div style="position:relative;">
                            <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); font-size:13px; color:#6c757d;">₱</span>
                            <input type="number" id="ct_labor_cost" class="form-control" style="font-size:13px; border-radius:8px; padding-left:28px;" placeholder="0.00" step="0.01" min="0">
                        </div>
                    </div>
                    <div class="col-6">
                        <label style="font-size:13px; font-weight:600; color:#0D0D32; margin-bottom:4px;">Parts Cost</label>
                        <div style="position:relative;">
                            <span style="position:absolute; left:12px; top:50%; transform:translateY(-50%); font-size:13px; color:#6c757d;">₱</span>
                            <input type="number" id="ct_parts_cost" class="form-control" style="font-size:13px; border-radius:8px; padding-left:28px;" placeholder="0.00" step="0.01" min="0">
                        </div>
                    </div>
                    <div class="col-12">
                        <label style="font-size:13px; font-weight:600; color:#0D0D32; margin-bottom:4px;">Recommendations for Customer</label>
                        <textarea id="ct_recommendations" class="form-control" rows="2" style="font-size:13px; border-radius:8px; resize:vertical;"
                            placeholder="Any recommendations or future maintenance needed..."></textarea>
                    </div>
                    <div class="col-12">
                        <label style="font-size:13px; font-weight:600; color:#0D0D32; margin-bottom:4px;">Work Notes History</label>
                        <textarea id="ct_notes_history" class="form-control" rows="2" style="font-size:13px; border-radius:8px; background:#f8f9fa;" readonly></textarea>
                    </div>
                    <div class="col-12">
                        <div style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:8px; padding:10px 14px; font-size:12px; color:#065f46;">
                            <strong>Note:</strong> Completing this task will move it to your completed tasks and notify the customer.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border-top:1px solid #eee; padding:12px 20px; justify-content:space-between;">
                <button class="btn-cancel-sm" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-confirm-green" onclick="submitComplete()">✓ Confirm & Mark Complete</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — SUCCESS                      -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="success_message">Done!</div>
            <div class="modal-footer">
                <button class="btn-ok" onclick="window.location.reload()">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden forms -->
<form id="completeForm" method="POST" style="display:none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status"           value="completed">
    <input type="hidden" name="work_description" id="f_summary">
    <input type="hidden" name="notes"            id="f_complete_notes">
</form>

<form id="notesForm" method="POST" style="display:none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="notes" id="f_notes">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const viewModal     = new bootstrap.Modal(document.getElementById('viewModal'));
    const notesModal    = new bootstrap.Modal(document.getElementById('notesModal'));
    const completeModal = new bootstrap.Modal(document.getElementById('completeModal'));
    const successModal  = new bootstrap.Modal(document.getElementById('successModal'));

    let currentTaskId   = null;
    let currentTaskData = {};

    // ── VIEW TASK DETAILS ──
    function openViewModal(id, vehicle, makemodel, plate, mileage, vin, service, due, status, notes, customerName, customerPhone, customerEmail) {
        currentTaskId   = id;
        currentTaskData = { vehicle, makemodel, service, notes };

        document.getElementById('vt_id').textContent             = '#' + id;
        document.getElementById('vt_vehicle').textContent        = vehicle.trim() || '—';
        document.getElementById('vt_service').textContent        = service;
        document.getElementById('vt_due').textContent            = due;
        document.getElementById('vt_status').textContent         = status;
        document.getElementById('vt_makemodel').textContent      = makemodel.trim() || '—';
        document.getElementById('vt_plate').textContent          = plate;
        document.getElementById('vt_mileage').textContent        = mileage ? mileage + ' mi' : '—';
        document.getElementById('vt_vin').textContent            = vin || '—';
        document.getElementById('vt_notes').textContent          = notes || 'No service instructions.';
        document.getElementById('vt_customer_name').textContent  = customerName || '—';
        document.getElementById('vt_customer_phone').textContent = customerPhone || '—';
        document.getElementById('vt_customer_email').textContent = customerEmail || '—';
        viewModal.show();
    }

    // ── SWITCH FROM VIEW → COMPLETE ──
    function switchToComplete() {
        viewModal.hide();
        setTimeout(() => {
            fillCompleteModal(currentTaskData.vehicle, currentTaskData.service, currentTaskData.notes);
            completeModal.show();
        }, 300);
    }

    // ── FILL COMPLETE MODAL ──
    function fillCompleteModal(vehicle, service, notes) {
        document.getElementById('ct_vehicle').textContent  = vehicle || '—';
        document.getElementById('ct_service').textContent  = service || '—';
        document.getElementById('ct_notes_history').value  = notes || '';
        document.getElementById('ct_summary').value         = '';
        document.getElementById('ct_parts').value           = '';
        document.getElementById('ct_labor_cost').value      = '';
        document.getElementById('ct_parts_cost').value      = '';
        document.getElementById('ct_recommendations').value = '';
        document.getElementById('err_summary').textContent  = '';
        const now = new Date();
        document.getElementById('ct_started').textContent  = '—';
        document.getElementById('ct_end_time').value =
            String(now.getHours()).padStart(2,'0') + ':' + String(now.getMinutes()).padStart(2,'0');
    }

    // ── MAKE COMPLETE FROM CARD ──
    function openCompleteModalDirect(taskId, vehicle, service, started, notes) {
        currentTaskId = taskId;
        fillCompleteModal(vehicle, service, notes);
        document.getElementById('ct_started').textContent = started || '—';
        completeModal.show();
    }

    // ── SUBMIT COMPLETE ──
    function submitComplete() {
        const summary = document.getElementById('ct_summary').value.trim();
        document.getElementById('err_summary').textContent = '';
        if (!summary) {
            document.getElementById('err_summary').textContent = 'Work summary is required.';
            return;
        }
        const form = document.getElementById('completeForm');
        form.action = `/mechanic/tasks/${currentTaskId}/status`;
        document.getElementById('f_summary').value        = summary;
        document.getElementById('f_complete_notes').value = document.getElementById('ct_recommendations').value;
        completeModal.hide();
        form.submit();
    }

    // ── ADD NOTES ──
    function openNotesModal(taskId, currentNotes) {
        currentTaskId = taskId;
        document.getElementById('notes_input').value = currentNotes;
        notesModal.show();
    }

    function submitNotes() {
        const form = document.getElementById('notesForm');
        form.action = `/mechanic/tasks/${currentTaskId}/notes`;
        document.getElementById('f_notes').value = document.getElementById('notes_input').value;
        notesModal.hide();
        form.submit();
    }

    // ── SHOW SUCCESS ──
    @if(session('notes_saved'))
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('success_message').textContent = 'Notes saved successfully.';
            successModal.show();
        });
    @endif
</script>
</body>
</html>