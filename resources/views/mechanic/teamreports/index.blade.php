<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Reports - CPAMA VEH MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        :root {
            --bg-primary:     #0D0D32;
            --bg-secondary:   #D9D9D9;
            --bg-brand:       #6160A2;
            --bg-hover:       #E3E3E3;
            --bg-dark:        #0F0F40;
            --text-default:   #000000;
            --text-neutral:   #FFFFFF;
            --text-muted:     #6c757d;
            --border-default: #D9D9D9;
            --accent-purple:  #CFCFFF;
            --accent-green:   #059669;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #6160A2, #6160A2, #CFCFFF);
            font-family: sans-serif;
            margin: 0;
            overflow: hidden;
            color: var(--text-default);
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
        .main-content { flex:1; overflow-y:auto; padding:32px 32px 40px; }

        /* ── TOP BAR ── */
        .top-bar { display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; }
        .page-title { font-size:34px; font-weight:800; color:var(--text-neutral); margin:0; }
        .btn-download { display:flex; align-items:center; gap:8px; background:var(--bg-primary); color:var(--text-neutral); border:none; border-radius:8px; padding:10px 18px; font-size:13px; font-weight:700; cursor:pointer; transition:opacity 0.15s; }
        .btn-download:hover { opacity:0.85; }
        .btn-download img { width:15px; height:15px; filter:brightness(0) invert(1); }

        /* ── DATE FILTER ── */
        .filter-bar { display:flex; align-items:center; gap:8px; margin-bottom:18px; flex-wrap:wrap; }
        .filter-label { font-size:12px; font-weight:700; color:rgba(255,255,255,0.8); margin-right:2px; }
        .filter-btn { background:rgba(255,255,255,0.15); color:var(--text-neutral); border:1px solid rgba(255,255,255,0.25); border-radius:20px; padding:5px 14px; font-size:12px; font-weight:600; cursor:pointer; transition:background-color 0.15s; text-decoration:none; white-space:nowrap; }
        .filter-btn:hover { background:rgba(255,255,255,0.25); color:var(--text-neutral); }
        .filter-btn.active { background:var(--text-neutral); color:var(--bg-primary); border-color:var(--text-neutral); }
        .filter-sep { color:rgba(255,255,255,0.4); font-size:12px; margin:0 2px; }
        .filter-date-input { background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.25); border-radius:8px; padding:5px 10px; font-size:12px; color:var(--text-neutral); outline:none; cursor:pointer; }
        .filter-date-input::-webkit-calendar-picker-indicator { filter:invert(1); }

        /* ── SECTION ── */
        .section-title { font-size:16px; font-weight:800; color:var(--text-default); margin-bottom:2px; }
        .section-subtitle { font-size:12px; font-style:italic; color:var(--text-muted); margin-bottom:16px; }

        /* ── STAT CARDS ── */
        .stat-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:14px; margin-bottom:14px; }
        .stat-card { background:var(--text-neutral); border-radius:10px; padding:14px 16px; display:flex; flex-direction:column; min-height:90px; }
        .stat-card-label { display:flex; align-items:center; gap:8px; font-size:12px; font-weight:700; color:var(--text-default); margin-bottom:auto; }
        .stat-card-label img { width:16px; height:16px; opacity:0.75; }
        .stat-card-value { font-size:26px; font-weight:800; color:var(--bg-primary); text-align:right; margin-top:8px; }

        /* Revenue card */
        .revenue-card { background:var(--text-neutral); border-radius:10px; padding:16px 24px; border-left:4px solid var(--accent-green); display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; }
        .revenue-label { font-size:14px; font-weight:700; color:var(--text-default); display:flex; align-items:center; gap:8px; margin-bottom:4px; }
        .revenue-label img { width:18px; height:18px; opacity:0.75; }
        .revenue-sub { font-size:12px; color:var(--text-muted); }
        .revenue-value { font-size:30px; font-weight:800; color:var(--accent-green); }

        /* ── TABLE ── */
        .panel { background:var(--text-neutral); border-radius:12px; overflow:hidden; margin-bottom:20px; box-shadow:0 2px 12px rgba(0,0,0,0.07); }
        .panel-header { padding:16px 20px 0; font-size:14px; font-weight:800; color:var(--text-default); }
        .perf-table { width:100%; border-collapse:collapse; margin-top:10px; table-layout:fixed; }
        .perf-table thead th { padding:10px 20px; font-size:12px; font-weight:700; color:var(--text-default); background:rgba(217,217,217,0.18); border-bottom:1px solid var(--border-default); text-align:left; white-space:nowrap; }
        .perf-table thead th:nth-child(1) { width:30%; }
        .perf-table thead th:nth-child(2), .perf-table thead th:nth-child(3), .perf-table thead th:nth-child(4) { width:16%; }
        .perf-table thead th:nth-child(5) { width:22%; }
        .perf-table tbody tr { border-bottom:1px solid #f0f0f0; transition:background 0.15s; }
        .perf-table tbody tr:last-child { border-bottom:none; }
        .perf-table tbody tr:hover { background:#fafafa; }
        .perf-table tbody td { padding:11px 20px; font-size:13px; color:var(--text-default); vertical-align:middle; }
        .perf-table tbody td:first-child { font-weight:700; }
        .count { display:inline-block; font-weight:700; }
        .count-completed { color:#065f46; }
        .count-inprogress { color:#1e40af; }
        .count-assigned { color:#92400e; }
        .empty-row td { padding:30px 20px; text-align:center; color:var(--text-muted); font-size:13px; }

        /* ── SERVICE BREAKDOWN ── */
        .service-panel { background:var(--text-neutral); border-radius:12px; overflow:hidden; box-shadow:0 2px 12px rgba(0,0,0,0.07); }
        .service-panel-header { padding:16px 20px; font-size:14px; font-weight:800; color:var(--text-default); display:flex; align-items:center; gap:8px; border-bottom:1px solid #f0f0f0; }
        .service-panel-header img { width:16px; height:16px; opacity:0.7; }
        .service-row { display:flex; justify-content:space-between; align-items:center; padding:11px 20px; font-size:13px; border-bottom:1px solid #f5f5f5; transition:background 0.15s; }
        .service-row:last-child { border-bottom:none; }
        .service-row:hover { background:#fafafa; }
        .service-name { font-weight:500; color:var(--text-default); min-width:160px; }
        .service-count { font-weight:700; color:var(--text-muted); font-size:12px; white-space:nowrap; }
        .service-bar-wrap { flex:1; margin:0 16px; height:6px; background:#f0f0f0; border-radius:3px; overflow:hidden; }
        .service-bar { height:100%; background:var(--bg-brand); border-radius:3px; }

        /* ── PRINT ── */
        @media print {
            body { background:white !important; overflow:auto; }
            .sidebar { display:none !important; }
            .main-content { padding:20px !important; }
            .btn-download, .filter-bar { display:none !important; }
            .page-title { color:#0D0D32 !important; }
            .section-title { color:#000 !important; }
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

<div class="d-flex" style="height:100vh;">

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
                    <a href="{{ route('mechanic.reports') }}" class="nav-link active">
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

        <!-- Top bar -->
        <div class="top-bar">
            <h1 class="page-title">Team Reports</h1>
            <button class="btn-download" onclick="window.print()">
                <img src="{{ asset('images/download_icon.png') }}" alt="">
                Download PDF
            </button>
        </div>

        <!-- ── DATE FILTER ── -->
        <form method="GET" action="{{ route('mechanic.reports') }}" id="filterForm">
            <div class="filter-bar">
                <span class="filter-label">Period:</span>
                @foreach(['week' => 'This Week', 'month' => 'This Month', '3months' => 'Last 3 Months', 'year' => 'This Year'] as $val => $label)
                    <a href="{{ route('mechanic.reports', ['period' => $val]) }}"
                       class="filter-btn {{ $period === $val ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                @endforeach
                <span class="filter-sep">|</span>
                <span class="filter-label">Custom:</span>
                <input type="date" name="from" class="filter-date-input"
                    value="{{ request('from') }}"
                    onchange="document.getElementById('filterForm').submit()">
                <span class="filter-label">→</span>
                <input type="date" name="to" class="filter-date-input"
                    value="{{ request('to') }}"
                    onchange="document.getElementById('filterForm').submit()">
                @if(request('from') || request('to'))
                    <a href="{{ route('mechanic.reports') }}"
                       style="font-size:11px;color:rgba(255,255,255,0.7);text-decoration:none;font-weight:600;">
                        Clear
                    </a>
                @endif
            </div>
        </form>

        <!-- Section heading -->
        <div class="section-title">Team Performance Overview</div>
        <div class="section-subtitle">
            Monitor your team's productivity and task completion
            <span style="color:#6160A2; font-weight:700; font-style:normal;">— {{ $periodLabel }}</span>
        </div>

        <!-- ── STAT CARDS ROW 1 ── -->
        <div class="stat-grid">
            <div class="stat-card">
                <div class="stat-card-label">
                    <img src="{{ asset('images/task_icon.png') }}" alt=""> Total Tasks
                </div>
                <div class="stat-card-value">{{ $totalTasks }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">
                    <img src="{{ asset('images/vehicles_icon.png') }}" alt=""> Total Vehicles
                </div>
                <div class="stat-card-value">{{ $totalVehicles }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">
                    <img src="{{ asset('images/inprogress_icon.png') }}" alt=""> In Progress
                </div>
                <div class="stat-card-value">{{ $inProgress }}</div>
            </div>
        </div>

        <!-- ── STAT CARDS ROW 2 ── -->
        <div class="stat-grid" style="margin-bottom:20px;">
            <div class="stat-card">
                <div class="stat-card-label">
                    <img src="{{ asset('images/task_icon.png') }}" alt=""> Assigned (Pending)
                </div>
                <div class="stat-card-value">{{ $assigned }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">
                    <img src="{{ asset('images/reports_icon.png') }}" alt=""> Avg. Time per Task
                </div>
                <div class="stat-card-value">
                    {{ $avgMinutes > 0
                        ? ($avgMinutes >= 60 ? round($avgMinutes / 60, 1) . 'h' : $avgMinutes . 'm')
                        : '0' }}
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-card-label">
                    <img src="{{ asset('images/team_overview_icon.png') }}" alt=""> Active Mechanics
                </div>
                <div class="stat-card-value">{{ $activeMechanics }}</div>
            </div>
        </div>

        <!-- ── REVENUE CARD ── -->
        <div class="revenue-card">
            <div>
                <div class="revenue-label">
                    <img src="{{ asset('images/reports_icon.png') }}" alt="">
                    Total Revenue
                    <span style="font-size:11px; color:#6c757d; font-weight:500; font-style:italic;">
                        (Completed appointments — {{ $periodLabel }})
                    </span>
                </div>
                <div class="revenue-sub">
                    From {{ $completedAppointments }} completed
                    appointment{{ $completedAppointments !== 1 ? 's' : '' }}
                </div>
            </div>
            <div class="revenue-value">₱{{ number_format($totalRevenue, 2) }}</div>
        </div>

        <!-- ── INDIVIDUAL PERFORMANCE TABLE ── -->
        <div class="panel">
            <div class="panel-header">Individual Mechanic Performance</div>
            <table class="perf-table">
                <thead>
                    <tr>
                        <th>Mechanic</th>
                        <th>Completed</th>
                        <th>In Progress</th>
                        <th>Assigned</th>
                        <th>Total Hours</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mechanicStats as $stat)
                        <tr>
                            <td>{{ $stat['name'] }}</td>
                            <td><span class="count count-completed">{{ $stat['completed'] }}</span></td>
                            <td><span class="count count-inprogress">{{ $stat['inprogress'] }}</span></td>
                            <td><span class="count count-assigned">{{ $stat['assigned'] }}</span></td>
                            <td>
                                {{ $stat['total_minutes'] > 0
                                    ? round($stat['total_minutes'] / 60, 1) . ' hrs'
                                    : '—' }}
                            </td>
                        </tr>
                    @empty
                        <tr class="empty-row">
                            <td colspan="5">No mechanic data available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ── SERVICE TYPE BREAKDOWN ── -->
        <div class="service-panel">
            <div class="service-panel-header">
                <img src="{{ asset('images/maintenance_icon.png') }}" alt="">
                Service Type Breakdown
                <span style="font-size:11px; font-weight:500; color:#6c757d;">({{ $periodLabel }})</span>
            </div>

            @php $maxCount = $serviceBreakdown->max('count') ?: 1; @endphp

            @forelse($serviceBreakdown as $service)
                <div class="service-row">
                    <div class="service-name">{{ $service->service_name }}</div>
                    <div class="service-bar-wrap">
                        <div class="service-bar"
                             style="width:{{ min(100, ($service->count / $maxCount) * 100) }}%">
                        </div>
                    </div>
                    <div class="service-count">{{ $service->count }} {{ $service->count === 1 ? 'task' : 'tasks' }}</div>
                </div>
            @empty
                <div class="service-row">
                    <div class="service-name" style="color:#9ca3af;">No services recorded for this period.</div>
                    <div class="service-bar-wrap"><div class="service-bar" style="width:0%"></div></div>
                    <div class="service-count">0 tasks</div>
                </div>
            @endforelse
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>