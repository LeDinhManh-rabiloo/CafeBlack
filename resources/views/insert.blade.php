@extends('layout.index')
@section('content')
<div class="box"> 
<h3 class="box-title">Form nhập sản phẩm</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
<div class="box-body">
          <div class="row">
            <div class="col">
              <form novalidate action="{{url('Admin/insert')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
            <h5>Tên sản phẩm <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="product" class="form-control" required data-validation-required-message="This field is required"> </div>
          </div>
          <div class="form-group">
            <h5>Xuất xứ<span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="text" name="origin" class="form-control" required data-validation-required-message="This field is required"> </div>
          </div>
          <div class="form-group">
            <h5>Đơn giá <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="number" name="price" data-validation-match-match="password" class="form-control" required> </div>
          </div>
          <div class="form-group">
            <h5>Ảnh sản phẩm <span class="text-danger">*</span></h5>
            <div class="controls">
              <input type="file" name="image" class="form-control" required> </div>
          </div>
          <div class="form-group">
            <h5>Loại sản phẩm <span class="text-danger">*</span></h5>
            <div class="controls">
              <select name="category" id="select" required class="form-control">
                @foreach($arr as $key)
                <option value="{{$key->id}}">{{$key->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <h5>Thông tin sản phẩm <span class="text-danger">*</span></h5>
            <textarea name="content" class="form-control"></textarea>
            <script>
              CKEDITOR.replace('content');
            </script>
          </div>
          <div class="text-xs-right">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  @endsection