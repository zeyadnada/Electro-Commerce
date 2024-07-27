

<?php $__env->startSection('title', 'My Order'); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <br>
    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fa fa-solid fa-receipt"></i> Order #<?php echo e($order->id); ?>

                                        <small style="color: rgb(210, 82, 82)" class="float-right">Date:
                                            <?php echo e($order->created_at); ?></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <strong> My Shipping Data </strong><br>
                                    Name: <?php echo e($order->shippingAddress->recipient_name); ?><br>
                                    Phone: <?php echo e($order->shippingAddress->recipient_phone); ?><br>
                                    Email: <?php echo e($order->shippingAddress->recipient_email); ?>

                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong>Shipping Address</strong><br>
                                        Address: <?php echo e($order->shippingAddress->address); ?><br>
                                        City: <?php echo e($order->shippingAddress->city); ?><br>
                                        Country: <?php echo e($order->shippingAddress->country); ?>

                                    </address>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <br>
                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">PRODUCT NAME</th>
                                                <th scope="col">QTY</th>
                                                <th scope="col">SUB TOTAl</th>
                                                <th scope="col">Belong to </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $order->cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <?php if($cartItem->product): ?>
                                                        <td><?php echo e($cartItem->product->product_name); ?></td>
                                                        <td><?php echo e($cartItem->item_quantity); ?></td>
                                                        <td>$<?php echo e($cartItem->total_item_price); ?></td>
                                                        <td><?php echo e($cartItem->product->category->name); ?>,<?php echo e($cartItem->product->brand->name ?? 'gg'); ?>

                                                        </td>
                                                    <?php else: ?>
                                                        <td>Unknown Product</td>
                                                        <td>---</td>
                                                        <td>---</td>
                                                        <td>Unknown Brand</td>
                                                    <?php endif; ?>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="color: rgb(210, 82, 82)">TOTAL:</th>
                                            <td>$<?php echo e($order->total_price); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <br>
                                    <h4 class="">Payment Methods: <?php echo e($order->payment_method); ?></h4>
                                    <br>
                                    <h4 class="">Payment status: <?php echo e($order->payment_status); ?></h4>
                                    <br>
                                    <h4>Order Status: <?php echo e($order->order_status); ?></h4>

                                </div>
                            </div>
                            <br>
                            <div>
                                <a href="<?php echo e(route('my-orders.index')); ?>" class="btn btn-success">Go To My Orders</a>
                                <a href="<?php echo e(route('main')); ?>" class="btn btn-primary">Home Page</a>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/frontend/profile/orders/show.blade.php ENDPATH**/ ?>