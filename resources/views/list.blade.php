@extends('layout.index')
@section('content')
<section class="content">
      <div class="row">
        <div class="col-12">
         
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách các sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th style="width: 300px;">Image</th>
						<th>Origin</th>
						<th>price</th>
						<th>Sale</th>
						<th>Category</th>
						<th>created</th>
						<th style="width: 200px;">Note</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt=0; ?>
					@foreach($data as $key)
					<?php $stt++ ?>
					<tr>
						<td>{{$stt}}</td>
						<td>{{$key->name}}</td>
						<td>
							<img src="{{asset($key->image)}}" width="100%" height="70%">
						</td>
						<td>{{$key->origin}}</td>
						<td>{{$key->price}}</td>
						@if($key->sale !='')
						<td>{{$key->sale->percent}}%</td>
						@else
						<td>0%</td>
						@endif
						<td>{{$key->category->name}}</td>
						<td>{{$key->created_at}}</td>
						<td>
							<a href="{{url('Admin/Edit/'.$key->id)}}" class="btn btn-success">Edit</a><a href="{{url('Admin/sale/'.$key->id)}}" class="btn btn-danger" style="margin-left: 3px;">Sale</a>
							<a href="{{url('Admin/delete/'.$key->id)}}"class="btn btn-danger" onclick="return window.confirm('bạn có muốn xóa?');">Delete</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				<div class='list-page'>
					{{$data->links()}}
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