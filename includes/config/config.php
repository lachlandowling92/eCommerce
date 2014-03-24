<?php
@define ('SERVERROOT', '/Applications/MAMP/htdocs/Pots_MVC');

$result = array();
preg_match('#(.*/eCommerce/).*/?([^/]+)$#' , $_SERVER['SCRIPT_NAME'], $result);
@define( 'SITEROOT', 'http://' . $_SERVER['SERVER_NAME'] . $result[1]);

?>
