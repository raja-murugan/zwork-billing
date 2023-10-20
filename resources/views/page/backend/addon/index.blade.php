@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>Addon</h6>

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
                                 <th style="width:30%">S.No</th>
                                 <th style="width:40%">Addon</th>
                                 <th style="width:30%">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($data as $keydata => $addon_data)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>{{ $addon_data->name }}</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                          <a class="badge bg-warning-light" href="#addonedit{{ $addon_data->unique_key }}" data-bs-toggle="modal"
                                          data-bs-target=".addonedit-modal-xl{{ $addon_data->unique_key }}" style="color: #28084b;">Edit</a>
                                       </li>
                                       <li>
                                          <a href="#delete{{ $addon_data->unique_key }}" data-bs-toggle="modal"
                                          data-bs-target=".addondelete-modal-xl{{ $addon_data->unique_key }}" class="badge bg-danger-light" style="color: #28084b;">Delete</a>
                                       </li>
                                    </ul>

                                 </td>
                              </tr>

                              <div class="modal fade addonedit-modal-xl{{ $addon_data->unique_key }}"
                                    tabindex="-1" role="dialog" data-bs-backdrop="static"
                                    aria-labelledby="addoneditLargeModalLabel{{ $addon_data->unique_key }}"
                                    aria-hidden="true">
                                    @include('page.backend.addon.edit')
                              </div>
                              <div class="modal fade addondelete-modal-xl{{ $addon_data->unique_key }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="addondeleteLargeModalLabel{{ $addon_data->unique_key }}"
                                    aria-hidden="true">
                                    @include('page.backend.addon.delete')
                              </div>
                           @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>

            </div>
         </div>
         <div class="col-sm-3">
            @include('page.backend.addon.create')
         </div>


      </div>

   </div>
</div>
@endsection
