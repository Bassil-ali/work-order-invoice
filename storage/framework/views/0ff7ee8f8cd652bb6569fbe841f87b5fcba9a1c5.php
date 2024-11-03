<!--admingroups_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?php echo e(App\Models\AdminGroup::count()); ?></h3>
        <p><?php echo e(trans('admin.admingroups')); ?></p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="<?php echo e(aurl('admingroups')); ?>" class="small-box-footer"><?php echo e(trans('admin.admingroups')); ?> <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<!--admingroups_end-->
<!--admins_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?php echo e(App\Models\Admin::count()); ?></h3>
        <p><?php echo e(trans('admin.admins')); ?></p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="<?php echo e(aurl('admins')); ?>" class="small-box-footer"><?php echo e(trans('admin.admins')); ?> <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
<!--admins_end-->



<!--userrole_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3><?php echo e(mK(App\Models\UserRole::count())); ?></h3>
        <p><?php echo e(trans("admin.userrole")); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-icons"></i>
      </div>
      <a href="<?php echo e(aurl("userrole")); ?>" class="small-box-footer"><?php echo e(trans("admin.userrole")); ?> <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--userrole_end-->

<!--joborders_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3><?php echo e(mK(App\Models\jobOrder::count())); ?></h3>
        <p><?php echo e(trans("admin.joborders")); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-file-invoice"></i>
      </div>
      <a href="<?php echo e(aurl("joborders")); ?>" class="small-box-footer"><?php echo e(trans("admin.joborders")); ?> <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--joborders_end-->
<!--bookfiles_start-->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3><?php echo e(mK(App\Models\BookFiles::count())); ?></h3>
        <p><?php echo e(trans("admin.bookfiles")); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-file-alt"></i>
      </div>
      <a href="<?php echo e(aurl("bookfiles")); ?>" class="small-box-footer"><?php echo e(trans("admin.bookfiles")); ?> <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!--bookfiles_end-->
<?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/layouts/statistics/module_counters.blade.php ENDPATH**/ ?>