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
</nav>

<!-- ── MAIN CONTENT ── -->
<div class="main-content">

    <div class="page-header">
        <h1 class="page-title">Appointments</h1>
        <button class="book-btn" data-bs-toggle="modal" data-bs-target="#bookModal">
            Book New Appointment
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

            {{-- Only show cancel for pending or confirmed --}}
            @if(in_array($appt->status, ['pending', 'confirmed']))
                <button class="btn-cancel-appt"
                    onclick="openCancelModal({{ $appt->id }})">
                    Cancel Appointment
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
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">
                                    {{ $vehicle->year }} {{ $vehicle->make }} {{ $vehicle->model }}
                                </option>
                            @endforeach
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
</script>
</body>
</html>