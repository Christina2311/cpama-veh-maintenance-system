<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - CPAMA VEH MAINTENANCE</title>
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
            display: flex; align-items: center; gap: 10px; color: white;
            font-size: 12px; font-weight: 600; padding: 9px 14px; border-radius: 8px;
            border: 1px solid rgba(255,255,255,0.15);
            background-color: rgba(255,255,255,0.08); transition: background-color 0.2s;
        }

        .nav-item .nav-link:hover, 
        .nav-item .nav-link.active {
            background-color: rgba(255,255,255,0.22); 
            color: white;
        }

        .nav-item 
        .nav-link img { 
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
            min-height: 90px;
        }

        .stat-card-label { 
            font-size: 13px; 
            font-weight: 700; 
            color: #333; 
        }

        .stat-card-label img { 
            width: 16px; 
            height: 16px; 
            opacity: 0.7; 
        }

        .stat-card-value { 
            font-size: 30px; 
            font-weight: 800; 
            color: #0D0D32; 
        }

        /* ── SEARCH & FILTER ── */
        .search-bar {
            background: rgba(255,255,255,0.92); 
            border: none; 
            border-radius: 8px;
            padding: 10px 14px 10px 40px; 
            font-size: 13px; 
            color: #333;
            width: 100%; 
            outline: none; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
         
        .search-wrapper { 
            position: relative; 
            flex: 1; 
        }

        .search-icon {
            position: absolute; 
            left: 12px; 
            top: 50%; 
            transform: translateY(-50%);
            color: #6c757d; 
            font-size: 14px; 
            pointer-events: none;
        }

        .role-select {
            background: rgba(255,255,255,0.92); 
            border: none; 
            border-radius: 8px;
            padding: 10px 36px 10px 14px; 
            font-size: 13px; 
            font-weight: 600; 
            color: #333;
            outline: none; 
            box-shadow: 0 2px 8px rgba(0,0,0,0.08); 
            appearance: none;
            cursor: pointer;
            min-width: 140px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%236c757d' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat; 
            background-position: right 12px center;
        }

        /* ── TABLE ── */
        .table-panel {
            background: rgba(255,255,255,0.92); 
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
            overflow: hidden;
        }

        .table-scroll { 
            overflow-y: auto; 
            overflow-x: auto; 
            max-height: 55vh; 
            border-radius: 8px; 
        }

        .table { 
            margin: 0; 
            font-size: 13px; 
        }

        .table thead th {
            background: #E3E3E3; 
            color: #0D0D32; 
            font-weight: 700; 
            font-size: 12px;
            border: none; 
            padding: 12px 16px; 
            position: sticky; 
            top: 0; 
            z-index: 1;
        }
        .table tbody tr { 
            border-bottom: 1px solid rgba(0,0,0,0.05); 
            transition: background-color 0.15s; 
        }

        .table tbody tr:hover { 
            background-color: rgba(97, 96, 162, 0.06); 
        }
        .table tbody td { 
            padding: 12px 16px; 
            vertical-align: middle; 
            border: none; 
            color: #0D0D32; 
        }

        .user-name { 
            font-weight: 700; 
            font-size: 13px; 
            color: #0D0D32; 
        }

        .user-email { 
            font-size: 11px; 
            color: #6c757d; 
        }

        .badge-role { 
            font-size: 11px; 
            font-weight: 600; 
            padding: 4px 10px; 
            border-radius: 20px; 
        }

        .badge-admin    { 
            background: #0D0D32; 
            color: white; 
        }

        .badge-mechanic { 
            background: #6160A2; 
            color: white; 
        }

        .badge-customer { 
            background: #8E98A8; 
            color: white; 
        }

        .badge-status { 
            font-size: 11px; 
            font-weight: 600; 
            padding: 4px 10px; 
            border-radius: 20px; 
        }

        .badge-active   { 
            background: #d1fae5; 
            color: #065f46; 
        }

        .badge-inactive { 
            background: #fee2e2; 
            color: #991b1b; 
        }

        .action-btn {
            width: 32px; height: 32px; border-radius: 6px; border: none;
            display: inline-flex; align-items: center; justify-content: center;
            cursor: pointer; transition: opacity 0.2s; font-size: 14px;
        }
        .action-btn:hover { opacity: 0.8; }
        .btn-edit    { background: #3b82f6; color: white; }
        .btn-archive { background: #ffc107; color: white; }
        .btn-restore { background: #22c55e; color: white; }

        .add-user-btn {
            background: #0D0D32; color: white; border: none; border-radius: 8px;
            padding: 10px 18px; font-size: 13px; font-weight: 700; cursor: pointer;
            transition: background-color 0.2s; white-space: nowrap;
        }
        .add-user-btn:hover { background: #1a1a5e; }

        .empty-state { text-align: center; padding: 30px; color: #6c757d; font-size: 13px; }

        /* ── ADD/EDIT USER MODAL ── */
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
        .btn-no { background: #e5e7eb; color: #333; border: none; border-radius: 6px; padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer; }
        .btn-yes, .btn-ok {
            background: #0D0D32; color: white; border: none; border-radius: 6px;
            padding: 8px 20px; font-size: 13px; font-weight: 600; cursor: pointer;
        }
        .btn-yes:hover, .btn-ok:hover { background: #1a1a5e; }


        
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
                <a href="{{ route('admin.reports') }}" class="nav-link">
                    <img src="{{ asset('images/reports_icon.png') }}" alt=""> Reports
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link active">
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
            <h1 class="page-title mb-0">User Management</h1>
            <button class="add-user-btn" data-bs-toggle="modal" data-bs-target="#addUserModal">
                + Add User
            </button>
        </div>

        <!-- Role Stat Cards -->
        <div class="row g-3 mb-4">
            <div class="col-4">
                <div class="stat-card p-3 d-flex flex-column">
                    <div class="d-flex align-items-center gap-2 stat-card-label mb-2">
                        <img src="{{ asset('images/admin_icon.png') }}" alt=""> Admin
                    </div>
                    <div class="stat-card-value text-end mt-auto">{{ $roleCounts['admin'] }}</div>
                </div>
            </div>

            <div class="col-4">
                <div class="stat-card p-3 d-flex flex-column">
                    <div class="d-flex align-items-center gap-2 stat-card-label mb-2">
                        <img src="{{ asset('images/maintenance_icon.png') }}" alt=""> Senior Mechanics
                    </div>
                    <div class="stat-card-value text-end mt-auto">{{ $roleCounts['senior_mechanic'] }}</div>
                </div>
            </div>

            <div class="col-4">
                <div class="stat-card p-3 d-flex flex-column">
                    <div class="d-flex align-items-center gap-2 stat-card-label mb-2">
                        <img src="{{ asset('images/maintenance_icon.png') }}" alt=""> Mechanics
                    </div>
                    <div class="stat-card-value text-end mt-auto">{{ $roleCounts['mechanic'] }}</div>
                </div>
            </div>

            <div class="col-4">
                <div class="stat-card p-3 d-flex flex-column">
                    <div class="d-flex align-items-center gap-2 stat-card-label mb-2">
                        <img src="{{ asset('images/customer_icon.png') }}" alt=""> Customers
                    </div>
                    <div class="stat-card-value text-end mt-auto">{{ $roleCounts['customer'] }}</div>
                </div>
            </div>
        </div>

        <!-- Search & Filter -->
        <form method="GET" action="{{ route('admin.users') }}" class="d-flex gap-3 mb-3">
            <div class="search-wrapper">
                <span class="search-icon">
                    <img src="{{ asset('images/search_icon.png') }}" style="width:14px; height:14px; opacity:0.5;">
                </span>
                <input type="text" name="search" class="search-bar"
                    placeholder="Search user by name, email, or role..."
                    value="{{ request('search') }}">
            </div>
            <select name="role" class="role-select" onchange="this.form.submit()">
                <option value="">All Roles</option>
                <option value="admin"    {{ request('role') == 'admin'    ? 'selected' : '' }}>Admin</option>
                <option value="mechanic" {{ request('role') == 'mechanic' ? 'selected' : '' }}>Mechanic</option>
                <option value="senior_mechanic" {{ request('role') == 'senior_mechanic' ? 'selected' : '' }}>Senior Mechanic</option>
                <option value="customer" {{ request('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                <option value="archived" {{ request('role') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </form>

        <!-- Users Table -->
        <div class="table-panel">
            <div class="table-scroll">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Last Login</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <div class="user-name">{{ $user->name }}</div>
                                    <div class="user-email">{{ $user->email }}</div>
                                </td>

                                <td>
                                    <div class="user-phone" style="font-size: 13px; font-weight: 600;">
                                        {{ $user->phone ?? 'N/A' }}
                                    </div>
                                </td>

                                <td>
                                    <span class="badge-role badge-{{ $user->role }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-status badge-{{ $user->status }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->format('Y-m-d') : 'Never' }}
                                </td>
                                <td>
                                    {{--Edit button now opens modal instead of navigating away --}}
                                    <button class="action-btn btn-edit ms-1" title="Edit"
                                        onclick="openEditModal({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ $user->email }}', '{{ $user->phone }}', '{{ $user->role }}', '{{ $user->status }}')">
                                        <img src="{{ asset('images/edit_icon.png') }}" style="width:15px; height:15px; filter: brightness(0) invert(1);">
                                    </button>

                                    @if($user->status === 'active')
                                        <form method="POST" action="{{ route('admin.users.archive', $user->id) }}"
                                            style="display:inline;"
                                            onsubmit="return confirm('Archive {{ $user->name }}? They will be set to inactive.')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="action-btn btn-archive ms-1" title="Archive">
                                                <img src="{{ asset('images/archive_icon.png') }}" style="width:15px; height:15px; filter: brightness(0) invert(1);">
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('admin.users.restore', $user->id) }}"
                                            style="display:inline;"
                                            onsubmit="return confirm('Restore {{ $user->name }}? They will be set to active.')">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="action-btn btn-restore ms-1" title="Restore">
                                                <img src="{{ asset('images/user_icon.png') }}" style="width:15px; height:15px; filter: brightness(0) invert(1);">
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-state">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- ADD USER FORM              -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Add New User</h5>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="modal-label">Full Name</div>
                        <input type="text" id="inp_name" class="modal-input" placeholder="Enter full name">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_name"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Email</div>
                        <input type="email" id="inp_email" class="modal-input" placeholder="user@example.com">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_email"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Role</div>
                        <select id="inp_role" class="modal-select">
                            <option value="">Select role</option>
                            <option value="admin">Admin</option>
                            <option value="mechanic">Mechanic</option>
                            <option value="customer">Customer</option>
                        </select>
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_role"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Status</div>
                        <select id="inp_status" class="modal-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <div class="modal-label">Phone Number</div>
                        <input type="text" id="inp_phone" class="modal-input" placeholder="09XXXXXXXXX">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_phone"></div>
                    </div>

                    <div class="col-6">
                        <div class="modal-label">Temporary Password</div>
                        <input type="password" id="inp_password" class="modal-input" placeholder="Min. 8 characters">
                        <div class="text-danger mt-1" style="font-size:11px;" id="err_password"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                <button class="btn-create" onclick="openQuestionModal()">Create User</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- QUESTION DIALOG            -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="questionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to add this user to the user management record?
            </div>
            <div class="modal-footer">
                <button class="btn-no" onclick="goBackToForm()">No</button>
                <button class="btn-yes" onclick="submitNewUser()">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- CONFIRMATION DIALOG        -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                The user was successfully added to the record.
            </div>
            <div class="modal-footer">
                <button class="btn-ok" onclick="finishAndReload()">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- EDIT USER FORM             -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-card">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="modal-label">Full Name</div>
                        <input type="text" id="edit_name" class="modal-input" placeholder="Enter full name">
                        <div class="text-danger mt-1" style="font-size:11px;" id="edit_err_name"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Email</div>
                        <input type="email" id="edit_email" class="modal-input" placeholder="user@example.com">
                        <div class="text-danger mt-1" style="font-size:11px;" id="edit_err_email"></div>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Role</div>
                        <select id="edit_role" class="modal-select">
                            <option value="">Select role</option>
                            <option value="admin">Admin</option>
                            <option value="mechanic">Mechanic</option>
                            <option value="customer">Customer</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <div class="modal-label">Status</div>
                        <select id="edit_status" class="modal-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="modal-label">Phone Number</div>
                        <input type="text" id="edit_phone" class="modal-input" placeholder="09XXXXXXXXX">
                        <div class="text-danger mt-1" style="font-size:11px;" id="edit_err_phone"></div>
                    </div>

                    <div class="col-12">
                        <div class="modal-label">Reset Password</div>
                        <input type="password" id="edit_password" class="modal-input" placeholder="Leave blank to keep current password">
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn-cancel" data-bs-dismiss="modal" >Cancel</button>
                <button class="btn-create" onclick="openEditQuestionModal()">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- EDIT QUESTION DIALOG       -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="editQuestionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">Are you sure you want to save the changes to this user?</div>
            <div class="modal-footer">
                <button class="btn-no" onclick="goBackToEditForm()">No</button>
                <button class="btn-yes" onclick="submitEditUser()">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════ -->
<!-- EDIT CONFIRMATION DIALOG   -->
<!-- ══════════════════════════════════════ -->
<div class="modal fade" id="editConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content dialog-card">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">The user's information was successfully edited.</div>
            <div class="modal-footer">
                <button class="btn-ok" onclick="finishAndReload()">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden form — Add User (submits to Laravel) -->
<form id="addUserForm" method="POST" action="{{ route('admin.users.store') }}" style="display:none;">
    @csrf
    <input type="hidden" name="name"                  id="form_name">
    <input type="hidden" name="email"                 id="form_email">
    <input type="hidden" name="role"                  id="form_role">
    <input type="hidden" name="status"                id="form_status">
    <input type="hidden" name="password"              id="form_password">
    <input type="hidden" name="password_confirmation" id="form_password_confirm">
</form>

<!-- Hidden form — Edit User (submits to Laravel) -->
<form id="editUserForm" method="POST" style="display:none;">
    @csrf
    @method('PUT')
    <input type="hidden" name="name"     id="edit_form_name">
    <input type="hidden" name="email"    id="edit_form_email">
    <input type="hidden" name="phone"    id="edit_form_phone">
    <input type="hidden" name="role"     id="edit_form_role">
    <input type="hidden" name="status"   id="edit_form_status">
    <input type="hidden" name="password" id="edit_form_password">
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const addUserModal  = new bootstrap.Modal(document.getElementById('addUserModal'));
    const questionModal = new bootstrap.Modal(document.getElementById('questionModal'));
    const confirmModal  = new bootstrap.Modal(document.getElementById('confirmModal'));

    // ── ADD USER ──

    function openQuestionModal() {
        const name     = document.getElementById('inp_name').value.trim();
        const email    = document.getElementById('inp_email').value.trim();
        const role     = document.getElementById('inp_role').value;
        const password = document.getElementById('inp_password').value;

        let valid = true;
        document.getElementById('err_name').textContent     = '';
        document.getElementById('err_email').textContent    = '';
        document.getElementById('err_role').textContent     = '';
        document.getElementById('err_password').textContent = '';

        if (!name) { document.getElementById('err_name').textContent = 'Full name is required.'; valid = false; }
        if (!email || !email.includes('@')) { document.getElementById('err_email').textContent = 'Valid email is required.'; valid = false; }
        if (!role) { document.getElementById('err_role').textContent = 'Please select a role.'; valid = false; }
        if (password.length < 8) { document.getElementById('err_password').textContent = 'Password must be at least 8 characters.'; valid = false; }

        if (!valid) return;

        addUserModal.hide();
        setTimeout(() => questionModal.show(), 300);
    }

    function goBackToForm() {
        questionModal.hide();
        setTimeout(() => addUserModal.show(), 300);
    }

    function submitNewUser() {
        document.getElementById('form_name').value             = document.getElementById('inp_name').value.trim();
        document.getElementById('form_email').value            = document.getElementById('inp_email').value.trim();
        document.getElementById('form_phone').value            = document.getElementById('inp_phone').value.trim();
        document.getElementById('form_role').value             = document.getElementById('inp_role').value;
        document.getElementById('form_status').value           = document.getElementById('inp_status').value;
        document.getElementById('form_password').value         = document.getElementById('inp_password').value;
        document.getElementById('form_password_confirm').value = document.getElementById('inp_password').value;

        questionModal.hide();
        document.getElementById('addUserForm').submit();
    }

    function finishAndReload() {
        window.location.href = "{{ route('admin.users') }}";
    }

    // Show Add confirmation modal if redirected back with success
    @if(session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            confirmModal.show();
        });
    @endif

    // ── EDIT USER ──

    const editUserModal     = new bootstrap.Modal(document.getElementById('editUserModal'));
    const editQuestionModal = new bootstrap.Modal(document.getElementById('editQuestionModal'));
    const editConfirmModal  = new bootstrap.Modal(document.getElementById('editConfirmModal'));

    let currentEditUserId = null;

    function openEditModal(id, name, email, phone, role, status) {
        currentEditUserId = id;
        document.getElementById('edit_name').value   = name;
        document.getElementById('edit_email').value  = email;
        document.getElementById('edit_phone').value  = phone;
        document.getElementById('edit_role').value   = role;
        document.getElementById('edit_status').value = status;
        document.getElementById('edit_password').value = '';
        document.getElementById('edit_err_name').textContent  = '';
        document.getElementById('edit_err_email').textContent = '';
        editUserModal.show();
    }

    function openEditQuestionModal() {
        const name  = document.getElementById('edit_name').value.trim();
        const email = document.getElementById('edit_email').value.trim();

        document.getElementById('edit_err_name').textContent  = '';
        document.getElementById('edit_err_email').textContent = '';

        let valid = true;
        if (!name)  { document.getElementById('edit_err_name').textContent  = 'Full name is required.'; valid = false; }
        if (!email || !email.includes('@')) { document.getElementById('edit_err_email').textContent = 'Valid email is required.'; valid = false; }
        if (!valid) return;

        editUserModal.hide();
        setTimeout(() => editQuestionModal.show(), 300);
    }

    function goBackToEditForm() {
        editQuestionModal.hide();
        setTimeout(() => editUserModal.show(), 300);
    }

    function submitEditUser() {
        const form = document.getElementById('editUserForm');
        form.action = `/admin/users/${currentEditUserId}`;

        document.getElementById('edit_form_name').value     = document.getElementById('edit_name').value.trim();
        document.getElementById('edit_form_email').value    = document.getElementById('edit_email').value.trim();
        document.getElementById('edit_form_phone').value    = document.getElementById('edit_phone').value.trim();
        document.getElementById('edit_form_role').value     = document.getElementById('edit_role').value;
        document.getElementById('edit_form_status').value   = document.getElementById('edit_status').value;
        document.getElementById('edit_form_password').value = document.getElementById('edit_password').value;

        editQuestionModal.hide();
        form.submit();
    }

    // Show Edit confirmation modal if redirected back with edit_success
    @if(session('edit_success'))
        document.addEventListener('DOMContentLoaded', function() {
            editConfirmModal.show();
        });
    @endif
</script>
</body>
</html>