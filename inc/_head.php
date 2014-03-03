<? include_once "_config.php"; ?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<? if ($pageName=="programming") { 
    echo '<meta http-equiv="Expires" content="never"><meta name="description" content="';
    echo (isset($meta_desc)) ? $meta_desc : '';
    echo '"><meta name="language" content="English"><meta name="revisit-after" content="21"><meta name="robots" content="INDEX,FOLLOW">';
    echo '<title>';
    if ( (isset($title_special)) && (!empty($title_special)) ) {
        echo $title_special;
    } elseif (isset($_REQUEST['our_listings'])) {
        echo $title_special;
    } elseif (!empty($meta_title)) {
        echo "$meta_title : $myCompany";
    } elseif (!empty($title)) {
        echo $title;
    } else {
        echo $myCompany;
    }
    echo '</title>';
    echo (isset($linkcss)) ? $linkcss : '';
    echo (isset($userCss)) ? $userCss : '';
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