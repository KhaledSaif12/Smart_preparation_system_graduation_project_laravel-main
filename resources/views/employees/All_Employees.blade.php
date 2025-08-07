<!-- blade dirctives -->
@extends('layouts.main')
@section('title', 'All Employees')
@section('content')

    <!-- push external head elements to head -->
    @push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">

    @endpush

    <div class="container-fluid flex-row-reverse">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('الموظفين')}}</h5>
                            <span>{{ __(' قائمه الموظفين')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('الموظفين')}}</a>
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
                    <div class="card-header"><h3>{{ __('الموظفين')}}</h3></div>
                    <div class="card-body">
                        <table id="Employees_table" class="table">
                            <thead>
                                <tr>

                                    <th>{{ __('الاسم')}}</th>
                                    <th>{{ __(' رقم التلفون')}}</th>
                                    <th>{{ __(' الرقم الوظيفي')}}</th>
                                    <th>{{ __('نوع الوظيفه')}}</th>
                                    <th>{{ __('الجنس')}}</th>
                                    <th>{{ __('الفتره')}}</th>
                                    <th>{{ __('الجنسيه')}}</th>
                                  <!--   <th>{{ __(' FPID')}}</th> -->
                                    <th>{{ __('FDID')}}</th>
                                    <th>{{ __('القسم')}}</th>
                                    <th>{{ __('الصوره') }} </th>
                                    <th>{{ __('الحدث')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->phone_number }}</td>
                                    <td>{{ $employee->job_number }}</td>
                                    <td>{{ $employee->job_type }}</td>
                                    <td>{{ $employee->gender }}</td>
                                    <td>{{ $employee->period_id }}</td>
                                    <td>{{ $employee->Nationalit }}</td>
                                  <!--   <td>{{ $employee->FPID->name ?? 'N/A'  }}</td> -->
                                    <td>{{ $employee->FDID->name ?? 'N/A' }}</td>
                                    <td>{{ $employee->department->name ?? 'N/A' }}</td>
                                    <td><img src="{{ asset('images/' . $employee->image) }}" alt="{{ $employee->name }}" width="60"></td>
                                    <td>
                                        <a href="{{ route('edit_emp', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('destroy', $employee->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                     <!--  <a href="{{ route('show', $employee->id) }}" class="btn btn-info btn-sm">View</a> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col align-self-start">
                        <a class="btn btn-primary" href="{{route('emp_create')}}">اضافة موظف جديد</a>
                        </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!-- server side users table script -->
    <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
	@endsection
