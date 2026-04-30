<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Records - CPAMA VEH MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6160A2, #6160A2, #CFCFFF);
            font-family: sans-serif;
            margin: 0;
            overflow: hidden;
            color: #000000;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 210px;
            min-width: 210px;
            height: 100vh;
            background: #0F0F40;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px 14px;
        }

        .sidebar-logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .sidebar-title {
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            color: white;
            text-align: center;
            letter-spacing: 0.5px;
            line-height: 1.3;
        }

        .sidebar-admin {
            font-size: 11px;
            font-weight: 600;
            color: rgba(255,255,255,0.9);
        }

        .nav-item .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 12px;
            font-weight: 600;
            padding: 9px 14px;
            border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.15);
            background-color: rgba(255,255,255,0.08);
            transition: background-color 0.2s;
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
        }

        .logout-btn:hover {
            background-color: rgba(255,255,255,0.15);
            color: white;
        }

        /* ── MAIN ── */
        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 36px 32px;
        }

        .page-title {
            font-size: 34px;
            font-weight: 800;
            color: white;
            margin-bottom: 24px;
        }

        /* ── FILTERS ── */
        .filters-bar {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
            align-items: center;
            flex-wrap: wrap;
        }

        .filter-select {
            background: white;
            border: none;
            border-radius: 8px;
            padding: 9px 14px;
            font-size: 13px;
            color: #0D0D32;
            font-weight: 500;
            cursor: pointer;
            outline: none;
            min-width: 140px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236c757d' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 28px;
        }

        .filter-date-group {
            display: flex;
            align-items: center;
            gap: 6px;
            background: white;
            border-radius: 8px;
            padding: 8px 12px;
        }

        .filter-date-input {
            border: none;
            outline: none;
            font-size: 13px;
            color: #0D0D32;
            font-weight: 500;
            width: 44px;
            text-align: center;
            background: transparent;
        }

        .filter-date-input::placeholder { color: #9ca3af; }
        .filter-date-sep { color: #9ca3af; font-size: 13px; }

        /* ── TABLE ── */
        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
        }

        .table-card table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-card thead th {
            background: white;
            padding: 14px 20px;
            font-size: 13px;
            font-weight: 700;
            color: #0D0D32;
            border-bottom: 2px solid #f0f0f0;
            white-space: nowrap;
        }

        .table-card tbody tr {
            border-bottom: 1px solid #f5f5f5;
            transition: background-color 0.15s;
        }

        .table-card tbody tr:last-child { border-bottom: none; }
        .table-card tbody tr:hover { background: #fafafa; }

        .table-card tbody td {
            padding: 13px 20px;
            font-size: 13px;
            color: #0D0D32;
            vertical-align: middle;
        }

        /* ── STATUS BADGES ── */
        .badge-status {
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-completed  { color: #065f46; }
        .badge-inprogress { color: #1e40af; }
        .badge-assigned   { color: #92400e; }
        .badge-scheduled  { color: #5b21b6; }
        .badge-cancelled  { color: #991b1b; }

        /* ── ACTION BUTTONS ── */
        .btn-action {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px 6px;
            border-radius: 6px;
            transition: background-color 0.15s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-action:hover { background: #f0f0f0; }

        .btn-action img {
            width: 16px;
            height: 16px;
            opacity: 0.65;
        }

        .btn-action:hover img { opacity: 1; }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 60px 24px;
            color: #9ca3af;
            font-size: 14px;
        }

        /* ── PAGINATION ── */
        .pagination-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            border-top: 1px solid #f0f0f0;
            font-size: 12px;
            color: #6c757d;
        }

        .pagination-bar .page-info { font-size: 12px; color: #6c757d; }

        .pagination-bar .page-btns {
            display: flex;
            gap: 4px;
        }

        .page-btn {
            background: none;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 600;
            color: #0D0D32;
            cursor: pointer;
            transition: background-color 0.15s;
        }

        .page-btn:hover, .page-btn.active { background: #0D0D32; color: white; border-color: #0D0D32; }
        .page-btn:disabled { opacity: 0.4; cursor: default; }

        /* ── MODALS ── */
        .modal-card { background: white; border-radius: 12px; border: none; }
        .modal-card .modal-header { background: #0D0D32; border-radius: 12px 12px 0 0; border-bottom: none; padding: 16px 20px; }
        .modal-card .modal-title { font-size: 16px; font-weight: 700; color: white; }
        .modal-card .modal-body { padding: 20px 24px; }
        .modal-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; border-radius: 0 0 12px 12px; }
        .modal-card .btn-close { filter: invert(1) brightness(2); }

        .detail-label { font-size: 11px; font-weight: 700; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 3px; }
        .detail-value { font-size: 13px; font-weight: 600; color: #0D0D32; background: #f8f9fa; border-radius: 7px; padding: 9px 13px; margin-bottom: 12px; }
        .detail-value.mono { font-family: monospace; font-size: 12px; }

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
        .btn-confirm-red {
            background: #ef4444; color: white; border: none; border-radius: 6px;
            padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer;
        }
        .btn-confirm-red:hover { background: #dc2626; }
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

            /* Sidebar narrows — icons + labels still visible, full height */
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
            .sidebar-admin, .sidebar-mechanic,
            .sidebar-role, .sidebar-name { font-size: 10px !important; }

            .sidebar .nav-item .nav-link {
                padding: 8px 10px !important;
                font-size: 11px !important;
                gap: 7px !important;
            }

            .logout-btn { font-size: 11px !important; padding: 8px 10px !important; }

            /* Main content offset from fixed sidebar */
            .main-content { padding: 20px 16px !important; margin-left: 160px !important; }
            .page-title { font-size: 24px !important; }

            /* Stat cards: 2 columns */
            .stat-grid { grid-template-columns: repeat(2, 1fr) !important; gap: 10px !important; }
            .row.g-3 > .col-4 { width: 50% !important; flex: 0 0 50% !important; max-width: 50% !important; }

            /* Tables scroll horizontally */
            .table-card, .panel { overflow-x: auto !important; }
            .table-card table, .perf-table { min-width: 480px !important; }

            /* Bottom grid stacks */
            .bottom-grid { grid-template-columns: 1fr !important; }

            /* Filters wrap */
            .filters-bar, .filter-bar { flex-wrap: wrap !important; gap: 8px !important; }
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

            .sidebar-logo { width: 36px !important; height: 36px !important; margin-bottom: 6px !important; }

            /* Hide all text in sidebar */
            .sidebar-title,
            .sidebar-admin,
            .sidebar-mechanic,
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

            /* Logout: icon only */
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

            /* Main content offset from fixed sidebar */
            .main-content { padding: 16px 12px !important; margin-left: 56px !important; }
            .page-title { font-size: 20px !important; }

            /* Stat cards: 1 column */
            .stat-grid { grid-template-columns: 1fr !important; }
            .row.g-3 > .col-4 { width: 100% !important; flex: 0 0 100% !important; max-width: 100% !important; }
            .stat-card-value { font-size: 24px !important; }

            /* Top bar stacks */
            .top-bar { flex-direction: column !important; align-items: flex-start !important; gap: 10px !important; }
            .btn-download { width: 100% !important; justify-content: center !important; }

            /* Revenue card stacks */
            .revenue-card { flex-direction: column !important; gap: 8px !important; }
            .revenue-value { font-size: 22px !important; }

            /* Filters full width */
            .filter-select, .search-input-wrap,
            .filter-date-input { width: 100% !important; max-width: 100% !important; }

            /* Pagination stacks */
            .pagination-bar { flex-direction: column !important; gap: 8px !important; align-items: flex-start !important; }

            /* Modals full screen */
            .modal-dialog { margin: 0 !important; max-width: 100% !important; }
            .modal-content, .modal-card { border-radius: 0 !important; }

            /* Summary row 2 cols */
            .summary-row { grid-template-columns: repeat(2, 1fr) !important; }
        }

        </style>
</head>
<body>

<div class="d-flex" style="height: 100vh;">

    <!-- ── SIDEBAR ── -->
    <div class="sidebar">
        <img src="{{ asset('images/veh_main_logo.png') }}" alt="Logo" class="sidebar-logo mb-2">
        <div class="sidebar-title mb-2">CPAMA VEH MAINTENANCE</div>
        <div class="sidebar-admin mb-3">Admin: {{ auth()->user()->name }}</div>
        
        <ul class="nav flex-column w-100 gap-2 flex-grow-1">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <img src="{{ asset('images/dashboard_icon.png') }}" alt=""> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.vehicles') }}" class="nav-link">
                    <img src="{{ asset('images/vehicles_icon.png') }}" alt=""> Vehicles
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.appointments') }}" class="nav-link">
                    <img src="{{ asset('images/appointment_icon.png') }}" alt=""> Appointments
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.maintenance') }}" class="nav-link active">
                    <img src="{{ asset('images/maintenance_icon.png') }}" alt=""> Maintenance
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.reports') }}" class="nav-link">
                    <img src="{{ asset('images/reports_icon.png') }}" alt=""> Reports
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link">
                    <img src="{{ asset('images/user_icon.png') }}" alt=""> User Management
                </a>
            </li>
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

        <h1 class="page-title">Maintenance Records</h1>

        <!-- ── FILTERS ── -->
        <form method="GET" action="{{ route('admin.maintenance') }}" id="filterForm">
            <div class="filters-bar">

                <!-- Vehicle filter -->
                <select name="vehicle_id" class="filter-select" onchange="document.getElementById('filterForm').submit()">
                    <option value="">All Vehicle</option>
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}"
                            {{ request('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                            {{ $vehicle->make }} {{ $vehicle->model }} ({{ $vehicle->license_plate }})
                        </option>
                    @endforeach
                </select>

                <!-- Status filter -->
                <select name="status" class="filter-select" onchange="document.getElementById('filterForm').submit()">
                    <option value="">All Status</option>
                    <option value="completed"   {{ request('status') === 'completed'   ? 'selected' : '' }}>Completed</option>
                    <option value="in-progress" {{ request('status') === 'in-progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="overdue"   {{ request('status') === 'overdue'   ? 'selected' : '' }}>Overdue</option>
                    <option value="assigned"    {{ request('status') === 'assigned'    ? 'selected' : '' }}>Assigned</option>
                </select>

                <!-- Date filter -->
                <div class="filter-date-group">
                    <input type="text" name="day"   class="filter-date-input" placeholder="DD"   maxlength="2" value="{{ request('day') }}">
                    <span class="filter-date-sep">/</span>
                    <input type="text" name="month" class="filter-date-input" placeholder="MM"   maxlength="2" value="{{ request('month') }}">
                    <span class="filter-date-sep">/</span>
                    <input type="text" name="year"  class="filter-date-input" placeholder="YYYY" maxlength="4" style="width:54px;" value="{{ request('year') }}">
                </div>

                @if(request()->hasAny(['vehicle_id','status','day','month','year']))
                    <a href="{{ route('admin.maintenance') }}" class="btn-cancel-sm" style="text-decoration:none;">
                        Clear
                    </a>
                @endif

            </div>
        </form>

        <!-- ── TABLE ── -->
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Cost</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        @php
                            $vehicle     = $task->appointment->vehicle  ?? null;
                            $service     = $task->service               ?? null;
                            $appointment = $task->appointment           ?? null;
                            $customer    = $appointment->customer       ?? null;
                            $mechanic    = $task->mechanic              ?? null;

                            $statusClass = match($task->status) {
                                'completed'   => 'badge-completed',
                                'in-progress' => 'badge-inprogress',
                                'assigned'    => 'badge-assigned',
                                default       => 'badge-scheduled',
                            };

                            $statusLabel = match($task->status) {
                                'completed'   => 'Completed',
                                'in-progress' => 'In Progress',
                                'assigned'    => 'Scheduled',
                                default       => ucfirst($task->status),
                            };
                        @endphp
                        <tr>
                            <td style="font-weight:600;">
                                {{ $vehicle->license_plate ?? '—' }}
                            </td>
                            <td>{{ $service->service_name ?? '—' }}</td>
                            <td>
                                {{ $appointment && $appointment->appointment_date
                                    ? \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d')
                                    : '—' }}
                            </td>
                            <td>
                                <span class="badge-status {{ $statusClass }}">{{ $statusLabel }}</span>
                            </td>
                            <td style="font-weight:600;">
                                ₱{{ $appointment ? number_format($appointment->total_amount, 2) : '0.00' }}
                            </td>
                            <td>
                                <button class="btn-action" title="Edit"
                                    onclick="openEditModal({{ $task->id }}, '{{ $task->status }}')">
                                    <img src="{{ asset('images/edit_icon.png') }}" alt="Edit">
                                </button>
                                <button class="btn-action" title="View"
                                    onclick="openViewModal(
                                        {{ $task->id }},
                                        '{{ addslashes($vehicle->license_plate ?? '—') }}',
                                        '{{ addslashes(($vehicle->year ?? '') . ' ' . ($vehicle->make ?? '') . ' ' . ($vehicle->model ?? '')) }}',
                                        '{{ addslashes($service->service_name ?? '—') }}',
                                        '{{ $appointment && $appointment->appointment_date ? \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d') : '—' }}',
                                        '{{ $statusLabel }}',
                                        '{{ $appointment ? number_format($appointment->total_amount, 2) : '0.00' }}',
                                        '{{ addslashes($customer->name ?? '—') }}',
                                        '{{ addslashes($mechanic->name ?? '—') }}',
                                        '{{ $task->started_at ? \Carbon\Carbon::parse($task->started_at)->format('Y-m-d H:i') : '—' }}',
                                        '{{ $task->completed_at ? \Carbon\Carbon::parse($task->completed_at)->format('Y-m-d H:i') : '—' }}',
                                        '{{ addslashes($task->notes ?? '—') }}',
                                        '{{ addslashes($task->work_description ?? '—') }}'
                                    )">
                                    <img src="{{ asset('images/eyes_icon.png') }}" alt="View">
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div>No maintenance records found.</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- ── PAGINATION ── -->
            @if($tasks->hasPages())
                <div class="pagination-bar">
                    <div class="page-info">
                        Showing {{ $tasks->firstItem() }}–{{ $tasks->lastItem() }} of {{ $tasks->total() }} records
                    </div>
                    <div class="page-btns">
                        @if($tasks->onFirstPage())
                            <button class="page-btn" disabled>‹</button>
                        @else
                            <a href="{{ $tasks->previousPageUrl() }}" class="page-btn">‹</a>
                        @endif

                        @foreach($tasks->getUrlRange(1, $tasks->lastPage()) as $page => $url)
                            <a href="{{ $url }}"
                               class="page-btn {{ $tasks->currentPage() === $page ? 'active' : '' }}">
                                {{ $page }}
                            </a>
                        @endforeach

                        @if($tasks->hasMorePages())
                            <a href="{{ $tasks->nextPageUrl() }}" class="page-btn">›</a>
                        @else
                            <button class="page-btn" disabled>›</button>
                        @endif
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>


<!-- ══════════════════════════════════════════════════════════ -->
<!-- MODAL — VIEW RECORD                                       -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Maintenance Record Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="max-height:70vh; overflow-y:auto;">
                <div class="row g-2">
                    <div class="col-6">
                        <div class="detail-label">Vehicle ID</div>
                        <div class="detail-value" id="vm_plate">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Make / Model / Year</div>
                        <div class="detail-value" id="vm_makemodel">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Service Type</div>
                        <div class="detail-value" id="vm_service">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Date</div>
                        <div class="detail-value" id="vm_date">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Status</div>
                        <div class="detail-value" id="vm_status">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Cost</div>
                        <div class="detail-value" id="vm_cost">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Customer</div>
                        <div class="detail-value" id="vm_customer">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Assigned Mechanic</div>
                        <div class="detail-value" id="vm_mechanic">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Started At</div>
                        <div class="detail-value" id="vm_started">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Completed At</div>
                        <div class="detail-value" id="vm_completed">—</div>
                    </div>
                    <div class="col-12">
                        <div class="detail-label">Notes</div>
                        <div class="detail-value" id="vm_notes" style="min-height:44px;">—</div>
                    </div>
                    <div class="col-12">
                        <div class="detail-label">Work Description</div>
                        <div class="detail-value" id="vm_work" style="min-height:44px;">—</div>
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
<!-- MODAL — EDIT STATUS                                       -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label style="font-size:12px; font-weight:600; color:#0D0D32; margin-bottom:6px; display:block;">Task Status</label>
                <select id="edit_status" class="form-select" style="font-size:13px; border-radius:8px;">
                    <option value="assigned">Scheduled</option>
                    <option value="in-progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel-sm" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-ok" onclick="submitEdit()">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- Hidden form for status update -->
<form id="editForm" method="POST" style="display:none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" id="f_status">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const viewModal = new bootstrap.Modal(document.getElementById('viewModal'));
    const editModal = new bootstrap.Modal(document.getElementById('editModal'));

    let currentTaskId = null;

    // ── VIEW RECORD ──
    function openViewModal(id, plate, makemodel, service, date, status, cost, customer, mechanic, started, completed, notes, work) {
        document.getElementById('vm_plate').textContent     = plate;
        document.getElementById('vm_makemodel').textContent = makemodel.trim() || '—';
        document.getElementById('vm_service').textContent   = service;
        document.getElementById('vm_date').textContent      = date;
        document.getElementById('vm_status').textContent    = status;
        document.getElementById('vm_cost').textContent      = '₱' + cost;
        document.getElementById('vm_customer').textContent  = customer;
        document.getElementById('vm_mechanic').textContent  = mechanic;
        document.getElementById('vm_started').textContent   = started;
        document.getElementById('vm_completed').textContent = completed;
        document.getElementById('vm_notes').textContent     = notes;
        document.getElementById('vm_work').textContent      = work;
        viewModal.show();
    }

    // ── EDIT STATUS ──
    function openEditModal(taskId, currentStatus) {
        currentTaskId = taskId;
        document.getElementById('edit_status').value = currentStatus;
        editModal.show();
    }

    function submitEdit() {
        const form = document.getElementById('editForm');
        form.action = `/admin/maintenance/${currentTaskId}/status`;
        document.getElementById('f_status').value = document.getElementById('edit_status').value;
        editModal.hide();
        form.submit();
    }

    // ── DATE FILTER: auto-submit on full date entry ──
    const dayInput   = document.querySelector('input[name="day"]');
    const monthInput = document.querySelector('input[name="month"]');
    const yearInput  = document.querySelector('input[name="year"]');

    function autoSubmitDate() {
        const d = dayInput.value, m = monthInput.value, y = yearInput.value;
        if ((d.length === 2 && m.length === 2 && y.length === 4) || (d === '' && m === '' && y === '')) {
            document.getElementById('filterForm').submit();
        }
    }

    [dayInput, monthInput, yearInput].forEach(el => el?.addEventListener('change', autoSubmitDate));
</script>
</body>
</html>