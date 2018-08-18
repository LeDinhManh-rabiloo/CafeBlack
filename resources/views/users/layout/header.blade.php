 <div class="demo_changer" id="demo_changer">
    <div class="demo-icon fa fa-sliders"></div>
    <div class="form_holder">
            <div class="line"></div>
            <p>Color Scheme</p>
            <div class="predefined_styles" id="styleswitch_area">
                <a href="index-coupon-layout-3c392.html?default=true" class="styleswitch" style="background:#2A8FBD"></a>
                <a href="#" data-source="apple" class="styleswitch" style="background:#56AD48"></a>
                <a href="#" data-source="pink" class="styleswitch" style="background:#FF0066"></a>
                <a href="#" data-source="teal" class="styleswitch" style="background:#1693A5"></a>
                <a href="#" data-source="gold" class="styleswitch" style="background:#FBB829"></a>
                <a href="#" data-source="downy" class="styleswitch" style="background:#6dcda7"></a>
                <a href="#" data-source="atlantis" class="styleswitch" style="background:#8cc732"></a>
                <a href="#" data-source="red" class="styleswitch" style="background:#FF0000"></a>
                <a href="#" data-source="violet" class="styleswitch" style="background:#D31996"></a>
                <a href="#" data-source="pomegranate" class="styleswitch" style="background:#F02311"></a>
                <a href="#" data-source="violet-red" class="styleswitch" style="background:#F23A65"></a>
                <a href="#" data-source="mexican-red" class="styleswitch" style="background:#9b2139"></a>
                <a href="#" data-source="victoria" class="styleswitch" style="background:#544AA1"></a>
                <a href="#" data-source="orient" class="styleswitch" style="background:#025D8C"></a>
                <a href="#" data-source="jgger" class="styleswitch" style="background:#420943"></a>
                <a href="#" data-source="de-york" class="styleswitch" style="background:#8CCA91"></a>
                <a href="#" data-source="blaze-orange" class="styleswitch" style="background:#FF6600"></a>
                <a href="#" data-source="hot-pink" class="styleswitch" style="background:#FF5EAA"></a>
            </div>
            <div class="line"></div>
            <p>Layout</p>
            <div class="predefined_styles">
                <a href="#" class="btn btn-sm" id="btn-wide">Wide</a>
                <a href="#" class="btn btn-sm" id="btn-boxed">Boxed</a>
            </div>
            <div class="line"></div>
    </div>
</div>
<header class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- MAIN NAVIGATION -->
                <div class="flexnav-menu-button" id="flexnav-menu-button">Menu</div>
                <nav>
                    <ul class="nav nav-pills flexnav" id="flexnav" data-breakpoint="800">
                        <li ><a href="{{url('Home')}}">Trang chủ</a>
                        </li>
                    </ul>
                </nav>
                <!-- END MAIN NAVIGATION -->
            </div>
            <div class="col-md-6">
                <!-- LOGIN REGISTER LINKS -->
                <ul class="login-register">
                    <li class="shopping-cart"><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i>My Cart</a>
                        <div class="shopping-cart-box">
                            @if(Auth::check())
                            @foreach($contents as $ctt)
                            @if( $ctt->options->id_users == Auth::user()->id )
                            <ul class="shopping-cart-items">
                                <li>
                                    <a href="product-shop-sidebar.html">
                                        <img src="{{asset($ctt->options->img)}}" alt="Image Alternative text" title="AMaze" style="width: 70px;height: 70px;" />
                                        <h5>{{$ctt->name}}</h5><span class="shopping-cart-item-price">{{number_format($ctt->price)}} VNĐ</span>
                                    </a>
                                </li>
                            </ul>
                            @endif
                            @endforeach
                            @endif
                            <ul class="list-inline text-center">
                                <li><a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> View Cart</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                     <li class="dropdown user user-menu">
                        @if(Auth::check() && Auth::user()->status == 0)
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset(Auth::user()->image)}}" class="user-image rounded-circle" alt="User Image">
                     </a>
                        <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <!-- Menu Footer-->
                    <li class="user-footer">
                        <div>
                        <a href="{{url('don-hang/'.Auth::user()->id)}}" class="btn btn-block btn-primary">Đơn hàng của bạn</a>
                        </div>
                        <div>
                        <a href="{{url('userlogout')}}" class="btn btn-block btn-danger">Sign out</a>
                        </div>
                    </li>
                    </ul>
                </li>
            @else
                    <li><a class="" href="{{url('login')}}"><i class="fa fa-sign-in"></i>Sign in</a>
                    </li>
                    <li><a class="" href="{{url('register')}}" ><i class="fa fa-edit"></i>Sign up</a>
                    </li>
            @endif
                </ul>
            </div>
        </div>
    </div>
</header>


<!--        Start slide         -->
@include('users.layout.slide')
<!--        End slide           -->

<form class="search-area form-group search-area-dark" action="{{url('seach')}}" method="get">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="container">
        <div class="row">
            <div class="col-md-8 clearfix">
                <label><i class="fa fa-search"></i><span>Tìm kiếm mặt hàng</span>
                </label>
                <div class="search-area-division search-area-division-input">
                    <input class="form-control" type="text" placeholder="Tên mặt hàng" name="key" />
                </div>
            </div>
            <div class="col-md-1">
                <button class="btn btn-block btn-white search-btn" type="submit">Search</button>
            </div>
        </div>
    </div>
</form>
    <!-- END SEARCH AREA -->

<div class="gap"></div>
