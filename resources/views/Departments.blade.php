@extends('layouts.main')
@section('title', 'جميع الأقسام')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('الأقسام') }}</h5>
                            <span>{{ __('قائمة الأقسام') }}</span>
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
                                <a href="#">{{ __('الأقسام') }}</a>
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
                    <div class="card-header"><h3>{{ __('الأقسام') }}</h3></div>
                    <div class="card-body">
                        <table id="department_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('اسم القسم') }}</th>
                                    <th>{{ __('الوصف') }}</th>
                                    <th>{{ __('الإجراءات') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col align-self-start">
                             <!--    <a class="btn btn-primary" href="{{ route('add_department') }}">{{ __('إضافة قسم') }}</a> -->
                            </div>
                            <div class="col col-sm-2">
                                <a href="#adddepart" data-toggle="modal" data-target="#adddepart" class="btn btn-sm btn-primary">{{ __('إضافة قسم') }}</a>
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

    <div class="modal fade edit-layout-modal pr-0 " id="adddepart" role="dialog" aria-labelledby="CustomerAddLabel" aria-hidden="true">
        <div class="modal-dialog w-300" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adddepart">{{ __('إضافة قسم جديد') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('store_department') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">{{ __('اسم القسم') }}<span class="text-red">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label">{{ __('الوصف') }}</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('حفظ') }}</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('إلغاء') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
