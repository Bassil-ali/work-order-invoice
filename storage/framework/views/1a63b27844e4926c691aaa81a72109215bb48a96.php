<?php $__env->startSection('content'); ?>
<div class="row">
  <section class="col-lg-12 connectedSortable">
    <div class="card" item_name="statistics">
      <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">
        <i class="fas fa-calculator mr-1"></i>
        Statistics
        </h3>
        </div><!-- /.card-header -->
          <div class="card-body">
            <div class="row">
          <?php echo $__env->make('admin.layouts.statistics.module_counters', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
          </div><!-- /.card-body -->
        </div>
  </section>
</div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/home.blade.php ENDPATH**/ ?>