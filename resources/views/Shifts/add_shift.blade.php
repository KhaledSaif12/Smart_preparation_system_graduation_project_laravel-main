<!-- blade directives -->
@extends('layouts.main')
@section('title', 'إضافة فترة عمل')
@section('content')

<!-- push external head elements to head -->
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
@endpush

<div class="container-fluid ">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-xl-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('إضافة فترة عمل') }}</h5>
                        <span>{{ __('إنشاء فترة عمل جديدة') }}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">{{ __('إضافة فترة عمل') }}</a>
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
            <div class="card m-b-20">
                <div class="card-header">
                    <h3 class="card-title">{{ __('إضافة فترة عمل') }}</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="type" class="form-label">{{ __('نوع الفترة') }}<span class="text-red">*</span></label>
                                <input type="text" name="type" id="type" class="form-control" />

                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-xl-4">
                                <p>{{ __('من الوقت') }}</p>
                                <input name="from_time" class="form-control" type="time" />
                                @error('from_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-xl-4">
                                <p>{{ __('إلى الوقت') }}</p>
                                <input name="to_time" class="form-control" type="time" />
                                @error('to_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <div class="form-group">
                                    <label class="form-label" for="total_hours">{{ __('إجمالي الساعات') }}</label>
                                    <input type="number" name="total_hours" class="form-control" value=""
                                        oninput="this.value=this.value.replace(/[^0-9.]/g,'');" id="total_hours" />
                                    @error('total_hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="status" class="form-label">{{ __('حالة التفعيل') }}<span class="text-red">*</span></label>
                                <select name="status" class="form-control select2" id="status">
                                    <option value="">اختر الحالة</option>
                                    <option selected value="1">{{ __('مفعل') }}</option>
                                    <option value="0">{{ __('معطل') }}</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('حفظ') }}</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col align-self-start">
                                <a class="btn btn-primary" href="{{ route('all_shift') }}">{{ __('عرض جميع الفترات') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<!--get role wise permission ajax script-->
<script src="{{ asset('js/get-role.js') }}"></script>
@endpush

@endsection
