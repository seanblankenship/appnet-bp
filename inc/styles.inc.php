<!-- load fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700,700italic">
<!--[if lte IE 8]>
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400italic">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300italic">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:700">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:700italic">
<![endif]-->

<!-- load styles --> 
<link rel="stylesheet" href="css/style.css?v=<?=filemtime('css/style.css')?>">
<?php
echo ((isset($use_lightbox)) && ($use_lightbox=="yes")) ? '<link rel="stylesheet" href="css/jquery.lightbox-0.5.css">'."\n" : '';
echo ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) ? '<link rel="stylesheet" href="css/s-lightbox.css">'."\n" : '';
?>