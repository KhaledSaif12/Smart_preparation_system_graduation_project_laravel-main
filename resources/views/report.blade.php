@extends('layouts.main')
@section('title', 'التقارير')
@section('content')

@push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
@endpush

<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('التقارير') }}</h5>
                        <span>{{ __('قائمة التقارير') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('التقارير') }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- start message area-->
        @include('include.message')
        <!-- end message area-->
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-header"><h3>{{ __('التقارير') }}</h3></div>
                <div class="card-body">
                    <table id="Reports_table" class="table">
                        <thead>
                            <tr>
                                <th>{{ __('الاسم') }}</th>
                                <th>{{ __('القسم') }}</th>
                                <th>{{ __('تاريخ اليوم') }}</th>
                                <th>{{ __('وقت الحضور') }}</th>
                                <th>{{ __('وقت الانصراف') }}</th>
                                <th>{{ __('الفترة') }}</th>
                                <th>{{ __('الحالة') }}</th>
                                <th>{{ __('وقت التأخير') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)
                                <tr>
                                    <td>{{ $report->name }}</td>
                                    <td>{{ $report->department_name }}</td>
                                    <td>{{ $report->attendance_date }}</td>
                                    <td>{{ $report->time }}</td>
                                    <td>{{ $report->from_time }}</td>
                                    <td>{{ $report->shift_type }}</td>
                                    <td>{{ $report->attendance_status }}</td>
                                    <td>{{ $report->delay_time ? $report->delay_time . ' دقيقة' : '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">{{ __('لا توجد تقارير لعرضها') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.2/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#Reports_table').DataTable({
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
        });
    </script>
@endpush

@endsection
