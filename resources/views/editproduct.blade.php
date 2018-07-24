@extends('layout.index')
@section('content')
<div class="box"> 
<h3 class="box-title">Form sửa sản phẩm</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
<div class="box-body">
   <div class="row">
      <div class="col">
         @foreach($arr as $key)
          <form novalidate action="{{url('Admin/Edit/'.$key->id)}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <h5>Tên sản phẩm <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="product" placeholder ="{{$key->name}}" class="form-control" required data-validation-required-message="This field is required"> 
            </div>
          </div>
          <div class="form-group">
            <h5>Xuất xứ<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="origin" class="form-control" placeholder ="{{$key->origin}}" required data-validation-required-message="This field is required"> 
            </div>
          </div>
          <div class="form-group">
            <h5>Đơn giá <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="number" name="price" data-validation-match-match="number" class="form-control" placeholder ="{{$key->price}}" required> 
            </div>
          </div>
          
          <div class="form-group">
            <h5>Ảnh sản phẩm <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="file" name="image" class="form-control" required> 
            </div>
          </div>
          <div class="form-group">
            <h5>Loại sản phẩm <span class="text-danger">*</span></h5>
            <div class="controls">
              <select name="category" id="select" required class="form-control">
                @foreach($arr2 as $key2)
                <option
                @if($key->id_category == $key2->id)
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