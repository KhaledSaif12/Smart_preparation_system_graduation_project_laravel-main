@extends('layouts.main')
@section('title', 'الأذونات')
@section('content')
    <!-- إضافة عناصر رأسية خارجية إلى الرأس -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-unlock bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('الأذونات')}}</h5>
                            <span>{{ __('تحديد أذونات المستخدم')}}</span>
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
                                <a href="#">{{ __('الأذونات')}}</a>
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
            <!-- فقط من لديه إذن إدارة الأذونات يمكنه الوصول -->
            @can('manage_permission')
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('إضافة إذن')}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{url('permission/create')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="permission">{{ __('الإذن')}}<span class="text-red">*</span></label>
                                        <input type="text" class="form-control" id="permission" name="name" placeholder="اسم الإذن" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">{{ __('مخصص للدور')}} </label>
                                        {!! Form::select('roles[]', $roles, null,[ 'class'=>'form-control select2', 'multiple' => 'multiple']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-2">
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
                    <div class="card-body">
                        <table id="permission_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('الإذن')}}</th>
                                    <th>{{ __('الدور المخصص')}}</th>
                                    <th>{{ __('العملية')}}</th>
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
    <!-- إضافة جافا سكريبت الخارجي -->
    @push('script')
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/DataTables/Cell-edit/dataTables.cellEdit.js') }}"></script>
    <!-- سكربت الجدول الخاص بالأذونات من جانب الخادم -->
    <script src="{{ asset('js/permission.js') }}"></script>
    @endpush
@endsection
