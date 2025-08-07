@extends('accounting.layout')
@section('title', 'Goal')
@section('content')


@php
$goals = [ [ 'name' => 'Alex', 'type' => 'Invoice', 'from' => '2022-07', 'to' => '2022-08', 'amount' => 13000 ],
[ 'name' => 'John', 'type' => 'Payment', 'from' => '2021-09', 'to' => '2021-10', 'amount' => 5000 ],
[ 'name' => 'Mary', 'type' => 'Bill', 'from' => '2023-01', 'to' => '2023-02', 'amount' => 8000 ],
[ 'name' => 'David', 'type' => 'Invoice', 'from' => '2022-12', 'to' => '2023-01', 'amount' => 10000 ],
[ 'name' => 'Sarah', 'type' => 'Payment', 'from' => '2022-03', 'to' => '2022-04', 'amount' => 2000 ],
[ 'name' => 'Chris', 'type' => 'Bill', 'from' => '2022-06', 'to' => '2022-07', 'amount' => 6000 ],
[ 'name' => 'Oliver', 'type' => 'Invoice', 'from' => '2023-02', 'to' => '2023-03', 'amount' => 15000 ],
[ 'name' => 'Sophie', 'type' => 'Payment', 'from' => '2022-01', 'to' => '2022-02', 'amount' => 3000 ],
[ 'name' => 'Emma', 'type' => 'Bill', 'from' => '2022-09', 'to' => '2022-10', 'amount' => 7000 ],
[ 'name' => 'Tom', 'type' => 'Invoice', 'from' => '2022-11', 'to' => '2022-12', 'amount' => 12000 ]
];

@endphp
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Goal</h5>
                        <span>Setup monthly goal</span>
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
                            <a href="#">Goal</a>
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
                        <a href="#goalAdd" data-toggle="modal" data-target="#goalAdd" class="btn btn-sm btn-primary btn-rounded">Add Goal </a>
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col0_filter" placeholder="Name" data-column="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col1_filter" placeholder="From" data-column="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col2_filter" placeholder="To" data-column="2">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Type data-column=" 3">
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
                                <th>Name</th>
                                <th>Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($goals as $item)
                            <tr>
                                <td>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['type']}}</td>
                                <td>{{$item['from']}}</td>
                                <td>{{$item['to']}}</td>
                                <td>{{$item['amount']}}</td>
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
<div class="modal fade edit-layout-modal pr-0 " id="goalAdd" role="dialog" aria-labelledby="goalAddLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="goalAddLabel">Add Goal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="d-block">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control">
                            <option selected="selected" value="" name="type"> Select Type</option>
                            <option value="1">Invoice</option>
                            <option value="2">Bill</option>
                            <option value="3">Payment</option>
                            <option value="4">Expense</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="d-block">From</label>
                        <input type="text" name="from" class="form-control" placeholder="Enter From month">
                    </div>
                    <div class="form-group">
                        <label class="d-block">To</label>
                        <input type="text" name="to" class="form-control" placeholder="Enter To month">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount">
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
                <h5 class="modal-title" id="accountEditLabel">Edit Goal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="d-block">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="Alex">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control">
                            <option value="2" name="type"> Select Type</option>
                            <option value="1">Invoice</option>
                            <option value="2" selected="selected"> Bill</option>
                            <option value="3">Payment</option>
                            <option value="4">Expense</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="d-block">From</label>
                        <input type="text" name="from" class="form-control" placeholder="Enter From month" value="2023-03">
                    </div>
                    <div class="form-group">
                        <label class="d-block">To</label>
                        <input type="text" name="to" class="form-control" placeholder="Enter To month" value="2023-04">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount" value="2800">
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