@extends('admin.index')
@section('content')
<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<a>{{!empty($title)?$title:''}}</a>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
				<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{aurl('joborders')}}" class="dropdown-item"  style="color:#343a40">
				<i class="fas fa-list"></i> {{trans('admin.show_all')}}</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('joborders/'.$joborders->id.'/edit')}}">
					<i class="fas fa-edit"></i> {{trans('admin.edit')}}
				</a>
				<a class="dropdown-item"  style="color:#343a40" href="{{aurl('joborders/create')}}">
					<i class="fas fa-plus"></i> {{trans('admin.create')}}
				</a>
				<div class="dropdown-divider"></div>
				<a data-toggle="modal" data-target="#deleteRecord{{$joborders->id}}" class="dropdown-item"  style="color:#343a40" href="#">
					<i class="fas fa-trash"></i> {{trans('admin.delete')}}
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
						<i class="fa fa-exclamation-triangle"></i>  {{trans('admin.ask_del')}} {{trans('admin.id')}} ({{$joborders->id}})
					</div>
					<div class="modal-footer">
						{!! Form::open([
               'method' => 'DELETE',
               'route' => ['joborders.destroy', $joborders->id]
               ]) !!}
                {!! Form::submit(trans('admin.approval'), ['class' => 'btn btn-danger btn-flat']) !!}
						 <a class="btn btn-default" data-dismiss="modal">{{trans('admin.cancel')}}</a>
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
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				<b>{{trans('admin.id')}} :</b> {{$joborders->id}}
			</div>
			<div class="clearfix"></div>
			<hr />
			@if(!empty($joborders->admin_id()->first()))
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<b>{{trans('admin.admin_id')}} :</b>
				{{ $joborders->admin_id()->first()->name }}
			</div>
			@endif
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.customer_name')}} :</b>
				{!! $joborders->customer_name !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.business_name')}} :</b>
				{!! $joborders->business_name !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.day_date')}} :</b>
				{!! $joborders->day_date !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.delivery_date')}} :</b>
				{!! $joborders->delivery_date !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Price')}} :</b>
				{!! $joborders->Price !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.comments')}} :</b>
				{!! $joborders->comments !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.number_of_pages')}} :</b>
				{!! $joborders->number_of_pages !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.other')}} :</b>
				{!! $joborders->other !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Special_Size')}} :</b>
				{!! $joborders->Special_Size !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Quantity_in_numbers')}} :</b>
				{!! $joborders->Quantity_in_numbers !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Quantity_Writing')}} :</b>
				{!! $joborders->Quantity_Writing !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.notes')}} :</b>
				{!! $joborders->notes !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.The_notebook_is_the_type_of_internal_paper')}} :</b>
				{!! $joborders->The_notebook_is_the_type_of_internal_paper !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Lieutenant_number')}} :</b>
				{!! $joborders->Lieutenant_number !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Lieutenant_notes')}} :</b>
				{!! $joborders->Lieutenant_notes !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Lieutenant_Prepared_by')}} :</b>
				{!! $joborders->Lieutenant_Prepared_by !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Paper_type')}} :</b>
				{!! $joborders->Paper_type !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.cover_notes')}} :</b>
				{!! $joborders->cover_notes !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.cover_created_by')}} :</b>
				{!! $joborders->cover_created_by !!}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="row">
					<div class="col-md-8 col-lg-4 col-xs-12">
					  <b>{{trans('admin.photo')}} :</b>
					</div>
					<div class="col-md-2 col-lg-2 col-xs-12">
						
					</div>
					<div class="col-md-2 col-lg-2 col-xs-12">
						<a href="{{ it()->url($joborders->photo) }}" target="_blank"><i class="fa fa-download fa-2x"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Payment_method')}} :</b>
				{{ trans("admin.".$joborders->Payment_method) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.type_of_publication')}} :</b>
				{{ trans("admin.".$joborders->type_of_publication) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Measurement')}} :</b>
				{{ trans("admin.".$joborders->Measurement) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Number_of_interior_colors')}} :</b>
				{{ trans("admin.".$joborders->Number_of_interior_colors) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Number_of_colors_Cover_or_commercial')}} :</b>
				{{ trans("admin.".$joborders->Number_of_colors_Cover_or_commercial) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.Pallet_measuring_notes')}} :</b>
				{{ trans("admin.".$joborders->Pallet_measuring_notes) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.number_type')}} :</b>
				{{ trans("admin.".$joborders->number_type) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.fold_the_book')}} :</b>
				{{ trans("admin.".$joborders->fold_the_book) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.cover_pallet_measurement')}} :</b>
				{{ trans("admin.".$joborders->cover_pallet_measurement) }}
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<b>{{trans('admin.cover_pallet_measurement_type')}} :</b>
				{{ trans("admin.".$joborders->cover_pallet_measurement_type) }}
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.card-body -->
	<div class="card-footer">
	</div>
</div>
@endsection