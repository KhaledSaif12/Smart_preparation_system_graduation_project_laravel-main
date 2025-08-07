@extends('accounting.layout')
@section('title', 'Edit Budget Planner')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-user-plus bg-blue"></i>
                    <div class="d-inline">
                        <h5>Budget Planner</h5>
                        <span>Plan your budget</span>
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
                            <a href="#">Budget Planner</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card table-card p-3">
        <div class="card-block">
            <div class="row">
                <div class="col-lg-3 col-md-12 ">
                    <div class="p-3">

                        <div class="form-group">
                            <label for="input">Name</label>
                            <input type="text" id="name" class="form-control" value="Themicly Budget 2023">
                        </div>
                        <div class="form-group">
                            <label for="tax_type">Period<span class="text-red">*</span></label>
                            <select name="tax_type" class="form-control">
                                <option>Select</option>
                                <option value="Monthly">Monthly</option>
                                <option value="Half Yearly">Half Yearly</option>
                                <option value="Yearly" selected>Yearly</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="input">Year</label>
                            <input type="text" id="year" class="form-control" value="2023">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="Save" value="Save">
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-md-12">
                    <table class="table table-responsive table-budget-control pt-3">
                        <tr>
                            <th rowspan="2" class="text-center color-budget-1st ">Month</th>
                            <th colspan="3" class="text-center color-budget-header-green">Income</th>
                            <th colspan="2" class="text-center color-budget-header-red">Expense</th>
                            <th rowspan="2" class="text-center color-budget-1st w-90">Total</th>
                        </tr>
                        <tr>
                            <th class="text-center color-budget-2nd">Sales</th>
                            <th class="text-center color-budget-2nd">Interests</th>
                            <th class="text-center color-budget-2nd">Others</th>
                            <th class="text-center color-budget-3rd">Rent</th>
                            <th class="text-center color-budget-3rd">Others</th>
                        </tr>
                        <tr>
                            <td>January</td>
                            <td><input type="text" class="form-control text-center" value="1000" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="20" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="30" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="40" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="50" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">890</td>
                        </tr>
                        <tr>
                            <td>February</td>
                            <td><input type="text" class="form-control text-center" value="600" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="70" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="80" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="90" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="200" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">730</td>
                        </tr>
                        <tr>
                            <td>March</td>
                            <td><input type="text" class="form-control text-center" value="600" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="70" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="80" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="90" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="200" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">1000</td>
                        </tr>
                        <tr>
                            <td>April</td>
                            <td><input type="text" class="form-control text-center" value="100" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="20" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="30" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="40" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="50" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">900</td>
                        </tr>
                        <tr>
                            <td>May</td>
                            <td><input type="text" class="form-control text-center" value="400" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="60" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="70" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="90" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="100" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">1010</td>
                        </tr>
                        <tr>
                            <td>June</td>
                            <td><input type="text" class="form-control text-center" value="400" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="60" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="70" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="90" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="100" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">780</td>
                        </tr>
                        <tr>
                            <td>July</td>
                            <td><input type="text" class="form-control text-center" value="100" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="20" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="30" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="40" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="50" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">690</td>
                        </tr>
                        <tr>
                            <td>August</td>
                            <td><input type="text" class="form-control text-center" value="600" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="70" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="80" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="90" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="200" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">970</td>
                        </tr>
                        <tr>
                            <td>September</td>
                            <td><input type="text" class="form-control text-center" value="600" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="700" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="80" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="90" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="200" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">650</td>
                        </tr>
                        <tr>
                            <td>October</td>
                            <td><input type="text" class="form-control text-center" value="100" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="20" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="30" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="40" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="50" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">1230</td>
                        </tr>
                        <tr>
                            <td>November</td>
                            <td><input type="text" class="form-control text-center" value="600" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="170" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="80" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="190" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="200" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">700</td>
                        </tr>
                        <tr>
                            <td>December</td>
                            <td><input type="text" class="form-control text-center" value="100" name="sales[]" /></td>
                            <td><input type="text" class="form-control text-center" value="20" name="interests[]" /></td>
                            <td><input type="text" class="form-control text-center" value="30" name="others[]" /></td>
                            <td><input type="text" class="form-control text-center" value="40" name="rent[]" /></td>
                            <td><input type="text" class="form-control text-center" value="50" name="exp_others[]" /></td>
                            <td class="font-weight-bold text-center">1100</td>
                        </tr>
                        <tr class="font-weight-bold text-center">
                            <td>Total</td>
                            <td>1200</td>
                            <td>700</td>
                            <td>9300</td>
                            <td>5700</td>
                            <td>2390</td>
                            <td>25000</td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection