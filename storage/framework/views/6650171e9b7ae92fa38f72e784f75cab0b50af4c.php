 <?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><?php echo e(__("Dashboard")); ?></div>

        <div class="card-body">
          <?php if(session('status')): ?>
          <div class="alert alert-success" role="alert">
            <?php echo e(session("status")); ?>

          </div>
          <?php endif; ?>
        </div>

        <div class="card-body">
          <a
            class="nav-link"
            href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
          >
           <?php echo e(__("Add New Patient ")); ?> 
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-order-management-system\resources\views/home.blade.php ENDPATH**/ ?>