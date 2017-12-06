@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
@endsection
@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
	Post Mangement
	<small>manage your post</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Post</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit Post
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
					<div class="panel-body">
						@include('admin.layouts.flash-message')
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="col-lg-6">
							<div class="form-group  {{ $errors->has('title') ? 'has-error': '' }}">
								{{ Form::label('title','Title') }}
								{{ Form::text('title', $post->title, ['class'=>'form-control','placeholder'=>'Post Title']) }}
								<small class="text-danger">{{ $errors->first('title') }}</small>
							</div>
							<div class="form-group {{ $errors->has('subtitle') ? 'has-error': '' }}">
								<label for="exampleInputEmail1">Sub Title</label>
								<input 
								type="text" class="form-control" placeholder="sub-title" 
								name="subtitle" value="{{ $post->subtitle }}">
								<small class="text-danger">{{ $errors->first('subtitle') }}</small>

							</div>
							<div class="form-group {{ $errors->has('slug') ? 'has-error': '' }}">
								<label for="exampleInputEmail1">Slug</label>
								<input 
								type="text" class="form-control" placeholder="slug" 
								name="slug" value="{{ $post->slug }}">
								<small class="text-danger">{{ $errors->first('slug') }}</small>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<div class="pull-right">
									<label for="image">File input</label>
									<input type="file" name="image">
								</div>
								<div class="checkbox pull-left">
									<label>
										<input type="checkbox" name="status"> publish
									</label>
								</div>
							</div>
							<br>
							<div class="form-group" style="margin: 40px 0 0 0;">
								<label>Select Tags</label>
								<select class="form-control select2" multiple="multiple" data-placeholder="Tags"
									style="width: 100%;" name="tag_id[]">
									@foreach($tags as $tag)
										<option value="{{ $tag->id }}"
										@foreach( $post->tags as $postTag)
											@if($postTag->id == $tag->id)
												selected
											@endif
										@endforeach
										>{{ $tag->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group" style="margin-top: 20px;">
								<label>Select Category</label>
								<select class="form-control select2" style="width: 100%;" name="category_id">
									<option value="" disabled="disabled" selected="selected">Category</option>
									@foreach($categories as $category)
											@if($post->category_id == $category->id)
												<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
											@else
												<option value="{{ $category->id }}">{{ $category->name }}</option>
											@endif
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box box-default" style="border-top: 1px solid #eee;">
						<div class="box-header">
							<label style="margin-left: 20px;">Body</label>
							<!-- tools box -->
							<div class="pull-right box-tools">
								<button type="button" class="btn btn-default btn-sm" data-widget="collapse" >
								<i class="fa fa-minus"></i>
								</button>
							</div>
							<!-- /. tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<textarea 
								class="textarea" placeholder="Place some text here"style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
								name="body">{{ $post->body }}
							</textarea>
							<small class="text-danger">{{ $errors->first('body') }}</small>
						</div>
					</div>
					<div class="panel-footer">
						<button type="submit" class="btn btn-primary">Save</button>
						<a type="submit" href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
					</div>
				</form>
			</div>
			{{-- ./panel --}}
		</div>
		<!-- /.col-->
	</div>
	<!-- ./row -->
</section>
<!-- /.content -->
@endsection
@section('js')
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script>
$(function () {
	//bootstrap WYSIHTML5 - text editor
	$('.textarea').wysihtml5();
	//Initialize Select2 Elements
$('.select2').select2({
	theme: "classic"
});
})
</script>
@endsection