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
            height: 56px;
            gap: 32px;
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
</nav>

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
</body>
</html>