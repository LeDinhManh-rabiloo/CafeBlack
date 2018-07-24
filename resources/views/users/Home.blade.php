@extends('users.layout.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <aside class="sidebar-left">
                <h3 class="mb20">I am Looking For</h3>
                <ul class="nav nav-tabs nav-stacked nav-coupon-category nav-coupon-category-left">
                    <li><a href="#"><i class="fa fa-cutlery"></i>Food & Drink<span>47</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-calendar"></i>Events<span>37</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-female"></i>Beauty<span>48</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-bolt"></i>Fitness<span>35</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-headphones"></i>Electronics<span>40</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-image"></i>Furniture<span>48</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-umbrella"></i>Fashion<span>43</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i>Shopping<span>32</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-home"></i>Home & Graden<span>49</span></a>
                    </li>
                    <li><a href="#"><i class="fa fa-plane"></i>Travel<span>44</span></a>
                    </li>
                </ul>
            </aside>
        </div>
        <div class="col-md-9">
            <h1 class="mb20">Weekly Featured <small><a href="#">View All</a></small></h1>
            <div class="row row-wrap">
                <a class="col-md-4" href="#">
                    <div class="product-thumb">
                        <header class="product-header">
                            <img src="{{asset('users/img/amaze_800x600.jpg')}}" alt="Image Alternative text" title="AMaze" />
                        </header>
                        <div class="product-inner">
                            <h5 class="product-title">New Glass Collection</h5>
                            <p class="product-desciption">Consequat nullam potenti ac sagittis iaculis justo sociis</p>
                            <div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 4 days 49 h remaining</span>
                                <ul class="product-price-list">
                                    <li><span class="product-price">$126</span>
                                    </li>
                                    <li><span class="product-old-price">$268</span>
                                    </li>
                                    <li><span class="product-save">Save 47%</span>
                                    </li>
                                </ul>
                            </div>
                            <p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="gap gap-small"></div>
    <h1 class="mb20">Sản phẩm mới <small><a href="#">View All</a></small></h1>
   
    <div class="row row-wrap">
     @foreach($data as $dt)
        <a class="col-md-4" href="#">
            <div class="product-thumb">
                <header class="product-header">
                    <img src="{{asset($dt->image)}}" alt="Image Alternative text" title="waipio valley" />
                </header>
                <div class="product-inner">
                    <h5 class="product-title">{{$dt->name}}</h5>
                    <p class="product-desciption">{{$dt->category->name}}</p>
                    <div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 1 day 14 h remaining</span>
                        <ul class="product-price-list">
                            <li><span class="product-price">{{$dt->price}}</span>
                            </li>
                        </ul>
                    </div>
                    <p class="product-location"><i class="fa fa-map-marker"></i> {{$dt->origin}}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    
    <!-- <div class="row row-wrap">
        <a class="col-md-3" href="#">
            <div class="product-thumb">
                <header class="product-header">
                    <img src="{{asset('users/img/cup_on_red_800x600.jpg')}}" alt="Image Alternative text" title="Cup on red" />
                </header>
                <div class="product-inner">
                    <h5 class="product-title">Fancy Coffe Cup</h5>
                    <p class="product-desciption">Justo ornare ullamcorper volutpat fusce taciti augue justo</p>
                    <div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 8 days 41 h remaining</span>
                        <ul class="product-price-list">
                            <li><span class="product-price">$53</span>
                            </li>
                            <li><span class="product-old-price">$143</span>
                            </li>
                            <li><span class="product-save">Save 37%</span>
                            </li>
                        </ul>
                    </div>
                    <p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
                </div>
            </div>
        </a>
    </div> -->
    <div class="gap gap-small"></div>
    <h1 class="mb20">Popular <small><a href="#">View All</a></small></h1>
    <div class="row row-wrap">
        <a class="col-md-4" href="#">
            <div class="product-thumb">
                <header class="product-header">
                    <img src="{{asset('users/img/our_coffee_miss_u_800x600.jpg')}}" alt="Image Alternative text" title="Our Coffee miss u" />
                </header>
                <div class="product-inner">
                    <h5 class="product-title">Coffe Shop Discount</h5>
                    <p class="product-desciption">Hendrerit tempus tellus malesuada mi magnis litora ridiculus</p>
                    <div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i>  6 h remaining</span>
                        <ul class="product-price-list">
                            <li><span class="product-price">$48</span>
                            </li>
                            <li><span class="product-old-price">$119</span>
                            </li>
                            <li><span class="product-save">Save 40%</span>
                            </li>
                        </ul>
                    </div>
                    <p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
                </div>
            </div>
        </a>
        
    </div>
    <div class="gap"></div>
</div>
@endsection