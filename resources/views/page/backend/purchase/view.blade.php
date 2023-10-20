<div class="modal-dialog modal-dialog-centered modal-xl">
   <div class="modal-content">

         <div class="modal-header border-0 pb-0">
            <div class="form-header modal-header-title text-start mb-0">
            <h6 class="mb-0" style="color:green">PURCHASE</h6>
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
                                       Purchase Number<span>: </span><strong style="color:red;"># {{ $Purchasedatas['purchase_number'] }}</strong>
                                    </p>
                                 </div>
                                 <div class="col-md-3">
                                    <p class="text-start invoice-details" style="color:#000;">
                                       Voucher Number<span>: </span><strong style="color:red;"># {{ $Purchasedatas['vocher_number'] }}</strong>
                                    </p>
                                 </div>
                                 <div class="col-md-2">
                                    <p class="invoice-details" style="color:#000;">
                                       Vendor<span>: </span><strong style="color:red;text-transform: uppercase;">{{ $Purchasedatas['vendor'] }}</strong>
                                    </p>
                                 </div>
                                 <div class="col-md-2">
                                    <p class="text-start invoice-details" style="color:#000;">
                                       Date<span>: </span><strong style="color:red;">{{ date('d-m-Y', strtotime($Purchasedatas['date'])) }}</strong>
                                    </p>
                                 </div>
                                 <div class="col-md-2">
                                    <p class="text-start invoice-details" style="color:#000;">
                                       Bank<span>: </span><strong style="color:red;">{{ $Purchasedatas['bank'] }}</strong>
                                    </p>
                                 </div>
                              </div>
                           </div>


                           <div class="invoice-item invoice-item-two">
                              <div class="row">

                                 <div class="col-md-4 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Product</span>
                                 </div>
                                 <div class="col-md-2 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Quantity</span>
                                 </div>
                                 <div class="col-md-3 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Rate / Qty</span>
                                 </div>
                                 <div class="col-md-3 border">
                                       <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 700;line-height: 35px; ">Total</span>
                                 </div>

                              </div>
                              <div class="row ">
                                 @foreach ($Purchasedatas['products_data'] as $index => $products_data)
                                    @if ($products_data['purchase_id'] == $Purchasedatas['id'])
                                    <div class="col-md-4 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['product_name'] }}</span>
                                    </div>
                                    <div class="col-md-2 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['purchase_quantity'] }}</span>
                                    </div>
                                    <div class="col-md-3 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $products_data['purchase_rateperquantity'] }}</span>
                                    </div>
                                    <div class="col-md-3 border">
                                          <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">₹ {{ $products_data['purchase_producttotal'] }}</span>
                                    </div>
                                    @endif
                                 @endforeach
                              </div>

                              <br/><br/>
                                    @if ($Purchasedatas['extracosts'])
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
                                          @foreach ($Purchasedatas['extracosts'] as $index => $extracosts)
                                             @if ($extracosts['purchase_id'] == $Purchasedatas['id'])
                                             <div class="col-md-1"></div>
                                             <div class="col-md-5 border">
                                                <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">{{ $extracosts['purchase_extracostnote'] }}</span>
                                             </div>
                                             <div class="col-md-5 border">
                                                <span style="vertical-align: inherit;vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;line-height: 35px; ">₹ {{ $extracosts['purchase_extracost'] }}</span>
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
                                                   Discount Type <span><strong> {{ $Purchasedatas['purchase_discounttype'] }}</strong></span>
                                                </p>

                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Discount <span><strong> {{ $Purchasedatas['purchase_discount'] }}</strong> </span>
                                                </p>

                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Tax Percentage <span><strong> {{ $Purchasedatas['purchase_taxpercentage'] }} %</strong></span>
                                                </p>

                                                <p class="text-start invoice-details" style="color:#000;">
                                                   Note <span><strong> {{ $Purchasedatas['purchase_addon_note'] }}</strong></span>
                                                </p>
                                          </div>
                                       </div>
                                    </div>

                                    <div class="col-xl-6 col-lg-12">
                                       <div class="invoice-total-card  form-group-bank">
                                          <div class="invoice-total-box">
                                             <div class="invoice-total-inner">
                                                <p>Gross Amount <span>₹ {{ $Purchasedatas['purchase_subtotal'] }}</span></p>
                                                <p>Tax Amount <span>₹ {{ $Purchasedatas['purchase_taxamount'] }}</span></p>
                                                <p>Total <span>₹ {{ $Purchasedatas['purchase_totalamount'] }}</span></p>
                                                <p>Discount<span>₹ {{ $Purchasedatas['purchase_discountprice'] }}</span></p>
                                                <p>Overall<span>₹ {{ $Purchasedatas['overall'] }}</span></p>
                                                <p>Extra Cost <span>₹ {{ $Purchasedatas['purchase_extracostamount'] }}</span></p>
                                                <p style="color: #0d6efd;">Grand Total <span style="color: #0d6efd;">₹ {{ $Purchasedatas['purchase_grandtotal'] }}</span></p>
                                                <p style="color:green">Paid Amount <span style="color:green">₹ {{ $Purchasedatas['purchase_paidamount'] }}</span></p>
                                                <p style="color:red">Balance Amount <span style="color:red">₹ {{ $Purchasedatas['purchase_balanceamount'] }}</span></p>
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