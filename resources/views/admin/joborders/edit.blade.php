@extends('admin.index')
@section('content')


<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>{{!empty($title)?$title:''}}</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('joborders')}}" class="dropdown-item" style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}} </a>
				<a href="{{aurl('joborders/'.$joborders->id)}}" class="dropdown-item" style="color:#343a40">
				<i class="fa fa-eye"></i> {{trans('admin.show')}} </a>
				<a class="dropdown-item" style="color:#343a40" href="{{aurl('joborders/create')}}">
					<i class="fa fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$joborders->id}}" class="dropdown-item" style="color:#343a40" href="#">
					<i class="fa fa-trash"></i> {{trans('admin.delete')}}
				</a>
			</div>
		</div>
		</h3>
		@push('js')
		<div class="modal fade" id="deleteRecord{{$joborders->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">{{trans('admin.delete')}}</h4>
						<button class="close" data-dismiss="modal">x</button>
					</div>
					<div class="modal-body">
						<i class="fa fa-exclamation-triangle"></i>   {{trans('admin.ask_del')}} {{trans('admin.id')}}  ({{$joborders->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
						'method' => 'DELETE',
						'route' => ['joborders.destroy', $joborders->id]
						]) !!}
						{!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						<a class="btn btn-default btn-flat" data-dismiss="modal">{{trans('admin.cancel')}}</a>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		@endpush
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
										
{!! Form::open(['url'=>aurl('/joborders/'.$joborders->id),'method'=>'put','id'=>'joborders','files'=>true,'class'=>'form-horizontal form-row-seperated']) !!}
<div class="row">

<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 photo">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="'photo'">{{ trans('admin.photo') }}</label>
                <div class="input-group">
                    <div class="custom-file">
                        {!! Form::file('photo',['class'=>'custom-file-input','placeholder'=>trans('admin.photo'),"accept"=>it()->acceptedMimeTypes(""),"id"=>"photo"]) !!}
                        {!! Form::label('photo',trans('admin.photo'),['class'=>'custom-file-label']) !!}
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">{{ trans('admin.upload') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="padding-top: 30px;">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <a href="{{ it()->url($joborders->photo) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('customer_name',trans('admin.customer_name'),['class'=>'control-label']) !!}
        {!! Form::text('customer_name', $joborders->customer_name ,['class'=>'form-control','placeholder'=>trans('admin.customer_name')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('business_name',trans('admin.business_name'),['class'=>'control-label']) !!}
        {!! Form::text('business_name', $joborders->business_name ,['class'=>'form-control','placeholder'=>trans('admin.business_name')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        {!! Form::label('day_date',trans('admin.day_date')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            {!! Form::text('day_date', $joborders->day_date ,['class'=>'form-control float-right date_time_picker','placeholder'=>trans('admin.day_date'),'readonly'=>'readonly']) !!}
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <!-- Date range -->
    <div class="form-group">
        {!! Form::label('delivery_date',trans('admin.delivery_date')) !!}
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="far fa-calendar-alt"></i>
                </span>
            </div>
            {!! Form::text('delivery_date', $joborders->delivery_date ,['class'=>'form-control float-right date_time_picker','placeholder'=>trans('admin.delivery_date'),'readonly'=>'readonly']) !!}
        </div>
        <!-- /.input group -->
    </div>
    <!-- /.form group -->
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('Price',trans('admin.Price'),['class'=>'control-label']) !!}
        {!! Form::text('Price', $joborders->Price ,['class'=>'form-control','placeholder'=>trans('admin.Price')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('comments',trans('admin.comments'),['class'=>'control-label']) !!}
        {!! Form::text('comments', $joborders->comments ,['class'=>'form-control','placeholder'=>trans('admin.comments')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('Payment_method',trans('admin.Payment_method'),['class'=>'control-label']) !!}
{!! Form::select('Payment_method',['Bank Card'=>trans('admin.Bank Card'),'Electronic Transfer'=>trans('admin.Electronic Transfer'),'Receivables Checks'=>trans('admin.Receivables Checks'),'Receivables Account'=>trans('admin.Receivables Account'),'Cash Instant Check'=>trans('admin.Cash Instant Check'),], $joborders->Payment_method ,['class'=>'form-control select2','placeholder'=>trans('admin.Payment_method')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('type_of_publication',trans('admin.type_of_publication'),['class'=>'control-label']) !!}
{!! Form::select('type_of_publication',['Book'=>trans('admin.Book'),'Other'=>trans('admin.Other'),], $joborders->type_of_publication ,['class'=>'form-control select2','placeholder'=>trans('admin.type_of_publication')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('number_of_pages',trans('admin.number_of_pages'),['class'=>'control-label']) !!}
        {!! Form::text('number_of_pages', $joborders->number_of_pages ,['class'=>'form-control','placeholder'=>trans('admin.number_of_pages')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('other',trans('admin.other'),['class'=>'control-label']) !!}
        {!! Form::text('other', $joborders->other ,['class'=>'form-control','placeholder'=>trans('admin.other')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('Measurement',trans('admin.Measurement'),['class'=>'control-label']) !!}
{!! Form::select('Measurement',['Bank Card'=>trans('admin.Bank Card'),'Electronic Transfer'=>trans('admin.Electronic Transfer'),'Receivables (Checks)'=>trans('admin.Receivables (Checks)'),'Receivables (Account)'=>trans('admin.Receivables (Account)'),'Cash (Instant Check)'=>trans('admin.Cash (Instant Check)'),], $joborders->Measurement ,['class'=>'form-control select2','placeholder'=>trans('admin.Measurement')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('Special_Size',trans('admin.Special_Size'),['class'=>'control-label']) !!}
        {!! Form::text('Special_Size', $joborders->Special_Size ,['class'=>'form-control','placeholder'=>trans('admin.Special_Size')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('Quantity_in_numbers',trans('admin.Quantity_in_numbers'),['class'=>'control-label']) !!}
        {!! Form::text('Quantity_in_numbers', $joborders->Quantity_in_numbers ,['class'=>'form-control','placeholder'=>trans('admin.Quantity_in_numbers')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('Quantity_Writing',trans('admin.Quantity_Writing'),['class'=>'control-label']) !!}
        {!! Form::text('Quantity_Writing', $joborders->Quantity_Writing ,['class'=>'form-control','placeholder'=>trans('admin.Quantity_Writing')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('Number_of_interior_colors',trans('admin.Number_of_interior_colors'),['class'=>'control-label']) !!}
{!! Form::select('Number_of_interior_colors',['K'=>trans('admin.K'),'Y'=>trans('admin.Y'),'M'=>trans('admin.M'),'C'=>trans('admin.C'),'CMYK'=>trans('admin.CMYK'),], $joborders->Number_of_interior_colors ,['class'=>'form-control select2','placeholder'=>trans('admin.Number_of_interior_colors')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('Number_of_colors_Cover_or_commercial',trans('admin.Number_of_colors_Cover_or_commercial'),['class'=>'control-label']) !!}
{!! Form::select('Number_of_colors_Cover_or_commercial',['K'=>trans('admin.K'),'Y'=>trans('admin.Y'),'M'=>trans('admin.M'),'C'=>trans('admin.C'),'CMYK'=>trans('admin.CMYK'),], $joborders->Number_of_colors_Cover_or_commercial ,['class'=>'form-control select2','placeholder'=>trans('admin.Number_of_colors_Cover_or_commercial')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('notes',trans('admin.notes'),['class'=>'control-label']) !!}
        {!! Form::text('notes', $joborders->notes ,['class'=>'form-control','placeholder'=>trans('admin.notes')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('The_notebook_is_the_type_of_internal_paper',trans('admin.The_notebook_is_the_type_of_internal_paper'),['class'=>'control-label']) !!}
        {!! Form::text('The_notebook_is_the_type_of_internal_paper', $joborders->The_notebook_is_the_type_of_internal_paper ,['class'=>'form-control','placeholder'=>trans('admin.The_notebook_is_the_type_of_internal_paper')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('Pallet_measuring_notes',trans('admin.Pallet_measuring_notes'),['class'=>'control-label']) !!}
{!! Form::select('Pallet_measuring_notes',['70x100'=>trans('admin.70x100'),'50x70'=>trans('admin.50x70'),], $joborders->Pallet_measuring_notes ,['class'=>'form-control select2','placeholder'=>trans('admin.Pallet_measuring_notes')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('Lieutenant_number',trans('admin.Lieutenant_number'),['class'=>'control-label']) !!}
        {!! Form::text('Lieutenant_number', $joborders->Lieutenant_number ,['class'=>'form-control','placeholder'=>trans('admin.Lieutenant_number')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('number_type',trans('admin.number_type'),['class'=>'control-label']) !!}
{!! Form::select('number_type',['Quarter of a notebook'=>trans('admin.Quarter of a notebook'),'Half binding'=>trans('admin.Half binding'),], $joborders->number_type ,['class'=>'form-control select2','placeholder'=>trans('admin.number_type')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('fold_the_book',trans('admin.fold_the_book'),['class'=>'control-label']) !!}
{!! Form::select('fold_the_book',['32'=>trans('admin.32'),'16'=>trans('admin.16'),'8'=>trans('admin.8'),'4'=>trans('admin.4'),], $joborders->fold_the_book ,['class'=>'form-control select2','placeholder'=>trans('admin.fold_the_book')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('Lieutenant_notes',trans('admin.Lieutenant_notes'),['class'=>'control-label']) !!}
        {!! Form::text('Lieutenant_notes', $joborders->Lieutenant_notes ,['class'=>'form-control','placeholder'=>trans('admin.Lieutenant_notes')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('Lieutenant_Prepared_by',trans('admin.Lieutenant_Prepared_by'),['class'=>'control-label']) !!}
        {!! Form::text('Lieutenant_Prepared_by', $joborders->Lieutenant_Prepared_by ,['class'=>'form-control','placeholder'=>trans('admin.Lieutenant_Prepared_by')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('Paper_type',trans('admin.Paper_type'),['class'=>'control-label']) !!}
        {!! Form::text('Paper_type', $joborders->Paper_type ,['class'=>'form-control','placeholder'=>trans('admin.Paper_type')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('cover_pallet_measurement',trans('admin.cover_pallet_measurement'),['class'=>'control-label']) !!}
{!! Form::select('cover_pallet_measurement',['0x70'=>trans('admin.0x70'),'70x50'=>trans('admin.70x50'),], $joborders->cover_pallet_measurement ,['class'=>'form-control select2','placeholder'=>trans('admin.cover_pallet_measurement')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
		<div class="form-group">
				{!! Form::label('cover_pallet_measurement_type',trans('admin.cover_pallet_measurement_type'),['class'=>'control-label']) !!}
{!! Form::select('cover_pallet_measurement_type',['face'=>trans('admin.face'),'Two faces'=>trans('admin.Two faces'),], $joborders->cover_pallet_measurement_type ,['class'=>'form-control select2','placeholder'=>trans('admin.cover_pallet_measurement_type')]) !!}
		</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('cover_notes',trans('admin.cover_notes'),['class'=>'control-label']) !!}
        {!! Form::text('cover_notes', $joborders->cover_notes ,['class'=>'form-control','placeholder'=>trans('admin.cover_notes')]) !!}
    </div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        {!! Form::label('cover_created_by',trans('admin.cover_created_by'),['class'=>'control-label']) !!}
        {!! Form::text('cover_created_by', $joborders->cover_created_by ,['class'=>'form-control','placeholder'=>trans('admin.cover_created_by')]) !!}
    </div>
</div>

</div>
		<!-- /.row -->
		</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="save" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save') }}</button>
<button type="submit" name="save_back" class="btn btn-success btn-flat"><i class="fa fa-save"></i> {{ trans('admin.save_back') }}</button>
{!! Form::close() !!}
</div>
</div>
@endsection