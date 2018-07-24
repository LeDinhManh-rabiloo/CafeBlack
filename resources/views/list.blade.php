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
						<th style="width: 500px;">Image</th>
						<th>Origin</th>
						<th>price</th>
						<th>Category</th>
						<th>created</th>
						<th style="width: 200px;">Note</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt=0; ?>
					@foreach($arr as $key)
					<?php $stt++ ?>
					<?php
						$idca = $key->id_category;
						 $data2['arr2']= DB::select('select * from category where id='.$idca);
							foreach ($data2['arr2'] as $key2) {?>
					<tr>
						<td>{{$stt}}</td>
						<td>{{$key->name}}</td>
						<td>
							<img src="{{asset($key->image)}}" width="100%" height="70%">
						</td>
						<td>{{$key->origin}}</td>
						<td>{{$key->price}}</td>
						<td>{{$key2->name}}</td>
						<td>{{$key->created_at}}</td>
						<td>
							<a href="{{url('Admin/Edit/'.$key->id)}}" class="btn btn-success">Edit</a>
							<a href="{{url('Admin/delete/'.$key->id)}}"class="btn btn-danger" onclick="return window.confirm('bạn có muốn xóa?');">Delete</a>
						</td>
					</tr>
					<?php } ?>
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