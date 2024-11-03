
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- Main Sidebar Menu Container -->




<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                  <ol class="breadcrumb <?php echo e(app('l') == 'ar'?'float-sm-right':'float-sm-left'); ?>">
                    <?php if(!empty(request()->segment(2))): ?>
                    <li class="breadcrumb-item"><a href="<?php echo e(aurl('/')); ?>"><?php echo e(trans('admin.dashboard')); ?></a></li>
                    <li class="breadcrumb-item active"><a href="<?php echo e(aurl(request()->segment(2))); ?>"><?php echo e(trans('admin.'.request()->segment(2))); ?></a></li>
                    <?php endif; ?>
                  </ol>
                  </div><!-- /.col -->
              <div class="col-sm-12">
                <h1 class="m-0"><?php echo e(!empty($title)?$title:''); ?></h1>
                </div><!-- /.col -->

                  </div><!-- /.row -->
                  </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">

<?php $__env->startPush('js'); ?>
<script type="text/javascript">
$(document).ready(function(){
 const Sweet = Swal.mixin({
      //input: 'text',
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 10000,
      timerProgressBar: true,
    });

    <?php if(session()->has('error')): ?>
      Sweet.fire({
        icon: 'error',
        type: 'error',
        title: ' <?php echo e(trans('admin.alert')); ?> :',
        text: ' <?php echo e(session('error')); ?> '
      });
    <?php endif; ?>

    <?php if(session()->has('success')): ?>
      Sweet.fire({
        icon: 'success',
        type: 'success',
        title: ' <?php echo e(trans('admin.success')); ?> :',
        text: ' <?php echo e(session('success')); ?> '
      });
    <?php endif; ?>
});
</script>
<?php $__env->stopPush(); ?>

                   

<?php if(count($errors->all()) > 0): ?>
<div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h6><i class="icon fas fa-exclamation-triangle"></i> <?php echo e(trans('admin.alert')); ?>!</h6>
 <ol>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </ol>
</div>
<?php endif; ?><?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/layouts/messages.blade.php ENDPATH**/ ?>