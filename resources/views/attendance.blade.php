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
                <div class="card-header"><h3>{{ __('الموظفين') }}</h3></div>
                <div class="card-body">
                    <table id="Attdndance_table" class="table">
                        <thead>
                            <tr>
                                <th>{{ __('الاسم') }}</th>
                                <th>{{ __('رقم التلفون') }}</th>
                                <th>{{ __('الوقت') }}</th>
                                <th>{{ __('الصوره الفعليه') }}</th>
                                <th>{{ __('الصورة الملتقطة') }}</th>
                                <th>{{ __('نسبه التشابه بين الصورتين') }}</th>
                                <th>{{ __('يرتدي نظارة') }}</th>
                                <th>{{ __('الحدث') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- البيانات ستملأ هنا بواسطة AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function fetchAttendance() {
        $.ajax({
            url: '{{ route("attendance.data") }}', // route to get attendance data
            type: 'GET',
            success: function(data) {
                var tableBody = $('#Attdndance_table tbody');
                tableBody.empty(); // clear existing table data

                // Append new data to the table
                data.forEach(function(employee) {
                    var glassesStatus = employee.Glasses == 1 ? 'نعم' : (employee.Glasses == 2 ? 'لا' : 'غير معروف');
                    var row = `
                        <tr>
                            <td>${employee.name}</td>
                            <td>${employee.phone_number}</td>
                            <td>${employee.StrTime}</td>
                            <td><img src="{{ asset('images/') }}/${employee.image}" alt="${employee.name}" width="60"></td>
                            <td><img src="{{ asset('images/') }}/${employee.image}" alt="${employee.name}" width="60"></td>
                            <td class="${employee.Similarity < 0.90 ? 'bg-danger text-white' : ''}">${employee.Similarity}</td>
                            <td>${glassesStatus}</td>
                            <td>
                                <button class="btn btn-primary btn-sm details-btn" data-txt-url="{{ url('/txt') }}/${employee.ImageUrl}">ألتفاصيل</button>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="${employee.id}">حذف</button>
                            </td>
                        </tr>
                    `;
                    tableBody.append(row);
                });

                // Attach event listener to "ألتفاصيل" buttons
                $('.details-btn').click(function() {
                    var txtUrl = $(this).data('txt-url');
                    window.open(txtUrl, '_blank'); // Open txt file in new tab
                });

                // Attach event listener to "حذف" buttons
                $('.delete-btn').click(function() {
                    var employeeId = $(this).data('id');
                    if (confirm('هل أنت متأكد من الحذف؟')) {
                        deleteAttendance(employeeId);
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching attendance data:', error);
            }
        });
    }

    function deleteAttendance(employeeId) {
        $.ajax({
            url: '{{ url("attendance/delete") }}/' + employeeId, // updated route to delete attendance data
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                alert('تم الحذف بنجاح');
                $('#message').remove(); // Remove success message
                fetchAttendance(); // Refresh attendance data
            },
            error: function(xhr, status, error) {
                console.error('Error deleting attendance data:', error);
            }
        });
    }

    // Call fetchAttendance function every 5 seconds
    setInterval(fetchAttendance, 5000);

    // Fetch data immediately on page load
    $(document).ready(function() {
        fetchAttendance();
    });
</script>
@endpush
@endsection
