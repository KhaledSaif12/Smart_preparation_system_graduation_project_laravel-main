@extends('layouts.main')
@section('title', 'Users')
@section('content')

    <!-- دفع العناصر الخارجية إلى الرأس -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-start">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('المستخدمين')}}</h5>
                            <span>{{ __('قائمة المستخدمين')}}</span>
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
                                <a href="#">{{ __('المستخدمين')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- بداية منطقة الرسائل -->
            @include('include.message')
            <!-- نهاية منطقة الرسائل -->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('المستخدمين')}}</h3></div>
                    <div class="card-body">
                        <table id="user_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('اسم المستخدم')}}</th>
                                    <th>{{ __('البريد الإلكتروني')}}</th>
                                    <th>{{ __('الأدوار')}}</th>
                                    <th>{{ __('الأذونات')}}</th>
                                    <th>{{ __('الإجراءات')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col align-self-start">
                                <a class="btn btn-primary" href="{{route('create-user')}}">إضافة مستخدم</a>
                            </div>

                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- دفع js الخارجية -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!-- سكربت جدول المستخدمين -->
    <script src="{{ asset('js/custom.js') }}"></script>
    @endpush

@endsection
