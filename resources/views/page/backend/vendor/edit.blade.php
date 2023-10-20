<div class="modal-dialog modal-dialog-centered modal-md">
   <div class="modal-content">

      <div class="modal-header border-0 pb-0">
         <div class="form-header modal-header-title text-start mb-0">
            <h6 class="mb-0">Update Vendor</h6>
         </div>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span class="align-center" aria-hidden="true">&times;</span>
         </button>
      </div>
      <form autocomplete="off" method="POST"
                action="{{ route('vendor.edit', ['unique_key' => $vendor_data['unique_key']]) }}" enctype="multipart/form-data">
                @csrf
      <div class="modal-body">
         <div class="row">
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" placeholder="Enter Vendor Name" name="name" id="name" required value="{{ $vendor_data['name'] }}">
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Address</label>
                     <input type="text" class="form-control" placeholder="Enter Vendor Address" name="address" id="address" value="{{ $vendor_data['address'] }}">
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Phone Number<span class="text-danger">*</span></label>
                     <input type="text" class="form-control" placeholder="Enter Vendor Contact No" name="phone_number" id="phone_number" required value="{{ $vendor_data['phone_number'] }}">
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Email ID</label>
                     <input type="email" class="form-control" placeholder="Enter Vendor E-Mail" name="email_id" id="email_id" value="{{ $vendor_data['email_id'] }}">
                  </div>
               </div>
               <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                     <label>Shop Name</label>
                     <input type="text" class="form-control" placeholder="Enter Vendor Shop Name" name="shop_name" id="shop_name" value="{{ $vendor_data['shop_name'] }}">
                  </div>
               </div>
         </div>
      </div>

      <div class="modal-footer">
         <button type="submit" class="btn btn-primary" style="margin-right: 5px;">Update</button>
         <button type="button" class="btn btn-cancel btn-danger" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
      </div>
      </form>
   </div>
</div>