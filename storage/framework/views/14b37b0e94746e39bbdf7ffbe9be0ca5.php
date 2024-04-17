<?php $__env->startSection('title', 'show User'); ?>

<?php $__env->startSection('css'); ?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <?php if(session('message')): ?>
        <div class="alert alert-warning">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 col-sm-6">
            <div class="col-12">
                <img src="<?php echo e(url('images/' . $user->avatar)); ?>" class="product-image" alt="Product Image">
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <h1 class="my-3">#<?php echo e($user->id); ?></h1>
            <hr>

            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    User Name
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($user->name); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    User Phone
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($user->phone); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    User Email
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($user->email); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Is Admin
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($user->is_admin == 0 ? 'NO' : 'YES'); ?></small>
                </h4>
                <?php if($user->is_admin == 0): ?>
                    <form action="<?php echo e(route('user.update', $user->id)); ?>" method="post" class="d-inline">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <button class=" btn btn-info"> Make Admin </button>
                    </form>
                <?php elseif($user->is_admin == 1): ?>
                    <form action="<?php echo e(route('user.update', $user->id)); ?>" method="post" class="d-inline">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <button class=" btn btn-danger"> Revoke Admin </button>
                    </form>
                <?php endif; ?>

            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Created_at
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($user->created_at); ?></small>
                </h4>
            </div>
            <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                    Updated_at
                </h3>
                <h4 class="mt-0">
                    <small><?php echo e($user->updated_at); ?></small>
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

<?php echo $__env->make('backend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/backend/users/show.blade.php ENDPATH**/ ?>