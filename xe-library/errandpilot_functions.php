<?php
	#Errand Pilot Functions

		function ep_walletBal($userToken){
		 $result = x_getsingle("SELECT wallet_balance FROM manageaccount WHERE token='$userToken' LIMIT 1","manageaccount WHERE token='$userToken' LIMIT 1","wallet_balance");
		 return $result;
		}

		function ep_getDetails($userToken,$column){
		 $result = x_getsingle("SELECT $column FROM manageaccount WHERE token='$userToken' LIMIT 1","manageaccount WHERE token='$userToken' LIMIT 1","$column");
		 return $result;
		}

		function generate(){
			$email = xp("email");
			$dater = DATE("mdHis"); 
			$hash = substr(strtoupper(sha1($email)),0,4);
			$add = strtoupper(xrands(10));
			return $dater."-".$hash."-".$add;
		}
		
		function eptoks($str){
			return sha1($str).md5($str);
		}
		
		function epbal($token,$opt){
			$options = array("w","b","c");
			$userhash = eptoks($token);
			if(in_array($opt,$options)){
				if(x_count("ep_wallets","utoken='$userhash' LIMIT 1") > 0){
					foreach(x_select("wallet_balance,wallet_bonus,wallet_credit","ep_wallets","utoken='$userhash'","1","id") as $balance){
						$w = $balance["wallet_balance"];
						$b = $balance["wallet_bonus"];
						$c = $balance["wallet_credit"];
					}
					if($opt == "w"){
						return $w;
					}elseif($opt == "b"){
						return $b;
					}else{
						return $c;
					}
				}else{
					x_print("invalid wallet!");
				}
			}else{
				x_print("invalid wallet option!");
			}
		}

?>