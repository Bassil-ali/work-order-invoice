  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand
 <?php echo e(!empty(setting()->theme_setting) &&
    !empty(setting()->theme_setting->navbar)?
    setting()->theme_setting->navbar:'navbar-dark'); ?>

<?php echo e(!empty(setting()->theme_setting) &&
   !empty(setting()->theme_setting->main_header)?
    setting()->theme_setting->main_header:''); ?>

    ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(aurl('logout')); ?>" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i> <?php echo e(trans('admin.logout')); ?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo e(aurl('lock/screen')); ?>?email=<?php echo e(admin()->user()->email); ?>" class="nav-link"><i class="nav-icon fa fa-user-lock"></i> <?php echo e(trans('admin.lock_screen')); ?></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    


    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <?php if(count(L::all()) > 0): ?>
       <!-- Language Dropdown Menu -->
      <li class="nav-item  dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-language"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg  languages <?php echo e(app('l') == 'ar'?'dropdown-menu-right':'dropdown-menu-left'); ?>">
          <?php $__currentLoopData = L::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($l != 'fr'): ?>
         <a href="<?php echo e(aurl('lang/'.$l)); ?>" class="dropdown-item">
         <i class="fas fa-language"></i> <?php echo e(trans('admin.'.$l)); ?> </a>
         <?php endif; ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </li>
      <!-- Language Dropdown Menu End-->
      <?php endif; ?>
  
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- /.navbar -->
<!-- Main Sidebar Menu Container -->
<aside class="main-sidebar <?php echo e(!empty(setting()->theme_setting) && !empty(setting()->theme_setting->sidebar_class)?setting()->theme_setting->sidebar_class:'sidebar-dark-primary'); ?> elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo e(aurl('/')); ?>" class="brand-link <?php echo e(!empty(setting()->theme_setting) && !empty(setting()->theme_setting->brand_color)?setting()->theme_setting->brand_color:''); ?>">
    <?php if(!empty(setting()->logo)): ?>
    <img src="<?php echo e(it()->url(setting()->logo)); ?>" alt="<?php echo e(setting()->{l('sitename')}); ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
    <?php endif; ?>
    <span class="brand-text font-weight-light"><?php echo e(setting()->{l('sitename')}); ?></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <?php if(!empty(admin()->user()->photo_profile)): ?>
        <img src="<?php echo e(it()->url(admin()->user()->photo_profile)); ?>" class="img-circle elevation-2" alt="<?php echo e(admin()->user()->name); ?>">
        <?php else: ?>
        <img src="<?php echo e(url('assets')); ?>/img/avatar5.png" class="img-circle elevation-2" alt="<?php echo e(admin()->user()->name); ?>">
        <?php endif; ?>
      </div>
      <div class="info">
        <a href="<?php echo e(aurl('account')); ?>" class="d-block"><?php echo e(admin()->user()->name); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/layouts/navbar.blade.php ENDPATH**/ ?>