<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service History - CPAMA VEH MAINTENANCE</title>
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

        .page-title {
            font-size: 32px;
            font-weight: 800;
            color: white;
            margin-bottom: 4px;
        }

        .customer-label {
            font-size: 13px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
        }

        /* ── TABLE ── */
        .table-panel {
            background: rgba(255,255,255,0.95);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        .table {
            margin: 0;
            font-size: 13px;
        }

        .table thead th {
            background: #D9D9D9;
            color: #000000;
            font-weight: 700;
            font-size: 13px;
            border: none;
            padding: 14px 20px;
        }

        .table tbody tr {
            border-bottom: 1px solid rgba(0,0,0,0.06);
            transition: background-color 0.15s;
        }

        .table tbody tr:hover {
            background-color: rgba(97, 96, 162, 0.05);
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody td {
            padding: 14px 20px;
            vertical-align: middle;
            border: none;
            color: #000000;
            font-size: 13px;
        }

        .vehicle-name {
            font-weight: 700;
            color: #0F0F40;
        }

        .vehicle-plate {
            font-size: 11px;
            color: #6c757d;
            margin-top: 2px;
        }

        .cost-value {
            font-weight: 700;
            color: #0F0F40;
        }

        .empty-state {
            text-align: center;
            padding: 60px 24px;
            color: #6c757d;
            font-size: 14px;
        }

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

        /* ══════════════════════════════════════
           PHONE  (≤ 480px)
        ══════════════════════════════════════ */
        @media (max-width: 480px) {
            /* Tighten logo text */
            .top-nav-logo { font-size: 10px !important; gap: 8px !important; }
            .top-nav-logo img { width: 28px !important; height: 28px !important; }

            /* Smaller page title */
            .page-title { font-size: 20px; }
            .customer-label { font-size: 12px; }

            /* Stack page-header vertically */
            .page-header { flex-direction: column; gap: 12px; }
            .add-vehicle-btn { width: 100%; font-size: 13px; }

            /* Vehicle card */
            .vehicle-card { padding: 14px 12px; }
            .vehicle-name { font-size: 14px; padding-right: 20px; }

            /* Date boxes: shrink a touch */
            .date-box { padding: 5px 7px; min-width: 34px; font-size: 11px; }

            /* Stack service date groups */
            .service-dates { flex-direction: column; gap: 14px; margin-bottom: 16px; }

            /* Action buttons — stack vertically, full width */
            .vehicle-actions { flex-direction: column; }
            .btn-view-details,
            .btn-schedule { width: 100% !important; text-align: center; padding: 11px 10px; display: block; }

            /* Modals: full-width feel */
            .modal-dialog { margin: 8px !important; max-width: calc(100vw - 16px) !important; }
            .modal-card { border-radius: 12px; }
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
        <a href="{{ route('customer.appointments') }}">Appointments</a>
        <a href="{{ route('customer.history') }}" class="active">Service History</a>
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
    <a href="{{ route('customer.appointments') }}">Appointments</a>
    <a href="{{ route('customer.history') }}" class="active">Service History</a>
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

    <h1 class="page-title">Service History</h1>
    <div class="customer-label">Customer: {{ auth()->user()->name }}</div>

    <div class="table-panel">
        <table class="table">
            <thead>
                <tr>
                    <th>Vehicle</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Mechanic</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
                @forelse($history as $appt)
                    <tr>
                        <td>
                            <div class="vehicle-name">
                                {{ $appt->vehicle->year ?? '' }}
                                {{ $appt->vehicle->make ?? '' }}
                                {{ $appt->vehicle->model ?? '' }}
                            </div>
                            <div class="vehicle-plate">
                                {{ $appt->vehicle->license_plate ?? '' }}
                            </div>
                        </td>
                        <td>
                            {{ $appt->appointmentServices->first()->service->service_name ?? '—' }}
                        </td>
                        <td>
                            {{ $appt->appointment_date
                                ? \Carbon\Carbon::parse($appt->appointment_date)->format('M d, Y')
                                : '—' }}
                        </td>
                        <td>
                            {{-- Get mechanic from the task linked to this appointment --}}
                            {{ $appt->tasks->first()->mechanic->name ?? '—' }}
                        </td>
                        <td>
                            <span class="cost-value">
                                ₱{{ $appt->total_amount ? number_format($appt->total_amount, 2) : '—' }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            No service history found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
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