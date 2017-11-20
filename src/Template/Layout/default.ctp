<?php use Cake\Routing\Router; ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700' rel='stylesheet' type='text/css'/>
    <link href='/css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="/css/camera.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/appremi/css/vendor.css">
    <!--script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script-->
    <title>HR Tech</title>
</head>
<body>
<div class="page-container">
    <div class="header">
        <nav class="navbar container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a>

                    <img src="/img/logo.png" alt="Sapphire">
                    <?= $this->Html->link('HR Tech', ['controller' => 'Products', 'action' => 'index']) ?>
                </a>
            </div>


            <div class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active"><?= $this->Html->link('Home', ['controller' => 'Products', 'action' => 'index']) ?></li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">sliders</li>
                            <li><a href="nivo-slider.html">Nivo slider</a></li>
                            <li><a href="flexslider.html" class="ajax_right">Flexslider</a></li>
                            <li><a href="index.html" class="ajax_right">Camera</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">ecommerce</li>
                            <li><a href="category.html">Category page</a></li>
                            <li><a href="category_menu.html">Category page left menu</a></li>
                            <li><a href="product.html" class="ajax_right">Product page</a></li>
                            <li><a href="cart.html" class="ajax_right">Cart</a></li>
                            <li><a href="checkout.html" class="ajax_right">Checkout</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Blog</a>
                                <ul class="dropdown-menu">
                                    <li><a href="blog.html" class="ajax_right">Blog</a></li>
                                    <li><a href="blog-post.html" class="ajax_right">Blog post</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Other pages <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-2-columns">
                            <li><a href="index_center.html" class="ajax_right">Homepage center logo</a></li>
                            <li><a href="about.html" class="ajax_right">About</a></li>
                            <li><a href="account.html" class="ajax_right">Account</a></li>
                            <li><a href="forgot-password.html" class="ajax_right">Forgot password</a></li>
                            <li><a href="site-map.html" class="ajax_right">Sitemap</a></li>
                            <li><a href="404.html" class="ajax_right">404 Not found</a></li>
                        </ul>
                    </li>
                    <li><?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']) ?></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html" class="ajax_right">Contact</a></li>
                </ul>

                <ul class="nav navbar-right cart">
                    <li class="dropdown">

                        <a href="" class="dropdown-toggle" data-toggle="dropdown"><span>0</span></a>
                        <div class="cart-info dropdown-menu">

                            <div class="cart-total">
                                <?= $this->Html->link('View Cart', ['controller' => 'Carts', 'action' => 'index']) ?>
                            </div>
                        </div>
                    </li>
                </ul>

                <form action="" class="navbar-form navbar-search navbar-right" role="search">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="Search" class="search-query col-md-2"><button type="submit" class="btn btn-default icon-search"></button>
                    </div>
                </form>

            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

    <?= $this->fetch('content') ?>

    <div class="footer black">
        <div class="container">
            <!-- div class="arrow"><b class="caret"></b></div -->
            <div class="row">
                <div class="col-md-3">
                    <div>
                        <h3>Information</h3>
                        <ul>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div>
                        <h3>Customer Service</h3>
                        <ul>
                            <li><a href="contact.html" class="ajax_right">Contact Us</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Site Map</a></li>
                            <li><a href="#">Shipping</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                </div>


                <div class="col-md-3 social">
                    <div class="copy">Copyright &copy; Md. Rukunujjaman Miaji</div>
                    <ul class="social-network">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='js/jquery-1.10.2.min.js'><\/script>")</script -->
<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/js/camera.js"></script>
<script type="text/javascript" src="/js/sapphire.js"></script>
<script>
    $(document).ready( function()
    {
        jQuery('#slideshow0 > div').camera({
            alignment:"center",
            autoAdvance:true,
            mobileAutoAdvance:true,
            barDirection:"leftToRight",
            barPosition:"bottom",
            cols:6,
            easing:"easeInOutExpo",
            mobileEasing:"easeInOutExpo",
            fx:"random",
            mobileFx:"random",
            gridDifference:250,
            height:"auto",
            hover:true,
            loader:"pie",
            loaderColor:"#eeeeee",
            loaderBgColor:"#222222",
            loaderOpacity:0.3,
            loaderPadding:2,
            loaderStroke:7,
            minHeight:"200px",
            navigation:true,
            navigationHover:true,
            mobileNavHover:true,
            opacityOnGrid:false,
            overlayer:true,
            pagination:true,
            pauseOnClick:true,
            playPause:true,
            pieDiameter:38,
            piePosition:"rightTop",
            portrait:false,
            rows:4,
            slicedCols:12,
            slicedRows:8,
            slideOn:"random",
            thumbnails:false,
            time:7000,
            transPeriod:1500,
            imagePath: '../image/'
        });
    });
</script>
</body>


</html>
