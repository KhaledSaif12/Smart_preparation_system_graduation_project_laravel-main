@extends('layouts.main')
@section('title', 'الأدوار')
@section('content')
    <!-- دفع العناصر الخارجية إلى الرأس -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-award bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('الأدوار')}}</h5>
                            <span>{{ __('تحديد أدوار المستخدمين')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('الأدوار')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <!-- بداية منطقة الرسائل -->
            @include('include.message')
            <!-- نهاية منطقة الرسائل -->
            <!-- فقط من لديهم إذن إدارة الأدوار سيحصلون على الوصول -->
            @can('manage_role')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('إضافة دور')}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{url('role/create')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="role">{{ __('الدور')}}<span class="text-red">*</span></label>
                                        <input type="text" class="form-control is-valid" id="role" name="name" placeholder="اسم الدور" required>
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <label for="exampleInputEmail3">{{ __('تعيين الأذونات')}} </label>
                                    <div class="row">
                                        @foreach($permissions as $key => $permission)
                                        <div class="col-sm-4">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="item_checkbox" name="permissions[]" value="{{$key}}">
                                                <span class="custom-control-label">
                                                    <!-- تنظيف البيانات غير المؤمنة لتجنب المخاطر المحتملة لـ XSS -->
                                                    {{ clean($permission,'titles')}}
                                                </span>
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-rounded">{{ __('حفظ')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endcan
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('الأدوار')}}</h3></div>
                    <div class="card-body">
                        <table id="roles_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('الدور')}}</th>
                                    <th>{{ __('الأذونات')}}</th>
                                    <th>{{ __('الإجراء')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- دفع js الخارجية -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!-- سكربت جدول الأدوار جانب الخادم -->
    <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
@endsection
