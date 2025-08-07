@extends('layouts.main')
@section('title', $user->name)
@section('content')
    <!-- دفع العناصر الخارجية إلى الرأس -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('تعديل المستخدم')}}</h5>
                            <span>{{ __('إنشاء مستخدم جديد، تعيين الأدوار والأذونات')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('المستخدم')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <!-- clean unescaped data is to avoid potential XSS risk -->
                                {{ clean($user->name, 'titles')}}
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
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ url('user/update') }}">
                        @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('اسم المستخدم')}}<span class="text-red">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ clean($user->name, 'titles')}}" required>
                                        <div class="help-block with-errors"></div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('البريد الإلكتروني')}}<span class="text-red">*</span></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ clean($user->email, 'titles')}}" required>
                                        <div class="help-block with-errors"></div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('كلمة المرور')}}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                        <div class="help-block with-errors"></div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('تأكيد كلمة المرور')}}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- تعيين الأدوار وعرض الأذونات -->
                                    <div class="form-group">
                                        <label for="role">{{ __('تعيين الدور')}}<span class="text-red">*</span></label>
                                        {!! Form::select('role', $roles, $user_role->id??'' ,[ 'class'=>'form-control select2', 'placeholder' => 'اختر الدور','id'=> 'role', 'required'=>'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="role">{{ __('الأذونات')}}</label>
                                        <div id="permission" class="form-group">
                                            @foreach($user->getAllPermissions() as $key => $permission)
                                            <span class="badge badge-dark m-1">
                                                <!-- clean unescaped data is to avoid potential XSS risk -->
                                                {{ clean($permission->name, 'titles')}}
                                            </span>
                                            @endforeach
                                        </div>
                                        <input type="hidden" id="token" name="token" value="{{ csrf_token() }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary form-control-right">{{ __('تحديث')}}</button>
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
                                                                    