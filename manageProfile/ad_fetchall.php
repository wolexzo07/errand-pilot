<?php
include("adminpagevalidator.php");
if(x_validateget("tid") && x_validateget("cmd") && x_validateget("trx_token") && x_validatesession("ER_ID_2022_VI")){	
$user = x_clean($_SESSION["ER_ID_2022_VI"]);
$oid = xg("tid"); $ohash = xg("trx_token");
$count = x_count("order_placed","order_id='$oid' AND product_token='$ohash'");
$page = (int) (!isset($_REQUEST['pageId']) ? 1 :$_REQUEST['pageId']);
$page = ($page == 0 ? 1 : $page);
$recordsPerPage = x_getsingleupdate("control_pagination","counter","type='traditional' AND status='1'"); // getting allowed record per page
$start = ($page-1) * $recordsPerPage;
$adjacents = "2";
    
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($count/$recordsPerPage);
$lpm1 = $lastpage - 1;   
$pagination = "";
if($lastpage > 1)
    {   
        $pagination .= "<div class='pagination'>";
        if ($page > 1)
            $pagination.= "<a href=\"#Page=".($prev)."\" onClick='changePagination(".($prev).");'>&laquo; Prev&nbsp;&nbsp;</a>";
        else
            $pagination.= "<span class='disabled'>&laquo; Prev&nbsp;&nbsp;</span>";   
        if ($lastpage < 7 + ($adjacents * 2))
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class='current'>$counter</span>";
                else
                    $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
                         
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))
        {
            if($page < 1 + ($adjacents * 2))
            {
                for($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                    else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
                }
                $pagination.= "...";
                $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
                $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           
           }
           elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "...";
               for($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
               {
                   if($counter == $page)
                       $pagination.= "<span class='current'>$counter</span>";
                   else
                       $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
               $pagination.= "..";
               $pagination.= "<a href=\"#Page=".($lpm1)."\" onClick='changePagination(".($lpm1).");'>$lpm1</a>";
               $pagination.= "<a href=\"#Page=".($lastpage)."\" onClick='changePagination(".($lastpage).");'>$lastpage</a>";   
           }
           else
           {
               $pagination.= "<a href=\"#Page=\"1\"\" onClick='changePagination(1);'>1</a>";
               $pagination.= "<a href=\"#Page=\"2\"\" onClick='changePagination(2);'>2</a>";
               $pagination.= "..";
               for($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
               {
                   if($counter == $page)
                        $pagination.= "<span class='current'>$counter</span>";
                   else
                        $pagination.= "<a href=\"#Page=".($counter)."\" onClick='changePagination(".($counter).");'>$counter</a>";     
               }
           }
        }
        if($page < $counter - 1)
            $pagination.= "<a href=\"#Page=".($next)."\" onClick='changePagination(".($next).");'>Next &raquo;</a>";
        else
            $pagination.= "<span class='disabled'>Next &raquo;</span>";
        
        $pagination.= "</div>";       
    }
    
if(isset($_POST['pageId']) && !empty($_POST['pageId']))
{$id=$_POST['pageId'];}
else{$id='0';}

$starter = x_clean($start);
//echo $pagination;

if(x_count("order_placed","order_id='$oid' AND product_token='$ohash' LIMIT 1") > 0){
	$counter = 0;
	?>
	<div class="table-responsive">
	
	<div id="react-msg"></div>
	<table class="table table-hover tabover">
	<tr>
	<th>No.</th>
	<th>Item name</th>
	<th>Quantity</th>
	<th>unit price</th>
	<th>Total Amount</th>
	<th>Action</th>
	</tr>
	<?php
	foreach(x_select("0","order_placed","order_id='$oid' AND product_token='$ohash'","$starter,$recordsPerPage","id DESC") as $key){
		$counter++;
		$id = $key["id"];
		$oid = $key["order_id"];
		$pname = $key["product_name"];
		$pqty = $key["product_quantity"];
		$unit = $key["unit_price"];
		$pamount = $key["total_amount"];
		
		$p_status = $key["processing_status"];
		$s_status = $key["shipping_status"];
		$d_status = $key["delivery_status"];
		
			?>

			<tr>
			<td><?php echo $counter;?></td>
			<td>
			<?php //echo substr(strtoupper($pname),0,18);?>
			<?php 
			if(strlen($pname) > 20){
				echo substr(strtoupper($pname),0,18)."...";
				}else{
				echo strtoupper($pname);
				};?>
			</td>
			<td><?php echo $pqty;?> 
			<input style="width:50px;margin-left:20px;" id="edited<?php echo $pqty;?>" type="number" min="1" value="<?php echo $pqty;?>" max="<?php echo $pqty;?>" />
			</td>
			<td><?php echo "NGN ".number_format($unit,2);?></td>
			<td><?php echo "NGN ".number_format($pamount,2);?></td>
			<td>
			<?php
			if($p_status == "1"){ // Handling processing button
				?><button disabled class="btn btn-sm btn-info">Fulfilled</button><?php
			}else{
				?><button onclick="manageOrderTable('<?php echo $id;?>','<?php echo $ohash;?>','fulfil')" class="btn btn-sm btn-info">Fulfil</button><?php
			}
			?>
			
			<?php
			if($s_status == "1"){ // Handling shipping button
				?><button disabled class="btn btn-sm btn-info">Shipped</button><?php
			}else{
				?><button onclick="manageOrderTable('<?php echo $id;?>','<?php echo $ohash;?>','ship')" class="btn btn-sm btn-primary">Ship</button><?php
			}
			?>
			
			<?php
			if($d_status == "1"){ // Handling shipping button
				?><button disabled class="btn btn-sm btn-info">Delivered</button><?php
			}else{
				?>	<button onclick="manageOrderTable('<?php echo $id;?>','<?php echo $ohash;?>','deliver')" class="btn btn-sm btn-success">Deliver</button><?php
			}
			?>
				
				<?php
					if(($p_status == "1") && ($s_status == "1") && ($d_status == "1")){
						
					}else{
						?>
						
						<button onclick="manageOrderTable('<?php echo $id;?>','<?php echo $ohash;?>','cancel')" class="btn btn-sm btn-danger">Cancel</button>
						
						<?php
					}
				?>
				
			</td>
			</tr>
			<?php
	}
	?></table>
	</div>
	<?php
}else{
	$msg = "<p class='text-center' style='font-size:60pt;margin-bottom:10pt;'><span class='fa fa-shopping-cart'></span></p>";
	$msg .= "<p class='text-center'>No order was placed yet!</p>";
			echo $msg;	
}
echo $pagination;
}else{
	x_print("<p class='alert-txt'>Parameter missing</p>");
}
?>
<script>
	$(document).ready(function(){
		$("#mini-loader").hide();
	});
	function manageOrderTable(tranxId , tranxToken , cmd){
		$("#react-msg").show();
		$("#react-msg").html("<p class='alert-txt'>Loading <img class='img-fluid' src='img/ajax-loader.gif'/></P>");
		$.ajax({
			url:"ad_manageOrderTable?tranxId="+tranxId+"&tranxToken="+tranxToken+"&cmd="+cmd,
			method:"GET",
			success:function(data){
				$("#react-msg").html(data);
				setTimeout(function(){
					$("#react-msg").hide(500);
				},5000)
			},
			error:function(){
				
			}
		})
	}
</script>

<style>
div.pagination {
padding: 3px;
margin: 3px;
text-align:center;
}

div.pagination a {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #AAAADD;

text-decoration: none;
color: #000099;
}
div.pagination a:hover, div.digg a:active {
border: 1px solid #000099;

color: #000;
}
div.pagination span.current {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #000099;

font-weight: bold;
background-color: #000099;
color: #FFF;
}
div.pagination span.disabled {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #EEE;

color: #DDD;
}

</style>