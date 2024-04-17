

<?php $__env->startSection('categories', 'active'); ?>

<?php $__env->startSection('content'); ?>
    <div class="section">
        <!-- container -->
        <div class="container">
            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <form action="">

                        <div class="aside">
                            <h3 class="aside-title">Brand</h3>
                            <div class="checkbox-filter">
                                <?php echo csrf_field(); ?>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="input-checkbox">
                                        <input type="checkbox" name="brand" id="<?php echo e($brand->id); ?>"
                                            value="<?php echo e($brand->id); ?>">
                                        <label for="<?php echo e($brand->id); ?>">
                                            <span></span>
                                            <?php echo e($brand->name); ?>

                                        </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                        <!-- /aside Widget -->
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Price</h3>
                            <div class="price-filter">
                                
                                <div class="input-number price-min">
                                    <span class="input-label">From:</span>
                                    <input id="price-min" type="number" name="min_price" value="0" min="0">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <span class="input-label">To:</span>
                                    <input id="price-max" type="number" name="max_price">
                                    <!-- Change the 'max' attribute to your desired maximum value -->
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>

                        <br>
                        <button class="primary-btn"> search </button>
                    </form>

                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="<?php echo e(url('/images/product/' . ($product->images[0]->product_picture ?? 'defult.jpg'))); ?>"
                                            alt="" style="width: 100%; height: 170px;">
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category"><?php echo e($product->category->name); ?></p>
                                        <p class="product-category"><?php echo e($product->brand->name ?? 'No Brand'); ?></p>
                                        <h3 class="product-name"><a
                                                href="<?php echo e(route('shop.product.show', $product->id)); ?>"><?php echo e($product->product_name); ?></a>
                                        </h3>
                                        <h4 class="product-price"><?php echo e($product->product_price); ?>$</h4>
                                    </div>
                                    <div class="add-to-cart">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <form method="POST" action="<?php echo e(route('addToCart', $product->id)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="number" name="quantity" hidden value="1">
                                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Add
                                                        to Cart</button>
                                                </form>
                                            </div>
                                            <?php if($wishlistItem = Auth::user()->wishlist->where('product_id', $product->id)->first()): ?>
                                                <div class="col-md-3">
                                                    <form method="POST"
                                                        action="<?php echo e(route('wishlist.destroy', $wishlistItem->id)); ?>">
                                                        <?php echo method_field('DELETE'); ?>
                                                        <?php echo csrf_field(); ?>
                                                        <button type="submit" class="btn"><i class="fa fa-heart"
                                                                style="color: #D10024;"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-md-3">
                                                    <form method="POST" action="<?php echo e(route('wishlist.store')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="text" name="wishlist" hidden
                                                            value="<?php echo e($product->id); ?>">
                                                        <button type="submit" class="btn">
                                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h3>Nothing to Show...</h3>
                        <?php endif; ?>
                        <!-- /product -->
                    </div>
                    <!-- /store products -->


                    <!-- /store bottom filter -->
                </div>

                <div class="pagination-right">
                    <?php echo e($products->withQueryString()->links()); ?>

                </div>
                <!-- /STORE -->

            </div>

            <!-- /row -->
        </div>


        <!-- /container -->
    </div>
    <!-- /SECTION -->

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/frontend/shop/show.blade.php ENDPATH**/ ?>