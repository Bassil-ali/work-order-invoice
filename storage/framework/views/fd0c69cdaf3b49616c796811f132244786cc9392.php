<!DOCTYPE html>
<html lang="<?php echo e(app('l')); ?>" >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e(trans('admin.login_page')); ?></title>
        <!-- Google Font: Source Sans Pro -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Bootstrap 4 RTL -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
        <!-- Custom style for RTL -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/css/adminlte.min.css">
        <?php if(!empty(setting()->icon)): ?>
        <link rel="shortcut icon" href="<?php echo e(it()->url(setting()->icon)); ?>" />
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo e(url('assets')); ?>/css/cairo.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="<?php echo e(aurl('login')); ?>" class="h1">
                        <?php if(!empty(setting()->logo)): ?>
                        <img src="<?php echo e(it()->url(setting()->logo)); ?>" alt="<?php echo e(setting()->{l('sitename')}); ?>" style="width:48px;height: 48px" />
                        <?php else: ?>
                        <?php echo e(setting()->{l('sitename')}); ?>

                        <?php endif; ?>
                    </a>
                    <hr />
                    <?php if(session()->has('error')): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h6><i class="icon fas fa-exclamation-triangle"></i> <?php echo e(trans('admin.alert')); ?>!</h6>
                        <?php echo e(session('error')); ?>

                    </div>
                    <?php else: ?>
                    <span> <?php echo e(trans('admin.enter_email_and_password')); ?> </span>
                    <?php endif; ?>

                     <?php if(session()->has('success')): ?>

                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h6><i class="icon fas fa-check"></i> <?php echo e(trans('admin.success')); ?></h6>
                        <?php echo e(session('success')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <p class="login-box-msg"><?php echo e(trans('admin.login_page')); ?></p>
                    <form method="post">
                        <?php echo view('honeypot::honeypotFormFields'); ?>
                        <?php echo csrf_field(); ?>

                        <div class="input-group mb-3" dir="<?php echo e(app('dir')); ?>">
                            <input type="email" name="email" class="form-control" placeholder="<?php echo e(trans('admin.email')); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3" dir="<?php echo e(app('dir')); ?>">
                            <input type="password" class="form-control" name="password" placeholder="<?php echo e(trans('admin.password')); ?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember" name="rememberme" value="1" >
                                    <label for="remember"><?php echo e(trans('admin.rememberme')); ?></label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-dark btn-block btn-flat">
                                <i class="fas fa-sign-in-alt"></i>
                                <?php echo e(trans('admin.login')); ?>

                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    
                    <!-- /.social-auth-links -->
                    <br/>
                    <p class="mb-1" dir="<?php echo e(app('dir')); ?>">
                        <a href="<?php echo e(aurl('forgot/password')); ?>"><?php echo e(trans('admin.forgot_password')); ?></a>
                    </p>
                    <?php if(count(L::all()) > 0): ?>
                    <hr />
                    <center>
                    <?php
                    $i = 0;
                    ?>
                    <?php $__currentLoopData = L::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a style="color:<?php echo e(app('l') == $lang?'#c33':'#343a40'); ?>" href="<?php echo e(aurl('lang/'.$lang)); ?>"><?php echo e(trans('admin.'.$lang)); ?></a>
                    <?php
                    $i++;
                    ?>
                    <?php echo e($i < count(L::all()) ?'.':''); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </center>
                    <?php endif; ?>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery -->
        <script src="<?php echo e(url('assets')); ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo e(url('assets')); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo e(url('assets')); ?>/js/adminlte.min.js"></script>
    </body>
</html><?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/login.blade.php ENDPATH**/ ?>