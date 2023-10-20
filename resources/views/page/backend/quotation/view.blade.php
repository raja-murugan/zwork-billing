<div class="modal-dialog modal-dialog-centered modal-xl">
   <div class="modal-content">

         <div class="modal-header border-0 pb-0">
            <div class="form-header modal-header-title text-start mb-0">
            <h6 class="mb-0" style="color:green">QUOTATION</h6>
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
                                       Quotation Number<span>: </span><strong style="color:red;"># {{ $Quotationdata['quotation_number'] }}</strong>
                                    </p>
                                 </div>
                                 <div class="col-md-5">
                                    <p class="invoice-details" style="color:#000;">
                                       Customer<span>: </span><strong style="color:red;text-transform: uppercase;">{{ $Quotationdata['customer'] }}</strong>
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <p class="text-start invoice-details" style="color:#000;">
                                       Date<span>: </span><strong style="color:red;">{{ date('d-m-Y', strtotime($Quotationdata['date'])) }}</strong>
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
                                 @foreach ($Quotationdata['products_data'] as $index => $products_data)
                                    @if ($products_data['quotation_id'] == $Quotationdata['id'])
                                    <div class="col-md-3 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['product_name'] }}</span>
                                    </div>
                                    <div class="col-md-1 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['width'] }}</span>
                                    </div>
                                    <div class="col-md-1 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['height'] }}</span>
                                    </div>
                                    <div class="col-md-1 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['qty'] }}</span>
                                    </div>
                                    <div class="col-md-2 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['areapersqft'] }}</span>
                                    </div>
                                    <div class="col-md-2 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['rate'] }}</span>
                                    </div>
                                    <div class="col-md-2 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">₹ {{ $products_data['product_total'] }}</span>
                                    </div>
                                    @endif
                                 @endforeach
                              </div>

                              <br/><br/>
                                    @if ($Quotationdata['extracosts'])
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
                                          @foreach ($Quotationdata['extracosts'] as $index => $extracosts)
                                             @if ($extracosts['quotation_id'] == $Quotationdata['id'])
                                             <div class="col-md-1"></div>
                                             <div class="col-md-5 border">
                                                <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $extracosts['extracost_note'] }}</span>
                                             </div>
                                             <div class="col-md-5 border">
                                                <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">₹ {{ $extracosts['extracost'] }}</span>
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
                                                   Discount Type <span><strong> {{ $Quotationdata['discount_type'] }}</strong></span>
                                                </p>

                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Discount <span><strong> {{ $Quotationdata['discount'] }}</strong> </span>
                                                </p>

                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Tax Percentage <span><strong> {{ $Quotationdata['tax_percentage'] }} %</strong></span>
                                                </p>

                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Note <span><strong> {{ $Quotationdata['add_on_note'] }}</strong></span>
                                                </p>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-12">
                                       <div class="invoice-total-card  form-group-bank">
                                          <div class="invoice-total-box">
                                             <div class="invoice-total-inner">
                                                <p>Gross Amount <span>₹ {{ $Quotationdata['sub_total'] }}</span></p>
                                                
                                                <p>Tax Amount <span>₹ {{ $Quotationdata['tax_amount'] }}</span></p>

                                                
                                                <p>Total <span>₹ {{ $Quotationdata['total_amount'] }}</span></p>

                                                <p>Discount<span>₹ {{ $Quotationdata['discount_price'] }}</span></p>
                                                <p>Over All<span>₹ {{ $Quotationdata['overall'] }}</span></p>
                                                <p>Extra Cost <span>₹ {{ $Quotationdata['extracost_amount'] }}</span></p>
                                             </div>
                                             <div class="invoice-total-footer">
                                                <h4>Grand Total <span>₹ {{ $Quotationdata['grand_total'] }}</span></h4>
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