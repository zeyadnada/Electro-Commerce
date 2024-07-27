<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <table class="table">
            <thead class="table-warning">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">QTY</th>
                    <th scope="col">SUB TOTAl</th>
                    <th scope="col">CREATED AT</th>
                    <th scope="col">UPDATED AT</th>

                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($cartItem->id); ?></td>
                        <td><?php echo e($cartItem->product->product_name); ?></td>
                        <td><?php echo e($cartItem->item_quantity); ?></td>
                        <td><?php echo e($cartItem->total_item_price); ?></td>
                        <td><?php echo e($cartItem->created_at); ?></td>
                        <td><?php echo e($cartItem->updated_at); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </tbody>
        </table>
    </div>

</body>
<?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>

</html>
<?php /**PATH C:\xampp\htdocs\electro-commerce\E-commerce-main\E-commerce-main\resources\views/frontend/cart/show.blade.php ENDPATH**/ ?>