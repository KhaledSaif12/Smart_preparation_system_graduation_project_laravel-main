@extends('accounting.layout')
@section('title', 'Bill')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Expense</h5>
                        <span>Bill</span>
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
                            <a href="#">Bill</a>
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
                        <a href="{{url('expense/bill/create')}}" class="btn btn-sm btn-primary btn-rounded">Add bill </a>
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
                                                <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Bill No" data-column="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Vendor" data-column="2">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col1_filter" placeholder="Issue Date" data-column="3">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col2_filter" placeholder="Due Date" data-column="5">
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
                                <th>Bill No</th>
                                <th>Vendor</th>
                                <th>Category</th>
                                <th>Issue Date</th>
                                <th>Due Date</th>
                                <th>Due Amount</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                <td>#BL000001</td>
                                <td>Alex</td>
                                <td>Sale</td>
                                <td>Feb 12, 2023</td>
                                <td>April 12, 2023</td>
                                <td>500</td>
                                <td>12300</td>
                                <td>
                                    <label class="badge badge-info">Draft</label>
                                </td>
                                <td>
                                    <a href="{{url('expense/bill/view/BL000001')}}"><i class="ik ik-eye f-16 mr-15 text-primary"></i></a>
                                    <a href="{{url('expense/bill/edit/1')}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                    <a href="#!"><i class="ik ik-copy f-16 mr-15 text-warning"></i></a>
                                    <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                <td>#BL000002</td>
                                <td>Alex</td>
                                <td>Sale</td>
                                <td>Feb 11, 2023</td>
                                <td>April 12, 2023</td>
                                <td>500</td>
                                <td>12300</td>
                                <td>
                                    <label class="badge badge-info">Draft</label>
                                </td>
                                <td>
                                    <a href="{{url('expense/bill/view/BL000002')}}"><i class="ik ik-eye f-16 mr-15 text-primary"></i></a>
                                    <a href="{{url('expense/bill/edit/1')}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                    <a href="#!"><i class="ik ik-copy f-16 mr-15 text-warning"></i></a>
                                    <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                <td>#BL000003</td>
                                <td>Michael</td>
                                <td>Sale</td>
                                <td>Feb 9, 2023</td>
                                <td>April 12, 2023</td>
                                <td>500</td>
                                <td>12300</td>
                                <td>
                                    <label class="badge badge-info">Sent</label>
                                </td>
                                <td>
                                    <a href="{{url('expense/bill/view/BL000003')}}"><i class="ik ik-eye f-16 mr-15 text-primary"></i></a>
                                    <a href="{{url('expense/bill/edit/1')}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                    <a href="#!"><i class="ik ik-copy f-16 mr-15 text-warning"></i></a>
                                    <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                <td>#BL000004</td>
                                <td>Jessica</td>
                                <td>Sale</td>
                                <td>Feb 8, 2023</td>
                                <td>April 12, 2023</td>
                                <td>500</td>
                                <td>12300</td>
                                <td>
                                    <label class="badge badge-success">Paid</label>
                                </td>
                                <td>
                                    <a href="{{url('expense/bill/view/BL000004')}}"><i class="ik ik-eye f-16 mr-15 text-primary"></i></a>
                                    <a href="{{url('expense/bill/edit/1')}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                    <a href="#!"><i class="ik ik-copy f-16 mr-15 text-warning"></i></a>
                                    <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                <td>#BL000005</td>
                                <td>Emily</td>
                                <td>Sale</td>
                                <td>Feb 6, 2023</td>
                                <td>April 12, 2023</td>
                                <td>500</td>
                                <td>12300</td>
                                <td>
                                    <label class="badge badge-danger">Declined</label>
                                </td>
                                <td>
                                    <a href="{{url('expense/bill/view/BL000005')}}"><i class="ik ik-eye f-16 mr-15 text-primary"></i></a>
                                    <a href="{{url('expense/bill/edit/1')}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                    <a href="#!"><i class="ik ik-copy f-16 mr-15 text-warning"></i></a>
                                    <a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input select_all_child" id="" name="" value="option2">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                <td>#BL000006</td>
                                <td>David</td>
                                <td>Sale</td>
                                <td>Feb 5, 2023</td>
                                <td>April 12, 2023</td>
                                <td>500</td>
                                <td>12300</td>
                                <td>
                                    <label class="badge badge-warning">Partially Paid</label>
                                </td>
                                <td>
                                    <a href="{{url('expense/bill/view/BL000006')}}"><i class="ik ik-eye f-16 mr-15 text-primary"></i></a>
                                    <a href="{{url('expense/bill/edit/1')}}"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
                                    <a href="#!"><i class="ik ik-copy f-16 mr-15 text-warning"></i></a>
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