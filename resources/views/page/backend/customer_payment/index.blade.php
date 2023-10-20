@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>Customer Payment</h6>
               <div class="list-btn">
                     <div style="display: flex;">
                        <form autocomplete="off" method="POST" action="{{ route('customer_payment.datefilter') }}">
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
                           <a class="btn btn-primary" href="{{ route('customer_payment.create') }}"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add CustomerPayment</a>
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
                                 <th style="width:10%">S.No</th>
                                 <th style="width:15%">Date</th>
                                 <th style="width:15%">Customer</th>
                                 <th style="width:10%">Discount</th>
                                 <th style="width:15%">Paid Amount</th>
                                 <th style="width:15%">Balance</th>
                                 <th style="width:20%">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($PaymentData as $keydata => $PaymentDatas)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>{{ $PaymentDatas['date'] }} - {{ $PaymentDatas['time'] }}</td>
                                 <td>{{ $PaymentDatas['customer'] }}</td>
                                 <td>{{ $PaymentDatas['discount']  }}</td>
                                 <td>{{ $PaymentDatas['paid_amount']  }}</td>
                                 <td>{{ $PaymentDatas['payment_pending'] }}</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                          <a href="{{ route('customer_payment.edit', ['unique_key' => $PaymentDatas['unique_key']]) }}"
                                                   class="badge bg-warning-light" style="color:#28084b;">Edit</a>
                                       </li>
                                       <li>
                                          <a href="#delete{{ $PaymentDatas['unique_key'] }}" data-bs-toggle="modal"
                                          data-bs-target=".customerpaymentdelete-modal-xl{{ $PaymentDatas['unique_key'] }}" class="badge bg-danger-light" style="color: #28084b;">Delete</a>
                                       </li>
                                    </ul>
                                 
                                 </td>
                              </tr>
                              <div class="modal fade customerpaymentdelete-modal-xl{{ $PaymentDatas['unique_key'] }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="customerpaymentdeleteLargeModalLabel{{ $PaymentDatas['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.customer_payment.delete')
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