<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - CPAMA VEH MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        }

        .nav-item .nav-link:hover, .nav-item .nav-link.active {
            background-color: rgba(255,255,255,0.22); color: white;
        }

        .nav-item .nav-link img { width: 15px; height: 15px; filter: brightness(0) invert(1); flex-shrink: 0; }

        .logout-btn {
            font-size: 12px; font-weight: 600; color: white; background: transparent;
            border: 1px solid rgba(255,255,255,0.3); border-radius: 8px;
            padding: 9px 14px; width: 100%; transition: background-color 0.2s; cursor: pointer;
        }
        .logout-btn:hover { background-color: rgba(255,255,255,0.15); }

        /* ── MAIN ── */
        .main-content { flex: 1; overflow-y: auto; padding: 32px 28px; }
        .page-title { font-size: 28px; font-weight: 800; color: white; }

     /* ── SEARCH BAR ── */
        .search-bar {
            background: rgba(255,255,255,0.92); border: none; border-radius: 8px;
            padding: 10px 14px 10px 40px; font-size: 13px; color: #333;
            width: 100%; outline: none; box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .search-wrapper { position: relative; flex: 1; }
        .search-icon {
            position: absolute; left: 12px; top: 50%; transform: translateY(-50%);
            pointer-events: none;
        }
 
        /* ── INFO BANNER ── */
        .info-banner {
            background: rgba(255,255,255,0.92); border-radius: 10px;
            padding: 14px 18px; display: flex; align-items: flex-start; gap: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .info-banner img { width: 28px; height: 28px; flex-shrink: 0; margin-top: 2px; }
        .info-banner-title { font-size: 13px; font-weight: 700; color: #0D0D32; margin-bottom: 2px; }
        .info-banner-text  { font-size: 12px; color: #444; line-height: 1.5; }
 
        /* ── TABLE ── */
        .table-panel {
            background: rgba(255,255,255,0.92); border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;
        }
        .table-scroll { overflow-y: auto; overflow-x: auto; max-height: 60vh; border-radius: 8px; }
        .table { margin: 0; font-size: 13px; }
        .table thead th {
            background: #E3E3E3; color: #0D0D32; font-weight: 700; font-size: 12px;
            border: none; padding: 12px 16px; position: sticky; top: 0; z-index: 1;
        }
        .table tbody tr { border-bottom: 1px solid rgba(0,0,0,0.05); transition: background-color 0.15s; }
        .table tbody tr:hover { background-color: rgba(97, 96, 162, 0.06); }
        .table tbody td { padding: 12px 16px; vertical-align: middle; border: none; color: #0D0D32; }
 
        .badge-status { font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 20px; }
        .badge-pending    { background: #fef9c3; color: #854d0e; }
        .badge-confirmed  { background: #dbeafe; color: #1e40af; }
        .badge-in-progress{ background: #ede9fe; color: #5b21b6; }
        .badge-completed  { background: #d1fae5; color: #065f46; }
        .badge-cancelled  { background: #fee2e2; color: #991b1b; }
 
        .action-btn {
            width: 32px; height: 32px; border-radius: 6px; border: none;
            display: inline-flex; align-items: center; justify-content: center;
            cursor: pointer; transition: opacity 0.2s;
        }
        .action-btn:hover { opacity: 0.8; }
        .btn-edit { background: #3b82f6; color: white; }
        .btn-view { background: #6160A2; color: white; }
 
        .book-btn {
            background: #0D0D32; color: white; border: none; border-radius: 8px;
            padding: 10px 18px; font-size: 13px; font-weight: 700; cursor: pointer;
            transition: background-color 0.2s; white-space: nowrap;
        }
        .book-btn:hover { background: #1a1a5e; }
 
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
        .modal-select {
            width: 100%; padding: 10px 12px; border-radius: 8px; border: none;
            background: rgba(255,255,255,0.9); font-size: 13px; color: #333;
            outline: none; cursor: pointer; appearance: none;
        }
 
        .info-note {
            background: rgba(255,255,255,0.15); border-radius: 8px;
            padding: 10px 14px; display: flex; align-items: flex-start; gap: 10px;
            margin-bottom: 4px;
        }
        .info-note img { width: 18px; height: 18px; filter: brightness(0) invert(1); flex-shrink: 0; margin-top: 1px; }
        .info-note-text { font-size: 11px; color: rgba(255,255,255,0.9); line-height: 1.5; }
 
        .search-user-wrapper { position: relative; }
        .search-user-wrapper input { padding-right: 36px; }
        .search-user-icon {
            position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
            width: 16px; height: 16px; opacity: 0.5;
        }
        .user-dropdown {
            position: absolute; top: 100%; left: 0; right: 0; z-index: 999;
            background: white; border-radius: 8px; box-shadow: 0 4px 16px rgba(0,0,0,0.15);
            max-height: 180px; overflow-y: auto; display: none;
        }
        .user-dropdown-item {
            padding: 10px 14px; font-size: 13px; color: #0D0D32; cursor: pointer;
            border-bottom: 1px solid #f0f0f0;
        }
        .user-dropdown-item:hover { background: #f5f5ff; }
        .user-dropdown-item:last-child { border-bottom: none; }
 
        .btn-cancel {
            background: white; color: #0D0D32; border: none; border-radius: 8px;
            padding: 10px 24px; font-size: 13px; font-weight: 700; cursor: pointer;
        }
        .btn-cancel:hover { opacity: 0.85; }
        .btn-create {
            background: #0D0D32; color: white; border: none; border-radius: 8px;
            padding: 10px 24px; font-size: 13px; font-weight: 700; cursor: pointer;
        }
        .btn-create:hover { background: #1a1a5e; }
 
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
 
        /* ── VIEW MODAL ── */
        .view-card { border-radius: 16px; border: none; }
        .view-card .modal-header { background: #0D0D32; border-radius: 16px 16px 0 0; padding: 20px 24px; border-bottom: none; }
        .view-card .modal-title { color: white; font-size: 18px; font-weight: 800; }
        .view-card .modal-body { padding: 20px 24px; }
        .view-label { font-size: 11px; font-weight: 700; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 2px; }
        .view-value { font-size: 14px; font-weight: 600; color: #0D0D32; }
        .view-divider { border-color: rgba(0,0,0,0.07); margin: 12px 0; }
 
        /* ── STATUS SELECT IN EDIT ── */
        .status-select-wrapper { position: relative; }
        .status-select-wrapper::after {
            content: '▾'; position: absolute; right: 12px; top: 50%;
            transform: translateY(-50%); pointer-events: none; color: #6c757d; font-size: 12px;
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
                <a href="{{ route('admin.appointments') }}" class="nav-link active">
                    <img src="{{ asset('images/appointment_icon.png') }}" alt=""> Appointments
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
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
                <img src="{{ asset('images/logout_icon.png') }}" style="width:15px; height:15px; filter: brightness(0) invert(1); margin-right: 6px;">
                Logout
            </button>
        </form>
    </div>
 
    <!-- ── MAIN CONTENT ── -->
    <div class="main-content flex-grow-1">
 
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="page-title mb-0">Appointments</h1>
            <button class="book-btn" data-bs-toggle="modal" data-bs-target="#bookModal">
                + Book Appointment
            </button>
        </div>
 
        <!-- Search Bar -->
        <div class="search-wrapper mb-3">
            <span class="search-icon">
                <img src="{{ asset('images/search_icon.png') }}" style="width:14px; height:14px; opacity:0.5;">
            </span>
            <input type="text" id="searchInput" class="search-bar"
                placeholder="Search appointment by customer, vehicle, or service...">
        </div>
 
        <!-- Info Banner -->
        <div class="info-banner mb-3">
            <img src="{{ asset('images/reminder_icon.png') }}" alt="" style="filter: none;">
            <div>
                <div class="info-banner-title">Hybrid Service Model</div>
                <div class="info-banner-text">
                    Two ways to book: Admin can book appointments for walk-in/phone customers or customers
                    with online accounts can book themselves 24/7 through their portal.
                </div>
            </div>
        </div>
 
        <!-- Appointments Table -->
        <div class="table-panel">
            <div class="table-scroll">
                <table class="table" id="appointmentsTable">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Vehicle</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appt)
                            <tr>
                                <td>{{ $appt->customer->name ?? '—' }}</td>
                                <td>
                                    @if($appt->vehicle)
                                        {{ $appt->vehicle->make ?? '' }} {{ $appt->vehicle->model ?? '' }}
                                        <div style="font-size:11px; color:#6c757d;">{{ $appt->vehicle->plate_number ?? '' }}</div>
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>
                                    @if($appt->appointmentServices && $appt->appointmentServices->count())
                                        {{ $appt->appointmentServices->map(fn($s) => $s->service->service_name ?? '')->join(', ') }}
                                    @else
                                        —
                                    @endif
                                </td>
                                <td>{{ $appt->appointment_date ? \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') : '—' }}</td>
                                <td>{{ $appt->appointment_time ? \Carbon\Carbon::parse($appt->appointment_time)->format('h:i A') : '—' }}</td>
                                <td>
                                    <span class="badge-status badge-{{ str_replace(' ', '-', $appt->status) }}">
                                        {{ ucfirst($appt->status) }}
                                    </span>
                                </td>
                                <td>
                                    {{-- Edit Status --}}
                                    <button class="action-btn btn-edit ms-1" title="Edit Status"
                                        onclick="openEditModal({{ $appt->id }}, '{{ $appt->status }}')">
                                        <img src="{{ asset('images/edit_icon.png') }}" style="width:15px; height:15px; filter: brightness(0) invert(1);">
                                    </button>
                                    {{-- View Details --}}
                                    <button class="action-btn btn-view ms-1" title="View Details"
                                        onclick="openViewModal(
                                            '{{ addslashes($appt->customer->name ?? '—') }}',
                                            '{{ addslashes(($appt->vehicle->make ?? '') . ' ' . ($appt->vehicle->model ?? '')) }}',
                                            '{{ addslashes($appt->vehicle->plate_number ?? '—') }}',
                                            '{{ addslashes($appt->appointmentServices ? $appt->appointmentServices->map(fn($s) => $s->service->service_name ?? '')->join(', ') : '—') }}',
                                            '{{ $appt->appointment_date ? \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y') : '—' }}',
                                            '{{ $appt->appointment_time ? \Carbon\Carbon::parse($appt->appointment_time)->format('h:i A') : '—' }}',
                                            '{{ ucfirst($appt->status) }}',
                                            '{{ addslashes($appt->notes ?? '—') }}'
                                        )">
                                        <img src="{{ asset('images/eyes_icon.png') }}" style="width:15px; height:15px; filter: brightness(0) invert(1);">
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty-state">No appointments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 
<!-- ══════════════════════════════════════════ -->
<!-- MODAL — BOOK APPOINTMENT FOR CUSTOMER    -->
<!-- ══════════════════════════════════════════ -->
<div class="modal fade" id="bookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Book Appointment for Customer</h5>
            </div>
            <div class="modal-body">
 
                <!-- Info note -->
                <div class="info-note mb-3">
                    <img src="{{ asset('images/reminder_icon.png') }}" alt="">
                    <div class="info-note-text">
                        Walk-in/Phone Customers: Create their account in "User Management" tab first, then book appointment here.
                    </div>
                </div>
 
                <!-- Search User -->
                <div class="modal-label">Search Customer</div>
                <div class="search-user-wrapper mb-3">
                    <input type="text" id="userSearch" class="modal-input" placeholder="Search user by name...">
                    <img src="{{ asset('images/search_icon.png') }}" class="search-user-icon" alt="">
                    <div class="user-dropdown" id="userDropdown"></div>
                </div>
                <input type="hidden" id="selected_user_id">
 
                <div class="row g-3">
                    <div class="col-6">
                        <div class="modal-label">Vehicle</div>
                        <div class="status-select-wrapper">
                            <select id="book_vehicle" class="modal-select">
                                <option value="">Select Vehicle</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Maintenance Type</div>
                        <div class="status-select-wrapper">
                            <select id="book_service" class="modal-select">
                                <option value="">Select Type</option>
                                @foreach($services ?? [] as $service)
                                    <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Date</div>
                        <input type="date" id="book_date" class="modal-input">
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Time</div>
                        <div class="status-select-wrapper">
                            <select id="book_time" class="modal-select">
                                <option value="">Select Time...</option>
                                <option value="08:00">8:00 AM</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="13:00">1:00 PM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="16:00">4:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="modal-label">Notes</div>
                        <textarea id="book_notes" class="modal-input" rows="3" placeholder="Enter notes..."></textarea>
                    </div>
                </div>
 
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-create" onclick="submitBooking()">Book Appointment</button>
            </div>
        </div>
    </div>
</div>
 
<!-- ══════════════════════════════════════════ -->
<!-- MODAL — BOOKING CONFIRMATION             -->
<!-- ══════════════════════════════════════════ -->
<div class="modal fade" id="bookConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">The appointment was booked successfully.</div>
            <div class="modal-footer">
                <button class="btn-ok" onclick="reloadPage()">OK</button>
            </div>
        </div>
    </div>
</div>
 
<!-- ══════════════════════════════════════════ -->
<!-- MODAL — EDIT STATUS                      -->
<!-- ══════════════════════════════════════════ -->
<div class="modal fade" id="editStatusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Update Status</h5>
            </div>
            <div class="modal-body">
                <div class="modal-label">Appointment Status</div>
                <div class="status-select-wrapper">
                    <select id="edit_status" class="modal-select">
                        <option value="pending">Pending</option>
                        <option value="confirmed">Confirmed</option>
                        <option value="in-progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-create" onclick="submitStatusUpdate()">Save</button>
            </div>
        </div>
    </div>
</div>
 
<!-- ══════════════════════════════════════════ -->
<!-- MODAL — VIEW APPOINTMENT DETAILS         -->
<!-- ══════════════════════════════════════════ -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content view-card">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="view-label">Customer</div>
                        <div class="view-value" id="view_customer">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Vehicle</div>
                        <div class="view-value" id="view_vehicle">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Plate Number</div>
                        <div class="view-value" id="view_plate">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Service</div>
                        <div class="view-value" id="view_service">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Date</div>
                        <div class="view-value" id="view_date">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Time</div>
                        <div class="view-value" id="view_time">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Status</div>
                        <div class="view-value" id="view_status">—</div>
                    </div>
                    <div class="col-12">
                        <hr class="view-divider">
                        <div class="view-label">Notes</div>
                        <div class="view-value" id="view_notes" style="font-weight: 400; color: #444;">—</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-ok" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 
<!-- Hidden forms -->
<form id="bookingForm" method="POST" action="{{ route('admin.appointments.store') }}" style="display:none;">
    @csrf
    <input type="hidden" name="customer_id"          id="f_customer_id">
    <input type="hidden" name="vehicle_id"            id="f_vehicle_id">
    <input type="hidden" name="service_id"            id="f_service_id">
    <input type="hidden" name="appointment_date"      id="f_date">
    <input type="hidden" name="appointment_time"      id="f_time">
    <input type="hidden" name="notes"                 id="f_notes">
</form>
 
<form id="statusForm" method="POST" style="display:none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" id="f_status">
</form>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const bookModal        = new bootstrap.Modal(document.getElementById('bookModal'));
    const bookConfirmModal = new bootstrap.Modal(document.getElementById('bookConfirmModal'));
    const editStatusModal  = new bootstrap.Modal(document.getElementById('editStatusModal'));
    const viewModal        = new bootstrap.Modal(document.getElementById('viewModal'));
 
    // ── SEARCH CUSTOMERS ──
    const allUsers = @json($customers ?? []);
 
    document.getElementById('userSearch').addEventListener('input', function () {
        const q = this.value.toLowerCase();
        const dropdown = document.getElementById('userDropdown');
        if (!q) { dropdown.style.display = 'none'; return; }
 
        const filtered = allUsers.filter(u => u.name.toLowerCase().includes(q));
        if (!filtered.length) { dropdown.style.display = 'none'; return; }
 
        dropdown.innerHTML = filtered.map(u =>
            `<div class="user-dropdown-item" onclick="selectUser(${u.id}, '${u.name.replace(/'/g, "\\'")}', ${JSON.stringify(u.vehicles ?? [])})">${u.name}</div>`
        ).join('');
        dropdown.style.display = 'block';
    });
 
    function selectUser(id, name, vehicles) {
        document.getElementById('userSearch').value = name;
        document.getElementById('selected_user_id').value = id;
        document.getElementById('userDropdown').style.display = 'none';
 
        const vehicleSelect = document.getElementById('book_vehicle');
        vehicleSelect.innerHTML = '<option value="">Select Vehicle</option>';
        vehicles.forEach(v => {
            vehicleSelect.innerHTML += `<option value="${v.id}">${v.make ?? ''} ${v.model ?? ''} - ${v.plate_number ?? ''}</option>`;
        });
    }
 
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.search-user-wrapper') && !e.target.closest('#userDropdown')) {
            document.getElementById('userDropdown').style.display = 'none';
        }
    });
 
    // ── SUBMIT BOOKING ──
    function submitBooking() {
        const customerId = document.getElementById('selected_user_id').value;
        const vehicleId  = document.getElementById('book_vehicle').value;
        const serviceId  = document.getElementById('book_service').value;
        const date       = document.getElementById('book_date').value;
        const time       = document.getElementById('book_time').value;
        const notes      = document.getElementById('book_notes').value;
 
        if (!customerId || !vehicleId || !serviceId || !date || !time) {
            alert('Please fill in all required fields.');
            return;
        }
 
        document.getElementById('f_customer_id').value = customerId;
        document.getElementById('f_vehicle_id').value  = vehicleId;
        document.getElementById('f_service_id').value  = serviceId;
        document.getElementById('f_date').value        = date;
        document.getElementById('f_time').value        = time;
        document.getElementById('f_notes').value       = notes;
 
        bookModal.hide();
        document.getElementById('bookingForm').submit();
    }
 
    // ── EDIT STATUS ──
    let currentApptId = null;
 
    function openEditModal(id, status) {
        currentApptId = id;
        document.getElementById('edit_status').value = status;
        editStatusModal.show();
    }
 
    function submitStatusUpdate() {
        const form = document.getElementById('statusForm');
        form.action = `/admin/appointments/${currentApptId}/status`;
        document.getElementById('f_status').value = document.getElementById('edit_status').value;
        editStatusModal.hide();
        form.submit();
    }
 
    // ── VIEW DETAILS ──
    function openViewModal(customer, vehicle, plate, service, date, time, status, notes) {
        document.getElementById('view_customer').textContent = customer;
        document.getElementById('view_vehicle').textContent  = vehicle.trim() || '—';
        document.getElementById('view_plate').textContent    = plate;
        document.getElementById('view_service').textContent  = service;
        document.getElementById('view_date').textContent     = date;
        document.getElementById('view_time').textContent     = time;
        document.getElementById('view_status').textContent   = status;
        document.getElementById('view_notes').textContent    = notes;
        viewModal.show();
    }
 
    // ── TABLE SEARCH ──
    document.getElementById('searchInput').addEventListener('input', function () {
        const q = this.value.toLowerCase();
        document.querySelectorAll('#appointmentsTable tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });
 
    function reloadPage() {
        window.location.reload();
    }
 
    // ── SHOW CONFIRM MODAL AFTER BOOKING ──
    @if(session('booking_success'))
        document.addEventListener('DOMContentLoaded', function () {
            bookConfirmModal.show();
        });
    @endif
</script>
</body>
</html>