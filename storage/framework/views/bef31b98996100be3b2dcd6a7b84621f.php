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
                        <br>
                        <h1 class="card-title">NAME: <?php echo e(Auth::user()->name); ?></h1>
                        <hr>
                        <h3 class="card-title">PHONE: <?php echo e(Auth::user()->phone); ?></h3>
                        <h3 class="card-title">EMAIL: <?php echo e(Auth::user()->email); ?></h3>
                        <hr>
                        <h4 class="card-title">CREATED AT: <?php echo e(Auth::user()->created_at); ?></h4>
                        <h4 class="card-title">UPDATED AT: <?php echo e(Auth::user()->updated_at); ?></h4>
                        <hr>
                        <a class="btn btn-success" href="<?php echo e(route('profile.edit', Auth::user()->id)); ?>">EDIT</a>
                        <form action="<?php echo e(route('profile.destroy', Auth::user()->id)); ?>" method="post" class="d-inline"
                            style="display:inline-block">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <button class=" btn btn-danger"> Delete Account </button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.parent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/frontend/profile/index.blade.php ENDPATH**/ ?>