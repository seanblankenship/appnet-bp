<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.9.0.min.js"><\/script>')</script>
<? if ($pageName=="contact" || $quickCommentForm=="1"){ ?><script src="js/jquery.validate.js"></script><?}?>
<? if ($fader=="1" && $pageName=="default"){ ?><script src="js/jquery.innerfade.js"></script><?}?>
<? if ((isset($use_lightbox)) && ($use_lightbox=="yes")) { ?><script src="js/jquery.lightbox-0.5.js"></script><?}?>
<? if ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) { ?><script src="js/jquery.easing.1.3.js"></script><script src="js/s-lightbox.v2.2.jquery.min.js"></script><?}?>
<? if ((isset($use_tabs)) && ($use_tabs=="yes")){ ?><script src="js/jquery.organictabs.js"></script><?}?>

<script>
<? if ($pageName=="contact"){ // comment form validation ?>
$(function() {
    $("#commentForm").validate();
});
<? } if ($quickCommentForm=="1"){ ?>
$(function() {
    $("#quickCommentForm").validate();
});<? } ?>

<? if ($dropdownnav=="1"){ // dropdown navigation ?> 
$(function() {
    $("#navlist ul").css({display:"none"});
    $("#navlist li").hover(function(){
        $(this).find('ul:first').css({visibility:"visible",display:"none"}).show(400);
    },function(){
        $(this).find('ul:first').css({visibility:"hidden"});
    });
});<? } ?>

<? if ($fader=="1" && $pageName=="default"){ // image fader ?>      
$(function() {
    $("#fader").innerfade({
        animationtype: 'fade',
        speed: 1500,
        timeout: 4000,
        type: 'sequence',
        containerheight: '<? echo($faderHeight); ?>'
    });
});<? } ?>

<? if ((isset($use_lightbox)) && ($use_lightbox=="yes")) { // lightbox ?>    
$(function() {
    $('.gallery a').lightBox();
});<? } ?>

<? if ((isset($use_s_lightbox)) && ($use_s_lightbox=="yes")) { // sexy lightbox ?>
$(function(){
    SexyLightbox.initialize({
        imagesdir: 'images',
        color:'white',
        OverlayStyles:{
            'background-color':'#000',
            'opacity': 0.6
        }
    });
});<? } ?>

<? if ((isset($use_tabs)) && ($use_tabs=="yes")){ // organic tabs ?>
$(function() {
    $("#description-box").organicTabs();
});<? } ?>

<? // lose the borders on anchor tags surrounding images ?>
$(function() {
    $('img').parent('a').addClass('nobord');
});
</script>