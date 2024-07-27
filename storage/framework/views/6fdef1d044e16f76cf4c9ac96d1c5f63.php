<?php $__env->startSection('content'); ?>

    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <?php if(session('cart')): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">SubTotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = (array) session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(url('images/product/' . $details['picture'])); ?>"
                                        style="max-width: 120px; max-height: 140px; margin-right:25px"><?php echo e($details['itemName']); ?>

                                </td>
                                <td><?php echo e($details['price']); ?>$</td>
                                <td><?php echo e($details['quantity']); ?></td>
                                <td><?php echo e($details['quantity'] * $details['price']); ?>$</td>

                                <td>
                                    <form action="<?php echo e(route('cart.destroy', $id)); ?>" method="post" class="d-inline">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button class=" btn btn-danger"> Delete </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <h2 class="product-price">$<?php echo e($total); ?></h2>
                <div class="container mt-5">
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-success">Continue Shopping</a>
                        <a href="<?php echo e(route('cart.checkout.show')); ?>" class="btn btn-primary">Checkout</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <p class="mb-0">No products in cart yet.</p>
                        </div>
                        <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-primary">Go to Shop</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/frontend/cart/index.blade.php ENDPATH**/ ?>