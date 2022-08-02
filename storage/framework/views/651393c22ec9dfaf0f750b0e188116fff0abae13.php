<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>3x4 GENETICS</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
    <!--START   ADDED FROM layouts/app.blade.php-->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <!--END   ADDED FROM layouts/app.blade.php-->
    <style>
        #footer {
            position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/
            height: 40px;
            background: grey;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">3x4 GENETICS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('orders.index')); ?>">Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('patients.index')); ?>">Patients</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('products.index')); ?>">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('shop')); ?>">Shop</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit"><a href="<?php echo e(route('carts.index')); ?>">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo e(count((array) session('cartItems'))); ?></span></a>
                </button>
            </form>
        </div>
    </div>
</nav>

<body class="bg-gray-200 h-screen antialiased leading-none font-sans">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 main-section">
                <div class="dropdown">
                    <div class="dropdown-menu">
                        <div class="row total-header-section">
                            <?php $total = 0 ?>
                            <?php $__currentLoopData = (array) session('cartItems'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php $total += $values['Price'] * $values['quantity'] * $values['exchange_rate']  ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                <p>Total: <span class="text-info">$ <?php echo e($total); ?></span></p>
                            </div>
                        </div>
                        <?php if(session('cartItems')): ?>
                        <?php $__currentLoopData = session('cartItems'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row cart-detail">
                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                <img src="<?php echo e($values['image']); ?>" />
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                <p><?php echo e($values['product_name']); ?></p>
                                <span class="price text-info"> <?php echo e($values['currency_sign']); ?> <?php echo e($values['Price'] * $values['exchange_rate']); ?></span> <span class="count">Quantity:<?php echo e($values['quantity']); ?></span>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="<?php echo e(route('carts.index')); ?>" class="btn btn-primary btn-block">View all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br />
    <div class="container">

        <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>

<footer>
    <div id="footer">Copyright &copy; Your Website 2022
    </div>
</footer>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

</html><?php /**PATH C:\xampp\htdocs\laravel-order-management-system\resources\views/carts/layout.blade.php ENDPATH**/ ?>