@extends('accounting.layout')
@section('title', 'Account')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Banking</h5>
                        <span>Manage Bank Account</span>
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
                            <a href="#">Banking</a>
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
                        <a href="#bankAdd" data-toggle="modal" data-target="#bankAdd" class="btn btn-sm btn-primary btn-rounded">Add Bank </a>
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
                                <th>Name</th>
                                <th>Bank</th>
                                <th>Account No</th>
                                <th>Current Balance</th>
                                <th>Contact No</th>
                                <th>Branch</th>
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
                                <td>Tovino Thomas</td>
                                <td>State Bank</td>
                                <td>2187420213632</td>
                                <td>$32102</td>
                                <td>219-122-1234</td>
                                <td>New York, USA</td>
                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>Isabella Taylor</td>
                                <td>State Bank</td>
                                <td>890123456789</td>
                                <td>$28000</td>
                                <td>888-888-8888</td>
                                <td>Boston, USA</td>

                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>William Johnson</td>
                                <td>Bank of America</td>
                                <td>789012345678</td>
                                <td>$35000</td>
                                <td>777-777-7777</td>
                                <td>San Francisco, USA </td>
                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>Sophia Lee</td>
                                <td>Wells Fargo</td>
                                <td>678901234567</td>
                                <td>$30000</td>
                                <td>666-666-6666</td>
                                <td>New York, USA</td>
                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>David Brown</td>
                                <td>Chase Bank</td>
                                <td>567890123456</td>
                                <td>$25000</td>
                                <td>555-555-5555</td>
                                <td>Seattle, USA</td>
                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>Emily Davis</td>
                                <td>State Bank</td>
                                <td>456789012345</td>
                                <td>$12000</td>
                                <td>444-444-4444</td>
                                <td>Miami, USA</td>

                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>Michael Smith</td>
                                <td>Bank of America</td>
                                <td>345678901234</td>
                                <td>$15000</td>
                                <td>333-333-3333</td>
                                <td>Houston, USA</td>
                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>Jane Doe</td>
                                <td>Wells Fargo</td>
                                <td>234567890123</td>
                                <td>$20000</td>
                                <td>222-222-2222</td>
                                <td>Chicago, USA</td>
                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
                                <td>Jane Doe</td>
                                <td>Wells Fargo</td>
                                <td>234567890123</td>
                                <td>$20000</td>
                                <td>222-222-2222</td>
                                <td>Chicago, USA</td>
                                <td>
                                    <a href="#accountEdit" data-toggle="modal" data-target="#accountEdit"><i class="ik ik-edit f-16 mr-15 text-green"></i></a>
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
<div class="modal fade edit-layout-modal pr-0 " id="bankAdd" role="dialog" aria-labelledby="bankAddLabel" aria-hidden="true">
    <div class="modal-dialog w-300" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bankAddLabel">Add Bank Account</h5>
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