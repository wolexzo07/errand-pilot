<?php
  session_start();
  unset($_SESSION["IQGAMES_OS_2018_VISION"]);
  unset($_SESSION["IQGAMES_BR_2018_VISION"]);
  unset($_SESSION["IQGAMES_IP_2018_VISION"]);
  unset($_SESSION["IQGAMES_ID_2018_VISION"]);
  unset($_SESSION["IQGAMES_PHOTO_2018_VISION"]);
  unset($_SESSION["IQGAMES_NAME_2018_VISION"]);
  unset($_SESSION["IQGAMES_EMAIL_2018_VISION"]);
  unset($_SESSION["IQGAMES_MOBILE_2018_VISION"]);
  unset($_SESSION["IQGAMES_COUNTRY_2018_VISION"]);
  unset($_SESSION["IQGAMES_STATE_2018_VISION"]);
  unset($_SESSION["IQGAMES_GENDER_2018_VISION"]);
  unset($_SESSION["IQGAMES_PLAN_2018_VISION"]);
  unset($_SESSION["IQGAMES_TOKEN_2018_VISION"]);
  unset($_SESSION["IQGAMES_REF_2018_VISION"]);
  unset($_SESSION["IQGAMES_LL_2018_VISION"]);
  unset($_SESSION["IQGAMES_RT_2018_VISION"]);
  unset($_SESSION["IQGAMES_BN_2018_VISION"]);
  unset($_SESSION["IQGAMES_ACN_2018_VISION"]);
  unset($_SESSION["IQGAMES_ACNUMB_2018_VISION"]);
  unset($_SESSION["IQGAMES_CUR_2018_VISION"]);

  if(isset($_SESSION["EXAM_STARTED_ALREADY"])){
    unset($_SESSION["EXAM_STARTED_ALREADY"]);
  }
  if(isset($_SESSION['timeer'])){
    unset($_SESSION['timeer']);
  }

  if(isset($_SESSION['GAME_DEMO_KEY'])){
		unset($_SESSION['GAME_DEMO_KEY']);
	}
  if(isset($_SESSION["GAMES_TYPE_ID"])){
    unset($_SESSION["GAMES_TYPE_ID"]);
  }
  if(isset($_SESSION["GAMES_ID"])){
    unset($_SESSION["GAMES_ID"]);
  }
?>
<script type="text/javascript">
window.location="./iqlogin";
</script>
<?php

?>
