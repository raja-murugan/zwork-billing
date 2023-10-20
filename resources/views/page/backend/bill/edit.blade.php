@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper card-body">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h6>Update Bill</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="quotation-card">
                                <div class="card-body">

                                <form autocomplete="off" method="POST"
                                    action="{{ route('bill.update', ['unique_key' => $BillData->unique_key]) }}"enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                        <div class="form-group-item border-0 mb-0">
                                        <input type="hidden" class="form-control quotation_id" name="quotation_id" id="quotation_id">
                                            <div class="row align-item-center">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Bill Number</label>
                                                        <input type="text"  class="form-control" placeholder="Enter Bill No"name="billno"
                                                            id="billno" value="{{ $BillData->billno }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $BillData->date }}" name="date" id="date"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Time <span class="text-danger">*</span></label>
                                                        <input type="time" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $BillData->time }}" name="time" id="time"
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
                                                                <option value="{{ $customers->id }}"@if ($customers->id === $BillData->customer_id) selected='selected' @endif>{{ $customers->name }}
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
                                                                    value="{{ $banks->id }}"@if ($banks->id === $BillData->bank_id) selected='selected' @endif>{{ $banks->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive no-pagination">
                                            <table class="table table-center table-hover datatable">
                                            <button class="btn btn-primary form-plus-btn addbillproductfields" type="button" id="" value="Add">Add Products</button>
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
                                                @foreach ($BillProducts as $index => $BillProduct)
                                                    <tr>
                                                        <td>
                                                            <input id="#" name="#"
                                                                class="auto_num form-control" type="text" value="{{ $index + 1 }}"
                                                                readonly />
                                                        </td>
                                                        <td><input type="hidden" id="bill_detail_id"
                                                                name="bill_detail_id[]" value="{{ $BillProduct->id }}"/>
                                                            <select
                                                                class="form-control  bill_product_id select js-example-basic-single"
                                                                name="bill_product_id[]" id="bill_product_id1"required>
                                                                <option value="" selected hidden class="text-muted">
                                                                    Select Product
                                                                </option>
                                                                @foreach ($product as $products)
                                                                        <option
                                                                            value="{{ $products->id }}"@if ($products->id === $BillProduct->bill_product_id) selected='selected' @endif>
                                                                            {{ $products->name }}
                                                                        </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="text" class="form-control bill_width"
                                                            id="bill_width" name="bill_width[]" value="{{ $BillProduct->bill_width }}" required />
                                                        </td>
                                                        <td><input type="text" class="form-control bill_height"
                                                            id="bill_height" name="bill_height[]" value="{{ $BillProduct->bill_height }}" required />
                                                        </td>
                                                        <td><input type="text" class="form-control bill_qty"
                                                            id="bill_qty" name="bill_qty[]" value="{{ $BillProduct->bill_qty }}" required />
                                                        </td>
                                                        <td><input type="text" class="form-control bill_areapersqft"
                                                                id="bill_areapersqft" name="bill_areapersqft[]" value="{{ $BillProduct->bill_areapersqft }}" readonly />
                                                        </td>
                                                        <td><input type="text" class="form-control bill_rate"
                                                                id="bill_rate" name="bill_rate[]"
                                                                value="{{ $BillProduct->bill_rate }}" required /></td>
                                                        <td><input type="text" class="form-control bill_product_total"
                                                                readonly id="bill_product_total"
                                                                style="background-color: #e9ecef;" name="bill_product_total[]"
                                                                placeholder="Total" value="{{ $BillProduct->bill_product_total }}"/></td>
                                                        <td>
                                                        <button class="btn btn-danger form-plus-btn billremove-tr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <hr>
                                            <table class="table table-center table-hover datatable">
                                                <thead class="thead-light">
                                                <button class="btn btn-primary form-plus-btn addbillextranotefields" type="button" id="" value="Add">Add Extra Cost</button>
                                                </thead>
                                                <tbody class="billextracost_tr">
                                                @foreach ($BillExtracosts as $index => $BillExtracosts_arr)
                                                    <tr>
                                                        <td colspan="4" class="text-end"style="font-size:15px;color:black">Extra Costing</td>
                                                        <td colspan="3">
                                                            <input type="hidden" id="billextracost_detail_id"name="billextracost_detail_id[]"value="{{ $BillExtracosts_arr->id }}" />
                                                            <input type="text" class="form-control"id="bill_extracost_note"
                                                                placeholder="Note"
                                                                value="{{ $BillExtracosts_arr->bill_extracost_note }}" name="bill_extracost_note[]" />
                                                        </td>
                                                        <td><input type="hidden" name="extracost_id[]" />
                                                            <input type="number" class="form-control bill_extracost"
                                                                id="bill_extracost"placeholder="Extra Cost"
                                                                name="bill_extracost[]" value="{{ $BillExtracosts_arr->bill_extracost }}" />
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger form-plus-btn remove-billextratr" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
                                                                <option value="percentage"@if ('percentage' === $BillData->bill_discount_type) selected='selected' @endif>Percentage(%)</option>
                                                                <option value="fixed"@if ('fixed' === $BillData->bill_discount_type) selected='selected' @endif>Fixed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label>Discount</label>
                                                            <input type="text" class="form-control bill_discount" value="{{ $BillData->bill_discount }}" name="bill_discount" id="bill_discount" placeholder="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tax %</label>
                                                    
                                                    <select class="select bill_tax_percentage" name="bill_tax_percentage" id="bill_tax_percentage">
                                                            <option value="0"@if ('0' === $BillData->bill_tax_percentage) selected='selected' @endif>No Tax</option>
                                                            <option value="1"@if ('1' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (1%)</option>
                                                            <option value="2"@if ('2' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (2%)</option>
                                                            <option value="3"@if ('3' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (3%)</option>
                                                            <option value="4"@if ('4' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (4%)</option>
                                                            <option value="5"@if ('5' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (5%)</option>
                                                            <option value="6"@if ('6' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (6%)</option>
                                                            <option value="7"@if ('7' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (7%)</option>
                                                            <option value="8"@if ('8' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (8%)</option>
                                                            <option value="9"@if ('9' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (9%)</option>
                                                            <option value="10"@if ('10' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (10%)</option>
                                                            <option value="11"@if ('11' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (11%)</option>
                                                            <option value="12"@if ('12' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (12%)</option>
                                                            <option value="13"@if ('13' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (13%)</option>
                                                            <option value="14"@if ('14' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (14%)</option>
                                                            <option value="15"@if ('15' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (15%)</option>
                                                            <option value="16"@if ('16' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (16%)</option>
                                                            <option value="17"@if ('17' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (17%)</option>
                                                            <option value="18"@if ('18' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (18%)</option>
                                                            <option value="19"@if ('19' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (19%)</option>
                                                            <option value="20"@if ('20' === $BillData->bill_tax_percentage) selected='selected' @endif>GST - (20%)</option>
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
                                                            <textarea class="form-control" placeholder="Enter Notes" name="bill_add_on_note" id="bill_add_on_note" required>{{ $BillData->bill_add_on_note }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group-bank">
                                                        <div class="invoice-total-box">
                                                            <div class="invoice-total-inner">

                                                                <p>Gross Amount <span class="billsub_total">₹  {{ $BillData->bill_sub_total }} </span></p>
                                                                <input type="hidden" class="form-control bill_sub_total" name="bill_sub_total" id="bill_sub_total" value="{{ $BillData->bill_sub_total }}">



                                                                <p>Tax Amount <span class="billtax_amount">₹  {{ $BillData->bill_tax_amount }}  </span></p>
                                                                <input type="hidden" class="form-control bill_tax_amount"name="bill_tax_amount"id="bill_tax_amount" value="{{ $BillData->bill_tax_amount }}">


                                                                <p>Total <span class="billtotal_amount">₹  {{ $BillData->bill_total_amount }} </span></p>
                                                                <input type="hidden" class="form-control bill_total_amount"name="bill_total_amount"id="bill_total_amount" value="{{ $BillData->bill_total_amount }}">



                                                                <p>Discount <span class="billdiscount_price">₹  {{ $BillData->bill_discount_price }} </span></p>
                                                                <input type="hidden" class="form-control bill_discount_price"name="bill_discount_price"id="bill_discount_price" value="{{ $BillData->bill_discount_price }}">



                                                                <input type="hidden" class="form-control overall"name="overall"id="overall" value="{{ $BillData->overall }}">


                                                                <p>Extra Cost <span class="billextracost_amount">₹  {{ $BillData->bill_extracost_amount }} </span></p>
                                                                <input type="hidden" class="form-control bill_extracost_amount" name="bill_extracost_amount" id="bill_extracost_amount" value="{{ $BillData->bill_extracost_amount }}">

                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Grand Total <span class="billgrand_total">₹  {{ $BillData->bill_grand_total }} </span></h4>
                                                                <input type="hidden" class="form-control bill_grand_total" name="bill_grand_total" id="bill_grand_total" value="{{ $BillData->bill_grand_total }}">
                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Paid Amount <span class=""><input type="text" class="form-control bill_paid_amount"  name="bill_paid_amount" id="bill_paid_amount" placeholder="Paid Amount" value="{{ $BillData->bill_paid_amount }}"> </span></h4>
                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Balance<span class="billbalance_amount"> ₹  {{ $BillData->bill_balance_amount }}</span>
                                                                <input type="hidden" class="form-control bill_balance_amount"  name="bill_balance_amount" id="bill_balance_amount" value="{{ $BillData->bill_balance_amount }}"></h4>
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
