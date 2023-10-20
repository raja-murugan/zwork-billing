<div class="modal-dialog modal-dialog-centered modal-xl">
   <div class="modal-content">

         <div class="modal-header border-0 pb-0">
            <div class="form-header modal-header-title text-start mb-0">
            <h6 class="mb-0" style="color:green">BILL</h6>
            </div>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span class="align-center" aria-hidden="true">&times;</span>
            </button>
         </div>

        

            <div class="modal-body">
               <div class="content container-fluid">

               


                           <div class="invoice-item invoice-item-date">
                              <div class="row">
                                 <div class="col-md-3">
                                    <p class="text-start invoice-details" style="color:#000;">
                                       Bill Number<span>: </span><strong style="color:red;"># {{ $Bill_datas['billno'] }}</strong>
                                    </p>
                                 </div>
                                 <div class="col-md-3">
                                    <p class="invoice-details" style="color:#000;">
                                       Customer<span>: </span><strong style="color:red;text-transform: uppercase;">{{ $Bill_datas['customer'] }}</strong>
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <p class="text-start invoice-details" style="color:#000;">
                                       Date<span>: </span><strong style="color:red;">{{ date('d-m-Y', strtotime($Bill_datas['date'])) }}</strong>
                                    </p>
                                 </div>
                                 <div class="col-md-2">
                                    <p class="text-start invoice-details" style="color:#000;">
                                       Bank<span>: </span><strong style="color:red;">{{ $Bill_datas['bank'] }}</strong>
                                    </p>
                                 </div>
                              </div>
                           </div>


                           <div class="invoice-item invoice-item-two">
                              <div class="row">

                                 <div class="col-md-3 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Product</span>
                                 </div>
                                 <div class="col-md-1 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Width</span>
                                 </div>
                                 <div class="col-md-1 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Heigh</span>
                                 </div>
                                 <div class="col-md-1 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Qty</span>
                                 </div>
                                 <div class="col-md-2 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Area / Sq.ft</span>
                                 </div>
                                 <div class="col-md-2 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Rate</span>
                                 </div>
                                 <div class="col-md-2 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Total</span>
                                 </div>

                              </div>
                              <div class="row ">
                                 @foreach ($Bill_datas['products_data'] as $index => $products_data)
                                    @if ($products_data['bill_id'] == $Bill_datas['id'])
                                    <div class="col-md-3 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['product_name'] }}</span>
                                    </div>
                                    <div class="col-md-1 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['bill_width'] }}</span>
                                    </div>
                                    <div class="col-md-1 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['bill_height'] }}</span>
                                    </div>
                                    <div class="col-md-1 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['bill_qty'] }}</span>
                                    </div>
                                    <div class="col-md-2 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['bill_areapersqft'] }}</span>
                                    </div>
                                    <div class="col-md-2 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['bill_rate'] }}</span>
                                    </div>
                                    <div class="col-md-2 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">₹ {{ $products_data['bill_product_total'] }}</span>
                                    </div>
                                    @endif
                                 @endforeach
                              </div>

                              <br/><br/>
                                    @if ($Bill_datas['extracosts'])
                                       <div class="row ">
                                          <div class="col-md-1"></div>
                                          <div class="col-md-5 border">
                                             <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Extracost Note</span>
                                          </div>
                                          <div class="col-md-5 border">
                                             <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Extracost</span>
                                          </div>
                                          <div class="col-md-1"></div>
                                       </div>
                                       <div class="row ">
                                          @foreach ($Bill_datas['extracosts'] as $index => $extracosts)
                                             @if ($extracosts['bill_id'] == $Bill_datas['id'])
                                             <div class="col-md-1"></div>
                                             <div class="col-md-5 border">
                                                <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $extracosts['bill_extracost_note'] }}</span>
                                             </div>
                                             <div class="col-md-5 border">
                                                <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">₹ {{ $extracosts['bill_extracost'] }}</span>
                                             </div>
                                             <div class="col-md-1"></div>
                                             @endif
                                          @endforeach
                                       </div>
                                    @endif

                           </div>




                           <div class="terms-conditions">
                              <div class="row align-items-center justify-content-between">

                                    <div class="col-xl-6 col-lg-12">
                                       <div class="invoice-total-card  form-group-bank">
                                          <div class="invoice-total-box">
                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Discount Type <span><strong> {{ $Bill_datas['bill_discount_type'] }}</strong></span>
                                                </p>

                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Discount <span><strong> {{ $Bill_datas['bill_discount'] }}</strong> </span>
                                                </p>

                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Tax Percentage <span><strong> {{ $Bill_datas['bill_tax_percentage'] }} %</strong></span>
                                                </p>

                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Note <span><strong> {{ $Bill_datas['bill_add_on_note'] }}</strong></span>
                                                </p>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-12">
                                       <div class="invoice-total-card  form-group-bank">
                                          <div class="invoice-total-box">
                                             <div class="invoice-total-inner">
                                                <p>Gross Amount <span>₹ {{ $Bill_datas['bill_sub_total'] }}</span></p>
                                                <p>Tax Amount <span>₹ {{ $Bill_datas['bill_tax_amount'] }}</span></p>
                                                <p>Total <span>₹ {{ $Bill_datas['bill_total_amount'] }}</span></p>
                                                <p>Discount<span>₹ {{ $Bill_datas['bill_discount_price'] }}</span></p>
                                                
                                                <p>Over All <span>₹ {{ $Bill_datas['overall'] }}</span></p>
                                                <p>Extra Cost <span>₹ {{ $Bill_datas['bill_extracost_amount'] }}</span></p>
                                                <p style="color: #0d6efd;">Grand Total <span style="color: #0d6efd;">₹ {{ $Bill_datas['bill_grand_total'] }}</span></p>
                                                <p style="color:green">Paid Amount <span style="color:green">₹ {{ $Bill_datas['bill_paid_amount'] }}</span></p>
                                                <p style="color:red">Balance Amount <span style="color:red">₹ {{ $Bill_datas['bill_balance_amount'] }}</span></p>
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
</div>