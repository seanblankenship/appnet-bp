<?php echo ((isset($_REQUEST['m'])) && ($_REQUEST['m']=="product_detail")) ? '' : '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>'."\n".'<script>window.jQuery || document.write(\'<script src="js/jquery-1.7.1.min.js"><\/script>\')</script>'; ?>

<?php // contact form validation
if($pageName=="contact" || $pageName=="contactRE" || $quickCommentForm=="1"){ ?>
<script src="js/jquery.validate.js"></script><?php } ?>

<?php // image fader
if ($fader=="1" && $pageName=="default") { ?>
<script src="js/jquery.innerfade.js"></script><?php } ?>

<?php // lightbox
if ((isset($use_lightbox)) && ($use_lightbox=="yes")) { ?>
<script src="js/jquery.lightbox-0.5.min.js"></script><?php } ?>

<?php // sexy lightbox
if ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) { ?>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/s-lightbox.v2.2.jquery.min.js"></script><?php } ?>

<?php // organic tabs
if((isset($use_tabs)) && ($use_tabs=="yes")){ ?>
<script src="js/jquery.organictabs.js"></script><?php } ?>

<?php  // twitter
if ($twitter_display=="1" && $pageName==$twitter_pageName) { ?>
<script src="js/jquery.twitter.js"></script><?php } ?>

<script>
$.post("key_f.php", function(data){
    $("#success").val(data);
    if ($("#success2").length > 0){
        $("#success2").val(data);
    }
});

<?php if($pageName=="contact" || $pageName=="contactRE"){ // comment form validation ?>
$(function() {
    $("#commentForm").validate();
});<?php } if ($quickCommentForm=="1"){ ?>
$(function() {
    $("#quickCommentForm").validate();
});<?php } ?>

<?php if ($dropdownnav=="1"){ // dropdown navigation ?> 
function mainmenu(){
    $("#navlist ul").css({display:"none"});
    $("#navlist li").hover(function(){
        $(this).find('ul:first').css({visibility:"visible",display:"none"}).show(400);
    },function(){
        $(this).find('ul:first').css({visibility:"hidden"});
    });
}	
$(function() {
    mainmenu();
});<?php } ?>

<?php if ($fader=="1" && $pageName=="default"){ // image fader ?>      
$(function() {
    $("#fader").innerfade({
        animationtype: 'fade',
        speed: 1500,
        timeout: 4000,
        type: 'sequence',
        containerheight: '<?php echo($faderHeight); ?>'
    });
});<?php } ?>

<?php if ((isset($use_lightbox)) && ($use_lightbox=="yes")) { // lightbox ?>    
$(function() {
    $('.gallery a').lightBox();
});<?php } ?>

<?php if ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) { // sexy lightbox ?>
$(function(){
    SexyLightbox.initialize({
        imagesdir: 'css/images',
        color:'white',
        OverlayStyles:{
            'background-color':'#000',
            'opacity': 0.6
        }
    });
});<?php } ?>

<?php if ((isset($use_tabs)) && ($use_tabs=="yes")){ // organic tabs ?>
$(function() {
    $("#description-box").organicTabs();
});<?php } ?>

<?php if ($twitter_display=="1" && $pageName==$twitter_pageName){ // twitter ?>
$("#twitter").getTwitter({
    userName: "<?php echo($twitter_name); ?>",
    numTweets: <?php echo($twitter_tweets); ?>,
    loaderText: "Loading tweets...",
    slideIn: false,
    showHeading: false,
    headingText: "Latest Tweets",
    showProfileLink: false
});<?php } ?>
</script>

<?php // installs chrome frame if ie6 ?>
<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->
