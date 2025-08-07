@extends('accounting.layout')
@section('title', 'View Bill')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Expense</h5>
                        <span>View Bill no #BL000045</span>
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
                            <a href="#">Expense</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{url('expense/bill')}}">Bill</a>
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
                                <h6>Create Bill</h6>
                                <p class="text-muted text-small"><i class="ik ik-clock"></i> Created on Feb 12, 2023</p>
                                <a href="{{url('expense/bill/edit/1')}}" class="btn btn-outline-primary"><i class="ik ik-edit"></i> Edit</a>
                            </div>
                        </div>
                        <hr>
                        <div class="sl-item">
                            <div class="sl-left"><button type="button" class="btn btn-icon btn-warning"> <i class="ik ik-mail"></i> </button> </div>
                            <div class="sl-right">
                                <h6>Send Bill</h6>
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
            <div class="card">
                <div class="card-header">
                    <h3>Product & Services</h3>
                </div>
                <div class="card-body">
                    @include('accounting.expense.bill.bill_invoice')
                </div>
            </div>
            <div class="card mb-0">
                <div class="card-header">
                    <h3>Payment History</h3>
                </div>
                <div class="card-body">
                    <table id="advanced_table" class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Account</th>
                                    <th>Reference</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Feb 12, 2023</td>
                                    <td>800</td>
                                    <td>Alex - Test State Bank</td>
                                    <td>Lorem ipsum</td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td>
                                        <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Feb 08, 2023</td>
                                    <td>1300</td>
                                    <td>Alex - Test State Bank</td>
                                    <td>Lorem ipsum</td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td>
                                        <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection