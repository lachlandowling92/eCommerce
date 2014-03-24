<?php

include_once("../config/config.php");

include_once ("controller/videoAdmin/videoAdminController.php");

$controller = new videoAdminController();
$controller -> invoke();

?>