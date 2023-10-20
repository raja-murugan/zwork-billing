<div class="modal-dialog modal-dialog-centered modal-m">
   <div class="modal-content">
         <div class="modal-header border-0 pb-0">
            <div class="form-header modal-header-title text-start mb-0">
               <h6 class="mb-0">Update Addon Details</h6>
            </div>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span class="align-center" aria-hidden="true">&times;</span>
            </button>
         </div>

         <form autocomplete="off" method="POST"
                action="{{ route('addon.edit', ['unique_key' => $addon_data->unique_key]) }}" enctype="multipart/form-data">
                @csrf

            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12 col-md-12">
                     <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ $addon_data->name }}">
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