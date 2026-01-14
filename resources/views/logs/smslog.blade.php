@extends('layouts.admin')
@section('title', 'SMS Logs')

@section('content')

    <style>
        :root {
            --primary: #0d6efd;
            --bg-light: #f5f9ff;
            --card-bg: #ffffff;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --border-light: #e5e7eb;
        }

        .page-content {
            padding: 22px 26px;
            background: var(--bg-light);
            min-height: calc(100vh - 70px);
        }

        .page-header-card {
            background: linear-gradient(135deg, #eaf4ff, #f7fbff);
            border-radius: 14px;
            padding: 20px 26px;
            margin-bottom: 20px;
            box-shadow: 0 8px 22px rgba(0, 0, 0, 0.05);
        }

        .page-header-card h4 {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .page-header-card small {
            font-size: 13px;
            color: var(--text-muted);
        }

        .badge.rounded-pill {
            background: var(--primary);
            padding: 8px 14px;
            font-size: 12px;
            font-weight: 600;
        }

        .data-card {
            border-radius: 14px;
            border: none;
            background: var(--card-bg);
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.07);
        }

        .data-card .card-body {
            padding: 20px 22px;
        }

        table.dataTable {
            margin-top: 12px !important;
            margin-bottom: 14px !important;
            border-collapse: separate !important;
            border-spacing: 0;
        }

        table.dataTable thead th {
            background: #f1f5f9;
            color: var(--text-dark);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .35px;
            text-transform: uppercase;
            padding: 12px 14px !important;
            border-bottom: 1px solid var(--border-light) !important;
        }

        table.dataTable tbody td {
            font-size: 13px;
            color: var(--text-dark);
            padding: 14px 14px !important;
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
        }

        table.dataTable tbody tr {
            transition: background .2s ease;
        }

        table.dataTable tbody tr:hover {
            background: #f8fbff;
        }

        .msg-text {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: var(--text-muted);
        }

        .date-badge {
            background: #eef2ff;
            color: #4338ca;
            font-size: 11px;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 30px;
        }

        .dataTables_wrapper {
            padding-top: 4px;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 14px;
        }

        .dataTables_wrapper .dataTables_length label,
        .dataTables_wrapper .dataTables_filter label {
            font-size: 13px;
            color: var(--text-dark);
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 20px;
            padding: 4px 8px;
            font-size: 13px;
            border: 1px solid var(--border-light);
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 20px;
            padding: 7px 14px;
            height: 36px;
            font-size: 13px;
            border: 1px solid var(--border-light);
        }

        .dataTables_wrapper .dataTables_info {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 12px;
        }

        .dataTables_wrapper .dataTables_paginate {
            margin-top: 12px;
        }

        .dataTables_wrapper .paginate_button {
            border-radius: 50% !important;
            padding: 4px 10px !important;
            margin: 0 3px;
            font-size: 13px;
            border: 1px solid var(--border-light) !important;
        }

        .dataTables_wrapper .paginate_button.current {
            background: var(--primary) !important;
            color: #fff !important;
            border-color: var(--primary) !important;
        }

        @media (max-width: 768px) {
            .page-content {
                padding: 16px;
            }

            .page-header-card {
                padding: 16px;
            }

            .data-card .card-body {
                padding: 16px;
            }

            table.dataTable thead th,
            table.dataTable tbody td {
                padding: 12px !important;
            }
        }
    </style>

    <div class="mb-4 page-header-card d-flex justify-content-between align-items-center">
    <div>
        <h4 class="mb-1 fw-bold">SMS Logs</h4>
        <small class="text-muted">View and manage all SMS messages sent from the system</small>
    </div>

        <span class="px-4 py-2 badge rounded-pill bg-primary">
            Total Enquiries: {{ $smslogs->count() }}
        </span>
    </div>

    <div class="card data-card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle" id="smslogTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>Identifier</th>
                            <th>Type</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Sent At</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($smslogs as $key => $smslog)
                            <tr>
                                <td></td>
                                <td>
                                    {{ $smslog->user->first_name
                                        ? ucwords(str_replace('_', ' ', $smslog->user->first_name))
                                        : '-' }}
                                </td>
                                <td>
                                    {{ $smslog->user->last_name
                                        ? ucwords(str_replace('_', ' ', $smslog->user->last_name))
                                        : '-' }}
                                </td>
                                <td>
                                    {{ $smslog->user->role
                                        ? ucwords(str_replace('_', ' ', $smslog->user->role))
                                        : '-' }}
                                </td>
                                <td>{{ $smslog->identifier ?? '-' }}</td>
                                <td>
                                    {{ $smslog->channel
                                        ? ucwords(str_replace('_', ' ', $smslog->channel))
                                        : '-' }}
                                </td>
                                <td>
                                    {{ $smslog->purpose
                                        ? ucwords(str_replace('_', ' ', $smslog->purpose))
                                        : '-' }}
                                </td>
                                <td>
                                    {{ $smslog->status
                                        ? ucwords(str_replace('_', ' ', $smslog->status))
                                        : '-' }}
                                </td>
                                <td>
                                    <span class="date-badge">
                                        {{ $smslog->sent_at->format('d M Y, h:i A') }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            const table = $('#smslogTable').DataTable({
                pageLength: 25,
                lengthMenu: [10, 25, 50, 100],

                order: [[8, 'desc']],

                columnDefs: [
                    { orderable: false, targets: [0, 4] }
                ],

                language: {
                    search: "Search",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ enquiries",
                    emptyTable: "No enquiries found",
                    paginate: {
                        previous: "‹",
                        next: "›"
                    }
                },

                drawCallback: function () {
                    const api = this.api();
                    const pageInfo = api.page.info();

                    api.column(0, { page: 'current' }).nodes().each(function (cell, i) {
                        cell.innerHTML = pageInfo.recordsTotal - (pageInfo.start + i);
                    });
                }
            });

        });
    </script>
@endsection
