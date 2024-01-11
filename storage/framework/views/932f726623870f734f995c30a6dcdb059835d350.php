
  
  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="post" id="update_ProductForm">
      <?php echo csrf_field(); ?>
      <input type="hidden" id="up_id">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="errMsgContainer">
  
              </div>
              <div class="form-group">
                  <label for="name">product name</label>
                  <input type="text" class="form-control" name="up_name" id="up_name">
              </div>
              <div class="form-group">
                  <label for="name">product price</label>
                  <input type="text" class="form-control" name="up_price" id="up_price">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary  update_product ">Update Product</button>
            </div>
          </div>
        </div>
    </form>
    </div><?php /**PATH C:\xampp\htdocs\ajax_crud\resources\views/update_product_modal.blade.php ENDPATH**/ ?>