<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Vehicles - CPAMA VEH MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        :root {
            --bg-primary:      #0D0D32;
            --bg-secondary:    #D9D9D9;
            --bg-secondary-0:  rgba(217,217,217,0);
            --bg-brand:        #6160A2;
            --bg-hover:        #E3E3E3;
            --bg-dark:         #0F0F40;
            --text-default:    #000000;
            --text-neutral:    #FFFFFF;
            --text-muted:      #1E1E1E;
            --border-default:  #D9D9D9;
            --border-neutral:  rgba(255,255,255,0.15);
            --accent-purple:   #CFCFFF;
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
        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 36px 32px;
        }

        .page-title {
            font-size: 34px;
            font-weight: 800;
            color: var(--text-neutral);
            margin-bottom: 24px;
        }

        /* ── SEARCH BAR ── */
        .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 18px;
            align-items: center;
        }

        .search-input-wrap {
            position: relative;
            flex: 1;
            max-width: 320px;
        }

        .search-input-wrap img {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 14px;
            height: 14px;
            opacity: 0.45;
        }

        .search-input {
            width: 100%;
            padding: 9px 12px 9px 34px;
            border-radius: 8px;
            border: none;
            background: var(--text-neutral);
            font-size: 13px;
            color: var(--text-default);
            outline: none;
        }

        .search-input::placeholder { color: #9ca3af; }

        /* ── TABLE CARD ── */
        .table-card {
            background: var(--text-neutral);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
        }

        .table-card { overflow-x: auto; }

        .table-card table {
            width: 100%;
            min-width: 600px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .table-card thead th {
            background: var(--text-neutral);
            padding: 14px 20px;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-default);
            border-bottom: 2px solid var(--border-default);
            white-space: nowrap;
            text-align: left;
        }

        /* column widths */
        .table-card thead th:nth-child(1) { width: 22%; }
        .table-card thead th:nth-child(2) { width: 18%; }
        .table-card thead th:nth-child(3) { width: 16%; }
        .table-card thead th:nth-child(4) { width: 14%; }
        .table-card thead th:nth-child(5) { width: 20%; }
        .table-card thead th:nth-child(6) { width: 10%; text-align: center; }

        .table-card tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.15s;
        }

        .table-card tbody tr:last-child { border-bottom: none; }
        .table-card tbody tr:hover { background: #fafafa; }

        .table-card tbody td {
            padding: 13px 20px;
            font-size: 13px;
            color: var(--text-default);
            vertical-align: middle;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .table-card tbody td:last-child {
            text-align: center;
            padding: 13px 8px;
        }

        /* vehicle make/model cell */
        .vehicle-make {
            font-weight: 700;
            color: var(--bg-primary);
        }

        .vehicle-year {
            font-size: 11px;
            color: #6c757d;
            font-weight: 400;
        }

        /* owner cell */
        .owner-name {
            font-weight: 600;
            color: var(--bg-primary);
        }

        .owner-email {
            font-size: 11px;
            color: #6c757d;
        }

        /* mileage */
        .mileage-val { font-weight: 600; }

        /* ── ACTION BTN ── */
        .btn-action {
            background: none;
            border: none;
            cursor: pointer;
            padding: 5px 7px;
            border-radius: 6px;
            transition: background-color 0.15s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-action:hover { background: var(--bg-hover); }
        .btn-action img { width: 16px; height: 16px; opacity: 0.6; }
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

        .page-btn {
            background: none;
            border: 1px solid var(--border-default);
            border-radius: 6px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 600;
            color: var(--bg-primary);
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.15s;
        }
        .page-btn:hover, .page-btn.active { background: var(--bg-primary); color: white; border-color: var(--bg-primary); }
        .page-btn:disabled { opacity: 0.4; cursor: default; }

        /* ── MODAL ── */
        .modal-card { background: white; border-radius: 12px; border: none; }
        .modal-card .modal-header { background: var(--bg-primary); border-radius: 12px 12px 0 0; border-bottom: none; padding: 16px 20px; }
        .modal-card .modal-title { font-size: 16px; font-weight: 700; color: var(--text-neutral); }
        .modal-card .modal-body { padding: 20px 24px; max-height: 70vh; overflow-y: auto; }
        .modal-card .modal-footer { border-top: 1px solid #eee; padding: 12px 20px; }
        .modal-card .btn-close { filter: invert(1) brightness(2); }

        .detail-label { font-size: 11px; font-weight: 700; color: #6c757d; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 3px; }
        .detail-value { font-size: 13px; font-weight: 600; color: var(--text-default); background: #f8f9fa; border-radius: 7px; padding: 9px 13px; margin-bottom: 12px; min-height: 38px; }

        .btn-ok { background: var(--bg-primary); color: white; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-ok:hover { background: var(--bg-dark); }
    
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

<div class="d-flex" style="height: 100vh;">

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
                    <a href="{{ route('mechanic.reports') }}" class="nav-link">
                        <img src="{{ asset('images/team_reports_icon.png') }}" alt=""> Team Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mechanic.vehicles') }}" class="nav-link active">
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

        <h1 class="page-title">Customer Vehicles</h1>

        <!-- ── SEARCH ── -->
        <form method="GET" action="{{ route('mechanic.vehicles') }}" id="searchForm">
            <div class="search-bar">
                <div class="search-input-wrap">
                    <img src="{{ asset('images/search_icon.png') }}" alt="">
                    <input type="text" name="search" class="search-input"
                        placeholder="Search vehicle, plate, owner..."
                        value="{{ request('search') }}"
                        oninput="debounceSearch()">
                </div>
                @if(request('search'))
                    <a href="{{ route('mechanic.vehicles') }}"
                       style="font-size:12px; color:rgba(255,255,255,0.8); text-decoration:none; font-weight:600; ">
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
                        <th>Vehicle</th>
                        <th>Model</th>
                        <th>License Plate</th>
                        <th>Mileage</th>
                        <th>VIN</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vehicles as $vehicle)
                        <tr>
                            <td>
                                <div class="vehicle-make">
                                    {{ $vehicle->make }}
                                </div>
                                <div class="vehicle-year">{{ $vehicle->year }}</div>
                            </td>
                            <td>{{ $vehicle->model }}</td>
                            <td style="font-weight:600; letter-spacing:0.5px;">
                                {{ $vehicle->license_plate }}
                            </td>
                            <td>
                                <span class="mileage-val">
                                    {{ $vehicle->mileage ? number_format($vehicle->mileage) : '—' }}
                                </span>
                                @if($vehicle->mileage)
                                    <span style="font-size:11px; color:#6c757d;"> mi</span>
                                @endif
                            </td>
                            <td style="font-size:12px; font-family:monospace; color:#6c757d;">
                                {{ $vehicle->vin ?? '—' }}
                            </td>
                            <td>
                                <button class="btn-action" title="View Details"
                                    onclick="openViewModal(
                                        '{{ addslashes($vehicle->make) }}',
                                        '{{ addslashes($vehicle->model) }}',
                                        '{{ $vehicle->year }}',
                                        '{{ $vehicle->license_plate }}',
                                        '{{ $vehicle->vin ?? '—' }}',
                                        '{{ $vehicle->color ?? '—' }}',
                                        '{{ $vehicle->mileage ? number_format($vehicle->mileage) : '—' }}',
                                        '{{ addslashes($vehicle->owner->name ?? '—') }}',
                                        '{{ addslashes($vehicle->owner->email ?? '—') }}',
                                        '{{ addslashes($vehicle->owner->phone ?? '—') }}'
                                    )">
                                    <img src="{{ asset('images/visibility_icon.png') }}" alt="View">
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div style="font-size:40px; margin-bottom:10px;">🚗</div>
                                    <div>No vehicles found.</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- ── PAGINATION ── -->
            @if($vehicles instanceof \Illuminate\Pagination\LengthAwarePaginator && $vehicles->hasPages())
                <div class="pagination-bar">
                    <div>Showing {{ $vehicles->firstItem() }}–{{ $vehicles->lastItem() }} of {{ $vehicles->total() }}</div>
                    <div class="d-flex gap-1">
                        @if($vehicles->onFirstPage())
                            <button class="page-btn" disabled>‹</button>
                        @else
                            <a href="{{ $vehicles->previousPageUrl() }}" class="page-btn">‹</a>
                        @endif

                        @foreach($vehicles->getUrlRange(1, $vehicles->lastPage()) as $page => $url)
                            <a href="{{ $url }}" class="page-btn {{ $vehicles->currentPage() === $page ? 'active' : '' }}">
                                {{ $page }}
                            </a>
                        @endforeach

                        @if($vehicles->hasMorePages())
                            <a href="{{ $vehicles->nextPageUrl() }}" class="page-btn">›</a>
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
<!-- MODAL — VEHICLE DETAILS                                   -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Vehicle Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div style="font-size:13px; font-weight:700; color:#6c757d; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:14px;">
                    Vehicle Information
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <div class="detail-label">Make</div>
                        <div class="detail-value" id="vd_make">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Model</div>
                        <div class="detail-value" id="vd_model">—</div>
                    </div>
                    <div class="col-4">
                        <div class="detail-label">Year</div>
                        <div class="detail-value" id="vd_year">—</div>
                    </div>
                    <div class="col-4">
                        <div class="detail-label">Color</div>
                        <div class="detail-value" id="vd_color">—</div>
                    </div>
                    <div class="col-4">
                        <div class="detail-label">Mileage</div>
                        <div class="detail-value" id="vd_mileage">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">License Plate</div>
                        <div class="detail-value" id="vd_plate" style="font-weight:700; letter-spacing:1px;">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">VIN</div>
                        <div class="detail-value" id="vd_vin" style="font-family:monospace; font-size:12px;">—</div>
                    </div>
                </div>

                <div style="font-size:13px; font-weight:700; color:#6c757d; text-transform:uppercase; letter-spacing:0.5px; margin-bottom:14px;">
                    Owner Information
                </div>
                <div class="row g-2">
                    <div class="col-12">
                        <div class="detail-label">Name</div>
                        <div class="detail-value" id="vd_owner_name">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Email</div>
                        <div class="detail-value" id="vd_owner_email">—</div>
                    </div>
                    <div class="col-6">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value" id="vd_owner_phone">—</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button class="btn-ok" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const viewModal = new bootstrap.Modal(document.getElementById('viewModal'));

    function openViewModal(make, model, year, plate, vin, color, mileage, ownerName, ownerEmail, ownerPhone) {
        document.getElementById('vd_make').textContent        = make        || '—';
        document.getElementById('vd_model').textContent       = model       || '—';
        document.getElementById('vd_year').textContent        = year        || '—';
        document.getElementById('vd_color').textContent       = color       || '—';
        document.getElementById('vd_mileage').textContent     = mileage ? mileage + ' mi' : '—';
        document.getElementById('vd_plate').textContent       = plate       || '—';
        document.getElementById('vd_vin').textContent         = vin         || '—';
        document.getElementById('vd_owner_name').textContent  = ownerName   || '—';
        document.getElementById('vd_owner_email').textContent = ownerEmail  || '—';
        document.getElementById('vd_owner_phone').textContent = ownerPhone  || '—';
        viewModal.show();
    }

    // ── SEARCH DEBOUNCE ──
    let searchTimer;
    function debounceSearch() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
            document.getElementById('searchForm').submit();
        }, 500);
    }
</script>
</body>
</html>