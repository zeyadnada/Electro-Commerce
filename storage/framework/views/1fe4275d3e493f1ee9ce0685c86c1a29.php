

<?php $__env->startSection('title', 'All Coupons'); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('search'); ?>
    <form action="<?php echo e(route('search')); ?>" method="GET">
        <div class="input-group">
            <input type="hidden" name="search_section" value="coupon">
            <select name="search_by" class="form-select form-select-sm" style="max-width: 140px" aria-label="Dropdown">
                <option value="code">coupon code</option>
                <option value="type">coupon Type</option>
            </select>
            <input type="text" class="form-control" placeholder="Search" name="search_for">
            <button name="submit" type="submit" class="btn btn-warning">Search</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Coupone Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Percent_of</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($coupon->id); ?></td>
                            <td><?php echo e($coupon->code); ?></td>
                            <td><?php echo e($coupon->type); ?></td>
                            <td><?php echo e($coupon->value); ?></td>
                            <td><?php echo e($coupon->percent_of); ?></td>
                            <td><?php echo e($coupon->created_at); ?></td>
                            <td>

                                <a href="<?php echo e(route('coupon.edit', $coupon->id)); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?php echo e(route('coupon.destroy', $coupon->id)); ?>" method="post" class="d-inline">
                                    <?php echo method_field('DELETE'); ?>
                                    <?php echo csrf_field(); ?>
                                    <button class=" btn btn-danger"> Delete </button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h3>Nothing to Show...</h3>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>




    <?php echo e($coupons->withQueryString()->links()); ?>

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

<?php echo $__env->make('backend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/backend/coupons/index.blade.php ENDPATH**/ ?>