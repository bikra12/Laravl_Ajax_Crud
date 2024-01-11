 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.7.1.min.js"
     integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

 <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

 
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
     integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
 </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
     integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
 </script>


 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>

 <script>
     $(document).ready(function() {
         // alert();
         $(document).on('click', '.add_product', function(e) {
             e.preventDefault();
             let name = $('#name').val();
             let price = $('#price').val();
             // console.log(name+price);

             $.ajax({
                 url: "<?php echo e(route('add.product')); ?>",
                 method: 'post',
                 data: {
                     name: name,
                     price: price
                 },
                 success: function(res) {
                     if (res.status == 'success') {
                         $('#exampleModal').modal('hide');
                         $('#add_ProductForm')[0].reset();
                         $('.table').load(location.href + ' .table');
                         
                         Command: toastr["success"]("Product Added",
                                 "success")

                             toastr.options = {
                                 "closeButton": true,
                                 "debug": false,
                                 "newestOnTop": false,
                                 "progressBar": true,
                                 "positionClass": "toast-top-right",
                                 "preventDuplicates": false,
                                 "onclick": null,
                                 "showDuration": "300",
                                 "hideDuration": "1000",
                                 "timeOut": "5000",
                                 "extendedTimeOut": "1000",
                                 "showEasing": "swing",
                                 "hideEasing": "linear",
                                 "showMethod": "fadeIn",
                                 "hideMethod": "fadeOut"
                             }
                     }
                 },
                 error: function(err) {
                     let error = err.responseJSON;
                     $.each(error.errors, function(index, value) {
                         $('.errMsgContainer').append('<span class="text-danger">' +
                             value + '</span>' + '<br>');
                     });
                 }
             });
         })
         //show product value in update form
         $(document).on('click', '.update_product_form', function() {
             let id = $(this).data('id');
             let name = $(this).data('name');
             let price = $(this).data('price');

             $('#up_id').val(id);
             $('#up_name').val(name);
             $('#up_price').val(price);

         });

         //update product
         $(document).on('click', '.update_product', function(e) {
             e.preventDefault();
             let up_id = $('#up_id').val();
             let up_name = $('#up_name').val();
             let up_price = $('#up_price').val();

             $.ajax({
                 url: "<?php echo e(route('update.product')); ?>",
                 method: 'post',
                 data: {
                     up_id: up_id,
                     up_name: up_name,
                     up_price: up_price
                 },
                 success: function(res) {
                     if (res.status == 'success') {
                         $('#updateModal').modal('hide');
                         $('#update_ProductForm')[0].reset();
                         $('.table').load(location.href + ' .table');
                         Command: toastr["success"]("Product Updated",
                                 "success")

                             toastr.options = {
                                 "closeButton": true,
                                 "debug": false,
                                 "newestOnTop": false,
                                 "progressBar": true,
                                 "positionClass": "toast-top-right",
                                 "preventDuplicates": false,
                                 "onclick": null,
                                 "showDuration": "300",
                                 "hideDuration": "1000",
                                 "timeOut": "5000",
                                 "extendedTimeOut": "1000",
                                 "showEasing": "swing",
                                 "hideEasing": "linear",
                                 "showMethod": "fadeIn",
                                 "hideMethod": "fadeOut"
                             }
                     }
                 },
                 error: function(err) {
                     let error = err.responseJSON;
                     $.each(error.errors, function(index, value) {
                         $('.errMsgContainer').append('<span class="text-danger">' +
                             value + '</span>' + '<br>');
                     });
                 }
             });
         })

         //delete product
         $(document).on('click', '.delete_product', function(e) {
             e.preventDefault();
             let product_id = $(this).data('id');
             // alert(product_id);

             if (confirm('Are you Sure to delete product ??')) {

                 $.ajax({
                     url: "<?php echo e(route('delete.product')); ?>",
                     method: 'post',
                     data: {
                         product_id: product_id,

                     },
                     success: function(res) {
                         if (res.status == 'success') {
                             $('.table').load(location.href + ' .table');

                             Command: toastr["success"]("Product Deleted",
                                 "success")

                             toastr.options = {
                                 "closeButton": true,
                                 "debug": false,
                                 "newestOnTop": false,
                                 "progressBar": true,
                                 "positionClass": "toast-top-right",
                                 "preventDuplicates": false,
                                 "onclick": null,
                                 "showDuration": "300",
                                 "hideDuration": "1000",
                                 "timeOut": "5000",
                                 "extendedTimeOut": "1000",
                                 "showEasing": "swing",
                                 "hideEasing": "linear",
                                 "showMethod": "fadeIn",
                                 "hideMethod": "fadeOut"
                             }
                         }
                     },

                 });
             }

         })

         //pagination
         $(document).on('click','.pagination a', function(e){
            e.preventDefault();
            let page =$(this).attr('href').split('page=')[1]
            product(page)

         })

         function product(page){
            $.ajax({
                // url: "/pagination/paginate-data?page=" + page,
                url: "<?php echo e(route('paginate.data')); ?>?page=" + page,

                success:function(res){
                    //
                    $('.table-data').html(res);
                }
            })
         }


         //search product
         $(document).on('keyup',function(e){
            e.preventDefault();
            let search_string =$('#search').val();
            // console.log(search_string);
            $.ajax({
                url:"<?php echo e(route('search.product')); ?>",
                method: 'GET',
                data:{ search_string:search_string},
                success:function(res){
                    $('.table-data').html(res);
                    if(res.status=='nothing_found'){
                        $('.table-data').html('<span class="text-danger">'+'Nothing Found'+'</span>');
                    }
                }
            })
         })
     });
 </script>
<?php /**PATH C:\xampp\htdocs\ajax_crud\resources\views/product_js.blade.php ENDPATH**/ ?>