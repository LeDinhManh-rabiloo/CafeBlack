@extends('users.layout.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <aside class="sidebar-left">
                <h3 class="mb20">Danh mục sản phẩm</h3>
                <ul class="nav nav-tabs nav-stacked nav-coupon-category nav-coupon-category-left">
                    @foreach($category as $cate)
                    <li><a href="{{url('san-pham/'.$cate->name.$cate->id)}}"><i class="{{$cate->fontsicons->code}}"></i>{{$cate->name}}<span style="font-size: 12px;">
                        <?php $dem =0; ?>
                        @foreach($product as $pro)
                        @if($pro->id_category == $cate->id)
                        <?php $dem++ ?>
                        @endif
                        @endforeach
                        {{$dem}}
                    </span></a>
                    </li>
                    @endforeach
                </ul>
            </aside>
        </div>
        <div class="col-md-9">
            <h1 class="mb20">Weekly Featured </h1>
            <div class="row row-wrap">
    <?php $countP = 0 ?>
     @foreach($datan as $dtn)
     @if(Auth::check())
     <input type="hidden" name="" id="pr_id<?php echo $countP;?>" value="{{$dtn->id}}">
     <input type="hidden" name="" id="userId" value="{{Auth::user()->id}}">
        <div class="col-md-4">
            <div class="product-thumb">
                <header class="product-header" style="height: 200px;">
                    <img src="{{asset($dtn->image)}}" alt="Image Alternative text" title="Green Furniture" style="height: 100%" />
                </header>
                <div class="product-inner">
                    <ul class="icon-group icon-list-rating" title="3.7/5 rating">
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star-o"></i>
                        </li>
                    </ul>
                    <h5 class="product-title">{{$dtn->name}}</h5>
                    <p class="product-desciption">{{$dtn->origin}}</p>
                    <div class="product-meta">
                        <ul class="product-price-list">
                            @if($dtn->sale !='')
                            <li>
                                <span class="product-price" style="font-size: 10px;">
                                    {{ number_format($dtn->price - ($dtn->price*($dtn->sale->percent)/100)) }}VNĐ
                                </span>
                            </li>
                            <li><span class="product-old-price" style="height: 30px; font-size: 10px;">{{ number_format($dtn->price) }}VNĐ</span>
                            </li>
                            <li><span class="product-save" style="font-size: 10px;">Sale {{$dtn->sale->percent}}%</span>
                            </li>
                            @else
                            <li><span class="product-price">{{number_format($dtn->price)}}VNĐ</span><!-- number_format(): dùng để format kiểu number -->
                            </li>
                            @endif
                        </ul>
                        <ul class="product-actions-list">
                            <li><button class="btn btn-sm to-cart" id="AddCart<?php echo $countP++?>"><i class="fa fa-shopping-cart"></i> To Cart</button>
                            </li>
                            <li><a class="btn btn-sm" href="{{url('infoproduct/'.$dtn->id)}}"><i class="fa fa-bars"></i> Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-3">
            <div class="product-thumb">
                <header class="product-header" style="height: 200px">
                    <img src="{{asset($dtn->image)}}" alt="Image Alternative text" title="Green Furniture"style="height: 100%" />
                </header>
                <div class="product-inner">
                    <ul class="icon-group icon-list-rating" title="3.7/5 rating">
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star-o"></i>
                        </li>
                    </ul>
                    <h5 class="product-title">{{$dtn->name}}</h5>
                    <p class="product-desciption">{{$dtn->origin}}</p>
                    <div class="product-meta">
                        <ul class="product-price-list">
                            @if($dtn->sale !='')
                            <li>
                                <span class="product-price" style="font-size: 10px;">
                                    {{ number_format($dtn->price - ($dtn->price*($dtn->sale->percent)/100)) }}VNĐ
                                </span>
                            </li>
                            <li><span class="product-old-price" style="height: 30px; font-size: 10px;">{{ number_format($dtn->price) }}VNĐ</span>
                            </li>
                            <li><span class="product-save" style="font-size: 10px;">Sale {{$dtn->sale->percent}}%</span>
                            </li>
                            @else
                            <li><span class="product-price">{{number_format($dtn->price)}}VNĐ</span><!-- number_format(): dùng để format kiểu number -->
                            </li>
                            @endif
                        </ul>
                        <ul class="product-actions-list">
                            <li><a class="btn btn-sm" href="{{url('login')}}"><i class="fa fa-shopping-cart"></i> To Cart</a>
                            </li>
                            <li><a class="btn btn-sm" href="{{url('infoproduct/'.$dtn->id)}}"><i class="fa fa-bars"></i> Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <?php $countP+1 ?>
        @endforeach
    </div>
        </div>
    </div>
    <div class="gap gap-small"></div>
    <h1 class="mb20">Sản phẩm mới <small><a href="#">View All</a></small></h1>
    <div class="row row-wrap">
    <?php $countmax = 0 ?>
     @foreach($data as $dt)
     @if(Auth::check())
     <input type="hidden" name="" id="pro_id<?php echo $countmax;?>" value="{{$dt->id}}">
     <input type="hidden" name="" id="user_id" value="{{Auth::user()->id}}">
        <div class="col-md-3">
            <div class="product-thumb">
                <header class="product-header" style="height: 200px;">
                    <img src="{{asset($dt->image)}}" alt="Image Alternative text" title="Green Furniture" style="height: 100%" />
                </header>
                <div class="product-inner">
                    <ul class="icon-group icon-list-rating" title="3.7/5 rating">
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star-o"></i>
                        </li>
                    </ul>
                    <h5 class="product-title">{{$dt->name}}</h5>
                    <p class="product-desciption">{{$dt->origin}}</p>
                    <div class="product-meta">
                        <ul class="product-price-list">
                            @if($dt->sale !='')
                            <li>
                                <span class="product-price" style="font-size: 10px;">
                                    {{ number_format($dt->price - ($dt->price*($dt->sale->percent)/100)) }}VNĐ
                                </span>
                            </li>
                            <li><span class="product-old-price" style="height: 30px; font-size: 10px;">{{ number_format($dt->price) }}VNĐ</span>
                            </li>
                            <li><span class="product-save" style="font-size: 10px;">Sale {{$dt->sale->percent}}%</span>
                            </li>
                            @else
                            <li><span class="product-price">{{number_format($dt->price)}}VNĐ</span><!-- number_format(): dùng để format kiểu number -->
                            </li>
                            @endif
                        </ul>
                        <ul class="product-actions-list">
                            <li><button class="btn btn-sm to-cart" id="addCart<?php echo $countmax++?>"><i class="fa fa-shopping-cart"></i> To Cart</button>
                            </li>
                            <li><a class="btn btn-sm" href="{{url('infoproduct/'.$dt->id)}}"><i class="fa fa-bars"></i> Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-3">
            <div class="product-thumb">
                <header class="product-header" style="height: 200px">
                    <img src="{{asset($dt->image)}}" alt="Image Alternative text" title="Green Furniture"style="height: 100%" />
                </header>
                <div class="product-inner">
                    <ul class="icon-group icon-list-rating" title="3.7/5 rating">
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star-o"></i>
                        </li>
                    </ul>
                    <h5 class="product-title">{{$dt->name}}</h5>
                    <p class="product-desciption">{{$dt->origin}}</p>
                    <div class="product-meta">
                        <ul class="product-price-list">
                            @if($dt->sale !='')
                            <li>
                                <span class="product-price" style="font-size: 10px;">
                                    {{ number_format($dt->price - ($dt->price*($dt->sale->percent)/100)) }}VNĐ
                                </span>
                            </li>
                            <li><span class="product-old-price" style="height: 30px; font-size: 10px;">{{ number_format($dt->price) }}VNĐ</span>
                            </li>
                            <li><span class="product-save" style="font-size: 10px;">Sale {{$dt->sale->percent}}%</span>
                            </li>
                            @else
                            <li><span class="product-price">{{number_format($dt->price)}}VNĐ</span><!-- number_format(): dùng để format kiểu number -->
                            </li>
                            @endif
                        </ul>
                        <ul class="product-actions-list">
                            <li><a class="btn btn-sm" href="{{url('login')}}"><i class="fa fa-shopping-cart"></i> To Cart</a>
                            </li>
                            <li><a class="btn btn-sm" href="{{url('infoproduct/'.$dt->id)}}"><i class="fa fa-bars"></i> Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <?php $countmax+1 ?>
        @endforeach
    </div>
    <div class="gap gap-small"></div>
    <h1 class="mb20">Dành riêng cho bạn<small><a href="#">View All</a></small></h1>
    <div class="row row-wrap">
        <?php $count = 0 ?>
        @foreach($datax as $dtx)
        @if(Auth::check())
        <input type="hidden" name="" id="p_id<?php echo $count; ?>" value="{{$dtx->id}}">
        <input type="hidden" name="" id="u_id" value="{{Auth:user()->id}}">
        <div class="col-md-3">
            <div class="product-thumb">
                <header class="product-header" style="height: 200px;">
                    <img src="{{asset($dtx->image)}}" alt="Image Alternative text" title="Green Furniture" style="height: 100%" />
                </header>
                <div class="product-inner">
                    <ul class="icon-group icon-list-rating" title="3.7/5 rating">
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star-o"></i>
                        </li>
                    </ul>
                    <h5 class="product-title">{{$dtx->name}}</h5>
                    <p class="product-desciption">{{$dtx->origin}}</p>
                    <div class="product-meta">
                        <ul class="product-price-list">
                            @if($dtx->sale !='')
                            <li>
                                <span class="product-price" style="font-size: 10px;">
                                    {{ number_format($dtx->price - ($dtx->price*($dtx->sale->percent)/100)) }}VNĐ
                                </span>
                            </li>
                            <li><span class="product-old-price" style="height: 30px; font-size: 10px;">{{ number_format($dtx->price) }}VNĐ</span>
                            </li>
                            <li><span class="product-save" style="font-size: 10px;">Sale {{$dtx->sale->percent}}%</span>
                            </li>
                            @else
                            <li><span class="product-price">{{number_format($dtx->price)}}VNĐ</span><!-- number_format(): dùng để format kiểu number -->
                            </li>
                            @endif
                        </ul>
                        <ul class="product-actions-list">
                            <li><button class="btn btn-sm to-cart" id="addCart"><i class="fa fa-shopping-cart"></i> To Cart</button>
                            </li>
                            <li><a class="btn btn-sm" href="{{url('infoproduct/'.$dtx->id)}}"><i class="fa fa-bars"></i> Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-md-3">
                    <div class="product-thumb">
                        <header class="product-header" style="height: 200px;">
                            <img src="{{asset($dtx->image)}}" alt="Image Alternative text" title="Green Furniture" style="height: 100%" />
                        </header>
                        <div class="product-inner">
                            <ul class="icon-group icon-list-rating" title="3.7/5 rating">
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star-o"></i>
                                </li>
                            </ul>
                            <h5 class="product-title">{{$dtx->name}}</h5>
                            <p class="product-desciption">{{$dtx->origin}}</p>
                            <div class="product-meta">
                                <ul class="product-price-list">
                                    @if($dtn->sale !='')
                                    <li>
                                        <span class="product-price" style="font-size: 10px;">
                                            {{ number_format($dtx->price - ($dtx->price*($dtx->sale->percent)/100)) }}VNĐ
                                        </span>
                                    </li>
                                    <li><span class="product-old-price" style="height: 30px; font-size: 10px;">{{ number_format($dtx->price) }}VNĐ</span>
                                    </li>
                                    <li><span class="product-save" style="font-size: 10px;">Sale {{$dtx->sale->percent}}%</span>
                                    </li>
                                    @else
                                    <li><span class="product-price">{{number_format($dtx->price)}}VNĐ</span><!-- number_format(): dùng để format kiểu number -->
                                    </li>
                                    @endif
                                </ul>
                                <ul class="product-actions-list">
                                    <li><a class="btn btn-sm" href="{{url('lgin')}}"><i class="fa fa-shopping-cart"></i> To Cart</a>
                                    </li>
                                    <li><a class="btn btn-sm" href="{{url('infoproduct/'.$dtx->id)}}"><i class="fa fa-bars"></i> Details</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
        <?php $count+1 ?>
        @endforeach
    </div>
    <div class="gap"></div>
</div>
 <script src="{{asset('users/js/jquery.js')}}"></script>
<script>
    $(document).ready(function(){
        <?php $countmax = count($data);
        for($i =0;$i<$countmax;$i++){?>
        $('button#addCart<?php echo $i?>').click(function(){
            var pro_id<?php echo $i;?> = $('#pro_id<?php echo $i;?>').val();
            var user_id = $('#user_id').val();
            $.ajax({
                type:'get',
                url:'<?php echo url('shopping'); ?>' + pro_id<?php echo $i;?> + user_id,
                success:function(){
                    alert('Đã thêm vào đơn hàng');
                }
            });
        });
        <?php } ?>
    });
    $(document).ready(function(){
         <?php $countP = count($datan);
        for($i =0;$i<$countP;$i++){?>
        $('button#AddCart<?php echo $i?>').click(function(){
            var pr_id<?php echo $i;?> = $('#pr_id<?php echo $i;?>').val();
            var userid = $('#userId').val();
            $.ajax({
                type:'get',
                url:'<?php echo url('shopping'); ?>' + pr_id<?php echo $i;?> + userid,
                success:function(){
                    alert('Đã thêm vào đơn hàng');
                }
            });
        });
        <?php } ?>
    });
</script>
@endsection
