

<?php $__env->startSection('content'); ?>
<div class="flex ...">
    <div class="mx-auto w-3/5">
        <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Orders</p>
        <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <tr>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Order Price</th>
                <th>Quantity</th>
                <th>Order Paid</th>
            </tr>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($order->name); ?></td>
                <td><?php echo e($order->surname); ?></td>
                <td>R<?php echo e($order->order_price); ?></td>
                <td><?php echo e($order->quantity); ?></td>
                <td><?php echo e($order->order_paid_date); ?></td>
                <td>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <button class="btn btn-success" type="submit"><a href="<?php echo e(route('orders.shop')); ?>">Add New Order</a></button>
        <!-- <button class="btn btn-success" type="submit"><a href="<?php echo e(route('shop')); ?>">Add New Order</a></button> -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-order-management-system\resources\views/index.blade.php ENDPATH**/ ?>