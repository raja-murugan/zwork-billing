@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper card-body">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h6>Add Vendor Payment</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="quotation-card">
                                <div class="card-body">

                                    <form autocomplete="off" method="POST" action="{{ route('vendor_payment.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row align-item-center">

                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="datetimepicker form-control" placeholder="Select Date"
                                                            value="{{ $today }}" name="date" id="date"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Time <span class="text-danger">*</span></label>
                                                        <input type="time" class="datetimepicker form-control" placeholder="Select Date"
                                                            value="{{ $timenow }}" name="time" id="time"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select Vendor <span class="text-danger">*</span></label>
                                                        <select
                                                            class="form-control select vendorpayment_vendorid js-example-basic-single"
                                                            name="vendor_id" id="vendor_id" required>
                                                            <option value="" disabled selected hiddden>Select Customer
                                                            </option>
                                                            @foreach ($vendor as $vendors)
                                                                <option value="{{ $vendors->id }}">{{ $vendors->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Select Bank <span class="text-danger">*</span></label>
                                                        <select
                                                            class="form-control select vendorpayment_bank_id js-example-basic-single"
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


                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                      <label >Old Balance</label>
                                                         <input type="text" name="oldblance" id="oldblance" readonly class="form-control  vendorpayment_oldblance" style="color:red">
                                                    </div>
                                                </div>



                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                      <label >Discount</label>
                                                         <input type="text" name="discount" id="discount" placeholder="Enter Discount Amount" class="form-control  vendorpayment_discount" style="color:black">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                      <label>Total Amount</label>
                                                         <input type="text" name="totalamount" id="totalamount" readonly class="form-control  vendorpayment_totalamount" style="color:black">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                      <label >Payable Amount </label>
                                                         <input type="text" name="paid_amount" id="paid_amount" placeholder="Enter paid amount" class="form-control  vendorpayment_paidamount" style="color:black">
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                      <label >Balance</label>
                                                         <input type="text" name="payment_pending" id="payment_pending" readonly class="form-control  vendorpayment_paymentpending" style="color:#d91617;font-weight: 700;font-size: 17px;background-color:#ffeb00;">
                                                    </div>
                                                </div>

                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                    <div class="form-group">
                                                      <label >Note</label>
                                                         <input type="text" name="note" id="note"  class="form-control  note" >
                                                    </div>
                                                </div>



                                            </div>
                                        </div>




                                        <div class="text-end" style="margin-top:3%">
                                            <input type="submit" class="btn btn-primary"/>
                                            <a href="{{ route('vendor_payment.index') }}" class="btn btn-cancel btn-danger">Cancel</a>
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
