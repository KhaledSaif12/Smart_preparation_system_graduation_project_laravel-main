@extends('layouts.main')
@section('title','edit department', $dep)
@section('content')
    <!-- push external head elements to head -->
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
                            <h5>{{ __('تعديل  القسم')}}</h5>
                            <span>{{ __('انشاء قسم جديد او تعديل بياناته')}}</span>
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
                                <a href="#">{{ __('الأقسام')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <!-- clean unescaped data is to avoid potential XSS risk -->
                                {{ clean($dep->name, 'titles')}}
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
                        <form  method="POST" action="{{ route('update_department') }}" >
                        @csrf
                            <input type="hidden" name="id" value="{{$dep->id}}">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="dept_id">{{ __('ID')}}</label>
                                    </div>

                                <div class="form-group">
                                        <label for="dept_name">{{ __('اسم القسم')}}</label>
                                        <input type="text" name="name" class="form-control" value="{{old('name',$dep->name)}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="dept_Descrption">{{ __('الوصف')}}</label>
                                        <input class="form-control" name="description" value="{{ old('description',$dep->description)}}">
                                    </div>

                            </div>

                             </div>




                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary form-control-right">{{ __('تعديل')}}</button>
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
