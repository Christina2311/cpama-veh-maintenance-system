<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Vehicles - CPAMA VEH MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6160A2, #6160A2, #CFCFFF);
            font-family: sans-serif;
            margin: 0;
        }

        /* ── TOP NAV ── */
        .top-nav {
            background: #0F0F40;
            padding: 0 28px;
            display: flex;
            align-items: center;
            height: 56px;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .top-nav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .top-nav-logo img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        .top-nav-links {
            display: flex;
            align-items: center;
            gap: 4px;
            flex: 1;
        }

        .top-nav-links a {
            color: rgba(255,255,255,0.75);
            font-size: 13px;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.2s, color 0.2s;
        }

        .top-nav-links a:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .top-nav-links a.active {
            background: rgba(255,255,255,0.15);
            color: white;
        }

        .top-nav-logout {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            font-size: 12px;
            font-weight: 600;
            padding: 7px 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .top-nav-logout:hover { background: rgba(255,255,255,0.1); }

        /* ── HAMBURGER ── */
        .nav-hamburger {
            display: none;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 6px 4px;
            margin-left: auto;
            flex-shrink: 0;
        }
        .nav-hamburger span {
            display: block;
            width: 22px;
            height: 2px;
            background: white;
            border-radius: 2px;
            transition: all 0.25s;
        }

        /* ── MOBILE MENU DRAWER ── */
        .mobile-menu {
            display: none;
            flex-direction: column;
            background: #0F0F40;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 12px 16px 16px;
            position: sticky;
            top: 56px;
            z-index: 99;
        }
        .mobile-menu.open { display: flex; }
        .mobile-menu a {
            color: rgba(255,255,255,0.8);
            font-size: 14px;
            font-weight: 600;
            padding: 12px 14px;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.2s;
        }
        .mobile-menu a.active { background: rgba(255,255,255,0.15); color: white; }
        .mobile-menu a:hover  { background: rgba(255,255,255,0.08); }
        .mobile-menu-logout {
            margin-top: 8px;
            background: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            font-size: 13px;
            font-weight: 600;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
            width: 100%;
        }
        .mobile-menu-logout:hover { background: rgba(255,255,255,0.1); }

        /* ── MAIN CONTENT ── */
        .main-content {
            padding: 36px 40px;
            max-width: 960px;
            margin: 0 auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            color: white;
            margin: 0;
        }

        .customer-label {
            font-size: 13px;
            font-weight: 600;
            color: rgba(255,255,255,0.85);
            margin-bottom: 24px;
        }

        .add-vehicle-btn {
            background: #0D0D32;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.2s;
            white-space: nowrap;
        }
        .add-vehicle-btn:hover { background: #1a1a5e; }

        /* ── VEHICLE CARD ── */
        .vehicle-card {
            background: white;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            position: relative;
        }

        .vehicle-status-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .dot-active   { background: #009951; }
        .dot-inactive { background: #FFCC00; }
        .dot-unknown  { background: #D1D5DB; }

        .vehicle-name {
            font-size: 15px;
            font-weight: 700;
            color: #0D0D32;
            margin-bottom: 2px;
        }

        .vehicle-plate {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 16px;
        }

        .service-dates {
            display: flex;
            gap: 48px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .service-date-group label {
            font-size: 11px;
            font-weight: 700;
            color: #6c757d;
            display: block;
            margin-bottom: 6px;
        }

        .date-boxes {
            display: flex;
            gap: 6px;
        }

        .date-box {
            background: #f5f5f5;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 6px 10px;
            font-size: 12px;
            font-weight: 600;
            color: #0D0D32;
            min-width: 44px;
            text-align: center;
        }

        .date-box.empty {
            color: #aaa;
        }

        .vehicle-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-view-details {
            background: transparent;
            border: 1.5px solid #0D0D32;
            color: #0D0D32;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .btn-view-details:hover { background: #f0f0f0; }

        .btn-schedule {
            background: #0D0D32;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-schedule:hover { background: #1a1a5e; color: white; }

        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: rgba(255,255,255,0.7);
            font-size: 14px;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 12px;
            opacity: 0.5;
        }

        /* ── MODALS ── */
        .modal-card { background: linear-gradient(135deg, #6160A2, #8B8AC0); border-radius: 16px; border: none; }
        .modal-card .modal-header { border-bottom: none; padding: 24px 24px 8px; }
        .modal-card .modal-title { font-size: 20px; font-weight: 800; color: white; }
        .modal-card .modal-body { padding: 16px 24px; }
        .modal-card .modal-footer { border-top: none; padding: 8px 24px 24px; }

        .modal-label { font-size: 12px; font-weight: 600; color: rgba(255,255,255,0.85); margin-bottom: 6px; }
        .modal-input {
            width: 100%; padding: 10px 12px; border-radius: 8px; border: none;
            background: rgba(255,255,255,0.9); font-size: 13px; color: #333;
            outline: none; box-sizing: border-box;
        }
        .modal-input:focus { background: white; }

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
        .view-card .modal-header { background: #0D0D32; border-radius: 16px 16px 0 0; padding: 20px 24px; border-bottom: none; }
        .view-card .modal-title { color: white; font-size: 18px; font-weight: 800; }
        .view-card .modal-body { padding: 20px 24px; }
        .view-label { font-size: 11px; font-weight: 700; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px; }
        .view-value { font-size: 14px; font-weight: 600; color: #0D0D32; margin-bottom: 12px; }
        .view-input {
            background: #ede9fe; border-radius: 8px; padding: 10px 14px;
            font-size: 13px; font-weight: 500; color: #0D0D32; margin-bottom: 4px;
        }
        .modal-select {
            width: 100%; padding: 10px 12px; border-radius: 8px; border: none;
            background: rgba(255,255,255,0.9); font-size: 13px; color: #333;
            outline: none; cursor: pointer; appearance: none;
        }
        .info-note {
            background: rgba(255,255,255,0.15); border-radius: 8px;
            padding: 10px 14px; display: flex; align-items: flex-start; gap: 10px;
        }
        .info-note img { width: 18px; height: 18px; filter: brightness(0) invert(1); flex-shrink: 0; margin-top: 1px; }
        .info-note-text { font-size: 11px; color: rgba(255,255,255,0.95); line-height: 1.5; font-weight: 600; }

        /* ══════════════════════════════════════
           TABLET  (≤ 768px)
        ══════════════════════════════════════ */
        @media (max-width: 768px) {
            /* Nav */
            .top-nav { padding: 0 16px; gap: 12px; }
            .top-nav-links { display: none; }
            .nav-logout-form { display: none !important; }
            .nav-hamburger { display: flex; }

            /* Main content */
            .main-content { padding: 24px 16px; }
            .page-title { font-size: 24px; }

            /* Vehicle card */
            .vehicle-card { padding: 16px; }
            .service-dates { gap: 24px; }

            /* Action buttons — side by side, equal width */
            .vehicle-actions { flex-wrap: wrap; }
            .btn-view-details,
            .btn-schedule { flex: 1 1 0; text-align: center; }

            /* Modals */
            .modal-dialog { margin: 12px; max-width: calc(100vw - 24px); }
        }

        /* ══════════════════════════════════════
           PHONE  (≤ 480px)
        ══════════════════════════════════════ */
        @media (max-width: 480px) {
            .top-nav-logo { font-size: 10px; gap: 8px; }
            .top-nav-logo img { width: 26px; height: 26px; }

            .page-title { font-size: 20px; }
            .customer-label { font-size: 12px; }

            /* Stack page-header vertically */
            .page-header { flex-direction: column; gap: 10px; }
            .add-vehicle-btn { width: 100%; font-size: 13px; text-align: center; }

            /* Vehicle card */
            .vehicle-card { padding: 14px 12px; }
            .vehicle-name { font-size: 14px; padding-right: 24px; }

            /* Date boxes */
            .date-box { padding: 5px 6px; min-width: 32px; font-size: 11px; }

            /* Stack service date groups vertically */
            .service-dates { flex-direction: column; gap: 14px; margin-bottom: 16px; }

            /* Action buttons — stack vertically */
            .vehicle-actions { flex-direction: column; gap: 8px; }
            .btn-view-details,
            .btn-schedule {
                width: 100%;
                text-align: center;
                padding: 11px 10px;
                display: block;
                flex: none;
            }

            /* Modals */
            .modal-dialog { margin: 8px; max-width: calc(100vw - 16px); }
            .modal-card { border-radius: 12px; }

            /* Modal form cols: force single column */
            .modal .col-6 {
                width: 100% !important;
                flex: 0 0 100% !important;
                max-width: 100% !important;
            }
        }
    </style>
</head>
<body>

<!-- ── TOP NAV ── -->
<nav class="top-nav">
    <a href="{{ route('customer.dashboard') }}" class="top-nav-logo">
        <img src="{{ asset('images/veh_main_logo.png') }}" alt="Logo">
        CPAMA VEH MAINTENANCE
    </a>
    <div class="top-nav-links">
        <a href="{{ route('customer.dashboard') }}" class="active">My Vehicles</a>
        <a href="{{ route('customer.appointments') }}">Appointments</a>
        <a href="{{ route('customer.history') }}">Service History</a>
    </div>
    <form method="POST" action="{{ route('logout') }}" class="nav-logout-form" style="display:flex;align-items:center;">
        @csrf
        <button type="submit" class="top-nav-logout">
            <img src="{{ asset('images/logout_icon.png') }}" style="width:13px; height:13px; filter: brightness(0) invert(1);">
            Logout
        </button>
    </form>
    <button class="nav-hamburger" id="navHamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span><span></span><span></span>
    </button>
</nav>

<!-- ── MOBILE MENU DRAWER ── -->
<div class="mobile-menu" id="mobileMenu">
    <a href="{{ route('customer.dashboard') }}" class="active">My Vehicles</a>
    <a href="{{ route('customer.appointments') }}">Appointments</a>
    <a href="{{ route('customer.history') }}">Service History</a>
    <form method="POST" action="{{ route('logout') }}" style="margin:0;">
        @csrf
        <button type="submit" class="mobile-menu-logout">
            <img src="{{ asset('images/logout_icon.png') }}" style="width:13px; height:13px; filter: brightness(0) invert(1);">
            Logout
        </button>
    </form>
</div>

<!-- ── MAIN CONTENT ── -->
<div class="main-content">

    <div class="page-header">
        <div>
            <h1 class="page-title">My Vehicles</h1>
            <div class="customer-label">Customer: {{ auth()->user()->name }}</div>
        </div>
        <button class="add-vehicle-btn" data-bs-toggle="modal" data-bs-target="#addVehicleModal">
            + Add Vehicle
        </button>
    </div>

    @forelse($vehicles as $vehicle)
        @php
            $lastAppt = $vehicle->appointments()
                ->where('status', 'completed')
                ->orderBy('appointment_date', 'desc')
                ->first();

            $nextAppt = $vehicle->appointments()
                ->whereIn('status', ['pending', 'confirmed'])
                ->where('appointment_date', '>=', now()->toDateString())
                ->orderBy('appointment_date', 'asc')
                ->first();

            $overdueAppt = $vehicle->appointments()
                ->whereIn('status', ['pending', 'confirmed'])
                ->where('appointment_date', '<', now()->toDateString())
                ->first();

            if ($lastAppt) {
                $dotClass = 'dot-active';
            } elseif ($overdueAppt) {
                $dotClass = 'dot-inactive';
            } else {
                $dotClass = '';
            }
        @endphp

        <div class="vehicle-card">
            @if($dotClass)
                <div class="vehicle-status-dot {{ $dotClass }}"></div>
            @endif

            <div class="vehicle-name">{{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}</div>
            <div class="vehicle-plate">License Plate: {{ $vehicle->license_plate }}</div>

            <div class="service-dates">
                <div class="service-date-group">
                    <label>Last Service</label>
                    <div class="date-boxes">
                        @if($lastAppt)
                            <div class="date-box">{{ \Carbon\Carbon::parse($lastAppt->appointment_date)->format('d') }}</div>
                            <div class="date-box">{{ \Carbon\Carbon::parse($lastAppt->appointment_date)->format('m') }}</div>
                            <div class="date-box">{{ \Carbon\Carbon::parse($lastAppt->appointment_date)->format('Y') }}</div>
                        @else
                            <div class="date-box empty">DD</div>
                            <div class="date-box empty">MM</div>
                            <div class="date-box empty">YYYY</div>
                        @endif
                    </div>
                </div>

                <div class="service-date-group">
                    <label>Next Service</label>
                    <div class="date-boxes">
                        @if($nextAppt)
                            <div class="date-box">{{ \Carbon\Carbon::parse($nextAppt->appointment_date)->format('d') }}</div>
                            <div class="date-box">{{ \Carbon\Carbon::parse($nextAppt->appointment_date)->format('m') }}</div>
                            <div class="date-box">{{ \Carbon\Carbon::parse($nextAppt->appointment_date)->format('Y') }}</div>
                        @else
                            <div class="date-box empty">DD</div>
                            <div class="date-box empty">MM</div>
                            <div class="date-box empty">YYYY</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="vehicle-actions">
                <button class="btn-view-details"
                    onclick="openViewModal(
                        '{{ addslashes($vehicle->year . ' ' . $vehicle->make . ' ' . $vehicle->model) }}',
                        '{{ $vehicle->license_plate }}',
                        '{{ $vehicle->vin ?? '—' }}',
                        '{{ $vehicle->color ?? '—' }}',
                        '{{ $vehicle->mileage ? number_format($vehicle->mileage) : '—' }}',
                        '{{ $lastAppt ? addslashes($lastAppt->appointmentServices->first()->service->service_name ?? '—') : '—' }}',
                        '{{ $lastAppt ? '₱' . number_format($lastAppt->total_amount ?? 0, 2) : '—' }}'
                    )">
                    View Details
                </button>
                <button class="btn-schedule"
                    onclick="openBookModal(
                        {{ $vehicle->id }},
                        '{{ addslashes($vehicle->year . ' ' . $vehicle->make . ' ' . $vehicle->model) }}',
                        {{ $vehicle->mileage ?? 0 }}
                    )">
                    Schedule Service
                </button>
            </div>
        </div>

    @empty
        <div class="empty-state">
            <div class="empty-state-icon">🚗</div>
            <div>You have no vehicles registered yet.</div>
            <div style="margin-top: 8px; font-size: 13px;">Click <strong>+ Add Vehicle</strong> to get started.</div>
        </div>
    @endforelse

</div>

<!-- ══════════════════════════════════════════ -->
<!-- MODAL — BOOK SERVICE APPOINTMENT        -->
<!-- ══════════════════════════════════════════ -->
<div class="modal fade" id="bookServiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Book Service Appointment</h5>
            </div>
            <div class="modal-body">
                <!-- Payment note -->
                <div class="info-note mb-3">
                    <img src="{{ asset('images/appointment_icon.png') }}" alt="">
                    <div class="info-note-text">
                        Payment: You'll pay when you pick up your vehicle. We accept cash, card, and digital payments at the shop.
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="modal-label">Vehicle Name</div>
                        <input type="text" id="book_vehicle_name" class="modal-input" readonly>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Service Type</div>
                        <select id="book_service_type" class="modal-select">
                            <option value="">Select Service</option>
                            @foreach($services ?? [] as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_service"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Date</div>
                        <input type="date" id="book_date" class="modal-input" min="{{ date('Y-m-d') }}">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_date"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Preferred Time</div>
                        <select id="book_time" class="modal-select">
                            <option value="">Select Time</option>
                            <option value="08:00">8:00 AM</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="16:00">4:00 PM</option>
                        </select>
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_time"></div>
                    </div>
                    <div class="col-12">
                        <div class="modal-label">Additional Notes</div>
                        <textarea id="book_notes" class="modal-input" rows="3"
                            placeholder="Describe any issues or specific requirements..."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-save" onclick="submitBooking()">Book Appointment</button>
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
                        <div class="modal-label">Make</div>
                        <input type="text" id="v_make" class="modal-input" placeholder="e.g. Toyota">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_make"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Model</div>
                        <input type="text" id="v_model" class="modal-input" placeholder="e.g. Corolla">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_model"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Year</div>
                        <input type="number" id="v_year" class="modal-input" placeholder="e.g. 2020" min="1990" max="{{ date('Y') + 1 }}">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_year"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">License Plate</div>
                        <input type="text" id="v_plate" class="modal-input" placeholder="e.g. ABC 1234">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_plate"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Color</div>
                        <input type="text" id="v_color" class="modal-input" placeholder="e.g. White">
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Mileage (km)</div>
                        <input type="number" id="v_mileage" class="modal-input" placeholder="e.g. 35000">
                    </div>
                    <div class="col-12">
                        <div class="modal-label">VIN (optional)</div>
                        <input type="text" id="v_vin" class="modal-input" placeholder="17-character VIN">
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
<!-- MODAL — CONFIRMATION                 -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Your vehicle was successfully added.</div>
            <div class="modal-footer">
                <button class="btn-ok" onclick="window.location.reload()">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- MODAL — TASK DETAILS (VIEW)          -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="viewVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content view-card">
            <div class="modal-header">
                <h5 class="modal-title">Task Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="view-label">Vehicle Make & Model</div>
                        <div class="view-input" id="vd_name">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Year</div>
                        <div class="view-input" id="vd_year">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">License Plate</div>
                        <div class="view-input" id="vd_plate">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Current Mileage</div>
                        <div class="view-input" id="vd_mileage">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Service</div>
                        <div class="view-input" id="vd_service">—</div>
                    </div>
                    <div class="col-6">
                        <div class="view-label">Cost</div>
                        <div class="view-input" id="vd_cost">—</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-save" style="width:100%;" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Add Vehicle Form -->
<form id="addVehicleForm" method="POST" action="{{ route('customer.vehicles.store') }}" style="display:none;">
    @csrf
    <input type="hidden" name="make"          id="f_make">
    <input type="hidden" name="model"         id="f_model">
    <input type="hidden" name="year"          id="f_year">
    <input type="hidden" name="license_plate" id="f_plate">
    <input type="hidden" name="color"         id="f_color">
    <input type="hidden" name="mileage"       id="f_mileage">
    <input type="hidden" name="vin"           id="f_vin">
</form>

<!-- Hidden Book Appointment Form -->
<form id="bookingForm" method="POST" action="{{ route('customer.appointments.store') }}" style="display:none;">
    @csrf
    <input type="hidden" name="vehicle_id"         id="f_book_vehicle_id">
    <input type="hidden" name="service_id"         id="f_book_service_id">
    <input type="hidden" name="appointment_date"   id="f_book_date">
    <input type="hidden" name="appointment_time"   id="f_book_time">
    <input type="hidden" name="notes"              id="f_book_notes">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const addVehicleModal  = new bootstrap.Modal(document.getElementById('addVehicleModal'));
    const confirmModal     = new bootstrap.Modal(document.getElementById('confirmModal'));
    const viewVehicleModal = new bootstrap.Modal(document.getElementById('viewVehicleModal'));
    const bookServiceModal = new bootstrap.Modal(document.getElementById('bookServiceModal'));

    // ── BOOK SERVICE ──
    let currentVehicleId = null;

    function openBookModal(vehicleId, vehicleName, mileage) {
        currentVehicleId = vehicleId;
        document.getElementById('book_vehicle_name').value = vehicleName;
        document.getElementById('book_service_type').value = '';
        document.getElementById('book_date').value         = '';
        document.getElementById('book_time').value         = '';
        document.getElementById('book_notes').value        = '';
        document.getElementById('err_service').textContent = '';
        document.getElementById('err_date').textContent    = '';
        document.getElementById('err_time').textContent    = '';
        bookServiceModal.show();
    }

    function submitBooking() {
        const serviceId = document.getElementById('book_service_type').value;
        const date      = document.getElementById('book_date').value;
        const time      = document.getElementById('book_time').value;

        let valid = true;
        document.getElementById('err_service').textContent = '';
        document.getElementById('err_date').textContent    = '';
        document.getElementById('err_time').textContent    = '';

        if (!serviceId) { document.getElementById('err_service').textContent = 'Please select a service.'; valid = false; }
        if (!date)      { document.getElementById('err_date').textContent    = 'Please select a date.';    valid = false; }
        if (!time)      { document.getElementById('err_time').textContent    = 'Please select a time.';    valid = false; }
        if (!valid) return;

        document.getElementById('f_book_vehicle_id').value = currentVehicleId;
        document.getElementById('f_book_service_id').value = serviceId;
        document.getElementById('f_book_date').value       = date;
        document.getElementById('f_book_time').value       = time;
        document.getElementById('f_book_notes').value      = document.getElementById('book_notes').value;

        bookServiceModal.hide();
        document.getElementById('bookingForm').submit();
    }

    // ── VIEW TASK DETAILS ──
    function openViewModal(name, plate, vin, color, mileage, service, cost) {
        // Split year from name for display (e.g. "2020 Honda Civic" → year=2020, make/model=Honda Civic)
        const parts = name.split(' ');
        const year  = parts[0];
        const makeModel = parts.slice(1).join(' ');

        document.getElementById('vd_name').textContent    = makeModel;
        document.getElementById('vd_year').textContent    = year;
        document.getElementById('vd_plate').textContent   = plate;
        document.getElementById('vd_mileage').textContent = mileage ? mileage + ' km' : '—';
        document.getElementById('vd_service').textContent = service;
        document.getElementById('vd_cost').textContent    = cost;
        viewVehicleModal.show();
    }

    // ── ADD VEHICLE ──
    function submitAddVehicle() {
        const make  = document.getElementById('v_make').value.trim();
        const model = document.getElementById('v_model').value.trim();
        const year  = document.getElementById('v_year').value.trim();
        const plate = document.getElementById('v_plate').value.trim();

        let valid = true;
        document.getElementById('err_make').textContent  = '';
        document.getElementById('err_model').textContent = '';
        document.getElementById('err_year').textContent  = '';
        document.getElementById('err_plate').textContent = '';

        if (!make)  { document.getElementById('err_make').textContent  = 'Make is required.';          valid = false; }
        if (!model) { document.getElementById('err_model').textContent = 'Model is required.';         valid = false; }
        if (!year)  { document.getElementById('err_year').textContent  = 'Year is required.';          valid = false; }
        if (!plate) { document.getElementById('err_plate').textContent = 'License plate is required.'; valid = false; }
        if (!valid) return;

        document.getElementById('f_make').value    = make;
        document.getElementById('f_model').value   = model;
        document.getElementById('f_year').value    = year;
        document.getElementById('f_plate').value   = plate;
        document.getElementById('f_color').value   = document.getElementById('v_color').value.trim();
        document.getElementById('f_mileage').value = document.getElementById('v_mileage').value.trim();
        document.getElementById('f_vin').value     = document.getElementById('v_vin').value.trim();

        addVehicleModal.hide();
        document.getElementById('addVehicleForm').submit();
    }

    // ── SHOW CONFIRM AFTER ADD ──
    @if(session('vehicle_added'))
        document.addEventListener('DOMContentLoaded', function () {
            confirmModal.show();
        });
    @endif

    // ── SHOW CONFIRM AFTER BOOKING ──
    @if(session('booking_success'))
        document.addEventListener('DOMContentLoaded', function () {
            confirmModal.show();
            document.querySelector('#confirmModal .modal-body').textContent = 'Your appointment was successfully booked.';
        });
    @endif

    // ── HAMBURGER MENU TOGGLE ──
    document.getElementById('navHamburger').addEventListener('click', function () {
        const menu = document.getElementById('mobileMenu');
        const isOpen = menu.classList.toggle('open');
        this.setAttribute('aria-expanded', isOpen);
    });
</script>
</body>
</html>