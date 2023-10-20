@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>Customer</h6>
               <div class="list-btn">
                  <ul class="filter-list">
                     <li>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".customer-modal-xl">
                           <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Customer</a>
                     </li>
                  </ul>
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
                                 <th style="width:5%">S.No</th>
                                 <th style="width:15%">Customer</th>
                                 <th style="width:15%">Address</th>
                                 <th style="width:15%">Phone No</th>
                                 <th style="width:15%">Email</th>
                                 <th style="width:15%">Balance</th>
                                 <th style="width:20%">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($Customer_data as $keydata => $customer_data)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>{{ $customer_data['name'] }}</td>
                                 <td>{{ $customer_data['address'] }}</td>
                                 <td>{{ $customer_data['phone_number'] }}</td>
                                 <td>{{ $customer_data['email_id'] }}</td>
                                 <td> ₹ {{ $customer_data['customer_balance'] }}.00</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                          <a class="badge bg-warning-light" href="#edit{{ $customer_data['unique_key'] }}" data-bs-toggle="modal"
                                          data-bs-target=".customeredit-modal-xl{{ $customer_data['unique_key'] }}" style="color: #28084b;">Edit</a>
                                       </li>
                                       <li>
                                          <a href="{{ route('customer.view', ['unique_key' => $customer_data['unique_key']]) }}"
                                                   class="badge" style="color: #f8f9fa;background: #8068dc;">View</a>
                                       </li>
                                       <li>
                                          <a href="#delete{{ $customer_data['unique_key'] }}" data-bs-toggle="modal"
                                          data-bs-target=".customerdelete-modal-xl{{ $customer_data['unique_key'] }}" class="badge bg-danger-light" style="color: #28084b;">Delete</a>
                                       </li>
                                    </ul>
                                 
                                 </td>
                              </tr>

                              <div class="modal fade customeredit-modal-xl{{ $customer_data['unique_key'] }}"
                                    tabindex="-1" role="dialog" data-bs-backdrop="static"
                                    aria-labelledby="customereditLargeModalLabel{{ $customer_data['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.customer.edit')
                              </div>
                              <div class="modal fade customerdelete-modal-xl{{ $customer_data['unique_key'] }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="customerdeleteLargeModalLabel{{ $customer_data['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.customer.delete')
                              </div>
                           @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               
            </div>
         </div>


      </div>





      <div class="modal fade customer-modal-xl" tabindex="-1" role="dialog" aria-labelledby="customerLargeModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            @include('page.backend.customer.create')
        </div>

   </div>
</div>
@endsection