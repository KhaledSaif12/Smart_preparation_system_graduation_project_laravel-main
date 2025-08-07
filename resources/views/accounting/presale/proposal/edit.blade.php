@extends('accounting.layout')
@section('title', 'Edit Proposal')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Presale</h5>
                        <span>Edit Proposal</span>
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
                            <a href="#">Presale</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{url('presale/proposal')}}">Proposal</a>
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
                    <div class="form-group">
                        <label>Proposal No</label>
                        <input type="text" class="form-control" placeholder="Porposal No" value="#PRO000045" readonly>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-10 pr-0">
                                <label>Customer</label>

                                <select class="form-control">
                                    <option selected="selected" value="">Select Customer</option>
                                    <option value="1" selected>Alex Ferguson</option>
                                    <option value="2">John Doe</option>
                                </select>

                            </div>
                            <div class="col-sm-2 pl-1 pt-1">
                                <button type="button" class="mt-4 btn btn-sm btn-primary" data-toggle="modal" data-target="#CustomerAdd">+</button>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label>Issue Date</label>
                        <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" placeholder="Select Date" value="17-11-2022">
                    </div>
                    <div class="form-group">
                        <label>Customer</label>

                        <select class="form-control">
                            <option selected="selected" value="">Select Category</option>
                            <option value="1">Category 1</option>
                            <option value="2" selected>Category 2</option>
                            <option value="3">Category 3</option>
                            <option value="4">Category 4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Note</label>
                        <textarea class="form-control h-123" name="note" placeholder="Enter Note">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam pulvinar tempor ex, in blandit risus bibendum vel.</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-0">
                <div class="card-header">
                    <h3>Product & Services</h3>
                    <div class="card-header-right">
                    <button type="button" class="btn btn-success add-product-item"><i class="ik ik-plus"></i> Add Item</button>
                        </div>
                </div>
                <div class="card-body">
                    <div class="salestable">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="wp-40">Item</th>
                                    <th class="wp-10">Quantity</th>
                                    <th class="wp-20">Unit Price</th>
                                    <th class="wp-15">Discount</th>
                                    <th class="wp-15 text-right">Sub Total</th>
                                    <th class="wp-15 text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="base-tr">
                                    <td class="pl-0"><input type="text" name="item" value="Item 0" class="form-control hm-30"></td>
                                    <td><input type="text" name="quantity" class="form-control w-60 text-center hm-30" value="10"> </td>
                                    <td><input type="text" name="unit_price" class="form-control  hm-30" value="1200"></td>
                                    <td><input type="text" name="discount" class="form-control w-60 text-center hm-30" value="0"></td>
                                    <td class="text-right">12000.00</td>
                                    <td><i class="ik ik-trash-2 f-16 text-red remove-item"></i></td>
                                </tr>
                                <tr class="base-tr">
                                    <td class="pl-0"><input type="text" name="item" value="Item 1" class="form-control hm-30"></td>
                                    <td><input type="text" name="quantity" class="form-control w-60 text-center hm-30" value="5"> </td>
                                    <td><input type="text" name="unit_price" class="form-control  hm-30" value="700"></td>
                                    <td><input type="text" name="discount" class="form-control w-60 text-center hm-30" value="0"></td>
                                    <td class="text-right">3500.00</td>
                                    <td><i class="ik ik-trash-2 f-16 text-red remove-second-parent cursor-pointer"></i></td>
                                </tr>
                                <tr class="base-tr">
                                    <td class="pl-0"><input type="text" name="item" value="Item 2" class="form-control hm-30"></td>
                                    <td><input type="text" name="quantity" class="form-control w-60 text-center hm-30" value="12"> </td>
                                    <td><input type="text" name="unit_price" class="form-control  hm-30" value="80"></td>
                                    <td><input type="text" name="discount" class="form-control w-60 text-center hm-30" value="60"></td>
                                    <td class="text-right">900.00</td>
                                    <td><i class="ik ik-trash-2 f-16 text-red remove-second-parent cursor-pointer"></i></td>
                                </tr>
                                <tr id="product-line-separator">
                                    <td colspan="6"></td>
                                </tr>
                                <tr>
                                    <th class="border-0" colspan="3"></th>
                                    <th class="border-0">Total</th>
                                    <th class="text-right border-0">16400.00</th>
                                    <td class="border-0"></td>
                                </tr>
                                <tr>
                                    <td class="border-0" colspan="3"></td>
                                    <td>Tax (<span id="tax-per">10.00</span>%)</td>
                                    <td class="text-right">1640.00</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="border-0" colspan="3"></td>
                                    <td>Discount</td>
                                    <td class="text-right">60.00</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="border-0" colspan="3"></th>
                                    <th>Grand Total</th>
                                    <th class="text-right">18040.00</th>
                                    <th></th>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group text-right">
                            <div type="submit" class="btn btn-primary">Update</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection