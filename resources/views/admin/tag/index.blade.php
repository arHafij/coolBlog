@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

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
           <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tags</h3>
                     <a class="col-md-offset-5 btn btn-success" href="{{ route('tag.create') }}">Add new</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                  <td>{{ $loop->index +1 }}</td>
                                  <td>{{ $tag->name}}</td>
                                  <td>{{ $tag->slug}}</td>
                                  <td>-</td>
                                  <td>-</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Tag</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
		</div>
		<!-- /.col-->
	</div>
</section>
<!-- /.content -->
@endsection

@section('js')
    <!-- DataTables -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- page script -->
    <script>
      $(function () {
        // $('#example1').DataTable()
        $('#example1').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
@endsection
