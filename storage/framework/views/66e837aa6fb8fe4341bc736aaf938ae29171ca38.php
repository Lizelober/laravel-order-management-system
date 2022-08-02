

<?php $__env->startSection('content'); ?>
<div class="flex ...">
  <div class="mx-auto w-3/5">
  <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Edit Patient</p>
 

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

<form action="<?php echo e(route('users.edit',$user->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Surname:</strong>
                <input type="text" name="surname" value="<?php echo e($user->surname); ?>" class="form-control" placeholder="Surname">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control" placeholder="Email">
            </div>
        </div>

        <?php
        $currency_countries = DB::table('currency_countries')->get();
        foreach ($currency_countries as $country) {
        $country->currency_name;
        $country->country_name;
        }
        ?>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Country:</strong>
                <select id="currency_country_id" name="currency_countries.id" class="form-select">
                    <?php $__currentLoopData = $currency_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>" <?php if($country->id == ''): ?> selected <?php endif; ?>><?php echo e($country->country_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
<div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('users.index')); ?>"> Back</a>
        </div>
        </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-order-management-system\resources\views/users/edit.blade.php ENDPATH**/ ?>