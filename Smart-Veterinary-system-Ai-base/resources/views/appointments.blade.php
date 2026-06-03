@extends('app')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">My Appointment Requests</h3>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>Doctor</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Doctor Comments</th>
                    <th>Prescription</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($appointments as $a)
                <tr>
                    <td>{{ $a->doctor->name ?? 'Doctor' }}</td>
                    <td>{{ $a->doctor->phone ?? '-' }}</td>
                    <td>{{ $a->appointment_date }}</td>
                    <td>{{ $a->appointment_time }}</td>

                    <!-- Doctor Comments -->
                    <td>
                        <div class="border rounded p-2 bg-light"
                             style="max-height:120px; overflow-y:auto; white-space:pre-line;">
                            {{ $a->doctor_comment ?? '—' }}
                        </div>
                    </td>

                    <!-- Prescription -->
                    <td>
                        <div class="border rounded p-2 bg-light mb-2"
                             style="max-height:120px; overflow-y:auto; white-space:pre-line;">
                            {{ $a->prescription ?? '—' }}
                        </div>

                        @if($a->prescription)
                        <a href="{{ url('/appointment/'.$a->id.'/prescription-pdf') }}"
                           class="btn btn-sm btn-outline-primary w-100">
                            <i class="bi bi-download"></i> Download PDF
                        </a>
                        @endif
                    </td>

                    <!-- Status -->
                    <td class="text-center">
                        @if($a->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($a->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @else
                            <span class="badge bg-danger">Rejected</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
