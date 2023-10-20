@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper card-body">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="content-page-header">
                    <h6>Update Expense</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="expense-card">
                                <div class="card-body">

                                    <form autocomplete="off" method="POST" action="{{ route('expense.update', ['unique_key' => $ExpenseData->unique_key]) }}"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        <div class="form-group-item border-0 mb-0">
                                            <div class="row align-item-center">
                                                <div class="col-lg-2 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Expence Number</label>
                                                        <input type="text" readonly class="form-control"
                                                            style="background-color: #e9ecef;" name="expence_number"
                                                            id="expence_number" value="{{ $ExpenseData->expence_number }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $ExpenseData->date }}" name="date" id="date"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Time <span class="text-danger">*</span></label>
                                                        <input type="time" class="datetimepicker form-control"
                                                            style="background-color: #e9ecef;" placeholder="Select Date"
                                                            value="{{ $ExpenseData->time }}" name="time" id="time"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Bank</label>
                                                        <select
                                                            class="form-control select bank_id js-example-basic-single"
                                                            name="bank_id" id="bank_id" required>
                                                            <option value="" disabled  hiddden>Select Bank
                                                            </option>
                                                            @foreach ($bank as $banks)
                                                                <option value="{{ $banks->id }} @if ($banks->id === $ExpenseData->bank_id) selected @endif">{{ $banks->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label style="opacity: 0%;">Action</label>
                                                        <button class="btn btn-primary form-plus-btn addexpensenote" type="button" id="" value="Add"><i class="fe fe-plus-circle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive no-pagination">
                                            <table class="table table-center table-hover datatable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th style="width:75%">Note</th>
                                                        <th style="width:20%">Cost</th>
                                                        <th style="width:5%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="expensenote_tr">
                                                    @foreach ($ExpenseNote as $index => $ExpenseNotes)
                                                    <tr>
                                                        <td><input type="text"
                                                                class="form-control"id="note"
                                                                placeholder="Note"
                                                                value="{{ $ExpenseNotes->note }}" name="note[]" />
                                                        </td>
                                                        <td><input type="hidden" name="expense_details_id[]" value="{{ $ExpenseNotes->id }}" />
                                                            <input type="text" class="form-control expense_price"
                                                                id="expense_price"placeholder="Cost"
                                                                name="expense_price[]" value="{{ $ExpenseNotes->price }}" />
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger form-plus-btn remove-expensenote" type="button" id="" value="Add"><i class="fe fe-minus-circle"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="form-group-item border-0 p-0">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group-bank">
                                                        <div class="form-group notes-form-group-info">
                                                            <label>Notes <span class="text-danger">*</span></label>
                                                            <textarea class="form-control" placeholder="Enter Notes" name="add_on_note" id="add_on_note" required>{!! $ExpenseData->add_on_note !!}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="form-group-bank">
                                                        <div class="invoice-total-box">
                                                            <div class="invoice-total-footer">
                                                                <h4>Total Amount <span class="total_expense">₹  {{ $ExpenseData->grand_total }}</span></h4>
                                                                <input type="hidden" name="total_expense_amount" id="total_expense_amount" class="total_expense_amount" value="{{ $ExpenseData->grand_total }}"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end" style="margin-top:3%">
                                            <input type="submit" class="btn btn-primary"
                                                onclick="quotationubmitForm(this);" />
                                            <a href="{{ route('expense.index') }}"
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
