<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo e($key + 1); ?></th>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td>
                    <a href="" class="btn btn-success update_product_form" 
                        data-toggle="modal"
                        data-target="#updateModal" 
                        data-id="<?php echo e($product->id); ?>"
                        data-name="<?php echo e($product->name); ?>"
                         data-price="<?php echo e($product->price); ?>"
                         >
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>

                    <a href="" 
                    class="btn btn-danger delete_product" 
                    data-id="<?php echo e($product->id); ?>"
                    >
                    <i class="fa fa-trash"
                            aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo $products->links(); ?><?php /**PATH C:\xampp\htdocs\ajax_crud\resources\views/pagination_products.blade.php ENDPATH**/ ?>