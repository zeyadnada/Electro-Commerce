<?php $__env->startSection('title', 'My Profile'); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card mb-3 my-5 mx-3">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="<?php echo e(url('images/profile/' . Auth::user()->avatar)); ?>" class="img-fluid rounded-start"
                        alt="Profile Picture" style="max-height: 400px;">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h1>NAME: <?php echo e(Auth::user()->name); ?></h1>
                        <hr>
                        <h3>PHONE: <?php echo e(Auth::user()->phone); ?></h3>

                        <h3>EMAIL: <?php echo e(Auth::user()->email); ?></h3>
                        <hr>
                        <h4>CREATED AT: <?php echo e(Auth::user()->created_at); ?></h4>
                        <h4>UPDATED AT: <?php echo e(Auth::user()->updated_at); ?></h4>
                    </div>

                    <a class="btn btn-success" href="<?php echo e(route('profile.edit', Auth::user()->id)); ?>">EDIT</a>
                    <form action="<?php echo e(route('profile.destroy', Auth::user()->id)); ?>" method="post" class="d-inline">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <button class=" btn btn-danger"> Delete </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo e(url('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(url('plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/backend/profile/index.blade.php ENDPATH**/ ?>