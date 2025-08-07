<!-- blade dirctives -->
@extends('layouts.main')
@section('title', 'Shifts')
@section('content')

    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

   <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('الفترات')}}</h5>
                            <span>{{ __(' قائمه الفترات')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('الفترات')}}</a>
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
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('الفترات')}}</h3></div>
                    <div class="card-body">
                        <table id="user_table" class="table">
                            <thead>
                                <tr>
                                  <th><h6>{{ __('id')}}</h6></th>
                                    <th><h6>{{ __('النوع')}}</h6></th>
                                    <th><h6>{{ __('من وقت')}}</h6></th>
                                    <th><h6>{{ __('الى وقت ')}}</h6></th>
                                    <th><h6>{{ __('الاجمالي')}}</h6></th>
                                    <th><h6>{{ __('الحاله')}}</h6></th>
                                    <th><h6>{{ __('الحدث')}}</h6></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $all)
                                <tr>
                                    <td>{{$all->id}}</td>
                                    <td>{{$all->type}}</td>
                                    <td>{{ date('h:i:s A', strtotime($all->from_time)) }}</td>
                                    <td>{{ date('h:i:s A', strtotime($all->to_time)) }}</td>

                                    <td>{{$all->total_hours}}</td>
                                    <td>{{$all->status}}</td>

                                    <td>
                                    <div class="table-actions">
                                    <a href="{{route('all_shift' , $all->id) }}" ><i class="ik ik-eye f-16 mr-15"></i></a>
                        <a href="{{route('edit_shift',$all->id)}}" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                        <a href="   {{route('delete_shift' , $all->id)}} "><i class="ik ik-trash-2 f-16 text-red"></i></a>
                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">

                            <div class="col align-self-start">
                     <!--    <a class="btn btn-primary" href="{{route('addshift')}}">اظافه فترة</a> -->
                        </div>
                        <div class="col col-sm-2">
                            <a href="#addshift" data-toggle="modal" data-target="#addshift" class="btn btn-sm btn-primary">اظافه فترة</a>
                        </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- push external js -->

  <div class="modal fade edit-layout-modal pr-0 " id="addshift" role="dialog" aria-labelledby="CustomerAddLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addshift">اظافه فتره جديده </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">{{ __('نوع الفتره')}}<span class="text-red">*</span></label>
                        <input type="text" name="type" id="type" class="form-control" />
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="from-group ">
                        <label class="form-label" ><p>{{ __('من الوقت')}}</p></label>
                        <input name="from_time" class="form-control"  type="time"  />
                        @error('from_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label"> <p>{{ __('الى ')}}</p> </label>
                        <input name="to_time" class="form-control" type="time"  />
                        @error('to_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label class="form-label" for="exampleInputEmail1">اجمالي الساعات </label>
                            <input type="number" name="total_hours" class="form-control"   value=""
                             oninput="this.value=this.value.replace(/[^0-9.]/g,'');" >
                            @error('total_hours')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">{{ __('حاله التفعيل ')}}<span class="text-red">*</span></label>
                        <select name="status" class="form-control select2" id="status">
                        <option selected value="1">مفعل</option>
                            <option value="0">معطل</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Country</label>
                        <select class="form-control select2" name="country">
                            <option selected="selected" value="">Select Country</option>
                            <option value="ZW">Zimbabwe</option>
                            <option value="AX">Åland Islands</option>
                        </select>
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






	@endsection



