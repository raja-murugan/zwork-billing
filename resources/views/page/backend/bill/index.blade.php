@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>Bill</h6>
            <div class="list-btn">
                  
            
                     <div style="display: flex;">
                        <form autocomplete="off" method="POST" action="{{ route('bill.datefilter') }}">
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
                           <a class="btn btn-primary" href="{{ route('bill.create') }}"><i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Bill</a>
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
                                 <th>Bill Number</th>
                                 <th>Date</th>
                                 <th>Customer</th>
                                 <th>Total</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                           @foreach ($Bill_data as $keydata => $Bill_datas)
                              <tr>
                                 <td>{{ ++$keydata }}</td>
                                 <td>#{{ $Bill_datas['billno'] }}</td>
                                 <td>{{ date('d-m-Y', strtotime($Bill_datas['date'])) }}</td>
                                 <td>{{ $Bill_datas['customer'] }}</td>
                                 <td>{{$Bill_datas['bill_grand_total'] }}</td>
                                 <td>
                                    <ul class="list-unstyled hstack gap-1 mb-0">
                                       <li>
                                             <a href="{{ route('bill.edit', ['unique_key' => $Bill_datas['unique_key']]) }}"
                                                   class="badge bg-warning-light" style="color:#28084b;">Edit</a>
                                       </li>
                                       <li>
                                          <a class="badge" href="#billview{{ $Bill_datas['unique_key'] }}" data-bs-toggle="modal"
                                          data-bs-target=".billview-modal-xl{{ $Bill_datas['unique_key'] }}" style="color: #f8f9fa;background: #8068dc;">View</a>
                                       </li>
                                       <li>
                                             <a href="#billdelete{{ $Bill_datas['unique_key'] }}" data-bs-toggle="modal"
                                             data-bs-target=".billdelete-modal-xl{{ $Bill_datas['unique_key'] }}" class="badge bg-danger-light" style="color: #28084b;">Delete</a>
                                       </li>
                                       <li>
                                       <a href="{{ route('bill.print', ['unique_key' => $Bill_datas['unique_key']]) }}"
                                                   class="badge bg-info" style="color:#28084b;">Print</a>
                                       </li>
                                    </ul>
                                 </td>
                              </tr>
                              <div class="modal fade billview-modal-xl{{ $Bill_datas['unique_key'] }}"
                                    tabindex="-1" role="dialog" data-bs-backdrop="static"
                                    aria-labelledby="billviewLargeModalLabel{{ $Bill_datas['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.bill.view')
                              </div>
                              <div class="modal fade billdelete-modal-xl{{ $Bill_datas['unique_key'] }}"
                                    tabindex="-1" role="dialog"data-bs-backdrop="static"
                                    aria-labelledby="billdeleteLargeModalLabel{{$Bill_datas['unique_key'] }}"
                                    aria-hidden="true">
                                    @include('page.backend.bill.delete')
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
