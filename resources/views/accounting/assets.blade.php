@extends('accounting.layout')
@section('title', 'Assets')
@section('content')


@php
$assets = [ [ 'name' => 'Test Asset 1', 'purchased_date' => 'Nov 8, 2023', 'supported_date' => 'Jan 04 2024', 'amount' => 13000, 'description' => 'Lorem ipsum dolor sit amet' ],
[ 'name' => 'Test Asset 2', 'purchased_date' => 'Dec 10, 2023', 'supported_date' => 'Feb 06 2024', 'amount' => 12000, 'description' => 'Lorem ipsum dolor sit amet' ],
[ 'name' => 'Test Asset 3', 'purchased_date' => 'Jan 15, 2024', 'supported_date' => 'Mar 12 2024', 'amount' => 15000, 'description' => 'Lorem ipsum dolor sit amet' ],
[ 'name' => 'Test Asset 4', 'purchased_date' => 'Feb 22, 2024', 'supported_date' => 'Apr 18 2024', 'amount' => 20000, 'description' => 'Lorem ipsum dolor sit amet' ],
[ 'name' => 'Test Asset 5', 'purchased_date' => 'Mar 12, 2024', 'supported_date' => 'May 08 2024', 'amount' => 18000, 'description' => 'Lorem ipsum dolor sit amet' ],
[ 'name' => 'Test Asset 6', 'purchased_date' => 'Apr 25, 2024', 'supported_date' => 'Jun 21 2024', 'amount' => 25000, 'description' => 'Lorem ipsum dolor sit amet' ],
[ 'name' => 'Test Asset 7', 'purchased_date' => 'May 19, 2024', 'supported_date' => 'Jul 16 2024', 'amount' => 18000, 'description' => 'Lorem ipsum dolor sit amet' ],
[ 'name' => 'Test Asset 8', 'purchased_date' => 'Jun 30, 2024', 'supported_date' => 'Aug 26 2024', 'amount' => 30000, 'description' => 'Lorem ipsum dolor sit amet' ],
[ 'name' => 'Test Asset 9', 'purchased_date' => 'Jul 11, 2024', 'supported_date' => 'Sep 06 2024', 'amount' => 17000, 'description' => 'Lorem ipsum dolor sit amet' ],
[ 'name' => 'Test Asset 10', 'purchased_date' => 'Aug 19, 2024', 'supported_date' => 'Oct 16 2024', 'amount' => 21000, 'description' => 'Lorem ipsum dolor sit amet' ]
];

@endphp
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Assets</h5>
                        <span>Manage Assets</span>
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
                            <a href="#">Assets</a>
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
                        <a href="#AssetsAdd" data-toggle="modal" data-target="#AssetsAdd" class="btn btn-sm btn-primary btn-rounded">Add Assets </a>
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
                                <th>Purchased Date</th>
                                <th>Supported Date</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assets as $item)
                            <tr>
                                <td>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['purchased_date']}}</td>
                                <td>{{$item['supported_date']}}</td>
                                <td>{{$item['amount']}}</td>
                                <td>{{$item['description']}}</td>
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
<div class="modal fade edit-layout-modal pr-0 " id="AssetsAdd" role="dialog" aria-labelledby="AssetsAddLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AssetsAddLabel">Add Assets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="d-block">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Purchased Date</label>
                        <input type="date" name="purchased_date" class="form-control" placeholder="Enter purchased date" value="{{date('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Supported Date</label>
                        <input type="date" name="supporte_date" class="form-control" placeholder="Enter Supported Date">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control h-123" name="description" placeholder="Enter Description"></textarea>
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
                <h5 class="modal-title" id="accountEditLabel">Edit Assets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="d-block">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="Testing Asset 1">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Purchased Date</label>
                        <input type="date" name="purchased_date" class="form-control" placeholder="Enter purchased date" value="{{date('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Supported Date</label>
                        <input type="date" name="supporte_date" class="form-control" placeholder="Enter Supported Date" value="2024-11-07">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount" value="13000">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control h-123" name="description" placeholder="Enter Description">Lorem ipsum dolor sit amet</textarea>
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