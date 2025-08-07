@extends('layouts.main')
@section('title', 'Attendance')
@section('content')

<div class="container-fluid flex-row-reverse">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-users bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('حضور') }}</h5>
                        <span>{{ __('قائمه الحضور') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('الحضور') }}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        @include('include.message')
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ __('إضافة تحضير') }}</h3>
                </div>
                <div class="card-body">
                    <form id="addAttendanceForm" method="POST" action="{{ route('attendance.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="employeeName">{{ __('الاسم') }}</label>
                            <select class="form-control" name="employee_id" id="employeeName" required>
                                <option value="">{{ __('اختر الموظف') }}</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}" data-phone="{{ $employee->phone_number }}" data-fdid="{{ $employee->FDID }}" data-pid="{{ $employee->FPID }}">
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="employeePhone">{{ __('رقم التلفون') }}</label>
                            <input type="text" class="form-control" id="employeePhone" name="phone_number" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="employeeFDID">{{ __('FDID') }}</label>
                            <input type="text" class="form-control" id="employeeFDID" name="fdid" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="employeePID">{{ __('PID') }}</label>
                            <input type="text" class="form-control" id="employeePID" name="pid" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="StrTime">{{ __('وقت الحضور') }}</label>
                            <input type="datetime-local" class="form-control" id="StrTime" name="StrTime" required>
                        </div>
                        <div class="form-group">
                            <label for="similarity">{{ __('نسبة التشابه بين الصورتين') }}</label>
                            <input type="number" step="0.01" class="form-control" id="similarity" name="similarity" required>
                        </div>
                        <div class="form-group">
                            <label for="glassesStatus">{{ __('يرتدي نظارة') }}</label>
                            <select class="form-control" id="glassesStatus" name="glasses" required>
                                <option value="1">{{ __('نعم') }}</option>
                                <option value="2">{{ __('لا') }}</option>
                                <option value="3">{{ __('غير معروف') }}</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('إضافة') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $('#employeeName').change(function() {
        var selectedOption = $(this).find('option:selected');
        var phoneNumber = selectedOption.data('phone');
        var fdid = selectedOption.data('fdid');
        var pid = selectedOption.data('pid');

        $('#employeePhone').val(phoneNumber);
        $('#employeeFDID').val(fdid);
        $('#employeePID').val(pid);
    });
</script>
@endpush
@endsection
