<?php $__env->startSection('content'); ?>

<?php echo $__env->make("admin.layouts.components.submit_form_ajax",["form"=>"#bookfiles"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>
			<?php echo e(!empty($title)?$title:''); ?>

			</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="<?php echo e(aurl('bookfiles')); ?>"  style="color:#343a40"  class="dropdown-item">
				<i class="fas fa-list"></i> <?php echo e(trans('admin.show_all')); ?></a>
			</div>
		</div>
		</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
								
<?php echo Form::open(['url'=>aurl('/bookfiles'),'id'=>'bookfiles','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 file">
    <div class="form-group">
        <label for="'file'"><?php echo e(trans('admin.file')); ?></label>
        <div class="input-group">
            <div class="custom-file">
                <?php echo Form::file('file',['class'=>'custom-file-input','placeholder'=>trans('admin.file'),"accept"=>it()->acceptedMimeTypes(""),"id"=>"file"]); ?>

                <?php echo Form::label('file',trans('admin.file'),['class'=>'custom-file-label']); ?>

            </div>
            <div class="input-group-append">
                <span class="input-group-text" id=""><?php echo e(trans('admin.upload')); ?></span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('file_name',trans('admin.file_name'),['class'=>' control-label']); ?>

            <?php echo Form::text('file_name',old('file_name'),['class'=>'form-control','placeholder'=>trans('admin.file_name')]); ?>

    </div>
</div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> <?php echo e(trans('admin.add')); ?></button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> <?php echo e(trans('admin.add_back')); ?></button>
<?php echo Form::close(); ?>	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/bookfiles/create.blade.php ENDPATH**/ ?>