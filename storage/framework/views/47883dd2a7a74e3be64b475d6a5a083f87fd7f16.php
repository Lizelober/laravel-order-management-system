<Html>

<Head>
    <title> File Upload </title>
</Head>

<Body>
    <form method="Post" action="<?php echo e(route('forms.store')); ?>">
        <?php echo csrf_field(); ?>
        <div><label for="Name">Name</label>
            <input type="text" name="username">
        </div><br />
        <div><button type="submit">Submit </button></div>
    </form>
</body><?php /**PATH C:\xampp\htdocs\laravel-order-management-system\resources\views/form.blade.php ENDPATH**/ ?>