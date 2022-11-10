<?php
$pageToken = md5(rand());
include_once("finishit.php");
include_once("siteinfo.php");
xstart("0");
include_once("refcoder.php");

if(x_count("portalmode","status='offline' AND id='1' LIMIT 1") > 0){

	finish("notify/maintenance","Access denied!");
	exit();
}
$_SESSION["XCAPE_HACKS"] = md5(rand());
?>
<!DOCTYPE html>
<html>
<head>
  <?php include_once("headed.php");?>
</head>
<body onload="openFullscreen()">
  
  <section data-bs-version="5.1" class="menu menu2 cid-teH97O5qIj" once="menu" id="menu2-6">
  
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                        <img src="assets-new/images/logo8-309x115.png" alt="EP Logo" style="height: 3.6rem;">
                </span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item dropdown open"><a class="nav-link link text-black dropdown-toggle display-4" href="https://mobiri.se" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">ABOUT US</a><div class="dropdown-menu" aria-labelledby="dropdown-305"><a class="text-black dropdown-item display-4" href="https://mobiri.se">Company</a><a class="text-black dropdown-item display-4" href="https://mobiri.se">Services</a></div></li>
                    <li class="nav-item"><a class="nav-link link text-black display-4" href="https://mobiri.se">HOW IT WORKS</a></li></ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="#" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="#" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-twitter socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="#" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-instagram socicon"></span>
                    </a>
                    
                </div>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-4" href="loginAccount">SIGN IN</a></div>
            </div>
        </div>
    </nav>
	
</section>



<section data-bs-version="5.1" class="header1 cid-teH3P2PkAE mbr-fullscreen mbr-parallax-background" id="header1-1">

    

    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-1"><strong>SEND US ON ERRAND</strong></h1>
                <h2 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5">
                        Hassle free Online platform designed just for you and yours to meet your daily demands.You don't have to leave your comfort zone anymore.</h2>

	  <?php include_once("front-search.php");?>

            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" style="background:#fafafa;" class="features1 cid-teHi81L8BC mod-bg-1" id="features1-7">
    

    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                    <strong>Why choose us</strong></h3>
                
            </div>
        </div>
        <div class="row">
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri-clock mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-7"><strong>Fast Delivery</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">You don't have to code to create your own site. Select one of
                            available themes in the Mobirise sitebuilder.</p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri-responsive-2 mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-7"><strong>Realtime Tracking</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">All sites you create with the Mobirise web builder are
                            mobile-friendly natively. No special actions required.</p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri-cash mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-7"><strong>Fast Payments</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">Select the theme that suits you. Each theme in the Mobirise
                            site builder contains a set of unique blocks.</p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-3">
                <div class="card-wrapper">
                    <div class="card-box align-center">
                        <div class="iconfont-wrapper">
                            <span class="mbr-iconfont mobi-mbri-phone mobi-mbri"></span>
                        </div>
                        <h5 class="card-title mbr-fonts-style display-7"><strong>24/7 Support&nbsp;</strong></h5>
                        <p class="card-text mbr-fonts-style display-7">Use Mobirise website building software to create multiple
                            sites for commercial and non-profit projects.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" style="padding-top:100px;" class="form1 cid-teH5TqR92w mbr-parallax-background" id="form1-5">

    

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 255, 255);"></div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 mx-auto mbr-form">
                <form action="" method="POST" class="mbr-form form-with-styler" data-verified="">
                    
                    <div class="dragArea row">
                        <div class="col-12">
                            <h1 class="mbr-section-title mb-2 mbr-fonts-style align-center display-2">
                                <strong>Track Order Status!</strong>
                            </h1>
                        </div>
                        <div class="col-12">
                            <p class="mbr-text mbr-fonts-style mb-5 align-center display-7">Fill the form below to get started.</p>
                        </div>
                        <div class="col-md col-12 form-group mb-3" data-for="name">
                            <input type="text" name="errand-id" placeholder="Enter Errand ID" data-form-field="Name" disabled class="form-control s-input" id="errand-id">
                        </div>
                        
                        <div class="mbr-section-btn col-12 col-md-auto"><button type="submit" class="btn btn-primary display-4 box-btn" disabled>Start Now</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features23 cid-teHJfOlj72" id="features23-b">

    

    
    <div class="container">
        <div class="card-wrapper">
            <div class="card-box align-left">
                <h4 class="mbr-section-title mbr-fonts-style display-2"><strong>Place Orders in minutes!</strong></h4>
                
                
            </div>
        </div>
        <!-- col-12 col-md-6 col-lg-4 -->
        <div class="row justify-content-center content-row mt-4">
            <div class="card p-4 p-md-3 col-md-6 col-lg-4">
                <div class="card-box">
                    <div class="title">
                        <span class="num mbr-fonts-style display-1"><strong>01.</strong></span>
                    </div>
                    <h4 class="card-title mbr-fonts-style display-5">
                        <strong>Create an account</strong></h4>
                    <p class="mbr-text card-text mbr-fonts-style display-7">
                        You must have a valid account with us to in order to transact with us.
                    </p>
                </div>
            </div>
            <div class="card p-4 p-md-3 col-md-6 col-lg-4">
                <div class="card-box">
                    <div class="title">
                        <span class="num mbr-fonts-style display-1"><strong>02.</strong></span>
                    </div>
                    <h4 class="card-title mbr-fonts-style display-5">
                        <strong>Place order</strong></h4>
                    <p class="mbr-text card-text mbr-fonts-style display-7">
                        You have to specify the details of your order while making placement.
                    </p>
                </div>
            </div>
            <div class="card p-4 p-md-3 col-md-6 col-lg-4">
                <div class="card-box">
                    <div class="title">
                        <span class="num mbr-fonts-style display-1"><strong>03.</strong></span>
                    </div>
                    <h4 class="card-title mbr-fonts-style display-5">
                        <strong>Order Processing</strong></h4>
                    <p class="mbr-text card-text mbr-fonts-style display-7">We start processing your order after we receive your errand details.
                    </p>
                </div>
            </div>
            
            
            
            
            
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features16 cid-teHAuTObqX" id="features17-8">
    

    
    <div class="container-fluid">
        <div class="content-wrapper">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5">
                    <div class="image-wrapper">
                        <img src="assets-new/images/company.png" alt="Xelow-gc certificate">
                    </div>
                </div>
                <div class="col-12 col-lg">
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style display-2">
                            <strong>Trade with us and Enjoy Respite</strong></h6>
                        <p class="mbr-text mbr-fonts-style mb-4 display-5"><strong>
                            Errand Pilot</strong> is duly registered under the parent company called <strong>Xelow Global Concept</strong> with registration Number <strong>1836619</strong> with <strong>Corporate Affairs Commission (CAC)</strong></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="features14 cid-teHFpZqq8e" id="features15-9">

    
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <span class="mbr-iconfont m-auto mobi-mbri-cart-full mobi-mbri"></span>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mb-2 display-7"><strong>ORDERS PROCESSED</strong></h4>
                        <h5 class="card-text mbr-fonts-style display-2">1000</h5>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <span class="mbr-iconfont m-auto mobi-mbri-users mobi-mbri"></span>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mb-2 display-7"><strong>REGISTERED USERS</strong></h4>
                        <h5 class="card-text mbr-fonts-style display-2">3000</h5>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <span class="mbr-iconfont m-auto mobi-mbri-user mobi-mbri"></span>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style mb-2 display-7">
                            <strong>REGISTERED RIDERS</strong></h4>
                        <h5 class="card-text mbr-fonts-style display-2">400</h5>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="testimonials2 cid-teKB6UvR4b" id="testimonials2-d">
    
    
    <div class="container">
        <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
            <strong>Testimonials</strong>
        </h3>
        <div class="row justify-content-center">
            <div class="card col-12 col-md-6">
                <p class="mbr-text mbr-fonts-style mb-4 display-7">Themes in the Mobirise website builder offer multiple blocks: intros, sliders, galleries, forms, articles, and so on. Start a project and click on the red plus buttons to see the blocks available for your theme.</p>
                <div class="d-flex mb-md-0 mb-4">
                    <div class="image-wrapper">
                        <img src="assets-new/images/team1.jpg" alt="Mobirise Website Builder">
                    </div>
                    <div class="text-wrapper">
                        <p class="name mbr-fonts-style mb-1 display-4">
                            <strong>Martin Smith</strong>
                        </p>
                        <p class="position mbr-fonts-style display-4">
                            <strong>Client</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6">
                <p class="mbr-text mbr-fonts-style mb-4 display-7">You can have multiple pages in each project in Mobirise website builder software. Don't forget to set links to your pages after creating them. You can use menu blocks to create navigation for your site visitors.</p>
                <div class="d-flex mb-md-0 mb-4">
                    <div class="image-wrapper">
                        <img src="assets-new/images/team2.jpg" alt="Mobirise Website Builder">
                    </div>
                    <div class="text-wrapper">
                        <p class="name mbr-fonts-style mb-1 display-4">
                            <strong>Jessica Brown</strong>
                        </p>
                        <p class="position mbr-fonts-style display-4">
                            <strong>Client</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

			<?php
			// Customers FAQ SECTION
				if(x_count("faqdata","status='active' LIMIT 1") > 0){
					?>

<section data-bs-version="5.1" class="content17 cid-teHINGkSQs" id="content17-a">

    <div class="container">
        
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="section-head align-center mb-4">
                        <h3 class="mbr-section-title mb-0 mbr-fonts-style display-2">
                            <strong>Customers FAQ</strong>
                        </h3>
                        
                    </div>
                    
                    <div id="bootstrap-toggle" class="toggle-panel accordionStyles tab-content">
                       
					   
					<?php
					$postcounter = 0;
					foreach(x_select("0","faqdata","status='active'","10","id desc") as $key){
					$postcounter++;
					$id = $key["id"];
					$title = $key["title"];
					$desc = $key["description"];
					?>
					<div class="card mb-3">
                            <div class="card-header" role="tab" id="headingOne">
                                <a role="button" class="collapsed panel-title text-black" data-toggle="collapse" data-bs-toggle="collapse" data-core="" href="#collapse1_<?php echo $id;?>" aria-expanded="false" aria-controls="collapse1">
                                    <h6 class="panel-title-edit mbr-fonts-style mb-0 display-7"><strong><?php echo $title;?></strong>
                                </h6>
                                    <span class="sign mbr-iconfont mbri-arrow-down"></span>
                                </a>
                            </div>
                            <div id="collapse1_<?php echo $id;?>" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p class="mbr-fonts-style panel-text display-7"><?php echo $desc;?></p>
                                </div>
                            </div>
                        </div>
					<?php
					}
					?>
                    </div>
                </div>
            </div>
        </div>
</section><?php
				}
			?>

<?php include("footer-pager.php");?>
<script>
var elem = document.documentElement;

function openFullscreen() {
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) {
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) {
    elem.msRequestFullscreen();
  }
}

function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}
</script>
  
</body>
</html>