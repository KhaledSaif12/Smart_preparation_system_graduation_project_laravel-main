@extends('layouts.main') 
@section('title', $shif->type)
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
                            <h5>{{ __('تعديل  الفترات')}}</h5>
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
                                <a href="#">{{ __('الفترات')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <!-- clean unescaped data is to avoid potential XSS risk -->
                                {{ clean($shif->type, 'titles')}}
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
                        <form  method="POST" action="{{ route('update_shift') }}" >
                        @csrf
                            <input type="hidden" name="id" value="{{$shif->id}}">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="name">{{ __('نوع الفترة ')}}<span class="text-red">*</span></label>
                                        <select  class="form-control select2 @error('type') is-invalid @enderror" name="type" value="{{ old('type',$shif->type)}}" >
                                            <option value="{{$shif->id}}"> {{$shif->type}}</option>    
                                            @foreach($sh as $shifts)
                                            @if($shif->type==$shifts->type)
                                            @continue
                                             @else
                                            <option  value="{{$shifts->id}}">{{$shifts->type}}</option>
                                            @endif
                                            @endforeach
                                            </select>
                                        <div class="help-block with-errors"></div>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label"><p>{{ __('من الوقت')}}</p></label>
                                        <input name="from_time"  class="form-control @error('from_time') is-invalid @enderror"  value="{{ clean($shif->from_time, 'titles')}}"  type="time" />
                                        @error('from_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>      
    
                                    <div class="form-group">
                                        <label class="form-label"><p>{{ __('الى ')}}</p></label>
                                        <input name="to_time" class="form-control  @error('to_time') is-invalid @enderror" value="{{ clean($shif->to_time, 'titles')}}"  type="time" />
                                        @error('to_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
    
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">اجمالي الساعات </label>
                                            <input type="number" name="total_hours" class="form-control  @error('total_hours') is-invalid @enderror" value="{{ clean($shif->total_hours, 'titles')}}"  oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                                            @error('total_hours')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        </div>
                                    </div>
    
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1" class="form-label">{{ __('حاله التفعيل ')}}<span class="text-red">*</span></label>
                                        <select name="status" class="form-control select2  @error('status') is-invalid @enderror" value="{{ old('status',$shif->status)}}" >
                                        <option @if(old('status')==1) selected @endif value="1">مفعل</option>
                                            <option @if(old('status')==0) selected @endif value="0">معطل</option>
                                        </select>
                                        @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>


                                   

                                
                                    </div>

                                
                            
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary form-control-right">{{ __('Update')}}</button>
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
