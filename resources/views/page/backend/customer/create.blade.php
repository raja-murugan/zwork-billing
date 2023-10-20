<div class="modal-dialog modal-dialog-centered modal-md">
   <div class="modal-content">

      <div class="modal-header border-0 pb-0">
         <div class="form-header modal-header-title text-start mb-0">
            <h6 class="mb-0">Add Customer</h6>
         </div>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span class="align-center" aria-hidden="true">&times;</span>
         </button>
      </div>
      <form autocomplete="off" method="POST" action="{{ route('customer.store') }}">
      @csrf
      <div class="modal-body">
         <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" placeholder="Enter Customer Name" name="name" id="name" required>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Phone Number<span class="text-danger">*</span></label>
                     <input type="text" class="form-control customer_phoneno" placeholder="Enter Customer Contact No" name="phone_number" id="phone_number" required>
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Address</label>
                     <input type="text" class="form-control" placeholder="Enter Customer Address" name="address" id="address">
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Email ID</label>
                     <input type="email" class="form-control" placeholder="Enter Customer E-Mail" name="email_id" id="email_id">
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Old Balance</label>
                     <input type="text" class="form-control" placeholder="Enter Customer Old Balance" name="balance_amount" id="balance_amount">
                  </div>
               </div>
         </div>
      </div>

      <div class="modal-footer">
         <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Save</button>
         <button type="button" class="btn btn-cancel btn-danger" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
      </div>
      </form>
   </div>
</div>
