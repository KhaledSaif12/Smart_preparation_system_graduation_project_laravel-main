@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card card-red text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $lateEmployeeCount }}</h4>
                                <p class="mb-0">{{ __('عدد الموظفين المتأخرين لحد الان')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-clock f-30"></i> <!-- أيقونة الساعة أو الساعة المتأخرة -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-blue text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $presentEmployeeCount }}</h4>
                                <p class="mb-0">{{ __('الموظفين المتواجدين حاليًا ') }}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-users f-30"></i> <!-- أيقونة المستخدمين أو الموظفين -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-green text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $employeeCount }}</h4>
                                <p class="mb-0">{{ __('اجمالي الموظفين بالشركة') }}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-user-check f-30"></i> <!-- أيقونة المستخدمين أو القائمة -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card card-yellow text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $shiftCount }}</h4>
                                <p class="mb-0">{{ __('الفترات')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-clock f-30"></i> <!-- أيقونة الساعة أو الفترات -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-12 col-xl-4">
                <div class="card card-green text-white">
                    <div class="card-block pb-0">
                        <div class="row mb-50">
                            <div class="col-auto text-center">
                                <p class="mb-5">{{ __('الموظفين الحاضرين اليوم') }}</p>
                                <h6 class="mb-0 fw-700">{{ $employeesCheckedInToday }}</h6>
                            </div>
                            <div class="col">
                                <h6 class="mb-5">{{ __('الموظفين الغائبين اليوم') }}</h6>
                                <h5 class="mb-0 fw-700">{{ $absentEmployeeCount }}</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>





            <div class="col-xl-8 col-md-6">
                <div class="card table-card">
                    <div class="card-header">
                        <h3>{{ __('الموظفين المضافين حديثآ') }}</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>{{ __('الاسم') }}</th>
                                        <th>{{ __('رقم التلفون') }}</th>
                                        <th>{{ __('الجنس') }}</th>
                                        <th>{{ __('نوع الوظيفة') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentEmployees as $employee)
                                        <tr>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->phone_number }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>{{ $employee->job_type }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    	</div>
    </div>

	<!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
        <!-- <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script> -->
        <script src="{{ asset('plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>


        <script src="{{ asset('js/widget-statistic.js') }}"></script>
        <script src="{{ asset('js/widget-data.js') }}"></script>
        <script src="{{ asset('js/dashboard-charts.js') }}"></script>

    @endpush
@endsection
