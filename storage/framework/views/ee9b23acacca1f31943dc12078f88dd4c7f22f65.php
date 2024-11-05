
 <div class="btn-group">
	<button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> <?php echo e(trans('admin.actions')); ?></button>
	<span class="caret"></span>
	<span class="sr-only"></span>
	</button>
	<div class="dropdown-menu" role="menu">
		<a href="<?php echo e(aurl('/joborders/'.$id.'/edit')); ?>" class="dropdown-item" ><i class="fas fa-edit"></i> <?php echo e(trans('admin.edit')); ?></a>
		<a href="<?php echo e(aurl('/joborders/'.$id)); ?>" class="dropdown-item" ><i class="fa fa-eye"></i> <?php echo e(trans('admin.show')); ?></a>
		
		<a href="<?php echo e(aurl('/joborders_print/'.$id)); ?>" class="dropdown-item">
			<i class="fa fa-eye"></i> <?php echo e(trans('admin.print')); ?>

		</a>
	   
	
		<div class="dropdown-divider"></div>
		<a data-toggle="modal" data-target="#delete_record<?php echo e($id); ?>" href="#" class="dropdown-item">
		<i class="fas fa-trash"></i> <?php echo e(trans('admin.delete')); ?></a>
	</div>
</div>
<div class="modal fade" id="delete_record<?php echo e($id); ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><?php echo e(trans('admin.delete')); ?></h4>
				<button class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
				<i class="fa fa-exclamation-triangle"></i> <?php echo e(trans('admin.ask_del')); ?> <?php echo e(trans('admin.id')); ?> (<?php echo e($id); ?>)
			</div>
			<div class="modal-footer">
				<?php echo Form::open([
				'method' => 'DELETE',
				'route' => ['joborders.destroy', $id]
				]); ?>

				<?php echo Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']); ?>

				<a class="btn btn-default btn-flat" data-dismiss="modal"><?php echo e(trans('admin.cancel')); ?></a>
				<?php echo Form::close(); ?>

			</div>
		</div>
	</div>
</div>
		<?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/joborders/buttons/actions.blade.php ENDPATH**/ ?>