
<?php $__env->startSection('content'); ?>
    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <section class="categories_content">
                <br>
                <div class="head-title">
                    <h3>Here is Your Wishlist.</h3>
                </div>
                <div class="cards">

                    <?php $__empty_1 = true; $__currentLoopData = $wishlist_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                                <div class="product-img">
                                    <img src="<?php echo e(url('/images/product/' . ($wishlist_product->product->images[0]->product_picture ?? 'defult.jpg'))); ?>"
                                        alt="" style="width: 100%; height: 170px;">
                                </div>
                                <div class="product-body">
                                    <p class="product-category"><?php echo e($wishlist_product->product->category->name); ?></p>
                                    <p class="product-category"><?php echo e($wishlist_product->product->brand->name ?? 'No Brand'); ?>

                                    </p>
                                    <h3 class="product-name"><a
                                            href="<?php echo e(route('shop.product.show', $wishlist_product->product->id)); ?>"><?php echo e($wishlist_product->product->product_name); ?></a>
                                    </h3>
                                    <h4 class="product-price"><?php echo e($wishlist_product->product->product_price); ?>$</h4>
                                </div>
                                <div class="add-to-cart">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <form method="POST"
                                                action="<?php echo e(route('addToCart', $wishlist_product->product->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="number" name="quantity" hidden value="1">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Add
                                                    to Cart</button>
                                            </form>
                                        </div>
                                        <div class="col-md-3">
                                            <form method="POST"
                                                action="<?php echo e(route('wishlist.destroy', $wishlist_product->id)); ?>">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn"><i class="fa fa-heart"
                                                        style="color: #D10024;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h3>Nothing in Your Wishlist...</h3>
                    <?php endif; ?>

                </div>

            </section>
        </div>
    </div>

    <?php echo e($wishlist_products->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/frontend/profile/wishlist/index.blade.php ENDPATH**/ ?>