

<?php $__env->startSection('content'); ?>
<div class="mx-auto w-4/5">
    <p class="text-5xl text-gray-800 font-bold pt-12 mb-8">Add New Order</p>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <form action="<?php echo e(route('shop')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <p class="text-3xl text-gray-800 font-bold pt-12 mb-8">Existing patient?</p>
            <label for="exampleInputEmail1"><strong>Select Patient's' Email Address:</strong></label>
            <select id="exampleFormControlSelect1" name="patient.id" class="form-control">
                <option value="">select email</option>
                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($patient->id); ?>" <?php if($patient->id == ''): ?> selected <?php endif; ?>><?php echo e($patient->email); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                @endphp
            </select>
        </div>

        <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <a class="btn btn-primary" href="<?php echo e(route('shop')); ?>">Continue</a>
            </div>
        </div>
    </form>
    <div>
        <p class="text-3xl text-gray-800 font-bold pt-12 mb-8">If not, please add a new patient:</p>
        <a class="btn btn-primary" href="<?php echo e(route('patients.create')); ?>">Add a New Patient</a>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
        <a class="btn btn-primary" href="<?php echo e(route('orders.index')); ?>">Back</a>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('orders.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-order-management-system\resources\views/orders/getPatient.blade.php ENDPATH**/ ?>