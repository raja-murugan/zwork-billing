@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>Vendor</h6>
               <div class="list-btn">
                  <ul class="filter-list">
                     <li>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".vendor-modal-xl">
                           <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Vendor</a>
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
                                 <th style="width:15%">Vendor</th>
                                 <th style="width:15%">Address</th>
                                 <th style="width:15%">Phone No</th>
                                 <th style="width:15%">Email</th>
                                 <th style="width:15%">Shop Name</th>
                                 <th style="width:15%">Balance</th>
                                 <th style="width:20%">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($Vendor_data as $keydata => $vendor_data)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>{{ $vendor_data['name'] }}</td>
                                 <td>{{ $vendor_data['address'] }}</td>
                                 <td>{{ $vendor_data['phone_number'] }}</td>
                                 <td>{{ $vendor_data['email_id'] }}</td>
                                 <td>{{ $vendor_data['shop_name'] }}</td>
                                 <td> ₹ {{ $vendor_data['vendor_balance'] }}</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                          <a class="badge bg-warning-light" href="#edit{{ $vendor_data['unique_key'] }}" data-bs-toggle="modal"
                                          data-bs-target=".vendoredit-modal-xl{{ $vendor_data['unique_key'] }}" style="color: #28084b;">Edit</a>
                                       </li>
                                       
                                       <li>
                                          <a href="{{ route('vendor.view', ['unique_key' => $vendor_data['unique_key']]) }}"
                                                   class="badge" style="color: #f8f9fa;background: #8068dc;">View</a>
                                       </li>
                                       <li>
                                          <a href="#delete{{ $vendor_data['unique_key'] }}" data-bs-toggle="modal"
                                          data-bs-target=".vendordelete-modal-xl{{ $vendor_data['unique_key'] }}" class="badge bg-danger-light" style="color: #28084b;">Delete</a>
                                       </li>
                                    </ul>
                                 
                                 </td>
                              </tr>

                              <div class="modal fade vendoredit-modal-xl{{ $vendor_data['unique_key'] }}"
                                    tabindex="-1" role="dialog" data-bs-backdrop="static"
                                    aria-labelledby="vendoreditLargeModalLabel{{ $vendor_data['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.vendor.edit')
                              </div>
                              <div class="modal fade vendordelete-modal-xl{{ $vendor_data['unique_key'] }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="vendordeleteLargeModalLabel{{ $vendor_data['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.vendor.delete')
                              </div>
                           @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               
            </div>
         </div>


      </div>





      <div class="modal fade vendor-modal-xl" tabindex="-1" role="dialog" aria-labelledby="vendorLargeModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            @include('page.backend.vendor.create')
        </div>

   </div>
</div>
@endsection