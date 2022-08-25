<?php
$pageToken = md5(rand());
include_once("../finishit.php");
xstart("0");
include_once("../se-validate.php");
include_once("../siteinfo.php");
include_once("../refcoder.php");

if(x_count("portalmode","status='offline' AND id='1' LIMIT 1") > 0){

	//finish("notify/maintenance","Access denied!");
	exit();
}
$_SESSION["PAGE_TOKEN"] = sha1($pageToken).md5($pageToken);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("metaDetails.php");?>
        <title><?php x_print($sitename);?> Dashboard :: Welcome <?php x_seprint("ER_NAME_2022_VI");?></title>
		<?php include("topLibrary.php");?>
    </head>
    <body>

        <div class="wrapper">
		
           <?php include("sidebar.php");?>

		   <!-- Page Content Holder -->
			
            <div id="content">

                <nav class="navbar navbar-default">
				
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="fa fa-align-left"></i>
                                <span></span>
                            </button>
							
                        </div>
						<button style="float:right;" class="btn btn-success">NGN 2,000,000</button>
                        

                    </div>
					
                </nav>
				
				
				<div class="container-fluid">
				
					<div class="row">
					
						<?php include_once("dashboardStatistics.php")?>
						<?php include_once("timeline-imported.php")?>
						
					</div>
				
				</div>
				
				<!---------------Just make the content work---------------->
			<div style="display:none;position:fixed;top:20%;left:37%;z-index:10000" id="loadTemporal" class="text-center"></div>
			<div style="background-image:url();background-attachment:fixed;background-color:transparent;padding-left:0pt;padding-right:0pt;" class="container-fluid" id="calculate"></div>
			
			<!---------------Just make the content work---------------->
				
            </div>
			
			<!-- Page Content Holder -->
			
			
        </div>

	<?php
		include_once("mobileMenu.php");
	?>

     <script src="js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
				 $("#menuGist").click(function(){
					$(".menuTag").toggle("slow");
				});
             });
         </script>
		 
    </body>
</html>
