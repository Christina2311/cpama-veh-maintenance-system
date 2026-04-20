<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance - CPAMA VEH MAINTENANCE</title>
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
                        <a href="#" class="nav-link">
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
        </div>
        
    </body>
</html>