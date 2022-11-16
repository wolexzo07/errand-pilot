   <?php include("../validatePage.php");?>
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
				
                    <a class="btn btn-sm btn-warning display-4" id="x_get_content" href=""><i class="fa fa-shopping-cart"></i> &nbsp;
						<span class="loadcartvalue">
							<?php 
							if(x_validatesession("shopping_cart")){
							foreach(x_session("shopping_cart") as $keys => $values)
								{
									$quantity[] = $values["product_quantity"];
								}
								echo array_sum($quantity);
							}else{echo "0";}?>
						</span> 

                    </a>
					<a class="btn btn-sm btn-primary display-4 " id="x_get_balance" href="#">
					</a>
					
					
                </div>
            </div>
        </div>
    </nav>
</section>