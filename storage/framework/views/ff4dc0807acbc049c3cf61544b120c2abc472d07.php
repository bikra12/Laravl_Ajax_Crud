
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="" method="post" id="add_ProductForm">
    <?php echo csrf_field(); ?>
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="errMsgContainer">

            </div>
            <div class="form-group">
                <label for="name">product name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="name">product price</label>
                <input type="text" class="form-control" name="price" id="price">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary  add_product ">Save Product</button>
          </div>
        </div>
      </div>
  </form>
  </div><?php /**PATH C:\xampp\htdocs\ajax_crud\resources\views/add_product_modal.blade.php ENDPATH**/ ?>