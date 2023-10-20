@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper card-body">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h6>Add Bill</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="quotation-card">
                                <div class="card-body">

                                    <form autocomplete="off" method="POST" action="{{ route('bill.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row align-item-center">
                                                <div class="col-lg-2 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Bill Number</label>
                                                        <input type="text"  class="form-control" placeholder="Enter Bill No"name="billno"
                                                            id="billno" value="{{$billno}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $today }}" name="date" id="date"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Time <span class="text-danger">*</span></label>
                                                        <input type="time" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $timenow }}" name="time" id="time"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select Customer <span class="text-danger">*</span></label>
                                                        <select
                                                            class="form-control select customer_id js-example-basic-single"
                                                            name="customer_id" id="customer_id" required>
                                                            <option value="" disabled selected hiddden>Select Customer
                                                            </option>
                                                            @foreach ($customer as $customers)
                                                                <option value="{{ $customers->id }}">{{ $customers->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select Bank <span class="text-danger">*</span></label>
                                                        <select
                                                            class="form-control select bank_id js-example-basic-single"
                                                            name="bank_id" id="bank_id" required>
                                                            <option value="" disabled selected hiddden>Select Bank
                                                            </option>
                                                            @foreach ($bank as $banks)
                                                                <option
                                                                    value="{{ $banks->id }}">{{ $banks->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive no-pagination">
                                            <table class="table table-center table-hover datatable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th style="width:8%">S.No</th>
                                                        <th style="width:23%">Descriptions</th>
                                                        <th style="width:10%">Width</th>
                                                        <th style="width:10%">Heigh</th>
                                                        <th style="width:10%">Qty</th>
                                                        <th style="width:10%">Area/Sq.ft</th>
                                                        <th style="width:10%">Rate</th>
                                                        <th style="width:14%">Cost</th>
                                                        <th style="width:5%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="billproduct_fields">
                                                    <tr>
                                                        <td>
                                                            <input id="#" name="#"
                                                                class="auto_num form-control" type="text" value="1"
                                                                readonly />
                                                        </td>
                                                        <td><input type="hidden" id="bill_detail_id"
                                                                name="bill_detail_id[]" />
                                                            <select
                                                                class="form-control  bill_product_id select js-example-basic-single"
                                                                name="bill_product_id[]" id="bill_product_id1"required>
                                                                <option value="" selected hidden class="text-muted">
                                                                    Select Product
                                                                </option>
                                                                @foreach ($product as $products)
                                                                    <option value="{{ $products->id }}">
                                                                        {{ $products->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control bill_width"
                                                            id="bill_width" name="bill_width[]" value="" required />
                                                        </td>
                                                        <td><input type="text" class="form-control bill_height"
                                                            id="bill_height" name="bill_height[]" value="" required />
                                                        </td>
                                                        <td><input type="text" class="form-control bill_qty"
                                                            id="bill_qty" name="bill_qty[]" value="" required />
                                                        </td>
                                                        <td><input type="text" class="form-control bill_areapersqft"
                                                                id="bill_areapersqft" name="bill_areapersqft[]" value="" readonly />
                                                        </td>
                                                        <td><input type="text" class="form-control bill_rate"
                                                                id="bill_rate" name="bill_rate[]"
                                                                value="" required /></td>
                                                        <td><input type="text" class="form-control bill_product_total"
                                                                readonly id="bill_product_total"
                                                                style="background-color: #e9ecef;" name="bill_product_total[]"
                                                                placeholder="Total" /></td>
                                                        <td>
                                                            <button class="btn btn-primary form-plus-btn addbillproductfields" type="button" id="" value="Add"><i class="fe fe-plus-circle"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody class="billextracost_tr">
                                                    <tr>
                                                        <td colspan="4" class="text-end"
                                                            style="font-size:15px;color:black">Extra Costing</td>
                                                        <td colspan="3"><input type="text"
                                                                class="form-control"id="bill_extracost_note"
                                                                placeholder="Note"
                                                                value=""name="bill_extracost_note[]" />
                                                        </td>
                                                        <td><input type="hidden" name="billextracost_detail_id[]" />
                                                            <input type="number" class="form-control bill_extracost"
                                                                id="bill_extracost"placeholder="Extra Cost"
                                                                name="bill_extracost[]"value="" />
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary form-plus-btn addbillextranotefields" type="button" id="" value="Add"><i class="fe fe-plus-circle"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="row" style="margin-top:3%">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="form-group">
                                                            <label>Discount Type</label>
                                                            <select class="select" name="bill_discount_type" id="bill_discount_type" required>
                                                                <option value="none">Select</option>
                                                                <option value="percentage">Percentage(%)</option>
                                                                <option value="fixed">Fixed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label>Discount</label>
                                                            <input type="text" class="form-control bill_discount" name="bill_discount" id="bill_discount" placeholder="0" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tax %</label>
                                                    <select class="select bill_tax_percentage" name="bill_tax_percentage" id="bill_tax_percentage">
                                                            <option value="0">No Tax</option>
                                                            <option value="1">GST - (1%)</option>
                                                            <option value="2">GST - (2%)</option>
                                                            <option value="3">GST - (3%)</option>
                                                            <option value="4">GST - (4%)</option>
                                                            <option value="5">GST - (5%)</option>
                                                            <option value="6">GST - (6%)</option>
                                                            <option value="7">GST - (7%)</option>
                                                            <option value="8">GST - (8%)</option>
                                                            <option value="9">GST - (9%)</option>
                                                            <option value="10">GST - (10%)</option>
                                                            <option value="11">GST - (11%)</option>
                                                            <option value="12">GST - (12%)</option>
                                                            <option value="13">GST - (13%)</option>
                                                            <option value="14">GST - (14%)</option>
                                                            <option value="15">GST - (15%)</option>
                                                            <option value="16">GST - (16%)</option>
                                                            <option value="17">GST - (17%)</option>
                                                            <option value="18">GST - (18%)</option>
                                                            <option value="19">GST - (19%)</option>
                                                            <option value="20">GST - (20%)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                        <div class="form-group-item border-0 p-0">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group-bank">
                                                        <div class="form-group notes-form-group-info">
                                                            <label>Notes <span class="text-danger">*</span></label>
                                                            <textarea class="form-control" placeholder="Enter Notes" name="bill_add_on_note" id="bill_add_on_note" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group-bank">
                                                        <div class="invoice-total-box">
                                                            <div class="invoice-total-inner">

                                                                <p>Gross Amount <span class="billsub_total">  </span></p>
                                                                <input type="hidden" class="form-control bill_sub_total" name="bill_sub_total" id="bill_sub_total">


                                                                <p>Tax Amount <span class="billtax_amount">  </span></p>
                                                                <input type="hidden" class="form-control bill_tax_amount"name="bill_tax_amount"id="bill_tax_amount">



                                                                <p>Total <span class="billtotal_amount">  </span></p>
                                                                <input type="hidden" class="form-control bill_total_amount"name="bill_total_amount"id="bill_total_amount">

                                                                <p>Discount <span class="billdiscount_price">  </span></p>
                                                                <input type="hidden" class="form-control bill_discount_price"name="bill_discount_price"id="bill_discount_price">



                                                                <input type="hidden" class="form-control overall"name="overall"id="overall">


                                                                <p>Extra Cost <span class="billextracost_amount">  </span></p>
                                                                <input type="hidden" class="form-control bill_extracost_amount" name="bill_extracost_amount" id="bill_extracost_amount">

                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Grand Total <span class="billgrand_total">  </span></h4>
                                                                <input type="hidden" class="form-control bill_grand_total" name="bill_grand_total" id="bill_grand_total">
                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Paid Amount <span class=""><input type="text" class="form-control bill_paid_amount"  name="bill_paid_amount" id="bill_paid_amount" placeholder="Paid Amount"> </span></h4>
                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Balance<span class="billbalance_amount"> </span>
                                                                <input type="hidden" class="form-control bill_balance_amount"  name="bill_balance_amount" id="bill_balance_amount" ></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end" style="margin-top:3%">
                                            <input type="submit" class="btn btn-primary"
                                                onclick="billubmitForm(this);" />
                                            <a href="{{ route('bill.index') }}"
                                                class="btn btn-cancel btn-danger">Cancel</a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
