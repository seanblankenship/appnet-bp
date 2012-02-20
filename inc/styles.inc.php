<link rel="stylesheet" href="style.css?ver=<?php echo filemtime('style.css'); ?>">
<?php 
echo ($dropdownnav=="1") ? '<link rel="stylesheet" href="css/dropdown-style.css">' : '';
echo ((isset($use_lightbox)) && ($use_lightbox=="yes")) ? '<link rel="stylesheet" href="css/jquery.lightbox-0.5.css">' : '';
echo ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) ? '<link rel="stylesheet" href="css/s-lightbox.css">' : '';
echo ($mobile=="1") ? '<meta name="viewport" content="width=device-width,initial-scale=1">' : '';
?>
