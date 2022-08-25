<?php
$pageToken = md5(rand());
include_once("../finishit.php");
include_once("../siteinfo.php");
xstart("0");
//include_once("../refcoder.php");

if(x_count("portalmode","status='offline' AND id='1' LIMIT 1") > 0){

	finish("../notify/maintenance","Access denied!");
	exit();
}
$_SESSION["XCAPE_HACKS"] = md5(rand());
?>

<!DOCTYPE html>
<html>
<head>
<?php include_once("headPart.php");?>
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu2 cid-teKMinfwRf" once="menu" id="menu2-0">
    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    
                        <img src="assets/images/logo8-332x123.png" alt="Logo" style="height: 3.9rem;">
                    
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
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item"><a class="nav-link link text-black display-4" href="#"><span class="mobi-mbri mobi-mbri-home mbr-iconfont mbr-iconfont-btn"></span>HOME</a></li><li class="nav-item dropdown"><a class="nav-link link text-black dropdown-toggle show display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true"><span class="mobi-mbri mobi-mbri-bulleted-list mbr-iconfont mbr-iconfont-btn"></span>SERVICES</a><div class="dropdown-menu show" aria-labelledby="dropdown-320" data-bs-popper="none"><a class="text-black dropdown-item display-4" href="#">New Item</a><a class="text-black dropdown-item display-4" href="#">New Item</a><a class="text-black dropdown-item display-4" href="#">New Item</a><a class="text-black dropdown-item display-4" href="#">New Item</a></div></li></ul>
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
                <div class="navbar-buttons mbr-section-btn">
                    <a class="btn btn-primary display-4" href="#">
                        Download Now</a>
                </div>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="header5 cid-tfrmEfarwJ" id="header5-6">

    

    
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(53, 53, 53);"></div>

    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-lg-8">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong>ORDER FOR FOOD</strong></h1>
                
                <p class="mbr-text mbr-fonts-style mbr-white display-5"><strong>
                    Errand Pilot</strong> gives you the best way to order for your favorite <strong>food online</strong> without any hassle from your <strong>favorite Restaurants.</strong></p>
                <!----<div class="mbr-section-btn mt-3"><a class="btn btn-warning display-7" href="#">Create Free Website!</a>
                    <a class="btn btn-warning-outline display-7" href="#">Learn More</a></div>--->
					<?php include_once("front-search.php");?>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="gallery2 cid-tfrlLclnKi" id="gallery2-3">
    
    
    <div class="container-fluid">
        <div class="mbr-section-head">
            <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Gallery with Text and Buttons</strong></h4>
            
        </div>
        <div class="row mt-4">
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/features1.jpg" alt="Mobirise Website Builder">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5">Create Site Today!</h5>
                        
                        
                    </div>
                    <div class="mbr-section-btn item-footer mt-2">
                        <a href="" class="btn btn-primary item-btn display-7" target="_blank">Start
                            Now!</a>
                    </div>
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/features2.jpg" alt="Mobirise Website Builder">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5">Create Site Today!</h5>
                        
                        
                    </div>
                    <div class="mbr-section-btn item-footer mt-2">
                        <a href="" class="btn btn-primary item-btn display-7" target="_blank">Start
                            Now!</a>
                    </div>
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/features3.jpg" alt="Mobirise Website Builder">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5">Create Site Today!</h5>
                        
                        
                    </div>
                    <div class="mbr-section-btn item-footer mt-2">
                        <a href="" class="btn btn-primary item-btn display-7" target="_blank">Start
                            Now!</a>
                    </div>
                </div>
            </div>
            <div class="item features-image сol-12 col-md-6 col-lg-4">
                <div class="item-wrapper">
                    <div class="item-img">
                        <img src="assets/images/features4.jpg" alt="Mobirise Website Builder" title="">
                    </div>
                    <div class="item-content">
                        <h5 class="item-title mbr-fonts-style display-5">Create Site Today!</h5>
                        
                        
                    </div>
                    <div class="mbr-section-btn item-footer mt-2">
                        <a href="" class="btn btn-primary item-btn display-7" target="_blank">Start
                            Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="contacts2 cid-tfsW1WAUwy" id="contacts2-7">
    <!---->
    

    
    
    <div class="container">
        <div class="mbr-section-head">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Contacts</strong>
            </h3>
            
        </div>
        <div class="row justify-content-center mt-4">
            <div class="card col-12 col-md-6">
                <div class="card-wrapper">
                    <div class="image-wrapper">
                        <span class="mbr-iconfont mobi-mbri-phone mobi-mbri"></span>
                    </div>
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-1 display-5">
                            <strong>Phone</strong>
                        </h6>
                        <p class="mbr-text mbr-fonts-style display-7">
                            <a href="tel:+12345678910" class="text-primary">0 (800) 123 45 67</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6">
                <div class="card-wrapper">
                    <div class="image-wrapper">
                        <span class="mbr-iconfont mobi-mbri-letter mobi-mbri"></span>
                    </div>
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-1 display-5">
                            <strong>Email</strong>
                        </h6>
                        <p class="mbr-text mbr-fonts-style display-7">
                            <a href="mailto:info@site.com" class="text-primary">info@site.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6">
                <div class="card-wrapper">
                    <div class="image-wrapper">
                        <span class="mbr-iconfont mobi-mbri-globe mobi-mbri"></span>
                    </div>
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-1 display-5">
                            <strong>Address</strong>
                        </h6>
                        <p class="mbr-text mbr-fonts-style display-7">
                            4100 Ross Street, Okawville, IL
                        </p>
                    </div>
                </div>
            </div>
            <div class="card col-12 col-md-6">
                <div class="card-wrapper">
                    <div class="image-wrapper">
                        <span class="mbr-iconfont mobi-mbri-clock mobi-mbri"></span>
                    </div>
                    <div class="text-wrapper">
                        <h6 class="card-title mbr-fonts-style mb-1 display-5">
                            <strong>Working Hours</strong>
                        </h6>
                        <p class="mbr-text mbr-fonts-style display-7">
                            9:00 - 18:00
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="display-7" id="playsmart" style="padding: 0;align-items: center;justify-content: center;flex-wrap: wrap;    align-content: center;display: flex;position: relative;height: 4rem;"><a href="https://mobiri.se/" style="flex: 1 1;height: 4rem;position: absolute;width: 100%;z-index: 1;"><img alt="Mobirise" style="height: 4rem;" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="></a><p style="margin: 0;text-align: center;" class="display-7">xelowgc &#8204;</p><a style="z-index:1" href="https://mobirise.com/html-builder.html">Xelowgc</a></section>

<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script> 
 <script src="assets/smoothscroll/smooth-scroll.js"></script>
 <script src="assets/ytplayer/index.js"></script> 
 <script src="assets/dropdown/js/navbar-dropdown.js"></script> 
 <script src="assets/theme/js/script.js"></script>  
    <script>
  $(document).ready(function(){
	  $("#playsmart").hide();
  })
  </script>
  
</body>
</html>