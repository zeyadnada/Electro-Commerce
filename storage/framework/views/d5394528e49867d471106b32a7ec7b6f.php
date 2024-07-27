

<?php $__env->startSection('title', 'My Orders'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Order Status</th>
                            <th>Payment Methd</th>
                            <th>Payment Status </th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($order->id); ?></td>
                                <td><?php echo e($order->order_status); ?></td>
                                <td><?php echo e($order->payment_method); ?></td>
                                <td><?php echo e($order->payment_status); ?></td>
                                <td>$<?php echo e($order->total_price); ?></td>
                                <td><?php echo e($order->created_at->diffForHumans()); ?></td>

                                <td>
                                    <a href="<?php echo e(route('my-orders.order', $order->id)); ?>" class="btn btn-success">Detail</a>

                                    <?php if(
                                        ($order->order_status == 'Pending' || $order->order_status == 'Processing') &&
                                            $order->payment_method == 'cash_on_delivery'): ?>
                                        <form method="POST" action="<?php echo e(route('my-orders.cancel', $order->id)); ?>"
                                            style="display: inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button type="submit" class="btn btn-danger">Cancel Order</button>
                                        </form>
                                    <?php endif; ?>
                                </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h3>Nothing to Show...</h3>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <?php echo e($orders->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/frontend/profile/orders/index.blade.php ENDPATH**/ ?>