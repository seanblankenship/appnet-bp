<?php
$pageName = "default";
include "_config.php";
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 oldie" lang="en"> <![endif]--> 
<!--[if gt IE 9]> <!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php echo $myCompany; ?></title>

<?php include "inc/styles.inc.php"; ?>
<?php include "inc/scripts.header.inc.php"; ?>

</head>

<body>

<!-- HEADER -->
<?php include "inc/header.inc.php"; ?>
 	
<!-- CONTENT -->
<?php include "inc/moreinfo.inc.php"; ?>
 		
<!-- FOOTER -->
<?php include "inc/footer.inc.php"; ?>
 
<!-- SCRIPTS -->
<?php include "inc/scripts.footer.inc.php"; ?>

</body>
</html>
