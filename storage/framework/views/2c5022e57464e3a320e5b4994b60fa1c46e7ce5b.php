

<p> User ID: <?php echo e(auth()->user()->id); ?> </p>
<p> User Name: <?php echo e(auth()->user()->name); ?> </p>
<p> User Email: <?php echo e(auth()->user()->email); ?> </p>
<?php echo $__env->make('patients.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-order-management-system\resources\views/patients/getuser.blade.php ENDPATH**/ ?>