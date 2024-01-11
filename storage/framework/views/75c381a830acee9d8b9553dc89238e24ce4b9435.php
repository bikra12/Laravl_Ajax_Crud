<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">



    <title>Ajax_crud</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-5 text-center">laravel 9 ajax_crud</h2>
                <a href="" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">Add
                    product</a>
<input type="text" name="search" id="search" class="mb-3 form-control" placeholder="search here....">
                
                <div class="table-data">
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
                    <?php echo $products->links(); ?>

                </div>
            </div>

        </div>
    </div>

    <?php echo $__env->make('add_product_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('update_product_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('product_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo Toastr::message(); ?>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\ajax_crud\resources\views/products.blade.php ENDPATH**/ ?>