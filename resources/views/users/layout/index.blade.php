<!DOCTYPE HTML>
<html>


<!-- Mirrored from remtsoy.com/tf_templates/couponia/demo_v3_3/index-coupon-layout-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Jul 2018 10:22:40 GMT -->
<head>
    <!-- meta info -->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Koupon HTML5 Template" />
    <meta name="description" content="Koupon - Premiun HTML5 Template for Coupons Website">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('images/faker.ico')}}">

    <title>Cafe-Black</title>
    
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/vendor_components/Ionicons/css/ionicons.min.css')}}">

    <!-- Theme style -->
    
    <!-- Bootstrap styles -->
    <!-- <link rel="stylesheet" href="{{asset('assets/vendor_components/bootstrap/dist/css/bootstrap.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('users/css/boostrap.css')}}">
    <!-- Font Awesome styles (icons) -->
    <link rel="stylesheet" href="{{asset('users/css/font_awesome.css')}}">
    <!-- Main Template styles -->
    <link rel="stylesheet" href="{{asset('users/css/styles.css')}}">
    <!-- IE 8 Fallback -->
    <!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->

    <!-- Your custom styles (blank file) -->
    <link rel="stylesheet" href="{{asset('users/css/mystyles.css')}}">

    <link rel="stylesheet" href="{{asset('users/css/switcher.css')}}">
    <!-- Demo Examples -->
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/apple.css')}}" title="apple" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/pink.css')}}" title="pink" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/teal.css')}}" title="teal" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/gold.css')}}" title="gold" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/downy.css')}}" title="downy" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/atlantis.css')}}" title="atlantis" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/red.css')}}" title="red" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/violet.css')}}" title="violet" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/pomegranate.css')}}" title="pomegranate" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/violet-red.css')}}" title="violet-red" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/mexican-red.css')}}" title="mexican-red" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/victoria.css')}}" title="victoria" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/orient.css')}}" title="orient" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/jgger.css')}}" title="jgger" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/de-york.css')}}" title="de-york" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/blaze-orange.css')}}" title="blaze-orange" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="{{asset('users/css/schemes/hot-pink.css')}}" title="hot-pink" media="all" />
    <!-- END Demo Examples -->

</head>

<body class="boxed" style="background-image: url(img/patterns/food.png)">


    <div class="global-wrap">
        @include('users.layout.header')
        <!-- //////////////////////////////////
	//////////////MAIN HEADER///////////// 
	////////////////////////////////////-->
   

        <!-- LOGIN REGISTER LINKS CONTENT -->
        <div id="login-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
            <i class="fa fa-sign-in dialog-icon"></i>
            <h3>Member Login</h3>
            <h5>Welcome back, friend. Login to get started</h5>
            <form class="dialog-form">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" placeholder="email@domain.com" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="My secret password" class="form-control">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox">Remember me
                    </label>
                </div>
                <input type="submit" value="Sign in" class="btn btn-primary">
            </form>
            <ul class="dialog-alt-links">
                <li><a class="popup-text" href="#register-dialog" data-effect="mfp-zoom-out">Not member yet</a>
                </li>
                <li><a class="popup-text" href="#password-recover-dialog" data-effect="mfp-zoom-out">Forgot password</a>
                </li>
            </ul>
        </div>


        <div id="register-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
            <i class="fa fa-edit dialog-icon"></i>
            <h3>Member Register</h3>
            <h5>Ready to get best offers? Let's get started!</h5>
            <form class="dialog-form">
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" placeholder="email@domain.com" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" placeholder="My secret password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Repeat Password</label>
                    <input type="password" placeholder="Type your password again" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Your Area</label>
                            <input type="password" placeholder="Boston" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Postal/Zip</label>
                            <input type="password" placeholder="12345" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox">Get hot offers via e-mail
                    </label>
                </div>
                <input type="submit" value="Sign up" class="btn btn-primary">
            </form>
            <ul class="dialog-alt-links">
                <li><a class="popup-text" href="#login-dialog" data-effect="mfp-zoom-out">Already member</a>
                </li>
            </ul>
        </div>


        <div id="password-recover-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
            <i class="icon-retweet dialog-icon"></i>
            <h3>Password Recovery</h3>
            <h5>Fortgot your password? Don't worry we can deal with it</h5>
            <form class="dialog-form">
                <label>E-mail</label>
                <input type="text" placeholder="email@domain.com" class="span12">
                <input type="submit" value="Request new password" class="btn btn-primary">
            </form>
        </div>
        <!-- END LOGIN REGISTER LINKS CONTENT -->


        <!-- TOP AREA -->
        <!-- END TOP AREA -->

        <!-- SEARCH AREA -->
       


        <!-- //////////////////////////////////
	//////////////END MAIN HEADER////////// 
	////////////////////////////////////-->


        <!-- //////////////////////////////////
	//////////////PAGE CONTENT///////////// 
	////////////////////////////////////-->



      @yield('content')


        <!-- //////////////////////////////////
	//////////////END PAGE CONTENT///////// 
	////////////////////////////////////-->

        <!--Start footer-->
        @include('users.layout.footer')
    
        <!-- End footer -->


        <!-- Scripts queries -->
        <script src="{{asset('users/js/jquery.js')}}"></script>
        <script src="{{asset('users/js/boostrap.min.js')}}"></script>
        <script src="{{asset('users/js/countdown.min.js')}}"></script>
        <script src="{{asset('users/js/flexnav.min.js')}}"></script>
        <script src="{{asset('users/js/magnific.js')}}"></script>
        <script src="{{asset('users/js/tweet.min.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
        <script src="{{asset('users/js/fitvids.min.js')}}"></script>
        <script src="{{asset('users/js/mail.min.js')}}"></script>
        <script src="{{asset('users/js/ionrangeslider.js')}}"></script>
        <script src="{{asset('users/js/icheck.js')}}"></script>
        <script src="{{asset('users/js/fotorama.js')}}"></script>
        <script src="{{asset('users/js/card-payment.js')}}"></script>
        <script src="{{asset('users/js/owl-carousel.js')}}"></script>
        <script src="{{asset('users/js/masonry.js')}}"></script>
        <script src="{{asset('users/js/nicescroll.js')}}"></script>

        <!-- Custom scripts -->
        <script src="{{asset('users/js/custom.js')}}"></script>
        <script src="{{asset('users/js/switcher.js')}}"></script>
    </div>
</body>


<!-- Mirrored from remtsoy.com/tf_templates/couponia/demo_v3_3/index-coupon-layout-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Jul 2018 10:25:59 GMT -->
</html>
