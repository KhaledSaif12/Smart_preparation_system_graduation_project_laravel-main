@extends('layouts.main')
@section('title', 'إضافة قسم')
@section('content')

@push('head')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@endpush

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form class="forms-group" method="POST" action="{{route('store_department')}}">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('اسم القسم') }} <span class="text-red">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="أدخل اسم القسم">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">{{ __('الوصف') }}</label>
                    <textarea class="form-control" name="description" id="description" placeholder="أدخل وصف القسم"></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mr-2">{{ __('حفظ') }}</button>
                <a href="{{ route('department') }}" class="btn btn-light">{{ __('إلغاء') }}</a>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!-- سكربت بيانات الأدوار حسب التصريحات -->
    <script src="{{ asset('js/get-role.js') }}"></script>
@endpush
@endsection
