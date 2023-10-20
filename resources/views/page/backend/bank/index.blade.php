@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>Bank</h6>

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
                                 <th style="width:20%">S.No</th>
                                 <th style="width:20%">Bank</th>
                                 <th style="width:35%">Note</th>
                                 <th style="width:25%">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($data as $keydata => $bankdata)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>{{ $bankdata->name }}</td>
                                 <td>{{ $bankdata->note }}</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                          <a class="badge bg-warning-light" href="#edit{{ $bankdata->unique_key }}" data-bs-toggle="modal"
                                          data-bs-target=".bankedit-modal-xl{{ $bankdata->unique_key }}" style="color: #28084b;">Edit</a>
                                       </li>
                                       <li>
                                          <a href="#delete{{ $bankdata->unique_key }}" data-bs-toggle="modal"
                                          data-bs-target=".bankdelete-modal-xl{{ $bankdata->unique_key }}" class="badge bg-danger-light" style="color: #28084b;">Delete</a>
                                       </li>
                                    </ul>

                                 </td>
                              </tr>

                              <div class="modal fade bankedit-modal-xl{{ $bankdata->unique_key }}"
                                    tabindex="-1" role="dialog" data-bs-backdrop="static"
                                    aria-labelledby="bankeditLargeModalLabel{{ $bankdata->unique_key }}"
                                    aria-hidden="true">
                                    @include('page.backend.bank.edit')
                              </div>
                              <div class="modal fade bankdelete-modal-xl{{ $bankdata->unique_key }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="bankdeleteLargeModalLabel{{ $bankdata->unique_key }}"
                                    aria-hidden="true">
                                    @include('page.backend.bank.delete')
                              </div>
                           @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>

            </div>
         </div>
         <div class="col-sm-3">
            @include('page.backend.bank.create')
         </div>


      </div>

   </div>
</div>
@endsection
