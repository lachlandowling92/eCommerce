<!DOCTYPE html>
<?php
if(session_id() == '') {
    // session isn't started
    @session_start();
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>Pots Site</title>
	<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/tablet.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/mobile.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/navigataur.css" type="text/css" />
	<!-- jQuery library (served from Google) -->
	<script src="includes/jQuery/jquery-1.8.2.min.js"></script>
<title>Miniport</title>
<meta charset="utf-8">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet">
<script src="js/jquery-1.8.3.min.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px"></script>
<script src="js/init.js"></script>

<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/5grid/core.css">
<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/5grid/core-desktop.css">
<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/5grid/core-1200px.css">
<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/5grid/core-noscript.css">
<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/style.css">
<link rel="stylesheet" href="<?php echo SITEROOT; ?>includes/css/style-desktop.css">

<!--[if lte IE 9]>
<link rel="stylesheet" href="css/ie9.css">
<![endif]-->
<!--[if lte IE 8]>
<link rel="stylesheet" href="css/ie8.css">
<![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" href="css/ie7.css">
<![endif]-->
</head>
<body>		