@extends('layouts.main')
@section('title', 'Add Employee')
@section('content')
<!-- push external head elements to head -->



<div class="container-fluid ">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-xl-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>{{ __('Add Employee')}}</h5>
                        <span>{{ __('Add new Employee')}}</span>
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
                            <a href="#">{{ __('Add Employee')}}</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        @include('include.message')

        <div class="col-md-12">
            <div class="card m-b-20">
                <div class="card-header">
                    <h3 class="card-title">اضافه موظف   </h3>
                </div>
                <div class="card-body">
                    @if(session('success'))
                    <form method="POST" action="{{ route('storee') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">{{ __('الاسم') }} </label>
                                    <input type="text" name="name" class="form-control" placeholder="ادخل الأسم" value="{{ old('name') }}" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">{{ __('رقم التلفون') }} </label>
                                    <input type="number" name="phone_number" class="form-control" placeholder=" رقم التلفون" value="{{ old('phoneNumber') }}" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">{{ __('الرقم الوظيفي') }}</label>
                                    <input type="number" name="job_number" class="form-control @if($errors->has('job_number')) is-invalid @endif" placeholder="الرقم الوظيفي" value="{{ session('pid') }}">
                                    @if($errors->has('job_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('job_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">{{ __('نوع الوظيفه') }}</label>
                                    <input type="text" name="job_type" class="form-control @if($errors->has('job_type')) is-invalid @endif">
                                    @if($errors->has('job_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('job_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="exampleInputEmail1" class="form-label">{{ __('الجنس') }}<span class="text-red">*</span></label>
                                <select name="gender" class="form-control select2 @error('gender') is-invalid @enderror" readonly>
                                    @foreach ($Genders as $key => $gender)
                                    <option value="{{ $gender }}" {{ old('sex') == $gender ? 'selected' : '' }}>{{ $gender }}</option>
                                    @endforeach
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <div class="form-group">
                                    <label for="period">{{ __('الفتره') }}<span class="text-red">*</span></label>
                                    <select name="period_id" class="form-control select2 @if($errors->has('period_id')) is-invalid @endif">
                                        @foreach ($periods as $period)
                                        <option value="{{ $period->id }}">{{ $period->type }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('period_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('period_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="exampleInputEmail1" class="form-label">{{ __('الجنسيه') }} </label>
                                <input type="text" name="Nationalit" class="form-control @if($errors->has('Nationalit')) is-invalid @endif" placeholder="الجنسيه">
                                @if($errors->has('Nationalit'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('Nationalit') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group col-md-2">
                                <label for="exampleInputEmail1" class="form-label">{{ __('FPID') }}</label>
                                <input type="text" name="FPID" class="form-control @if($errors->has('FPID')) is-invalid @endif" value="{{ session('pid') }}" readonly>
                                @if($errors->has('FPID'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('FPID') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2">
                                <label for="exampleInputEmail1" class="form-label">{{ __('FDID') }}</label>
                                <select name="FDID" aria-placeholder="select department" class="form-control select2">
                                    @foreach($fdids as $fdid)
                                    <option value="{{ $fdid['fdid'] }}">{{ $fdid['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="department">{{ __(' القسم') }}<span class="text-red">*</span></label>
                                <select name="department_id" aria-placeholder="select department" class="form-control select2 @if($errors->has('department_id')) is-invalid @endif">
                                    @foreach($departments as $depart)
                                    <option value="{{ $depart->id }}">{{ $depart->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('department_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('department_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">{{ __(' الصوره') }}<span class="text-red">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="form-control select2" name="image" value="{{ session('image', old('image')) }}">
                                </div>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col align-self-start">
                                <a class="btn btn-primary" href="{{ route('all_emp') }}">All Employees</a>
                            </div>
                        </div>
                    </form>

                <div class="flex justify-center items-center h-screen">
                    @else
                    <form  action="{{ route('inserttt') }}"  method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
                        @csrf
                        <div class="form-container"  >
                            <div class="form-group">
                                <label for="name" class="block text-gray-700 font-bold mb-2">الاسم :</label>
                                <input type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="form-group">
                                <label for="fdid" class="block text-gray-700 font-bold mb-2">FDID:</label>
                                <input type="text" id="fdid" name="fdid" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                            </div>
                            <div class="form-group">
                                <label for="sex" class="block text-gray-700 font-bold mb-2">الجنس :</label>
                                <input type="text" id="sex" name="sex" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber" class="block text-gray-700 font-bold mb-2">رقم الهاتف :</label>
                                <input type="text" id="phoneNumber" name="phoneNumber" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            <div class="form-group">
                                <label for="importImage" class="block text-gray-700 font-bold mb-2">الصوره :</label>
                                <input type="file" id="importImage" name="importImage" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" style="background-color: blue;">
                                ارسال الى الجهاز
                            </button>
                        </div>

                        @endif
                    </form>
                </div>






@push('script')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
 <!--get role wise permissiom ajax script-->
<script src="{{ asset('js/get-role.js') }}"></script>
@endpush
@endsection

