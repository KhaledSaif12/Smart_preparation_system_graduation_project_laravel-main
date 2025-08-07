@extends('accounting.layout')
@section('title', 'Transfer')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Banking</h5>
                        <span>Transfer Bank to Bank</span>
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
                            <a href="#">Transfer</a>
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
                        <a href="#transferAdd" data-toggle="modal" data-target="#transferAdd" class="btn btn-sm btn-primary btn-rounded">Add Transfer </a>
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
                                                <input type="text" class="form-control column_filter" id="col1_filter" placeholder="From Account" data-column="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col2_filter" placeholder="To Account" data-column="2">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control column_filter" id="col3_filter" placeholder="Reference" data-column="3">
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
                                <th>From Account</th>
                                <th>To Account</th>
                                <th>Amount</th>
                                <th>Reference</th>
                                <th>Description</th>
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
                                <td>20 Nov, 2022</td>
                                <td>123456789012</td>
                                <td>234567890123</td>
                                <td>$1000</td>
                                <td>TX12345</td>
                                <td>Regarding Description</td>
                                <td>
                                    <a href="#transferEdit" data-toggle="modal" data-target="#transferEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>17 Nov, 2022</td>
                                <td>234567890123</td>
                                <td>345678901234</td>
                                <td>$2000</td>
                                <td>TX12346</td>
                                <td>Investment payment</td>

                                <td>
                                    <a href="#transferEdit" data-toggle="modal" data-target="#transferEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>12 Nov, 2022</td>
                                <td>345678901234</td>
                                <td>456789012345</td>
                                <td>$3000</td>
                                <td>TX12347</td>
                                <td>Consultant fee</td>
                                <td>
                                    <a href="#transferEdit" data-toggle="modal" data-target="#transferEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>12 Nov, 2022</td>
                                <td>456789012345</td>
                                <td>567890123456</td>
                                <td>$4000</td>
                                <td>TX12348</td>
                                <td>Supplier payment</td>
                                <td>
                                    <a href="#transferEdit" data-toggle="modal" data-target="#transferEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>11 Nov, 2022</td>
                                <td>567890123456</td>
                                <td>678901234567</td>
                                <td>$5000</td>
                                <td>TX12349</td>
                                <td>Office rent</td>
                                <td>
                                    <a href="#transferEdit" data-toggle="modal" data-target="#transferEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>10 Nov, 2022</td>
                                <td>678901234567</td>
                                <td>789012345678</td>
                                <td>$6000</td>
                                <td>TX12350</td>
                                <td>Salary payment</td>

                                <td>
                                    <a href="#transferEdit" data-toggle="modal" data-target="#transferEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>7 Nov, 2022</td>
                                <td>789012345678</td>
                                <td>890123456789</td>
                                <td>$7000</td>
                                <td>TX12351</td>
                                <td>Equipment purchase</td>
                                <td>
                                    <a href="#transferEdit" data-toggle="modal" data-target="#transferEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>6 Nov, 2022</td>
                                <td>890123456789</td>
                                <td>123456789012</td>
                                <td>$8000</td>
                                <td>TX12352</td>
                                <td>Travel expenses</td>
                                <td>
                                    <a href="#transferEdit" data-toggle="modal" data-target="#transferEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>5 Nov, 2022</td>
                                <td>123456789012</td>
                                <td>234567890123</td>
                                <td>$9000</td>
                                <td>TX12353</td>
                                <td>Marketing expenses</td>
                                <td>
                                    <a href="#transferEdit" data-toggle="modal" data-target="#transferEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
<div class="modal fade edit-layout-modal pr-0 " id="transferAdd" role="dialog" aria-labelledby="transferAddLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transferAddLabel">Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="d-block">From Account</label>
                        <input type="text" name="from_account" class="form-control" placeholder="Enter From Account">
                    </div>
                    <div class="form-group">
                        <label class="d-block">To Account</label>
                        <input type="text" name="to_account" class="form-control" placeholder="Enter To Account">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Amount</label>
                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Reference</label>
                        <input type="text" name="reference" class="form-control" placeholder="Enter Reference">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Description</label>
                        <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="Save" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade edit-layout-modal pr-0 " id="transferEdit" role="dialog" aria-labelledby="transferEditLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transferEditLabel">Edit Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="d-block">From Account</label>
                        <input type="text" name="from_account" class="form-control" value="3425456435" placeholder="Enter From Account">
                    </div>
                    <div class="form-group">
                        <label class="d-block">To Account</label>
                        <input type="text" name="to_account" class="form-control" value="3647817326218" placeholder="Enter To Account">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Amount</label>
                        <input type="text" name="amount" class="form-control" value="1200" placeholder="Enter Amount">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Reference</label>
                        <input type="text" name="reference" class="form-control" value="TX37829DG" placeholder="Enter Reference">
                    </div>
                    <div class="form-group">
                        <label class="d-block">Description</label>
                        <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
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