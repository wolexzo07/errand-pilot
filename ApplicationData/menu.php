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
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
				<li class="nav-item"><a class="nav-link link text-black display-4" href="../">
				<span class="mobi-mbri mobi-mbri-home mbr-iconfont mbr-iconfont-btn"></span>Home</a>
				</li>
				<li class="nav-item dropdown">
				<a class="nav-link link text-black dropdown-toggle show display-4" href="#" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
				<span class="mobi-mbri mobi-mbri-bulleted-list mbr-iconfont mbr-iconfont-btn"></span>Services</a>
				<div class="dropdown-menu show" aria-labelledby="dropdown-320" data-bs-popper="none">
					<a class="text-black dropdown-item display-4" href="#">New Item</a>
					<a class="text-black dropdown-item display-4" href="#">New Item</a>
					<a class="text-black dropdown-item display-4" href="#">New Item</a>
					<a class="text-black dropdown-item display-4" href="#">New Item</a>
					</div>
				</li></ul>
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
				
                    <a class="btn btn-sm btn-warning display-4" href="incartpage"><i class="fa fa-shopping-cart"></i> &nbsp;
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
					
                </div>
            </div>
        </div>
    </nav>
</section>