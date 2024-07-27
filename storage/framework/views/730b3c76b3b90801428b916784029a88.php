<?php $__env->startSection('title', 'show Category'); ?>

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
                <img src="<?php echo e(url('images/category/' . $category->picture)); ?>" class="product-image" alt="Product Image">
            </div>

            <hr>
            <br>
            <br>
            <div class="col-12">
                <h2>Category Description</h2>
                <h6><?php echo e($category->title); ?></h6>
            </div>

        </div>
        <div class="col-12 col-sm-6">
            <h1 class="my-3">#<?php echo e($category->id); ?></h1>
            <hr>

            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Category Name
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($category->name); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Created_at
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($category->created_at); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Updated_at
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($category->updated_at); ?></small>
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

<?php echo $__env->make('backend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/backend/categoties/show.blade.php ENDPATH**/ ?>