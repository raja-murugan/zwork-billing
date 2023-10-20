@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper card-body">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h6>Add Quotation</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="quotation-card">
                                <div class="card-body">

                                    <form autocomplete="off" method="POST" action="{{ route('quotation.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row align-item-center">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Quotation Number</label>
                                                        <input type="text" readonly class="form-control"
                                                            style="background-color: #e9ecef;" name="quotation_number"
                                                            id="quotation_number" value="{{ $quotation_no }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $today }}" name="date" id="date"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
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
                                                <tbody class="product_fields">
                                                    <tr>
                                                        <td>
                                                            <input id="#" name="#"
                                                                class="auto_num form-control" type="text" value="1"
                                                                readonly />
                                                        </td>
                                                        <td><input type="hidden" id="quotation_detail_id"
                                                                name="quotation_detail_id[]" />
                                                            <select
                                                                class="form-control  product_id select js-example-basic-single"
                                                                name="product_id[]" id="product_id1"required>
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
                                                        <td><input type="text" class="form-control width"
                                                            id="width" name="width[]" value="" required />
                                                        </td>
                                                        <td><input type="text" class="form-control height"
                                                            id="height" name="height[]" value="" required />
                                                        </td>
                                                        <td><input type="text" class="form-control qty"
                                                            id="qty" name="qty[]" value="" required />
                                                        </td>
                                                        {{-- Area-Sq.ft --}}
                                                        <td><input type="text" class="form-control areapersqft"
                                                                id="areapersqft" name="areapersqft[]" value="" readonly />
                                                        </td>
                                                        <td><input type="text" class="form-control rate"
                                                                id="rate" name="rate[]"
                                                                value="" required /></td>
                                                        <td><input type="text" class="form-control product_total"
                                                                readonly id="product_total"
                                                                style="background-color: #e9ecef;" name="product_total[]"
                                                                placeholder="Total" /></td>
                                                        <td>
                                                            <button class="btn btn-primary form-plus-btn addproductfields" type="button" id="" value="Add"><i class="fe fe-plus-circle"></i></button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tbody class="extracost_tr">
                                                    <tr>
                                                        <td colspan="4" class="text-end"
                                                            style="font-size:15px;color:black">Extra Costing</td>
                                                        <td colspan="3"><input type="text"
                                                                class="form-control"id="extracost_note"
                                                                placeholder="Note"
                                                                value=""name="extracost_note[]" />
                                                        </td>
                                                        <td><input type="hidden" name="extracost_id[]" />
                                                            <input type="number" class="form-control extracost"
                                                                id="extracost"placeholder="Extra Cost"
                                                                name="extracost[]"value="" />
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary form-plus-btn addextranotefields" type="button" id="" value="Add"><i class="fe fe-plus-circle"></i></button>
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
                                                            <select class="select" name="discount_type" id="discount_type" required>
                                                                <option value="none">Select</option>
                                                                <option value="percentage">Percentage(%)</option>
                                                                <option value="fixed">Fixed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <label>Discount</label>
                                                            <input type="text" class="form-control discount" name="discount" id="discount" placeholder="0" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tax %</label>
                                                    <select class="select tax_percentage" name="tax_percentage" id="tax_percentage">
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
                                                            <textarea class="form-control" placeholder="Enter Notes" name="add_on_note" id="add_on_note" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group-bank">
                                                        <div class="invoice-total-box">
                                                            <div class="invoice-total-inner">

                                                                <p>Gross Amount <span class="sub_total">  </span></p>
                                                                <input type="hidden" class="form-control subq_total" name="sub_total" id="sub_total">

                                                                <p>Tax Amount <span class="tax_amount">  </span></p>
                                                                <input type="hidden" class="form-control taxq_amount"name="tax_amount"id="tax_amount" value="0.00">


                                                                <p>Total <span class="total_amount">  </span></p>
                                                                <input type="hidden" class="form-control totalq_amount"name="total_amount"id="total_amount">

                                                                <p>Discount <span class="discount_price">  </span></p>
                                                                <input type="hidden" class="form-control discountq_price"name="discount_price"id="discount_price" value="0.00">

                                                                <input type="hidden" class="form-control overall"name="overall"id="overall" value="">


                                                                <p>Extra Cost <span class="extracost_amount">  </span></p>
                                                                <input type="hidden" class="form-control extracostq_amount" name="extracost_amount" id="extracost_amount" value="0.00">

                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Grand Total <span class="grand_total">  </span></h4>
                                                                <input type="hidden" class="form-control grandq_total" name="grand_total" id="grand_total">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end" style="margin-top:3%">
                                            <input type="submit" class="btn btn-primary"
                                                onclick="quotationubmitForm(this);" />
                                            <a href="{{ route('quotation.index') }}"
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
