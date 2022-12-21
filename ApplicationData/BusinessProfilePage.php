<?php
$pageToken = md5(rand());
include_once("../finishit.php");
include_once("../siteinfo.php");
xstart("0");
include_once("../refcoder.php"); // Handling Referral of user
include("businessRedirection.php");// Redirection from Homepage Handler
include("../session_hacks_bypass.php"); // Handling session hacks
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
            <div class="col-12 col-lg-10">
                <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-1"><strong><?php echo strtoupper($getbizname);?> </strong></h1>
                
                <p class="mbr-text mbr-fonts-style mbr-white display-5"><strong>
                    Errand Pilot</strong> gives you the best way to order for your favorite <strong>food online</strong> without any hassle from your <strong>favorite Restaurants.</strong></p>
             
            </div>
        </div>
    </div>
</section>

<section style="background-color:aqua;margin-top:-70px" data-bs-version="5.1" class="gallery2 cid-tfrlLclnKi" id="gallery2-3">
    
    
    <div class="container-fluid" id="getStocksList"></div>
	<?php //include("fetchBizItems.php");?>
	<script>
	 $(document).ready(function(){
		 x_manageWallet("#getStocksList","getBizContent");
	 });
	function x_manageWallet(resultid,cmd){
		$(resultid).html("<img src='../manageProfile/img/ajax-loader.gif'/> Loading");
		$.ajax({
			url:"fetchBizItems?merchant_id=<?php echo $getPage;?>&cmd="+cmd,
			method:"GET",
			success:function(response){
				$(resultid).html(response);
			},
			error:function(){}
		});
	}
</script>
	<script src="js/cartProcessor.js"></script>
	
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