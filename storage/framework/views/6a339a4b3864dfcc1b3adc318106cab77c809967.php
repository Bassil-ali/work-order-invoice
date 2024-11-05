<?php $__env->startSection('content'); ?>
<?php echo Form::open(["method" => "post","url" => [aurl('/bookfiles/multi_delete')]]); ?>

<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title"><?php echo e(!empty($title)?$title:''); ?></h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="table-responsive">
			<?php echo $dataTable->table(["class"=> "table table-striped table-bordered table-hover table-checkable dataTable no-footer"],true); ?>

			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
<div class="modal fade" id="multi_delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title"><?php echo e(trans("admin.delete")); ?> </h4>
					<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
					<div class="delete_done"><i class="fa fa-exclamation-triangle"></i> <?php echo e(trans("admin.ask-delete")); ?> <span id="count"></span> <?php echo e(trans("admin.record")); ?> </div>
					<div class="check_delete"><?php echo e(trans("admin.check-delete")); ?></div>
			</div>
			<div class="modal-footer">
					<?php echo Form::submit(trans("admin.approval"), ["class" => "btn btn-danger btn-flat delete_done"]); ?>

					<a class="btn btn-default" data-dismiss="modal"><?php echo e(trans("admin.cancel")); ?></a>
			</div>
		</div>
	</div>
</div>
<?php echo Form::close(); ?>


<?php $__env->startPush('js'); ?>
<?php echo $dataTable->scripts(); ?>

<?php $__env->stopPush(); ?>
		<?php $__env->stopSection(); ?>
		
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/bookfiles/index.blade.php ENDPATH**/ ?>