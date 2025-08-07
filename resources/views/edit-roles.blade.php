@extends('layouts.main')
@section('title', $role->name.' - تعديل الدور')
@section('content')

<div class="container-fluid">
    <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-award bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('تعديل الدور')}}</h5>
                            <span>{{ __('تعديل الدور وربط الأذونات')}}</span>
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
                                <a href="#">{{ __('الدور')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <!-- تنظيف البيانات غير المؤمنة لتجنب المخاطر المحتملة لـ XSS -->
                                {{ clean($role->name, 'titles')}}
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>{{ __('تعديل الدور')}}</h3></div>
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{url('role/update')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="role">{{ __('الدور')}}<span class="text-red">*</span></label>
                                    <input type="text" class="form-control is-valid" id="role" name="name" value="{{ clean($role->name, 'titles')}}" placeholder="أدخل الدور">
                                    <input type="hidden" name="id" value="{{$role->id}}" required>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <label for="exampleInputEmail3">{{ __('تعيين الأذونات')}} </label>
                                <div class="row">
                                    @foreach($permissions as $key => $permission)
                                    <div class="col-sm-4">
                                        <label class="custom-control custom-checkbox">
                                            <!-- تحقق من وجود الإذن -->
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="permissions[]" value="{{$key}}"
                                            @if(in_array($key, $role_permission))
                                                checked
                                            @endif>
                                            <span class="custom-control-label">
                                                <!-- تنظيف البيانات غير المؤمنة لتجنب المخاطر المحتملة لـ XSS -->
                                                {{ clean($permission, 'titles')}}
                                            </span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-rounded">{{ __('تحديث')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
