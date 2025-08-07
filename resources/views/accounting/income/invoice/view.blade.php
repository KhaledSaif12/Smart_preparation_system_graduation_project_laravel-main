@extends('accounting.layout')
@section('title', 'View Invoice')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Income</h5>
                        <span>View Invoice no #INV000045</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/accounting"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Income</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{url('income/invoice')}}">Invoice</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 pr-0">

            <div class="card mb-0">
                <div class="card-body">
                    <div class="profiletimeline mt-0">
                        <div class="sl-item">
                            <div class="sl-left">
                                <button type="button" class="btn btn-icon btn-success"><i class="ik ik-file"></i></button>
                            </div>
                            <div class="sl-right">
                                <h6>Create Invoice</h6>
                                <p class="text-muted text-small"><i class="ik ik-clock"></i> Created on Feb 12, 2023</p>
                                <a href="{{url('income/invoice/edit/1')}}" class="btn btn-outline-primary"><i class="ik ik-edit"></i> Edit</a>
                            </div>
                        </div>
                        <hr>
                        <div class="sl-item">
                            <div class="sl-left"><button type="button" class="btn btn-icon btn-warning"> <i class="ik ik-mail"></i> </button> </div>
                            <div class="sl-right">
                                <h6>Send Invoice</h6>
                                <p class="text-muted text-small"><i class="ik ik-clock"></i> Sent on Feb 12, 2023</p>
                            </div>
                        </div>
                        <hr>
                        <div class="sl-item">
                            <div class="sl-left"> <button type="button" class="btn btn-icon btn-info"><i class="ik ik-dollar-sign"></i></button> </div>
                            <div class="sl-right">
                                <h6>Get Paid</h6>
                                <div>
                                    <h2 class="mb-0 d-inline-block text-warning">28204</h2>
                                    <p class="mb-0 d-inline-block">Due Amount</p>
                                </div>
                                <p class="text-muted text-small">Status: Awaiting Payment</p>
                                <a href="" class="btn btn-outline-info"><i class="ik ik-plus"></i> Add Payment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-0">
                <div class="card-header">
                    <h3>Product & Services</h3>
                </div>
                <div class="card-body">
                    @include('common.invoice')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection