<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - CPAMA VEH MAINTENANCE</title>
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
            flex-wrap: nowrap;
            height: 56px;
            gap: 32px;
            position: sticky;
            top: 0;
            z-index: 100;
            overflow: hidden;
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
            padding: 4px;
            margin-left: auto;
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

        /* ── MAIN ── */
        .main-content {
            padding: 36px 40px;
            max-width: 960px;
            margin: 0 auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            color: white;
            margin: 0;
        }

        .book-btn {
            background: #0D0D32;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.2s;
            white-space: nowrap;
        }
        
        .book-btn:hover { background: #1a1a5e; }

        .customer-label {
            font-size: 13px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
        }

        /* ── APPOINTMENT CARD ── */
        .appt-card {
            background: white;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }

        .appt-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 6px;
        }

        .appt-vehicle {
            font-size: 16px;
            font-weight: 700;
            color: #0D0D32;
        }

        .appt-service {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 16px;
        }

        .appt-meta {
            display: flex;
            gap: 48px;
            margin-bottom: 16px;
        }

        .appt-meta-item label {
            font-size: 11px;
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 4px;
            margin-bottom: 2px;
        }

        .appt-meta-item label img {
            width: 12px;
            height: 12px;
            opacity: 0.5;
        }

        .appt-meta-item strong {
            font-size: 14px;
            font-weight: 700;
            color: #0D0D32;
        }

        /* ── STATUS BADGES ── */
        .badge-status { font-size: 12px; font-weight: 600; padding: 4px 14px; border-radius: 20px; border: 1.5px solid; }
        .badge-pending    { border-color: #6160A2; color: #6160A2; background: #f0efff; }
        .badge-confirmed  { border-color: #3b82f6; color: #3b82f6; background: #eff6ff; }
        .badge-scheduled  { border-color: #6160A2; color: #6160A2; background: #f0efff; }
        .badge-in-progress{ border-color: #f59e0b; color: #f59e0b; background: #fffbeb; }
        .badge-completed  { border-color: #009951; color: #009951; background: #f0fdf4; }
        .badge-cancelled  { border-color: #ef4444; color: #ef4444; background: #fef2f2; }

        .btn-reschedule-appt {
            background: transparent;
            border: 1.5px solid #6160A2;
            color: #6160A2;
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.15s;
            margin-top: 10px;
            display: inline-block;
        }
        .btn-reschedule-appt:hover { background: #f0f0ff; }

        .btn-cancel-appt {
            background: transparent;
            border: 1.5px solid #ef4444;
            color: #ef4444;
            border-radius: 8px;
            padding: 7px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .btn-cancel-appt:hover { background: #fef2f2; }

        .empty-state {
            text-align: center;
            padding: 60px 24px;
            color: rgba(255,255,255,0.7);
            font-size: 14px;
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
        .modal-select {
            width: 100%; padding: 10px 12px; border-radius: 8px; border: none;
            background: rgba(255,255,255,0.9); font-size: 13px; color: #333;
            outline: none; cursor: pointer; appearance: none;
        }
        .payment-note {
            background: rgba(255,255,255,0.15); border-radius: 8px;
            padding: 10px 14px; font-size: 11px;
            color: rgba(255,255,255,0.9); line-height: 1.5;
        }
        .payment-note-bottom {
            background: #f8f9fa; border-radius: 8px;
            padding: 10px 14px; font-size: 12px; color: #444;
        }
        .btn-modal-cancel {
            background: white; color: #0D0D32; border: none; border-radius: 8px;
            padding: 10px 24px; font-size: 13px; font-weight: 700; cursor: pointer;
        }
        .btn-modal-cancel:hover { opacity: 0.85; }
        .btn-modal-save {
            background: #0D0D32; color: white; border: none; border-radius: 8px;
            padding: 10px 24px; font-size: 13px; font-weight: 700; cursor: pointer;
        }
        .btn-modal-save:hover { background: #1a1a5e; }

        /* ── DIALOG MODALS ── */
        .dialog-card { border-radius: 12px; border: none; }
        .dialog-card .modal-header { border-bottom: 1px solid #eee; padding: 16px 20px; }
        .dialog-card .modal-title { font-size: 16px; font-weight: 700; color: #0D0D32; }
        .dialog-card .modal-body { font-size: 13px; color: #444; padding: 16px 20px; }
        .dialog-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; }
        .btn-no { background: #e5e7eb; color: #333; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-yes-red { background: #ef4444; color: white; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-yes-red:hover { background: #dc2626; }
        .btn-ok { background: #0D0D32; color: white; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-ok:hover { background: #1a1a5e; }

        
         /* ══════════════════════════════════════
           TABLET  (≤ 768px)
        ══════════════════════════════════════ */
        @media (max-width: 768px) {
            /* Nav: hide links & logout, show hamburger */
            .top-nav { padding: 0 16px !important; gap: 12px !important; }
            .top-nav-links { display: none !important; }
            .top-nav > form { display: none !important; }
            .nav-hamburger { display: flex !important; }

            /* Main content padding */
            .main-content { padding: 24px 16px; }

            /* Page header */
            .page-title { font-size: 24px; }

            /* Vehicle card */
            .vehicle-card { padding: 16px; }
            .service-dates { gap: 24px; }

            /* Action buttons become full-width row */
            .vehicle-actions { flex-wrap: wrap; }
            .btn-view-details,
            .btn-schedule { flex: 1; text-align: center; }

            /* Modal columns → full width on tablets */
            .modal-dialog { margin: 12px !important; max-width: calc(100vw - 24px) !important; }
            .modal-card .modal-body .col-6,
            .view-card  .modal-body .col-6 { width: 100% !important; flex: 0 0 100% !important; max-width: 100% !important; }
        }

        
        /* ══════════════════════════════════════════════
           RESPONSIVE — TABLET (≤ 768px) & PHONE (≤ 480px)
        ══════════════════════════════════════════════ */

        /* ── TABLET (≤ 768px) ── */
        @media (max-width: 768px) {
            /* Nav: hide links & logout, show hamburger */
            .top-nav { padding: 0 16px !important; }
            .top-nav-links { display: none !important; }
            .top-nav > form { display: none !important; }
            .nav-hamburger { display: flex !important; }

            /* Main content */
            .main-content { padding: 24px 16px !important; }
            .page-title { font-size: 26px !important; }

            /* Page header: stack if needed */
            .page-header { flex-wrap: wrap !important; gap: 12px !important; }
            .book-btn { width: 100% !important; text-align: center !important; }

            /* Appointment card */
            .appt-card { padding: 16px 18px !important; }
            .appt-meta { gap: 24px !important; flex-wrap: wrap !important; }

            /* Modals */
            .modal-dialog { margin: 12px !important; max-width: calc(100vw - 24px) !important; }
            .modal-card .modal-body .col-6 { width: 100% !important; flex: 0 0 100% !important; max-width: 100% !important; }
        }

        /* ── PHONE (≤ 480px) ── */
        @media (max-width: 480px) {
            /* Tighten logo */
            .top-nav-logo span { font-size: 11px !important; }
            .top-nav-logo img { width: 28px !important; height: 28px !important; }

            /* Main content */
            .main-content { padding: 16px 12px !important; }
            .page-title { font-size: 22px !important; }
            .customer-label { font-size: 12px !important; }

            /* Page header: stack vertically */
            .page-header {
                flex-direction: column !important;
                align-items: flex-start !important;
                gap: 12px !important;
            }
            .book-btn { width: 100% !important; text-align: center !important; font-size: 14px !important; padding: 12px 16px !important; }

            /* Appointment card */
            .appt-card { padding: 14px 14px !important; margin-bottom: 12px !important; }

            /* Card header: vehicle name + badge */
            .appt-card-header { flex-wrap: wrap !important; gap: 8px !important; }
            .appt-vehicle { font-size: 15px !important; }

            /* Meta: date + time side by side but wrap if needed */
            .appt-meta {
                gap: 20px !important;
                flex-wrap: wrap !important;
                margin-bottom: 14px !important;
            }
            .appt-meta-item { min-width: 80px !important; }

            /* Cancel button full width */
            .btn-cancel-appt {
                width: 100% !important;
                text-align: center !important;
                display: block !important;
                padding: 10px !important;
            }

            /* Modals full width */
            .modal-dialog { margin: 8px !important; max-width: calc(100vw - 16px) !important; }
            .modal-card { border-radius: 10px !important; }
            .modal-card .modal-body .col-6 { width: 100% !important; flex: 0 0 100% !important; max-width: 100% !important; }

            /* Success/confirm modals */
            .dialog-card .modal-body { font-size: 13px !important; }
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
        <a href="{{ route('customer.dashboard') }}">My Vehicles</a>
        <a href="{{ route('customer.appointments') }}" class="active">Appointments</a>
        <a href="{{ route('customer.history') }}">Service History</a>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="top-nav-logout">
            <img src="{{ asset('images/logout_icon.png') }}" style="width:13px; height:13px; filter: brightness(0) invert(1);">
            Logout
        </button>
    </form>

     <!-- Hamburger (mobile only) -->
    <button class="nav-hamburger" id="navHamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span><span></span><span></span>
    </button>
</nav>

<!-- ── MOBILE MENU DRAWER ── -->
<div class="mobile-menu" id="mobileMenu">
    <a href="{{ route('customer.dashboard') }}">My Vehicles</a>
    <a href="{{ route('customer.appointments') }}" class="active">Appointments</a>
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
            <h1 class="page-title">Appointments</h1>
            <div class="customer-label">Customer: {{ auth()->user()->name }}</div>
        </div>
        <button class="book-btn" data-bs-toggle="modal" data-bs-target="#bookModal">
           + Book New Appointment
        </button>
    </div>


    @forelse($appointments as $appt)
        <div class="appt-card">
            <div class="appt-card-header">
                <div>
                    <div class="appt-vehicle">
                        {{ $appt->vehicle->year ?? '' }}
                        {{ $appt->vehicle->make ?? '' }}
                        {{ $appt->vehicle->model ?? '' }}
                    </div>
                    <div class="appt-service">
                        {{ $appt->appointmentServices->first()->service->service_name ?? '—' }}
                    </div>
                </div>
                <span class="badge-status badge-{{ $appt->status }}">
                    {{ ucfirst($appt->status) }}
                </span>
            </div>

            <div class="appt-meta">
                <div class="appt-meta-item">
                    <label>
                        <img src="{{ asset('images/appointment_icon.png') }}" alt=""> Date
                    </label>
                    <strong>
                        {{ $appt->appointment_date
                            ? \Carbon\Carbon::parse($appt->appointment_date)->format('Y-m-d')
                            : '—' }}
                    </strong>
                </div>
                <div class="appt-meta-item">
                    <label>Time</label>
                    <strong>
                        {{ $appt->appointment_time
                            ? \Carbon\Carbon::parse($appt->appointment_time)->format('h:i A')
                            : '—' }}
                    </strong>
                </div>
            </div>

            {{-- Cancel button for pending/confirmed --}}
            @if(in_array($appt->status, ['pending', 'confirmed']))
                <button class="btn-cancel-appt"
                    onclick="openCancelModal({{ $appt->id }})">
                    Cancel Appointment
                </button>
            @endif

            {{-- Reschedule button for cancelled appointments --}}
            @if($appt->status === 'cancelled')
                <button class="btn-reschedule-appt"
                    onclick="openRescheduleModal(
                        {{ $appt->id }},
                        '{{ $appt->vehicle_id }}',
                        '{{ $appt->appointmentServices->first()->service_id ?? '' }}',
                        '{{ $appt->appointment_date ? \Carbon\Carbon::parse($appt->appointment_date)->format('Y-m-d') : '' }}',
                        '{{ $appt->appointment_time ? \Carbon\Carbon::parse($appt->appointment_time)->format('H:i') : '' }}',
                        '{{ addslashes($appt->notes ?? '') }}'
                    )">
                    Reschedule Appointment
                </button>
            @endif
        </div>

    @empty
        <div class="empty-state">
            <div style="font-size: 48px; margin-bottom: 12px;">📅</div>
            <div>You have no appointments yet.</div>
            <div style="margin-top: 8px; font-size: 13px;">
                Click <strong>Book New Appointment</strong> to get started.
            </div>
        </div>
    @endforelse

</div>

<!-- ══════════════════════════════════════════ -->
<!-- MODAL — BOOK SERVICE APPOINTMENT         -->
<!-- ══════════════════════════════════════════ -->
<div class="modal fade" id="bookModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Book Service Appointment</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="modal-label">Select Vehicle</div>
                        <select id="book_vehicle" class="modal-select">
                            <option value="">Choose a vehicle</option>
                            @forelse($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">
                                    {{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                    ({{ $vehicle->license_plate }})
                                </option>
                            @empty
                                <option value="" disabled>No vehicles registered — add one first</option>
                            @endforelse
                        </select>
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_vehicle"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Service Type</div>
                        <select id="book_service" class="modal-select">
                            <option value="">Select service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_service"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Preferred Date</div>
                        <input type="date" id="book_date" class="modal-input" min="{{ date('Y-m-d') }}">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_date"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Preferred Time</div>
                        <select id="book_time" class="modal-select">
                            <option value="">Select time</option>
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
                        <div class="modal-label">Payment Method</div>
                        <select class="modal-select" disabled>
                            <option>Pay at Shop (After Service)</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="payment-note">
                            ✓ You'll pay when you pick up your vehicle. We accept cash, card, and digital payments at the shop.
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="modal-label">Additional Notes</div>
                        <textarea id="book_notes" class="modal-input" rows="3"
                            placeholder="Describe any issues or specific requirements..."></textarea>
                    </div>
                    <div class="col-12">
                        <div class="payment-note-bottom">
                            <strong>Payment:</strong> You'll pay when you pick up your vehicle. We accept cash, card, and digital payments at the shop.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-modal-save" onclick="submitBooking()" style="flex:1; margin-right:8px;">
                    Book Appointment
                </button>
                <button class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════ -->
<!-- MODAL — RESCHEDULE APPOINTMENT          -->
<!-- ══════════════════════════════════════════ -->
<div class="modal fade" id="rescheduleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Reschedule Appointment</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="modal-label">Select Vehicle</div>
                        <select id="rs_vehicle" class="modal-select">
                            <option value="">Choose a vehicle</option>
                            @forelse($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">
                                    {{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                    ({{ $vehicle->license_plate }})
                                </option>
                            @empty
                                <option value="" disabled>No vehicles registered</option>
                            @endforelse
                        </select>
                        <div class="text-danger mt-1" style="font-size:11px;" id="rs_err_vehicle"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Service Type</div>
                        <select id="rs_service" class="modal-select">
                            <option value="">Select service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger mt-1" style="font-size:11px;" id="rs_err_service"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">New Date</div>
                        <input type="date" id="rs_date" class="modal-input" min="{{ date('Y-m-d') }}">
                        <div class="text-danger mt-1" style="font-size:11px;" id="rs_err_date"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">New Time</div>
                        <select id="rs_time" class="modal-select">
                            <option value="">Select time</option>
                            <option value="08:00">8:00 AM</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="16:00">4:00 PM</option>
                        </select>
                        <div class="text-danger mt-1" style="font-size:11px;" id="rs_err_time"></div>
                    </div>
                    <div class="col-12">
                        <div class="modal-label">Additional Notes</div>
                        <textarea id="rs_notes" class="modal-input" rows="3"
                            placeholder="Describe any issues or specific requirements..."></textarea>
                    </div>
                    <div class="col-12">
                        <div class="payment-note">
                            ✓ This will create a new appointment. You'll pay when you pick up your vehicle.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-modal-save" onclick="submitReschedule()" style="flex:1; margin-right:8px;">
                    Confirm Reschedule
                </button>
                <button class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════ -->
<!-- MODAL — CANCEL CONFIRMATION              -->
<!-- ══════════════════════════════════════════ -->
<div class="modal fade" id="cancelConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Cancel Appointment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this appointment?
            </div>
            <div class="modal-footer">
                <button class="btn-no" data-bs-dismiss="modal">No</button>
                <button class="btn-yes-red" onclick="submitCancel()">Yes, Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════ -->
<!-- MODAL — BOOKING SUCCESS                  -->
<!-- ══════════════════════════════════════════ -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Your appointment was successfully booked.</div>
            <div class="modal-footer">
                <button class="btn-ok" onclick="window.location.reload()">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden forms -->
<form id="bookingForm" method="POST" action="{{ route('customer.appointments.store') }}" style="display:none;">
    @csrf
    <input type="hidden" name="vehicle_id"         id="f_vehicle_id">
    <input type="hidden" name="service_id"         id="f_service_id">
    <input type="hidden" name="appointment_date"   id="f_date">
    <input type="hidden" name="appointment_time"   id="f_time">
    <input type="hidden" name="notes"              id="f_notes">
</form>

<form id="rescheduleForm" method="POST" action="{{ route('customer.appointments.store') }}" style="display:none;">
    @csrf
    <input type="hidden" name="vehicle_id"         id="rs_f_vehicle_id">
    <input type="hidden" name="service_id"         id="rs_f_service_id">
    <input type="hidden" name="appointment_date"   id="rs_f_date">
    <input type="hidden" name="appointment_time"   id="rs_f_time">
    <input type="hidden" name="notes"              id="rs_f_notes">
</form>

<form id="cancelForm" method="POST" style="display:none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" value="cancelled">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const bookModal          = new bootstrap.Modal(document.getElementById('bookModal'));
    const cancelConfirmModal = new bootstrap.Modal(document.getElementById('cancelConfirmModal'));
    const successModal       = new bootstrap.Modal(document.getElementById('successModal'));

    // ── BOOK APPOINTMENT ──
    function submitBooking() {
        const vehicleId = document.getElementById('book_vehicle').value;
        const serviceId = document.getElementById('book_service').value;
        const date      = document.getElementById('book_date').value;
        const time      = document.getElementById('book_time').value;

        let valid = true;
        document.getElementById('err_vehicle').textContent = '';
        document.getElementById('err_service').textContent = '';
        document.getElementById('err_date').textContent    = '';
        document.getElementById('err_time').textContent    = '';

        if (!vehicleId) { document.getElementById('err_vehicle').textContent = 'Please select a vehicle.'; valid = false; }
        if (!serviceId) { document.getElementById('err_service').textContent = 'Please select a service.'; valid = false; }
        if (!date)      { document.getElementById('err_date').textContent    = 'Please select a date.';    valid = false; }
        if (!time)      { document.getElementById('err_time').textContent    = 'Please select a time.';    valid = false; }
        if (!valid) return;

        document.getElementById('f_vehicle_id').value = vehicleId;
        document.getElementById('f_service_id').value = serviceId;
        document.getElementById('f_date').value        = date;
        document.getElementById('f_time').value        = time;
        document.getElementById('f_notes').value       = document.getElementById('book_notes').value;

        bookModal.hide();
        document.getElementById('bookingForm').submit();
    }

    // ── RESCHEDULE APPOINTMENT ──
    const rescheduleModal = new bootstrap.Modal(document.getElementById('rescheduleModal'));

    function openRescheduleModal(id, vehicleId, serviceId, date, time, notes) {
        // Pre-fill fields with original appointment data
        const vSelect = document.getElementById('rs_vehicle');
        const sSelect = document.getElementById('rs_service');
        if (vSelect) vSelect.value = vehicleId || '';
        if (sSelect) sSelect.value = serviceId || '';
        document.getElementById('rs_date').value  = date  || '';
        document.getElementById('rs_time').value  = time  || '';
        document.getElementById('rs_notes').value = notes || '';
        // Clear errors
        ['rs_err_vehicle','rs_err_service','rs_err_date','rs_err_time'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.textContent = '';
        });
        rescheduleModal.show();
    }

    function submitReschedule() {
        const vehicleId = document.getElementById('rs_vehicle').value;
        const serviceId = document.getElementById('rs_service').value;
        const date      = document.getElementById('rs_date').value;
        const time      = document.getElementById('rs_time').value;

        let valid = true;
        if (!vehicleId) { document.getElementById('rs_err_vehicle').textContent = 'Please select a vehicle.'; valid = false; }
        if (!serviceId) { document.getElementById('rs_err_service').textContent = 'Please select a service.'; valid = false; }
        if (!date)      { document.getElementById('rs_err_date').textContent    = 'Please select a date.';    valid = false; }
        if (!time)      { document.getElementById('rs_err_time').textContent    = 'Please select a time.';    valid = false; }
        if (!valid) return;

        document.getElementById('rs_f_vehicle_id').value = vehicleId;
        document.getElementById('rs_f_service_id').value = serviceId;
        document.getElementById('rs_f_date').value        = date;
        document.getElementById('rs_f_time').value        = time;
        document.getElementById('rs_f_notes').value       = document.getElementById('rs_notes').value;

        rescheduleModal.hide();
        document.getElementById('rescheduleForm').submit();
    }

    // ── CANCEL APPOINTMENT ──
    let cancelApptId = null;

    function openCancelModal(id) {
        cancelApptId = id;
        cancelConfirmModal.show();
    }

    function submitCancel() {
        const form = document.getElementById('cancelForm');
        form.action = `/customer/appointments/${cancelApptId}/cancel`;
        cancelConfirmModal.hide();
        form.submit();
    }

    // ── SHOW SUCCESS AFTER BOOKING ──
    @if(session('booking_success'))
        document.addEventListener('DOMContentLoaded', function () {
            successModal.show();
        });
    @endif

    // Mobile menu toggle
    const navHamburger = document.getElementById('navHamburger');
    const mobileMenu = document.getElementById('mobileMenu');

    navHamburger.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.toggle('open');
        navHamburger.setAttribute('aria-expanded', isOpen);
    });

</script>
</body>
</html>