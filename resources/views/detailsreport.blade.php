@extends('layouts.main')
@section('title', 'All Departments')
@section('content')

@push('head')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/DataTables/Buttons-1.7.1/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
@endpush

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('التقارير') }}</h5>
                        <span>{{ __('قائمه التقارير') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('التقارير') }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-3">
        <div class="col-md-3">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#filterSection" aria-expanded="false" aria-controls="filterSection">
                <i class="ik ik-filter"></i> {{ __(' تصفية بالأسم والتاريخ') }}
            </button>
        </div>
    </div>

    <!-- Filter Fields -->
    <div class="collapse" id="filterSection">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-3">
                    <label for="employee-name">اسم الموظف:</label>
                    <input type="text" id="employee-name" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="month">الشهر:</label>
                    <input type="month" id="month" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <!-- Date Filter Button -->
    <div class="row mb-3">
        <div class="col-md-3">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#dateFilter" aria-expanded="false" aria-controls="dateFilter">
                <i class="ik ik-filter"></i> {{ __('تصفية بالتاريخ') }}
            </button>
        </div>
    </div>

    <!-- Date Filter Fields -->
    <div class="collapse" id="dateFilter">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-3">
                    <label for="min-date">من:</label>
                    <input type="text" id="min-date" class="form-control datepicker">
                </div>
                <div class="col-md-3">
                    <label for="max-date">إلى:</label>
                    <input type="text" id="max-date" class="form-control datepicker">
                </div>
            </div>
        </div>
    </div>

    <!-- Missing Check-out Employees Button -->


    <div class="row">
        @include('include.message')
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-header"><h3>{{ __('التقارير') }}</h3></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>اسم الموظف</th>
                                    <th>القسم</th>
                                    <th>تاريخ الحضور</th>
                                    <th>وقت الحضور</th>
                                    <th>وقت بدء الفترة</th>
                                    <th>وقت انتهاء الفترة</th>
                                    <th>نوع الفترة</th>
                                    <th>مدة التأخير (بالدقائق)</th>
                                    <th>حالة الحضور</th>
                                    <th>عدد أيام الغياب بالشهر</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td>{{ $report->name }}</td>
                                        <td>{{ $report->department_name }}</td>
                                        <td>{{ $report->attendance_date }}</td>
                                        <td>{{ $report->time }}</td>
                                        <td>{{ $report->from_time }}</td>
                                        <td>{{ $report->to_time }}</td>
                                        <td>{{ $report->shift_type }}</td>
                                        <td>{{ $report->delay_time }}</td>
                                        <td>{{ $report->attendance_status }}</td>
                                        <td>{{ $report->absent_days }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h4>عدد الموظفين الغائبين في الشهر: {{ $total_absent }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/Buttons-1.7.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/Buttons-1.7.1/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/Buttons-1.7.1/js/buttons.print.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Datepicker
        $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });

        // Initialize DataTable
        var table = $('#example2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    text: 'نسخ',
                    charset: 'UTF-8',
                    bom: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    charset: 'UTF-8',
                    bom: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    charset: 'UTF-8',
                    bom: true,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'print',
                    text: 'طباعة',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'colvis',
                    text: 'إظهار/إخفاء الأعمدة'
                }
            ],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json"
            }
        });

        // Event listener for search inputs
        $('#employee-name, #month, #min-date, #max-date').on('keyup change', function() {
            table.draw();
        });

        // Custom filtering function
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var employeeName = $('#employee-name').val().toLowerCase();
                var month = $('#month').val();
                var minDate = $('#min-date').val();
                var maxDate = $('#max-date').val();

                var name = data[0].toLowerCase(); // Employee name
                var date = data[2]; // Attendance date

                if (
                    (employeeName === '' || name.includes(employeeName)) &&
                    (month === '' || date.startsWith(month)) &&
                    (minDate === '' || date >= minDate) &&
                    (maxDate === '' || date <= maxDate)
                ) {
                    return true;
                }
                return false;
            }
        );

        // Missing Check-out Employees Button functionality
        $('#missingCheckOutBtn').on('click', function() {
            // Clear any existing search and filters
            table.search('').columns().search('').draw();

            // Add custom filter for employees with check-in but no check-out
            table.columns().visible(true);
            table.columns([8]).search('حضور').draw(); // Filter for attendance only

            // Filter for employees with no check-out time
            table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                var data = this.data();
                if (data[8] === 'حضور' && data[9] === '') {
                    $(this.node()).show();
                } else {
                    $(this.node()).hide();
                }
            });

            // Draw the table to reflect the changes
            table.draw();
        });
    });
</script>
@endpush
@endsection
