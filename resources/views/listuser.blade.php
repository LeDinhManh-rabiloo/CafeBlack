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
						<th>Name</th>
						<th style="width: 500px;">Image</th>
						<th>email</th>
						<th>created</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 0 ?>
					@foreach($arr as $key)
					<?php $stt++ ?>
					<tr>
						<td>{{$stt}}</td>
						<td>{{$key->name}}</td>
						<td >
							<img src="{{asset($key->image)}}" style="width: 100%;height: 300px;">
						</td>
						<td>{{$key->email}}</td>
						<td>{{$key->created_at}}</td>
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