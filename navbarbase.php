<?php include("validatePage.php");?>
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse mbr-navbar--transparent" id="ext_menu-0" data-rv-view="0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo"><img src="assets/images/iq-240x128.png" style="width:60px;" class="mbr-navbar__brand-img mbr-brand__img" alt="Iq games"></span>
                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="./"><?php echo strtoupper($sitename)?></a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active">
							<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="./">HOME</a></li>
							<li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="aboutus">ABOUT</a></li>
                              <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="./#workit">HOW IT WORKS</a></li>


							</ul>
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active">
							<?php
							if(isset($_SESSION["IQGAMES_ID_2018_VISION"])){
								?>
								<li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-danger" href="dash/manpag">DASHBOARD</a></li>
								<?php
							}else{
								?>
								<li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-danger" href="loginAccount">LOGIN</a></li>

							<li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-default" href="createAccount">REGISTER</a></li>
								<?php

							}
							?>

							</ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
