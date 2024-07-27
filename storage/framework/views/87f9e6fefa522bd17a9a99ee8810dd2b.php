<?php $__env->startSection('title', 'show product'); ?>

<?php $__env->startSection('css'); ?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="col-12">
                <?php if(count($images) > 0): ?>
                    <div class="col-12">
                        <img src="<?php echo e(url('images/product/' . $images[0]->product_picture)); ?>" class="product-image"
                            alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="product-image-thumb">
                                <img src="<?php echo e(url('images/product/' . $image->product_picture)); ?>" alt="Product Image">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="col-12">
                        <p>No image to show</p>
                    </div>
                <?php endif; ?>
            </div>

            <hr>
            <br>
            <br>
            <div class="col-12">
                <h2>Product Description</h2>
                <h6><?php echo e($product->product_description); ?></h6>
            </div>

        </div>
        <div class="col-12 col-sm-6">
            <h1 class="my-3">#<?php echo e($product->id); ?></h1>
            <hr>

            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Product Name
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($product->product_name); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Product Price
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($product->product_price); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Product Quantity
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($product->product_quantity); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Category Name
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($product->category->name?? '...'); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Brand Name
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($product->brand->name ?? '...'); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Created_at
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($product->created_at); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Updated_at
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($product->updated_at); ?></small>
                </h4>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>





<?php $__env->startSection('js'); ?>
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/backend/products/show.blade.php ENDPATH**/ ?>