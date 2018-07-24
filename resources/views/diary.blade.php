@extends('layout.index')
@section('content')
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
    <div class="col-xl-8 col-lg-7">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li><a  href="{{url('Admin/profile/'.Auth::user()->id)}}">Timeline</a></li>
          <li><a class="active" href="{{url('Admin/profile/'.Auth::user()->id.'/diary')}}" data-toggle="tab">Nhật ký</a></li>
        </ul>
                    
        <div class="tab-content">   
          <div class="active tab-pane" id="settings">
            <form class="form-horizontal form-element col-12" action="{{url('Admin/profile/'.Auth::user()->id.'/diary')}}" method="post">
              <div class="form-group row">
              	<input type="hidden" value="{{Auth::user()->id}}" name="id" class="form-control" id="inputName" readonly>
                <label  class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="{{Auth::user()->name}}" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label  class="col-sm-2 control-label">Nhật ký</label>

                <div class="col-sm-10">
                  	<input type="text" name="diary" class="form-control" id="inputEmail" placeholder="" >
                </div>
              </div>
              <div class="form-group row">
                <div class="ml-auto col-sm-10">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
            </form>
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