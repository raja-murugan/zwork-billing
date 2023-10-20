<div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content modal-filled bg-danger">
         <div class="modal-body">
            <div class="form-header">
               <h6 class="text-white">Delete Vendor Payment Detail</h6>
               <p class="text-white">Are you sure want to delete?</p>
            </div>
            <div class="modal-btn delete-action">
               <div class="row">
                  
                  <form autocomplete="off" method="POST" action="{{ route('vendor_payment.delete', [$PaymentDatas['unique_key']]) }}">
                     @method('PUT')
                     @csrf

                     <div class="col-6">
                        <button type="submit" class="btn btn-primary paid-continue-btn">Yes, Delete</button>
                     </div>
                  </form>
               
                  <div class="col-6">
                     <a href="#" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>