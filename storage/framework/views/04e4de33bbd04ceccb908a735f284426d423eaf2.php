<?php $__env->startSection('content'); ?>


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
				<a href="<?php echo e(aurl('joborders')); ?>"  style="color:#343a40"  class="dropdown-item">
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
								
<?php echo Form::open(['url'=>aurl('/joborders'),'id'=>'joborders','files'=>true,'class'=>'form-horizontal form-row-seperated']); ?>

<div class="row">

<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 photo">
    <div class="form-group">
        <label for="'photo'"><?php echo e(trans('admin.photo')); ?></label>
        <div class="input-group">
            <div class="custom-file">
                <?php echo Form::file('photo',['class'=>'custom-file-input','placeholder'=>trans('admin.photo'),"accept"=>it()->acceptedMimeTypes(""),"id"=>"photo"]); ?>

                <?php echo Form::label('photo',trans('admin.photo'),['class'=>'custom-file-label']); ?>

            </div>
            <div class="input-group-append">
                <span class="input-group-text" id=""><?php echo e(trans('admin.upload')); ?></span>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('customer_name',trans('admin.customer_name'),['class'=>' control-label']); ?>

            <?php echo Form::text('customer_name',old('customer_name'),['class'=>'form-control','placeholder'=>trans('admin.customer_name')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('business_name',trans('admin.business_name'),['class'=>' control-label']); ?>

            <?php echo Form::text('business_name',old('business_name'),['class'=>'form-control','placeholder'=>trans('admin.business_name')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        <?php echo Form::label('day_date',trans('admin.day_date')); ?>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            <?php echo Form::text('day_date',old('day_date'),['class'=>'form-control float-right date_time_picker','placeholder'=>trans('admin.day_date'),'readonly'=>'readonly']); ?>

        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        <?php echo Form::label('delivery_date',trans('admin.delivery_date')); ?>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            <?php echo Form::text('delivery_date',old('delivery_date'),['class'=>'form-control float-right date_time_picker','placeholder'=>trans('admin.delivery_date'),'readonly'=>'readonly']); ?>

        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Price',trans('admin.Price'),['class'=>' control-label']); ?>

            <?php echo Form::text('Price',old('Price'),['class'=>'form-control','placeholder'=>trans('admin.Price')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('comments',trans('admin.comments'),['class'=>' control-label']); ?>

            <?php echo Form::text('comments',old('comments'),['class'=>'form-control','placeholder'=>trans('admin.comments')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('Payment_method',trans('admin.Payment_method')); ?>

		<?php echo Form::select('Payment_method',['Bank Card'=>trans('admin.Bank Card'),'Electronic Transfer'=>trans('admin.Electronic Transfer'),'Receivables Checks'=>trans('admin.Receivables Checks'),'Receivables Account'=>trans('admin.Receivables Account'),'Cash Instant Check'=>trans('admin.Cash Instant Check'),],old('Payment_method'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>


<div class="justify-content-center">
    <h2>المواصفات</h2>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('type_of_publication',trans('admin.type_of_publication')); ?>

		<?php echo Form::select('type_of_publication',['Book'=>trans('admin.Book'),'Other'=>trans('admin.Other'),],old('type_of_publication'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('number_of_pages',trans('admin.number_of_pages'),['class'=>' control-label']); ?>

            <?php echo Form::text('number_of_pages',old('number_of_pages'),['class'=>'form-control','placeholder'=>trans('admin.number_of_pages')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('other',trans('admin.other'),['class'=>' control-label']); ?>

            <?php echo Form::text('other',old('other'),['class'=>'form-control','placeholder'=>trans('admin.other')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('Measurement',trans('admin.Measurement')); ?>

		<?php echo Form::select('Measurement',['Educational Offer Size 28x21'=>trans('admin.Educational Offer Size 28x21'),'Commercial Size 28x20.5'=>trans('admin.Commercial Size 28x20.5'),'Special Size'=>trans('admin.Special Size'),],old('Measurement'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Special_Size',trans('admin.Special_Size'),['class'=>' control-label']); ?>

            <?php echo Form::text('Special_Size',old('Special_Size'),['class'=>'form-control','placeholder'=>trans('admin.Special_Size')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Quantity_in_numbers',trans('admin.Quantity_in_numbers'),['class'=>' control-label']); ?>

            <?php echo Form::text('Quantity_in_numbers',old('Quantity_in_numbers'),['class'=>'form-control','placeholder'=>trans('admin.Quantity_in_numbers')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Quantity_Writing',trans('admin.Quantity_Writing'),['class'=>' control-label']); ?>

            <?php echo Form::text('Quantity_Writing',old('Quantity_Writing'),['class'=>'form-control','placeholder'=>trans('admin.Quantity_Writing')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('Number_of_interior_colors',trans('admin.Number_of_interior_colors')); ?>

		<?php echo Form::select('Number_of_interior_colors',['K'=>trans('admin.K'),'Y'=>trans('admin.Y'),'M'=>trans('admin.M'),'C'=>trans('admin.C'),'CMYK'=>trans('admin.CMYK'),],old('Number_of_interior_colors'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('Number_of_colors_Cover_or_commercial',trans('admin.Number_of_colors_Cover_or_commercial')); ?>

		<?php echo Form::select('Number_of_colors_Cover_or_commercial',['K'=>trans('admin.K'),'Y'=>trans('admin.Y'),'M'=>trans('admin.M'),'C'=>trans('admin.C'),'CMYK'=>trans('admin.CMYK'),],old('Number_of_colors_Cover_or_commercial'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('notes',trans('admin.notes'),['class'=>' control-label']); ?>

            <?php echo Form::text('notes',old('notes'),['class'=>'form-control','placeholder'=>trans('admin.notes')]); ?>

    </div>
</div>
<div class="justify-content-center">
    <h2>التصميم والمونتاج</h2>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('The_notebook_is_the_type_of_internal_paper',trans('admin.The_notebook_is_the_type_of_internal_paper'),['class'=>' control-label']); ?>

            <?php echo Form::text('The_notebook_is_the_type_of_internal_paper',old('The_notebook_is_the_type_of_internal_paper'),['class'=>'form-control','placeholder'=>trans('admin.The_notebook_is_the_type_of_internal_paper')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('Pallet_measuring_notes',trans('admin.Pallet_measuring_notes')); ?>

		<?php echo Form::select('Pallet_measuring_notes',['70x100'=>trans('admin.70x100'),'50x70'=>trans('admin.50x70'),],old('Pallet_measuring_notes'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Lieutenant_number',trans('admin.Lieutenant_number'),['class'=>' control-label']); ?>

            <?php echo Form::text('Lieutenant_number',old('Lieutenant_number'),['class'=>'form-control','placeholder'=>trans('admin.Lieutenant_number')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('number_type',trans('admin.number_type')); ?>

		<?php echo Form::select('number_type',['Quarter of a notebook'=>trans('admin.Quarter of a notebook'),'Half binding'=>trans('admin.Half binding'),],old('number_type'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('fold_the_book',trans('admin.fold_the_book')); ?>

		<?php echo Form::select('fold_the_book',['32'=>trans('admin.32'),'16'=>trans('admin.16'),'8'=>trans('admin.8'),'4'=>trans('admin.4'),],old('fold_the_book'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Lieutenant_notes',trans('admin.Lieutenant_notes'),['class'=>' control-label']); ?>

            <?php echo Form::text('Lieutenant_notes',old('Lieutenant_notes'),['class'=>'form-control','placeholder'=>trans('admin.Lieutenant_notes')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Lieutenant_Prepared_by',trans('admin.Lieutenant_Prepared_by'),['class'=>' control-label']); ?>

            <?php echo Form::text('Lieutenant_Prepared_by',old('Lieutenant_Prepared_by'),['class'=>'form-control','placeholder'=>trans('admin.Lieutenant_Prepared_by')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Paper_type',trans('admin.Paper_type'),['class'=>' control-label']); ?>

            <?php echo Form::text('Paper_type',old('Paper_type'),['class'=>'form-control','placeholder'=>trans('admin.Paper_type')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('cover_pallet_measurement',trans('admin.cover_pallet_measurement')); ?>

		<?php echo Form::select('cover_pallet_measurement',['0x70'=>trans('admin.0x70'),'70x50'=>trans('admin.70x50'),],old('cover_pallet_measurement'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('cover_pallet_measurement_type',trans('admin.cover_pallet_measurement_type')); ?>

		<?php echo Form::select('cover_pallet_measurement_type',['face'=>trans('admin.face'),'Two faces'=>trans('admin.Two faces'),],old('cover_pallet_measurement_type'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('cover_notes',trans('admin.cover_notes'),['class'=>' control-label']); ?>

            <?php echo Form::text('cover_notes',old('cover_notes'),['class'=>'form-control','placeholder'=>trans('admin.cover_notes')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('cover_created_by',trans('admin.cover_created_by'),['class'=>' control-label']); ?>

            <?php echo Form::text('cover_created_by',old('cover_created_by'),['class'=>'form-control','placeholder'=>trans('admin.cover_created_by')]); ?>

    </div>
</div>
<div class="justify-content-center">
    <h2>الطباعه اوفست</h2>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('color_lieutenant',trans('admin.color_lieutenant')); ?>

		<?php echo Form::select('color_lieutenant',['8 Color 70x100'=>trans('admin.8 Color 70x100'),'4 Color 70x100'=>trans('admin.4 Color 70x100'),'50x70'=>trans('admin.50x70'),],old('color_lieutenant'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('lieutenant_text',trans('admin.lieutenant_text'),['class'=>'control-label']); ?>

            <?php echo Form::textarea('lieutenant_text',old('lieutenant_text'),['class'=>'form-control','placeholder'=>trans('admin.lieutenant_text')]); ?>

    </div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('cover_color',trans('admin.cover_color')); ?>

		<?php echo Form::select('cover_color',['4 Color 70x100'=>trans('admin.4 Color 70x100'),'50x70'=>trans('admin.50x70'),],old('cover_color'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Book_cover_text',trans('admin.Book_cover_text'),['class'=>'control-label']); ?>

            <?php echo Form::textarea('Book_cover_text',old('Book_cover_text'),['class'=>'form-control','placeholder'=>trans('admin.Book_cover_text')]); ?>

    </div>
</div>
<div class="justify-content-center">
    <h2>الطباعــــــــــــة ( ديجتال )</h2>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Printing_digital_ctreated_by',trans('admin.Printing_digital_ctreated_by'),['class'=>'control-label']); ?>

            <?php echo Form::textarea('Printing_digital_ctreated_by',old('Printing_digital_ctreated_by'),['class'=>'form-control','placeholder'=>trans('admin.Printing_digital_ctreated_by')]); ?>

    </div>
</div>
<div class="justify-content-center">
    <h2>لتجليـــــــد و السلوفان</h2>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('The_heel',trans('admin.The_heel')); ?>

		<?php echo Form::select('The_heel',['Horse'=>trans('admin.Horse'),'tailoring'=>trans('admin.tailoring'),'brush'=>trans('admin.brush'),],old('The_heel'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
	<div class="form-group">
		<?php echo Form::label('Slovenia',trans('admin.Slovenia')); ?>

		<?php echo Form::select('Slovenia',['shiny'=>trans('admin.shiny'),'matte'=>trans('admin.matte'),],old('Slovenia'),['class'=>'form-control select2','placeholder'=>trans('admin.choose')]); ?>

	</div>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('Slovenia_text',trans('admin.Slovenia_text'),['class'=>' control-label']); ?>

            <?php echo Form::text('Slovenia_text',old('Slovenia_text'),['class'=>'form-control','placeholder'=>trans('admin.Slovenia_text')]); ?>

    </div>
</div>
<div class="justify-content-center">
    <h2>ما بعد الطباعة</h2>
</div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    <div class="form-group">
        <?php echo Form::label('after_printing',trans('admin.after_printing'),['class'=>'control-label']); ?>

            <?php echo Form::textarea('after_printing',old('after_printing'),['class'=>'form-control','placeholder'=>trans('admin.after_printing')]); ?>

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
<?php echo $__env->make('admin.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Bassil-Ali\Desktop\work-order\resources\views/admin/joborders/create.blade.php ENDPATH**/ ?>