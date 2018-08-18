@extends('layout.index')
@section('content')
<section class="content">
  <!-- Small boxes (Stat box) -->
  <!-- /.row -->
  <div class="row">
    <!-- /.col -->
    <div class="col-xl-4 connectedSortable">
      <!-- weather -->
      <div class="box bg-blue text-center">			
		<div class="box-body">
		  <div class="p-5">
			  <h3 class="white">
				<span class="font-size-30">City, </span>Country
			  </h3>
			  <p class="weather-day-date mb-30">
				<span class="mr-5">MONDAY</span> May 11, 2017
			  </p>
			  <div class="mb-30 weather-icon">
				<canvas class="mr-40 text-top" id="icon1" width="90" height="90"></canvas>
				<div class="inline-block">
				  <span class="font-size-50">29°
					<span class="font-size-40">C</span>
				  </span>
				  <p class="text-left">DAY RAIN</p>
				</div>
			  </div>
			  <div class="row no-space">
				<div class="col-2">
				  <div>
					<div class="mb-10">TUE</div>
					<i class="wi-day-sunny font-size-30 mb-10"></i>
					<div>24°
					  <span class="font-size-12">C</span>
					</div>
				  </div>
				</div>
				<div class="col-2">
				  <div>
					<div class="mb-10">WED</div>
					<i class="wi-day-cloudy font-size-30 mb-10"></i>
					<div>21°
					  <span class="font-size-12">C</span>
					</div>
				  </div>
				</div>
				<div class="col-2">
				  <div>
					<div class="mb-10">THU</div>
					<i class="wi-day-sunny font-size-30 mb-10"></i>
					<div>25°
					  <span class="font-size-12">C</span>
					</div>
				  </div>
				</div>
				<div class="col-2">
				  <div>
					<div class="mb-10">FRI</div>
					<i class="wi-day-cloudy-gusts font-size-30 mb-10"></i>
					<div>20°
					  <span class="font-size-12">C</span>
					</div>
				  </div>
				</div>
				<div class="col-2">
				  <div>
					<div class="mb-10">SAT</div>
					<i class="wi-day-lightning font-size-30 mb-10"></i>
					<div>18°
					  <span class="font-size-12">C</span>
					</div>
				  </div>
				</div>
				<div class="col-2">
				  <div>
					<div class="mb-10">SUN</div>
					<i class="wi-day-storm-showers font-size-30 mb-10"></i>
					<div>14°
					  <span class="font-size-12">C</span>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
		<!-- /.box-body -->
	  </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-xl-8">
    <!-- USERS LIST -->
	  <div class="box box-danger">
		<div class="box-header with-border">
		  <h3 class="box-title">New User</h3>

		  <div class="box-tools pull-right">
			<span class="label bg-aqua">New User</span>
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
			</button>
			<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
			</button>
		  </div>
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
		  <ul class="users-list clearfix">
		  	@foreach($arr as $key)
		  	@if($key->status == 1)
			<li>
			  <img src="{{asset($key->image)}}" alt="User Image">
			  <a class="users-list-name" href="#">{{$key->name}}</a>
			  <span class="users-list-date">{{$key->created_at}}</span>
			</li>
			@endif
			@endforeach
		  </ul>
		  <!-- /.users-list -->
		</div>
		<!-- /.box-body -->
		<div class="box-footer text-center">
		  <a href="{{url('Admin/list_users')}}" class="uppercase">View All Users</a>
		</div>
		<!-- /.box-footer -->
	  </div>
          <!--/.box -->
    </div>
   </div>        
  <!-- /.row -->
  <!-- /.row -->
  <div class="row">
  	<div class="col-xl-12">
  		<!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">New Orders</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-responsive no-margin">
              <thead>
              <tr>
              	<th>STT</th>
                <th>Mã đơn</th>
                <th>Người mua</th>
                <th>Người nhận</th>
                <th>sản phẩm</th>
                <th>Trạng thái</th>
                <th>Đơn giá</th>
                <th>Ngày đặt</th>
                <th>Tác vụ</th>
              </tr>
              </thead>
              <tbody>
              	<?php $stt =0; ?>
              	@foreach($orders as $key2)
              	<?php $stt++ ?>
              <tr>
                <td>{{$stt}}</td>
                <td>{{$key2->code_order}}</td>
                <td>{{$key2->users->name}}</td>
                <th>{{$key2->nguoinhan}}</th>
                <td><span>{{$key2->product->name}}</span></td>
                <td>
                  <div class="label bg-purple" data-color="#7460ee" data-height="20" style="font-weight: bold;">{{$key2->status->status}}</div>
                </td>
                <td>{{number_format($key2->product->price)}}</td>
                <td>{{$key2->created_at}}</td>
                <td>
                	<a href="{{url('Admin/cartEdit/'.$key2->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="{{url('Admin/list_order')}}" class="btn btn-sm btn-default pull-right">View All orders</a>
        </div>
        <!-- /.box-footer -->
      </div>
  	</div>
  	
  </div>
  
</section>
    <!-- /.content -->
@endsection