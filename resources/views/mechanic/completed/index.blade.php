<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Tasks - CPAMA VEH MAINTENANCE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        :root {
            --bg-primary:   #0D0D32;
            --bg-secondary: #D9D9D9;
            --bg-hover:     #E3E3E3;
            --text-default: #000000;
            --text-neutral: #FFFFFF;
            --icon-default: #0D0D32;
            --accent:       #6160A2;
            --accent-dark:  #0F0F40;
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
            padding: 36px 40px;
        }

        .page-title {
            font-size: 36px;
            font-weight: 800;
            color: var(--text-neutral);
            margin-bottom: 28px;
        }

        /* ── TABLE CARD ── */
        .table-card {
            background: var(--text-neutral);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.10);
        }

        .table-card { overflow-x: auto; }

        .table-card table {
            width: 100%;
            min-width: 520px;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .table-card thead th {
            background: var(--text-neutral);
            padding: 16px 20px;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-default);
            border-bottom: 2px solid var(--bg-secondary);
            white-space: nowrap;
        }

        /* fixed column widths so Actions never gets squeezed out */
        .table-card thead th:nth-child(1) { width: 30%; }
        .table-card thead th:nth-child(2) { width: 26%; }
        .table-card thead th:nth-child(3) { width: 18%; }
        .table-card thead th:nth-child(4) { width: 14%; }
        .table-card thead th:nth-child(5) { width: 72px; min-width: 72px; text-align: center; }

        .table-card tbody tr {
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.15s;
        }

        .table-card tbody tr:last-child { border-bottom: none; }

        .table-card tbody tr:hover { background: #fafafa; }

        .table-card tbody td {
            padding: 14px 20px;
            font-size: 13px;
            color: var(--text-default);
            vertical-align: middle;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Actions column: always centred, never squeezed */
        .table-card tbody td:last-child {
            width: 72px;
            min-width: 72px;
            text-align: center;
            padding: 14px 8px;
        }

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
        .btn-action img { width: 17px; height: 17px; opacity: 0.6; }
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
            padding: 14px 24px;
            border-top: 1px solid #f0f0f0;
            font-size: 12px;
            color: #6c757d;
        }

        .page-btn {
            background: none;
            border: 1px solid var(--bg-secondary);
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
        .modal-task .modal-content {
            border-radius: 14px;
            border: none;
            background: #EDEDF8;
        }

        .modal-task .modal-header {
            background: #EDEDF8;
            border-bottom: none;
            border-radius: 14px 14px 0 0;
            padding: 20px 24px 8px;
        }

        .modal-task .modal-title {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-default);
        }

        .modal-task .modal-body {
            padding: 0 24px 8px;
            max-height: 75vh;
            overflow-y: auto;
        }

        .modal-task .modal-footer {
            background: #EDEDF8;
            border-top: none;
            border-radius: 0 0 14px 14px;
            padding: 12px 24px 20px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        /* summary row */
        .summary-row {
            background: #DCDCF0;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 16px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }

        .summary-cell-label {
            font-size: 10px;
            font-weight: 700;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin-bottom: 2px;
        }

        .summary-cell-value {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-default);
        }

        /* section headers */
        .section-label {
            font-size: 13px;
            font-weight: 700;
            color: var(--text-default);
            margin-bottom: 8px;
            margin-top: 4px;
        }

        /* field rows */
        .field-row {
            background: #DCDCF0;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 8px;
            font-size: 12px;
            color: var(--text-default);
            min-height: 38px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .field-row .field-name { font-weight: 500; }
        .field-row .field-price { font-weight: 700; font-size: 13px; }

        .field-total {
            background: transparent;
            border-radius: 8px;
            padding: 8px 14px;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-default);
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 1px solid #C0C0E0;
        }

        /* notes textarea */
        .notes-area {
            background: #DCDCF0;
            border: none;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 12px;
            color: var(--text-default);
            width: 100%;
            resize: vertical;
            min-height: 70px;
            outline: none;
            font-family: sans-serif;
        }

        .divider { border: none; border-top: 1px solid #C0C0E0; margin: 14px 0; }

        /* modal buttons */
        .btn-close-modal {
            flex: 1;
            background: var(--text-neutral);
            color: var(--text-default);
            border: 1.5px solid var(--bg-secondary);
            border-radius: 8px;
            padding: 10px 0;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.15s;
        }
        .btn-close-modal:hover { background: var(--bg-secondary); }

        .btn-download-pdf {
            flex: 1;
            background: var(--bg-primary);
            color: var(--text-neutral);
            border: none;
            border-radius: 8px;
            padding: 10px 0;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.15s;
        }
        .btn-download-pdf:hover { background: var(--accent-dark); }
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
                    <a href="{{ route('mechanic.completed') }}" class="nav-link active">
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
                    <a href="{{ route('mechanic.vehicles') }}" class="nav-link">
                        <img src="{{ asset('images/customer_vehicle_icon.png') }}" alt=""> Customer Vehicles
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mechanic.assign') }}" class="nav-link">
                        <img src="{{ asset('images/assign_task_icon.png') }}" alt=""> Assign Task to Team
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

        <h1 class="page-title">Completed Tasks</h1>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Vehicle</th>
                        <th>Task Type</th>
                        <th>Completed</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        @php
                            $vehicle     = $task->appointment->vehicle  ?? null;
                            $service     = $task->service               ?? null;
                            $appointment = $task->appointment           ?? null;
                            $customer    = $appointment->customer       ?? null;

                            // Duration calculation
                            $duration = '—';
                            if ($task->started_at && $task->completed_at) {
                                $mins = \Carbon\Carbon::parse($task->started_at)
                                    ->diffInMinutes(\Carbon\Carbon::parse($task->completed_at));
                                $duration = $mins >= 60
                                    ? floor($mins / 60) . 'h ' . ($mins % 60) . 'min'
                                    : $mins . ' min';
                            } elseif ($service && $service->estimated_duration) {
                                $duration = $service->estimated_duration . ' min';
                            }

                            // Cost
                            $cost = $appointment ? $appointment->total_amount : 0;

                            // Parts list from notes or work_description
                            $partsText = $task->notes ?? '';
                            $workText  = $task->work_description ?? '';
                        @endphp
                        <tr>
                            <td style="font-weight:600;">
                                {{ $vehicle ? $vehicle->make . ' ' . $vehicle->model : '—' }}
                                @if($vehicle && $vehicle->license_plate)
                                    <div style="font-size:11px; color:#6c757d; font-weight:400;">
                                        {{ $vehicle->license_plate }}
                                    </div>
                                @endif
                            </td>
                            <td>{{ $service->service_name ?? '—' }}</td>
                            <td>
                                {{ $task->completed_at
                                    ? \Carbon\Carbon::parse($task->completed_at)->format('Y-m-d')
                                    : ($appointment && $appointment->appointment_date
                                        ? \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d')
                                        : '—') }}
                            </td>
                            <td>{{ $duration }}</td>
                            <td>
                                <button class="btn-action" title="View Details"
                                    onclick="openTaskModal(
                                        '{{ addslashes($vehicle ? $vehicle->license_plate : '—') }}',
                                        '{{ addslashes($service->service_name ?? '—') }}',
                                        '{{ $task->completed_at ? \Carbon\Carbon::parse($task->completed_at)->format('Y-m-d') : '—' }}',
                                        '{{ $duration }}',
                                        '{{ addslashes($workText) }}',
                                        '{{ addslashes($partsText) }}',
                                        '{{ addslashes($service->service_name ?? '') }}',
                                        '{{ number_format($service->base_price ?? 0, 2) }}',
                                        '{{ number_format($cost, 2) }}',
                                        '{{ addslashes($task->notes ?? '') }}'
                                    )">
                                    <img src="{{ asset('images/visibility_icon.png') }}" alt="View">
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <div style="font-size:40px; margin-bottom:10px;">✅</div>
                                    <div>No completed tasks yet.</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($tasks instanceof \Illuminate\Pagination\LengthAwarePaginator && $tasks->hasPages())
                <div class="pagination-bar">
                    <div>Showing {{ $tasks->firstItem() }}–{{ $tasks->lastItem() }} of {{ $tasks->total() }}</div>
                    <div class="d-flex gap-1">
                        @if($tasks->onFirstPage())
                            <button class="page-btn" disabled>‹</button>
                        @else
                            <a href="{{ $tasks->previousPageUrl() }}" class="page-btn">‹</a>
                        @endif

                        @foreach($tasks->getUrlRange(1, $tasks->lastPage()) as $page => $url)
                            <a href="{{ $url }}" class="page-btn {{ $tasks->currentPage() === $page ? 'active' : '' }}">
                                {{ $page }}
                            </a>
                        @endforeach

                        @if($tasks->hasMorePages())
                            <a href="{{ $tasks->nextPageUrl() }}" class="page-btn">›</a>
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
<!-- MODAL — TASK DETAILS                                      -->
<!-- ══════════════════════════════════════════════════════════ -->
<div class="modal fade modal-task" id="taskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Task Details</h5>
            </div>
            <div class="modal-body">

                <!-- Summary Row -->
                <div class="summary-row">
                    <div>
                        <div class="summary-cell-label">Vehicle ID</div>
                        <div class="summary-cell-value" id="td_plate">—</div>
                    </div>
                    <div>
                        <div class="summary-cell-label">Service Type</div>
                        <div class="summary-cell-value" id="td_service">—</div>
                    </div>
                    <div>
                        <div class="summary-cell-label">Completed Date</div>
                        <div class="summary-cell-value" id="td_date">—</div>
                    </div>
                    <div>
                        <div class="summary-cell-label">Duration</div>
                        <div class="summary-cell-value" id="td_duration">—</div>
                    </div>
                </div>

                <!-- Work Performed -->
                <div class="section-label">Work Performed</div>
                <div class="field-row" id="td_work" style="min-height:60px; align-items:flex-start; padding-top:12px;">—</div>

                <hr class="divider">

                <!-- Parts & Materials -->
                <div class="section-label">Parts &amp; Materials Used</div>
                <div class="field-row" id="td_parts">
                    <span class="field-name" id="td_parts_name">—</span>
                    <span class="field-price" id="td_parts_price">—</span>
                </div>
                <div class="field-total">
                    <span>Total Parts:</span>
                    <span id="td_parts_total">₱0.00</span>
                </div>

                <hr class="divider">

                <!-- Labor -->
                <div class="section-label">Labor</div>
                <div class="field-row">
                    <span class="field-name" id="td_labor_name">—</span>
                    <span class="field-price" id="td_labor_price">₱0.00</span>
                </div>

                <hr class="divider">

                <!-- Recommendations -->
                <div class="section-label">Recommendations</div>
                <div class="field-row" id="td_recommendations" style="min-height:60px; align-items:flex-start; padding-top:12px;">—</div>

                <hr class="divider">

                <!-- Total Cost -->
                <div class="section-label">Total Cost</div>
                <div class="field-total" style="font-size:14px;">
                    <span>Total:</span>
                    <span id="td_total">₱0.00</span>
                </div>

                <hr class="divider">

                <!-- Mechanic Notes -->
                <div class="section-label">Mechanic Notes</div>
                <textarea class="notes-area" id="td_notes" readonly rows="3"></textarea>

            </div>
            <div class="modal-footer">
                <button class="btn-close-modal" data-bs-dismiss="modal">Close</button>
                <button class="btn-download-pdf" onclick="printTaskDetails()">Download PDF</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const taskModal = new bootstrap.Modal(document.getElementById('taskModal'));

    function openTaskModal(plate, service, date, duration, work, parts, laborName, laborPrice, total, notes) {
        document.getElementById('td_plate').textContent    = plate    || '—';
        document.getElementById('td_service').textContent  = service  || '—';
        document.getElementById('td_date').textContent     = date     || '—';
        document.getElementById('td_duration').textContent = duration || '—';

        // Work performed
        document.getElementById('td_work').textContent = work || '—';

        // Parts (from notes field — list items separated by newline or comma)
        const partsLines = parts ? parts.split(/[\n,]/).map(p => p.trim()).filter(Boolean) : [];
        if (partsLines.length > 0) {
            document.getElementById('td_parts_name').textContent  = partsLines[0];
            document.getElementById('td_parts_price').textContent = '';
            // Show remaining parts below first
            document.getElementById('td_parts').innerHTML =
                partsLines.map(p => `<span class="field-name">${p}</span>`).join('<br>');
        } else {
            document.getElementById('td_parts').innerHTML = '<span class="field-name">—</span>';
        }

        document.getElementById('td_parts_total').textContent = '₱0.00';

        // Labor
        document.getElementById('td_labor_name').textContent  = laborName  || '—';
        document.getElementById('td_labor_price').textContent = '₱' + (laborPrice || '0.00');

        // Recommendations (from work description)
        document.getElementById('td_recommendations').textContent = work || '—';

        // Total
        document.getElementById('td_total').textContent = '₱' + (total || '0.00');

        // Notes
        document.getElementById('td_notes').value = notes || '';

        taskModal.show();
    }

    function printTaskDetails() {
        const plate    = document.getElementById('td_plate').textContent;
        const service  = document.getElementById('td_service').textContent;
        const date     = document.getElementById('td_date').textContent;
        const duration = document.getElementById('td_duration').textContent;
        const work     = document.getElementById('td_work').textContent;
        const total    = document.getElementById('td_total').textContent;
        const notes    = document.getElementById('td_notes').value;

        const html = `
            <html><head><title>Task Report - ${plate}</title>
            <style>
                body { font-family: sans-serif; padding: 32px; color: #000; }
                h2 { font-size: 20px; font-weight: 800; margin-bottom: 20px; }
                table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                td, th { border: 1px solid #ddd; padding: 10px 14px; font-size: 13px; }
                th { background: #EDEDF8; font-weight: 700; text-align: left; }
                .section { font-size: 13px; font-weight: 700; margin: 16px 0 6px; }
                .box { background: #EDEDF8; border-radius: 6px; padding: 10px 14px; font-size: 13px; margin-bottom: 10px; }
                .total { font-size: 15px; font-weight: 800; text-align: right; margin-top: 12px; }
            </style></head>
            <body>
                <h2>Task Completion Report</h2>
                <table>
                    <tr><th>Vehicle ID</th><td>${plate}</td><th>Service</th><td>${service}</td></tr>
                    <tr><th>Completed</th><td>${date}</td><th>Duration</th><td>${duration}</td></tr>
                </table>
                <div class="section">Work Performed</div>
                <div class="box">${work || '—'}</div>
                <div class="section">Mechanic Notes</div>
                <div class="box">${notes || '—'}</div>
                <div class="total">Total Cost: ${total}</div>
            </body></html>`;

        const w = window.open('', '_blank');
        w.document.write(html);
        w.document.close();
        w.print();
    }
</script>
</body>
</html>