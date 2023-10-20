@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>Product</h6>

         </div>
      </div>

      <div class="row">
         <div class="col-sm-9">
            <div class="card">

                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-center table-hover datatable table-striped">
                           <thead class="thead-light">
                              <tr>
                                 <th style="width:15%">S.No</th>
                                 <th style="width:20%">Product</th>
                                 <th style="width:40%">Description</th>
                                 <th style="width:25%">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($Productdata as $keydata => $Product_data)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>{{ $Product_data->name }}</td>
                                 <td>{{ $Product_data->description }}</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                          <a class="badge bg-warning-light" href="#productedit{{ $Product_data->unique_key }}" data-bs-toggle="modal"
                                          data-bs-target=".productedit-modal-xl{{ $Product_data->unique_key }}" style="color: #28084b;">Edit</a>
                                       </li>
                                       <li>
                                          <a href="#productdelete{{ $Product_data->unique_key }}" data-bs-toggle="modal"
                                          data-bs-target=".productdelete-modal-xl{{ $Product_data->unique_key }}" class="badge bg-danger-light" style="color: #28084b;">Delete</a>
                                       </li>
                                    </ul>

                                 </td>
                              </tr>

                              <div class="modal fade productedit-modal-xl{{ $Product_data->unique_key }}"
                                    tabindex="-1" role="dialog" data-bs-backdrop="static"
                                    aria-labelledby="producteditLargeModalLabel{{ $Product_data->unique_key }}"
                                    aria-hidden="true">
                                    @include('page.backend.product.edit')
                              </div>
                              <div class="modal fade productdelete-modal-xl{{ $Product_data->unique_key }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="productdeleteLargeModalLabel{{ $Product_data->unique_key }}"
                                    aria-hidden="true">
                                    @include('page.backend.product.delete')
                              </div>
                           @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>

            </div>
         </div>
         <div class="col-sm-3">
            @include('page.backend.product.create')
         </div>


      </div>

   </div>
</div>
@endsection
