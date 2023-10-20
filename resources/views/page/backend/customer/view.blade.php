@extends('layout.backend.auth')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="content-page-header">
            <h6>CUSTOMER - <span style="color:green;text-transform: uppercase;">{{ $CustomerData->name }}</span></h6>
         </div>
      </div>




<div class="row">
         <div class="col-xl-4 col-sm-6 col-12">
            <div class="card" style="background: #cfe35bdb;">
               <div class="card-body">
                  <div class="dash-widget-header">
                     <span class="dash-widget-icon bg-1">
                     <i class="fas fa-dollar-sign"></i>
                     </span>
                     <div class="dash-count">
                        <div class="dash-title" style="color:#e93131;font-size: 18px;text-transform: uppercase;">Total Amount</div>
                        <div class="dash-counts">
                              <p> ₹ {{$totalbillamount}}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-sm-6 col-12">
            <div class="card" style="background: #5be35bc4;">
               <div class="card-body">
                  <div class="dash-widget-header">
                     <span class="dash-widget-icon bg-2">
                        <i class="fas fa-users"></i>
                     </span>
                     <div class="dash-count">
                        <div class="dash-title" style="color:#e93131;font-size: 18px;text-transform: uppercase;">Total Paid</div>
                        <div class="dash-counts">
                           <p> ₹ {{$total_amount_paid}}</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-sm-6 col-12">
            <div class="card" style="background: #ff000073;">
               <div class="card-body">
                  <div class="dash-widget-header">
                     <span class="dash-widget-icon bg-3">
                        <i class="fas fa-file-alt"></i>
                     </span>
                     <div class="dash-count">
                        <div class="dash-title" style="color:white;font-size: 18px;text-transform: uppercase;">Balance</div>
                        <div class="dash-counts">
                        <p> ₹ {{$total_balance}}</p>
                     </div>
                  </div>
               </div>
               </div>
            </div>
         </div>
</div>







      <div class="card invoices-tabs-card">
         <div class="invoices-main-tabs">
            <div class="row align-items-center">
               <div class="col-lg-12">
                  <div class="invoices-tabs">
                     <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified">
                        <li class="nav-item" ><a href="#solid-rounded-justified-tab1" class="nav-link active" data-bs-toggle="tab" style="padding-top: 8px;">QUOTATION</a></li>
                        <li class="nav-item"><a href="#solid-rounded-justified-tab2" class="nav-link" data-bs-toggle="tab" style="padding-top: 8px;">BILL</a></li>
                        <li class="nav-item"><a href="#solid-rounded-justified-tab3" class="nav-link" data-bs-toggle="tab" style="padding-top: 8px;">PAYMENT RECEIPT</a></li>
                     </ul>

                     <div class="tab-content">
                        <div class="tab-pane show active" id="solid-rounded-justified-tab1">
                        


                        <div class="card">
                              <div class="table-responsive">
                                 <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                       <tr>
                                          <th>Quotation Number</th>
                                          <th>Date</th>
                                          <th>Gross Amount</th>
                                          <th>Discount</th>
                                          <th>Tax </th>
                                          <th>Extra Cost</th>
                                          <th>Grand Total</th>
                                          <th>Status</th>
                                       </tr>
                                    </thead>
                                       <tbody>
                                       @foreach ($quotation_data as $keydata => $quotation_datas)
                                          <tr>
                                             <td># {{$quotation_datas['quotation_number']}}</td>
                                             <td>{{ date('d-m-Y', strtotime($quotation_datas['date'])) }}</td>
                                             <td>{{$quotation_datas['sub_total']}}</td>
                                             <td>{{$quotation_datas['discount_price']}}</td>
                                             <td>{{$quotation_datas['tax_amount']}}</td>
                                             <td>{{$quotation_datas['extracost_amount']}}</td>
                                             <td><span class="badge bg-primary-light">₹  {{$quotation_datas['grand_total']}}</span></td>
                                             <td><span class="badge bg-info-light" style="color:black;">Non Converted</span></td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                 </table>
                              </div>
                        </div>





                        </div>
                        <div class="tab-pane" id="solid-rounded-justified-tab2">
                        




                        
                        <div class="card">
                              <div class="table-responsive">
                                 <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                       <tr>
                                          <th>Bill Number</th>
                                          <th>Date</th>
                                          <th>Gross Amount</th>
                                          <th>Discount</th>
                                          <th>Tax </th>
                                          <th>Extra Cost</th>
                                          <th>Grand Total</th>
                                          <th>Paid</th>
                                       </tr>
                                    </thead>
                                       <tbody>
                                       @foreach ($Bill_data as $keydata => $Bill_datas)
                                          <tr>
                                             <td># {{$Bill_datas['billno']}}</td>
                                             <td>{{ date('d-m-Y', strtotime($Bill_datas['date'])) }}</td>
                                             <td>{{$Bill_datas['bill_sub_total']}}</td>
                                             <td>{{$Bill_datas['bill_discount_price']}}</td>
                                             <td>{{$Bill_datas['bill_tax_amount']}}</td>
                                             <td>{{$Bill_datas['bill_extracost_amount']}}</td>
                                             <td ><span class="badge bg-primary-light">₹  {{$Bill_datas['bill_grand_total']}}</span></td>
                                             <td ><span class="badge" style="background-color:#c3e12e;color:black;">₹  {{$Bill_datas['bill_paid_amount']}}</span></td>
                                          </tr>
                                          @endforeach
                                       </tbody>
                                 </table>
                              </div>
                        </div>






                        </div>
                        <div class="tab-pane" id="solid-rounded-justified-tab3">
                        

                              <div class="card">
                                    <div class="table-responsive">
                                       <table class="table table-center table-hover datatable">
                                          <thead class="thead-light">
                                             <tr>
                                                <th>Date</th>
                                                <th>Discount</th>
                                                <th>Paid Amount </th>
                                                <th>Note</th>
                                             </tr>
                                          </thead>
                                             <tbody>
                                             @foreach ($PaymentData as $keydata => $PaymentDatas)
                                                <tr>
                                                   <td>{{ date('d-m-Y', strtotime($PaymentDatas['date'])) }}</td>
                                                   <td>₹  {{$PaymentDatas['discount']}}</td>
                                                   <td><span class="badge" style="background-color:#c3e12e;color:black;">₹  {{$PaymentDatas['paid_amount']}}</span></td>
                                                   <td>{{$PaymentDatas['note']}}</td>
                                                </tr>
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
         </div>
      </div>








   </div>
</div>
@endsection