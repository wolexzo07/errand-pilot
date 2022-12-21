<?php
$pageToken = md5(rand());
include_once("../finishit.php");
include_once("../siteinfo.php");
xstart("0");
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
			<?php
			if(x_validatesession("XCAPE_HACKS") && x_validatepost("orderFood")){
			
				 $mhash = xp("servicelist"); // merchant identity hashed
				 $catid = xp("category_id"); // services listed Hashed
				 $status = 1;
				 $merchant = x_getsingleupdate("sub_service","subservice","category_id='$catid' AND subservice_id='$mhash'");
				 ?>
				 <h1 onclick="window.location='BusinessProfilePage?BToken=<?php echo $mhash;?>'" class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong><?php echo $merchant;?></strong></h1>
				 <?php
			}else{
				// Handling default page
				
				$mhash = x_getsingleupdate("sub_service","subservice_id","is_set_default='1'"); // merchant identity hashed
				$catid = x_getsingleupdate("sub_service","category_id","is_set_default='1'");; // services listed Hashed
				$status = 1;
				$merchant = x_getsingleupdate("sub_service","subservice","category_id='$catid' AND subservice_id='$mhash'");
				?>
				<h1 onclick="window.location='BusinessProfilePage?BToken=<?php echo $mhash;?>'" class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong><?php echo $merchant;?></strong></h1>
				<?php
			}
			?>
                
                
                <p class="mbr-text mbr-fonts-style mbr-white display-5"><strong>
                    Errand Pilot</strong> gives you the best way to order for your favorite <strong>food online</strong> without any hassle from your <strong>favorite Restaurants.</strong></p>
             
					<?php include_once("front-search.php");?>
            </div>
        </div>
    </div>
</section>

<section style="background-color:aqua;" data-bs-version="5.1" class="gallery2 cid-tfrlLclnKi" id="gallery2-3">
    
    
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

<?php include_once("footer-page.php");?>
  
</body>
</html>