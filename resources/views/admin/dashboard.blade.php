<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CPAMA VEH MAINTENANCE</title>

    <!-- Bootstrap 5 -->
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
            padding: 32px 28px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: white;
        }

        /* ── STAT CARDS ── */
        .stat-card {
            background: rgba(255,255,255,0.92);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            min-height: 120px;
        }

        .stat-card-label {
            font-size: 12px;
            font-weight: 700;
            color: #333;
        }

        .stat-card-label img {
            width: 15px;
            height: 15px;
            opacity: 0.7;
        }

        .stat-card-value {
            font-size: 30px;
            font-weight: 800;
            color: #0D0D32;
        }

        /* ── PANELS ── */
        .panel {
            background: rgba(255,255,255,0.92);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .panel-title {
            font-size: 14px;
            font-weight: 700;
            color: #0D0D32;
        }

        /* ── ROWS ── */
        .alert-row,
        .activity-row {
            background: #8E98A8;
            border-radius: 6px;
            color: black;
            font-size: 11px;
            font-weight: 600;
        }

        .activity-name {
            font-size: 11px;
            font-weight: 700;
            color: black;
        }

        .activity-status {
            font-size: 10px;
            color: rgba(0, 0, 0, 0.8);
            font-style: italic;
        }

        .activity-date {
            font-size: 10px;
            font-weight: 600;
            color: black;
            white-space: nowrap;
        }

        .empty-state {
            font-size: 12px;
            color: #6c757d;
            text-align: center;
            padding: 12px 0;
        }


        
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <img src="{{ asset('images/dashboard_icon.png') }}" alt="">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.vehicles') }}" class="nav-link">
                    <img src="{{ asset('images/vehicles_icon.png') }}" alt="">
                    Vehicles
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.appointments') }}" class="nav-link">
                    <img src="{{ asset('images/appointment_icon.png') }}" alt="">
                    Appointments
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.maintenance') }}" class="nav-link">
                    <img src="{{ asset('images/maintenance_icon.png') }}" alt="">
                    Maintenance
                </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('admin.reports') }}" class="nav-link">
                    <img src="{{ asset('images/reports_icon.png') }}" alt="">
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link">
                    <img src="{{ asset('images/user_icon.png') }}" alt="">
                    User Management
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

        <h1 class="page-title mb-4">Dashboard</h1>

        <!-- Stat Cards -->
        <div class="row g-3 mb-4">
            <div class="col-4">
                <div class="stat-card p-3 d-flex flex-column">
                    <div class="d-flex align-items-center gap-2 stat-card-label mb-2">
                        <img src="{{ asset('images/vehicles_icon.png') }}" alt="">
                        Total Vehicles
                    </div>
                    <div class="stat-card-value text-end mt-auto">{{ $stats['totalVehicles'] }}</div>
                </div>
            </div>
            <div class="col-4">
                <div class="stat-card p-3 d-flex flex-column">
                    <div class="d-flex align-items-center gap-2 stat-card-label mb-2">
                        <img src="{{ asset('images/upcomming_icon.png') }}" alt="">
                        Upcoming Maintenance
                    </div>
                    <div class="stat-card-value text-end mt-auto">{{ $stats['upcomingCount'] }}</div>
                </div>
            </div>
            <div class="col-4">
                <div class="stat-card p-3 d-flex flex-column">
                    <div class="d-flex align-items-center gap-2 stat-card-label mb-2">
                        <img src="{{ asset('images/overDue_icon.png') }}" alt="">
                        Overdue
                    </div>
                    <div class="stat-card-value text-end mt-auto">{{ $stats['overdueCount'] }}</div>
                </div>
            </div>
        </div>

        <!-- Alerts & Notifications -->
        <div class="panel p-3 mb-4">
            <div class="panel-title mb-3">Alerts &amp; Notifications</div>

            @forelse($alerts as $alert)
                <div class="alert-row d-flex justify-content-between align-items-center px-3 py-2 mb-2">
                    <span>
                        {{ $alert->notes }} -
                        {{ $alert->vehicle->make }} {{ $alert->vehicle->model }}
                        ({{ $alert->vehicle->license_plate }})
                    </span>
                    <span class="ms-3" style="white-space:nowrap;">
                        Due: {{ \Carbon\Carbon::parse($alert->appointment_date)->diffForHumans() }}
                    </span>
                </div>
            @empty
                <div class="empty-state">No overdue appointments.</div>
            @endforelse
        </div>

        <!-- Recent Activity -->
        <div class="panel p-3">
            <div class="panel-title mb-3">Recent Activity</div>

            @forelse($recentAppointments as $activity)
                <div class="activity-row d-flex justify-content-between align-items-center px-3 py-2 mb-2">
                    <div>
                        <div class="activity-name">
                            {{ $activity->notes }} -
                            {{ $activity->vehicle->make }} {{ $activity->vehicle->model }}
                            ({{ $activity->vehicle->license_plate }})
                        </div>
                        <div class="activity-status">{{ ucfirst($activity->status) }}</div>
                    </div>
                    <span class="activity-date">
                        {{ \Carbon\Carbon::parse($activity->appointment_date)->format('M d, Y') }}
                    </span>
                </div>
            @empty
                <div class="empty-state">No recent activity found.</div>
            @endforelse
        </div>

    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>