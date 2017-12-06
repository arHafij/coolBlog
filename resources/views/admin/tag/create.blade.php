@extends('admin.layouts.app')
@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Tag Management
	{{-- <small>Advanced form element</small> --}}
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Tag</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Create Tag</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="{{ route('tag.store') }}" method="post">
					@include('admin.layouts.flash-message')
					<div class="box-body">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="exampleInputEmail1">Tag title</label>
							<input type="text" class="form-control" placeholder="title" name="name">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Tag Slug</label>
							<input type="text" class="form-control" placeholder="slug" name="slug">
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="{{ route('tag.index') }}" type="button" class="btn btn-warning">Back</a>
					</div>
				</form>
			</div>
		</div>
		<!-- /.col-->
	</div>
</section>
<!-- /.content -->
@endsection
