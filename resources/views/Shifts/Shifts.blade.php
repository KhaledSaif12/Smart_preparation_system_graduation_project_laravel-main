@extends('layouts.main') 
@section('title', 'Add Shift')
@section('content')
<!-- push external head elements to head -->
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@endpush

<div class="container-fluid ">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-xl-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Add Shift')}}</h5>
                        <span>{{ __('Create new Shift')}}</span>
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
                            <a href="#">{{ __('Add Shift')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20">
                <div class="card-header">
                    <h3 class="card-title">Add Shift</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{route('store_shift')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="shift">{{ __(' النوع')}}<span class="text-red">*</span></label>
                                <select name="type" id="type" value="" class="form-control select2">
                                <option value="">اختر النوع</option>   
                                <option value="1">صباحي</option>
                                <option value="2">مسائي</option>
                                </select>
                                <div class="help-block with-errors"></div>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-xl-4">
                                <p>{{ __(' يبدأ من الساعة ')}}</p>
                                <input name="from_time" id="from_time" value="{{old('from_time')}}" class="form-control" type="time" />
                                @error('from_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-sm-12 col-xl-4">
                                <p>{{ __(' ينتهي الساعة ')}}</p>
                                <input name="to_time" id="to_time" value="{{old('to_time')}}" class="form-control" type="time" />
                                @error('to_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label for="exampleInputEmail1" class="form-label">عدد الساعات </label>
                                <input type="number" name="total_hours" class="form-control" id="total_hours" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                                @error('total_hours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label for="exampleInputEmail1" class="form-label">حالة التفعيل </label>
                                <select  name="status"  class="form-control select2" id="status" >
                              <option selected value="1">مفعل</option>
                              <option value="0">معطل</option>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Submit')}}</button>
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
<!--get role wise permissiom ajax script-->
<script src="{{ asset('js/get-role.js') }}"></script>
@endpush
@endsection