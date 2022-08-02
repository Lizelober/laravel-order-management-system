 <?php $__env->startSection('content'); ?>

<div class="flex ...">
  <div class="mx-auto w-3/5">
    <p class="text-xl text-gray-800 font-bold pt-12 mb-8">Products</p>

    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
      <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>

    <table class="table table-hover">
      <tr>
        <th>No</th>
        <th>Image</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Action</th>
        <th></th>
      </tr>
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e(++$i); ?></td>
        <td><img src="<?php echo e(Storage::url($product->image)); ?>" height="75" width="75" alt="" /></td>
        <td><?php echo e($product->product_name); ?></td>
        <td><?php echo e($product->product_price_rand); ?></td>

        <td>
          <form
            action="<?php echo e(route('products.destroy',$product->id)); ?>"
            method="POST"
          >
            <a
              class="btn btn-info"
              href="<?php echo e(route('products.show',$product->id)); ?>"
              >Show</a
            >

            <a
              class="btn btn-primary"
              href="<?php echo e(route('products.edit',$product->id)); ?>"
              >Edit</a
            >

            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>

            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <?php echo $products->links(); ?>


    <div class="pull-right">
      <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>">
        Create New Product</a
      >
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('products.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-order-management-system\resources\views/products/index.blade.php ENDPATH**/ ?>