@extends('layouts.main') 
@section('title', 'Invoice')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Invoice')}}</h5>
                            <span>{{ __('lorem ipsum dolor sit amet, consectetur adipisicing elit')}}</span>
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
                                <a href="#">{{ __('Pages')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Invoice')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h3 class="d-block w-100">{{ __('ThemeKit')}}<small class="float-right">{{ __('Date: 12/11/2018')}}</small></h3></div>
            <div class="card-body">

                @include('common.invoice')
                
                <div class="row no-print">
                    <div class="col-12">
                        <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> {{ __('Submit Payment')}}</button>
                        <button type="button" class="btn btn-primary pull-right"><i class="fa fa-download"></i> {{ __('Generate PDF')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

