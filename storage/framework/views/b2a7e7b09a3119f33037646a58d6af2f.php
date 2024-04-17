<?php $__env->startSection('title', 'All Produts'); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('search'); ?>
    <form action="<?php echo e(route('search')); ?>" method="GET">
        <div class="input-group">
            <input type="hidden" name="search_section" value="product">
            <select name="search_by" class="form-select form-select-sm" style="max-width: 140px" aria-label="Dropdown">
                <option value="product_name">Product Name</option>
                <option value="product_price">Product Price</option>
                <option value="product_quantity">Product Quantity</option>
                <option value="category_id">Product Category</option>
            </select>
            <input type="text" class="form-control" placeholder="Search" name="search_for">
            <button name="submit" type="submit" class="btn btn-warning">Search</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Qty</th>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($product->id); ?></td>
                            <td><?php echo e($product->product_name); ?></td>
                            <td><?php echo e($product->product_price); ?></td>
                            <td><?php echo e($product->product_quantity); ?></td>
                            <td><?php echo e($product->category->name ?? 'Category deleted'); ?></td>
                            <td>
                                <a href="<?php echo e(route('products.show', $product->id)); ?>" class="btn btn-success">Details</a>

                                <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-warning">Edit</a>
                                <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="post"
                                    class="d-inline">
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
    <?php echo e($products->withQueryString()->links()); ?>

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

<?php echo $__env->make('backend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/backend/products/index.blade.php ENDPATH**/ ?>