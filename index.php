<?php
include('class/Controller.php');
$obj=new Controller();
$data=$obj->get_product();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<!--=============== basic  ===============-->
<meta charset="UTF-8">
<title>Inventory Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<!--=============== css  ===============-->
<link type="text/css" rel="stylesheet" href="asset/css/reset.css">
<link type="text/css" rel="stylesheet" href="asset/css/plugins.css">
<link type="text/css" rel="stylesheet" href="asset/css/style.css">
<link type="text/css" rel="stylesheet" href="asset/css/color.css">
<!--=============== favicons ===============-->
<link rel="shortcut icon" href="asset/images/favicon.ico">
</head>
<body>

<!-- Main  -->
<div id="main">
<!-- header-->
<header class="main-header dark-header fs-header sticky">
<div class="header-inner">
<div class="logo-holder">
<a href="asset/index-2.html"><span style="font-size:30px;color:#fff;font-weight:900;">Inventory Management</span></a>
</div>
<div class="header-search vis-header-search">
<div class="header-search-input-item">
<input type="text" placeholder="Keywords" value=""/>
</div>
<div class="header-search-select-item">
<select data-placeholder="All Categories" class="chosen-select" >
<option>All Categories</option>
<option>Shops</option>
<option>Hotels</option>
<option>Restaurants</option>
<option>Fitness</option>
<option>Events</option>
</select>
</div>
<button class="header-search-button" onclick="window.location.href='listing.html'">Search</button>
</div>
<div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>

<a href="asset/dashboard-add-listing.html" class="add-list">Add Listing <span><i class="fa fa-plus"></i></span></a>
<div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Sign In</div>
<!-- nav-button-wrap-->
<div class="nav-button-wrap color-bg">
<div class="nav-button">
<span></span><span></span><span></span>
</div>
</div>
<!-- nav-button-wrap end-->
<!--  navigation -->
<div class="nav-holder main-menu">
<nav>
<ul>
<li>
    <a href="asset/#" class="act-link">Home</a>
</li>
<li>
    <a href="asset/listing.html">Listings <i class="fa fa-caret-down"></i></a>
    <!--second level -->
    <ul>
        <li><a href="asset/#">Listings Submenu</a></li> 
        <li><a href="asset/#">Listings Submenu 1</a></li>
        <li><a href="asset/#">Listings Submenu 2</a></li>
        <li>
            <a href="asset/#">Listings Submenu 3 <i class="fa fa-caret-down"></i></a>
            <!--third  level  -->
            <ul>
                <li><a href="asset/#">Listings Submenu Sub</a></li> 
				<li><a href="asset/#">Listings Submenu Sub 1</a></li>
				<li><a href="asset/#">Listings Submenu Sub 2</a></li>
            </ul>
            <!--third  level end-->
        </li>
    </ul>
    <!--second level end-->
</li>
</ul>
</nav>
</div>
<!-- navigation  end -->
</div>
</header>
<!--  header end -->
<!--  wrapper  -->
<div id="wrapper">
<!-- Content-->
<div class="content">

<!--section -->
<section id="sec2">
<div class="container">                           
<!-- portfolio start -->
<div class="gallery-items fl-wrap four-column mr-bot grid-small-pad">

<?php  while ($d=$data->fetch(PDO::FETCH_ASSOC)) {?>
<!-- gallery-item-->
<div class="gallery-item">
    <div class="grid-item-holder">
        <div class="listing-item-grid">
            <img  src="upload/<?php echo $d['photo'] ?>" alt="">
            <div class="listing-item-cat">
                <h3><a href="details.php"><?php echo $d['name'] ?></a></h3>
                <p>Price: <?php echo $d['price'] ?></p>
            </div>
        </div>
    </div>
</div>
<!-- gallery-item end-->
<?php } ?>

</div>
<!-- portfolio end -->
<a href="asset/listing.html" class="btn  big-btn circle-btn dec-btn  color-bg flat-btn">View All<i class="fa fa-eye"></i></a>
</div>
</section>
<!-- section end -->
</div>
<!-- Content end -->
</div>
<!-- wrapper end -->
<!--footer -->
<footer class="main-footer dark-footer">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div class="footer-widget fl-wrap">
<h3>About Us</h3>
<div class="footer-contacts-widget fl-wrap">
    <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam. </p>
    <ul class="footer-contacts fl-wrap">
        <li><span><i class="fa fa-envelope-o"></i> Mail :</span><a href="asset/#" target="_blank">pinkuislam71@gmail.com</a></li>
        <li> <span><i class="fa fa-map-marker"></i> Adress :</span><a href="asset/#" target="_blank">Dhanmondi,Dhaka</a></li>
        <li><span><i class="fa fa-phone"></i> Phone :</span><a href="asset/#">+8801822121887</a></li>
    </ul>
</div>
</div>
</div>
</div>
</div>
<div class="sub-footer fl-wrap">
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="about-widget" style="text-align:center;">
    <span style="font-size:30px;color:#fff;font-weight:900;float:left;">Inventory Management</span>
</div>
</div>
<div class="col-md-4">
<div class="copyright"> &#169; Inventory Management 2020 .  All rights reserved.</div>
</div>
<div class="col-md-4">
<div class="footer-social">
    <ul>
        <li><a href="asset/#" target="_blank" ><i class="fa fa-facebook-official"></i></a></li>
        <li><a href="asset/#" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="asset/#" target="_blank" ><i class="fa fa-chrome"></i></a></li>
        <li><a href="asset/#" target="_blank" ><i class="fa fa-vk"></i></a></li>
        <li><a href="asset/#" target="_blank" ><i class="fa fa-whatsapp"></i></a></li>
    </ul>
</div>
</div>
</div>
</div>
</div>
</footer>
<!--footer end  -->
<!--register form -->
<div class="main-register-wrap modal">
<div class="main-overlay"></div>
<div class="main-register-holder">
<div class="main-register fl-wrap">
<div class="close-reg"><i class="fa fa-times"></i></div>
<h3>Sign In <span>Got<strong>Dial</strong></span></h3>
<div class="soc-log fl-wrap">
<p>For faster login or register use your social account.</p>
<a href="asset/#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
<a href="asset/#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
</div>
<div class="log-separator fl-wrap"><span>or</span></div>
<div id="tabs-container">
<ul class="tabs-menu">
<li class="current"><a href="asset/#tab-1">Login</a></li>
<li><a href="asset/#tab-2">Register</a></li>
</ul>
<div class="tab">
<div id="tab-1" class="tab-content">
    <div class="custom-form">
        <form method="post"  name="registerform">
            <label>Username or Email Address * </label>
            <input name="email" type="text"   onClick="this.select()" value="">
            <label >Password * </label>
            <input name="password" type="password"   onClick="this.select()" value="" >
            <button type="submit"  class="log-submit-btn"><span>Log In</span></button>
            <div class="clearfix"></div>
            <div class="filter-tags">
                <input id="check-a" type="checkbox" name="check">
                <label for="check-a">Remember me</label>
            </div>
        </form>
        <div class="lost_password">
            <a href="asset/#">Lost Your Password?</a>
        </div>
    </div>
</div>
<div class="tab">
    <div id="tab-2" class="tab-content">
        <div class="custom-form">
            <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                <label >First Name * </label>
                <input name="name" type="text"   onClick="this.select()" value="">
                <label>Second Name *</label>
                <input name="name2" type="text"  onClick="this.select()" value="">
                <label>Email Address *</label>
                <input name="email" type="text"  onClick="this.select()" value="">
                <label >Password *</label>
                <input name="password" type="password"   onClick="this.select()" value="" >
                <button type="submit"     class="log-submit-btn"  ><span>Register</span></button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!--register form end -->
<a class="to-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->     
<script type="text/javascript" src="asset/js/jquery.min.js"></script>
<script type="text/javascript" src="asset/js/plugins.js"></script>
<script type="text/javascript" src="asset/js/scripts.js"></script>
</body>
</html>