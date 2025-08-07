@extends('accounting.layout')
@section('title', 'Revenue')
@section('content')


@php
$revenueList = [
    ['date' => 'Feb 6, 2023',        'amount' => 11300,        'account' => 'Lorem Bank',        'customer' => 'Alex',        'reference' => null,        'description' => 'Lorem ipsum dolor sit amet',],
    ['date' => 'Feb 3, 2023',        'amount' => 17306,        'account' => 'State Bank of Lorem',        'customer' => 'David',        'reference' => 'Test Reference',        'description' => null,],
    ['date' => 'Feb 5, 2023',        'amount' => 9000,        'account' => 'Lorem Bank',        'customer' => 'John',        'reference' => 'Test Reference 1',        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',],
    ['date' => 'Feb 1, 2023',        'amount' => 12000,        'account' => 'State Bank of Lorem',        'customer' => 'Michael',        'reference' => null,        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',],
    ['date' => 'Feb 2, 2023',        'amount' => 8200,        'account' => 'Lorem Bank',        'customer' => 'Jane',        'reference' => 'Test Reference 2',        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',],
    ['date' => 'Feb 4, 2023',        'amount' => 6500,        'account' => 'State Bank of Lorem',        'customer' => 'Jessica',        'reference' => 'Test Reference 3',        'description' => null,],
    ['date' => 'Feb 7, 2023',        'amount' => 14000,        'account' => 'Lorem Bank',        'customer' => 'Mark',        'reference' => 'Test Reference 4',        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',],
    ['date' => 'Feb 8, 2023',        'amount' => 11000,        'account' => 'State Bank of Lorem',        'customer' => 'William',        'reference' => null,        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',],
    ['date' => 'Feb 9, 2023',        'amount' => 10500,        'account' => 'Lorem Bank',        'customer' => 'Robert',        'reference' => 'Test Reference 5',        'description' => null,],
];

@endphp
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Income</h5>
                        <span>Revenue</span>
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
                            <a href="#">Revenue</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- start message area-->
        <div class="col-md-12">
        </div> <!-- end message area-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header row">
                    <div class="col col-sm-2">
                        <a href="#RevenueAdd" data-toggle="modal" data-target="#RevenueAdd" class="btn btn-sm btn-primary btn-rounded">Add Revenue </a>
                    </div>
                    <div class="col col-sm-1">
                        <div class="card-options d-inline-block">

                            <div class="dropdown d-inline-block">
                                <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                    <a class="dropdown-item" href="#">Delete</a>
                                    <a class="dropdown-item" href="#">More Action</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm-6">
                        <div class="card-search with-adv-search dropdown">
                            <form action="">
                                <input type="text" class="form-control global_filter" id="global_filter" placeholder="Search.." required="">
                                <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                                <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col0_filter" placeholder="Name" data-column="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Bank" data-column="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Account Number" data-column="2">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Contact No" data-column="3">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col4_filter" placeholder="Branch" data-column="4">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-theme">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col col-sm-3">
                        <div class="card-options text-right">
                            <span class="mr-5" id="top">1 - 10 of 100</span>
                            <a href="#"><i class="ik ik-chevron-left"></i></a>
                            <a href="#"><i class="ik ik-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="advanced_table" class="table">
                        <thead>
                            <tr>
                                <th class="nosort" width="10">
                                    <label class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" class="custom-control-input" id="selectall" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Account No</th>
                                <th>Customer</th>
                                <th>Reference</th>
                                <th>Description</th>
                                <th>Documents</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($revenueList as $item)
                            <tr>
                                <td>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                <td>{{$item['date']}}</td>
                                <td>{{$item['amount']}}</td>
                                <td>{{$item['account']}}</td>
                                <td>{{$item['customer']}}</td>
                                <td>{{$item['reference']}}</td>
                                <td>{{$item['description']}}</td>
                                <td></td>
                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                    <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade edit-layout-modal pr-0 " id="RevenueAdd" role="dialog" aria-labelledby="RevenueAddLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="RevenueAddLabel">Add Bank Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="d-block">Account Holder Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Account Holder Name">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Account Number</label>
                        <input type="text" name="account_no" class="form-control" placeholder="Enter Account Number">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" placeholder="Enter Bank Name">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Branch</label>
                        <input type="text" name="branch" class="form-control" placeholder="Enter Branch">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Opening Balance</label>
                        <input type="text" name="balance" class="form-control" placeholder="Enter Opening Balance">
                    </div>

                    <div class="form-group">
                        <label class="d-block">Contact No</label>
                        <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact No">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="Save" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade edit-layout-modal pr-0 " id="accountEdit" role="dialog" aria-labelledby="accountEditLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountEditLabel">Edit Bank Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                        <label class="d-block">Account Holder Name</label>
                        <input type="text" name="name" class="form-control" value="John Doe" placeholder="Enter Account Holder Name">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Account Number</label>
                        <input type="text" name="account_no" class="form-control" value="3647817326218" placeholder="Enter Account Number">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" value="State Bank of America" placeholder="Enter Bank Name">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Branch</label>
                        <input type="text" name="branch" class="form-control" value="Boston, Shicago" placeholder="Enter Branch">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Opening Balance</label>
                        <input type="text" name="balance" class="form-control" value="100"  placeholder="Enter Opening Balance">
                    </div>

                    <div class="form-group">
                        <label class="d-block">Contact No</label>
                        <input type="text" name="contact_no" class="form-control" value="222-222-222" placeholder="Enter Contact No">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="Save" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection