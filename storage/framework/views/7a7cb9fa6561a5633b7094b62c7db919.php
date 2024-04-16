

<?php $__env->startSection('title', 'Show Order'); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        Automatic email notifications will be sent to the customer when the order status changes to
                        'processing' or 'shipped'.
                    </div>


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
                                <strong> Personal Shipping Data .</strong><br>
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
                                            <th scope="col">Product ID</th>
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
                                                    <td><?php echo e($cartItem->product->id); ?></td>
                                                    <td><?php echo e($cartItem->product->product_name); ?></td>
                                                    <td><?php echo e($cartItem->item_quantity); ?></td>
                                                    <td>$<?php echo e($cartItem->total_item_price); ?></td>
                                                    <td><?php echo e($cartItem->product->category->name); ?>,<?php echo e($cartItem->product->brand->name ?? 'NB'); ?>

                                                    </td>
                                                <?php else: ?>
                                                    <td>---</td>
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

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                                <h4>Order Status:<?php echo e($order->order_status); ?></h4>
                                <br>
                                <h4 class="">Payment Methods: <?php echo e($order->payment_method); ?></h4>
                                
                                <br>
                                <h4 class="">Payment status: <?php echo e($order->payment_status); ?></h4>
                                <br>

                            </div>
                            <!-- /.col -->
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
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->



                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Change Statuses
                        </button>
                    </div>
                    <!-- /.invoice -->

                </div><!-- /.col -->

            </div><!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CHANGE ORDER STATUESES</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="<?php echo e(route('orders.update', $order->id)); ?>" method="post">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?> <div class="form-group">
                            <label for="order_status" class="col-form-label">Order Status: </label>
                            <select name="order_status" id="order_status" class="form-control">
                                <?php $__currentLoopData = $order_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($order->order_status == $status ? 'selected' : ''); ?>

                                        value="<?php echo e($status); ?>"><?php echo e($status); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="payment_status" class="col-form-label">Payment Status:</label>
                            <select name="payment_status" id="payment_status" class="form-control">
                                <?php $__currentLoopData = $payment_statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($order->payment_status == $status ? 'selected' : ''); ?>

                                        value="<?php echo e($status); ?>"><?php echo e($status); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>

                        <?php if($order->order_status == 'Pending'): ?>
                            <div class="form-group">
                                <label for="expected_processing_time">Expected Processing Time:</label>
                                <input type="date" class="form-control" name="expected_processing_time"
                                     id="expected_processing_time">
                            </div>
                            <div class="form-group">
                                <label for="shipping_price">Shipping Price:</label>
                                <input type="number" class="form-control" name="shipping_price" 
                                    id="shipping_price">
                            </div>
                        <?php endif; ?>

                        <?php if($order->order_status == 'Processing'): ?>
                            <div class="form-group">
                                <label for="expected_shipping_time">Expected Shipping Time:</label>
                                <input type="date" class="form-control" name="expected_shipping_time"
                                     id="expected_shipping_time">
                            </div>
                        <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>

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

<?php echo $__env->make('backend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/backend/orders/show.blade.php ENDPATH**/ ?>