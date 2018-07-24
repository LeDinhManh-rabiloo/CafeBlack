@extends('layout.index')
@section('content')
    <!-- Main content -->
<section class="content">
@if(Auth::check())
  <div class="row">
    <div class="col-xl-4 col-lg-5">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="{{asset(Auth::user()->image)}}" alt="User profile picture">

          <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

          <p class="text-muted text-center">{{Auth::user()->email}}</p>
			
          <div class="row social-states">
			  <div class="col-6 text-right"><a href="#" class="link"><i class="ion ion-ios-people-outline"></i> 254</a></div>
			  <div class="col-6 text-left"><a href="#" class="link"><i class="ion ion-images"></i> 54</a></div>
		  </div>
        
          <div class="row">
          	<div class="col-12">
          		<div class="profile-user-info">
					<p>Email address </p>
					<h6 class="margin-bottom">{{Auth::user()->email}}</h6>
					<p class="margin-bottom">Social Profile</p>
					<div class="user-social-acount">
						<button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
						<button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
						<button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
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
    <div class="col-xl-8 col-lg-7">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          
          <li><a class="active" href="#timeline" data-toggle="tab">Timeline</a></li>
          <li><a href="{{url('Admin/profile/'.Auth::user()->id.'/diary')}}">Nhật ký</a></li>
        </ul>
                    
        <div class="tab-content">
         
         <div class="active tab-pane" id="timeline">
            <!-- The timeline -->
            @foreach($arr2 as $key)
            <ul class="timeline">
				<!-- timeline time label -->
				<li class="time-label">
					  <span class="bg-green">
						{{$key->created_at}}
					  </span>
				</li>
				<!-- /.timeline-label -->
				<!-- timeline item -->
				<li>
				  <i class="ion ion-email bg-blue"></i>

				  <div class="timeline-item">
					<span class="time"><i class="fa fa-clock-o"></i>{{$key->created_at}}</span>

					<h3 class="timeline-header"><a href="#">Genelia</a> sent you an email</h3>

					<div class="timeline-body">
					 {{$key->infor}}
					</div>
					<div class="timeline-footer text-right">
					  <a href="#" class="btn btn-primary btn-sm">Read more</a>
					  <a href="#" class="btn btn-danger btn-sm">Delete</a>
					</div>
				  </div>
				</li>
				<!-- END timeline item -->
				<!-- timeline item -->
				<!-- END timeline item -->
				<!-- timeline item -->
				<!-- END timeline item -->
				<!-- timeline time label -->
				@endforeach
			  </ul>
          </div>    
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
@endif
</section>
@endsection