<link rel="stylesheet" href="style.css?ver=<?php echo filemtime('style.css'); ?>">
<link rel="stylesheet" href="css/forms.css">
<?php
echo ($pageName=="programming") ? '<link rel="stylesheet" href="css/programming.css">'."\n" : '';
echo ($dropdownnav=="1") ? '<link rel="stylesheet" href="css/dropdowns.css">'."\n" : '';
echo ((isset($use_lightbox)) && ($use_lightbox=="yes")) ? '<link rel="stylesheet" href="css/jquery.lightbox-0.5.css">'."\n" : '';
echo ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) ? '<link rel="stylesheet" href="css/s-lightbox.css">'."\n" : '';
echo ($mobile=="1") ? '<link rel="stylesheet" href="css/mq.css">'."\n".'<meta name="viewport" content="width=device-width,initial-scale=1">'."\n" : '';
?>
