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
$userToken = $_SESSION["ER_TOKEN_2022_VI"];
$user_id = $_SESSION["ER_ID_2022_VI"];
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("metaDetails.php");?>
        <title>
		<?php x_print($sitename);?> Dashboard :: Welcome <?php x_seprint("ER_NAME_2022_VI");?></title>
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
						<button style="float:right;" class="btn btn-primary">
						NGN <?php print number_format(epbal($userToken,"w"),2);?>
						</button>
                        

                    </div>
					
                </nav>
				
				
				<div class="container-fluid">
				
					
					
						<!---------------Just make the content work---------------->
			<div style="display:none;position:fixed;top:20%;left:37%;z-index:10000" id="loadTemporal" class="text-center"></div>
			<div style="background-image:url();background-attachment:fixed;background-color:transparent;padding-left:0pt;padding-right:0pt;" class="container-fluid" id="calculate"></div>
			
			<!---------------Just make the content work---------------->
						
					
				
				</div>
				
				
				
            </div>
			
			<!-- Page Content Holder -->
			
			
        </div>

	<?php
		include_once("mobileMenu.php");
	?>

     

         <script type="text/javascript">
             $(document).ready(function () {
				 load("homedash");
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
				 $("#menuGist").click(function(){
					$(".menuTag").toggle("slow");
				});
				
             });
         </script>
		 
<?php include("manageChart.php");?>	 
    </body>
</html>
