@extends('layouts.main')
@section('title', 'إضافة مستخدم')
@section('content')
    <!-- دفع العناصر الخارجية إلى الرأس -->
    @push('head')

    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('إضافة مستخدم')}}</h5>
                            <span>{{ __('إنشاء مستخدم جديد، تعيين الأدوار والأذونات')}}</span>
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
                                <a href="#">{{ __('إضافة مستخدم')}}</a>
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
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('إضافة مستخدم')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-user') }}">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('اسم المستخدم')}}<span class="text-red">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="أدخل اسم المستخدم" required>
                                        <div class="help-block with-errors"></div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('البريد الإلكتروني')}}<span class="text-red">*</span></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="أدخل البريد الإلكتروني" required>
                                        <div class="help-block with-errors"></div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('كلمة المرور')}}<span class="text-red">*</span></label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="أدخل كلمة المرور" required>
                                        <div class="help-block with-errors"></div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('تأكيد كلمة المرور')}}<span class="text-red">*</span></label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="أعد كتابة كلمة المرور" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- تعيين الأدوار وعرض الأذونات -->
                                    <div class="form-group">
                                        <label for="role">{{ __('تعيين الدور')}}<span class="text-red">*</span></label>
                                        {!! Form::select('role', $roles, null, [ 'class'=>'form-control select2', 'placeholder' => 'اختر الدور', 'id'=> 'role', 'required'=> 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="role">{{ __('الأذونات')}}</label>
                                        <div id="permission" class="form-group" style="border-left: 2px solid #d1d1d1;">
                                            <span class="text-red pl-3">اختر الدور أولاً</span>
                                        </div>
                                        <input type="hidden" id="token" name="token" value="{{ csrf_token() }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('إرسال')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- دفع js الخارجية -->
    @push('script')
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
        <!-- سكربت ajax لأخذ الأذونات حسب الدور -->
        <script src="{{ asset('js/get-role.js') }}"></script>
    @endpush
@endsection
