@extends('layouts.main')
@section('title','edit employee', $emp->name)
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush


    <div class="container-fluid flex-row-reverse">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('تعديل بيانات الموظف')}}</h5>
                            <span>{{ __('انشاء موظف جديد او تعديل بياناته')}}</span>
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
                                <a href="#">{{ __('موظفين')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <!-- clean unescaped data is to avoid potential XSS risk -->
                                {{ clean($emp->name, 'titles')}}
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
                <div class="card">
                    <div class="card-body">
                        <form  method="POST" action="{{ route('update_employee') }}"  enctype="multipart/form-data" >
                        @csrf
                            <input type="hidden" name="id" value="{{$emp->id}}">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="name">{{ __('اسم الموظف')}}<span class="text-red">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',$emp->name)}}" required>
                                        <div class="help-block with-errors"></div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">{{ __('رقم الهاتف')}}<span class="text-red">*</span></label>
                                        <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ clean($emp->phone_number, 'titles')}}" required>
                                        <div class="help-block with-errors"></div>

                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="job_number">{{ __(' الرقم الوظيفي')}}<span class="text-red">*</span></label>
                                       <input id="job_number" type="job_number" class="form-control @error('job_number') is-invalid @enderror" name="job_number" value="{{ clean($emp->job_number, 'titles')}}" required>
                                        <div class="help-block with-errors"></div>

                                        @error('job_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="job_type">{{ __(' نوع الوظيفة')}}<span class="text-red">*</span></label>
                                        <input id="job_type" type="text" class="form-control @error('job_type') is-invalid @enderror" name="job_type" value="{{ clean($emp->job_type, 'titles')}}" required>
                                         <div class="help-block with-errors"></div>

                                         @error('job_type')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>

                                    <div class="form-group">
                                       <label for="gender">{{ __('  الجنس')}}<span class="text-red">*</span></label>
                                       <select name="gender"  class="form-control select2 @error('gender') is-invalid @enderror" >
                                     <option value="{{ clean($emp->gender,'title')}}" >{{$emp->gender}}</option>
                                       @foreach ($Genders as $key => $gender)
                                       @if($emp->gender == $gender)
                                       @continue
                                       @else
                                   <option value="{{$gender}}">{{$gender}}</option>
                                   @endif
                                   @endforeach
                                       </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                       <label for="period">{{ __(' الفتره ')}}<span class="text-red">*</span></label>
                                       <select name="period_id" id="period_id" class="form-control select2 @error('period_id') is-invalid @enderror">
                                        <option value="{{$emp->period_id}}">{{$emp_per}}</option>
                                        @foreach ($periods as $period)
                                        @if($emp_per == $period->type)
                                        @continue
                                        @else
                                        <option value="{{$period->id}}">{{$period->type}}</option>
                                    @endif
                                        @endforeach
                                    </select>
                                    @error('period_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                    </div>

                                    <div class="form-group">
                                       <label for="Nationalit">{{ __(' الجنسيه ')}}<span class="text-red">*</span></label>
                                       <input id="Nationalit" type="Nationalit" class="form-control @error('Nationalit') is-invalid @enderror" name="Nationalit" value="{{ old('name',$emp->Nationalit, 'titles')}}" required>
                                        <div class="help-block with-errors"></div>

                                        @error('Nationalit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                     <!--
                              <div class="con-md-6">
                                    <div class="form-group">
                                       <label for="FPID">{{ __(' FPID ')}}<span class="text-red">*</span></label>
                                       <input id="FPID" type="FPID" class="form-control @error('FPID') is-invalid @enderror" name="FPID" value="{{ old('name',$emp->FPID, 'titles')}}"required>
                                        <div class="help-block with-errors"></div>

                                        @error('FPID')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                     -->

                                     <!--
                                <div class="form-group">
                                       <label for="FDID">{{ __(' FDID')}}<span class="text-red">*</span></label>
                                       <input id="FDID" name="FDID"  class="form-control @error('FDID') is-invalid @enderror" value="{{ old('name',$emp->FDID, 'titles')}}"required>
                                     <div class="help-block with-errors"></div>

                                        @error('FDID')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

 -->
                                    <div class="form-group">

                                    <label for="department_id">{{ __(' القسم')}}<span class="text-red">*</span></label>
                                       <select name="department_id" class="form-control select2 " value="{{ old($emp->department->id, 'titles')}}" >
                                        <option value="{{$emp->department_id}}">{{$emp_dept}}</option>
                                       @foreach ($departments as $Department)
                                       @if($emp_dept == $Department->name)
                                       @continue
                                       @else
                                   <option  value="{{$Department->id}}" >{{$Department->name}}</option>
                                   @endif
                                     @endforeach
                                       </select>
                                      @error('department_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                      <!--
                                    <div class="form-group">
                                       <label for="image">{{ __(' الصوره')}}<span class="text-red">*</span></label>
                                     <div class="input-images" data-input-name="product-images" >
                                       <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ clean($emp->image, 'titles')}}" >
                                     </div>
                                       <div class="help-block with-errors"></div>

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                   -->








                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary form-control-right">{{ __('Update')}}</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
        <!--get role wise permissiom ajax script-->
        <script src="{{ asset('js/get-role.js') }}"></script>
    @endpush
@endsection
