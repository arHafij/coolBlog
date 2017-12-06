@extends('admin.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Category Management
    {{-- <small>Advanced form element</small> --}}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Category</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Categories</h3>
                    <a class="col-md-offset-5 btn btn-success" href="{{ route('category.create') }}">Add new</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('admin.layouts.flash-message')
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
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $category->name}}</td>
                                <td>{{ $category->slug}}</td>
                                <td><a href="{{ route('category.edit',$category->id) }}">edit</a></td>
                                <td>
                                    <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}"    method="post" style="display: none;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>
                                    <a href="#" 
                                        onclick="
                                        event.preventDefault();
                                        if(confirm('Are you sure?')){
                                            document.getElementById('delete-form-{{ $category->id }}').submit();
                                        }
                                        ">delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
'searching'   : true,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})
</script>
@endsection