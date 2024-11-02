@extends('admin.index')
@section('content')


<div class="card card-dark">
	<div class="card-header">
		<h3 class="card-title">
		<div class="">
			<span>
			{{ !empty($title)?$title:'' }}
			</span>
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<span class="caret"></span>
			<span class="sr-only"></span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a href="{{ aurl('joborders2') }}"  style="color:#343a40"  class="dropdown-item">
				<i class="fas fa-list"></i> {{ trans('admin.show_all') }}</a>
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
								
<form action="{{aurl('/joborders2')}}" enctype="multipart/form-data" class="form-horizontal form-row-seperated" method="post" id="joborders2">
<div class="row">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<input type="hidden" name="_method" value="post">
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
	<div class="form-group">
				<label for="number_type">{{trans('admin.number_type')}}</label>
							<select id="number_type" name="number_type" class="form-control select2" placeholder="{{trans('admin.number_type')}}" >

<option value="Half binding" {{old('number_type') == 'Half binding'?'selected':''}} >{{trans('admin.نصف ملزمة')}}</option>

<option value="Quarter of a notebook" {{old('number_type') == 'Quarter of a notebook'?'selected':''}} >{{trans('admin.ربـع ملزمة')}}</option>
   </select>
</div>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="dd" class=" control-label">{{trans('admin.dd')}}</label>
            <input type="text" id="dd" name="dd" value="{{old('dd')}}" class="form-control" placeholder="{{trans('admin.dd')}}" />
    </div>
</div>

</div>
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	<div class="card-footer"><button type="submit" name="add" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add') }}</button>
<button type="submit" name="add_back" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> {{ trans('admin.add_back') }}</button>
</form>	</div>
</div>
@endsection