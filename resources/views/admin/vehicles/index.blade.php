<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles - CPAMA VEH MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        .layout-wrapper { height: 100vh; }

        body {
            height: 100vh;
            overflow: hidden;
            background: linear-gradient(135deg, #6160A2, #8B8AC0, #CFCFFF);
            font-family: sans-serif;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 210px;
            min-width: 210px;
            flex-shrink: 0;
            height: 100vh;
            background: #0F0F40;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px 14px;
            position: sticky;
            top: 0;
        }

        .sidebar-logo { width: 80px; height: 80px; border-radius: 50%; object-fit: cover; }

        .sidebar-title {
            font-size: 11px; font-weight: 800; text-transform: uppercase;
            color: white; text-align: center; letter-spacing: 0.5px; line-height: 1.3;
        }

        .sidebar-admin { font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.9); }

        .nav-item .nav-link {
            display: flex; align-items: center; gap: 10px; color: white;
            font-size: 12px; font-weight: 600; padding: 9px 14px; border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.15);
            background-color: rgba(255,255,255,0.08); transition: background-color 0.2s;
            text-decoration: none;
        }

        .nav-item .nav-link:hover, .nav-item .nav-link.active {
            background-color: rgba(255,255,255,0.22); color: white;
        }

        .nav-item .nav-link img { width: 15px; height: 15px; filter: brightness(0) invert(1); flex-shrink: 0; }

        .logout-btn {
            font-size: 12px; font-weight: 600; color: white; background: transparent;
            border: 1px solid rgba(255,255,255,0.3); border-radius: 8px;
            padding: 9px 14px; width: 100%; transition: background-color 0.2s; cursor: pointer;
            display: flex; align-items: center; justify-content: center; gap: 8px;
        }
        .logout-btn:hover { background-color: rgba(255,255,255,0.15); }

        /* ── MAIN ── */
        .main-content { flex: 1; overflow-y: auto; padding: 32px 28px; }
        .page-title { font-size: 28px; font-weight: 800; color: white; }

        /* ── SEARCH ── */
        .search-bar {
            background: rgba(255,255,255,0.92); border: none; border-radius: 8px;
            padding: 10px 14px 10px 40px; font-size: 13px; color: #333;
            width: 100%; outline: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .search-wrapper { position: relative; }
        .search-icon {
            position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
            pointer-events: none;
        }

        /* ── TABLE ── */
        .table-panel {
            background: rgba(255,255,255,0.92); border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;
        }
        .table-scroll { overflow-y: auto; overflow-x: auto; max-height: vh; border-radius: 8px; }
        .table { margin: 0; font-size: 13px; }
        .table thead th {
            background: #D9D9D9; color: #000000; font-weight: 700; font-size: 12px;
            border: none; padding: 12px 16px; position: sticky; top: 0; z-index: 1;
        }
        .table tbody tr { border-bottom: 1px solid rgba(0,0,0,0.05); transition: background-color 0.15s; }
        .table tbody tr:hover { background-color: rgba(97, 96, 162, 0.06); }
        .table tbody td { padding: 12px 16px; vertical-align: middle; border: none; color: #0D0D32; }

        .vehicle-id { font-weight: 700; font-size: 13px; color: #0D0D32; }
        .vehicle-plate { font-size: 11px; color: #6c757d; }

        .action-btn {
            width: 32px; height: 32px; border-radius: 6px; border: none;
            display: inline-flex; align-items: center; justify-content: center;
            cursor: pointer; transition: opacity 0.2s; font-size: 14px;
        }
        .action-btn:hover { opacity: 0.8; }
        .btn-edit { background: #3b82f6; color: white; }
        .btn-view { background: #6160A2; color: white; }

        .add-vehicle-btn {
            background: #0D0D32; color: white; border: none; border-radius: 8px;
            padding: 10px 18px; font-size: 13px; font-weight: 700; cursor: pointer;
            transition: background-color 0.2s; white-space: nowrap;
        }
        .add-vehicle-btn:hover { background: #1a1a5e; }

        .empty-state { text-align: center; padding: 30px; color: #6c757d; font-size: 13px; }

        /* ── MODALS ── */
        .modal-card { background: linear-gradient(135deg, #6160A2, #8B8AC0); border-radius: 16px; border: none; }
        .modal-card .modal-header { border-bottom: none; padding: 24px 24px 8px; }
        .modal-card .modal-title { font-size: 22px; font-weight: 800; color: white; }
        .modal-card .modal-body { padding: 16px 24px; }
        .modal-card .modal-footer { border-top: none; padding: 8px 24px 24px; }
        .modal-label { font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.85); margin-bottom: 6px; }
        .modal-input {
            width: 100%; padding: 10px 12px; border-radius: 8px; border: none;
            background: rgba(255,255,255,0.9); font-size: 13px; color: #333;
            outline: none; box-sizing: border-box;
        }
        .modal-input:focus { background: white; }
        .modal-input:disabled { background: rgba(255,255,255,0.6); color: #666; }
        .modal-select {
            width: 100%; padding: 10px 12px; border-radius: 8px; border: none;
            background: rgba(255,255,255,0.9); font-size: 13px; color: #333;
            outline: none; cursor: pointer; appearance: none;
        }
        .btn-cancel {
            background: white; color: #0D0D32; border: none; border-radius: 8px;
            padding: 10px 24px; font-size: 13px; font-weight: 700; cursor: pointer;
        }
        .btn-cancel:hover { opacity: 0.85; }
        .btn-save {
            background: #0D0D32; color: white; border: none; border-radius: 8px;
            padding: 10px 24px; font-size: 13px; font-weight: 700; cursor: pointer;
        }
        .btn-save:hover { background: #1a1a5e; }

        /* ── DIALOG MODALS ── */
        .dialog-card { border-radius: 12px; border: none; }
        .dialog-card .modal-header { border-bottom: 1px solid #eee; padding: 16px 20px; }
        .dialog-card .modal-title { font-size: 16px; font-weight: 700; color: #0D0D32; }
        .dialog-card .modal-body { font-size: 13px; color: #444; padding: 16px 20px; }
        .dialog-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; }
        .btn-ok {
            background: #0D0D32; color: white; border: none; border-radius: 6px;
            padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer;
        }
        .btn-ok:hover { background: #1a1a5e; }

        /* ── VIEW DETAILS MODAL ── */
        .view-card { border-radius: 16px; border: none; }
        .view-card .modal-header { border-bottom: 1px solid #eee; padding: 16px 20px; }
        .view-card .modal-title { font-size: 16px; font-weight: 700; color: #0D0D32; }
        .view-card .modal-body { padding: 20px 24px; }
        .view-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px; }
        .view-item label { font-size: 11px; color: #6c757d; display: block; margin-bottom: 2px; }
        .view-item strong { font-size: 14px; font-weight: 700; color: #0D0D32; display: block; }
        .view-divider { border-color: rgba(0,0,0,0.08); margin: 12px 0; }
        .view-maintenance-title { font-size: 13px; font-weight: 700; color: #0D0D32; margin-bottom: 10px; }
        .maintenance-row {
            display: flex; justify-content: space-between;
            font-size: 13px; color: #0D0D32; padding: 4px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        .maintenance-row:last-child { border-bottom: none; }
        .view-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; }
    
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
    
    
        /* ══════════════════════════════════════════════
           RESPONSIVE — TABLET (≤ 768px) & PHONE (≤ 480px)
        ══════════════════════════════════════════════ */

        /* ── TABLET (≤ 768px) ── */
        @media (max-width: 768px) {
            body { overflow: auto !important; }
            .layout-wrapper { height: auto !important; min-height: 100vh !important; }

            .sidebar {
                width: 160px !important;
                min-width: 160px !important;
                height: 100vh !important;
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                z-index: 100 !important;
                overflow-y: auto !important;
                padding: 16px 10px !important;
            }

            .sidebar-logo { width: 56px !important; height: 56px !important; }
            .sidebar-title { font-size: 9px !important; }
            .sidebar-admin { font-size: 10px !important; }
            .nav-item .nav-link { padding: 8px 10px !important; font-size: 11px !important; gap: 7px !important; }
            .logout-btn { font-size: 11px !important; padding: 8px 10px !important; }

            .main-content {
                margin-left: 160px !important;
                padding: 20px 16px !important;
                width: calc(100% - 160px) !important;
                overflow-x: hidden !important;
            }

            h1 { font-size: 24px !important; }

            /* Filters wrap */
            .d-flex.gap-2.mb-4,
            .d-flex.gap-3 { flex-wrap: wrap !important; gap: 8px !important; }

            /* Search input full width */
            .input-group { width: 100% !important; }

            /* Table scrolls horizontally */
            .card { overflow-x: auto !important; }
            .table { min-width: 600px !important; }

            /* Pagination */
            .d-flex.justify-content-between.align-items-center {
                flex-wrap: wrap !important;
                gap: 8px !important;
            }
        }

        /* ── PHONE (≤ 480px) ── */
        @media (max-width: 480px) {
            body { overflow: auto !important; }
            .layout-wrapper { height: auto !important; min-height: 100vh !important; }

            /* Sidebar: icon-only, fixed full height */
            .sidebar {
                width: 56px !important;
                min-width: 56px !important;
                height: 100vh !important;
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                z-index: 100 !important;
                overflow-y: auto !important;
                padding: 14px 8px !important;
                align-items: center !important;
            }

            .sidebar-logo { width: 34px !important; height: 34px !important; margin-bottom: 6px !important; }

            /* Hide all sidebar text */
            .sidebar-title,
            .sidebar-admin { display: none !important; }

            /* Icon-only nav links */
            .nav-item .nav-link {
                justify-content: center !important;
                padding: 9px 0 !important;
                font-size: 0 !important;
                gap: 0 !important;
            }
            .nav-item .nav-link img { width: 18px !important; height: 18px !important; margin: 0 !important; }

            /* Logout icon only */
            .logout-btn { padding: 9px 0 !important; font-size: 0 !important; gap: 0 !important; justify-content: center !important; }
            .logout-btn img { width: 18px !important; height: 18px !important; margin: 0 !important; }

            /* Main content offset */
            .main-content {
                margin-left: 56px !important;
                padding: 14px 10px !important;
                width: calc(100% - 56px) !important;
                overflow-x: hidden !important;
            }

            h1 { font-size: 20px !important; }

            /* Filters stack */
            .d-flex.gap-2.mb-4,
            .d-flex.gap-3 { flex-direction: column !important; gap: 8px !important; }
            .input-group, select { width: 100% !important; }

            /* Table scrolls */
            .card { overflow-x: auto !important; }
            .table { min-width: 540px !important; font-size: 12px !important; }

            /* Pagination stacks */
            .d-flex.justify-content-between.align-items-center {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 8px !important;
            }

            /* Modals full screen */
            .modal-dialog { margin: 0 !important; max-width: 100% !important; }
            .modal-content { border-radius: 0 !important; }
        }

    </style>
</head>
<body>

<div class="d-flex layout-wrapper">

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
                <a href="{{ route('admin.vehicles') }}" class="nav-link active">
                    <img src="{{ asset('images/vehicles_icon.png') }}" alt=""> Vehicles
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.appointments') }}" class="nav-link">
                    <img src="{{ asset('images/appointment_icon.png') }}" alt=""> Appointments
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.maintenance') }}" class="nav-link">
                    <img src="{{ asset('images/maintenance_icon.png') }}" alt=""> Maintenance
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
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
                <img src="{{ asset('images/logout_icon.png') }}" style="width:15px; height:15px; filter: brightness(0) invert(1);">
                Logout
            </button>
        </form>
    </div>

    <!-- ── MAIN CONTENT ── -->
    <div class="main-content flex-grow-1">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title mb-0">Vehicles</h1>
            <button class="add-vehicle-btn" data-bs-toggle="modal" data-bs-target="#addVehicleModal">
                + Add Vehicle
            </button>
        </div>

        <!-- Search -->
        <div class="search-wrapper mb-3">
            <span class="search-icon">
                <img src="{{ asset('images/search_icon.png') }}" style="width:14px; height:14px; opacity:0.5;">
            </span>
            <input type="text" id="searchInput" class="search-bar" placeholder="Search vehicles...">
        </div>

        <!-- Table -->
        <div class="table-panel">
            <div class="table-scroll">
                <table class="table" id="vehiclesTable">
                    <thead>
                        <tr>
                            <th>Vehicle ID</th>
                            <th>Type</th>
                            <th>Year</th>
                            <th>Mileage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($vehicles as $vehicle)
                            <tr>
                                <td>
                                    <div class="vehicle-id">
                                        {{ $vehicle->make }} {{ $vehicle->model }}
                                    </div>
                                    <div class="vehicle-plate">{{ $vehicle->license_plate }}</div>
                                </td>
                                <td>{{ $vehicle->make }}</td>
                                <td>{{ $vehicle->year }}</td>
                                <td>{{ $vehicle->mileage ? number_format($vehicle->mileage) . ' mi' : '—' }}</td>
                                <td>
                                    {{-- Edit --}}
                                    <button class="action-btn btn-edit me-1" title="Edit"
                                        onclick="openEditModal(
                                            {{ $vehicle->id }},
                                            '{{ addslashes($vehicle->make . ' ' . $vehicle->model) }}',
                                            '{{ $vehicle->year }}',
                                            '{{ $vehicle->mileage ?? '' }}',
                                            '{{ $vehicle->color ?? '' }}'
                                        )">
                                        <img src="{{ asset('images/edit_icon.png') }}" style="width:15px; height:15px; filter: brightness(0) invert(1);">
                                    </button>
                                    {{-- View --}}
                                    <button class="action-btn btn-view" title="View Details"
                                        onclick="openViewModal(
                                            '{{ addslashes($vehicle->make . ' ' . $vehicle->model) }}',
                                            '{{ $vehicle->license_plate }}',
                                            '{{ $vehicle->year }}',
                                            '{{ $vehicle->mileage ? number_format($vehicle->mileage) . ' mi' : '—' }}',
                                            '{{ $vehicle->color ?? '—' }}',
                                            '{{ $vehicle->vin ?? '—' }}',
                                            '{{ addslashes($vehicle->owner->name ?? '—') }}',
                                            {{ $vehicle->id }}
                                        )">
                                        <img src="{{ asset('images/eyes_icon.png') }}" style="width:15px; height:15px; filter: brightness(0) invert(1);">
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">No vehicles found.</td>
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
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — ADD VEHICLE                  -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="addVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Add Vehicle</h5>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="modal-label">Customer</div>
                        <select id="add_customer" class="modal-select">
                            <option value="">Select customer</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_customer"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Make</div>
                        <input type="text" id="add_make" class="modal-input" placeholder="e.g. Toyota">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_make"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Model</div>
                        <input type="text" id="add_model" class="modal-input" placeholder="e.g. Corolla">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_model"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Year</div>
                        <input type="number" id="add_year" class="modal-input" placeholder="e.g. 2020">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_year"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">License Plate</div>
                        <input type="text" id="add_plate" class="modal-input" placeholder="e.g. ABC-123">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_plate"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Color</div>
                        <input type="text" id="add_color" class="modal-input" placeholder="e.g. White">
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Mileage</div>
                        <input type="number" id="add_mileage" class="modal-input" placeholder="e.g. 45000">
                    </div>
                    <div class="col-6">
                        <div class="modal-label">VIN (optional)</div>
                        <input type="text" id="add_vin" class="modal-input" placeholder="17-character VIN">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-save" onclick="submitAddVehicle()">Add Vehicle</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — EDIT VEHICLE                 -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="editVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Edit Vehicle</h5>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="modal-label">Vehicle ID</div>
                        <input type="text" id="edit_vehicle_name" class="modal-input" disabled>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Type (Make)</div>
                        <input type="text" id="edit_make" class="modal-input" placeholder="e.g. Toyota">
                        <div class="text-danger mt-1" style="font-size:11px;" id="edit_err_make"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Year</div>
                        <input type="number" id="edit_year" class="modal-input" placeholder="e.g. 2020">
                        <div class="text-danger mt-1" style="font-size:11px;" id="edit_err_year"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Current Mileage</div>
                        <input type="number" id="edit_mileage" class="modal-input" placeholder="e.g. 45000">
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Color</div>
                        <input type="text" id="edit_color" class="modal-input" placeholder="e.g. White">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-save" onclick="submitEditVehicle()">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — VIEW VEHICLE DETAILS         -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="viewVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content view-card">
            <div class="modal-header">
                <h5 class="modal-title">Vehicle Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="view-grid">
                    <div class="view-item">
                        <label>Vehicle ID</label>
                        <strong id="vd_name">—</strong>
                    </div>
                    <div class="view-item">
                        <label>Type</label>
                        <strong id="vd_type">—</strong>
                    </div>
                    <div class="view-item">
                        <label>Year</label>
                        <strong id="vd_year">—</strong>
                    </div>
                    <div class="view-item">
                        <label>Mileage</label>
                        <strong id="vd_mileage">—</strong>
                    </div>
                    <div class="view-item">
                        <label>License Plate</label>
                        <strong id="vd_plate">—</strong>
                    </div>
                    <div class="view-item">
                        <label>Color</label>
                        <strong id="vd_color">—</strong>
                    </div>
                    <div class="view-item">
                        <label>VIN</label>
                        <strong id="vd_vin">—</strong>
                    </div>
                    <div class="view-item">
                        <label>Owner</label>
                        <strong id="vd_owner">—</strong>
                    </div>
                </div>
                <hr class="view-divider">
                <div class="view-maintenance-title">Recent Maintenance</div>
                <div id="vd_maintenance">
                    <div style="font-size:13px; color:#6c757d;">Loading...</div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-save" onclick="switchToEdit()">Edit Vehicle</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — EDIT CONFIRMATION            -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="editConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">The vehicle was successfully edited.</div>
            <div class="modal-footer">
                <button class="btn-ok" onclick="window.location.reload()">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — ADD CONFIRMATION             -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="addConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">The vehicle was successfully added.</div>
            <div class="modal-footer">
                <button class="btn-ok" onclick="window.location.reload()">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden forms -->
<form id="addVehicleForm" method="POST" action="{{ route('admin.vehicles.store') }}" style="display:none;">
    @csrf
    <input type="hidden" name="customer_id"    id="f_customer">
    <input type="hidden" name="make"           id="f_make">
    <input type="hidden" name="model"          id="f_model">
    <input type="hidden" name="year"           id="f_year">
    <input type="hidden" name="license_plate"  id="f_plate">
    <input type="hidden" name="color"          id="f_color">
    <input type="hidden" name="mileage"        id="f_mileage">
    <input type="hidden" name="vin"            id="f_vin">
</form>

<form id="editVehicleForm" method="POST" style="display:none;">
    @csrf
    @method('PUT')
    <input type="hidden" name="make"    id="ef_make">
    <input type="hidden" name="year"    id="ef_year">
    <input type="hidden" name="mileage" id="ef_mileage">
    <input type="hidden" name="color"   id="ef_color">
</form>

{{-- Maintenance data from PHP for JS --}}
<script>
    const maintenanceData = {
        @foreach($vehicles as $vehicle)
        {{ $vehicle->id }}: [
            @foreach($vehicle->appointments()->where('status', 'completed')->with('appointmentServices.service')->latest('appointment_date')->take(3)->get() as $appt)
            {
                service: "{{ addslashes($appt->appointmentServices->first()->service->service_name ?? '—') }}",
                date: "{{ $appt->appointment_date ? \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') : '—' }}"
            },
            @endforeach
        ],
        @endforeach
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const addVehicleModal   = new bootstrap.Modal(document.getElementById('addVehicleModal'));
    const editVehicleModal  = new bootstrap.Modal(document.getElementById('editVehicleModal'));
    const viewVehicleModal  = new bootstrap.Modal(document.getElementById('viewVehicleModal'));
    const editConfirmModal  = new bootstrap.Modal(document.getElementById('editConfirmModal'));
    const addConfirmModal   = new bootstrap.Modal(document.getElementById('addConfirmModal'));

    let currentVehicleId = null;

    // ── TABLE SEARCH ──
    document.getElementById('searchInput').addEventListener('input', function () {
        const q = this.value.toLowerCase();
        document.querySelectorAll('#vehiclesTable tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });

    // ── VIEW DETAILS ──
    function openViewModal(name, plate, year, mileage, color, vin, owner, vehicleId) {
        currentVehicleId = vehicleId;
        document.getElementById('vd_name').textContent    = name;
        document.getElementById('vd_type').textContent    = name.split(' ')[0]; // make
        document.getElementById('vd_year').textContent    = year;
        document.getElementById('vd_mileage').textContent = mileage;
        document.getElementById('vd_plate').textContent   = plate;
        document.getElementById('vd_color').textContent   = color;
        document.getElementById('vd_vin').textContent     = vin;
        document.getElementById('vd_owner').textContent   = owner;

        // Load maintenance
        const maintenance = maintenanceData[vehicleId] || [];
        const container   = document.getElementById('vd_maintenance');
        if (maintenance.length === 0) {
            container.innerHTML = '<div style="font-size:13px; color:#6c757d;">No maintenance records yet.</div>';
        } else {
            container.innerHTML = maintenance.map(m =>
                `<div class="maintenance-row"><span>${m.service}</span><span>${m.date}</span></div>`
            ).join('');
        }

        viewVehicleModal.show();
    }

    // ── SWITCH FROM VIEW TO EDIT ──
    function switchToEdit() {
        viewVehicleModal.hide();
        setTimeout(() => {
            document.getElementById('edit_vehicle_name').value = document.getElementById('vd_name').textContent;
            document.getElementById('edit_make').value         = document.getElementById('vd_type').textContent;
            document.getElementById('edit_year').value         = document.getElementById('vd_year').textContent;
            document.getElementById('edit_mileage').value      = document.getElementById('vd_mileage').textContent.replace(/[^0-9]/g, '');
            document.getElementById('edit_color').value        = document.getElementById('vd_color').textContent === '—' ? '' : document.getElementById('vd_color').textContent;
            editVehicleModal.show();
        }, 300);
    }

    // ── EDIT DIRECTLY FROM TABLE ──
    function openEditModal(id, name, year, mileage, color) {
        currentVehicleId = id;
        document.getElementById('edit_vehicle_name').value = name;
        document.getElementById('edit_make').value         = name.split(' ')[0];
        document.getElementById('edit_year').value         = year;
        document.getElementById('edit_mileage').value      = mileage;
        document.getElementById('edit_color').value        = color;
        document.getElementById('edit_err_make').textContent = '';
        document.getElementById('edit_err_year').textContent = '';
        editVehicleModal.show();
    }

    // ── SUBMIT EDIT ──
    function submitEditVehicle() {
        const make = document.getElementById('edit_make').value.trim();
        const year = document.getElementById('edit_year').value.trim();

        let valid = true;
        document.getElementById('edit_err_make').textContent = '';
        document.getElementById('edit_err_year').textContent = '';

        if (!make) { document.getElementById('edit_err_make').textContent = 'Make is required.'; valid = false; }
        if (!year) { document.getElementById('edit_err_year').textContent = 'Year is required.'; valid = false; }
        if (!valid) return;

        const form = document.getElementById('editVehicleForm');
        form.action = `/admin/vehicles/${currentVehicleId}`;
        document.getElementById('ef_make').value    = make;
        document.getElementById('ef_year').value    = year;
        document.getElementById('ef_mileage').value = document.getElementById('edit_mileage').value;
        document.getElementById('ef_color').value   = document.getElementById('edit_color').value;

        editVehicleModal.hide();
        form.submit();
    }

    // ── SUBMIT ADD ──
    function submitAddVehicle() {
        const customer = document.getElementById('add_customer').value;
        const make     = document.getElementById('add_make').value.trim();
        const model    = document.getElementById('add_model').value.trim();
        const year     = document.getElementById('add_year').value.trim();
        const plate    = document.getElementById('add_plate').value.trim();

        let valid = true;
        document.getElementById('err_customer').textContent = '';
        document.getElementById('err_make').textContent     = '';
        document.getElementById('err_model').textContent    = '';
        document.getElementById('err_year').textContent     = '';
        document.getElementById('err_plate').textContent    = '';

        if (!customer) { document.getElementById('err_customer').textContent = 'Please select a customer.'; valid = false; }
        if (!make)     { document.getElementById('err_make').textContent     = 'Make is required.';         valid = false; }
        if (!model)    { document.getElementById('err_model').textContent    = 'Model is required.';        valid = false; }
        if (!year)     { document.getElementById('err_year').textContent     = 'Year is required.';         valid = false; }
        if (!plate)    { document.getElementById('err_plate').textContent    = 'License plate is required.'; valid = false; }
        if (!valid) return;

        document.getElementById('f_customer').value = customer;
        document.getElementById('f_make').value     = make;
        document.getElementById('f_model').value    = model;
        document.getElementById('f_year').value     = year;
        document.getElementById('f_plate').value    = plate;
        document.getElementById('f_color').value    = document.getElementById('add_color').value.trim();
        document.getElementById('f_mileage').value  = document.getElementById('add_mileage').value.trim();
        document.getElementById('f_vin').value      = document.getElementById('add_vin').value.trim();

        addVehicleModal.hide();
        document.getElementById('addVehicleForm').submit();
    }

    // ── SHOW CONFIRMATIONS ──
    @if(session('vehicle_edited'))
        document.addEventListener('DOMContentLoaded', function () { editConfirmModal.show(); });
    @endif

    @if(session('vehicle_added'))
        document.addEventListener('DOMContentLoaded', function () { addConfirmModal.show(); });
    @endif
</script>
</body>
</html>