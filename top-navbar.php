<?php include("validatePage.php");?>
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
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
				<li class="nav-item dropdown open">
				<a class="nav-link link text-black dropdown-toggle display-4" href="" data-toggle="dropdown-submenu" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">About Us</a>
					<div class="dropdown-menu" aria-labelledby="dropdown-305">
					<a class="text-black dropdown-item display-4" href="">Company</a>
					<a class="text-black dropdown-item display-4" href="">Services</a>
					</div>
				</li>
				<li class="nav-item">
				<a class="nav-link link text-black display-4" href="">How It Works</a>
				</li>
				</ul>
                <div style="display:none;" class="icons-menu">
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
				<?php
					if(x_validatesession("ER_ID_2022_VI")){
						?>
						<div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-3" href="manageProfile/ApplicationDashboard?hash=<?php echo $_SESSION['XCAPE_HACKS']?>"><i class="fa fa-user"></i>&nbsp; Hi <?php
						$name = $_SESSION["ER_NAME_2022_VI"];
						echo x_strexplode($name," ", 0)
						?></a></div>
						<?php
					}else{
						?>
						<div class="navbar-buttons mbr-section-btn"><a class="btn btn-primary display-3" href="loginAccount"><i class="fa fa-lock"></i>&nbsp; SIGN IN</a></div>
						<?php
					}
				?>
                
            </div>
        </div>
    </nav>
	
</section>
