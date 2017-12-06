@extends('admin.layouts.app')
@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Category Management
	{{-- <small>Advanced form element</small> --}}
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Category</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Create Category</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" action="{{ route('category.store') }}" method="post">
					<div class="box-body">
						@include('admin.layouts.flash-message')
						{{ csrf_field() }}
						<div class="form-group {{ $errors->has('name') ? 'has-error': '' }}">
							<label for="exampleInputEmail1">Name</label>
							<input type="text" class="form-control" placeholder="Enter category name" name="name" value="{{ old('name') }}">
							<small class="text-danger">{{ $errors->first('name') }}</small>
						</div>
						<div class="form-group {{ $errors->has('slug') ? 'has-error': '' }}">
							<label for="exampleInputEmail1">Slug</label>
							<input type="text" class="form-control" placeholder="Enter slug" name="slug" value="{{ old('slug') }}">
							<small class="text-danger">{{ $errors->first('slug') }}</small>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
					</div>
				</form>
			</div>
		</div>
		<!-- /.col-->
	</div>
</section>
<!-- /.content -->
@endsection