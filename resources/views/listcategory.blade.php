@extends('layout.index')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-12">
         
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách danh mục sản phẩm</h3>
              <div  class="btn btn-lg btn-success" style="float:right"><a href="{{url('Admin/insertcategory')}}" >Thêm danh mục sản phẩm</a></div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th>created</th>
						<th style="width: 200px;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt=0; ?>
					@foreach($arr as $key)
					<?php $stt++ ?>
					<tr>
						<td>{{$stt}}</td>
						<td>{{$key->name}}</td>
						<td>{{$key->created_at}}</td>
						<td>
							<a href="{{url('Admin/listcategory/Edit/'.$key->id)}}" class="btn btn-success">Edit</a>
							<a href="{{url('Admin/listcategory/delete/'.$key->id)}}"class="btn btn-danger" onclick="return window.confirm('bạn có muốn xóa?');">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				<div class='list-page'>
					{{$arr->links()}}
				</div>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection