<?php $__env->startSection('shop', 'active'); ?>
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

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top Selling</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    <?php $__currentLoopData = $top_selling_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top_selling_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($top_selling_product->product): ?>
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="<?php echo e(url('/images/product/' . ($top_selling_product->product->images[0]->product_picture ?? 'defult.jpg'))); ?>"
                                                        alt="" style="width: 100%; height: 170px;">
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category">
                                                        <?php echo e($top_selling_product->product->category->name); ?></p>
                                                    <p class="product-category">
                                                        <?php echo e($top_selling_product->product->brand->name ?? 'No Brand'); ?></p>
                                                    <h3 class="product-name"><a
                                                            href="<?php echo e(route('shop.product.show', $top_selling_product->product_id)); ?>"><?php echo e($top_selling_product->product->product_name); ?></a>
                                                    </h3>
                                                    <h4 class="product-price">
                                                        <?php echo e($top_selling_product->product->product_price); ?>$</h4>
                                                </div>
                                                <div class="add-to-cart">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <form method="POST"
                                                                action="<?php echo e(route('addToCart', $top_selling_product->product_id)); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="number" name="quantity" hidden value="1">
                                                                <button class="add-to-cart-btn"><i
                                                                        class="fa fa-shopping-cart"></i> Add
                                                                    to Cart</button>
                                                            </form>
                                                        </div>
                                                        <?php if($wishlistItem = Auth::user()->wishlist->where('product_id', $top_selling_product->product_id)->first()): ?>
                                                            <div class="col-md-3">
                                                                <form method="POST"
                                                                    action="<?php echo e(route('wishlist.destroy', $wishlistItem->id)); ?>">
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <?php echo csrf_field(); ?>
                                                                    <button type="submit" class="btn"><i
                                                                            class="fa fa-heart" style="color: #D10024;"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="col-md-3">
                                                                <form method="POST" action="<?php echo e(route('wishlist.store')); ?>">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="text" name="wishlist" hidden
                                                                        value="<?php echo e($top_selling_product->product_id); ?>">
                                                                    <button type="submit" class="btn">
                                                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Our Categories </h3>
                    </div>
                </div>
                <!-- shop -->
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-xs-6">
                        <div class="shop">
                            <div class="shop-img">
                                <img src="<?php echo e(url('images/category/' . ($category->picture ?? 'default.jpg'))); ?>"
                                    alt="Category_pic">
                            </div>
                            <div class="shop-body">
                                <h3><?php echo e($category->name); ?></h3>
                                <a href="<?php echo e(route('shop.show', $category->id)); ?>" class="cta-btn">Shop now <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">New Products</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    <?php $__currentLoopData = $new_arrival_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_arrival_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="<?php echo e(url('/images/product/' . ($new_arrival_product->images[0]->product_picture ?? 'defult.jpg'))); ?>"
                                                    alt="" style="width: 100%; height: 170px;">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category"><?php echo e($new_arrival_product->category->name); ?></p>
                                                <p class="product-category">
                                                    <?php echo e($new_arrival_product->brand->name ?? 'No Brand'); ?></p>
                                                <h3 class="product-name"><a
                                                        href="<?php echo e(route('shop.product.show', $new_arrival_product->id)); ?>"><?php echo e($new_arrival_product->product_name); ?></a>
                                                </h3>
                                                <h4 class="product-price"><?php echo e($new_arrival_product->product_price); ?>$</h4>
                                            </div>
                                            <div class="add-to-cart">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <form method="POST"
                                                            action="<?php echo e(route('addToCart', $new_arrival_product->id)); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="number" name="quantity" hidden value="1">
                                                            <button class="add-to-cart-btn"><i
                                                                    class="fa fa-shopping-cart"></i> Add
                                                                to Cart</button>
                                                        </form>
                                                    </div>
                                                    <?php if($wishlistItem = Auth::user()->wishlist->where('product_id', $new_arrival_product->id)->first()): ?>
                                                        <div class="col-md-3">
                                                            <form method="POST"
                                                                action="<?php echo e(route('wishlist.destroy', $wishlistItem->id)); ?>">
                                                                <?php echo method_field('DELETE'); ?>
                                                                <?php echo csrf_field(); ?>
                                                                <button type="submit" class="btn"><i
                                                                        class="fa fa-heart" style="color: #D10024;"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="col-md-3">
                                                            <form method="POST" action="<?php echo e(route('wishlist.store')); ?>">
                                                                <?php echo csrf_field(); ?>
                                                                <input type="text" name="wishlist" hidden
                                                                    value="<?php echo e($new_arrival_product->id); ?>">
                                                                <button type="submit" class="btn">
                                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    

    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/frontend/shop/index.blade.php ENDPATH**/ ?>