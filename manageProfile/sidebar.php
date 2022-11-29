 <?php include("../validatePage.php");?>
 <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
				<center><img src="img/avatar.png" class="img-fluid pr-logo"/></center>
                    <h3 class="etext"><?php x_seprint("ER_NAME_2022_VI");?></h3>
                    <strong><?php x_short($_SESSION["ER_NAME_2022_VI"]);?></strong>
                </div>

                <ul class="list-unstyled components">
					<li class="active">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
					<?php
					if(x_count("manageaccount","is_big='1' AND id='$user_id'") > 0){
						?>
					<li>
                        <!---<a href="#" onclick="load('a_admin_manager')">--->
                        <a href="ad_admin_cpanel.php?hash=<?php echo $_SESSION['PAGE_TOKEN'];?>">
                            <i class="fa fa-key"></i>
                            Admin Page
                        </a>
                    </li>
						<?php
					}
					?>
					<li>
                        <a href="#" onclick="load('testi')">
                            <i class="fa fa-credit-card"></i>
                            Fund Wallet
                        </a>
                    </li>
					
					<li>
                        <a href="#" onclick="load('test')">
                            <i class="fa fa-globe"></i>
                            Place Order
                        </a>
                    </li>
					
                    <li>
                        <a href="#">
                            <i class="fa fa-signal"></i>
                            Order History
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-bell"></i>
                            Notifications
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-cog"></i>
                            Settings
                        </a>
                    </li>
					<li>
                        <a href="../logout">
                            <i class="fa fa-power-off"></i>
                            Logout
                        </a>
                    </li>
                </ul>

               
            </nav>

           