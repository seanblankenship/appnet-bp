<? include_once "_config.php"; ?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<? if ($pageName=="programming") { 
    echo '<meta http-equiv="Expires" content="never"><meta name="description" content="'.(isset($meta_desc)) ? $meta_desc : ''.'"><meta name="language" content="English"><meta name="revisit-after" content="21"><meta name="robots" content="INDEX,FOLLOW"><title>'.(isset($meta_title)) ? $meta_title : $myCompany.'</title>'.(isset($linkcss)) ? $linkcss : '';
} else {
    if (file_exists("meta/$pageName.txt")) { include "meta/$pageName.txt"; } else { echo "<title>$myCompany</title>\n"; } 
} ?>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700,700italic">
<link rel="stylesheet" href="css/style.css?v=<?=filemtime('css/style.css')?>">
<?=(isset($use_lightbox)) ? '<link rel="stylesheet" href="css/jquery.lightbox-0.5.css">'."\n" : '';?>
<?=(isset($use_s_lightbox)) ? '<link rel="stylesheet" href="css/s-lightbox.css">'."\n" : '';?>
<script src="js/modernizr.js"></script>
<? include "analytics/code.htm"; ?>
</head>

<body>