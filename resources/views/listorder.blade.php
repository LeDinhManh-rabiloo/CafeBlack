@extends('layout.index')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-12">
         
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách tài khoản</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
					<tr>
						<th>STT</th>
						<th>Người nhận</th>
						<th>sản phẩm</th>
						<th>phone</th>
						<th>Địa chỉ</th>
						<th>Trạng thái</th>
						<th>Tác vụ</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 0 ?>
					@foreach($orders as $key)
					<?php $stt++ ?>
					<tr>
						<td>{{$stt}}</td>
						<td>{{$key->customer->name}}</td>
						<td >{{$key->product->name}}</td>
						<td>{{$key->customer->phone}}</td>
						<td>{{$key->customer->address}}</td>
						<td><span class="label bg-purple">{{$key->status->name}}</span></td>
						<td>
                			<a href="{{url('Admin/cartEdit/'.$key->id)}}" class="btn btn-success">Edit Status</a>
                		</td>
					</tr>
					@endforeach
				</tbody>
				<div class='list-page'>
					{{$orders->links()}}
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