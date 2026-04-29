<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Operation Reports - CPAMA VEH MAINTENANCE</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            * { box-sizing: border-box; }

            :root {
                --bg-primary:      #0D0D32;
                --bg-secondary:    #D9D9D9;
                --bg-brand:        #6160A2;
                --bg-hover:        #E3E3E3;
                --bg-dark:         #0F0F40;
                --bg-neutral:      #BCBCE0;
                --bg-neutral-50:   rgba(188,188,224,0.5);
                --text-default:    #000000;
                --text-neutral:    #FFFFFF;
                --text-muted:      #2C2C2C;
                --border-default:  #D9D9D9;
                --border-neutral:  rgba(255,255,255,0.15);
                --accent-green:    #059669;
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
                width: 210px;
                min-width: 210px;
                height: 100vh;
                background: var(--bg-primary);
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 24px 14px;
                position: sticky;
                top: 0;
                flex-shrink: 0;
            }

            .sidebar-logo {
                width: 90px;
                height: 90px;
                border-radius: 50%;
                object-fit: cover;
                margin-bottom: 10px;
            }

            .sidebar-title {
                font-size: 11px;
                font-weight: 800;
                text-transform: uppercase;
                color: var(--text-neutral);
                text-align: center;
                letter-spacing: 0.5px;
                line-height: 1.4;
                margin-bottom: 6px;
            }

            .sidebar-admin {
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
                color: var(--text-neutral);
                font-size: 12px;
                font-weight: 600;
                padding: 10px 14px;
                border-radius: 8px;
                border: 1px solid var(--border-neutral);
                background-color: rgba(255,255,255,0.08);
                transition: background-color 0.2s;
                text-decoration: none;
            }

            .nav-item .nav-link:hover,
            .nav-item .nav-link.active {
                background-color: rgba(255,255,255,0.22);
                color: var(--text-neutral);
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
                color: var(--text-neutral);
                background: transparent;
                border: 1px solid rgba(255,255,255,0.3);
                border-radius: 8px;
                padding: 9px 14px;
                width: 100%;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                transition: background-color 0.2s;
            }
            .logout-btn:hover { background-color: rgba(255,255,255,0.15); }

            /* ── MAIN ── */
            .main-content {
                flex: 1;
                overflow-y: auto;
                padding: 32px 32px 40px;
            }

            /* ── TOP BAR ── */
            .top-bar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 24px;
            }

            .page-title {
                font-size: 34px;
                font-weight: 800;
                color: var(--text-neutral);
                margin: 0;
            }

            .btn-download {
                display: flex;
                align-items: center;
                gap: 8px;
                background: var(--bg-primary);
                color: var(--text-neutral);
                border: none;
                border-radius: 8px;
                padding: 10px 20px;
                font-size: 13px;
                font-weight: 700;
                cursor: pointer;
                transition: opacity 0.15s;
            }
            .btn-download:hover { opacity: 0.85; }
            .btn-download img { width: 15px; height: 15px; filter: brightness(0) invert(1); }

            /* ── STAT CARDS ── */
            .stat-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 14px;
                margin-bottom: 20px;
            }

            .stat-card {
                background: var(--text-neutral);
                border-radius: 10px;
                padding: 16px 18px;
                display: flex;
                flex-direction: column;
                min-height: 95px;
            }

            .stat-card-label {
                font-size: 12px;
                font-weight: 700;
                color: var(--text-default);
                margin-bottom: auto;
            }

            .stat-card-value {
                font-size: 28px;
                font-weight: 800;
                color: var(--bg-primary);
                text-align: right;
                margin-top: 8px;
            }

            .stat-card.revenue .stat-card-value { color: var(--accent-green); }

            /* ── REVENUE CHART PANEL ── */
            .chart-panel {
                background: var(--text-neutral);
                border-radius: 12px;
                padding: 18px 20px;
                margin-bottom: 20px;
                box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            }

            .chart-panel-title {
                font-size: 14px;
                font-weight: 800;
                color: var(--text-default);
                margin-bottom: 16px;
            }

            .chart-wrap {
                position: relative;
                height: 160px;
            }

            /* ── BOTTOM GRID ── */
            .bottom-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }

            /* ── TABLE PANEL ── */
            .panel {
                background: var(--text-neutral);
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            }

            .panel-header {
                padding: 14px 18px;
                font-size: 13px;
                font-weight: 800;
                color: var(--text-default);
                border-bottom: 1px solid #f0f0f0;
            }

            .perf-table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            .perf-table thead th {
                padding: 9px 16px;
                font-size: 11px;
                font-weight: 700;
                color: var(--text-default);
                background: rgba(188,188,224,0.18);
                border-bottom: 1px solid var(--border-default);
                text-align: left;
                white-space: nowrap;
            }

            .perf-table thead th:nth-child(1) { width: 38%; }
            .perf-table thead th:nth-child(2) { width: 28%; }
            .perf-table thead th:nth-child(3) { width: 34%; }

            .perf-table tbody tr { border-bottom: 1px solid #f5f5f5; }
            .perf-table tbody tr:last-child { border-bottom: none; }
            .perf-table tbody tr:hover { background: #fafafa; }
            .perf-table tbody td { padding: 10px 16px; font-size: 12px; color: var(--text-default); vertical-align: middle; }
            .perf-table tbody td:first-child { font-weight: 600; }

            .empty-row td { text-align: center; color: #9ca3af; padding: 24px 16px; font-size: 12px; }

            /* ── BREAKDOWN PANEL ── */
            .breakdown-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 11px 18px;
                font-size: 13px;
                border-bottom: 1px solid #f5f5f5;
                transition: background 0.15s;
            }
            .breakdown-row:last-child { border-bottom: none; }
            .breakdown-row:hover { background: #fafafa; }
            .breakdown-name { font-weight: 500; color: var(--text-default); }
            .breakdown-count { font-weight: 700; color: var(--text-muted); font-size: 12px; white-space: nowrap; }
            .breakdown-bar-wrap { flex: 1; margin: 0 14px; height: 6px; background: #f0f0f0; border-radius: 3px; overflow: hidden; }
            .breakdown-bar { height: 100%; background: var(--bg-brand); border-radius: 3px; }

            /* ── PRINT ── */
            .print-header { display: none; }

            @media print {
                @page { margin: 18mm 14mm; size: A4 portrait; }

                * { -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }

                body { background: white !important; overflow: visible !important; height: auto !important; }

                .d-flex { display: block !important; height: auto !important; }

                .sidebar { display: none !important; }

                .main-content {
                    padding: 0 !important;
                    overflow: visible !important;
                    height: auto !important;
                    width: 100% !important;
                }

                .btn-download { display: none !important; }
                .top-bar { display: none !important; }

                /* Print header */
                .print-header {
                    display: flex !important;
                    justify-content: space-between;
                    align-items: flex-start;
                    border-bottom: 2px solid #0D0D32;
                    padding-bottom: 12px;
                    margin-bottom: 16px;
                }
                .print-header-title { font-size: 20px; font-weight: 800; color: #0D0D32; }
                .print-header-sub { font-size: 11px; color: #6c757d; margin-top: 2px; }
                .print-header-meta { text-align: right; font-size: 11px; color: #444; line-height: 1.8; }
                .print-header-meta strong { color: #0D0D32; }

                /* Stat cards */
                .stat-grid {
                    display: grid !important;
                    grid-template-columns: repeat(3, 1fr) !important;
                    gap: 8px !important;
                    margin-bottom: 10px !important;
                    break-inside: avoid;
                }

                .stat-card {
                    border: 1px solid #ddd !important;
                    border-radius: 6px !important;
                    padding: 10px 12px !important;
                    min-height: unset !important;
                    break-inside: avoid;
                }

                .stat-card-label { font-size: 10px !important; }
                .stat-card-value { font-size: 20px !important; }

                /* Chart */
                .chart-panel {
                    break-inside: avoid;
                    margin-bottom: 12px !important;
                    padding: 12px 14px !important;
                    border: 1px solid #ddd !important;
                    border-radius: 6px !important;
                }

                .chart-wrap { height: 130px !important; }

                /* Bottom grid — stack vertically for print */
                .bottom-grid {
                    display: block !important;
                    break-before: avoid;
                }

                .panel {
                    break-inside: avoid;
                    margin-bottom: 14px !important;
                    border: 1px solid #ddd !important;
                    border-radius: 6px !important;
                    width: 100% !important;
                }

                .panel-header { font-size: 12px !important; padding: 10px 14px !important; }

                .perf-table tbody td,
                .perf-table thead th { font-size: 11px !important; padding: 7px 12px !important; }

                .breakdown-row { padding: 8px 14px !important; font-size: 11px !important; }
                .breakdown-bar-wrap { height: 5px !important; }
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
                <img src="{{ asset('images/veh_main_logo.png') }}" alt="Logo" class="sidebar-logo">
                <div class="sidebar-title">CPAMA VEH MAINTENANCE</div>
                <div class="sidebar-admin">Admin: {{ auth()->user()->name }}</div>

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
                        <a href="{{ route('admin.maintenance') }}" class="nav-link">
                            <img src="{{ asset('images/maintenance_icon.png') }}" alt=""> Maintenance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.reports') }}" class="nav-link active">
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
                        <img src="{{ asset('images/logout_icon.png') }}" style="width:14px;height:14px;filter:brightness(0) invert(1);">
                        Logout
                    </button>
                </form>
            </div>

            <!-- ── MAIN CONTENT ── -->
            <div class="main-content flex-grow-1">

                <!-- Print-only header -->
                <div class="print-header">
                    <div>
                        <div class="print-header-title">Operation Reports</div>
                        <div class="print-header-sub">CPAMA VEH MAINTENANCE</div>
                    </div>
                    <div class="print-header-meta">
                        <div><strong>Downloaded by:</strong> {{ auth()->user()->name }}</div>
                        <div><strong>Role:</strong> {{ ucfirst(auth()->user()->role) }}</div>
                        <div><strong>Date:</strong> {{ now()->format('F d, Y') }}</div>
                        <div><strong>Time:</strong> {{ now()->format('h:i A') }}</div>
                    </div>
                </div>

                <!-- Top bar -->
                <div class="top-bar">
                    <h1 class="page-title">Operation Reports</h1>
                    <button class="btn-download" onclick="window.print()">
                        <img src="{{ asset('images/download_icon.png') }}" alt="">
                        Download
                    </button>
                </div>

                <!-- ── STAT CARDS ROW 1 ── -->
                <div class="stat-grid">
                    <div class="stat-card">
                        <div class="stat-card-label">Total Appointments</div>
                        <div class="stat-card-value">{{ $totalAppointments }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-label">Completed Services</div>
                        <div class="stat-card-value">{{ $completedServices }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-label">Pending Appointments</div>
                        <div class="stat-card-value">{{ $pendingAppointments }}</div>
                    </div>
                </div>

                <!-- ── STAT CARDS ROW 2 ── -->
                <div class="stat-grid">
                    <div class="stat-card revenue">
                        <div class="stat-card-label">Total Revenue</div>
                        <div class="stat-card-value" style="font-size:22px;">
                            ₱{{ number_format($totalRevenue, 2) }}
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-label">Active Customers</div>
                        <div class="stat-card-value">{{ $activeCustomers }}</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-card-label">Active Vehicles</div>
                        <div class="stat-card-value">{{ $activeVehicles }}</div>
                    </div>
                </div>

                <!-- ── REVENUE CHART ── -->
                <div class="chart-panel">
                    <div class="chart-panel-title">Total Revenue Statistic</div>
                    <div class="chart-wrap">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>

                <!-- ── BOTTOM GRID ── -->
                <div class="bottom-grid">

                    <!-- Top Performing Mechanics -->
                    <div class="panel">
                        <div class="panel-header">Top Performing Mechanics (This Month)</div>
                        <table class="perf-table">
                            <thead>
                                <tr>
                                    <th>Mechanic</th>
                                    <th>Completed Tasks</th>
                                    <th>Revenue Generated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($topMechanics as $mechanic)
                                    <tr>
                                        <td>{{ $mechanic->name }}</td>
                                        <td>{{ $mechanic->completed_count }}</td>
                                        <td>₱{{ number_format($mechanic->revenue, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr class="empty-row">
                                        <td colspan="3">No data for this month.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Maintenance Breakdown -->
                    <div class="panel">
                        <div class="panel-header">Maintenance Breakdown</div>
                        @php $maxCount = $maintenanceBreakdown->max('count') ?: 1; @endphp
                        @forelse($maintenanceBreakdown as $item)
                            <div class="breakdown-row">
                                <div class="breakdown-name">{{ $item->service_name }}</div>
                                <div class="breakdown-bar-wrap">
                                    <div class="breakdown-bar"
                                        style="width:{{ min(100, ($item->count / $maxCount) * 100) }}%">
                                    </div>
                                </div>
                                <div class="breakdown-count">{{ $item->count }} {{ $item->count === 1 ? 'service' : 'services' }}</div>
                            </div>
                        @empty
                            <div class="breakdown-row">
                                <div class="breakdown-name" style="color:#9ca3af;">No maintenance data found.</div>
                                <div class="breakdown-bar-wrap"><div class="breakdown-bar" style="width:0%"></div></div>
                                <div class="breakdown-count">0 services</div>
                            </div>
                        @endforelse
                    </div>

                </div>

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
        <script>
            // ── REVENUE CHART ──
            const months  = @json($revenueByMonth->pluck('month'));
            const amounts = @json($revenueByMonth->pluck('total'));

            const ctx = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Revenue (₱)',
                        data: amounts,
                        backgroundColor: 'rgba(97, 96, 162, 0.7)',
                        borderColor: '#6160A2',
                        borderWidth: 1,
                        borderRadius: 5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: ctx => '₱' + Number(ctx.raw).toLocaleString('en-PH', { minimumFractionDigits: 2 })
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0,0,0,0.05)' },
                            ticks: {
                                callback: val => '₱' + val.toLocaleString(),
                                font: { size: 11 }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { font: { size: 11 } }
                        }
                    }
                }
            });
        </script>
    </body>
</html>