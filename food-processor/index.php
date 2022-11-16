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
// Redirection from Homepage Handler
include("pageRedirection.php");
// Handling session hacks
include("../session_hacks_bypass.php");
?>

<!DOCTYPE html>
<html>
<head>
<?php include_once("headPart.php");?>
<link rel="stylesheet" href="../css/font-awesome.min.css"/>
</head>
<body>
  
<?php include_once("menu.php");?>

<section data-bs-version="5.1" class="header5 cid-tfrmEfarwJ" id="header5-6">

    

    
    <div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(53, 53, 53);"></div>

    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-lg-8">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong>ORDER FOR FOOD</strong></h1>
                
                <p class="mbr-text mbr-fonts-style mbr-white display-5"><strong>
                    Errand Pilot</strong> gives you the best way to order for your favorite <strong>food online</strong> without any hassle from your <strong>favorite Restaurants.</strong></p>
             
					<?php include_once("front-search.php");?>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="gallery2 cid-tfrlLclnKi" id="gallery2-3">
    
    
    <div class="container-fluid" id="listedFood">
       
		<?php include("Fetch_Result_Food_Search.php");?>
		<script src="js/cartProcessor.js"></script>
    </div>
</section>

<section data-bs-version="5.1" class="contacts2 cid-tfsW1WAUwy" id="contacts2-7">

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
                            <a href="tel:<?php echo $phone1;?>" class="text-primary"><?php echo $phone1;?></a><br/>
                            <a href="tel:<?php echo $phone2;?>" class="text-primary"><?php echo $phone2;?></a>
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
                            <a href="mailto:<?php echo $siteemail;?>" class="text-primary">
							<?php echo $siteemail;?></a>
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
                            <?php echo $siteaddress;?>
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
                            <?php echo $wh;?>
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