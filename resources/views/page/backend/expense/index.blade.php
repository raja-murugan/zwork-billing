@extends('layout.backend.auth')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="content-page-header">
                    <h6>Expense</h6>
                    <div class="list-btn">
                        <div style="display: flex;">
                            <form autocomplete="off" method="POST" action="{{ route('expense.datefilter') }}">
                                @method('PUT')
                                @csrf
                                <div style="display: flex">
                                    <div style="margin-right: 10px;"><input type="date" name="from_date"
                                            class="form-control from_date" value="{{ $today }}"></div>
                                    <div style="margin-right: 10px;"><input type="submit" class="btn btn-success"
                                            value="Search" /></div>
                                </div>
                            </form>
                            <ul class="filter-list">
                            <li>
                            <a class="btn btn-primary" href="{{ route('expense.create') }}"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Expense</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Expense Number</th>
                                            <th>Date</th>
                                            <th>Grand Total</th>
                                            <th>Debit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $keydata => $datas)
                                        <tr>
                                            <td>{{ ++$keydata }}</td>
                                            <td>#{{ $datas->expence_number }}</td>
                                            <td>{{ date('d-m-Y', strtotime($datas->date)) }}</td>
                                            <td>{{ $datas->grand_total }}</td>
                                            <td>{{ $datas->bank->name }}</td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                   <li class="badge bg-warning-light">
                                                         <a style="color: white;" href="{{ route('expense.edit', ['unique_key' => $datas->unique_key]) }}">Edit</a>
                                                   </li>
                                                   <li class="badge bg-danger-light">
                                                         <a style="color: white;" href="#expencedelete{{ $datas->unique_key }}" data-bs-toggle="modal"
                                                         data-bs-target=".expencedelete-modal-xl{{ $datas->unique_key }}">Delete</a>
                                                   </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <div class="modal fade expencedelete-modal-xl{{ $datas->unique_key }}"
                                              tabindex="-1" role="dialog"data-bs-backdrop="static"
                                              aria-labelledby="expencedeleteLargeModalLabel{{ $datas->unique_key }}"
                                              aria-hidden="true">
                                              @include('page.backend.expense.delete')
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
