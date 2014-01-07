<? include_once "_config.php"; ?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<? if (file_exists("meta/$pageName.txt")) { include "meta/$pageName.txt"; } else { echo "<title>$myCompany</title>\n"; } ?>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700,700italic">
<link rel="stylesheet" href="css/style.css?v=<?=filemtime('css/style.css')?>">
<?=(isset($use_lightbox)) ? '<link rel="stylesheet" href="css/jquery.lightbox-0.5.css">'."\n" : '';?>
<?=(isset($use_s_lightbox)) ? '<link rel="stylesheet" href="css/s-lightbox.css">'."\n" : '';?>
<script src="js/modernizr.js"></script>
<? include "analytics/code.htm"; ?>
</head>
