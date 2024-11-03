<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
  <a href="<?php echo e(aurl('')); ?>" class="nav-link <?php echo e(active_link(null,'active')); ?>">
    <i class="nav-icon fas fa-home"></i>
    <p>
      <?php echo e(trans('admin.dashboard')); ?>

    </p>
  </a>
</li>
<?php if(admin()->user()->role('settings_show')): ?>
<li class="nav-item">
  <a href="<?php echo e(aurl('settings')); ?>" class="nav-link  <?php echo e(active_link('settings','active')); ?>">
    <i class="nav-icon fas fa-cogs"></i>
    <p>
      <?php echo e(trans('admin.settings')); ?>

    </p>
  </a>
</li>
<?php endif; ?>
<?php if(admin()->user()->role("admins_show")): ?>
<li class="nav-item <?php echo e(active_link('admins','menu-open')); ?>">
  <a href="#" class="nav-link  <?php echo e(active_link('admins','active')); ?>">
    <i class="nav-icon fas fa-users"></i>
    <p>
      <?php echo e(trans('admin.admins')); ?>

      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo e(aurl('admins')); ?>" class="nav-link <?php echo e(active_link('admins','active')); ?>">
        <i class="fas fa-users nav-icon"></i>
        <p><?php echo e(trans('admin.admins')); ?></p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(aurl('admins/create')); ?>" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p><?php echo e(trans('admin.create')); ?></p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<?php if(admin()->user()->role("admingroups_show")): ?>
<li class="nav-item <?php echo e(active_link('admingroups','menu-open')); ?>">
  <a href="#" class="nav-link  <?php echo e(active_link('admingroups','active')); ?>">
    <i class="nav-icon fas fa-users"></i>
    <p>
      <?php echo e(trans('admin.admingroups')); ?>

      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo e(aurl('admingroups')); ?>" class="nav-link <?php echo e(active_link('admingroups','active')); ?>">
        <i class="fas fa-users nav-icon"></i>
        <p><?php echo e(trans('admin.admingroups')); ?></p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(aurl('admingroups/create')); ?>" class="nav-link ">
        <i class="fas fa-plus nav-icon"></i>
        <p><?php echo e(trans('admin.create')); ?></p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>




<!--userrole_start_route-->
<?php if(admin()->user()->role("userrole_show")): ?>
<li class="nav-item <?php echo e(active_link('userrole','menu-open')); ?> ">
  <a href="#" class="nav-link <?php echo e(active_link('userrole','active')); ?>">
    <i class="nav-icon fa fa-icons"></i>
    <p>
      <?php echo e(trans('admin.userrole')); ?> 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo e(aurl('userrole')); ?>" class="nav-link  <?php echo e(active_link('userrole','active')); ?>">
        <i class="fa fa-icons nav-icon"></i>
        <p><?php echo e(trans('admin.userrole')); ?> </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(aurl('userrole/create')); ?>" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p><?php echo e(trans('admin.create')); ?> </p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<!--userrole_end_route-->



<!--joborders_start_route-->
<?php if(admin()->user()->role("joborders_show")): ?>
<li class="nav-item <?php echo e(active_link('joborders','menu-open')); ?> ">
  <a href="#" class="nav-link <?php echo e(active_link('joborders','active')); ?>">
    <i class="nav-icon fa fa-file-invoice"></i>
    <p>
      <?php echo e(trans('admin.joborders')); ?> 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo e(aurl('joborders')); ?>" class="nav-link  <?php echo e(active_link('joborders','active')); ?>">
        <i class="fa fa-file-invoice nav-icon"></i>
        <p><?php echo e(trans('admin.joborders')); ?> </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(aurl('joborders/create')); ?>" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p><?php echo e(trans('admin.create')); ?> </p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<!--joborders_end_route-->

<!--bookfiles_start_route-->
<?php if(admin()->user()->role("bookfiles_show")): ?>
<li class="nav-item <?php echo e(active_link('bookfiles','menu-open')); ?> ">
  <a href="#" class="nav-link <?php echo e(active_link('bookfiles','active')); ?>">
    <i class="nav-icon fa fa-file-alt"></i>
    <p>
      <?php echo e(trans('admin.bookfiles')); ?> 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?php echo e(aurl('bookfiles')); ?>" class="nav-link  <?php echo e(active_link('bookfiles','active')); ?>">
        <i class="fa fa-file-alt nav-icon"></i>
        <p><?php echo e(trans('admin.bookfiles')); ?> </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo e(aurl('bookfiles/create')); ?>" class="nav-link">
        <i class="fas fa-plus nav-icon"></i>
        <p><?php echo e(trans('admin.create')); ?> </p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<!--bookfiles_end_route-->


<?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/layouts/menu.blade.php ENDPATH**/ ?>