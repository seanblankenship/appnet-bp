<?php include("include.config.php"); ?>

<a href="<?php echo($myDomain); ?>/.php"><?php echo($myDomain); ?>/.php</a><br>

<?php (file_exists("sitemaps.inc.php")) ? include('sitemaps.inc.php') : ''; ?>
