@extends('layout.index')
@section('content')
<div class="box"> 
<h3 class="box-title">Cập nhật đơn hàng</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
<div class="box-body">
   <div class="row">
      <div class="col">
        @foreach($orders as $key)
          <form novalidate action="{{url('Admin/cartEdit/'.$key->id)}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <h5>Mã đơn <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="code_orders" placeholder="{{$key->code_orders}}" class="form-control" readonly> 
            </div>
          </div>
          <div class="form-group">
            <h5>Người nhận <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="customer" placeholder="{{$key->customer->name}}" class="form-control" readonly> 
            </div>
          </div>
          <div class="form-group">
            <h5>Địa chỉ nhận<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="customer" placeholder="{{$key->customer->address}}" class="form-control" readonly> 
            </div>
          </div>
           <div class="form-group">
            <h5>Trạng thái <span class="text-danger">*</span></h5>
            <div class="controls">
              <select name="status" id="select" required class="form-control">
                @foreach($arr as $key2)
                <option
                @if($key->id_status == $key2->id)
                {{"selected"}}
                @endif
                value="{{$key2->id}}">{{$key2->name}}</option>
                }
                }
                @endforeach
              </select>
            </div>
          </div>
          <div class="text-xs-right">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
        </form>
        @endforeach 
      </div>
    </div>
</div>
</div>
@endsection