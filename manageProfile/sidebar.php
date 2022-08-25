 <?php include("../validatePage.php");?>
 <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
				<center><img src="img/avatar.png" class="img-fluid pr-logo"/></center>
                    <h3 class="etext"><?php x_seprint("ER_NAME_2022_VI");?></h3>
                    <strong><?php x_short($_SESSION["ER_NAME_2022_VI"]);?></strong>
                </div>

                <ul class="list-unstyled components">
                   <p style="color:white;padding-left:10px;display:;">Menu</p>
					<li class="active">
                        <a href="#">
                            <i class="fa fa-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
					
					<li>
                        <a href="#" onclick="load('test')">
                            <i class="fa fa-car"></i>
                            Place Order
                        </a>
                    </li>
					
                    <li>
                        <a href="#">
                            <i class="fa fa-laptop"></i>
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
                </ul>

               
            </nav>

           