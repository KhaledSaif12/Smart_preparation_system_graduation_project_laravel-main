<!-- blade dirctives -->
@extends('layouts.main') 
@section('title', 'Report')
@section('content')

    <!-- push external head elements to head -->
    @push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">

    @endpush
    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('التقارير')}}</h5>
                            <span>{{ __(' قائمه التقارير')}}</span>
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
                                <a href="#">{{ __('التقارير')}}</a>
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
                    <div class="card-header"><h3>{{ __('التقارير')}}</h3></div>
                    <div class="card-body">
                        <table id="Reports_table" class="table">
                            <thead>
                                <tr>
                                    
                                    <th>{{ __('الاسم')}}</th>
                                    <th>{{ __(' القسم ')}}</th>
                                    <th>{{ __('  تاريخ اليوم')}}</th>
                                    <th>{{ __('وقت الحضور ')}}</th>
                                    <th>{{ __('وقت الانصراف ')}}</th>
                                    <th>{{ __('الفترة ')}}</th>

                                    <th>{{ __('الحاله')}}</th>
                                    <th>{{ __('وقت التأخير')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                               
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col align-self-start">
                        <a class="btn btn-primary" href="{{route('emp_create')}}">create Employees</a>
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
    @endpush  
	@endsection