<?php
$pageName = "default";
include("include.config.php");
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]> <!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php echo($myCompany); ?></title>

<?php include("include.styles.php"); ?>
<?php include("include.scripts.header.php"); ?>
	
</head>

<body>

<!-- HEADER -->
<?php include("include.header.php"); ?>
 	
<!-- CONTENT -->
<?php include("include.moreinfo.php"); ?>
 		
<!-- FOOTER -->
<?php include("include.footer.php"); ?>
 
<!-- SCRIPTS -->
<?php include("include.scripts.footer.php"); ?>

</body>

</html>
